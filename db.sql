DROP DATABASE IF EXISTS `shop2.loc`;
CREATE DATABASE `shop2.loc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop2.loc`;

CREATE TABLE pages (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	content TEXT,
	title VARCHAR(255),
	uri VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (uri)
);

INSERT INTO pages(id,name,content,title,uri) VALUE (1,'Главная','Главная страница','Главная','main');
INSERT INTO pages(id,name,content,title,uri) VALUE (2,'Доставка и оплата','Доставка и оплата','Доставка и оплата','delivery');
INSERT INTO pages(id,name,content,title,uri) VALUE (3,'О магазине','О магазине','О магазине','about');
INSERT INTO pages(id,name,content,title,uri) VALUE (4,'Контакты','Контакты','Контакты','contacts');

CREATE TABLE categories (
	id INT AUTO_INCREMENT NOT NULL,
	title VARCHAR(255) NOT NULL,
	parent INT,
	description TEXT,
    uri VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (uri)
);

INSERT INTO categories(id,title,uri) VALUE (1,'Системные блоки','desktops');
INSERT INTO categories(id,title,uri) VALUE (2,'Ноутбуки','notebooks');
INSERT INTO categories(id,title,uri) VALUE (3,'Комплектующие','accessories');
INSERT INTO categories(id,title,parent,uri) VALUE (4,'Процессоры',3,'processors');
INSERT INTO categories(id,title,parent,uri) VALUE (5,'Материнские платы',3,'motherboards');
INSERT INTO categories(id,title,parent,uri) VALUE (6,'Память',3,'memory');
INSERT INTO categories(id,title,parent,uri) VALUE (7,'SSD-накопители',3,'ssd');
INSERT INTO categories(id,title,parent,uri) VALUE (8,'Видеокарты',3,'videocards');
INSERT INTO categories(id,title,uri) VALUE (9,'Мониторы','monitors');
INSERT INTO categories(id,title,uri) VALUE (10,'Клавиатуры','keyboards');
INSERT INTO categories(id,title,uri) VALUE (11,'Мыши','mouses');
INSERT INTO categories(id,title,uri) VALUE (12,'Принтеры','printers');
INSERT INTO categories(id,title,uri) VALUE (13,'Сканеры','scanners');
INSERT INTO categories(id,title,uri) VALUE (14,'Моноблоки','monoblocks');

CREATE TABLE products (
	id INT AUTO_INCREMENT NOT NULL,
	title VARCHAR(255),
	post_date DATETIME NOT NULL,
	category INT NOT NULL,
	short_descr TEXT,
	description TEXT,
    img VARCHAR(255),
    price DECIMAL,
	PRIMARY KEY (id),
	UNIQUE (title)
);

INSERT INTO products(id,title,post_date,category,description,img,price) VALUE (1,'Процессор Intel Core i7-9700 BX80684I79700 S RG13',NOW(),4,'Процессор Intel Core i7-9700 BX80684I79700 S RG13','product-1.jpg',25499);
INSERT INTO products(id,title,post_date,category,description,img,price) VALUE (2,'Процессор Intel Core i5 10500 BX8070110500 S RH3A IN',NOW(),4,'Процессор Intel Core i5 10500 BX8070110500 S RH3A IN','product-2.jpg',19599);
INSERT INTO products(id,title,post_date,category,description,img,price) VALUE (3,'Процессор AMD Ryzen 7 3700X 100-100000071BOX',NOW(),4,'Процессор AMD Ryzen 7 3700X 100-100000071BOX','product-3.jpg',29499);
INSERT INTO products(id,title,post_date,category,description,img,price) VALUE (4,'Материнская плата Gigabyte GA-A320M-H',NOW(),5,'Материнская плата Gigabyte GA-A320M-H','product-4.jpg',4399);
INSERT INTO products(id,title,post_date,category,description,img,price) VALUE (5,'Материнская плата ASUS ROG STRIX B450-F GAMING',NOW(),5,'Материнская плата ASUS ROG STRIX B450-F GAMING','product-5.png',10899);
INSERT INTO products(id,title,post_date,category,description,img,price) VALUE (6,'Видеокарта Palit GeForce GTX 1050Ti StormX 4Gb',NOW(),8,'Видеокарта Palit GeForce GTX 1050Ti StormX 4Gb','product-6.jpg',12599);

CREATE TABLE users (
	id INT AUTO_INCREMENT NOT NULL,
	email VARCHAR(255) NOT NULL,
	pass VARCHAR(255) NOT NULL,
	firstname VARCHAR(30),
	middlename VARCHAR(30),
	lastname VARCHAR(30),
	address VARCHAR(255) NOT NULL,
	phone VARCHAR(50) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (email)
);

INSERT INTO users(id,email,pass,address,phone) VALUE (1,'admin@mydomain.ru',md5(md5('123')),'Москва, ул. Московская 99','+7 234 324 3434');
INSERT INTO users(id,email,pass,address,phone) VALUE (2,'user@mydomain.ru',md5(md5('321')),'Москва, ул. Московская 97','+7 234 324 3423');

CREATE TABLE orders (
	id INT AUTO_INCREMENT NOT NULL,
    product INT NOT NULL,
	post_date DATETIME NOT NULL,
    email VARCHAR(255) NOT NULL, 
	firstname VARCHAR(30),
	middlename VARCHAR(30),
	lastname VARCHAR(30),
	address VARCHAR(255) NOT NULL,
	phone VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO orders(id,product,post_date,email,firstname,middlename,lastname,address,phone) VALUE (1,1,NOW(),'admin@mydomain.ru','Иван','Иванович','Иванов','Москва, ул. Пушкина 999, 999','+71234567890');