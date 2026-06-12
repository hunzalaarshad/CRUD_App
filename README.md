# Student Management Dashboard

A simple PHP + MySQL CRUD application for managing student records. This project demonstrates basic backend development concepts such as database connectivity, form handling, and CRUD (Create, Read, Update, Delete) operations with a clean and responsive user interface.

## Features

- Add new students
- View all student records
- Update student information
- Delete student records
- Responsive dashboard UI
- MySQL database integration

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript

## Project Structure

```text
project/
│
├── index.php
├── README.md
└── database.sql
```

## Database Setup

Create a database named:

```sql
CREATE DATABASE crud_app;

USE crud_app;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);
```

## Installation

1. Download or clone the project.
2. Move the project folder to the XAMPP `htdocs` directory.
3. Start Apache and MySQL from XAMPP Control Panel.
4. Create the database using the SQL query above.
5. Open your browser and visit:

```text
http://localhost/project-name
```

## Learning Objectives

This project was created to practice:

- PHP fundamentals
- MySQL database operations
- CRUD functionality
- Form handling
- SQL queries
- Basic dashboard design

## Future Improvements

- Search functionality
- Pagination
- Login & Authentication
- Profile image upload
- Dark mode
- Export data to CSV/PDF

## Screenshots

Add screenshots of the dashboard here.

## Author

Muhammad Hunzala Arshad

---

This project is built for learning purposes and portfolio demonstration.