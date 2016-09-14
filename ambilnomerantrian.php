<?php
	session_start();
		include"koneksi.php";
		error_reporting(0);
		date_default_timezone_set("Asia/Jakarta");
		$ip=$_SERVER['REMOTE_ADDR'];
		$serikini=mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
		$kini=date("y-m-d H:s:i");
		
		//ambil query dari alamat berdasarkan nmr IP
		$q=mysql_query("select*from alamat where ip_alamat='$ip'");
			
			//jika ada
			if(mysql_num_rows($q)>0)
			{
				$waktu="no";
				$d=mysql_fetch_array($q);
				$sesi=$d['jam_ambilnomer'];
				$sesi2=explode(" ",$sesi);
				$t=explode("-",$sesi2[0]);
				$t2=explode(":",$sesi2[1]);
				$seriantri = mktime($t2[0],$t2[1],$t2[2],$t[1],$t[2],$t[0]);
				$jam=1;//60*60 ;
				//$detik= 10;
				$selisih = $seriantri+$jam;
				
				if($selisih<=$serikini)
				{
					$waktu="yes";
					//echo ":: $seriantri -- $selisih - $serikini ::";
				}
	
				if($waktu=="yes")
				{
					$q2=mysql_query("select nomor from alamat order by nomor desc");
					$d2=mysql_fetch_array($q2);
					$nolama=$d2['nomor'];
					$nobaru=$nolama+1;
					
					mysql_query("update alamat set jam_ambilnomer='$kini',nomor='$nobaru' where ip_alamat='$ip'");	
				}
				else
				{
					$q2=mysql_query("select nomor from alamat where ip_alamat='$ip' order by nomor desc");
					$d2=mysql_fetch_array($q2);
					$nolama=$d2['nomor'];
					
					echo $nolama;
				}
			}
			else //jika tidak ada, ambil nmr antrian, dan echo nmr antrian kembali
			{
				$q2=mysql_query("select nomor from alamat order by id_alamat desc");
				$d2=mysql_fetch_array($q2);
				$nolama=$d2['nomor'];
				$nobaru=$nolama+1;
				mysql_query("insert into alamat(ip_alamat,jam_ambilnomer,nomor)values('$ip','$kini','$nobaru')");
				echo $nobaru;
			}
		
?>
