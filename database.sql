CREATE DATABASE IF NOT EXISTS `electricsawt` DEFAULT CHARACTER SET latin1 COLLATE
latin1_swedish_ci;
USE `electricsawt`;

CREATE TABLE IF NOT EXISTS admin (
  `idAdmin` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nameAdmin` TINYTEXT NOT NULL,
  `emailAdmin` TINYTEXT NOT NULL,
  `pwdAdmin` LONGTEXT NOT NULL
);

/*the hashed password is the equivalent of managertest*/
INSERT INTO `admin` (`idAdmin`, `nameAdmin`, `emailAdmin`, `pwdAdmin`)
VALUES (NULL, 'manager1', 'silvia.birleanu@gmail.com', '$2y$10$CR3YqGOBFjkLdatmKUpA4OCPygXxBir.NZZKDEfg8oXyOAER2tkDC');

CREATE TABLE IF NOT EXISTS customers (
  `idCust` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nameCust` TINYTEXT NOT NULL,
  `phoneCust` VARCHAR(11) NOT NULL,
  `emailCust` TINYTEXT NOT NULL,
  `pwdCust` LONGTEXT NOT NULL,
  UNIQUE (`phoneCust`)
);

/*https://www.w3resource.com/mysql/creating-table-advance/constraint.php#cons6*/

CREATE TABLE IF NOT EXISTS products (
  `productId` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `productName` VARCHAR(255) NOT NULL,
  `productImg` VARCHAR(40),
  `productPrice` VARCHAR(16) NOT NULL,
  `productCategory` VARCHAR(16) NOT NULL,
  `productType`  VARCHAR(16) NOT NULL,
  `alt_tag` VARCHAR(255) NOT NULL
);


INSERT INTO `products`(`productId`, `productName`, `productImg`, `productPrice`, `productCategory`, `productType`, `alt_tag`)
VALUES
(1, 'LG 22LJ4540', 'LG1.jpg', 116.00, 'tv', 'LG', 'LG 22LJ4540 TV'),
(2, 'LG 24LM530S-PU', 'LG2.jpg', 176.00, 'tv', 'LG', 'LG 24LM530S-PU TV'),
(3, 'LG 32LM620BPUA', 'LG3.jpg', 245.00, 'tv', 'LG', 'LG 32LM620BPUA TV'),
(4, 'Samsung QN82Q80RAFXZA', 'Sam1.jpg', 329.00, 'tv', 'Samsung', 'Samsung QN82Q80RAFXZA TV'),
(5, 'Samsung Flat 82-Inch 4K 8 Series UHD', 'Sam2.jpg', 1885.00, 'tv', 'Samsung', 'Samsung Flat 82-Inch 4K 8 Series UHD TV'),
(6, 'Samsung UN32M4500BFXZA', 'Sam3.jpg', 179.00, 'tv', 'Samsung', 'Samsung UN32M4500BFXZA TV'),
(7, 'Sony X800H', 'Sony1.jpg', 1729.00, 'tv', 'Sony', 'Sony X800H TV'),
(8, 'Sony X950H', 'Sony2.jpg', 1299.00, 'tv', 'Sony', 'Sony X950H TV'),
(9, 'Sony XBR-65A9G', 'Sony3.jpg', 2999.00, 'tv', 'Sony', 'Sony XBR-65A9G TV'),
(10, 'LG GSJ961PZVV', 'LG1F.jpg', 1999.00, 'refrigerators', 'LG', 'LG GSJ961PZVV Refrigerator'),
(11, 'LG GSX960NSVZ', 'LG2F.jpg', 1899.00, 'refrigerators', 'LG', 'LG GML844PZKV Refrigerator'),
(12, 'LG GML844PZKV', 'LG3F.jpg', 2199.00, 'refrigerators', 'LG', 'LG GML844PZKV Refrigerator'),
(13, 'Samsung G-Series RFG23UEBP', 'Sam1F.jpg', 1549.00, 'refrigerators', 'Samsung', 'Samsung G-Series RFG23UEBP Refrigerator'),
(14, 'Samsung RF22R7351SR', 'Sam2F.jpg', 2099.00, 'refrigerators', 'Samsung', 'Samsung RF22R7351SR Refrigerator'),
(15, 'SAMSUNG RF24R7201SR/EU Smart Fridge Freezer', 'Sam3F.jpg', 1799.00, 'refrigerators', 'Samsung', 'Samsung RF24R7201SR/EU Smart Fridge Freezer Refrigerator'),
(16, 'Midea WHD-113FB1', 'Midea1.jpg', 229.00, 'refrigerators', 'Midea', 'Midea 22LJ4540 Refrigerator'),
(17, 'Midea WHD-113FSS1', 'Midea2.jpg', 299.00, 'refrigerators', 'Midea', 'Midea 22LJ4540 Refrigerator'),
(18, 'Midea WHS-121LW1', 'Midea3.jpg', 172.00, 'refrigerators', 'Midea', 'Midea 22LJ4540 Refrigerator')
;

CREATE TABLE orders (
  `order_id` int(11) AUTO_INCREMENT NOT NULL,
  `customer_id` int(11) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customers`(`idCust`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;

CREATE TABLE order_details(
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` VARCHAR(255) NOT NULL,
  `product_price` VARCHAR(16) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`order_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;
