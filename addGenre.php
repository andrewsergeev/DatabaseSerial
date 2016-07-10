<?php
$address = $_GET["name"];
$addressTable = $_GET["nametable"];
require_once("$address.php");

echo "<form id='addGenre' method='post'></form>
    <table BORDER='0' CELLSPACING='0' CELLPADDING='8' border='none' align='center'>
    <tr>
        <th bgcolor='#adff2f' >Добавить жанр</th>
        <td bgcolor='#adff2f' align='right'>
            <input type='image' form='addGenre' src='image/ok.png' name='addButtonGenre' value='addButtonGenre'  style='height:18px;'/>
            <input type='image' form='addGenre' src='image/close.png'  name='closeAdd' value='close'  style='width:20px;'/>
        </td>
    </tr>
    <tr>
        <td style='color: white;'>Жанр: </td>
        <td><input type='text' form='addGenre' name='titleGenre'/></td>
    </tr>
    <tr>
        <td valign='top' style='color: white;'>Описание: </td>
        <td><textarea type='text' form='addGenre' rows='5' name='description' style='width: 400'></textarea></td>
    </tr>
  </table>";

if (isset($_POST["closeAdd"])) exit("<meta http-equiv='refresh' content='0; url=$address.php?nametable=$addressTable'>");
    //header("Location: $address.php?nametable=$addressTable");

if (isset($_POST["addButtonGenre"])) {
    $titleGenre = htmlspecialchars($_POST['titleGenre']);
    $description = htmlspecialchars($_POST['description']);
    if ($titleGenre != NULL && $description != NULL) {
        $mysqli->query("INSERT INTO genre(titlegenre, description) VALUES ('$titleGenre', '$description')");

        exit("<meta http-equiv='refresh' content='0; url=$address.php?nametable=$addressTable'>");
        //header("Location: $address.php?nametable=$addressTable");
    }
}

$mysqli->close();
