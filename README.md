# CampusConnect 2026

## Student Event Registration Portal

CampusConnect 2026 is a dynamic Student Event Registration Portal deployed on an AWS EC2 Linux server using **Nginx, PHP and MariaDB**.

### Features
- Student registration
- Full Name, Student ID, Email
- College Name and Location
- Event selection
- Password
- Registration success page
- Login using registered credentials
- MariaDB database storage
- Access through EC2 public IP

### Technology Stack
- AWS EC2
- Amazon Linux 2023
- Nginx
- PHP 8.5
- MariaDB 10.5

### Main Deployment Commands

```bash
sudo yum install nginx -y
sudo systemctl start nginx
sudo systemctl enable nginx
sudo systemctl status nginx

sudo yum install mariadb105-server -y
sudo systemctl start mariadb
sudo systemctl enable mariadb
sudo systemctl status mariadb

sudo yum install php -y
php -v

ls -l /var/www/html/

sudo systemctl restart php-fpm
sudo nginx -t
sudo systemctl restart nginx
```

### Database Commands

```bash
sudo mariadb
```

```sql
CREATE DATABASE campusconnect;
USE campusconnect;
SHOW DATABASES;
SHOW TABLES;
DESCRIBE students;
SELECT * FROM students;
```

### AWS Security Group
- SSH: TCP 22
- HTTP: TCP 80

### Website URLs

```text
http://YOUR-EC2-PUBLIC-IP/registration.html
http://YOUR-EC2-PUBLIC-IP/registration.php
http://YOUR-EC2-PUBLIC-IP/login.php
```

### Repository Structure

```text
CampusConnect-2026/
├── README.md
├── .gitignore
├── website/
│   ├── registration.html
│   ├── registration.php
│   ├── login.php
│   ├── db.php
│   └── style.css
├── sql/
│   └── campusconnect.sql
├── screenshots/
└── docs/
    └── CampusConnect_2026_Practical_Examination.docx
```

### Important
Never upload `.pem` files, AWS keys, database passwords, or `.env` files containing secrets.

### Practical Result
The portal was tested for registration, registration success, login, database verification, and access through the EC2 public IP.
