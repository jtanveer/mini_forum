# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.21-MariaDB)
# Database: mini_forum
# Generation Time: 2017-10-08 22:34:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table acos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acos`;

CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
VALUES
	(1,NULL,NULL,NULL,'controllers',1,104),
	(2,1,NULL,NULL,'Categories',2,17),
	(3,2,NULL,NULL,'index',3,4),
	(4,2,NULL,NULL,'view',5,6),
	(5,2,NULL,NULL,'add',7,8),
	(6,2,NULL,NULL,'edit',9,10),
	(7,2,NULL,NULL,'delete',11,12),
	(8,2,NULL,NULL,'all',13,14),
	(9,1,NULL,NULL,'Groups',18,29),
	(10,9,NULL,NULL,'index',19,20),
	(11,9,NULL,NULL,'view',21,22),
	(12,9,NULL,NULL,'add',23,24),
	(13,9,NULL,NULL,'edit',25,26),
	(14,9,NULL,NULL,'delete',27,28),
	(15,1,NULL,NULL,'Pages',30,33),
	(16,15,NULL,NULL,'display',31,32),
	(17,1,NULL,NULL,'Replies',34,45),
	(18,17,NULL,NULL,'index',35,36),
	(19,17,NULL,NULL,'view',37,38),
	(20,17,NULL,NULL,'add',39,40),
	(21,17,NULL,NULL,'edit',41,42),
	(22,17,NULL,NULL,'delete',43,44),
	(23,1,NULL,NULL,'Topics',46,65),
	(24,23,NULL,NULL,'index',47,48),
	(25,23,NULL,NULL,'view',49,50),
	(26,23,NULL,NULL,'add',51,52),
	(27,23,NULL,NULL,'edit',53,54),
	(28,23,NULL,NULL,'delete',55,56),
	(29,23,NULL,NULL,'all',57,58),
	(31,23,NULL,NULL,'create',59,60),
	(33,1,NULL,NULL,'Users',66,83),
	(35,33,NULL,NULL,'index',67,68),
	(36,33,NULL,NULL,'login',69,70),
	(37,33,NULL,NULL,'logout',71,72),
	(38,33,NULL,NULL,'view',73,74),
	(39,33,NULL,NULL,'add',75,76),
	(40,33,NULL,NULL,'edit',77,78),
	(41,33,NULL,NULL,'delete',79,80),
	(42,1,NULL,NULL,'AclExtras',84,85),
	(44,33,NULL,NULL,'register',81,82),
	(45,1,NULL,NULL,'DebugKit',86,93),
	(46,45,NULL,NULL,'ToolbarAccess',87,92),
	(47,46,NULL,NULL,'history_state',88,89),
	(48,46,NULL,NULL,'sql_explain',90,91),
	(49,23,NULL,NULL,'details',61,62),
	(50,2,NULL,NULL,'details',15,16),
	(51,23,NULL,NULL,'reply',63,64),
	(52,1,NULL,NULL,'BoostCake',94,103),
	(53,52,NULL,NULL,'BoostCake',95,102),
	(54,53,NULL,NULL,'index',96,97),
	(55,53,NULL,NULL,'bootstrap2',98,99),
	(56,53,NULL,NULL,'bootstrap3',100,101);

/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table aros
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aros`;

CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
VALUES
	(1,NULL,'Group',1,NULL,1,2),
	(2,NULL,'Group',2,NULL,3,4);

/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table aros_acos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aros_acos`;

CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`)
VALUES
	(1,1,1,'1','1','1','1'),
	(2,2,1,'-1','-1','-1','-1'),
	(3,2,29,'1','1','1','1'),
	(5,2,31,'1','1','1','1'),
	(7,2,8,'1','1','1','1'),
	(8,2,37,'1','1','1','1'),
	(9,2,49,'1','1','1','1'),
	(10,2,51,'1','1','1','1'),
	(11,2,50,'1','1','1','1');

/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `description`, `created`, `modified`)
VALUES
	(1,'Technology','Technology related topics','2017-10-01 11:15:59','2017-10-01 11:15:59'),
	(2,'Business','Business related topics','2017-10-01 11:16:23','2017-10-01 11:16:23'),
	(3,'Automobiles','Latest automobile news','2017-10-01 11:17:58','2017-10-01 11:17:58'),
	(4,'Movies','Movie reviews','2017-10-01 11:18:25','2017-10-01 11:18:25'),
	(5,'Politics','Politics around the world','2017-10-01 11:19:58','2017-10-01 11:19:58'),
	(6,'Travel','Topics about best places to go','2017-10-01 11:20:31','2017-10-01 11:20:31'),
	(7,'Health','Health and fitness','2017-10-01 11:20:54','2017-10-01 11:20:54'),
	(8,'Sports','Latest stories on sports','2017-10-01 11:27:12','2017-10-01 11:27:12');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`)
