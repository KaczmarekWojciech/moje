<?php
$connect= new mysqli("localhost","root","","studia");
$sql="DELETE FROM `studenci` WHERE `studenci`.`id` = $_GET[id]";
$result=$connect->query($sql);
header("location: ./studenci.php?deletedUser=$_GET[id]")
 ?>
