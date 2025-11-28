#!/bin/bash
# RENDER_ENV_SETUP.sh - Quick environment setup for Render deployment
# 
# Usage: Set these environment variables in your Render service
# 
# Copy the DATABASE_URL from Render Dashboard and paste it below

# ============================================
# RENDER SERVICE ENVIRONMENT VARIABLES
# ============================================

# 1. PostgreSQL Connection (Required)
# Get this from: Render Dashboard → PostgreSQL Database → External Database URL
export DATABASE_URL="postgresql://username:password@hostname.c.render.com:5432/database_name?sslmode=require"

# 2. (Optional) If you prefer individual variables instead of DATABASE_URL
# export DB_CONNECTION=pgsql
# export DB_HOST=hostname.c.render.com
# export DB_PORT=5432
# export DB_DATABASE=database_name
# export DB_USERNAME=username
# export DB_PASSWORD=password
# export DB_SSLMODE=require

# 3. API Keys and other secrets
export GEMINI_API_KEY="your_api_key_here"

# ============================================
# TO DEPLOY ON RENDER:
# ============================================
# 1. Go to Render Dashboard
# 2. Select your service
# 3. Click "Environment" tab
# 4. Add these variables:
#    - DATABASE_URL (REQUIRED - from PostgreSQL database)
#    - GEMINI_API_KEY (if your app needs it)
# 5. Click "Save"
# 6. Your app will automatically restart

# ============================================
# TO TEST LOCALLY:
# ============================================
# 1. Create user/.env file with:
#    DATABASE_URL=postgresql://user:pass@hostname:5432/db?sslmode=require
# 2. Run: php -S localhost:8000
# 3. Test: http://localhost:8000/test_db_connection.php

# ============================================
# TROUBLESHOOTING
# ============================================
# Error: "No such file or directory"
#   → DATABASE_URL is missing or uses localhost
#   → Solution: Use full hostname from Render (*.c.render.com)
#
# Error: "SSL connection error"
#   → SSL mode is not enabled
#   → Solution: Ensure ?sslmode=require in DATABASE_URL
#
# Check logs on Render:
#   → Dashboard → Logs tab → Look for connection errors

# --------------------------------------------
# NOTE: Using PostgreSQL on Render
# --------------------------------------------
# If you keep `DB_CONNECTION=pgsql` and use Render's PostgreSQL instance,
# the runtime PHP container must have the `pdo_pgsql` extension available.
# The repository includes a `Dockerfile` that installs `libpq-dev` and
# enables `pdo_pgsql`. To use that Dockerfile on Render:
# 1. In Render Dashboard → Service → Settings → Build & Deploy
# 2. Choose "Use Dockerfile" or set the service to a Docker build
# 3. Deploy; the Dockerfile will produce an image with `pdo_pgsql`
#
# If you prefer not to use Docker, you can set `DB_CONNECTION=mysql`
# and use Render's default PHP runtime (which includes `pdo_mysql`).
# However, PostgreSQL-specific SQL/features may not be compatible with MySQL.
