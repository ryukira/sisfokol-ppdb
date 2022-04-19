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


session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/class/paging.php");
require("../../inc/cek/psb_admbdh.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "reg.php";
$judul = "Data Pendaftar";
$judulku = "[$bdh_session : $username2_session] ==> $judul";
$judulx = $judul;
$katcari = nosql($_REQUEST['katcari']);
$kunci = cegah2($_REQUEST['kunci']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}


//ketahui tapel aktif
$qtp = mysql_query("SELECT * FROM psb_m_tapel ".
			"WHERE status = 'true'");
$rtp = mysql_fetch_assoc($qtp);
$tp_tapelkd = nosql($rtp['kd']);
$tp_tahun1 = nosql($rtp['tahun1']);
$tp_tahun2 = nosql($rtp['tahun2']);


$target = "$filenya";




//isi *START
ob_start();



//kondisi pencarian
if ($_POST['btnCRI'])
	{
	//cek
	if ((empty($katcari)) OR (empty($kunci)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//no daftar
		if ($katcari == "cr01")
			{
			//query
			$p = new Pager();
			$start = $p->findStart($limit);

			$sqlcount = "SELECT DISTINCT (psb_siswa_calon.kd) AS sckd ".
						"FROM psb_siswa_calon, psb_siswa_calon_un ".
						"WHERE  psb_siswa_calon.kd_tapel = '$tp_tapelkd' ".
						"AND psb_siswa_calon.nama <> '' ".
						"AND psb_siswa_calon.asal_sekolah <> '' ".
						"AND psb_siswa_calon_un.kd_siswa_calon = psb_siswa_calon.kd ".
						"AND psb_siswa_calon_un.total <> '' ".
						"AND psb_siswa_calon.no_daftar LIKE '%$kunci%' ".
						"ORDER BY psb_siswa_calon.postdate DESC, ".
						"psb_siswa_calon.no_daftar ASC";
			$sqlresult = $sqlcount;


			$count = mysql_num_rows(mysql_query($sqlcount));
			$pages = $p->findPages($count, $limit);
			$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
			$pagelist = $p->pageList($_GET['page'], $pages, $target);
			$data = mysql_fetch_array($result);
			}

		//nama
		else if ($katcari == "cr02")
			{
			//query
			$p = new Pager();
			$start = $p->findStart($limit);


			$sqlcount = "SELECT DISTINCT (psb_siswa_calon.kd) AS sckd ".
						"FROM psb_siswa_calon, psb_siswa_calon_un ".
						"WHERE  psb_siswa_calon.kd_tapel = '$tp_tapelkd' ".
						"AND psb_siswa_calon.nama <> '' ".
						"AND psb_siswa_calon.asal_sekolah <> '' ".
						"AND psb_siswa_calon_un.kd_siswa_calon = psb_siswa_calon.kd ".
						"AND psb_siswa_calon_un.total <> '' ".
						"AND psb_siswa_calon.nama LIKE '%$kunci%' ".
						"ORDER BY psb_siswa_calon.postdate DESC, ".
						"psb_siswa_calon.no_daftar ASC";
			$sqlresult = $sqlcount;


			$count = mysql_num_rows(mysql_query($sqlcount));
			$pages = $p->findPages($count, $limit);
			$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
			$pagelist = $p->pageList($_GET['page'], $pages, $target);
			$data = mysql_fetch_array($result);
			}

		//asal sekolah
		else if ($katcari == "cr03")
			{
			//query
			$p = new Pager();
			$start = $p->findStart($limit);


			$sqlcount = "SELECT DISTINCT (psb_siswa_calon.kd) AS sckd ".
						"FROM psb_siswa_calon, psb_siswa_calon_un ".
						"WHERE  psb_siswa_calon.kd_tapel = '$tp_tapelkd' ".
						"AND psb_siswa_calon.nama <> '' ".
						"AND psb_siswa_calon.asal_sekolah <> '' ".
						"AND psb_siswa_calon_un.kd_siswa_calon = psb_siswa_calon.kd ".
						"AND psb_siswa_calon_un.total <> '' ".
						"AND psb_siswa_calon.asal_sekolah LIKE '%$kunci%' ".
						"ORDER BY psb_siswa_calon.postdate DESC, ".
						"psb_siswa_calon.no_daftar ASC";
			$sqlresult = $sqlcount;


			$count = mysql_num_rows(mysql_query($sqlcount));
			$pages = $p->findPages($count, $limit);
			$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
			$pagelist = $p->pageList($_GET['page'], $pages, $target);
			$data = mysql_fetch_array($result);
			}
		}
	}
else
	{
	//query
	$p = new Pager();
	$start = $p->findStart($limit);



	$sqlcount = "SELECT DISTINCT (psb_siswa_calon.kd) AS sckd ".
				"FROM psb_siswa_calon, psb_siswa_calon_un ".
				"WHERE  psb_siswa_calon.kd_tapel = '$tp_tapelkd' ".
				"AND psb_siswa_calon.nama <> '' ".
				"AND psb_siswa_calon.asal_sekolah <> '' ".
				"AND psb_siswa_calon_un.kd_siswa_calon = psb_siswa_calon.kd ".
				"AND psb_siswa_calon_un.total <> '' ".
				"ORDER BY right(psb_siswa_calon.no_daftar,3) DESC";
	$sqlresult = $sqlcount;


	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);
	}



//jika reset
if ($_POST['btnRST'])
	{
	//query
	$p = new Pager();
	$start = $p->findStart($limit);


	$sqlcount = "SELECT DISTINCT (psb_siswa_calon.kd) AS sckd ".
					"FROM psb_siswa_calon, psb_siswa_calon_un ".
					"WHERE  psb_siswa_calon.kd_tapel = '$tp_tapelkd' ".
					"AND psb_siswa_calon.nama <> '' ".
					"AND psb_siswa_calon.asal_sekolah <> '' ".
					"AND psb_siswa_calon_un.kd_siswa_calon = psb_siswa_calon.kd ".
					"AND psb_siswa_calon_un.total <> '' ".
					"ORDER BY right(psb_siswa_calon.no_daftar,3) DESC";
	$sqlresult = $sqlcount;





	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);
	}
