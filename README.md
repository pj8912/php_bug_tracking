# BugTracking System
This is a bugtracking system project built using PHP and MySQL without any framework. The system allows an admin to manage employees, projects, and tickets

## Installation
- Clone or download the project files.
- Create a MySQL database and import the  `sql/bug-tracking.sql` file
- Update the database connection details in `src/Database/Database.php`.
- Upload the project files to your server.
- Access the project in your web browser.

## Features
### Employee Management
- Admin can add/delete employees.
- Admin can assign roles to employees.

### Project Management
- Admin can create projects.
- Projects can have managers, developers, and clients.

### Ticket Management
- Admin and assigned employees can create tickets.
- Tickets have a name, type, project, assigned employee, status, and priority.

## Usage
### Login/SignUp
- To use the bugtracking system you must first register, then login with your credentials.

### Dashboard
- After logging in, you will see the dashboard. From here, you can access the employee, project, and ticket management pages.

### Employee Management
On the employee management page, you can view, add, edit, and delete employees. You can also assign roles to employees.

### Project Management
On the project management page, you can view, add, edit, and delete projects. You can also assign managers, developers, and clients to projects.

### Ticket Management
On the ticket management page, you can view, add, edit, and delete tickets. You can also assign employees to tickets and update their status and priority.




## Contributors
- [jp](https://github.com/pj8912)
