# Render PostgreSQL Database Setup Guide

## Problem Fixed
The error `SQLSTATE[HY000] [2002] No such file or directory` occurs because:
- The app was trying to use **Unix socket connections** (localhost)
- Render PostgreSQL requires **TCP connections** with explicit host/port
- SSL must be enabled for secure connections

## Solution Overview

Your updated `db_connection.php` now:
✅ Parses Render's `DATABASE_URL` automatically  
✅ Supports both PostgreSQL (Render) and MySQL (local development)  
✅ Handles SSL/TLS connections securely  
✅ Falls back to local MySQL if needed  

---

## Setup Instructions

### Step 1: Get Your Database URL from Render

1. Go to your Render Dashboard
2. Click on your PostgreSQL database
3. Copy the **External Database URL**
4. It should look like:
```
postgresql://username:password@hostname.c.render.com:5432/dbname?sslmode=require
```

### Step 2: Add Environment Variables to Render

Go to your Render service → **Environment** tab, and add:

```
DATABASE_URL=postgresql://username:password@hostname.c.render.com:5432/dbname?sslmode=require
```

**That's it!** The `db_connection.php` will automatically parse this URL.

### Step 3: For Local Development (Optional)

Create `.env` in your `user/` directory with MySQL credentials:

```env
GEMINI_API_KEY=your_api_key_here

# Local MySQL Development (optional)
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=elearn_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## Environment Variables Reference

### For Render PostgreSQL

| Variable | Value | Example |
|----------|-------|---------|
| `DATABASE_URL` | Full Render DB URL | `postgresql://user:pass@host:5432/db?sslmode=require` |

**OR individual variables:**

| Variable | Value | Default |
|----------|-------|---------|
| `DB_CONNECTION` | `pgsql` | auto-detected |
| `DB_HOST` | Render hostname | (from DATABASE_URL) |
| `DB_PORT` | `5432` | 5432 |
| `DB_DATABASE` | Database name | (from DATABASE_URL) |
| `DB_USERNAME` | Database user | (from DATABASE_URL) |
| `DB_PASSWORD` | Database password | (from DATABASE_URL) |
| `DB_SSLMODE` | `require` | require |

### For Local MySQL Development

| Variable | Value | Default |
|----------|-------|---------|
| `DB_CONNECTION` | `mysql` | mysql |
| `DB_HOST` | `localhost` | localhost |
| `DB_PORT` | `3306` | 3306 |
| `DB_DATABASE` | Database name | elearn_db |
| `DB_USERNAME` | Database user | root |
| `DB_PASSWORD` | Database password | (empty) |

---

## Usage in Your Code

### Using PDO (Recommended for Render)

```php
<?php
require_once __DIR__ . '/database/db_connection.php';

// Get PDO connection (works for both MySQL and PostgreSQL)
try {
    $pdo = getPDOConnection();
    
    // Use prepared statements
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
}
?>
```

### Using mysqli (MySQL only)

```php
<?php
require_once __DIR__ . '/database/db_connection.php';

// Get mysqli connection (MySQL only)
try {
    $conn = getMysqliConnection();
    
    if ($conn) {
        $result = $conn->query("SELECT * FROM users WHERE id = 1");
        $user = $result->fetch_assoc();
    }
} catch (Exception $e) {
    error_log("Database error: " . $e->getMessage());
}
?>
```

---

## Troubleshooting

### Error: "SQLSTATE[HY000] [2002] No such file or directory"

**Cause:** Unix socket connection attempt  
**Fix:** Ensure `DATABASE_URL` is set with `hostname.c.render.com` (TCP connection)

### Error: "SSL negotiation failed"

**Cause:** Missing or incorrect SSL mode  
**Fix:** Ensure `sslmode=require` is in `DATABASE_URL`

### Error: "Connection refused"

**Cause:** Wrong hostname or port  
**Fix:** Double-check Render Database URL in Render Dashboard

### Connection works locally but fails on Render

**Cause:** Environment variables not set  
**Fix:** Add `DATABASE_URL` to Render Environment variables

### How to Debug

Enable detailed logging in `db_connection.php`:

```php
error_log("Database config: " . json_encode($db_config, JSON_UNESCAPED_SLASHES));
```

Check logs:
- **Render:** Dashboard → Logs tab
- **Local:** Check `error_log` in PHP configuration

---

## Connection String Examples

### Render PostgreSQL
```
postgresql://elearn_user:SecurePassword123@elearn.c.render.com:5432/elearn_db?sslmode=require
```

### Local MySQL
```
mysql://root:@localhost:3306/elearn_db
```

---

## Important Notes

⚠️ **Never commit actual credentials to Git**
- Use environment variables on production
- Use `.gitignore` for local `.env` files

⚠️ **Always use SSL for PostgreSQL on Render**
- `sslmode=require` is mandatory

⚠️ **Database URL parsing is automatic**
- No manual parsing needed
- Just set `DATABASE_URL` and let the code handle it

---

## Testing Your Connection

Create a test file `test_db_connection.php`:

```php
<?php
require_once __DIR__ . '/database/db_connection.php';

try {
    $pdo = getPDOConnection();
    echo "✅ PDO Connection successful!<br>";
    
    // Test query
    $result = $pdo->query("SELECT 1 as test");
    echo "✅ Query executed successfully!<br>";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
    echo "Check your DATABASE_URL environment variable.";
}
?>
```

Access: `http://localhost/capstone/test_db_connection.php`

---

## Migration from MySQL to PostgreSQL

If migrating existing MySQL data:

1. **Export MySQL data:** Use `mysqldump`
2. **Convert syntax:** Some SQL dialects differ (e.g., `AUTO_INCREMENT` vs `SERIAL`)
3. **Update queries:** Replace MySQL-specific functions if used
4. **Test thoroughly:** Run your test suite before deploying

For help with migration, see the database migration files in `database/` folder.

---

## Support

For more information:
- [Render PostgreSQL Docs](https://render.com/docs/databases)
- [PHP PDO PostgreSQL](https://www.php.net/manual/en/ref.pdo-pgsql.php)
- Check error logs: `error_log()` output in Render dashboard