VALUES
	(1,'admin','2017-09-29 17:36:18','2017-09-29 17:36:18'),
	(2,'author','2017-09-29 17:36:25','2017-09-29 17:36:25');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table replies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `replies`;

CREATE TABLE `replies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `topic_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;

INSERT INTO `replies` (`id`, `text`, `topic_id`, `user_id`, `created`, `modified`)
VALUES
	(1,'That\'s a great news!',1,3,'2017-10-01 18:03:51','2017-10-01 18:03:51'),
	(2,'I am buying one soon!',1,4,'2017-10-07 18:34:16','2017-10-07 18:34:16'),
	(3,'great movie.',13,5,'2017-10-07 18:35:06','2017-10-07 18:35:06'),
	(4,'Its a joke',14,2,'2017-10-07 18:35:44','2017-10-07 18:35:44'),
	(5,'Why do you think its a joke??',14,4,'2017-10-07 18:36:05','2017-10-07 18:36:05'),
	(6,'Is Spider Man even a hero? :/',14,2,'2017-10-07 18:36:30','2017-10-07 18:36:30'),
	(7,'He is probably the youngest one, but still he is!',14,5,'2017-10-07 18:37:06','2017-10-07 18:37:06'),
	(8,'Everyone makes joke out of him, even his girlfriend! :p',14,2,'2017-10-07 18:38:11','2017-10-07 18:38:11'),
	(9,'That\'s just part of the story. That just does not destroy his heroism.',14,4,'2017-10-07 18:38:52','2017-10-07 18:38:52'),
	(10,'Heroism?! big lol',14,2,'2017-10-07 18:39:32','2017-10-07 18:39:32'),
	(17,'sad',14,2,'2017-10-07 21:39:29','2017-10-07 21:39:29'),
	(18,'Are you kidding me?!',14,2,'2017-10-07 21:40:38','2017-10-07 21:40:38'),
	(19,'<p><strong>yet again!</strong></p>',25,1,'2017-10-08 20:09:46','2017-10-08 20:09:46'),
	(20,'<p>my name is&nbsp;<em>Nayon</em>&nbsp;</p>',25,1,'2017-10-08 20:10:28','2017-10-08 20:10:28'),
	(21,'<p><strong>This&nbsp;</strong>is an&nbsp;<em>HTML&nbsp;<strong>Reply.</strong></em></p>',25,1,'2017-10-08 20:11:15','2017-10-08 20:11:15'),
	(22,'<p>Its working&nbsp;<strong><em>well.</em></strong></p>',25,1,'2017-10-08 20:11:40','2017-10-08 20:11:40'),
	(23,'hello world',25,1,'2017-10-08 20:24:23','2017-10-08 20:24:23'),
	(24,'What happened?',25,1,'2017-10-08 20:30:29','2017-10-08 20:30:29'),
	(25,'Wow',25,1,'2017-10-08 20:36:10','2017-10-08 20:36:10'),
	(26,'No!',25,1,'2017-10-08 20:36:24','2017-10-08 20:36:24'),
	(27,'This can\'t be true!',25,1,'2017-10-08 20:36:36','2017-10-08 20:36:36'),
	(28,'you must be kidding me!',25,1,'2017-10-08 20:38:44','2017-10-08 20:38:44'),
	(29,'Damn!',25,1,'2017-10-08 20:42:24','2017-10-08 20:42:24'),
	(30,'<p>sad!</p>',14,1,'2017-10-08 20:48:00','2017-10-08 20:48:00'),
	(31,'<p><strong>Really!</strong></p>',14,1,'2017-10-08 20:51:39','2017-10-08 20:51:39'),
	(32,'<p>Reply&nbsp;<em>cant be&nbsp;<strong>smaller than&nbsp;</strong>two</em><strong> characters</strong></p>',14,1,'2017-10-08 21:11:59','2017-10-08 21:11:59');

/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table topics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topics`;

CREATE TABLE `topics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;

