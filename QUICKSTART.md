# Credentials Management System - Quick Start Guide

## 🚀 First Time Setup (This PC)

Run the automated setup script:

```bash
setup.bat
```

This will:
1. Install all dependencies
2. Setup environment
3. Run migrations
4. Create storage link
5. Build assets
6. Start the development server

**OR** do it manually:

```bash
# Install dependencies
composer install
npm install

# Setup environment
copy .env.example .env
php artisan key:generate

# Setup database
php artisan migrate
php artisan storage:link

# Build assets
npm run build

# Start server
php artisan serve
```

## 🌐 Access the Application

1. Open your browser
2. Go to: `http://localhost:8000`
3. Click "Register" to create your account
4. Start adding your credentials!

## 📦 What to Store

### 1. API Tokens & Credentials
- GitHub Personal Access Tokens
- OpenAI API Keys
- AWS Access Keys
- Stripe API Keys
- Any other API tokens

### 2. Projects
- Project names and descriptions
- GitHub repository URLs
- Live website URLs
- Tech stack used
- Project notes

### 3. Servers
- Server IP addresses
- SSH credentials
- cPanel login details
- Root passwords
- Server provider info

### 4. Database Credentials
- MySQL/PostgreSQL credentials
- MongoDB connection strings
- Database hosts and ports
- Link to specific projects

### 5. Important Files
- Configuration files
- Documentation
- Backup files
- SSL certificates
- Any important documents

## 🔄 Setting Up on a New PC

When you get a new computer:

1. **Clone your repository**
   ```bash
   git clone <your-github-repo-url>
   cd admin
   ```

2. **Run setup**
   ```bash
   setup.bat
   ```

3. **Login with your account**
   - All your data will be there!
   - Download any files you need

## 💾 Git Workflow

### Initial Commit (First Time)

```bash
# Initialize git (if not done)
git init

# Add all files
git add .

# Commit
git commit -m "Initial commit: Credentials Management System"

# Add remote (create a PRIVATE repository on GitHub first!)
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git

# Push
git push -u origin main
```

### Regular Updates

```bash
# Add changes
git add .

# Commit with message
git commit -m "Updated credentials and added new project"

# Push to GitHub
git push
```

## ⚠️ IMPORTANT SECURITY NOTES

1. **NEVER commit your `.env` file** - It's already in `.gitignore`
2. **Use a PRIVATE repository** - Never make this public!
3. **Backup your `.env` file separately** - Store it securely
4. **Keep your APP_KEY safe** - Without it, you can't decrypt your data
5. **Use strong passwords** - For your account
6. **Enable 2FA on GitHub** - Protect your repository

## 📁 What Gets Stored Where

- **Database**: `database/database.sqlite` (encrypted credentials)
- **Files**: `storage/app/public/files/` (uploaded files)
- **Environment**: `.env` (encryption key - NOT in git)

## 🔐 Encryption

All sensitive data is automatically encrypted:
- Credential values
- Server passwords
- SSH keys
- Database passwords
- cPanel credentials

## 🎯 Common Tasks

### Add a New Credential
1. Dashboard → Credentials → Add New
2. Fill in the details
3. Save

### Add a New Project
1. Dashboard → Projects → Add New
2. Enter project details
3. Link to server (optional)
4. Save

### Upload a File
1. Dashboard → Files → Upload
2. Select file
3. Add description
4. Link to project (optional)
5. Upload

### Link Database to Project
1. Dashboard → Database Credentials → Add New
2. Select the project
3. Enter database details
4. Save

## 🛠️ Troubleshooting

### Can't login?
- Make sure you've run migrations: `php artisan migrate`
- Check if the server is running: `php artisan serve`

### Files not uploading?
- Run: `php artisan storage:link`
- Check storage permissions

### Lost encryption key?
- If you lose your `.env` file with the APP_KEY, you cannot decrypt your data
- Always backup your `.env` file!

### Database errors?
- Make sure `database/database.sqlite` exists
- Run: `php artisan migrate:fresh` (WARNING: This deletes all data!)

## 📞 Need Help?

Check the main `README.md` for detailed documentation.

## ✅ Checklist for New PC Setup

- [ ] Clone repository from GitHub
- [ ] Run `setup.bat`
- [ ] Login to your account
- [ ] Verify all credentials are there
- [ ] Download any needed files
- [ ] Start working!

---

**Remember**: This system contains sensitive information. Keep it secure and private!
