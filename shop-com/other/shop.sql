
CREATE DATABASE db_shop;
USE db_shop;

CREATE TABLE tb_user (name VARCHAR(32), pwd VARCHAR(32));
INSERT INTO tb_user VALUES ('huajian','zxcvbnm'),('peter','zxcvbnm');

CREATE TABLE tb_product (name VARCHAR(32), cate VARCHAR(16), img VARCHAR(32), state TINYINT);
INSERT INTO tb_product VALUES
('Computer 1','computer', '1.png', 1),
('Tablet 1','tablet', '2.png', 1),
('Mobile Phone 1','phone', '3.png', 1),
('Computer 2', 'computer', '4.png', -1),
('Mobile Phone 2', 'phone', '5.png', 0),
('Computer 3', 'computer', '6.png', 0);