INSERT INTO `topics` (`id`, `title`, `content`, `category_id`, `user_id`, `created`, `modified`)
VALUES
	(1,'Amazon Alexa','You donâ€™t need to buy a new Echo to get Alexaâ€™s best new feature.',1,2,'2017-10-01 11:22:33','2017-10-01 11:22:33'),
	(2,'Uber','In Power Move at Uber, Travis Kalanick Appoints 2 to Board.',1,3,'2017-10-01 11:23:01','2017-10-01 11:23:01'),
	(3,'IBM','IBM Now Has More Employees in India Than in the U.S.',1,2,'2017-10-01 11:23:32','2017-10-01 11:23:32'),
	(4,'Trump on Facebook','Responding to President Trumpâ€™s tweet this week that â€œFacebook was always anti-Trump,â€ Mark Zuckerberg, the chief executive of Facebook, defended the company by noting that Mr. Trumpâ€™s opponents also criticize it â€” as having aided Mr. Trump. If everyone is upset with you, Mr. Zuckerberg suggested, you must be doing something right.',5,3,'2017-10-01 11:25:08','2017-10-01 11:25:08'),
	(5,'Wall Streen','A $732 billion investor says Wall Street is seriously underestimating Trump\'s tax plan.',2,3,'2017-10-01 11:26:11','2017-10-01 11:26:11'),
	(6,'Julian Assange in action','Julian Assange is rallying behind Catalan separatists ahead of a historic referendum â€” and Russia has taken notice.',5,3,'2017-10-01 11:26:54','2017-10-01 11:26:54'),
	(7,'Volkswagen scandal','The diesel emissions cheating scandal will cost Volkswagen an extra $3bn (â?¬2.5bn), because engines are proving \"far more technically complex and time consuming\" to adapt the company said.',2,2,'2017-10-01 11:29:18','2017-10-01 11:29:18'),
	(8,'Porche in India','The long-awaited Porsche 911 GT3 will finally set foot in India on October 9, 2017. The 911 series is all about blowing your mind wide open with its ridiculous specs. Unlike the Carrera or the Turbo, the GT3 is powered by the rumbly 4.0-litre flat-six.',3,1,'2017-10-01 11:31:07','2017-10-01 11:31:07'),
	(9,'Electric car','More automakers are partnering in preparation for an electric car future. Mazda and Toyota are next, joining with Denso Corporation to form a new company that will develop electric vehicle technologies.',3,3,'2017-10-01 11:32:00','2017-10-01 11:32:00'),
	(10,'Tesla','Tesla Model X the First SUV Ever to Achieve 5-Star Crash Rating in Every Category',3,2,'2017-10-01 11:34:13','2017-10-01 11:34:13'),
	(11,'Blade Runner 2049 Review','There are tears in Blade Runner 2049, and there is rain. In its sunlight-starved Californian megatropolis, luridly haired denizens eat East Asian street food, brandish transparent brollies and are dwarfed by adverts promising a new life in distant colonies they can\'t afford to reach. Eyeballs feature prominently, as do obscurely distressing psychological tests and vocally controlled analogue gadgets. Identity and memory, meanwhile, remain as questionable as the concept of humanity is fluid.',4,3,'2017-10-01 11:36:34','2017-10-01 11:36:34'),
	(12,'Wonder Woman Story','Wonder Woman: Diana, princess of the Amazons, trained to be an unconquerable warrior. Raised on a sheltered island paradise, when a pilot crashes on their shores and tells of a massive conflict raging in the outside world, Diana leaves her home, convinced she can stop the threat. Fighting alongside man in a war to end all wars, Diana will discover her full powers and her true destiny.',4,3,'2017-10-01 11:39:25','2017-10-01 11:39:25'),
	(13,'Guardian of the Galaxy Vol. 2','Guardians of the Galaxy Vol. 2: After saving Xandar from Ronan\'s wrath, the Guardians are now recognized as heroes. Now the team must help their leader Star Lord (Chris Pratt) uncover the truth behind his true heritage. Along the way, old foes turn to allies and betrayal is blooming. And the Guardians find that they are up against a devastating new menace who is out to rule the galaxy.',4,2,'2017-10-01 11:40:11','2017-10-01 11:40:11'),
	(14,'Spider-Man: Homecoming Rating','Spider-Man: Homecoming: Thrilled by his experience with the Avengers, Peter returns home, where he lives with his Aunt May, under the watchful eye of his new mentor Tony Stark, Peter tries to fall back into his normal daily routine - distracted by thoughts of proving himself to be more than just your friendly neighborhood Spider-Man - but when the Vulture emerges as a new villain, everything that Peter holds most important will be threatened.',4,1,'2017-10-01 11:40:37','2017-10-01 11:40:37'),
	(15,'Rome','Rome is a city thatâ??s best discovered on foot, which is why itâ??s so wonderful in the fall. September is considered part of shoulder season, so while you wonâ??t see hordes of people, there will still be plenty of locals and tourists enjoying the weather and taking in the many sights of Rome. ',6,3,'2017-10-01 11:43:40','2017-10-01 11:43:40'),
	(16,'San Diego','If you havenâ??t been to San Diego yet, youâ??re missing out on one of Californiaâ??s best new food experiences. The city used to be known solely for its fish tacos, but now inventive chefs are offering oysters that have been raised specifically for a restaurant (Ironside Fish & Oyster) and incredibly delicious doughnuts (VG Donut & Bakery). The other beauty of spending a weekend in San Diego is the ability to take a day trip across the border to Tijuana, another city gaining a food reputation.',6,2,'2017-10-01 11:44:22','2017-10-01 11:44:22'),
	(17,'Thailan','As far as honeymoon destinations go, Thailand is famous the world over for its gorgeous beaches and smiley people. The problem is that if you choose the wrong beach location, like Patong Beach, you\'re going to find yourself spending your honeymoon in a go-go bar.',6,2,'2017-10-01 11:45:56','2017-10-01 11:45:56'),
	(18,'Maldives','Thank goodness the Drift Thelu Veliga Retreat, a new four-star resort in the Maldives, decided not to compete with Mother Nature for show-stopping fabulosity.\r\n\r\nRead more: http://www.dailymail.co.uk/travel/travelsupplement/article-4935914/This-Maldives-retreat-won-t-break-bank.html#ixzz4uFwcXoNJ \r\nFollow us: @MailOnline on Twitter | DailyMail on Facebook',6,1,'2017-10-01 11:46:45','2017-10-01 11:46:45'),
	(19,'Moeen Ali talks about Ashes','England can win Ashes without Ben Stokes, says Moeen Ali.',8,1,'2017-10-01 11:48:27','2017-10-01 11:48:27'),
	(20,'Pep Guardiola confident about Kevin De Bruyne','Man City manager Pep Guardiola says Kevin De Bruyne \'can do absolutely everything\'.',8,3,'2017-10-01 11:49:09','2017-10-01 11:49:09'),
	(21,'South Africa vs Bangladesh','South Africa vs Bangladesh, Live Cricket Score, 1st Test Day 4: Rain stops play; South Africa lead by 388 runs.',8,2,'2017-10-01 11:49:49','2017-10-01 11:49:49'),
	(22,'Srilanka vs Pakistan','Eleven sessions into this match, with only four to go, what has been achieved? A three-run lead. That measly advantage belongs, if you are wondering, to Pakistan. They had begun the session in danger of conceding a lead of over 50, but thanks to Haris Sohail\'s dogged persistence, they stuck around long enough to limp over Sri Lanka\'s 419.',8,1,'2017-10-01 11:51:51','2017-10-01 11:51:51'),
	(23,'India vs Australia','India wins over Australia in the ODI series by 4-1.',8,3,'2017-10-01 16:17:07','2017-10-01 16:17:07'),
	(24,'Arsenal vs Brighton','Arsenal wins convincingly against Brighton by 2 goals.',8,3,'2017-10-01 18:02:22','2017-10-01 18:02:22'),
	(25,'Test Cricket','South Africa won convincingly against Bangladesh in the first match of the series. Proteas humbled Bangladesh by a big margin of 333 runs.',8,1,'2017-10-02 20:50:57','2017-10-02 20:50:57'),
	(26,'First Topic','<p>This is a new topic created from the new forum!&nbsp;<strong>I am very happy about it!&nbsp;</strong><em>Hope that it works perfectly!</em></p>',1,1,'2017-10-08 21:49:04','2017-10-08 21:49:04'),
	(27,'New Topic as an User','<p>A general should be able to create post without any problem. <strong>This</strong> is what i am trying at this moment. Hopefully it gets posted! <span style=\"text-decoration: underline;\"><em>BYE</em></span></p>',2,2,'2017-10-08 21:52:35','2017-10-08 21:52:35'),
	(28,'Late night coding','<p>It\'s 4:32 at night. I have been spending sleepless nights for last two weeks. Hopefully it turns out well!</p>',2,3,'2017-10-08 22:32:52','2017-10-08 22:32:52');

/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `group_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `INDEX` (`email`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `group_id`, `email`, `password`, `created`, `modified`)
VALUES
	(1,'admin',1,'imjtnayon@gmail.com','da8f8960c914667963ebd8c55216813ab6d88871','2017-09-29 17:36:46','2017-10-01 15:20:10'),
	(2,'author1',2,'jtanveer@outlook.com','da8f8960c914667963ebd8c55216813ab6d88871','2017-09-29 17:37:08','2017-09-29 17:37:08'),
	(3,'author2',2,'imjtn@yahoo.com','da8f8960c914667963ebd8c55216813ab6d88871','2017-09-29 17:37:42','2017-09-29 17:37:42'),
	(4,'author3',2,'a@b.com','bb06321953015f8dba5a4080d86f5eb8a51de05b','2017-10-02 20:29:45','2017-10-02 20:29:45'),
	(5,'author5',2,'c@b.com','bb06321953015f8dba5a4080d86f5eb8a51de05b','2017-10-03 19:33:08','2017-10-03 19:33:08');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
