# CodeIgniter Task Management System

A comprehensive task management system built with CodeIgniter 4, featuring a Kanban-style board interface with draggable task cards, user assignment, task categories, and status tracking.

## Contributors

- Nikodem Adamczyk - Web Development Course 2024 in University in Trier

## Features

- **Kanban Board Layout**
  - Visualize tasks across multiple columns (Zu Besprechende, Offen, In Bearbeitung, Erledigt)
  - Clearly see task progression through your workflow

- **Task Management**
  - Create, edit, copy, and delete tasks
  - Mark tasks as complete/incomplete
  - Add task descriptions and notes
  - Set reminders for important deadlines
  - Assign tasks to team members

- **Board Organization**
  - Multiple team boards 
  - Customizable columns
  - Task filtering and search

- **Responsive Design**
  - Works on desktop and mobile devices
  - Clean, intuitive interface using Bootstrap 5

## Tech Stack

- **Backend**: CodeIgniter 4 PHP Framework
- **Database**: MySQL 
- **Frontend**: 
  - HTML5, CSS3, JavaScript
  - Bootstrap 5
  - Font Awesome 5
  - jQuery

## Project Structure

The application follows the standard CodeIgniter 4 MVC architecture:

- **Models**:
  - `TaskModel.php` - Task data management
  - `SpaltenModel.php` - Column management
  - `PersonModel.php` - User/Person data

- **Controllers**:
  - `Tasks.php` - Task operations
  - `Spalten.php` - Column operations
  - `Home.php` - Dashboard and main views

- **Views**:
  - `/pages/` - Main content pages
  - `/templates/` - Reusable template files
  - `/pages/tasks.php` - Kanban board view

## Usage

### Task Management

- **Create a Task**: Click "+ Neu" button in any column
- **Edit a Task**: Click the menu icon on any task and select "Task bearbeiten"
- **Mark as Complete**: Use the dropdown menu to mark tasks as complete/incomplete
- **Copy a Task**: Select "Task kopieren" from the dropdown menu
- **Delete a Task**: Select "Task löschen" from the dropdown menu

### Column Management

- **View Columns**: Navigate to "Spalten" in the navigation menu
- **Create a Column**: Click "Erstellen" on the columns page
- **Edit a Column**: Click the edit icon next to any column
- **Delete a Column**: Click the delete icon next to any column

## Development

This project is built with CodeIgniter 4. If you're new to the framework, the [CodeIgniter 4 User Guide](https://codeigniter.com/user_guide/intro/index.html) is a great resource.

### Key Files for Development

- `app/Config/Routes.php` - Define application routes
- `app/Controllers/` - Application controllers
- `app/Models/` - Data models
- `app/Views/` - View templates
- `public/css/style.css` - Custom CSS styles


