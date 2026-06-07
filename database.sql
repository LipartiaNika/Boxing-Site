CREATE DATABASE IF NOT EXISTS boxing_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE boxing_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user','admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS fighters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    country VARCHAR(120) NOT NULL,
    weight VARCHAR(80) NOT NULL,
    wins INT DEFAULT 0,
    losses INT DEFAULT 0,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(120) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fighter_one VARCHAR(120) NOT NULL,
    fighter_two VARCHAR(120) NOT NULL,
    match_date DATE NOT NULL,
    location VARCHAR(160) NOT NULL,
    result VARCHAR(255) DEFAULT 'დაგეგმილია'
);

INSERT INTO users (username, email, password, role) VALUES
('admin', 'admin@boxing.ge', '$2y$10$6u2FQZuXc5qGUpi5r4wNZOnVhdH9F5GCrYGw4qFWE5fhVQhzDU4.G', 'admin')
ON DUPLICATE KEY UPDATE email=email;
-- admin password: admin123

INSERT INTO fighters (name, country, weight, wins, losses, description) VALUES
('ილია თოფურია', 'საქართველო', 'მსუბუქი წონა', 16, 0, 'ქართული საბრძოლო სპორტის ერთ-ერთი ყველაზე ცნობილი წარმომადგენელი.'),
('მაიკ ტაისონი', 'აშშ', 'მძიმე წონა', 50, 6, 'ლეგენდარული მძიმე წონის მოკრივე.'),
('მუჰამედ ალი', 'აშშ', 'მძიმე წონა', 56, 5, 'კრივის ისტორიაში ერთ-ერთი ყველაზე ცნობილი სპორტსმენი.')
ON DUPLICATE KEY UPDATE name=name;

INSERT INTO news (title, description) VALUES
('კრივის ახალი სეზონი იწყება', 'ახალ სეზონში გულშემატკივრებს ბევრი საინტერესო ბრძოლა ელოდებათ.'),
('ქართველი სპორტსმენების წარმატება', 'ქართველმა მებრძოლებმა საერთაშორისო ტურნირებზე წარმატებით იასპარეზეს.')
ON DUPLICATE KEY UPDATE title=title;

INSERT INTO matches (fighter_one, fighter_two, match_date, location, result) VALUES
('ილია თოფურია', 'მაქს ჰოლოვეი', '2026-07-20', 'თბილისი', 'დაგეგმილია'),
('მაიკ ტაისონი', 'როი ჯონსი', '2026-08-10', 'ლას-ვეგასი', 'დაგეგმილია')
ON DUPLICATE KEY UPDATE fighter_one=fighter_one;
