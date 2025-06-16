CREATE DATABASE book_inventory;
use book_inventory;

CREATE TABLE users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('Admin', 'User') NOT NULL DEFAULT 'User'
);

CREATE TABLE books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  publisher VARCHAR(255) NOT NULL,
  publishing_year INT NOT NULL,
  isbn VARCHAR(20) UNIQUE NOT NULL,
  edition VARCHAR(50),
  genre VARCHAR(100),
  cost DECIMAL(10, 2) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  quantity INT NOT NULL,
  language VARCHAR(50)
);

CREATE TABLE suppliers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  address VARCHAR(255) NOT NULL
);

CREATE TABLE invoices (
    invoice_number INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) DEFAULT NULL,
    total DECIMAL(10,2) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_number INT NOT NULL,
    book_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (invoice_number) REFERENCES invoices(invoice_number),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

CREATE TABLE purchase (
    purchase_number INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(255) NOT NULL,
    purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    book_title VARCHAR(255) NOT NULL,
    quantity INT CHECK (Quantity > 0),
    cost_per_unit DECIMAL(10, 2),
    total DECIMAL(10,2) NOT NULL,
    expected_delivery_date DATE,
    status ENUM('Pending', 'Received', 'Cancelled') DEFAULT 'Pending'
);

CREATE TABLE sales (
	report_id INT AUTO_INCREMENT PRIMARY KEY,
    total_amount DECIMAL(10,2) NOT NULL,
    total_order INT NOT NULL,
    from_date DATE NOT NULL,
    to_date DATE NOT NULL,
    generate_date DATETIME DEFAULT CURRENT_TIMESTAMP
);
    
CREATE TABLE purchase_report (
	report_id INT AUTO_INCREMENT PRIMARY KEY,
    total_purchase INT NOT NULL,
    from_date DATE NOT NULL,
    to_date DATE NOT NULL,
    generate_date DATETIME DEFAULT CURRENT_TIMESTAMP
);


