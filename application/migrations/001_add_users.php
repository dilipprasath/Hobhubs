<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Migrations for 'users' table.
 *
 * @package    FCstuff
 * @category   Database
 * @author     Abhijit Parida
 * @license    The MIT License (MIT)
 * @copyright  Copyright (c) 2013, FCstuff
 */
class Migration_Add_users extends CI_Migration {

    /**
     * Create 'users' table.
     *
     * @access  public
     */
    public function up()
    {
        $this->dbforge->add_field(array(
			"user_id int(11) NOT NULL AUTO_INCREMENT",
			"fb_id int(11) DEFAULT NULL",
			"firstname varchar(30) COLLATE utf8_unicode_ci NOT NULL",
			"lastname varchar(30) COLLATE utf8_unicode_ci NOT NULL",
			"email varchar(60) COLLATE utf8_unicode_ci NOT NULL",
			"password varchar(60) COLLATE utf8_unicode_ci NOT NULL",
			"gender varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL",
			"birth date DEFAULT NULL",
			"salt varchar(60) COLLATE utf8_unicode_ci NOT NULL",
			"user_img  varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL",
			"ctime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP"
			
        ));

        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->add_key('email');
        $this->dbforge->create_table('user');
		
		
		$query = $this->db->query("INSERT INTO `user` (`user_id`, `fb_id`, `firstname`, `lastname`, `email`, `password`, `gender`, `birth`, `salt`, `ctime`) VALUES
(1, 2147483647, 'Satheesh', 'Kumar', 'satheeshpdh@gmail.com', '', NULL, NULL, 'f0c22e5e3e7101a325d03dc127d10894', '2013-09-18 12:58:33'),
(2, 2147483647, 'Jackson', 'Vimal', 'vimalring@gmail.com', '69a212933971d4633e2cce10bc654011', NULL, NULL, 'b98e7ddfb0f77acb149782b08ec20a68', '2013-09-18 13:53:01'),
(3, 2147483647, 'Santhosh', 'Kumar', 'santhosh.hicas@gmail.com', '', NULL, NULL, '9dc87a5cc6d7ec78c277ffee44411770', '2013-09-18 14:04:11'),
(10, 641955137, 'Vijayaraj', 'Muthukrishnan', 'vijayarajceg@gmail.com', '', NULL, NULL, '46e857fcbb707340438029ba7755e91b', '2013-09-25 17:32:40'),
(5, 1835495970, 'Tom', 'Jerry', 'dhool_vinu@yahoo.co.in', '56d539e76199ccf5731d9afa09a9e613', NULL, NULL, 'd9a7d0693f0a53eb9cdd3bf5cf9fb382', '2013-09-20 12:39:43'),
(6, 581341524, 'Sudharsanam', 'R Naidu', 'vinu.mba10@gmail.com', '835f98e73722d8b9670c001fba06e378', NULL, NULL, '9cf380e09bd312c0eefb114fd6742377', '2013-09-22 01:53:14'),
(7, 2147483647, 'Satheesh', 'Kumar', 'dreamstudio.co.in@gmail.com', '', NULL, NULL, 'cd148f92bb8b3b6961551743b0add7e9', '2013-09-22 05:07:46'),
(9, 2147483647, 'Satheesh', 'Kumar', 'satheesh@dreamstudio.in', '281554569f87af55307d8978d8a2ef63', NULL, NULL, '08dccbfdd5c1f8dbae9e414504d5b421', '2013-09-25 08:28:08') ");

	$this->dbforge->add_field(array(
			" id int(11) NOT NULL AUTO_INCREMENT",
			"firstname varchar(30) COLLATE utf8_unicode_ci NOT NULL",
			"lastname varchar(30) COLLATE utf8_unicode_ci NOT NULL",
			"email varchar(60) COLLATE utf8_unicode_ci NOT NULL",
			"password varchar(60) COLLATE utf8_unicode_ci NOT NULL",
			"gender varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL",
			"birth date DEFAULT NULL",
			"salt varchar(60) COLLATE utf8_unicode_ci NOT NULL",
			"ctime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP"
			
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('email');
		$this->dbforge->create_table('tempuser');
	
    }

    // --------------------------------------------------------------------

    /**
     * Drop 'users' table.
     *
     * @access  public
     */
    public function down()
    {
        $this->dbforge->drop_table('user');
		$this->dbforge->drop_table('tempuser'); 
    }
}

/* End of file 001_add_users.php */
/* File location : ./application/migrations/001_add_users.php */