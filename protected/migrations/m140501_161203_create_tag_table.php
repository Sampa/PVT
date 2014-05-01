<?php

class m140501_161203_create_tag_table extends CDbMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `frequency` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `frequency`) VALUES
(16, 'pvt', 1),
(15, 'Burn', 1),
(14, 'html', 1),
(13, 'sökerjobb', 1),
(12, 'java', 1),
(11, 'utvecklare', 1),
(10, 'grym', 2),
(17, 'canada', 1);");
	}

	public function down()
	{
		$this->dropTable(`tag`);
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}