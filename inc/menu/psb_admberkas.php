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


//nilai
$maine = "$sumber/admberkas/index.php";


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<table bgcolor="#E4D6CC" width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>';
//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//home //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<a href="'.$maine.'" title="Home" class="menuku"><strong>HOME</strong>&nbsp;&nbsp;</a> | ';
//home //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//setting ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<A href="#" class="menuku" data-flexmenu="flexmenu1"><strong>SETTING</strong>&nbsp;&nbsp;</A> |
<UL id="flexmenu1" class="flexdropdownmenu">
<LI>
<a href="'.$sumber.'/admberkas/s/pass.php" title="Ganti Password">Ganti Password</a>
</LI>
</UL>';
//setting ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






//calon /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<A href="#" class="menuku" data-flexmenu="flexmenu3"><strong>CALON</strong>&nbsp;&nbsp;</A> |
<UL id="flexmenu3" class="flexdropdownmenu">
<LI>
<a href="'.$sumber.'/admberkas/calon/nilai.php" title="Nilai">Nilai</a>
</LI>

</UL>';
//calon /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//logout ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<A href="'.$sumber.'/logout.php" class="menuku" title="Logout / KELUAR"><strong>LogOut</strong></A>
</td>
</tr>
</table>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>