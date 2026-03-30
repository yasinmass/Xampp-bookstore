# 📚 Online Bookstore Management System

## 🚀 Project Overview

The **Online Bookstore Management System** is a full-stack web application developed using **PHP, MySQL, HTML, CSS, and JavaScript**.
It allows users to browse books, manage a shopping cart, and place orders seamlessly.

This project is designed based on an **ER Diagram** and demonstrates complete database integration with a functional user interface.

---

## 🎯 Objectives

* To design a relational database using ER modeling
* To implement CRUD operations using PHP & MySQL
* To build a responsive and user-friendly frontend
* To simulate a real-world e-commerce workflow

---

## 🛠️ Tech Stack

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL
* **Server:** XAMPP (Apache)

---

## 🗂️ Database Design (ER Model)

The system consists of the following entities:

* **Customer** (customer_id, name, email, password)
* **Author** (author_id, author_name)
* **Book** (book_id, title, ISBN, price, author_id)
* **Cart** (cart_id, customer_id, created_date)
* **Cart Items** (cart_item_id, cart_id, book_id, quantity)
* **Orders** (order_id, order_date, customer_id)
* **Order Items** (order_item_id, order_id, book_id, quantity)

---

## ✨ Features

* 👤 User Registration & Login
* 📚 View Books with Author Details
* 🛒 Add to Cart / Remove from Cart
* 📦 Place Orders
* 📜 View Order History
* 🔐 Session Management (Login/Logout)

---

## 📁 Project Structure

```
bookstore/
│── db.php
│── login.php
│── register.php
│── books.php
│── cart.php
│── orders.php
│── add_to_cart.php
│── remove_from_cart.php
│── place_order.php
│── logout.php
│── bookstore.sql
```

---

## ⚙️ Setup Instructions

### 1️⃣ Clone the Repository

```
git clone https://github.com/your-username/bookstore.git
```

### 2️⃣ Move to XAMPP Directory

```
C:\xampp\htdocs\bookstore
```

### 3️⃣ Start Server

* Open XAMPP Control Panel
* Start **Apache** and **MySQL**

### 4️⃣ Import Database

* Open: http://localhost/phpmyadmin
* Create database: `bookstore`
* Import `bookstore.sql`

### 5️⃣ Run the Project

```
http://localhost/bookstore/login.php
```

---

## 🔑 Default Login

* **Email:** [yasin@email.com](mailto:yasin@email.com)
* **Password:** password123

---

## 🔄 Application Flow

1. User registers or logs in
2. Browses available books
3. Adds books to cart
4. Places an order
5. Views order history

---

## 📌 Future Enhancements

* 🔍 Search & filter books
* 💳 Payment gateway integration
* 🧑‍💼 Admin dashboard
* 📱 Responsive UI improvements

---

## 🎓 Learning Outcomes

* Understanding of full-stack development
* Database design using ER diagrams
* Backend integration with frontend
* Session handling and CRUD operations

---

## 📷 Screenshots

*(Add your project screenshots here for better presentation)*

---

## 👨‍💻 Author

**Yasin Mass**

---

## 📄 License

This project is developed for educational purposes.
