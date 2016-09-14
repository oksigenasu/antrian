<!DOCTYPE HTML>
<html>
<?php
$nmrantrian = $_GET['nmr'];

	date_default_timezone_set("Asia/Jakarta");

		// echo " <div id='layernomer1'><h1>BANK VOKASI</h1></div>";

		/* script menentukan hari */  
		$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$hr = $array_hr[date('N')];

		/* script menentukan tanggal */    
		$tgl= date('j');

		/* script menentukan bulan */ 
		$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$bln = $array_bln[date('n')];
		/* script menentukan tahun */ 
		$thn = date('Y');
		/* script perintah keluaran*/ 
		$tanggal=$hr . ", " . $tgl . " " . $bln . " " . $thn . " " . date('H:i');
?>



<span style='text-align:center;border-style:double; padding:10px;display: inline-block;' >
	<div style='font-size:30px;'> BANK VOKASI </div>
	<div> Nomor Antrian Anda: </div>
<?php
	echo"<div id='nomor' style='font-size:100px;'>".$nmrantrian." </div>";
	echo"<div id='tgl'>".$tanggal."</div>";
?>
	
</span>
</html>