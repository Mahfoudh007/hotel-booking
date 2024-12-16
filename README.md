# Hotel Management System

This project is a **Hotel Management System** built with PHP, MySQL, HTML, CSS, and JavaScript. It allows users to book rooms, manage bookings, and provides an admin panel for managing rooms and user bookings.

## Features

### User Features
- View available rooms with prices and descriptions.
- Book rooms with check-in and check-out dates.
- Login and register functionality for users.

### Admin Features
- Add new rooms to the system.
- Edit room details.
- Delete rooms.
- View and manage user bookings.
- Cancel bookings.

### Technologies Used
- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Icons**: Font Awesome

## Project Structure
```plaintext
project-folder/
│
├── config/
│   ├── config.php          # Database connection and configuration
│
├── public/
│   ├── home.php            # User-facing homepage
│   ├── login.php           # User login page
│   ├── register.php        # User registration page
│
├── admin/
│   ├── admin_dashboard.php # Admin panel
│   ├── add_room.php        # Add new room functionality
│   ├── edit_room.php       # Edit room details
│   ├── delete_room.php     # Delete room functionality
│
├── assets/
│   ├── css/                # CSS files
│   ├── js/                 # JavaScript files
│   ├── images/             # Project images
│
├── README.md               # Project documentation
