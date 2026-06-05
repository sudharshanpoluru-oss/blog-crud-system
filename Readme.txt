# PHP CRUD Blog Management System

## Project Overview

This project is a PHP and MySQL based Blog Management System developed as part of an internship task. The application implements complete CRUD (Create, Read, Update, Delete) functionality with secure user authentication and session management.

Users can register, log in, create blog posts, view posts, edit posts, and delete posts through a user-friendly web interface.

---

## Features

### User Authentication

* User Registration
* User Login
* Password Hashing
* Session Management
* Logout Functionality

### CRUD Operations

* Create New Posts
* View All Posts
* Update Existing Posts
* Delete Posts

### Database Features

* MySQL Database Integration
* User and Post Relationship
* Foreign Key Constraints

### UI Features

* Responsive Bootstrap Design
* Navigation Bar
* Professional Dashboard Layout

---

## Technologies Used

* PHP
* MySQL
* HTML5
* CSS3
* Bootstrap 5
* XAMPP

---

## Database Schema

### Users Table

| Column     | Type         |
| ---------- | ------------ |
| id         | INT          |
| username   | VARCHAR(100) |
| email      | VARCHAR(100) |
| password   | VARCHAR(255) |
| created_at | TIMESTAMP    |

### Posts Table

| Column     | Type         |
| ---------- | ------------ |
| id         | INT          |
| title      | VARCHAR(255) |
| content    | TEXT         |
| user_id    | INT          |
| created_at | TIMESTAMP    |

---

## Installation

1. Install XAMPP.
2. Start Apache and MySQL.
3. Create database named:

blog_system

4. Import database tables.
5. Copy project folder into:

C:\xampp\htdocs\

6. Open browser:

http://localhost/blog_crud

---

## Project Structure

blog_crud/

├── config/

│ └── db.php

├── register.php

├── login.php

├── logout.php

├── add_post.php

├── edit_post.php

├── delete_post.php

├── index.php

├── navbar.php

└── README.md

---

## Future Improvements

* Prepared Statements
* Search Functionality
* Pagination
* User Roles
* Rich Text Editor
* Profile Management

---

## Author

Sudharshan

B.Tech CSE Student

YSR Engineering College

Internship Project 2026
