<?php
session_start();	
error_reporting(0);
include "koneksi.php";
		date_default_timezone_set("Asia/Jakarta");

		echo " ";

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
		echo $tanggal;
?>
<script src= "jquery-1.11.3.js"></script>
	<script>
		$(document).ready(function() {

			$("#ambilnomer").click(function() {
			// script untuk mendapatkan nmr antrian
			$.ajax({
		type : "POST",
		url : "ambilnomerantrian.php",
		data: "id= 6",
		success: function(html){
				$("#layernomer").html("<h1>nomor Antrian Anda : "+ String(html)+"</h1>")
				
				//update nmr antrian yg didapat ke template print
				var url = "templateprint.php?nmr="+html;
				$("#templateprint").attr("src",url);
			}})
			
		})
		
		//script untuk meminta nmr yg ada di teller saat ini
		window.setInterval(function () {
		$("#waktu").load("nomorkini.php");				
		}, 1000);
		
		})
			</script>


	<div id='layernomer1'><h1>BANK VOKASI</h1></div>
	<div id="waktu"></div>
	<div id='layernomer'></div>
	<input type=button value='Ambil Nomer' id='ambilnomer' name='ambilnomer'>
	
	<!-- iframe template untuk print yang dihidden -->
	<iframe id='templateprint' style='display:none'  name='frame1'></iframe>
    <head>
	<!-- <input type=button value='Cetak Antrian' id='ambilprint' name='ambilprint'> -->
     <a href="tamu.php"> 
    <button onClick="frames['frame1'].print()">Cetak Antrian</button> 
    </a>

    </body>
    </html>
