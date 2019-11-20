CREATE DATABASE IF NOT EXISTS 'blogListings'

DROP TABLE IF EXISTS `propertyListings`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `propertyTypes`;
DROP TABLE IF EXISTS `cities`;
DROP TABLE IF EXISTS `categories`;

CREATE TABLE IF NOT EXISTS `propertyTypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `propertyListings`(
    `id` int(11) AUTO_INCREMENT,
    `propertyType_id` int not null,
    `city_id` int not null,
    `address` varchar(255) not null,
    `description` text not null,
    `price` varchar(255) not null,
    `sqft` smallint not null,
    `bedrooms` smallint not null,
    `washrooms` smallint not null,
    `floors` smallint not null,
    `parkings` smallint,
    `lockers` smallint,
    `created_at` datetime not null DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime not null ON UPDATE CURRENT_TIMESTAMP, 
    PRIMARY KEY(id),
    FOREIGN KEY(propertyType_id) REFERENCES propertyTypes(id),
    FOREIGN KEY(city_id) REFERENCES cities(id)
);

CREATE TABLE IF NOT EXISTS `posts`(
    `id` int(11) AUTO_INCREMENT,
    `category_id` int not null,
    `title` varchar(255) not null,
    `body` text not null,
    `author` varchar(255) not null,
    `created_at` datetime not null DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime not null ON UPDATE CURRENT_TIMESTAMP, 
    PRIMARY KEY(id),
    FOREIGN KEY(category_id) REFERENCES categories(id)
);

INSERT INTO `propertyTypes` (`type`) VALUES
('Detached'),
('Semi-Detached'),
('Attached'),
('Link'),
('Row/Townhome'),
('Condominium');

INSERT INTO `categories` (`name`) VALUES
('Real Estate'),
('Travel'),
('Technology'),
('Gaming'),
('Auto'),
('Food'),
('Entertainment'),
('Books');


INSERT INTO `cities` (`city`) VALUES
('Toronto'),
('Etobicoke'),
('North York'),
('Vaughan'),
('Barrie'),
('Brampton'),
('Scarborough'),
('Hamilton'),
('Oakville'),
('Mississauga'),
('Burlington'),
('Stoney Creek'),
('Grimsby'),
('Niagara'),
('Ajax'),
('Pickering'),
('Whitby'),
('Aurora'),
('East York');


INSERT INTO `posts` (`category_id`, `title`, `body`, `author`) VALUES
(2, 'Travel Estate Post One', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.','Mary Jane'),
(1, 'Real Estate Post One', 'Adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque.','Clark Kent'),
(5, 'Auto Post One', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.','Eric Cartman'),
(4, 'Gaming Post One', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.','Scott Summers'),
(8, 'Books Post One', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.','David Banner'),
(6, 'Food Post Three', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.','Bruce Wayne'),
(3, 'Technology Post Three', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.','Jean Grey');
