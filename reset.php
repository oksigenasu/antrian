<?php
include "db.php";
if(isset($_GET['reset'])){
    $sql = "DELETE FROM pembacaan;";  
	$sql2 = "ALTER TABLE pembacaan AUTO_INCREMENT = 1";
    mysql_query($sql);
	mysql_query($sql2);
	header("location: Admin.php");
}
?>