SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(32) NOT NULL,
  `session_data` text,
  `session_ip` varchar(255) NOT NULL,
  `session_timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `table1` (
  `t1_id` int(11) NOT NULL AUTO_INCREMENT,
  `t1_name` varchar(50) NOT NULL,
  PRIMARY KEY (`t1_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `table1` (`t1_id`, `t1_name`) VALUES
(1, 'bill'),
(2, 'sarah'),
(3, 'pete'),
(4, 'laura'),
(5, 'roger');

CREATE TABLE IF NOT EXISTS `table2` (
  `t2_id` int(11) NOT NULL AUTO_INCREMENT,
  `t2_name` varchar(50) NOT NULL,
  PRIMARY KEY (`t2_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `table2` (`t2_id`, `t2_name`) VALUES
(1, 'mary'),
(2, 'max'),
(3, 'charlotte'),
(4, 'sarah'),
(5, 'bill');

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(56) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES
(1, 'chris', '0d5e508476501cf5e91e0e9dfa067b2d13c69aa2');