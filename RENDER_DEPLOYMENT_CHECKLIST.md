# Render Deployment Checklist

## Pre-Deployment Setup

### Step 1: Prepare Your Render Database
- [ ] Create PostgreSQL database in Render
- [ ] Copy the "External Database URL" 
- [ ] Verify URL format: `postgresql://user:pass@hostname.c.render.com:5432/db?sslmode=require`

### Step 2: Configure Environment Variables in Render

Go to your Render service → Environment tab → Add:

```
DATABASE_URL=postgresql://[paste_your_database_url_here]
GEMINI_API_KEY=[your_api_key]
```

- [ ] DATABASE_URL is set
- [ ] GEMINI_API_KEY is set (if needed)
- [ ] Click "Save" to apply changes

### Step 3: Verify Local Development (Optional)

Create/update `user/.env`:
```env
GEMINI_API_KEY=your_api_key
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=elearn_db
DB_USERNAME=root
DB_PASSWORD=
```

- [ ] `.env` file created in `user/` directory
- [ ] `.env` added to `.gitignore` (don't commit credentials!)
- [ ] Run `php -S localhost:8000` to test locally
- [ ] Visit `test_db_connection.php` to verify connection

### Step 4: Push to Repository

```bash
cd c:\xampp\htdocs\capstone
git add .
git commit -m "Add Render PostgreSQL support"
git push origin main
```

- [ ] Changes committed to Git
- [ ] Pushed to GitHub repository
- [ ] Verified in GitHub web interface

### Step 5: Deploy to Render

- [ ] Go to Render Dashboard
- [ ] Select your service
- [ ] Click "Manual Deploy" or commit will auto-deploy
- [ ] Wait for build to complete
- [ ] Check "Logs" tab for any connection errors
- [ ] Test your app URL

## Post-Deployment Verification

### Check Connection

Visit: `https://your-render-app.onrender.com/test_db_connection.php`

Expected result: ✅ Connection Successful!

- [ ] Connection test passes
- [ ] Database tables are visible
- [ ] No error messages

### Monitor Logs

Go to Render Dashboard → Logs tab

- [ ] No "SQLSTATE[HY000]" errors
- [ ] No "No such file or directory" errors
- [ ] No authentication errors

### Test Application Features

- [ ] Login page works
- [ ] Data saves to database
- [ ] Data retrieves from database
- [ ] Eye tracking (if applicable) works

## Troubleshooting During Deployment

### Issue: "SQLSTATE[HY000] [2002] No such file or directory"

**Steps to Fix:**

1. Check Render Environment Variables
   - [ ] DATABASE_URL is set
   - [ ] DATABASE_URL format is correct
   - [ ] No extra spaces or quotes

2. Verify Database URL Format
   - [ ] Should contain `.c.render.com`
   - [ ] Should NOT contain `localhost`
   - [ ] Should contain `?sslmode=require`

3. Verify Database Exists
   - [ ] Check Render PostgreSQL database is active
   - [ ] Verify credentials match

4. Check Code
   - [ ] `db_connection.php` is updated
   - [ ] `.env` file exists locally (for testing)

### Issue: "Connection refused"

1. Verify hostname
   - [ ] Correct Render PostgreSQL hostname
   - [ ] No typos in DATABASE_URL

2. Verify port
   - [ ] Port 5432 (PostgreSQL default)
   - [ ] Port open in Render

3. Check database
   - [ ] Database service running
   - [ ] Not in sleep state

### Issue: "Password authentication failed"

1. Check credentials
   - [ ] Username correct in DATABASE_URL
   - [ ] Password correct (no special chars issues)
   - [ ] Copy-pasted exactly from Render

2. Reset if needed
   - [ ] Copy fresh URL from Render Dashboard
   - [ ] Update in Render Environment Variables

## Database Migration (If Migrating from MySQL)

### If Moving from Local MySQL to Render PostgreSQL:

- [ ] Export MySQL data (if applicable)
- [ ] Check SQL compatibility
- [ ] Update queries if needed (MySQL → PostgreSQL syntax differences)
- [ ] Test with PostgreSQL locally first

**Common differences:**
- MySQL: `AUTO_INCREMENT` → PostgreSQL: `SERIAL` or `GENERATED ALWAYS`
- MySQL: `LIMIT 10 OFFSET 5` → PostgreSQL: `LIMIT 10 OFFSET 5` (same)
- MySQL: `NOW()` → PostgreSQL: `NOW()` or `CURRENT_TIMESTAMP` (same)

## Testing Checklist

### Unit Tests
- [ ] Database connection tests pass
- [ ] Query execution tests pass
- [ ] Error handling tests pass

### Integration Tests
- [ ] Login functionality works
- [ ] Data persistence works
- [ ] Data retrieval works
- [ ] API endpoints respond

### Manual Testing
- [ ] Visit home page - no errors
- [ ] Create account - saves to database
- [ ] Login - retrieves from database
- [ ] Perform main actions - data updates correctly

## Files to Review

| File | Purpose | Status |
|------|---------|--------|
| `database/db_connection.php` | Main connection code | ✅ Updated |
| `user/.env` | Local environment config | ✅ Updated |
| `RENDER_SETUP.md` | Detailed setup guide | ✅ Created |
| `RENDER_ENV_SETUP.sh` | Environment script | ✅ Created |
| `test_db_connection.php` | Connection test tool | ✅ Created |
| `RENDER_FIX_SUMMARY.md` | Quick reference | ✅ Created |

## Final Checklist

- [ ] All environment variables set in Render
- [ ] Database URL verified format
- [ ] Code changes committed and pushed
- [ ] App deployed to Render
- [ ] Connection test passes
- [ ] Application features work correctly
- [ ] No errors in Render logs
- [ ] Credentials not in Git repository
- [ ] Documentation reviewed
- [ ] Team notified of deployment

## Rollback Plan (If Issues)

If something goes wrong:

1. Check error logs in Render
2. Review environment variables
3. Verify database is accessible
4. Restore previous git commit if needed:
   ```bash
   git revert [commit_hash]
   ```
5. Re-deploy

## Quick Reference

### Get Render Database URL
1. Render Dashboard → PostgreSQL database
2. Click "Connect"
3. Copy "External Database URL"

### Set Environment Variable in Render
1. Service → Environment tab
2. Add new variable
3. Name: `DATABASE_URL`
4. Value: `postgresql://...` (paste your URL)
5. Click "Save"

### Test Connection
1. SSH into Render (optional)
2. Or visit: `/test_db_connection.php`
3. Should show: ✅ Connection Successful!

### View Logs
1. Render Dashboard → Your Service
2. Click "Logs" tab
3. Look for connection messages

## Support & Help

- **Setup Issues?** → Check `RENDER_SETUP.md`
- **Connection Errors?** → Run `test_db_connection.php`
- **Code Changes?** → See `database/db_connection.php`
- **Environment Help?** → See `.env` template in `user/`
- **Render Docs:** https://render.com/docs

---

**Status:** Ready for Render PostgreSQL deployment 🚀

Last Updated: 2025-11-28
