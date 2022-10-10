

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT ,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



