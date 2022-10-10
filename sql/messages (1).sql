
-- Database: `loginsystem`

CREATE TABLE `messages` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` longtext NOT NULL,PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(8, 'samy', 'samy@123gmail.com', ' problem with order', 'vhhj');



ALTER TABLE `messages`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

