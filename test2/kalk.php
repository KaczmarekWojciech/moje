<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="get">
      <input type="number" name="id">
      <input type="submit" value="Wyslij">
    </form>
<?php
if (isset($_GET['id'])) {
  $connect= new mysqli("localhost","root","","kalk");
  $sql="SELECT * FROM `kalk` WHERE id=$_GET[id]";
  $result=$connect->query($sql);
  $ob=$result->fetch_assoc();
  echo<<<a
  Wybierz dzialanie
  <form  method="get">
    <input type="number" name="a" value="$ob[a]"><br>
    <input type="number" name="b" value="$ob[b]"><br>
    <select name="wybierz">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <input type="submit" value="Wyslij">
  </form>

a;
$connect->close();
}

  switch ($_GET['wybierz']) {
    case '+':
      $wynik=$_GET['a']+$_GET['b'];
      echo "$wynik";
      break;
    case '-':
      $wynik=$_GET['a']-$_GET['b'];
      echo "$wynik";
      break;
    case '*':
      $wynik=$_GET['a']*$_GET['b'];
      echo "$wynik";
      break;
    case '/':
      $wynik=$_GET['a']/$_GET['b'];
      echo "$wynik";
      break;


}
 ?>
  </body>
</html>
