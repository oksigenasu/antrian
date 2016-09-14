<?php
	session_start();
	include"koneksi.php";
	include"print.php";
	error_reporting(0);
	date_default_timezone_set("Asia/Jakarta");
	$ip=$_SERVER['REMOTE_ADDR'];
	$serikini=mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
	$kini=date("y-m-d H:s:i");
		
	//tambahkan nmr antrian ke tabel database
	$arduino=$_POST['arduino'];
	$nmrantrian=0;
	$q2=mysql_query("select nomor from alamat order by id_alamat desc");
	$d2=mysql_fetch_array($q2);
	$nolama=$d2['nomor'];
	$nobaru=$nolama+1;
	mysql_query("insert into alamat(ip_alamat,jam_ambilnomer,nomor)values('$ip','$kini','$nobaru')");
	echo $nobaru;
	
	//tambahkan jumlah nmr yg blm dipanggil
	$q3=mysql_query("select * from nokini order by no_kini desc");
	$d3=mysql_fetch_array($q3);
	$nokini=$d3['no_kini'];
	$antri=$nobaru-$nokini;
	
	// print ada di print.php
	cetak($nobaru,$antri);
	
	//selesai
	
		
?>
