# 📘 README.md

# CodeIgniter 4 Auth + Inventory App

A simple **Login & Register system** with an **Inventory (Items) CRUD** module built using **CodeIgniter 4** and **MySQL**.

---

## 🚀 Features

- User authentication (register, login, logout).
- Password hashing & session management.
- Auth filter to protect routes.
- Redirects logged-in users directly to Dashboard.
- Inventory management (items CRUD).
- CSRF protection enabled.

---

## ⚙️ Database Setup

1. **Create Database**

Connect to MySQL and create a new database:

```sql
CREATE DATABASE inventory_db;
```

2. **Run Migrations**

Run the following to create required tables:

```bash
php spark migrate
```

This will create:

- `users` (for authentication)
- `ci_sessions` (for session storage)
- `items` (for inventory)

3. **Seed Default Admin User**

You can generate a default admin user and item with:

```bash
php spark db:seed UserSeeder
php spark db:seed ItemSeeder
```

Default credentials:

- **Email:** `admin@example.com`
- **Password:** `secret123`

---

## ▶️ Running the App

Start the built-in server:

```bash
php spark serve
```

Open in browser:

```
http://localhost:8080
```

---

## 👤 Authentication

- **Register** → `/register`
- **Login** → `/login`
- **Logout** → `/logout`

🔒 If already logged in, accessing `/login` or `/register` redirects to `/dashboard`.

---

## 📦 Inventory (Items CRUD)

- **List items** → `/items`
- **Add new item** → `/items/create`
- **Edit item** → `/items/edit/{id}`
- **Delete item** → `/items/delete/{id}`

**Items table fields**:

- `id` (int, PK, auto increment)
- `category` (varchar 100)
- `stock` (int)
- `created_at` (datetime)
- `updated_at` (datetime)

---

## 📌 Project Structure

```
app/
├── Controllers/
│   ├── Auth.php
│   ├── Dashboard.php
│   └── Items.php
├── Models/
│   ├── UserModel.php
│   └── ItemModel.php
├── Views/
│   ├── layout.php
│   ├── auth/
│   │   ├── login.php
│   │   └── register.php
│   ├── dashboard.php
│   └── items/
│       ├── index.php
│       ├── create.php
│       └── edit.php
└── Filters/
    └── AuthGuard.php
```
