@echo off
echo ========================================
echo  Credentials Management System Setup
echo ========================================
echo.

echo [1/7] Installing Composer dependencies...
call composer install
if %errorlevel% neq 0 (
    echo ERROR: Composer install failed!
    pause
    exit /b 1
)

echo.
echo [2/7] Installing NPM dependencies...
call npm install
if %errorlevel% neq 0 (
    echo ERROR: NPM install failed!
    pause
    exit /b 1
)

echo.
echo [3/7] Copying environment file...
if not exist .env (
    copy .env.example .env
    echo Environment file created!
) else (
    echo Environment file already exists, skipping...
)

echo.
echo [4/7] Generating application key...
call php artisan key:generate

echo.
echo [5/7] Running database migrations...
call php artisan migrate
if %errorlevel% neq 0 (
    echo ERROR: Migration failed!
    pause
    exit /b 1
)

echo.
echo [6/7] Creating storage link...
call php artisan storage:link

echo.
echo [7/7] Building frontend assets...
call npm run build

echo.
echo ========================================
echo  Setup Complete!
echo ========================================
echo.
echo Next steps:
echo 1. Run: php artisan serve
echo 2. Open: http://localhost:8000
echo 3. Register a new account
echo 4. Start managing your credentials!
echo.
echo Press any key to start the development server...
pause >nul

echo.
echo Starting development server...
call php artisan serve
