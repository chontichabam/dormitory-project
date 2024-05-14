CREATE TABLE user (
    id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(200) NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    userlevel VARCHAR(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE accommodations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
 type ENUM('internal', 'external', 'centric') NOT NULL,
    style VARCHAR(50),
    room INT(11),
    detail TEXT,
    tel VARCHAR(20),
    facilitate TEXT,
    profile_image varchar(255) DEFAULT NULL
);