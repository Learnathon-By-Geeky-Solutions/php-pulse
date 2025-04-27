# ShohozBazar: Multi-Vendor Marketplace (With Multi-Auth) 🏬

## 🏗️ Project Architecture

**More Vendors. More Choices. More Happiness.**

Empowering vendors, delighting customers — all under one digital roof. Shop smart, sell smarter, and experience a world of opportunities with us.

---

## 📖 About ShohozBazar

**ShohozBazar** is a dynamic multi-vendor marketplace connecting vendors and customers with ease. We bring countless products, trusted sellers, and a smooth shopping experience under one platform.

---

## 🔐 Multi-Authentication System

Separate login and dashboard for **Admin**, **Vendor**, and **User**, ensuring secure and role-based access.

---

## 🏬 Multi-Vendor Marketplace

Vendors can register, manage products, and track sales, creating a diverse marketplace environment.

---

## 📦 Advanced Product Management

Product variants (size, color), discounts, and coupons make product management dynamic and flexible.

---

## 📋 Order Management

Track orders, update status, and manage transactions seamlessly.

---

## 💳 Payment Gateways

Accept payments with multiple gateways:

- ![Stripe](https://img.shields.io/badge/Stripe-008CDD?style=for-the-badge&logo=stripe&logoColor=white)
- ![PayPal](https://img.shields.io/badge/PayPal-00457C?style=for-the-badge&logo=paypal&logoColor=white)
- ![Razorpay](https://img.shields.io/badge/Razorpay-3772FF?style=for-the-badge&logo=razorpay&logoColor=white)
- 🏦 Local Payment Methods (Cash on Delivery, Mobile Banking)

---

## 👥 Team Name: PHP-Pulse

| 🧑‍💻 Role         | 🧑‍🎓 Name                | 🔗 GitHub                           |
|--------------|---------------------|----------------------------------|
| 👑 Team Leader  | Md. Mahbubul Hasan  | [GitHub](https://github.com/mahbub14) |
| 💻 Developer    | Md. Sabbih Sarker   | [GitHub](https://github.com/skrsabbih) |
| 💻 Developer    | Md. Moni Rul Islam  | [GitHub](https://github.com/md-moni-rul-islam) |

---

## 🧑‍🏫 Project Mentor

- **Nahidul Hasan** [GitHub](https://github.com/nahidulhasan)

---

## 📝 Project Description

The **Multi-Vendor eCommerce Platform** is built using **Laravel**, supporting multi-authentication, advanced search, payment integrations, and more. It offers a comprehensive suite of features, including:

- 🔐 **Multi-Authentication**: Secure role-based access for Admins, Vendors, and Users.
- 🛍️ **Multi-Vendor Marketplace**: Vendor registration, product management, and earnings tracking.
- 🔎 **Advanced Product Search**: Search by category, price, rating, and keywords.
- 🎟️ **Product Coupon System**: Discount codes with expiration dates.
- 🎨 **Product Variants**: Support for size, color, and other attributes.
- 📸 **Multi-Product Image Upload**: Upload and manage multiple images per product.
- ⭐ **Product Review & Rating**: User-generated reviews and ratings.
- 🎯 **Product Discount Feature**: Percentage or fixed-amount discounts.
- 💳 **Multiple Payment Gateways**: Integration with PayPal, Stripe, and local providers.
- 💖 **Product Wishlist**: Users can save products for later purchase.
- 📦 **Order Management**: Track order status, cancellations, and returns.
- 🛒 **Advanced Add-to-Cart**: Quantity selection and stock validation.
- 🚚 **Shipping Rule System**: Flexible rules based on location and weight.
- 📰 **Blog Management**: Admin-managed blog posts.
- 📍 **Advanced Order Tracking**: Real-time tracking updates.
- 🔒 **Password Change Option**: Secure password change for all roles.
- 📧 **Dynamic Newsletter**: Subscription and automated email campaigns.
- 📢 **Advertisement Management**: Manage promotional banners and ads.
- 🧾 **Transaction History**: View past orders and payments.
- 🏢 **Multi-Tenant Support**: Isolated data and customizable settings per tenant.
- 📋 **Subscription Management**: Plan creation, automated billing, and invoicing.

### 🚀 Highlights

- Advanced Product Management: Support for product variants, discounts, coupons, and reviews.
- E-Commerce Capabilities: Order management, payment processing, and shipping integration.
- Customer Engagement: Dynamic newsletters, advertisements, and blog management.
- Tenant Isolation: Each business (tenant) operates independently with customizable settings and isolated data.

---

## 🌟 Features

### 🔐 Authentication (Multi-Auth)
- Separate guards: admin, vendor, user
- Middleware protections

### 🖥️ Dashboards
- **Admin**: Manage vendors, users, products, orders, blogs, ads, transactions.
- **Vendor**: Manage own products, sales, coupons, and transactions.
- **User**: Manage orders, wishlist, reviews, and tracking.

### 🛒 Core Modules
- **Product Management**
- **Cart System** (Real-time updates)
- **Order Management** (Status updates)
- **Payment Gateway Integrations**
- **Shipping Management** (Rules by location/weight)
- **Wishlist & Reviews**
- **Order Tracking**
- **Blog & Advertisement**
- **Newsletter System**
- **Transaction History (Export CSV/PDF)**

---

## 🛠️ Tech Stack

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade Templates, Bootstrap, jQuery, JavaScript
- **Database**: MySQL
- **Containerization**: Docker with Docker Compose
- **Server**: Apache

---

## 🧰 Installation Guide

1. 📥 Clone the Repository:
   ```bash
   git clone https://github.com/Learnathon-By-Geeky-Solutions/php-pulse.git
   cd php-pulse
   ```

2. ⚙️ Set Up Environment Variables:
   ```bash
   cp .env.example .env
   ```

3. 📦 Install Dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```

4. 🗄️ Run Migrations and Seeders:
   ```bash
   php artisan migrate --seed
   ```

5. 🚀 Start the Application:
   ```bash
   php artisan serve
   ```

Access: [http://localhost:8000](http://localhost:8000)

---

## 🧪 Testing

Run unit and feature tests:
```bash
php artisan test
```

---

## 🔮 Future Enhancements

- 🧠 AI-based product recommendations.
- 📱 Progressive Web App (PWA) support.
- 💳 More local payment gateway integrations.
- 🌍 Multi-language support for global reach.
- 📊 Advanced analytics and reporting for vendors and admins.

---

**Developed with ❤️ by PHP-Pulse**

