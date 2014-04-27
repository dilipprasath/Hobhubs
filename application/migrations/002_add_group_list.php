<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Migrations for populating 'users' table.
 *
 * @package    FCstuff
 * @category   Database
 * @author     Abhijit Parida
 * @license    The MIT License (MIT)
 * @copyright  Copyright (c) 2013, FCstuff
 */
class Migration_Add_group_list extends CI_Migration {

    /**
     * Populate 'users' table.
     *
     * @access  public
     */
    public function up()
    {
       $this->dbforge->add_field(array(
			"group_id  int(11) NOT NULL AUTO_INCREMENT",
			"groupname  varchar(68) COLLATE utf8_unicode_ci NOT NULL",
			"ctime  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP" 
						
        ));

        $this->dbforge->add_key('group_id', TRUE);
		$this->dbforge->create_table('groups');
		$query = $this->db->query("INSERT INTO `groups` (`group_id`, `groupname`, `ctime`) VALUES
(1, 'group1', '2013-09-25 08:37:01'),
(2, 'group2', '2013-09-25 08:37:01'),
(3, 'group3', '2013-09-25 08:37:01'),
(4, 'group4', '2013-09-26 03:34:17'),
(5, 'group5', '2013-09-26 03:34:17'),
(6, 'group6', '2013-09-26 03:34:50'),
(7, 'group7', '2013-09-26 03:34:50'),
(8, 'group8', '2013-09-26 03:35:06'),
(9, 'group9', '2013-09-26 03:35:06'),
(10, 'group10', '2013-09-26 03:35:12')");
		 
		 $this->dbforge->add_field(array(
		 "list_id int(11) NOT NULL AUTO_INCREMENT",
		  "user_id int(11) NOT NULL",
		  "group_id int(11) NOT NULL",
		  "ctime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP" 
						
        ));

        $this->dbforge->add_key('list_id', TRUE);
		$this->dbforge->create_table('group_list');

    }
	/* $nquery = $this->db->query("ALTER TABLE  `group_list` ADD UNIQUE (
`user_id` ,
`group_id`
)");
*/

    /**
     * Rollback changes.
     *
     * @access  public
     */
    public function down()
    {
        $this->dbforge->drop_table('groups');
		 $this->dbforge->drop_table('group_list');
    }
}

/* End of file 009_populate_users.php */
/* File location : ./application/migrations/009_populate_users.php */