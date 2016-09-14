
<!DOCTYPE HTML>
<html>
<?php
//session_start();	
//error_reporting(0);
?>
<style>
  header{border-style:double; margin-top:20px; padding:20px; text-align:center; font-family:Arial,Helvetica,sans-serif; font-size:25px;}
  .tampilan{border-style:double; margin-top:20px; padding:10px; text-align:center; font-family:Arial,Helvetica,sans-serif; font-size:30px;}
  .tombol{border-style:double; margin-top:20px; padding:10px; text-align:center; font-family:Arial,Helvetica,sans-serif; font-size:30px;}
  h1{text-align:center; margin-top:30px; font-family:Arial,Helvetica,sans-serif;}
</style>

<script src="jquery-1.11.3.js"></script>
<script>
	$(document).ready(function(){
		$("#Panggil2").click(function(){
			$.ajax({
				type:"POST",
				url:"panggilnomer.php",
				data:"id=2",
				success:function(html){
					$("#layerl2").html("Loket 2 : "+html)
				}})
			// $.ajax({
				// type:"POST",
				// url:"respon_administrasi.php",
				// data:"id=2",
				// success:function(html){
					// $("#layersuara").html("")
					// $("#layersuara").html(html)
				// }})
		})

		$("#Panggil1").click(function(){
			$.ajax({
				type:"POST",
				url:"panggilnomer.php",
				data:"id=1",
				success:function(html){
					$("#layerl1").html("Loket 1 : "+html)
				}})
			// $.ajax({
				// type:"POST",
				// url:"respon_administrasi.php",
				// data:"id=1",
				// success:function(html){
					// $("#layersuara").html("")
					// $("#layersuara").html(html)
				// }})
		})
		
		

})
	</script>
	
<div id='layernomer'><H1> BANK VOKASI</H1></div>
<div class="tampilan">	

<div id='layersuara' style='display:none'></div>
<div  id='layerl1'>Loket 1 </div>
<div id='layerl2'>Loket 2 </div>




</div>

<div class="tombol">	
<input type=button value='Teller 1' id='Panggil1' name='Panggil1'>

<a href='hapus.php' style='text-decoration:none'>
<input type=button value='Reset' id='Reset' name='Reset'></a>

<input type=button value='Teller 2' id='Panggil2' name='Panggil2'>
</div>	
		
		
</html>