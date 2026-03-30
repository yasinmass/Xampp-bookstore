# 📚 Online Bookstore Management System

## 🚀 Project Overview

The **Online Bookstore Management System** is a full-stack web application built using **PHP, MySQL, HTML, CSS, and JavaScript**.
It allows users to browse books, manage a shopping cart, and place orders.

This project follows an **ER Diagram-based database design** and demonstrates complete frontend-backend integration.

---

## 🛠️ Tech Stack

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL
* **Server:** XAMPP

---

## 📁 Project Structure

### 📂 xampp_hdocs/

```bash
add_to_cart.php
authors.html
books.html
books.php
cart.html
cart.php
db.php
index.html
login.html
login.php
login_process.php
logout.php
orders.html
orders.php
place_order.php
register.html
register.php
register_process.php
remove_from_cart.php
```

### 📂 sql/

```bash
bookstore.sql
```

---

## ⚙️ Complete Setup Guide (Step-by-Step)

### ✅ Step 1 — Move Project Files

1. Copy all files from **xampp_hdocs folder**
2. Paste into:

```bash
C:\xampp\htdocs\
```

👉 Final path should look like:

```bash
C:\xampp\htdocs\books.php
C:\xampp\htdocs\login.php
...
```

---

### ✅ Step 2 — Start XAMPP

1. Open XAMPP Control Panel
2. Start:

   * **Apache**
   * **MySQL**

👉 Both should turn **green**

---

### ✅ Step 3 — Create Database

1. Open browser:

```bash
http://localhost/phpmyadmin
```

2. Click **New**
3. Enter database name:

```bash
bookstore
```

4. Click **Create**

---

### ✅ Step 4 — Import SQL File

1. Click on **bookstore** database (left side)
2. Go to **Import** tab
3. Click **Choose File**
4. Select:

```bash
sql/bookstore.sql
```

(Locate it from your downloaded project folder)

5. Click **Go**

👉 You should see:
✔ Tables created successfully

---

### ✅ Step 5 — Run the Project

Open in browser:

```bash
http://localhost/login.php
```

---

## 🔑 Default Login

* **Email:** [yasin@email.com](mailto:yasin@email.com)
* **Password:** password123

---

## 🔄 Application Flow

1. User logs in / registers
2. Views available books
3. Adds books to cart
4. Places an order
5. Views order history

---

## ✨ Features

* 👤 User Authentication (Login/Register)
* 📚 Book Listing with Authors
* 🛒 Cart Management
* 📦 Order Placement
* 📜 Order History
* 🔐 Session Handling

---

## ⚠️ Important Notes

* Ensure **MySQL is running in XAMPP**
* If MySQL fails, check port issues (3306 conflict)
* Make sure `db.php` has correct DB config:

```bash
localhost
root
(no password)
bookstore
```

---

## 📌 Future Enhancements

* 🔍 Search & filter books
* 💳 Payment system
* 🧑‍💼 Admin dashboard
* 📱 UI improvements

---

## 👨‍💻 Author

**Yasin Mass**
mohammed yasin A

---

## 📄 License

This project is for educational purposes only.
