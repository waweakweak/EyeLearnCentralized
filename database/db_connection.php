<?php
/**
 * Centralized Database Connection
 * 
 * This file provides a single point of access for all database connections
 * in the application. It supports both MySQL and PostgreSQL (for Render).
 * 
 * Environment Setup:
 *   For Render PostgreSQL: Set DATABASE_URL from Render Dashboard
 *   For Local MySQL: Set DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
 * 
 * Usage:
 *   require_once __DIR__ . '/../database/db_connection.php';
 *   $pdo = getPDOConnection();
 *   $conn = getMysqliConnection(); // Only for MySQL
 */

// Parse DATABASE_URL if provided (for Render PostgreSQL)
$parsed_db_url = null;
if (getenv('DATABASE_URL')) {
    $parsed_db_url = parseRenderDatabaseUrl(getenv('DATABASE_URL'));
}

// Database configuration with support for both MySQL and PostgreSQL
$db_config = [
    'connection' => getenv('DB_CONNECTION') ?: ($parsed_db_url ? 'pgsql' : 'mysql'),
    'host' => $parsed_db_url['host'] ?? (getenv('DB_HOST') ?: 'localhost'),
    'port' => $parsed_db_url['port'] ?? (getenv('DB_PORT') ?: 3306),
    'database' => $parsed_db_url['database'] ?? (getenv('DB_DATABASE') ?: getenv('DB_NAME') ?: 'elearn_db'),
    'username' => $parsed_db_url['username'] ?? (getenv('DB_USERNAME') ?: getenv('DB_USER') ?: 'root'),
    'password' => $parsed_db_url['password'] ?? (getenv('DB_PASSWORD') ?: getenv('DB_PASS') ?: ''),
    'sslmode' => $parsed_db_url['sslmode'] ?? (getenv('DB_SSLMODE') ?: null)
];

/**
 * Parse Render PostgreSQL DATABASE_URL
 * Format: postgresql://username:password@host:port/database?sslmode=require
 * 
 * @param string $url The DATABASE_URL from Render
 * @return array Parsed database configuration
 */
function parseRenderDatabaseUrl($url) {
    $parsed = parse_url($url);
    
    if (!$parsed) {
        return [];
    }
    
    $config = [
        'host' => $parsed['host'] ?? 'localhost',
        'port' => $parsed['port'] ?? 5432,
        'database' => ltrim($parsed['path'] ?? '/elearn_db', '/'),
        'username' => $parsed['user'] ?? 'root',
        'password' => $parsed['pass'] ?? '',
        'sslmode' => null
    ];
    
    // Parse query string for sslmode
    if (isset($parsed['query'])) {
        parse_str($parsed['query'], $query_params);
        if (isset($query_params['sslmode'])) {
            $config['sslmode'] = $query_params['sslmode'];
        }
    }
    
    // Default to require SSL for Render (if not specified)
    if (!$config['sslmode'] && strpos($url, 'render.com') !== false) {
        $config['sslmode'] = 'require';
    }
    
    return $config;
}

// Check if config_environment.php exists and use it for configuration
// Use a flag to prevent circular dependency when getDBConnection() calls this file
// IMPORTANT: Environment variables (from Docker/Render) take precedence over config_environment.php
$env_config = null;
$fallback_config = [
    'connection' => 'mysql',
    'host' => 'localhost',
    'port' => 3306,
    'database' => 'elearn_db',
    'username' => 'root',
    'password' => ''
];

// Only use config_environment.php if environment variables are NOT set (for local development)
// This ensures Render/Docker environment variables always take precedence
$has_render_env = getenv('DATABASE_URL') !== false || (getenv('DB_HOST') !== false && strpos(getenv('DB_HOST'), 'render.com') !== false);
$has_docker_env = getenv('DB_HOST') !== false || getenv('DB_USER') !== false || getenv('DB_PASS') !== false;

