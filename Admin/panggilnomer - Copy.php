<?php
//session_start();
include "../koneksi.php";

$id=$_POST['id'];
$nobaru = 0;

?>

<?php
//ambil daftar antrian
$q3=mysql_query("select * from alamat order by nomor desc");

//jika tidak ada antrian
if(mysql_num_rows($q3)<=0)
{
	//tidak ada yang antri
	echo "<h1>Tidak ada Nomor Antrian</h1>";
}
else	//jika ada antrian
{	
	$d3=mysql_fetch_array($q3);
	$nobatas=$d3['nomor'];
	
	//ambil nmr antrian di tabel nokini
	$q2=mysql_query("select * from nokini order by no_kini desc");
	
	// jika ada antrian
	if(mysql_num_rows($q2)>0)
	{
		$d2=mysql_fetch_array($q2);
		$nolama=$d2['no_kini'];
		if($nolama>=$nobatas)
		{
			$nokini=$nobatas;
			echo "<h1>Nomor Antrian Selesai</h1>";
			//$adaantrian = 0;
		}
		else
		{	
			global $nobaru, $adaantrian; 
			$nobaru=$nolama+1;
			$loket=$id;
			mysql_query("insert into nokini (no_kini,loket) values ('$nobaru','$loket')");
			echo "<h1>Nomor Antrian $nobaru di loket $loket</h1>";
			
		}
	}
	else
	{
		global $nobaru, $adaantrian; 
		$nobaru=1;
		$loket=$id;
		mysql_query("insert into nokini (no_kini,loket) values ('$nobaru','$loket')");
		echo "<h1>Nomor Antrian $nobaru di loket $loket</h1>";
		 
	}	
}


?>
