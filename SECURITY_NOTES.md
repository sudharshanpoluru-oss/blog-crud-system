# Task 4 Security Enhancements

This task improves the Blog CRUD System against common web application risks.

## Prepared Statements

All database operations now use MySQLi prepared statements:

- Login user lookup
- Registration email check and insert
- Post list search and pagination
- Add, edit, and delete post queries

This protects the application from SQL injection because user input is bound as parameters instead of being concatenated into SQL strings.

## Form Validation

Server-side validation was added for:

- Required fields
- Valid email format
- Username length
- Password minimum length
- Post title length

Client-side validation was improved with HTML attributes such as `required`, `minlength`, and `maxlength`.

## User Roles and Permissions

The `users` table now includes a `role` column. New users receive the `editor` role by default.

Access control rules:

- `admin`: can edit and delete any post
- `editor`: can add posts and edit/delete only their own posts

The UI hides edit/delete actions when the logged-in user does not have permission, and the PHP backend also blocks unauthorized requests.

## Session Security

The login process now calls `session_regenerate_id(true)` after successful authentication to reduce session fixation risk.

## Manual SQL If Needed

If your MySQL/MariaDB version does not support the automatic role-column update, run this in phpMyAdmin:

```sql
ALTER TABLE users
ADD COLUMN role VARCHAR(20) NOT NULL DEFAULT 'editor';
```

To make a user an admin:

```sql
UPDATE users SET role = 'admin' WHERE email = 'your-email@example.com';
```
