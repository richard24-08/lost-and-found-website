# README STS

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



# README SAS

# Lost and Found Website
This website is designed to help students easily report and find lost or left-behind items within the school environment.

## Features
- **Authentication System** - Login and logout functionality
- **Role-based Access** - Admin and regular user roles
- **Item Reporting** - Report lost or found items with detailed information
- **Search Functionality** - Search items by name, description, or location
- **User Management** - Admin can manage users and reports
- **Profile Management** - Users can update their profiles and photos

## Technologies
- **Backend**: Laravel and Javascript
- **Frontend**: Blade Templates and Tailwind CSS
- **Database**: MySQL (phpMyAdmin)
- **Icons**: Font Awesome
- **Charts**: Chart.js
- **Development**: Laragon and Visual Studio Code
- **Design**: Figma

## Project Structure
- `Controllers`
  - AuthController
  - ReportController
  - UserController
  - AdminController

- `Models`
  - User
  - Report

- `Migrations`
  - create_users_table
  - create_reports_table

- `Views (Blade)`
  - auth/login.blade.php

    *Admin*
    - dashboard.blade.php
    - userlist.blade.php
    - reportlist.blade.php

    *User*
    - home.blade.php
    - itemdetail.blade.php
    - myreport.blade.php
    - profile.blade.php
    - reportnewitem.blade.php
    - viewallreports.blade.php

- `Middleware`
    - CheckAdmin.php
  
- `Seeder`
    - DatabaseSeeder
    - ReportSeeder
    - UserSeeder

- `Routing`
  - routes/web.php

- `Styling`
  - Tailwind CSS is used for styling and layout. 

## Database Setup

### 1. Environment Configuration
Update your `.env` file with database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projectweb_lnf
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Database Migration
Run the following commands to set up the database:
```bash
# Create database tables
php artisan migrate

# Seed with sample data (optional)
php artisan db:seed

# Or run migrations with seeding
php artisan migrate --seed
```

### 3. Key Database Tables

#### Users Table
- `id` - Primary key
- `name` - User's full name
- `email` - User's email address
- `password` - Hashed password
- `status` - User role (Guru/Murid)
- `department` - User's department
- `phone_number` - Contact number
- `birth_date` - Date of birth
- `image_path` - Profile photo path

#### Reports Table
- `id` - Primary key
- `item_name` - Name of the lost/found item
- `reporter_name` - Name of the person reporting
- `finder_name` - Name of the person who found the item
- `location` - Where the item was found/lost
- `last_seen` - Last known location (for lost items)
- `time_lost` - When the item was lost
- `time_found` - When the item was found
- `description` - Detailed description
- `category` - Item category (Electronics, Accessories, etc.)
- `brand` - Item brand
- `size` - Item size
- `color` - Item color
- `image_path` - Item photo path
- `report_type` - Type of report (lost/found)

## Main Entities

### 1. User Entity
- **Attributes**: name, email, status, department, contact info
- **Relationships**: 
  - Has many Reports (as reporter)
  - Has many Reports (as finder)

### 2. Report Entity
- **Attributes**: item details, location, timestamps, description, category
- **Relationships**:
  - Belongs to User (reporter)
  - Belongs to User (finder)

## Application Flow

### For Regular Users:
1. **Login** - Authenticate with credentials
2. **Home** - View reported items and statistics
3. **Item Detail** - View details about the lost/found item
4. **Report Items** - Create new lost/found item reports
5. **My Reports** - View personal report history
6. **View All Reports** - Browse all reported items
7. **Profile Management** - Update personal information

### For Admin Users:
1. **Admin Dashboard** - Overview with charts and statistics
2. **User List** - View and manage all users
3. **Report List** - Manage all item reports
4. **Analytics** - View reports over time and category distribution

## Key Features Details

### Authentication & Authorization
- Middleware protection for routes
- Role-based access control (Guru/Murid)
- Session-based authentication

### Item Reporting
- Support for both lost and found items
- Image upload functionality
- Categorized item organization
- Search and filter capabilities

### Admin Features
- User management with delete functionality
- Report management with delete capability
- Statistical dashboard with charts
- Pagination for large datasets

## Contribution
We welcome anyone who is interested in contributing to the `Lost and Found Website` to help make it better, more useful, and engaging. Every idea, suggestion, or improvement is highly appreciated!

## Development Team
- **Project**: Lost and Found System
- **Purpose**: School item recovery platform
- **Status**: Active Development

---

*Note: This documentation covers the current state of the application. For the latest updates, refer to the codebase and recent commits.*
