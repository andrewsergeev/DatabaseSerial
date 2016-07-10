<?php
$address = $_GET["name"];
require_once("$address.php");

echo "<form id='editGenre' method='post'></form>
      <table BORDER='0' CELLSPACING='0' CELLPADDING='8' border='none' align='center'>
        <tr>
            <th bgcolor='#adff2f'>Редактировать жанр</th>
            <th bgcolor='#adff2f'></th>
            <th bgcolor='#adff2f'><input type='image' form='editGenre' src='image/close.png'  style='width:20px; ' name='close' value='close'/></th>
        </tr>
        <tr>
            <td style='color: white;'>Жанр: </td>
            <td><input type='text' form='editGenre' name='titleGenre'/></td>
            <td><input type='image' form='editGenre' src='image/ok.png' name='editTitle' value='editTitle'  style='height:18px;'/></td>
        </tr>
        <tr>
            <td valign='top' style='color: white;'>Описание: </td>
            <td><textarea type='text' form='editGenre' rows='5' name='description' style='width: 400'></textarea></td>
            <td valign='top'><input type='image' form='editGenre' src='image/ok.png' name='editDescription' value='editDescription'  style='height:18px;'/></td>
        </tr>
      </table>";

if (isset($_POST["close"]))  exit("<meta http-equiv='refresh' content='0; url=$address.php'>");
    //header("Location: $address.php");

if (isset($_POST["editTitle"])) {
    $id = $_GET["id"];
    $title = htmlspecialchars($_POST['titleGenre']);

    if ($title != NULL) {
        $mysqli->query("UPDATE genre SET titlegenre='$title' WHERE id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$address.php'>");
        //header("Location: $address.php");
    }
}
if (isset($_POST["editDescription"])) {
    $id = $_GET["id"];
    $genre = htmlspecialchars($_POST['description']);

    if ($genre != NULL) {
        $mysqli->query("UPDATE genre SET description='$genre' WHERE id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$address.php'>");
        //header("Location: $address.php");
    }
}

$mysqli->close();