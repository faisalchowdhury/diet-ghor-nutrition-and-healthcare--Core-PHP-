# Diet Ghor - Nutrition and Healthcare Platform

A comprehensive PHP-based web application for nutrition, fitness, and healthcare management. This platform provides tools for fitness tracking, trainer services, supplement shopping, and health calculations.

## 🌟 Features

### 🏋 Fitness & Training
- *Trainer Profiles*: Browse and hire certified fitness trainers
- *Workout Library*: Access various workout routines and exercise guides
- *Trainer Registration*: Fitness professionals can create profiles and offer services

### 🧮 Health Calculators
- *BMR Calculator*: Calculate Basal Metabolic Rate and daily calorie requirements
- *Body Fat Calculator*: Estimate body fat percentage using skinfold measurements
- *Ideal Measurements Calculator*: Determine ideal body proportions based on bone structure

### 🛒 E-commerce
- *Supplement Store*: Browse and purchase nutrition supplements
- *Product Categories*: Organized product catalog with detailed descriptions
- *Shopping Cart*: Add items to cart and manage orders
- *Order Management*: Track order status and history

### 📝 Content Management
- *Blog System*: Read articles about nutrition, fitness, and health
- *Workout Articles*: Detailed workout guides and fitness tips
- *Category-based Content*: Organized content by topics and categories

### 👥 User Management
- *Customer Registration/Login*: User account management
- *Trainer Registration*: Professional trainer account creation
- *Admin Panel*: Comprehensive backend management system

## 🛠 Technology Stack

- *Backend*: PHP (Core PHP)
- *Database*: MySQL
- *Frontend*: HTML5, CSS3, Bootstrap 4
- *JavaScript*: jQuery for dynamic interactions
- *Server*: Apache/Nginx compatible

## 📁 Project Structure


diet-ghor/
├── admin/                     # Admin panel
│   ├── css/                   # Admin stylesheets
│   ├── js/                    # Admin JavaScript files
│   ├── upload/                # File upload directory
│   └── *.php                  # Admin pages
├── classes/                   # PHP Classes
│   ├── Adminclass.php         # Admin functionality
│   ├── Blogclass.php          # Blog/article management
│   ├── Calculatorclass.php    # Health calculators
│   ├── Cartclass.php          # Shopping cart
│   ├── Contactclass.php       # Contact form handling
│   ├── Customerclass.php      # Customer management
│   ├── Generalclass.php       # General site settings
│   ├── Ordermanageclass.php   # Order management
│   ├── Productclass.php       # Product management
│   └── Trainerclass.php       # Trainer functionality
├── css/                       # Frontend stylesheets
├── database/                  # Database configuration
│   └── Config.php             # Database connection
├── images/                    # Static images
├── inc/                       # Include files
│   ├── header.php             # Site header
│   ├── footer.php             # Site footer
│   └── slider.php             # Homepage slider
├── js/                        # Frontend JavaScript
└── *.php                      # Main application pages


## ⚙ Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Web browser with JavaScript enabled

### Setup Instructions

1. *Clone/Download the project*
   bash
   git clone [repository-url]
   cd diet-ghor-nutrition-and-healthcare--Core-PHP--main
   

2. *Database Configuration*
   - Create a MySQL database named gym
   - Import the database schema (SQL file should be provided separately)
   - Update database credentials in database/Config.php:
   php
   $host = "localhost";
   $user = 'your_username';
   $pass = 'your_password';
   $db = 'gym';
   

3. *Web Server Setup*
   - Place the project in your web server's document root
   - Ensure PHP has write permissions to the admin/upload/ directory
   - Configure virtual host (optional but recommended)

4. *File Permissions*
   bash
   chmod 755 admin/upload/
   chmod 755 images/
   

5. *Access the Application*
   - Frontend: http://your-domain.com/
   - Admin Panel: http://your-domain.com/admin/

## 🗄 Database Schema

The application uses a MySQL database with the following main tables:
- dg_admin - Admin user management
- dg_customer - Customer accounts
- dg_trainer - Trainer profiles
- dg_product - Product catalog
- dg_cart - Shopping cart items
- dg_order - Order management
- dg_blog - Blog articles and workouts
- dg_contact - Contact form submissions
- dg_general - Site settings

## 🔧 Configuration

### General Settings
Update site configuration through the admin panel:
- Site title and logo
- Contact information
- Social media links
- Advertisement banners

### Email Configuration
Configure SMTP settings for order confirmations and notifications (requires additional setup).

## 👤 User Roles

### Customers
- Browse products and content
- Create accounts and manage profiles
- Add items to cart and place orders
- Access health calculators

### Trainers
- Create professional profiles
- Manage service offerings
- View client inquiries

### Administrators
- Full system access
- Manage all content and users
- Process orders
- Configure site settings

## 🔒 Security Features

- SQL injection prevention using prepared statements
- Session management for user authentication
- Input validation and sanitization
- File upload restrictions

## 🚀 Key Functionalities

### Health Calculators
1. *BMR Calculator*: Uses Mifflin-St Jeor equation for accurate metabolic rate calculation
2. *Body Fat Calculator*: Implements Jackson-Pollock 7-site skinfold measurement formula
3. *Ideal Measurements*: Based on Steve Reeves muscle-to-bone ratio formula

### E-commerce Features
- Product catalog with categories
- Shopping cart functionality
- Order processing and tracking
- Customer account management

### Content Management
- Blog article system
- Workout routine library
- Category-based organization
- Featured content highlighting

## 🛡 Maintenance

### Regular Tasks
- Database backups
- Update product inventory
- Monitor file uploads
- Review and moderate content

### Security Updates
- Keep PHP updated
- Monitor for security vulnerabilities
- Regular password updates
- File permission audits

## 📞 Support

For technical support or questions about the application:
- Check the contact form functionality
- Review admin panel documentation
- Ensure proper server configuration

## 📄 License

This project is developed for educational and commercial use. Please ensure compliance with any applicable licenses for third-party libraries and frameworks used.

---

*Note*: This is a core PHP application without modern frameworks. Ensure your hosting environment supports the required PHP version and has necessary extensions enabled (mysqli, session, file_uploads, etc.).
