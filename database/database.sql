drop database if exists abcdb;

create database abcdb;

use abcdb;

create table if not exists user (
    id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    type ENUM('admin', 'customer') NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS package (
   package_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   title VARCHAR(100) NOT NULL,
   description TEXT,
   date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
   rates DECIMAL(10, 2) NOT NULL
);

create table if not exists booking(
    booking_id   INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id      INT(6) UNSIGNED NOT NULL,
    package_id   INT(6) UNSIGNED NOT NULL,
    booking_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE,
    FOREIGN KEY (package_id) REFERENCES package (package_id) ON DELETE CASCADE
);




