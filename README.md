# Credentials & Project Management System

A comprehensive Laravel-based system for securely storing and managing all your development credentials, API tokens, projects, servers, database credentials, and important files.

## 🎯 Features

### 1. **Credentials Management**
- Store API tokens (GitHub, OpenAI, AWS, etc.)
- Encrypted storage of sensitive values
- Organize by service and type
- Quick copy-to-clipboard functionality

### 2. **Projects Management**
- Track all your projects
- Store GitHub repository links
- Live URL tracking
- Tech stack documentation
- Project status (Active, Development, Archived)
- Link projects to servers
- Attach database credentials
- Store project-related files

### 3. **Server Management**
- Store server details (IP, provider, port)
- Encrypted SSH credentials (username, password, SSH keys)
- Encrypted cPanel credentials
- Server status tracking
- Link multiple projects to servers

### 4. **Database Credentials**
- Store database connection details
- Support for MySQL, PostgreSQL, MongoDB, etc.
- Encrypted usernames and passwords
- Link to specific projects
- Connection string support

### 5. **File Storage**
- Upload important files (configs, documentation, backups)
- Categorize files
- Link files to projects
- Download files anytime
- Automatic file size formatting

## 🔒 Security Features

- **Encrypted Storage**: All sensitive data (passwords, tokens, SSH keys) are encrypted using Laravel's built-in encryption
- **User Isolation**: Users can only access their own data
- **Authorization Policies**: Comprehensive authorization checks on all operations
- **Secure File Storage**: Files are stored securely with unique names

## 📋 Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- SQLite (already configured) or MySQL/PostgreSQL

### Installation Steps

1. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Run Migrations**
   ```bash
   php artisan migrate
   ```

4. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

5. **Build Assets**
   ```bash
   npm run build
   ```

6. **Start Development Server**
   ```bash
   php artisan serve
   ```

7. **Access the Application**
   - Open your browser and go to: `http://localhost:8000`
   - Register a new account
   - Start adding your credentials!

## 🚀 Usage Guide

### Adding Credentials
1. Navigate to **Credentials** from the dashboard
2. Click **Add New Credential**
3. Fill in:
   - Name (e.g., "GitHub Personal Access Token")
   - Type (e.g., "api_token", "password", "ssh_key")
   - Value (the actual token/password - will be encrypted)
   - Service (e.g., "GitHub", "OpenAI")
   - Description (optional notes)
4. Click **Save**

### Adding Projects
1. Navigate to **Projects**
2. Click **Add New Project**
3. Fill in project details:
   - Name
   - Description
   - GitHub URL
   - Live URL
   - Status (Active/Development/Archived)
   - Tech Stack (select multiple technologies)
   - Server (optional - link to a server)
   - Notes
4. Click **Save**

### Adding Servers
1. Navigate to **Servers**
2. Click **Add New Server**
3. Fill in server details:
   - Name
   - IP Address
   - Provider (AWS, DigitalOcean, etc.)
   - Port (default: 22)
   - SSH credentials (encrypted)
   - cPanel credentials (encrypted)
   - Root password (encrypted)
   - Status
4. Click **Save**

### Adding Database Credentials
1. Navigate to **Database Credentials**
2. Click **Add New**
3. Fill in:
   - Name (e.g., "Production DB")
   - Type (MySQL, PostgreSQL, etc.)
   - Host
   - Port
   - Database Name
   - Username (encrypted)
   - Password (encrypted)
   - Link to Project (optional)
4. Click **Save**

### Uploading Files
1. Navigate to **Files**
2. Click **Upload File**
3. Select file (max 50MB)
4. Add name and description
5. Link to project (optional)
6. Choose category
7. Click **Upload**

## 🔄 Git Workflow for New PC

When you get a new PC, simply:

1. **Clone the repository**
   ```bash
   git clone <your-repo-url>
   cd admin
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run migrations**
   ```bash
   php artisan migrate
   ```

5. **Create storage link**
   ```bash
   php artisan storage:link
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start the application**
   ```bash
   php artisan serve
   ```