/*
else
	{
	$sqlcount = "SELECT psb_siswa_calon.*, psb_siswa_calon.kd AS sckd, ".
			"psb_siswa_calon.nama AS scnama ".
			"FROM psb_siswa_calon ".
			"WHERE psb_siswa_calon.kd_tapel = '$tp_tapelkd' ".
			"ORDER BY psb_siswa_calon.postdate DESC";
	$sqlresult = $sqlcount;
	}

*/


//js
require("../../inc/js/swap.js");
require("../../inc/js/jumpmenu.js");
require("../../inc/menu/psb_admbdh.php");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<p>
<select name="katcari">
<option value="" selected></option>
<option value="cr01">No.pendaftaran</option>
<option value="cr02">Nama</option>
<option value="cr03">Sekolah Asal</option>
</select>
<input name="kunci" type="text" value="" size="20">
<input name="btnCRI" type="submit" value="CARI">
<input name="btnRST" type="submit" value="RESET">
</p>

<p>
Tahun Pelajaran : <strong>'.$tp_tahun1.'/'.$tp_tahun2.'</strong>.

<table width="100%" border="1" cellspacing="0" cellpadding="3">
<tr align="center" bgcolor="'.$warnaheader.'">
<td width="1">&nbsp;</td>
<td width="50"><strong><font color="'.$warnatext.'">Waktu Pendaftaran</font></strong></td>
<td width="100"><strong><font color="'.$warnatext.'">No.Daftar</font></strong></td>
<td><strong><font color="'.$warnatext.'">Nama</font></strong></td>
<td width="150"><strong><font color="'.$warnatext.'">Tempat, Tanggal Lahir</font></strong></td>
<td width="150"><strong><font color="'.$warnatext.'">Alamat</font></strong></td>
<td width="150"><strong><font color="'.$warnatext.'">Sekolah Asal</font></strong></td>
<td width="10"><strong><font color="'.$warnatext.'">Tanda Bukti</font></strong></td>
</tr>';

if ($count != 0)
	{
	do
		{
		if ($warna_set ==0)
			{
			$warna = $warna01;
			$warna_set = 1;
			}
		else
			{
			$warna = $warna02;
			$warna_set = 0;
			}

		$nomer = $nomer + 1;
		$kd = nosql($data['sckd']);


		//detail e
		$qdt = mysql_query("SELECT DATE_FORMAT(tgl_lahir, '%d') AS ltgl, ".
					"DATE_FORMAT(tgl_lahir, '%m') AS lbln, ".
					"DATE_FORMAT(tgl_lahir, '%Y') AS lthn, ".
					"psb_siswa_calon.* ".
					"FROM psb_siswa_calon ".
					"WHERE kd = '$kd'");
		$rdt = mysql_fetch_assoc($qdt);



		$d_noreg = nosql($rdt['no_daftar']);
		$d_username = nosql($rdt['usernamex']);
		$d_nama = balikin($rdt['nama']);
		$d_asal_sekolah = balikin($rdt['asal_sekolah']);
		$d_alamat = balikin($rdt['alamat']);
		$d_tmp_lahir = balikin($rdt['tmp_lahir']);;
		$d_tgl_daftar = $rdt['tgl_daftar'];
		$d_tgl_lahir = $rdt['tgl_lahir'];






		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>
		<a href="reg_view.php?swkd='.$kd.'&page='.$page.'" title="Data Diri...">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
		</a>
		</td>
		<td>'.$d_tgl_daftar.'</td>
		<td>'.$d_noreg.'</td>
		<td>'.$d_nama.'</td>
		<td>'.$d_tmp_lahir.', '.$d_tgl_lahir.'</td>
		<td>'.$d_alamat.'</td>
		<td>'.$d_asal_sekolah.'</td>
		<td>
		<a target="_blank" href="reg_pdf.php?swkd='.$kd.'&noregx='.$d_noreg.'&page='.$page.'" title="Data Diri...">
		<img src="'.$sumber.'/img/pdf.gif" width="16" height="16" border="0">
		</a>
		</td>
		</tr>';
		}
	while ($data = mysql_fetch_assoc($result));
	}


echo '</table>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td align="right">'.$pagelist.' <strong><font color="#FF0000">'.$count.'</font></strong> Data.</td>
</tr>
</table>
</p>';


echo '</form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");



//diskonek
xclose($koneksi);
exit();
?>
