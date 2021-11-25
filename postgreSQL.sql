-- PostgreSQL

CREATE TABLE `item` (
  `item_id` int PRIMARY KEY AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `category` varchar(255) NOT NULL
);

CREATE TABLE `category` (
  `category_id` varchar(255) PRIMARY KEY,
  `category_name` varchar(255) NOT NULL
);

ALTER TABLE `item` ADD FOREIGN KEY (`category`) REFERENCES `category` (`category_id`);
