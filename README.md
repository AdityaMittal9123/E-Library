# E-Library

A digital library management system built with PHP that allows users to browse, search, and manage digital books. The application features user authentication, book cataloging, and administrative controls for managing the library collection.

## Table of Contents

- [Features](#features)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Database Setup](#database-setup)
- [Key Features Explained](#key-features-explained)

---

## Features

- **User Authentication**: Signup, login, and logout functionality
- **Email Verification**: Verify user email addresses during registration
- **Password Recovery**: Reset passwords via email
- **Book Management**: 
  - View all available books
  - Search for books
  - View detailed book information
  - Add new books (admin)
  - Edit book details (admin)
  - Delete books (admin)
- **User Management**: View user profiles and manage user accounts (admin)
- **Admin Dashboard**: Dedicated interface for library administrators
- **Email Notifications**: Automated email sending for verification and password recovery

---

## System Requirements

- **PHP**: 7.0 or higher
- **Database**: MySQL/MariaDB
- **Web Server**: Apache (with mod_rewrite enabled)
- **Composer**: For dependency management
- **Mail Server**: SMTP configuration for email functionality

---

## Installation

Follow these steps to set up the E-Library application on your local machine:

### Step 1: Clone the Repository

```bash
git clone https://github.com/AdityaMittal9123/E-Library.git
cd E-Library
```

### Step 2: Install Dependencies

```bash
composer install
```

This installs the required PHP dependencies, including PHPMailer for email functionality.

### Step 3: Create the Database

Create a MySQL database for the application:

```bash
mysql -u root -p
CREATE DATABASE library;
EXIT;
```

### Step 4: Configure Your Environment

Edit the `config.php` file with your database credentials:

```php
<?php
return [
    'database' => [
        'name' => 'library',
        'username' => 'root',
        'password' => '', // Add your MySQL password if you have one
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
?>
```

### Step 5: Set Up the Database Schema

Import the database schema (create the necessary tables):

- Create a `database/schema.sql` file (if not already present)
- Run the schema file through your MySQL client or phpMyAdmin

### Step 6: Configure Your Web Server

Ensure your Apache server has `mod_rewrite` enabled:

```bash
sudo a2enmod rewrite
sudo systemctl restart apache
```

Verify that `.htaccess` file permissions are correct (usually already in the repo).

### Step 7: Start the Application

Place the project in your web server's root directory (typically `/var/www/html/` for Apache or `htdocs/` for XAMPP):

```bash
cp -r E-Library /var/www/html/
```

Access the application in your browser:

```
http://localhost/E-Library/
```

---

## Configuration

### Database Configuration

Edit `config.php` to match your database setup:

- `name`: Database name (default: `library`)
- `username`: MySQL username (default: `root`)
- `password`: MySQL password (leave empty if no password)
- `connection`: Database host (default: `127.0.0.1`)

### Email Configuration

To enable email functionality (verification, password reset), configure SMTP settings in the application's mail module. Update `PHPmailer.php` with your SMTP credentials:

```php
$mail->Host = 'smtp.gmail.com'; // SMTP server
$mail->Username = 'your-email@gmail.com'; // Your email
$mail->Password = 'your-app-password'; // App-specific password
```

---

## Project Structure

```
E-Library/
├── core/                          # Core framework files
│   ├── bootstrap.php              # Application initialization and bindings
│   ├── app.php                    # Service container for dependency injection
│   ├── router.php                 # URL routing engine
│   ├── request.php                # HTTP request handling
│   ├── books.model.php            # Book database model
│   ├── Users.model.php            # User database model
│   ├── Mail.model.php             # Email/password reset model
│   └── database/                  # Database connection and query builder
├── controllers/                   # Application controllers
│   ├── books/
│   │   ├── signup.php             # User registration logic
│   │   ├── login.controller.php   # User login logic
│   │   ├── logout.php             # User logout logic
│   │   ├── profile.controller.php # User profile management
│   │   ├── Book_details.controller.php  # Book detail view logic
│   │   ├── admin_booklist.php     # Admin book list management
│   │   ├── addbook.controller.php # Add new book logic
│   │   ├── edit.controller.php    # Edit book logic
│   │   ├── delete.php             # Delete book logic
│   │   ├── search.controller.php  # Book search logic
│   │   ├── userlist.controller.php # User list management
│   │   ├── recover_email.controller.php # Password recovery via email
│   │   └── reset_password.controller.php # Password reset logic
│   └── emailverify.controller.php # Email verification logic
├── view/                         # View/Template files (HTML/CSS)
│   └── common/
│       └── header.php            # Common header template
├── resources/                    # Additional resources
│   └── PHPMailer/               # Email library
├── vendor/                      # Composer dependencies
├── index.php                    # Application entry point
├── routes.php                   # Route definitions
├── config.php                   # Configuration settings
├── composer.json                # PHP dependency configuration
├── composer.lock                # Locked dependency versions
├── .htaccess                    # Apache URL rewriting rules
└── .vscode/                     # VS Code settings

```

### Core Directories Explained

**`core/`**: Contains the framework's core classes:
- **app.php**: Service container that manages application bindings
- **bootstrap.php**: Initializes the application with database and model bindings
- **router.php**: Handles URL routing to controllers
- **request.php**: Processes HTTP requests

**`controllers/`**: Business logic for handling user requests
- Route requests to appropriate models
- Process form data
- Return responses to views

**`view/`**: HTML templates and UI files for rendering pages

---

## Usage

### Starting the Application

1. Open your browser and navigate to `http://localhost/E-Library/`
2. You'll be directed to the signup page
3. Create an account by filling in the signup form
4. Verify your email address
5. Log in with your credentials

### Admin Features

1. Log in with an admin account
2. Access the admin dashboard
3. Manage books: Add, edit, or delete books from the library
4. Manage users: View and manage user accounts

### Regular User Features

1. Browse available books in the library
2. Search for books by keywords
3. View detailed information about books
4. Manage your profile
5. Access recovery options if you forget your password

---

## Database Setup

### Creating Tables

The application requires the following main tables:

**Users Table**:
- id (INT, Primary Key)
- username (VARCHAR)
- email (VARCHAR, Unique)
- password (VARCHAR)
- verified (BOOLEAN)
- created_at (TIMESTAMP)

**Books Table**:
- id (INT, Primary Key)
- title (VARCHAR)
- author (VARCHAR)
- description (TEXT)
- isbn (VARCHAR)
- published_date (DATE)
- added_by (INT, Foreign Key to Users)
- created_at (TIMESTAMP)

**Password Resets Table**:
- id (INT, Primary Key)
- email (VARCHAR)
- token (VARCHAR)
- created_at (TIMESTAMP)

### Sample SQL (run in MySQL):

```sql
USE library;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE books (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255),
    description TEXT,
    isbn VARCHAR(20),
    published_date DATE,
    added_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (added_by) REFERENCES users(id)
);

CREATE TABLE password_resets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Key Features Explained

### User Authentication
- Sign up with email and password
- Email verification required
- Secure login with session management
- Password reset via email

### Book Management
- Display all books in the library
- Search functionality for finding books
- Detailed view for each book
- Admin-only features: Add, edit, delete books

### Email System
- Uses PHPMailer for reliable email delivery
- Sends verification emails during signup
- Sends password reset links
- Handles automated notifications

### Admin Dashboard
- View all books in the system
- Manage book inventory
- View all registered users
- Add and edit book information

---

## Troubleshooting

### Common Issues

**Issue**: `No database connection`
- Check your `config.php` file and verify MySQL is running
- Ensure the database name, username, and password are correct

**Issue**: Email not sending
- Verify SMTP credentials in the mail configuration
- Check that PHPMailer is properly installed via Composer
- Ensure your mail server allows outgoing connections

**Issue**: 404 errors on routes
- Verify `.htaccess` file exists and is readable
- Check that Apache's `mod_rewrite` is enabled
- Ensure your route definitions in `routes.php` match the URLs

**Issue**: Session not persisting
- Check that session handling is properly configured in PHP
- Verify cookies are enabled in your browser

---

## Dependencies

- **PHPMailer**: For sending emails
- **PHP PDO**: For database connections

All dependencies are managed via Composer and defined in `composer.json`.

---

## Support

For issues or questions about the E-Library project, please visit the GitHub repository:
https://github.com/AdityaMittal9123/E-Library

---

## License

This project is open source. Check the repository for license information.

---

## Contributing

Contributions are welcome! To contribute:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

---

**Last Updated**: December 2025