8. **Login with your account** - All your data will be there!

## 📁 Project Structure

```
admin/
├── app/
│   ├── Http/Controllers/
│   │   ├── CredentialController.php
│   │   ├── ProjectController.php
│   │   ├── ServerController.php
│   │   ├── DatabaseCredentialController.php
│   │   ├── StoredFileController.php
│   │   └── DashboardController.php
│   ├── Models/
│   │   ├── Credential.php (encrypted value)
│   │   ├── Project.php
│   │   ├── Server.php (encrypted credentials)
│   │   ├── DatabaseCredential.php (encrypted credentials)
│   │   └── StoredFile.php
│   └── Policies/
│       ├── CredentialPolicy.php
│       ├── ProjectPolicy.php
│       ├── ServerPolicy.php
│       ├── DatabaseCredentialPolicy.php
│       └── StoredFilePolicy.php
├── database/
│   ├── migrations/
│   │   ├── *_create_credentials_table.php
│   │   ├── *_create_projects_table.php
│   │   ├── *_create_servers_table.php
│   │   ├── *_create_database_credentials_table.php
│   │   └── *_create_stored_files_table.php
│   └── database.sqlite
├── resources/views/
│   ├── dashboard.blade.php
│   ├── credentials/
│   ├── projects/
│   ├── servers/
│   ├── database-credentials/
│   └── files/
└── routes/
    └── web.php
```

## 🗄️ Database Schema

### Credentials Table
- `id`, `user_id`, `name`, `type`, `value` (encrypted), `description`, `service`, `timestamps`

### Projects Table
- `id`, `user_id`, `name`, `description`, `github_url`, `live_url`, `status`, `tech_stack` (JSON), `server_id`, `notes`, `timestamps`

### Servers Table
- `id`, `user_id`, `name`, `ip_address`, `provider`, `port`, `ssh_username` (encrypted), `ssh_password` (encrypted), `ssh_key` (encrypted), `cpanel_url`, `cpanel_username` (encrypted), `cpanel_password` (encrypted), `root_password` (encrypted), `notes`, `status`, `timestamps`

### Database Credentials Table
- `id`, `user_id`, `project_id`, `name`, `type`, `host`, `port`, `database_name`, `username` (encrypted), `password` (encrypted), `connection_string` (encrypted), `notes`, `timestamps`

### Stored Files Table
- `id`, `user_id`, `project_id`, `name`, `original_name`, `file_path`, `file_type`, `file_size`, `description`, `category`, `timestamps`

## 🔐 Encryption

Laravel automatically encrypts the following fields:
- Credential values
- Server SSH credentials
- Server cPanel credentials
- Database usernames and passwords
- Database connection strings

The encryption uses your `APP_KEY` from the `.env` file. **Never share your APP_KEY!**

## 📝 Important Notes

1. **Backup your `.env` file** - It contains your encryption key
2. **Backup your database** - Contains all your encrypted data
3. **Use Git** - Commit regularly to track changes
4. **Don't commit `.env`** - It's already in `.gitignore`
5. **Keep your APP_KEY safe** - Without it, you can't decrypt your data

## 🎨 Customization

The system uses Laravel Breeze for authentication with Blade templates. You can customize:
- Views in `resources/views/`
- Styles in `resources/css/app.css`
- JavaScript in `resources/js/app.js`

## 🐛 Troubleshooting

### "Key not found" error
- Run: `php artisan key:generate`

### "Storage link not found"
- Run: `php artisan storage:link`

### "Permission denied" on storage
- Run: `chmod -R 775 storage bootstrap/cache` (Linux/Mac)
- Or give write permissions to `storage` and `bootstrap/cache` folders

### Database connection error
- Check your `.env` file
- Make sure `database/database.sqlite` exists
- Run: `touch database/database.sqlite` if it doesn't exist

## 📞 Support

This is a personal credentials management system. Keep it secure and private!

## 📄 License

Personal use only.
