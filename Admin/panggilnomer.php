<?php
//session_start();
include "../koneksi.php";

$id=$_POST['id'];
//$nobaru = 0;

?>

<?php
//ambil daftar antrian
$q3=mysql_query("select * from alamat order by nomor desc");


$nomor = '';
$loket = 0; 
$panjang = 0;
$antrian= 0;
$adaantrian =0;

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
			//global $nobaru, $adaantrian; 
			
			global $nomor,$loket,$panjang,$antrian,$adaantrian;
			
			
			$nobaru=$nolama+1;
			$loket=$id;
			mysql_query("insert into nokini (no_kini,loket) values ('$nobaru','$loket')");
			echo "<h1>Nomor Antrian $nobaru di loket $loket</h1>";
			
			$nomor = (string)$nobaru;
			//$loket = $d4['loket'];
			$panjang=strlen($nomor);
			$antrian=$nomor;
			$adaantrian =1;
		}
	}
	else
	{
		//global $nobaru, $adaantrian; 
		global $nomor,$loket,$panjang,$antrian,$adaantrian;
		
		$nobaru=1;
		$loket=$id;
		mysql_query("insert into nokini (no_kini,loket) values ('$nobaru','$loket')");
		echo "<h1>Nomor Antrian $nobaru di loket $loket</h1>";	
		$nomor = (string)$nobaru;
			//$loket = $d4['loket'];
		$panjang=strlen($nomor);
		$antrian=$nomor;	
		$adaantrian =1;
	}	
}



?>

<audio id="suarabel" src="rekaman/Airport_Bell.mp3" ></audio>
<audio id="suarabelnomorurut" src="rekaman/nomor-urut.wav"  ></audio>
<audio id="suarabelsuarabelloket" src="rekaman/loket.wav"  ></audio>

<audio id="belas" src="rekaman/belas.wav"  ></audio>
<audio id="sebelas" src="rekaman/sebelas.wav"  ></audio>
<audio id="puluh" src="rekaman/puluh.wav"  ></audio>
<audio id="sepuluh" src="rekaman/sepuluh.wav"  ></audio>
<audio id="ratus" src="rekaman/ratus.wav"  ></audio>
<audio id="seratus" src="rekaman/seratus.wav"  ></audio>
<audio id="suarabelloket2" src="rekaman/<?php echo "$loket";?>.wav"  ></audio>
<?php	for($i=0;$i<$panjang;$i++){
    ?>
    <audio id="suarabel<?php echo $i; ?>" src="rekaman/<?php echo substr($antrian,$i,1); ?>.wav" ></audio>
<?php
}
?>
<script> alert("<?php echo "$antrian-$loket+$adaantrian";?>");</script>

