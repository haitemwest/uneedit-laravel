@echo off
title LARAVEL SERVER

:menu
cls
color 0b
echo ====================================
echo Laravel Development Tasks
echo ====================================
echo 1. Run Server
echo 2. Run Migrations
echo 3. Rollback Migrations
echo 4. Seed Database
echo 5. Clear Cache
echo 6. Install Dependencies (Composer & NPM)
echo 7. Compile Assets (Laravel Mix)
echo 8. Exit
echo ====================================
set /p choice="Enter your choice: "

if %choice% == 1 goto run_server
if %choice% == 2 goto migrate_server

if %choice% == 8 exit

:run_server
cls
color 0a
echo Running Laravel Server...
php artisan serve
pause
goto menu

:migrate_server
cls
color 0b
echo Migrating server...
php artisan migrate:fresh
pause
goto menu