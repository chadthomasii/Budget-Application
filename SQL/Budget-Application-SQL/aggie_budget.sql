DROP DATABASE aggie_budget;
CREATE DATABASE aggie_budget;
USE aggie_budget;


CREATE TABLE users
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    upassword VARCHAR(250) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phoneNum VARCHAR(20),
    created_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE budgetprofile 
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  savings INT DEFAULT '20',
  bills INT DEFAULT '30',
  entertainment INT DEFAULT '20',
  discretionary INT DEFAULT '30',
  checkAmount FLOAT DEFAULT '0',
  user_id INT NOT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE individual_check
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  amount FLOAT(9,2) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  user_id INT NOT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE billers
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  billerName VARCHAR(30) NOT NULL,
  billingAmount FLOAT(9,2) DEFAULT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE savings_goals
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  goalName VARCHAR(30) NOT NULL,
  currentAmount FLOAT(9,2) DEFAULT 0.00,
  goalAmount FLOAT(9,2) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  user_id INT NOT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id)
);

