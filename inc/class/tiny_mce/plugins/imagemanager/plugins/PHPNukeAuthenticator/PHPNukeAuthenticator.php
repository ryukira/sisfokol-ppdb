<?php

///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFOKOL-PPDB                                           ///////
///////////////////////////////////////////////////////////////////////
/////// Dibuat oleh :                                           ///////
/////// Agus Muhajir, S.Kom                                     ///////
/////// URL 	:                                               ///////
///////     * http://sisfokol.wordpress.com/                    ///////
///////     * http://cftteam.wordpress.com/                  ///////
///////     * http://yahoogroup.com/groups/sisfokol/            ///////
///////     * http://yahoogroup.com/groups/linuxbiasawae/       ///////
/////// E-Mail	:                                               ///////
///////     * cftteam@yahoo.com                              ///////
///////     * cftteam@gmail.com                              ///////
/////// HP/SMS	: 081-829-88-54                                 ///////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////








/**
 * PHPNukeAuthenticatorImpl.php
 *
 * @package MCFileManager.authenicators
 * @author Moxiecode
 * @copyright Copyright � 2005, Moxiecode Systems AB, All rights reserved.
 */

// Include PHPNuke logic
@session_destroy();
$mcOldCWD = getcwd();
chdir($basepath . "../../../../../");
require_once("mainfile.php");
chdir($mcOldCWD);

/**
 * This class is a Drupal CMS authenticator implementation.
 *
 * @package MCImageManager.Authenticators
 */
class Moxiecode_PHPNukeAuthenticator extends Moxiecode_ManagerPlugin {
    /**#@+
	 * @access public
	 */

	/**
	 * Main constructor.
	 */
	function Moxiecode_PHPNukeAuthenticator() {
	}

	function onAuthenticate(&$man) {
		global $user;

		return is_user($user) == 1;
	}

	/**#@-*/
}

// Add plugin to MCManager
$man->registerPlugin("PHPNukeAuthenticator", new Moxiecode_PHPNukeAuthenticator());

?>