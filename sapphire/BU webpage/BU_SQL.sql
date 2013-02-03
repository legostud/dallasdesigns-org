CREATE TABLE IF NOT EXISTS `BU_exercise` (
  `name` varchar(255) collate latin1_general_ci NOT NULL default '' COMMENT 'Name of person submitting the form',
  `email` varchar(255) collate latin1_general_ci NOT NULL default '' COMMENT 'E-mail address of person submitting form',
  `phone` varchar(14) collate latin1_general_ci default NULL COMMENT 'Phone number of person submitting form',
  `url` varchar(255) collate latin1_general_ci NOT NULL default '' COMMENT 'URL of site being launched/re-launched',
  `description` varchar(255) collate latin1_general_ci default NULL COMMENT 'description of site',
  `task` varchar(12) collate latin1_general_ci NOT NULL default '' COMMENT 'launch or re-launch',
  `launched` date default '0000-00-00' COMMENT 'Date site was launched',
  `task_date` date NOT NULL default '0000-00-00' COMMENT 'Date task was completed',
  `notes` varchar(255) collate latin1_general_ci default NULL COMMENT 'Notes',
  `changes` varchar(255) collate latin1_general_ci default NULL COMMENT 'Changes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='BU exercise to get job with them';