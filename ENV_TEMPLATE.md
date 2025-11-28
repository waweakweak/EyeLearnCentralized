# Environment Configuration Template
# Copy this to user/.env and fill in your values
# IMPORTANT: Add .env to .gitignore to avoid committing credentials!

# ============================================
# 🔐 API KEYS & SECRETS
# ============================================
GEMINI_API_KEY=your_gemini_api_key_here


# ============================================
# 🗄️ DATABASE CONFIGURATION
# ============================================

# OPTION 1: Use DATABASE_URL (Recommended for Render)
# Format: postgresql://username:password@hostname:port/database?sslmode=require
# Get this from: Render Dashboard → PostgreSQL Database → External Database URL
DATABASE_URL=


# OPTION 2: Use individual variables (Alternative)
# Uncomment these to use instead of DATABASE_URL

# Connection type: mysql or pgsql
# DB_CONNECTION=mysql

# Database host
# For Render: use your hostname (*.c.render.com)
# For local: use localhost
# DB_HOST=localhost

# Database port
# MySQL default: 3306
# PostgreSQL default: 5432
# DB_PORT=3306

# Database name
# DB_DATABASE=elearn_db

# Database username
# DB_USERNAME=root

# Database password
# DB_PASSWORD=

# SSL Mode (for PostgreSQL on Render)
# Render requires: require
# Local MySQL: (leave empty)
# DB_SSLMODE=require


# ============================================
# 🌍 APPLICATION SETTINGS (OPTIONAL)
# ============================================

# Application environment
# APP_ENV=production

# Debug mode
# APP_DEBUG=false

# Application timezone
# APP_TIMEZONE=UTC


# ============================================
# 📧 EMAIL CONFIGURATION (IF NEEDED)
# ============================================

# MAIL_DRIVER=smtp
# MAIL_HOST=smtp.gmail.com
# MAIL_PORT=587
# MAIL_USERNAME=your_email@gmail.com
# MAIL_PASSWORD=your_app_password
# MAIL_FROM_ADDRESS=noreply@example.com


# ============================================
# 🔗 EXTERNAL API CONFIGURATION
# ============================================

# Add any other API keys or endpoints here
# EXTERNAL_API_KEY=
# EXTERNAL_API_URL=


# ============================================
# ℹ️ QUICK SETUP GUIDE
# ============================================
#
# FOR RENDER POSTGRESQL:
# 1. Go to Render Dashboard
# 2. Click your PostgreSQL database
# 3. Click "Connect"
# 4. Copy "External Database URL"
# 5. Paste into DATABASE_URL above
#
# FOR LOCAL MYSQL:
# 1. Use individual DB_* variables below
# 2. Set DB_HOST=localhost
# 3. Set DB_CONNECTION=mysql
# 4. Ensure MySQL is running locally
#
# NEVER COMMIT THIS FILE:
# Add to .gitignore:
#   user/.env
#   .env
# This prevents credentials from being exposed on GitHub!
#
