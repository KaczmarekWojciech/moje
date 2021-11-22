<?php
$connect= new mysqli("localhost","root","","studia");
$sql="INSERT INTO `studenci`(`imie`, `nazwisko`, `obywatelstwo_id`) VALUES ('$_GET[imie]','$_GET[nazwisko]','$_GET[obywatelstwo]');";
$result=$connect->query($sql);
header("location:studenci.php?mess=dodano uzytkownika");
 ?>
