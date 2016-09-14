<?php
session_start();
include "../koneksi.php";
mysql_query("delete from alamat");
mysql_query("delete from nokini");
echo "<meta http-equiv=refresh content='0;url=admin.php'>";
?>