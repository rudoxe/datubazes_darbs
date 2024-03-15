-- Izveidojam datubāzi
CREATE DATABASE IF NOT EXISTS library;

-- Izvēlamies izveidoto datubāzi
USE library;

-- Tabula ar grāmatām
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    publication_year INT NOT NULL,
    availability BOOLEAN NOT NULL DEFAULT 1
);

-- Tabula ar lietotājiem (pievienojama, ja nepieciešams lietotāju autentifikācija)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tabula ar grāmatu aizņemšanu
CREATE TABLE IF NOT EXISTS loans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    user_id INT NOT NULL,
    loan_date DATE NOT NULL,
    return_date DATE,
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
