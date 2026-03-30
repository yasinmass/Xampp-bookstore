-- ============================================
--   BOOKSTORE DATABASE - SQL FILE
--   Based on ER Diagram
-- ============================================

CREATE DATABASE IF NOT EXISTS bookstore;
USE bookstore;

-- ============================================
-- 1. AUTHOR TABLE
-- ============================================
CREATE TABLE author (
    author_id INT AUTO_INCREMENT PRIMARY KEY,
    author_name VARCHAR(100) NOT NULL
);

-- ============================================
-- 2. CUSTOMER TABLE
-- ============================================
CREATE TABLE customer (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- ============================================
-- 3. BOOK TABLE
-- ============================================
CREATE TABLE book (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    ISBN VARCHAR(20) UNIQUE NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES author(author_id)
);

-- ============================================
-- 4. CART TABLE
-- ============================================
CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    created_date DATE NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
);

-- ============================================
-- 5. CART CONTAINS BOOK (cart_items)
-- ============================================
CREATE TABLE cart_items (
    cart_id INT,
    book_id INT,
    quantity INT DEFAULT 1,
    PRIMARY KEY (cart_id, book_id),
    FOREIGN KEY (cart_id) REFERENCES cart(cart_id),
    FOREIGN KEY (book_id) REFERENCES book(book_id)
);

-- ============================================
-- 6. ORDER TABLE
-- ============================================
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    order_date DATE NOT NULL,
    customer_id INT,
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
);

-- ============================================
-- 7. ORDER-ITEM TABLE
-- ============================================
CREATE TABLE order_item (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    book_id INT,
    quantity INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (book_id) REFERENCES book(book_id)
);

-- ============================================
-- SAMPLE DATA
-- ============================================

-- Authors
INSERT INTO author (author_name) VALUES
('J.K. Rowling'),
('George Orwell'),
('Dan Brown'),
('Agatha Christie'),
('Stephen King');

-- Customers
INSERT INTO customer (customer_name, name, email, password) VALUES
('Yasin', 'Yasin M', 'yasin@email.com', MD5('password123')),
('Sri', 'Sri K', 'sri@email.com', MD5('password123'));

-- Books
INSERT INTO book (title, ISBN, price, author_id) VALUES
('Harry Potter and the Sorcerers Stone', '978-0439708180', 499.00, 1),
('Animal Farm', '978-0451526342', 299.00, 2),
('The Da Vinci Code', '978-0307474278', 399.00, 3),
('Murder on the Orient Express', '978-0062693662', 349.00, 4),
('The Shining', '978-0307743657', 449.00, 5);

-- Cart
INSERT INTO cart (customer_id, created_date) VALUES
(1, CURDATE());

-- Cart Items
INSERT INTO cart_items (cart_id, book_id, quantity) VALUES
(1, 1, 2),
(1, 3, 1);

-- Orders
INSERT INTO orders (order_date, customer_id) VALUES
(CURDATE(), 1);

-- Order Items
INSERT INTO order_item (order_id, book_id, quantity) VALUES
(1, 2, 1),
(1, 4, 2);
