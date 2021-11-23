<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php

  if(isset($_GET['error'])) {
    echo "Wystapił błąd - spróbuj ponownie";
  }

?>

    <form action="./id_verify.php" method="get">
      <input type="number" name="id">
      <input type="submit" value="Wyślij">
    </form>

<?php

  if(isset($_GET['id'])) {

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "kalkulator";

    $connect = new mysqli($server, $user, $password, $db);

    $sql = "SELECT * FROM `kalk` WHERE `id` = $_GET[id]";

    $result = $connect->query($sql);

    $row = $result->fetch_assoc();

    $a = $row['a'];
    $b = $row['b'];

    echo <<< KALK
      <br>
      <h1> Wybierz operacje! </h1>
      <form action="Dziuba.php" method="get">
        <br><label for="a">Wartość liczby a</label><br>
        <input type="number" value="$a" name="a">
        <br><label for="b">Wartość liczby b</label><br>
        <input type="number" value="$b" name="b">
        <select name="dzialanie">
          <option value="+">+</option>
          <option value="-">-</option>
          <option value="*">*</option>
          <option value="/">/</option>
        </select>
        <input type="submit" value="Wyślij">
      </form>
    KALK;

    $connect->close();
  }

  if(isset($_GET['a']) && isset($_GET['b'])){
    if(!empty($_GET['a']) && !empty($_GET['b'])) {
      switch ($_GET['dzialanie']) {
        case "+":
          $wynik = $_GET['a'] + $_GET['b'];
          echo "$wynik";
          break;
        case "-":
          $wynik = $_GET['a'] - $_GET['b'];
          echo "$wynik";
          break;
        case "*":
          $wynik = $_GET['a'] * $_GET['b'];
          echo "$wynik";
          break;
        case "/":
          $wynik = $_GET['a'] / $_GET['b'];
          echo "$wynik";
          break;
        default:
          header('location: Dziuba.php?error=1');
          break;
      }
    }
  }

?>

  </body>
</html>
