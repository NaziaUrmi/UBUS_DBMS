<?php
require("db/db.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM comments WHERE id='$id'");
header("location: admin_apprv.php");
}
mysqli_close($conn);
?>