if (!$has_render_env && !$has_docker_env && file_exists(__DIR__ . '/../config_environment.php') && !defined('DB_CONN_INIT')) {
    define('DB_CONN_INIT', true);
    // Include config_environment.php - it returns the config array
    // The getDBConnection() function won't be called during this include
    $env_config = include __DIR__ . '/../config_environment.php';
    if (is_array($env_config) && isset($env_config['db_host'])) {
        $db_config = [
            'connection' => $env_config['db_connection'] ?? 'mysql',
            'host' => $env_config['db_host'],
            'port' => $env_config['db_port'] ?? 3306,
            'database' => $env_config['db_name'],
            'username' => $env_config['db_user'],
            'password' => $env_config['db_pass'] ?? ''
        ];
        
        // Store original config for fallback
        $fallback_config = $db_config;
    }
}

// Static variables to store connections (singleton pattern)
static $pdo_connection = null;
static $mysqli_connection = null;

/**
 * Get PDO database connection
 * Supports both MySQL and PostgreSQL (for Render)
 * 
 * @return PDO
 * @throws PDOException
 */
function getPDOConnection() {
    global $pdo_connection, $db_config, $fallback_config, $env_config;
    
    if ($pdo_connection === null) {
        $last_error = null;
        $is_postgres = ($db_config['connection'] ?? 'mysql') === 'pgsql';
        
        try {
            if ($is_postgres) {
                // PostgreSQL connection (for Render)
                $dsn = "pgsql:host={$db_config['host']};port={$db_config['port']};dbname={$db_config['database']}";
                
                // Add SSL mode for Render
                if (!empty($db_config['sslmode'])) {
                    $dsn .= ";sslmode={$db_config['sslmode']}";
                }
                
                error_log("Connecting to PostgreSQL at {$db_config['host']}:{$db_config['port']} with sslmode={$db_config['sslmode']}");
            } else {
                // MySQL connection (for local development)
                $port = isset($db_config['port']) && $db_config['port'] != '3306' ? ";port={$db_config['port']}" : '';
                $dsn = "mysql:host={$db_config['host']}{$port};dbname={$db_config['database']};charset=utf8mb4";
                
                error_log("Connecting to MySQL at {$db_config['host']}:{$db_config['port']}");
            }
            
            $pdo_connection = new PDO(
                $dsn,
                $db_config['username'],
                $db_config['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
            
            error_log("Successfully connected to database");
        } catch (PDOException $e) {
            $last_error = $e->getMessage();
            error_log("Database connection failed with primary config: " . $last_error);
            
            // If on localhost and main connection failed, try fallback to MySQL
            if ($env_config !== null && $db_config !== $fallback_config) {
                $hostname = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 
                           (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'localhost');
                $is_localhost = (
                    $hostname === 'localhost' ||
                    strpos($hostname, 'localhost') !== false ||
                    strpos($hostname, '127.0.0.1') !== false
                );
                
                if ($is_localhost && $is_postgres) {
                    error_log("PostgreSQL connection failed on localhost, attempting MySQL fallback");
                    try {
                        // Try MySQL fallback
                        $dev_config = [
                            'connection' => 'mysql',
                            'host' => 'localhost',
                            'port' => 3306,
                            'database' => 'elearn_db',
                            'username' => 'root',
                            'password' => ''
                        ];
                        
                        $dsn = "mysql:host={$dev_config['host']};port={$dev_config['port']};dbname={$dev_config['database']};charset=utf8mb4";
                        $pdo_connection = new PDO(
                            $dsn,
                            $dev_config['username'],
                            $dev_config['password'],
                            [
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_EMULATE_PREPARES => false
                            ]
                        );
                        error_log("Successfully connected using MySQL fallback");
                    } catch (PDOException $e2) {
                        error_log("MySQL fallback also failed: " . $e2->getMessage());
                        throw new PDOException(
                            "Database connection failed. PostgreSQL: " . $last_error . 
                            " | MySQL Fallback: " . $e2->getMessage()
                        );
                    }
                } else {
                    throw new PDOException("Database connection failed: " . $last_error);
                }
            } else {
                throw new PDOException("Database connection failed: " . $last_error);
            }
        }
    }
    
    return $pdo_connection;
}

/**
 * Get mysqli database connection
 * MySQL only (for local development)
 * Note: PostgreSQL on Render uses PDO only
 * 
 * @return mysqli
 * @throws Exception
 */
function getMysqliConnection() {
    global $mysqli_connection, $db_config, $env_config;
    
    // If using PostgreSQL (Render), return null - use PDO instead
    if (($db_config['connection'] ?? 'mysql') === 'pgsql') {
        error_log("PostgreSQL detected - use getPDOConnection() instead of getMysqliConnection()");
        return null;
    }
    
    if ($mysqli_connection === null) {
        $last_error = null;
        
        // Use port if specified and not default
        $port = isset($db_config['port']) && $db_config['port'] != '3306' ? (int)$db_config['port'] : null;
        $mysqli_connection = new mysqli(
            $db_config['host'],
            $db_config['username'],
            $db_config['password'],
            $db_config['database'],
            $port
        );
        
        if ($mysqli_connection->connect_error) {
            $last_error = $mysqli_connection->connect_error;
            error_log("Database connection failed with primary config: " . $last_error);
            
            // Close failed connection
            $mysqli_connection->close();
            $mysqli_connection = null;
            
            // If using environment config and it failed, try fallback to development credentials
            if ($env_config !== null) {
                // Check if we're likely on localhost (development environment)
                $hostname = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 
                           (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'localhost');
                $is_localhost = (
                    $hostname === 'localhost' ||
                    strpos($hostname, 'localhost') !== false ||
                    strpos($hostname, '127.0.0.1') !== false
                );
                
                if ($is_localhost) {
                    error_log("Attempting fallback to development credentials (localhost detected)");
                    // Try development credentials as fallback
                    $dev_config = [
                        'host' => 'localhost',
                        'database' => 'elearn_db',
                        'username' => 'root',
                        'password' => '',
                        'port' => '3306'
                    ];
                    $dev_port = isset($dev_config['port']) && $dev_config['port'] != '3306' ? (int)$dev_config['port'] : null;
                    $mysqli_connection = new mysqli(
                        $dev_config['host'],
                        $dev_config['username'],
                        $dev_config['password'],
                        $dev_config['database'],
                        $dev_port
                    );
                    
                    if ($mysqli_connection->connect_error) {
                        $error_msg = "Connection failed: " . $last_error . " (Fallback also failed: " . $mysqli_connection->connect_error . ")";
                        error_log($error_msg);
                        $mysqli_connection->close();
                        $mysqli_connection = null;
                        throw new Exception($error_msg);
                    } else {
                        error_log("Successfully connected using development credentials fallback");
                    }
                } else {
                    $error_msg = "Connection failed: " . $last_error;
                    error_log($error_msg);
                    throw new Exception($error_msg);
                }
            } else {
                $error_msg = "Connection failed: " . $last_error;
                error_log($error_msg);
                throw new Exception($error_msg);
            }
        }
        
        // Set charset to utf8mb4 for proper Unicode support
        $mysqli_connection->set_charset("utf8mb4");
    }
    
    return $mysqli_connection;
}

/**
 * Close all database connections
 * Useful for cleanup or testing
 */
function closeConnections() {
    global $pdo_connection, $mysqli_connection;
    
    if ($pdo_connection !== null) {
        $pdo_connection = null;
    }
    
    if ($mysqli_connection !== null) {
        $mysqli_connection->close();
        $mysqli_connection = null;
    }
}

// For backward compatibility, create global variables if they don't exist
// This allows existing code to work without immediate refactoring
if (!isset($GLOBALS['pdo'])) {
    try {
        $GLOBALS['pdo'] = getPDOConnection();
    } catch (Exception $e) {
        error_log("Warning: PDO connection failed - " . $e->getMessage());
        // Silently fail if PDO connection cannot be established
    }
}

// Only create mysqli connection if using MySQL
if (!isset($GLOBALS['conn']) && ($db_config['connection'] ?? 'mysql') === 'mysql') {
    try {
        $GLOBALS['conn'] = getMysqliConnection();
    } catch (Exception $e) {
        error_log("Warning: mysqli connection failed - " . $e->getMessage());
        // Silently fail if mysqli connection cannot be established
    }
}

