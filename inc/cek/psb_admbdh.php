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


///cek session //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$kd2_session = nosql($_SESSION['kd2_session']);
$nama2_session = balikin($_SESSION['nama2_session']);
$nip2_session = nosql($_SESSION['nip2_session']);
$username2_session = nosql($_SESSION['username2_session']);
$bdh_session = nosql($_SESSION['bdh_session']);

$qbw = mysql_query("SELECT * FROM psb_m_login ".
					"WHERE level = '2' ".
					"AND kd = '$kd2_session' ".
					"AND usernamex = '$username2_session'");
$rbw = mysql_fetch_assoc($qbw);
$tbw = mysql_num_rows($qbw);

if (($tbw == 0) OR (empty($kd2_session))
	OR (empty($username2_session))
	OR (empty($bdh_session)))
	{
	//re-direct
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan,$sumber);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>