<?php
/**
 * Database Connection Test
 * 
 * This file tests your database connection configuration
 * Access it at: http://localhost/capstone/test_db_connection.php
 * 
 * It will show you:
 * - Current database configuration
 * - Connection status
 * - Database type (MySQL or PostgreSQL)
 * - Test queries
 */

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start output buffering for clean display
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }
        h2 {
            color: #555;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        .config-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        .config-table tr {
            border-bottom: 1px solid #eee;
        }
        .config-table td {
            padding: 12px;
        }
        .config-table td:first-child {
            width: 30%;
            font-weight: bold;
            background: #f9f9f9;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #28a745;
            margin: 15px 0;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #f5c6cb;
            margin: 15px 0;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #bee5eb;
            margin: 15px 0;
        }
        .warning {
            background: #fff3cd;
            color: #856404;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #ffeaa7;
            margin: 15px 0;
        }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
        pre {
            background: #f4f4f4;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
            border-left: 4px solid #999;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
            margin: 0 5px 0 0;
        }
        .badge-success {
            background: #28a745;
            color: white;
        }
        .badge-danger {
            background: #dc3545;
            color: white;
        }
        .badge-info {
            background: #17a2b8;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🗄️ Database Connection Test</h1>
        
        <?php
        // Load environment
        $env_file = __DIR__ . '/user/.env';
        if (file_exists($env_file)) {
            $lines = file($env_file);
            foreach ($lines as $line) {
                $line = trim($line);
                if (!empty($line) && $line[0] !== '#' && strpos($line, '=') !== false) {
                    list($key, $value) = explode('=', $line, 2);
                    putenv(trim($key) . '=' . trim($value));
                }
            }
        }
        
        // Load database connection
        require_once __DIR__ . '/database/db_connection.php';
        
        // Get configuration
        $db_host = getenv('DB_HOST') ?: 'Not set';
        $db_port = getenv('DB_PORT') ?: 'Not set';
        $db_user = getenv('DB_USERNAME') ?: getenv('DB_USER') ?: 'Not set';
        $db_name = getenv('DB_DATABASE') ?: getenv('DB_NAME') ?: 'Not set';
        $db_connection = getenv('DB_CONNECTION') ?: 'Not set';
        $database_url = getenv('DATABASE_URL') ?: 'Not set';
        $db_sslmode = getenv('DB_SSLMODE') ?: 'Not set';
        
        // Detect connection type
        $is_postgres = (strpos($database_url, 'postgresql://') !== false || 
                       strpos($db_connection, 'pgsql') !== false ||
                       strpos($db_host, 'render.com') !== false);
        $is_mysql = !$is_postgres && strpos($db_host, 'localhost') !== false;
        
        ?>
        
        <h2>📋 Configuration</h2>
        
        <table class="config-table">
            <tr>
                <td>DATABASE_URL</td>
                <td>
                    <?php if ($database_url !== 'Not set'): ?>
                        <span class="badge badge-info">SET</span>
                        <code><?php echo htmlspecialchars(substr($database_url, 0, 50)) . '...'; ?></code>
                    <?php else: ?>
                        <span class="badge badge-danger">NOT SET</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>DB_CONNECTION</td>
                <td>
                    <?php if ($db_connection !== 'Not set'): ?>
                        <span class="badge badge-info">SET</span>
                        <code><?php echo htmlspecialchars($db_connection); ?></code>
                    <?php else: ?>
                        <span class="badge badge-danger">NOT SET</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>DB_HOST</td>
                <td>
                    <?php if ($db_host !== 'Not set'): ?>
                        <span class="badge badge-info">SET</span>
                        <code><?php echo htmlspecialchars($db_host); ?></code>
                    <?php else: ?>
                        <span class="badge badge-danger">NOT SET</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>DB_PORT</td>
                <td><code><?php echo htmlspecialchars($db_port); ?></code></td>
            </tr>
            <tr>
                <td>DB_DATABASE</td>
                <td><code><?php echo htmlspecialchars($db_name); ?></code></td>
            </tr>
            <tr>
                <td>DB_USERNAME</td>
                <td><code><?php echo htmlspecialchars($db_user); ?></code></td>
            </tr>
            <tr>
                <td>DB_SSLMODE</td>
                <td><code><?php echo htmlspecialchars($db_sslmode); ?></code></td>
            </tr>
        </table>
        
        <h2>🔍 Detected Setup</h2>
        
        <?php
        if ($is_postgres) {
            echo '<div class="info"><strong>Database Type:</strong> PostgreSQL (Render)</div>';
            if (strpos($db_host, 'render.com') !== false) {
                echo '<div class="success">✅ Using Render PostgreSQL hostname</div>';
            } else {
                echo '<div class="warning">⚠️ PostgreSQL detected but hostname doesn\'t look like Render</div>';
            }
        } elseif ($is_mysql) {
            echo '<div class="info"><strong>Database Type:</strong> MySQL (Local Development)</div>';
            echo '<div class="info">Using localhost for local development</div>';
        } else {
            echo '<div class="warning">⚠️ Could not determine database type</div>';
        }
        ?>
        
        <h2>🔗 Connection Test</h2>
        
        <?php
        $pdo = null;
        $connection_error = null;
        
        try {
            $pdo = getPDOConnection();
            
            // Test with simple query
            $test = $pdo->query("SELECT 1 as test");
            $result = $test->fetch();
            
            echo '<div class="success">✅ <strong>Connection Successful!</strong></div>';
            echo '<p>Database connection is working correctly.</p>';
            
            // Get database info
            if ($is_postgres) {
                $info = $pdo->query("SELECT version() as version")->fetch();
                echo '<div class="info"><strong>PostgreSQL Version:</strong> ' . htmlspecialchars($info['version']) . '</div>';
            } else {
                $info = $pdo->query("SELECT @@version as version")->fetch();
                echo '<div class="info"><strong>MySQL Version:</strong> ' . htmlspecialchars($info['version']) . '</div>';
            }
            
        } catch (PDOException $e) {
            $connection_error = $e->getMessage();
            echo '<div class="error">❌ <strong>Connection Failed!</strong></div>';
            echo '<p><strong>Error:</strong> ' . htmlspecialchars($connection_error) . '</p>';
            
            // Provide troubleshooting advice
            echo '<h3>🔧 Troubleshooting Tips:</h3>';
            
            if (strpos($connection_error, 'No such file or directory') !== false) {
                echo '<div class="error">';
                echo '<strong>Issue:</strong> Unix socket connection attempt<br>';
                echo '<strong>Solution:</strong><br>';
                echo '1. For Render: Ensure DATABASE_URL uses hostname (not localhost)<br>';
                echo '2. For local MySQL: Verify MySQL is running<br>';
                echo '3. Check credentials in .env file<br>';
                echo '</div>';
            } elseif (strpos($connection_error, 'Connection refused') !== false) {
                echo '<div class="error">';
                echo '<strong>Issue:</strong> Cannot connect to database server<br>';
                echo '<strong>Solution:</strong><br>';
                echo '1. Verify hostname/IP is correct<br>';
                echo '2. Check port number (MySQL: 3306, PostgreSQL: 5432)<br>';
                echo '3. Ensure database server is running<br>';
                echo '4. Check firewall rules<br>';
                echo '</div>';
            } elseif (strpos($connection_error, 'FATAL') !== false || strpos($connection_error, 'password') !== false) {
                echo '<div class="error">';
                echo '<strong>Issue:</strong> Authentication failed<br>';
                echo '<strong>Solution:</strong><br>';
                echo '1. Check username and password in .env<br>';
                echo '2. For Render: Verify DATABASE_URL from Dashboard<br>';
                echo '3. Ensure no extra spaces in credentials<br>';
                echo '</div>';
            }
            
            // Show detailed error
            echo '<div class="warning">';
            echo '<strong>Full Error Message:</strong><br>';
            echo '<pre>' . htmlspecialchars($connection_error) . '</pre>';
            echo '</div>';
        }
        ?>
        
        <?php if ($pdo && !$connection_error): ?>
        <h2>📊 Database Tables</h2>
        
        <?php
        try {
            if ($is_postgres) {
                $tables = $pdo->query("
                    SELECT table_name 
                    FROM information_schema.tables 
                    WHERE table_schema = 'public'
                    ORDER BY table_name
                ")->fetchAll();
            } else {
                $tables = $pdo->query("SHOW TABLES")->fetchAll();
            }
            
            if (count($tables) > 0) {
                echo '<div class="success">✅ Found ' . count($tables) . ' table(s)</div>';
                echo '<ul>';
                foreach ($tables as $row) {
                    $table = is_array($row) ? reset($row) : $row->table_name;
                    echo '<li><code>' . htmlspecialchars($table) . '</code></li>';
                }
                echo '</ul>';
            } else {
                echo '<div class="warning">⚠️ No tables found in database. Create your schema.</div>';
            }
        } catch (Exception $e) {
            echo '<div class="error">Error querying tables: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
        ?>
        
        <?php endif; ?>
        
        <h2>ℹ️ Next Steps</h2>
        
        <?php if ($connection_error): ?>
            <ol>
                <li>Check your <code>.env</code> file in <code>user/</code> directory</li>
                <li>For Render: Add <code>DATABASE_URL</code> to environment variables</li>
                <li>Format: <code>postgresql://user:pass@host:5432/db?sslmode=require</code></li>
                <li>Reload this page after making changes</li>
                <li>Check Render logs for detailed error messages</li>
            </ol>
        <?php else: ?>
            <ol>
                <li>✅ Connection is working!</li>
                <li>You can now use <code>getPDOConnection()</code> in your code</li>
                <li>Example: <code>$pdo = getPDOConnection();</code></li>
                <li>See <code>RENDER_SETUP.md</code> for detailed usage</li>
            </ol>
        <?php endif; ?>
        
        <h2>📚 Documentation</h2>
        
        <ul>
            <li><a href="../RENDER_SETUP.md">Full Setup Guide (RENDER_SETUP.md)</a></li>
            <li><a href="../database/db_connection.php">Database Connection Code</a></li>
            <li><a href="https://render.com/docs/databases">Render PostgreSQL Documentation</a></li>
        </ul>
        
        <hr style="margin-top: 40px; margin-bottom: 20px; border: none; border-top: 1px solid #ddd;">
        <p style="color: #999; font-size: 12px;">
            Last tested: <?php echo date('Y-m-d H:i:s'); ?><br>
            PHP Version: <?php echo phpversion(); ?><br>
            Server: <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?>
        </p>
    </div>
</body>
</html>
