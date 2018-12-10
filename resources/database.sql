CREATE Database if not exists `L2C_KE_PHP_CMS`;
use `L2C_KE_PHP_CMS`;

CREATE TABLE `Users`
(
  `ID`       int(11) PRIMARY key NOT NULL AUTO_INCREMENT,
  `email`    varchar(256) NOT NULL,
  `password` varchar(64)  NOT NULL,
  `nickname` varchar(128) NOT NULL
);

CREATE TABLE `Pages` (
                       `ID` int(11) PRIMARY key NOT NULL AUTO_INCREMENT,
                       `title` varchar(128) NOT NULL,
                       `content` text NOT NULL,
                       `User_ID` int(11) NOT NULL,
                       `menu_label` varchar(128) NOT NULL,
                       `menu_order` int(11) NOT NULL
);


ALTER TABLE `Pages` ADD CONSTRAINT fk_Pages_Users_idx FOREIGN KEY Pages(`User_ID`) REFERENCES Users(`ID`);

INSERT INTO `Users` (`email`, `password`, `nickname`) VALUES ("admin@milos.sk", "Administrator", "Admin");
