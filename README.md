# CMS Sederhana

A simple Content Management System (CMS) built with PHP and AdminLTE.

## Features

- User authentication and authorization
- Post management
- Page management
- Category management
- Responsive admin interface using AdminLTE
- Simple and clean front-end design

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Composer (for dependencies)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/cms_sederhana.git
cd cms_sederhana
```

2. Create a MySQL database and import the database structure:
```bash
mysql -u your_username -p < database.sql
```

3. Configure the database connection:
- Open `config/database.php`
- Update the database credentials according to your setup

4. Set up your web server:
- Point your web server's document root to the project directory
- Make sure the web server has write permissions to the `uploads` directory

5. Access the admin panel:
- URL: `http://your-domain/admin`
- Default credentials:
  - Username: admin
  - Password: admin123

## Directory Structure

```
cms_sederhana/
├── admin/              # Admin panel files
├── assets/            # Front-end assets (CSS, JS, images)
├── config/            # Configuration files
├── includes/          # PHP includes and functions
├── pages/             # Front-end page templates
├── uploads/           # Uploaded files
├── database.sql       # Database structure
└── index.php          # Front-end entry point
```

## Security

- Change the default admin password after first login
- Keep your PHP and MySQL versions up to date
- Regularly backup your database
- Use HTTPS in production

## License

This project is licensed under the MIT License - see the LICENSE file for details. 