<script type="text/javascript">
    function mulai(){
        //MAINKAN SUARA BEL PADA SAAT AWAL
        document.getElementById('suarabel').pause();
        document.getElementById('suarabel').currentTime=0;
        document.getElementById('suarabel').play();

        //SET DELAY UNTUK MEMAINKAN REKAMAN NOMOR URUT
		
        //totalwaktu=document.getElementById('suarabel').duration*1000;
		totalwaktu=8*1000;

        //MAINKAN SUARA NOMOR URUT
        setTimeout(function() {
            document.getElementById('suarabelnomorurut').pause();
            document.getElementById('suarabelnomorurut').currentTime=0;
            document.getElementById('suarabelnomorurut').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+2000;

        <?php
            //JIKA KURANG DARI 10 MAKA MAIKAN SUARA ANGKA1
            if($antrian < 10){
        ?>

        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);

        totalwaktu=totalwaktu+1000;
        <?php
            }elseif($antrian ==10){
                //JIKA 10 MAKA MAIKAN SUARA SEPULUH
        ?>
        setTimeout(function() {
            document.getElementById('sepuluh').pause();
            document.getElementById('sepuluh').currentTime=0;
            document.getElementById('sepuluh').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
            }elseif($antrian ==11){
                //JIKA 11 MAKA MAIKAN SUARA SEBELAS
        ?>
        setTimeout(function() {
            document.getElementById('sebelas').pause();
            document.getElementById('sebelas').currentTime=0;
            document.getElementById('sebelas').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
            }elseif($antrian < 20){
                //JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
        ?>
        setTimeout(function() {
            document.getElementById('suarabel1').pause();
            document.getElementById('suarabel1').currentTime=0;
            document.getElementById('suarabel1').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('belas').pause();
            document.getElementById('belas').currentTime=0;
            document.getElementById('belas').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
                    }elseif($antrian < 100){
                        //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
                ?>
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('puluh').pause();
            document.getElementById('puluh').currentTime=0;
            document.getElementById('puluh').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel1').pause();
            document.getElementById('suarabel1').currentTime=0;
            document.getElementById('suarabel1').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
}elseif($antrian ==100){
    //JIKA 100 MAKA MAIKAN SUARA SEratus
?>
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
            }elseif($antrian < 110){
                //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
        ?>

        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel2').pause();
            document.getElementById('suarabel2').currentTime=0;
            document.getElementById('suarabel2').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
    }elseif($antrian == 110){
        //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
?>
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('sepuluh').pause();
            document.getElementById('sepuluh').currentTime=0;
            document.getElementById('sepuluh').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
        //JIKA KURANG DARI 10 MAKA MAIKAN SUARA ANGKA1
        }elseif($antrian == 111){
    ?>

        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('sebelas').pause();
            document.getElementById('sebelas').currentTime=0;
            document.getElementById('sebelas').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
    }elseif($antrian < 120){
        //JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
?>
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel2').pause();
            document.getElementById('suarabel2').currentTime=0;
            document.getElementById('suarabel2').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('belas').pause();
            document.getElementById('belas').currentTime=0;
            document.getElementById('belas').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
                    }elseif($antrian < 200){
                        //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
                ?>
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel1').pause();
            document.getElementById('suarabel1').currentTime=0;
            document.getElementById('suarabel1').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('puluh').pause();
            document.getElementById('puluh').currentTime=0;
            document.getElementById('puluh').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel2').pause();
            document.getElementById('suarabel2').currentTime=0;
            document.getElementById('suarabel2').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
               }elseif($antrian ==200){
                   //JIKA 100 MAKA MAIKAN SUARA SEratus
           ?>
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('ratus').pause();
            document.getElementById('ratus').currentTime=0;
            document.getElementById('ratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
                    }elseif($antrian < 210){
                        //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
                ?>
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('ratus').pause();
            document.getElementById('ratus').currentTime=0;
            document.getElementById('ratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel2').pause();
            document.getElementById('suarabel2').currentTime=0;
            document.getElementById('suarabel2').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
    }elseif($antrian == 210){
        //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
?>
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('ratus').pause();
            document.getElementById('ratus').currentTime=0;
            document.getElementById('ratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('sepuluh').pause();
            document.getElementById('sepuluh').currentTime=0;
            document.getElementById('sepuluh').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
        //JIKA KURANG DARI 10 MAKA MAIKAN SUARA ANGKA1
        }elseif($antrian == 211){
    ?>
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('ratus').pause();
            document.getElementById('ratus').currentTime=0;
            document.getElementById('ratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('sebelas').pause();
            document.getElementById('sebelas').currentTime=0;
            document.getElementById('sebelas').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
    }elseif($antrian < 220){
        //JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
?>
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('ratus').pause();
            document.getElementById('ratus').currentTime=0;
            document.getElementById('ratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel2').pause();
            document.getElementById('suarabel2').currentTime=0;
            document.getElementById('suarabel2').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('belas').pause();
            document.getElementById('belas').currentTime=0;
            document.getElementById('belas').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        <?php
                    }elseif($antrian < 1000){
                        //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
                ?>
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('ratus').pause();
            document.getElementById('ratus').currentTime=0;
            document.getElementById('ratus').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel1').pause();
            document.getElementById('suarabel1').currentTime=0;
            document.getElementById('suarabel1').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('puluh').pause();
            document.getElementById('puluh').currentTime=0;
            document.getElementById('puluh').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel2').pause();
            document.getElementById('suarabel2').currentTime=0;
            document.getElementById('suarabel2').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;

        <?php
            }else{
                //JIKA LEBIH DARI 100
                //Karena aplikasi ini masih sederhana maka logina konversi hanya sampai 100
                //Selebihnya akan langsung disebutkan angkanya saja
                //tanpa kata "RATUS", "PULUH", maupun "BELAS"
        ?>

        <?php
            for($i=0;$i<$panjang;$i++){
        ?>

        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel<?php echo $i; ?>').pause();
            document.getElementById('suarabel<?php echo $i; ?>').currentTime=0;
            document.getElementById('suarabel<?php echo $i; ?>').play();
        }, totalwaktu);
        <?php
            }
            }
        ?>


        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelsuarabelloket').pause();
            document.getElementById('suarabelsuarabelloket').currentTime=0;
            document.getElementById('suarabelsuarabelloket').play();
        }, totalwaktu);

        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket2').pause();
            document.getElementById('suarabelloket2').currentTime=0;
            document.getElementById('suarabelloket2').play();
        }, totalwaktu);
		
		//alert("<?php (string)$nomor ?>")
    }
</script>


<?php
if ($adaantrian > 0){
?>
<script type="text/javascript"> mulai() </script>
<?php
}
return;
?>