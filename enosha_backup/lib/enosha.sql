
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (`backup_id` int(11) NOT NULL auto_increment,`user` varchar(100) NOT NULL, `date` date NOT NULL, PRIMARY KEY  (`backup_id`), KEY `user` (`user`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (`catalog_id` int(11) NOT NULL auto_increment, `catalog_name` varchar(50) NOT NULL,  `level_1` varchar(50) default NULL, `level_2` varchar(50) default NULL, `level_3` varchar(50) default NULL, `level_4` varchar(50) default NULL, `level_5` varchar(50) default NULL,  `internal` int(11) default '1', `obsolete` tinyint(1) NOT NULL default '0', `stats` int(11) default '0', PRIMARY KEY  (`catalog_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`catalog_id`, `catalog_name`, `level_1`, `level_2`, `level_3`, `level_4`, `level_5`, `internal`, `obsolete`, `stats`) VALUES (1, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (`id` int(11) NOT NULL auto_increment,`lo_id` int(11) NOT NULL,`comment` varchar(200) NOT NULL,`user_id` int(11) NOT NULL, PRIMARY KEY  (`id`), KEY `lo_id` (`lo_id`), KEY `user_id` (`user_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `c_level_1`
--

CREATE TABLE IF NOT EXISTS `c_level_1` (`c_1_id` int(11) NOT NULL auto_increment, `name` varchar(100) default NULL, `catalog_c_1_id` int(11) default NULL, `obsolete` tinyint(1) NOT NULL default '0', `stats` int(11) default '0', PRIMARY KEY  (`c_1_id`), KEY `catalog_id` (`catalog_c_1_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `c_level_1`
--

INSERT INTO `c_level_1` (`c_1_id`, `name`, `catalog_c_1_id`, `obsolete`, `stats`) VALUES(1, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `c_level_2`
--

CREATE TABLE IF NOT EXISTS `c_level_2` (`c_2_id` int(11) NOT NULL auto_increment,`c_1_id` int(11) default NULL, `name` varchar(100) default NULL, `obsolete` tinyint(1) NOT NULL default '0',`stats` int(11) default '0', PRIMARY KEY  (`c_2_id`), KEY `c_1_id` (`c_1_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `c_level_2`
--

INSERT INTO `c_level_2` (`c_2_id`, `c_1_id`, `name`, `obsolete`, `stats`) VALUES(1, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `c_level_3`
--

CREATE TABLE IF NOT EXISTS `c_level_3` (`c_3_id` int(11) NOT NULL auto_increment, `c_2_id` int(11) default NULL, `name` varchar(100) default NULL, `obsolete` tinyint(1) NOT NULL default '0', `stats` int(11) default '0',  PRIMARY KEY  (`c_3_id`),  KEY `c_2_id` (`c_2_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `c_level_3`
--

INSERT INTO `c_level_3` (`c_3_id`, `c_2_id`, `name`, `obsolete`, `stats`) VALUES(1, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `c_level_4`
--

CREATE TABLE IF NOT EXISTS `c_level_4` (  `c_4_id` int(11) NOT NULL auto_increment,  `c_3_id` int(11) default NULL,  `name` varchar(100) default NULL,  `obsolete` tinyint(1) NOT NULL default '0',  `stats` int(11) default '0',  PRIMARY KEY  (`c_4_id`),  KEY `c_3_id` (`c_3_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `c_level_4`
--

INSERT INTO `c_level_4` (`c_4_id`, `c_3_id`, `name`, `obsolete`, `stats`) VALUES(1, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `c_level_5`
--

CREATE TABLE IF NOT EXISTS `c_level_5` (  `c_5_id` int(11) NOT NULL auto_increment,  `c_4_id` int(11) default NULL,
  `name` varchar(100) default NULL,  `obsolete` tinyint(1) NOT NULL default '0',  `stats` int(11) default '0',  PRIMARY KEY  (`c_5_id`),  KEY `c_4_id` (`c_4_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `c_level_5`
--

INSERT INTO `c_level_5` (`c_5_id`, `c_4_id`, `name`, `obsolete`, `stats`) VALUES(1, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `error`
--

CREATE TABLE IF NOT EXISTS `error` (  `error_no` int(10) NOT NULL,  `error_msg` varchar(1000) NOT NULL,  `error_description` mediumtext NOT NULL,  PRIMARY KEY  (`error_no`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `error`
--

INSERT INTO `error` (`error_no`, `error_msg`, `error_description`) VALUES
(1000, 'Login Errors', ''),(2000, 'Search Errors', ''),
(3000, 'Upload Errors', ''),(4000, 'Downlaod Errors', ''),
(5000, 'Admin Error', ''),(6000, 'User Management Errors', ''),(7000, 'Help Errors', ''),(8000, 'Feedback Errors', ''),(9000, 'Misc Errors', '');

-- --------------------------------------------------------

--
-- Table structure for table `error_report`
--

CREATE TABLE IF NOT EXISTS `error_report` (  `report_no` int(11) NOT NULL auto_increment,  `error_no` int(50) NOT NULL,
  `date_time` datetime NOT NULL,  `user` varchar(500) NOT NULL,  `aggregation_level` varchar(100) NOT NULL,  `category` varchar(100) NOT NULL,  `sub_category` varchar(100) NOT NULL,  `file_type` varchar(10) NOT NULL,  `file_size` varchar(10) NOT NULL,  `audience` varchar(100) NOT NULL,  `error_tracking` varchar(1000) NOT NULL,  `error_page` varchar(100) NOT NULL,  PRIMARY KEY  (`report_no`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `external_sites`
--

CREATE TABLE IF NOT EXISTS `external_sites` (  `id` int(11) NOT NULL auto_increment,  `site` varchar(15) NOT NULL,  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------


--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (  `id` int(11) NOT NULL auto_increment,  `log_id` int(11) NOT NULL,  `date` date NOT NULL,  `comment` varchar(10000) NOT NULL,  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE IF NOT EXISTS `format` (  `format_id` int(11) NOT NULL auto_increment,  `format_type_id` int(11) default '1',  `name` varchar(10) NOT NULL,  `stats` int(11) default '0',
  PRIMARY KEY  (`format_id`),  KEY `format_type_id` (`format_type_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `format` (`format_id`,`format_type_id`,`name`,`stats`) VALUES(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `format_type`
--

CREATE TABLE IF NOT EXISTS `format_type`(`format_type_id` int(11) NOT NULL auto_increment,`type` varchar(20) NOT NULL,  `obsolete` tinyint(1) NOT NULL default '0',`stats` int(11) default '0',PRIMARY KEY  (`format_type_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `format_type`
--

INSERT INTO `format_type` (`format_type_id`, `type`, `obsolete`, `stats`) VALUES(1, '', 0, 0),(2, 'Flash Files', 0, 0),(4, 'Text files', 0, 0),(5, 'sql files', 0, 0),(7, 'Images', 0, 0),(10, 'Audio', 0, 0),(12, 'Presentation', 0, 0),(13, 'Compressed', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `glossary`
--

CREATE TABLE IF NOT EXISTS `glossary` (  `id` int(100) NOT NULL auto_increment,  `name` varchar(100) NOT NULL,  `description` mediumtext NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `glossary`
--

INSERT INTO `glossary` (`id`, `name`, `description`) VALUES(33, 'Course modules', 'A complete course section that include a selection of collection of atoms.'),(32, 'Collection of atoms', 'A combination of atoms, like a HTML document with embedded pictures or a lesson.'),(31, 'Atom', 'The smallest level of aggregation, like Images, Text files, Sound files and Animations.'),(30, 'Aggregation level', 'The level of combination of learning objects.\r\nAtom: The smallest level of aggregation, like Images, Text files, Sound files and Animations.\r\nCollection of atoms: A combination of atoms, like a HTML document with embedded pictures or a lesson.\r\nCourse module: A complete course section that include a selection of collection of atoms.   \r\nFull course: A full course that include all the course modules for the specific course.'),(34, 'Full course', 'A full course that include all the course modules for the specific course.'),(35, 'Category', 'All content is classified under various categories and sub-categories. This makes it more easy for the users to find content that belong to a particular section. '),(36, 'Keyword', 'Words that define the material. A combination of keywords makes it easier for user to search for specific content.'),(37, 'Modifiable', 'Defines if the information in the material can be modified or not.'),(38, 'Copyright checked', 'Whether or not the material has parts that are restricted by copyright.'),(39, 'Activity type', 'The learning activity included in the material, like self assessments or tutorials.'),(40, 'Localization', 'The context and culture most suitable for the use of the material.'),(41, 'Platform requirements', 'Software needed to use the material.'),
(42, 'Audience', 'If the material is used only within the organization (Internal) or if it is publically accessible (External).'),(43, 'Education description', 'The pedagogical characteristics of the resource, like level of interactivity, if it is self-study material or material to be used in a classroom, pedagogy used etc. '),(44, 'Difficulty level', 'How hard the resource is for the intended student audience.'),
(45, 'Copyrights and Other Restrictions', 'Whether copyright or other restrictions apply for the use of the resource.'),
(46, 'Rights Description', 'Comments for the condition of use for the resource.'),(47, 'Author', 'The person that created the resource.'),(48, 'eNOSHA', 'eNOSHA stands for eLearning Neutral Object Storage with a Holistic Approach, and is an Open Source Learning Object Repository.'),(49, 'Target Region', 'The context and culture most suitable for the use of the material.');

-- --------------------------------------------------------

--
-- Table structure for table `interactivity_type`
--

CREATE TABLE IF NOT EXISTS `interactivity_type` (  `interactivity_id` smallint(6) NOT NULL auto_increment,  `interactivity_name` varchar(20) NOT NULL,`obsolete` tinyint(1) NOT NULL default '0',`stats` int(11) default '0',PRIMARY KEY  (`interactivity_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `interactivity_type`
--

INSERT INTO `interactivity_type` (`interactivity_id`, `interactivity_name`, `obsolete`, `stats`) VALUES(1, '', 0, 0),(2, 'Drag and Drop', 0, 0),(3, 'Self Assessment', 0, 0),
(4, 'Tutorial ', 0, 0),(5, 'Assignments', 0, 0),(6, 'Mixed', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (  `keyword_id` smallint(6) NOT NULL auto_increment,  `keyword` varchar(50) NOT NULL,  `stats` int(11) default '0',  PRIMARY KEY  (`keyword_id`),
  UNIQUE KEY `keyword` (`keyword`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`keyword_id`, `keyword`, `stats`) VALUES(1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (  `lang_id` int(11) NOT NULL auto_increment,  `language` varchar(50) NOT NULL,  `obsolete` tinyint(1) NOT NULL default '0',  `stats` int(11) default '0',  PRIMARY KEY  (`lang_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `language`, `obsolete`, `stats`) VALUES(1, '', 0, 0),(2, 'English', 0, 0),(3, 'Sinhala', 0, 0),(4, 'Tamil', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `learning_object`
--

CREATE TABLE IF NOT EXISTS `learning_object` (  `id` int(11) NOT NULL auto_increment,  `title` varchar(50) NOT NULL,  `catalog_id` int(11) default NULL,  `description` varchar(1024) default NULL,  `lang_id` int(11) default NULL,
  `aggregation_level` int(11) default NULL,  `c_1_id` int(11) default NULL,  `c_2_id` int(11) default NULL,  `c_3_id` int(11) default NULL,  `c_4_id` int(11) default NULL,  `c_5_id` int(11) default NULL,  `modifiable` tinyint(1) default NULL,  `scope` tinyint(1) default NULL,  `status` varchar(10) default NULL,  `date` datetime NOT NULL,  `author_id` int(11) default NULL,  `uploader_id` int(11) default NULL,  `comments_on_changes` varchar(250) default NULL,  `metadata_scheme` varchar(10) NOT NULL,  `format_id` int(11) default NULL,  `size` int(11) NOT NULL,  `location` varchar(250) NOT NULL,  `other_platform_requirements` varchar(100) default NULL,  `interactivity_id` smallint(6) default NULL,  `difficulty` int(11) default NULL,  `education_description` varchar(1024) default NULL,  `localization_id` int(11) default NULL,  `copyrights` tinyint(1) default NULL,  `copyright_description` varchar(1024) default NULL,  `copyright_checked` tinyint(1) default NULL,  `external` tinyint(1) default '0',  `stats` int(11) default '0',  `hit_counter` int(11) NOT NULL,  PRIMARY KEY  (`id`),  KEY `catalog_id` (`catalog_id`),  KEY `interactivity_id` (`interactivity_id`),  KEY `author_id` (`author_id`),  KEY `lang_id` (`lang_id`),  KEY `localization_id` (`localization_id`),  KEY `course_id` (`c_1_id`,`c_2_id`,`c_3_id`,`c_4_id`,`c_5_id`),  KEY `c_2_id` (`c_2_id`),  KEY `c_3_id` (`c_3_id`),  KEY `c_4_id` (`c_4_id`),  KEY `c_5_id` (`c_5_id`),  KEY `format_id` (`format_id`),  KEY `uploader_id` (`uploader_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- --------------------------------------------------------

--
-- Table structure for table `learning_object_keyword`
--

CREATE TABLE IF NOT EXISTS `learning_object_keyword` (  `lok_id` smallint(6) NOT NULL auto_increment,  `keyword_id` smallint(6) NOT NULL,  `lo_id` int(11) NOT NULL,  PRIMARY KEY  (`lok_id`),  KEY `keyword_id` (`keyword_id`),  KEY `lo_id` (`lo_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `localization`
--

CREATE TABLE IF NOT EXISTS `localization` (  `localization_id` int(11) NOT NULL auto_increment,  `lo_name` varchar(50) NOT NULL,  `obsolete` tinyint(1) NOT NULL default '0',  `stats` int(11) default '0',  PRIMARY KEY  (`localization_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `localization`
--

INSERT INTO `localization` (`localization_id`, `lo_name`, `obsolete`, `stats`) VALUES(1, '', 0, 0),(2, 'Sri Lanka', 0, 0),(3, 'Asian', 0, 0),(4, 'Global', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE IF NOT EXISTS `login_data` (  `id` int(11) NOT NULL auto_increment,  `user_id` int(11) NOT NULL,  `login_time` datetime NOT NULL,  `logout_time` datetime NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (  `id` int(11) NOT NULL auto_increment,  `lo_id` int(11) NOT NULL,  `rating` smallint(6) NOT NULL,  `ip` varchar(15) NOT NULL,  PRIMARY KEY  (`id`),  KEY `lo_id` (`lo_id`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- Table structure for table `statistics_search`
--

CREATE TABLE IF NOT EXISTS `statistics_search` (  `id` int(11) NOT NULL auto_increment,  `search_date` date NOT NULL,  `user_id` int(11) default NULL,  `search_type` tinyint(4) default NULL,  `catalog_id` int(11) default NULL,  `lang_id` int(11) default NULL,  `aggregation_level` int(11) default NULL,  `modifiable` tinyint(1) default NULL,  `scope` tinyint(1) default NULL,  `status` int(11) default NULL,  `author_id` int(11) default NULL,  `format` int(11) default NULL,  `interactivity_id` smallint(6) default NULL,  `difficulty` int(11) default NULL,  `localization` int(11) default NULL,  `copyright_checked` tinyint(1) default NULL,  `other_restrictions` tinyint(4) NOT NULL,  PRIMARY KEY  (`id`),  KEY `user_id` (`user_id`),  KEY `catalog_id` (`catalog_id`),  KEY `lang_id` (`lang_id`),  KEY `author_id` (`author_id`),  KEY `interactivity_id` (`interactivity_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `user_action`
--

CREATE TABLE IF NOT EXISTS `user_action` (  `id` smallint(6) NOT NULL auto_increment,  `action` varchar(50) NOT NULL,  `action_url` varchar(200) NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_action`
--

INSERT INTO `user_action` (`id`, `action`, `action_url`) VALUES(1, '', ''),(2, 'Upload', '/lib/upload/upload.php'),(3, 'Search', '/lib/search/simple_search.php'),(4, 'User Management', '/lib/admin/users/user_admin.php'),(5, 'Administration', '/lib/admin/admin.php'),(6, 'Edit_Help', '/lib/help/help.php'),(7, 'Feedback', '/lib/feedback/feedback.php'),(8, 'Statistics','/lib/statistics/statistics.php');

-- --------------------------------------------------------

--
-- Table structure for table `user_downloads`
--

CREATE TABLE IF NOT EXISTS `user_downloads` (  `id` int(11) NOT NULL auto_increment,  `lo_id` int(11) NOT NULL,  `user_id` int(11) NOT NULL,  `date` datetime NOT NULL,  PRIMARY KEY  (`id`),  KEY `lo_id` (`lo_id`,`user_id`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (  `id` int(11) NOT NULL auto_increment,  `name` varchar(255) NOT NULL,  `username` varchar(255) NOT NULL,  `password` varchar(255) NOT NULL,  `email` varchar(100) NOT NULL,  `type_id` smallint(6) default NULL,  `country` varchar(150) default NULL,  `send_email` tinyint(1) NOT NULL,  `register_date` date NOT NULL,  `blocked` tinyint(1) NOT NULL,  `validate` tinyint(1) default '0',  `last_activity` datetime NOT NULL,  PRIMARY KEY  (`id`),  KEY `type_id` (`type_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `username`, `password`, `email`, `type_id`, `country`, `send_email`, `register_date`, `blocked`, `validate`, `last_activity`) VALUES(1, 'Admin User', 'admin', '202cb962ac59075b964b07152d234b70', 'balasooriya077@gmail.com', 2, 'Sri Lanka', 0, '2009-09-18', 0, 0, '2009-11-25 04:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_right`
--

CREATE TABLE IF NOT EXISTS `user_right` (  `usertype_id` smallint(6) NOT NULL,  `action_id` smallint(6) NOT NULL,  KEY `usertype_id` (`usertype_id`,`action_id`),  KEY `action_id` (`action_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_right`
--

INSERT INTO `user_right` (`usertype_id`, `action_id`) VALUES(1, 1),(2, 2),(2, 3),(2, 4),(2, 5),(2, 6),(2, 8),(3, 3),(4, 2),(4, 3),(4, 5),(4, 6),(4, 7),(5, 2),(5, 3),(5, 6),(5, 7),
(6, 3),(6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_templates`
--

CREATE TABLE IF NOT EXISTS `user_templates` (  `ut_id` int(11) NOT NULL auto_increment,  `template_name` varchar(50) NOT NULL,  `user` int(11) default NULL, `author` int(11) default NULL,   `date` datetime NOT NULL,
  `catalog_id` int(11) default NULL,  `level_1` int(11) default NULL,  `level_2` int(11) default NULL,  `level_3` int(11) default NULL,  `level_4` int(11) default NULL,  `level_5` int(11) default NULL,  `lang_id` int(11) default NULL,  `aggregation_level` int(11) default NULL,  `modifiable` tinyint(1) default NULL,  `scope` tinyint(1) default NULL,  `status` varchar(10) default NULL,  `other_platform_requirements` varchar(100) default NULL,  `interactivity_id` smallint(6) default NULL,  `difficulty` int(11) default NULL,  `education_description` varchar(250) default NULL,  `localization` varchar(100) default NULL,  `copyright_checked` tinyint(1) default NULL,  `copyrights` tinyint(1) default NULL,  `copyright_description` varchar(250) default NULL,  PRIMARY KEY  (`ut_id`),  KEY `catalog_id` (`catalog_id`),  KEY `interactivity_id` (`interactivity_id`),  KEY `lang_id` (`lang_id`),  KEY `user` (`user`),  KEY `catalog_id_2` (`catalog_id`),  KEY `entry_id_2` (`lang_id`,`interactivity_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (  `type_id` smallint(6) NOT NULL auto_increment,  `type_name` varchar(50) NOT NULL,  `obsolete` tinyint(1) NOT NULL default '0',  PRIMARY KEY  (`type_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`, `obsolete`) VALUES(1, '', 0),(2, 'Administrator', 0),(3, 'External user', 0),(4, 'Instructional Designer', 0),(5, 'Content Developer', 0),(6, 'Normal User', 0);

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE IF NOT EXISTS `version` (  `id` int(11) NOT NULL auto_increment,  `lo_id` int(11) NOT NULL,  `parent_id` int(11) NOT NULL default '0',  `level` int(11) NOT NULL default '0',  `sibling_id` int(11) NOT NULL default '0',  PRIMARY KEY  (`id`),  KEY `lo_id` (`lo_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`lo_id`) REFERENCES `learning_object` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_level_1`
--
ALTER TABLE `c_level_1`
  ADD CONSTRAINT `c_level_1_ibfk_1` FOREIGN KEY (`catalog_c_1_id`) REFERENCES `catalog` (`catalog_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `c_level_2`
--
ALTER TABLE `c_level_2`
  ADD CONSTRAINT `c_level_2_ibfk_1` FOREIGN KEY (`c_1_id`) REFERENCES `c_level_1` (`c_1_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `c_level_3`
--
ALTER TABLE `c_level_3`
  ADD CONSTRAINT `c_level_3_ibfk_1` FOREIGN KEY (`c_2_id`) REFERENCES `c_level_2` (`c_2_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `c_level_4`
--
ALTER TABLE `c_level_4`
  ADD CONSTRAINT `c_level_4_ibfk_1` FOREIGN KEY (`c_3_id`) REFERENCES `c_level_3` (`c_3_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `c_level_5`
--
ALTER TABLE `c_level_5`
  ADD CONSTRAINT `c_level_5_ibfk_1` FOREIGN KEY (`c_4_id`) REFERENCES `c_level_4` (`c_4_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `format`
--
ALTER TABLE `format`
  ADD CONSTRAINT `format_ibfk_1` FOREIGN KEY (`format_type_id`) REFERENCES `format_type` (`format_type_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `learning_object`
--
ALTER TABLE `learning_object`
  ADD CONSTRAINT `learning_object_ibfk_10` FOREIGN KEY (`interactivity_id`) REFERENCES `interactivity_type` (`interactivity_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_object_ibfk_11` FOREIGN KEY (`localization_id`) REFERENCES `localization` (`localization_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_object_ibfk_13` FOREIGN KEY (`c_2_id`) REFERENCES `c_level_2` (`c_2_id`) ON DELETE SET NULL ON UPDATE CASCADE,  ADD CONSTRAINT `learning_object_ibfk_14` FOREIGN KEY (`c_1_id`) REFERENCES `c_level_1` (`c_1_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_object_ibfk_15` FOREIGN KEY (`c_3_id`) REFERENCES `c_level_3` (`c_3_id`) ON DELETE SET NULL ON UPDATE CASCADE,  ADD CONSTRAINT `learning_object_ibfk_16` FOREIGN KEY (`c_4_id`) REFERENCES `c_level_4` (`c_4_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_object_ibfk_17` FOREIGN KEY (`c_5_id`) REFERENCES `c_level_5` (`c_5_id`) ON DELETE SET NULL ON UPDATE CASCADE,  ADD CONSTRAINT `learning_object_ibfk_18` FOREIGN KEY (`format_id`) REFERENCES `format` (`format_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_object_ibfk_19` FOREIGN KEY (`uploader_id`) REFERENCES `user_login` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,  ADD CONSTRAINT `learning_object_ibfk_6` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`catalog_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_object_ibfk_8` FOREIGN KEY (`lang_id`) REFERENCES `language` (`lang_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `learning_object_keyword`
--
ALTER TABLE `learning_object_keyword`
  ADD CONSTRAINT `learning_object_keyword_ibfk_1` FOREIGN KEY (`keyword_id`) REFERENCES `keyword` (`keyword_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_object_keyword_ibfk_2` FOREIGN KEY (`lo_id`) REFERENCES `learning_object` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_type` (`type_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `user_right`
--
ALTER TABLE `user_right`
  ADD CONSTRAINT `user_right_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `user_action` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,  ADD CONSTRAINT `user_right_ibfk_2` FOREIGN KEY (`usertype_id`) REFERENCES `user_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_templates`
--
ALTER TABLE `user_templates`  ADD CONSTRAINT `user_templates_ibfk_1` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`catalog_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_templates_ibfk_3` FOREIGN KEY (`lang_id`) REFERENCES `language` (`lang_id`) ON DELETE SET NULL ON UPDATE CASCADE,  ADD CONSTRAINT `user_templates_ibfk_4` FOREIGN KEY (`interactivity_id`) REFERENCES `interactivity_type` (`interactivity_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_templates_ibfk_5` FOREIGN KEY (`user`) REFERENCES `user_login` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `version`
--
ALTER TABLE `version`
  ADD CONSTRAINT `version_ibfk_1` FOREIGN KEY (`lo_id`) REFERENCES `learning_object` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
