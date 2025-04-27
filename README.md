# ShohozBazar: Multi-Vendor Marketplace (With Multi-Auth)

## 🏛️ Project Architecture: Multi-Vendor Marketplace (With Multi-Auth)

**More Vendors. More Choices. More Happiness.**

Empowering vendors, delighting customers — all under one digital roof. Shop smart, sell smarter, and experience a world of opportunities with us.



---

## About ShohozBazar

**ShohozBazar** is a dynamic multi-vendor marketplace connecting vendors and customers with ease. We bring countless products, trusted sellers, and a smooth shopping experience under one platform. At ShohozBazar, we empower businesses to grow and offer customers the freedom to shop everything they love — simply, quickly, and securely.

---

## 🛂 Auth: Multi-Authentication

Separate login and dashboard for **Admin**, **Vendor**, and **User**, ensuring secure and role-based access.

---

## 🛒 Marketplace: Multi-Vendor Marketplace

Vendors can register, manage products, and track sales, creating a diverse marketplace environment.

---

## 📦 Product: Advanced Product Management

Product variants (size, color), discounts, and coupons make product management dynamic and flexible.

---

## 📋 Order Management: Order Management

Track orders, update status, and manage transactions seamlessly.

---

## 💳 Payment: Payment Gateways

Integrate **Stripe**, **PayPal**, and local payment methods for smooth and secure transactions.

---

## Team Name: PHP-Pulse

| Role         | Name                | GitHub                           |
|--------------|---------------------|----------------------------------|
| Team Leader  | Md. Mahbubul Hasan  | [GitHub](https://github.com/mahbubulhasan) |
| Developer    | Md. Sabbih Sarker   | [GitHub](https://github.com/sabbihsarker) |
| Developer    | Md. Moni Rul Islam  | [GitHub](https://github.com/monirulislam) |

---

## Project Mentor
- **Nahidul Hasan** [GitHub](https://github.com/nahidulhasan)

---

## Project Description

### Multi-Vendor eCommerce Platform

The **Multi-Vendor eCommerce Platform** is a comprehensive solution designed to enhance product management, vendor interactions, and user engagement. Built using **Laravel**, the system supports multi-authentication for **Admins**, **Vendors**, and **Users**. It features a robust multi-vendor marketplace, an advanced search system, and seamless payment integrations.

---

## Features

### 1. Authentication System (Multi-Auth)
- Separate guards: admin, vendor, user
- Middleware:
  - `auth:admin`
  - `auth:vendor`
  - `auth:user`
- Login/Register Controllers

### 2. Dashboard Panel
- **Admin Dashboard**:
  - Manage Vendors
  - Manage Users
  - Manage Products (Approval, Featured, etc.)
  - Manage Orders
  - Manage Blogs, Advertisements
  - Manage Transactions
- **Vendor Dashboard**:
  - Manage Own Products
  - Track Own Orders and Sales
  - Manage Coupons
  - View Transaction History
- **User Dashboard**:
  - View Orders
  - Wishlist Management
  - Order Tracking
  - Product Reviews

### 3. Core Modules
- **Product Management**:
  - Product Model
  - Variant Model (size, color)
  - Inventory Model
  - Discounts & Coupons
- **Cart System**:
  - Real-time stock check using Ajax
  - Dynamic add/update/remove items
  - Session-based (Guest) + User-based cart sync after login
- **Order Management**:
  - Create Order (on checkout)
  - Update Status (Pending → Processing → Completed)
  - Transaction Model (for payments)
- **Payment Gateway**:
  - Stripe API
  - PayPal API
  - Manual/Local Gateway Option (like Cash on Delivery)
- **Shipping Management**:
  - Shipping Rules table (Based on Location, Weight, Custom Free Shipping Threshold)
- **Wishlist & Reviews**:
  - User Wishlist Table
  - User Product Reviews Table
  - Admin approval for reviews (optional)
- **Order Tracking**:
  - Order Status Update with Tracking ID
  - Frontend Order Tracking Page
- **Blog & Advertisement**:
  - Admin Blog CRUD
  - Advertisement Banner Management
- **Newsletter System**:
  - User Subscriptions
  - Automated Email Campaigns (like Weekly Deals)
- **Transaction History**:
  - Payment Logs
  - Download/Export Transaction Data (CSV, PDF)

---

## Tech Stack

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade Templates, Bootstrap, jQuery, JavaScript
- **Database**: MySQL
- **Containerization**: Docker with Docker Compose
- **Server**: Apache

---

## Installation Guide

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Learnathon-By-Geeky-Solutions/php-pulse.git 
   cd php-pulse
   ```
2. **Set Up Environment Variables**:
   ```bash
   cp .env.example .env
   ```
   Update database credentials and other necessary configurations in the `.env` file.

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

---

## Testing
Run unit and feature tests with:
```bash
php artisan test
```

---


---

## Future Enhancements
- AI-based product recommendations.
- Progressive Web App (PWA) support.
- More local payment gateway integrations.
- Multi-language support for global reach.
- Advanced analytics and reporting for vendors and admins.

---

**Developed by ![love (2)](https://github.com/user-attachments/assets/f6fbfc1f-3447-4772-94a7-0b6698275708) PHP-Pulse**

