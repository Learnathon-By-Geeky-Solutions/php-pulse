# Team Name: PHP-Pulse

## Team Members
- @mahbub14 Md. Mahbubul Hasan (Team Leader)
- @skrsabbih Md. Sabbih Sarker
- @md-moni-rul-islam Md. Moni Rul Islam

## Mentor
- Nahidul Hasan

---

# Project Description
### Multi-Vendor eCommerce Platform

The **Multi-Vendor eCommerce Platform** is a comprehensive solution designed to enhance product management, vendor interactions, and user engagement. The system is built using **Laravel** and supports multi-authentication for Admins, Vendors, and Users. It also features a robust multi-vendor marketplace, an advanced search system, and seamless payment integrations.

## Features

- **Multi-Authentication**:
  - Separate login and dashboard for Admin, Vendor, and User.
- **Multi-Vendor Marketplace**:
  - Vendors can register, manage products, and track sales.
- **Advanced Product Management**:
  - Product Variants (size, color, etc.), Discount System, and Coupons.
- **Order Management**:
  - Track orders, status updates, and manage transactions.
- **Payment Gateways**:
  - Stripe, PayPal, and local payment integrations.
- **Advanced Add-to-Cart Feature**:
  - Real-time stock validation and dynamic cart updates.
- **Shipping Rule System**:
  - Define custom shipping rules based on location and weight.
- **Product Wishlist & Reviews**:
  - Users can save products for later and leave reviews.
- **Advanced Order Tracking**:
  - Real-time order tracking for customers.
- **Blog & Advertisement Management**:
  - Admin-managed blogs and promotional content.
- **Dynamic Newsletter Feature**:
  - Automated email campaigns and user subscriptions.
- **Transaction History**:
  - Track all transactions and export data.


## Tech Stack

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade Templates, Bootstrap
- **Database**: MySQL/PostgreSQL
- **Containerization**: Laragon (for local development)
- **Server**: Nginx/Apache

## Installation Guide

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/multi-vendor-ecommerce-platform.git
   cd multi-vendor-ecommerce-platform
   ```

2. **Set Up Environment Variables**:
   ```bash
   cp .env.example .env
   ```
   Update database credentials and other necessary configurations.

3. **Install Dependencies**:
   ```bash
   composer install
   npm install && npm run dev
   ```

4. **Run Migrations and Seeders**:
   ```bash
   php artisan migrate --seed
   ```

5. **Start the Application**:
   ```bash
   php artisan serve
   ```
   The application will be accessible at [http://localhost:8000](http://localhost:8000).

## Testing

Run unit and feature tests with:
```bash
php artisan test
```

## Usage

- **Admin Panel**:
  - Manage vendors, products, orders, and system settings.
- **Vendor Dashboard**:
  - Upload and manage products, track orders, and handle earnings.
- **User Interface**:
  - Browse products, place orders, and track shipments.

## Future Enhancements

- AI-based product recommendations.
- Progressive Web App (PWA) support.
- More local payment gateway integrations.

---

Developed by **PHP-Pulse**

