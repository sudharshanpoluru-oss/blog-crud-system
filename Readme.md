# PHP CRUD Blog Management System

## Project Overview

This project is a PHP and MySQL based Blog Management System developed as part of an internship task. The application implements complete CRUD (Create, Read, Update, Delete) functionality with secure user authentication, search functionality, pagination, and a responsive user interface.

Users can register, log in, create blog posts, search posts, browse paginated results, edit posts, and delete posts through a modern Bootstrap-based dashboard.

---

## Features

### User Authentication

* User Registration
* User Login
* Password Hashing
* Session Management
* Secure Logout Functionality

### CRUD Operations

* Create New Posts
* View All Posts
* Update Existing Posts
* Delete Posts

### Search Functionality

* Search Posts by Title
* Search Posts by Content
* Instant Filtering of Results

### Pagination

* Displays Limited Posts Per Page
* Easy Navigation Between Pages
* Improved Performance for Large Data Sets

### Database Features

* MySQL Database Integration
* User and Post Relationship
* Foreign Key Constraints

### UI Features

* Responsive Bootstrap 5 Design
* Professional Dashboard Layout
* Navigation Bar
* Search Interface
* Modern Card-Based Design
* Hover Effects and Enhanced User Experience

---

## Technologies Used

* PHP
* MySQL
* HTML5
* CSS3
* Bootstrap 5
* JavaScript
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

### 1. Install XAMPP

Download and install XAMPP.

### 2. Start Services

Start:

* Apache
* MySQL

### 3. Create Database

Create a database named:

blog_system

### 4. Import Database Tables

Import the required SQL tables into the database.

### 5. Copy Project Files

Place the project folder inside:

C:\xampp\htdocs\

### 6. Run the Application

Open your browser and visit:

http://localhost/blog_crud

---

## Project Structure

blog_crud/

├── config/

│   └── db.php

├── register.php

├── login.php

├── logout.php

├── add_post.php

├── edit_post.php

├── delete_post.php

├── index.php

├── navbar.php

├── README.md

└── assets/

---

## Application Features Demonstrated

✔ User Registration

✔ User Login

✔ Session Management

✔ Create Posts

✔ Read Posts

✔ Update Posts

✔ Delete Posts

✔ Search Posts

✔ Pagination

✔ Responsive User Interface

✔ Bootstrap Integration

✔ MySQL Database Connectivity

---

## Future Improvements

* Prepared Statements for Enhanced Security
* Role-Based Access Control
* Rich Text Editor
* User Profiles
* Image Upload Support
* Comment System
* Categories and Tags
* REST API Integration

---

## Author

Poluru Sudharshan

B.Tech CSE Student

YSR Engineering College, Proddatur

Internship Project – 2026
