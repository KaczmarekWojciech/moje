<?php
if(isset($_GET['id'])){
  if(!empty($_GET['id'])){
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "kalkulator";

    $connect = new mysqli($server, $user, $password, $db);

    $sql = "SELECT MAX(`id`) AS `max`, MIN(`id`) AS `min` FROM `kalk`;";

    $result = $connect->query($sql);

    $row = $result->fetch_assoc();

    $max = $row['max'];
    $min = $row['min'];

    if($_GET['id'] < $min || $_GET['id'] > $max){
      header('location: ./Dziuba.php?error=1');
    }else{
        header("location: ./Dziuba.php?id=$_GET[id]");
    }
  }else{
    header('location: ./Dziuba.php?error=1');
  }
}else{
  header('location: ./Dziuba.php?error=1');
}

?>
