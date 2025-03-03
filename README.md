# Login Page Project

## Overview
This is a simple login page built using **PHP**, **HTML**, and **MySQL**. It allows users to register and log in securely using **hashed passwords**.

## Features
- User authentication with **secure password hashing**
- Simple and clean **HTML form** for login
- **MySQL database** for storing user credentials
- Error handling for invalid login attempts

## Requirements
- **XAMPP** (or any server with PHP and MySQL)
- **Sublime Text** (or any text editor)

## Installation & Setup

### 1. Clone or Download the Project
Place the project files inside the `htdocs` folder of XAMPP.

### 2. Start XAMPP Services
Ensure **Apache** and **MySQL** are running in the XAMPP Control Panel.

### 3. Create the Database
- Open `phpMyAdmin` (`http://localhost/phpmyadmin/`)
- Create a database called **`login_page_db`**
- Run the following SQL script to create the users table:
  ```sql
  CREATE TABLE users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      user_name VARCHAR(50) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL
  );
  ```
- Insert a test user (hashed password):
  ```sql
  INSERT INTO users (user_name, password)
  VALUES ('testuser', '$2y$10$bOl0VoYdugylvPR3TDtgfOqvBIPXc9omGrN368Dn6FgldtDsBrB0i');
  ```

### 4. Run the Login Page
- Open `http://localhost/Login/index.html` in your browser.
- Enter:
  - **Username:** `testuser`
  - **Password:** `password123`

## File Structure
```
/Login/
│-- index.html  # Login form
│-- signup.php  # User registration (if implemented)
│-- login.php   # Login authentication
│-- logout.php  # Logout script (optional)
│-- hash.php    # Generates hashed passwords (for setup)
```

## Future Improvements
- Implement **user registration**
- Add **session management & user dashboard**
- Improve **UI with CSS & JavaScript**

## Author
Elly K

