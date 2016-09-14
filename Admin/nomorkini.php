<?php
include "koneksi.php";
$q4=mysql_query("select * from nokini order by no_kini desc");
//$d4=mysql_fetch_array($q4);


$q7=mysql_query("select * from alamat order by nomor desc");
$d7=mysql_fetch_array($q7);

if(mysql_num_rows($q7)<=0)
{
	//tidak ada yang antri
	echo "<h1>Tidak ada Nomor Antrian</h1>";
	
}else{
	if (mysql_num_rows($q4) > 0){
		$d4=mysql_fetch_array($q4);
		$nokini = $d4[no_kini];
	
		if ($nokini == $d7[nomor])
		{
		//tidak ada yang antri
			echo "<h1>Tidak ada Antrian</h1>";
		}
		else
		{	
			echo "<h1>Nomor Antrian $d4[no_kini] di loket $d4[loket]</h1>";
		}
	}
}

?>		