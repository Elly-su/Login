# Login System

## Overview

This is a simple and secure login system built using **HTML, CSS, JavaScript, and PHP**. It includes features such as password hashing, session-based authentication, and protection against SQL injection.

## Features

- **User Registration**: Users can sign up with a unique username and password.
- **Secure Login**: Passwords are hashed using `password_hash()` before being stored in the database.
- **Session-Based Authentication**: Uses PHP sessions to maintain user login status.
- **SQL Injection Protection**: Queries are executed using prepared statements.
- **Secure Cookies**: HTTP-only cookies are used for added security.
- **Form Validation**: JavaScript is used to ensure proper input validation before submission.

## Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL (MariaDB with XAMPP)

## Setup Instructions

### Prerequisites

Ensure you have the following installed:

- [XAMPP](https://www.apachefriends.org/) (Apache, MySQL, PHP)
- A text editor (e.g., Sublime Text, VS Code)

### Database Setup

1. Open **phpMyAdmin** in your browser (`http://localhost/phpmyadmin`).
2. Create a new database named ``.
3. Run the following SQL script to create the `users` table:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
```

4. Insert a test user:

```sql
INSERT INTO users (user_name, password) VALUES ('testuser', '$2y$10$bOl0VoYdugylvPR3TDtgfOqvBIPXc9omGrN368Dn6FgldtDsBrB0i');
```

(The password is pre-hashed for security.)

### Running the Project

1. Place the project files in `C:\xampp\htdocs\Login`.
2. Start **Apache** and **MySQL** in XAMPP.
3. Open `http://localhost/Login/index.html` in your browser.

### File Structure

```
Login/
│── index.html       # Login form
│── signup.php       # User registration
│── login.php        # Handles login logic
│── logout.php       # Handles user logout
│── styles.css       # Basic styling for the UI
│── README.md        # Project documentation
```

## Future Improvements

- Implement a **password reset** feature.
- Add an **admin panel** to manage users.
- Improve UI with better styling and animations.

## Contributors

- **Elly K** 

## License

This project is open-source and free to use for learning purposes.

---

**Note:** If you encounter issues, ensure that your database is correctly set up and that XAMPP services are running.

