<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css.css">
  </head>
  <body>
    <?php
    $connect= new mysqli("localhost","root","","studia");
    $sql="SELECT studenci.id, imie, nazwisko, obywatelstwo from studenci join obywatelstwo on studenci.obywatelstwo_id=obywatelstwo.id;";
    $result=$connect->query($sql);
    echo <<< table
    <table>
    <tr>
      <th>Imię</th>
      <th>Nazwisko</th>
      <th>Obywatelstwo</th>
      <th>Usuń</th>
    </tr>
    table;
    while ($row=$result->fetch_assoc()){
      echo <<< dane
      <tr>
        <td>$row[imie]</td>
        <td>$row[nazwisko]</td>
        <td>$row[obywatelstwo]</td>
        <td><a href="./delete.php?id=$row[id]">Usuń</a></td>
      </tr>
      dane;
    }
    echo <<< table
      </table>
    table;
    if (isset($_GET['deletedUser'])){
      echo "Usunięto użytkownika o id = $_GET[deletedUser]";
    }
    if(isset($_GET['mess'])){
      echo $_GET['mess'];
    }
     ?>

  </body>
</html>
