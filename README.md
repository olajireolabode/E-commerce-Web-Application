[README.md](https://github.com/user-attachments/files/33174600/README.md)
# Silverlight — Fitness & Wellness E-Commerce Platform

> A collaborative full-stack web application built from scratch by a small development team, later led through a major completion, modernization, and deployment phase.

**My role:** Technical Lead · Backend & Database Developer

**Live Demo:** _Add live URL_

**GitHub:** _Add repository URL_

---

## Overview

Silverlight is a fitness and wellness e-commerce platform where users can browse products, search and sort the catalogue, manage a shopping cart, place orders, leave comments, contact the business, and use a BMI calculator. Administrators can manage products, inventory, gyms, trainers, orders, comments, and customer messages.

The application was originally developed from scratch as a collaborative team project. I spearheaded the group and contributed heavily to the backend and database work. I later led a completion and modernization phase to bring the application to a polished, production-ready state.

---

## My Role & Contributions

### Technical leadership
- Spearheaded a small development team during the project lifecycle.
- Helped coordinate development and integrate different parts of the application.
- Took ownership of debugging, completion, and deployment readiness.

### Backend development
- Developed and refined PHP backend workflows using PDO.
- Implemented authentication, authorization, session management, product workflows, cart operations, checkout, comments, contact forms, and administrative functionality.
- Added validation and error handling across major user flows.
- Implemented transaction-based checkout and inventory protection to help prevent overselling.

### Database development
- Worked extensively with the MySQL/MariaDB relational database.
- Built and maintained database-driven workflows for users, products, carts, orders, order products, comments, replies, inventory, gyms, trainers, and customer questions.
- Used prepared statements and relational queries through PDO.

### Completion & modernization
- Modernized the application's visual design around a dark fitness/gym aesthetic.
- Improved product cards, product detail pages, cart, checkout, authentication, comments, contact, BMI, and administration interfaces.
- Restored product search and sorting functionality.
- Improved responsive/mobile navigation.
- Improved product image upload handling.
- Prepared the application for production and deployed it to a live PHP/MySQL environment.

---

## Key Features

- User registration, login, and logout
- Role-based admin access
- Product catalogue and product details
- Product search and sorting
- Shopping cart with quantity controls
- Inventory validation and protection
- Transaction-safe checkout and order creation
- Order confirmation
- Product image uploads
- Comments and administrator replies
- Customer contact/questions and administrator responses
- BMI calculator with input validation
- Gym and trainer sections
- Responsive navigation and mobile-friendly layouts
- Production database configuration
- Configuration-file protection

---

## Tech Stack

| Area | Technologies |
|---|---|
| Frontend | HTML5, CSS3, JavaScript |
| Backend | PHP |
| Database | MySQL / MariaDB |
| Database access | PDO, prepared statements |
| Local development | XAMPP |
| Database administration | phpMyAdmin |
| Deployment | PHP/MySQL shared hosting |
| Version control | Git / GitHub |

---

## Application Architecture

Silverlight follows a lightweight MVC-style structure:

```text
Lecom/
├── config/          # Database configuration
├── controllers/     # Application/business flow
├── models/          # Database access and data operations
├── views/           # UI templates and pages
├── css/             # Page and component styling
├── images/          # Product and site assets
├── index.php        # Main application entry point
└── logout.php       # Session logout
```

The separation between controllers, models, and views keeps database operations, application flow, and presentation responsibilities more organized than a single-file PHP application.

---

## Security & Data Integrity

The modernization phase included several security and reliability improvements:

- PDO prepared statements for database queries
- Session ID regeneration during authentication
- Role-based authorization for administrative functionality
- Server-side input validation
- Protection against users impersonating other users in comments
- POST-only handling for destructive administrative actions
- Inventory checks during checkout
- Database transactions for order creation and inventory updates
- Product image type/size validation
- No-cache session handling during logout
- Production configuration separated from example environment settings
- Direct browser access to configuration files blocked through `.htaccess`

> **Note:** The checkout is a demonstration checkout and does not process real payments.

---

## Running Locally

### Requirements

- XAMPP or another PHP environment
- PHP with PDO MySQL support
- MySQL/MariaDB
- A web browser

### Setup

1. Clone or download the repository.
2. Place the `Lecom` directory inside your web server document root.
3. Create a MySQL/MariaDB database named `silverlight`.
4. Import `silverlight.sql` using phpMyAdmin or the MySQL client.
5. Configure the database connection in `config/database.php` for your local environment.
6. Open the application through your local server, for example:

```text
http://localhost/Lecom/
```

### Production configuration

Do not commit real production credentials to GitHub. Use the hosting provider's database credentials in the production configuration and keep `.env`/secret values out of version control.

---

## Project Highlights

### Backend & database engineering
The project gave me hands-on experience connecting a PHP application to a relational database and designing workflows that span multiple tables and user roles.

### Transaction-safe checkout
Checkout validates inventory, creates the order and order items, updates inventory, links the order to the user, and clears the cart within a database transaction.

### Technical leadership
Because this was a team-built application, a major part of my contribution was not only writing code but also helping move the group toward an integrated, working application and taking ownership of the final completion and deployment phase.

### Modernization
The modernization phase focused on turning an older functional application into a more cohesive product with a consistent visual system, clearer user flows, improved validation, and a responsive interface.

---

## Screenshots

Add screenshots of the **live application** here. Recommended order:

1. Homepage / hero
2. Product catalogue with search
3. Product detail + cart
4. Checkout / order confirmation
5. Admin dashboard
6. Add Product page

Example Markdown:

```md
![Silverlight Homepage](docs/screenshots/homepage.png)
![Silverlight Products](docs/screenshots/products.png)
![Silverlight Admin Dashboard](docs/screenshots/admin-dashboard.png)
```

---

## Future Improvements

Possible future iterations include:

- Real payment integration
- Email notifications for orders and contact submissions
- Stronger automated testing
- More granular admin permissions
- Product categories and filtering
- Order status tracking for customers
- Analytics dashboard
- Automated CI/CD deployment

---

## Team Project

Silverlight was created collaboratively by a small development team. This repository documents the application and my contributions as technical lead, with significant responsibility across backend development, database work, debugging, modernization, and deployment.

---

## License

This project was created as an educational/portfolio project. Contact the repository owner before reusing project assets, content, or branding.
