# Lost and Found Website
This website is designed to help students easily report and find lost or left-behind items within the school environment.

## Features
- Login
- Dashboard
- Item Management (Add, View Details, and Report Found Items)
- User Profile

## Technologies
- Laravel
- Blade
- Tailwind CSS
- phpMyAdmin
- GitHub
- Laragon
- Visual Studio Code
- Figma

## Flow
1. The user logs in.
2. After logging in, the user is redirected to the dashboard.
3. From the dashboard, the user can view the list of items or add a new item report.
4. The user can also view and edit their profile.

## Project Structure
- `Controllers`
  - AuthController
  - BarangController
  - UserController

- `Models`
  - User
  - Barang

- `Migrations`
  - create_users_table
  - create_barang_table

- `Views (Blade)`
  - login.blade.php
  - dashboard.blade.php

- `Routing`
  - routes/web.php

- `Styling`
  - Tailwind CSS is used for styling and layout. 

## Contribution
We welcome anyone who is interested in contributing to the `Lost and Found Website` to help make it better, more useful, and engaging. Every idea, suggestion, or improvement is highly appreciated!