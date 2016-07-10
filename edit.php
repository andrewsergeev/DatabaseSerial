<?php
require_once("include/db.php");
$addressTable = $_GET["nametable"];
require_once("$addressTable.php");

echo "<form id='edit' method='post'></form>
      <table BORDER='0' CELLSPACING='0' CELLPADDING='8' border='none' align='center'>
        <tr>
            <th bgcolor='#adff2f'>Редактировать сериал</th>
            <th bgcolor='#adff2f'></th>
            <th bgcolor='#adff2f'><input type='image' form='edit' src='image/close.png'  style='width:20px; ' name='close' value='close'/></th>
        </tr>
        <tr>
            <td style='color: white;'>Название сериала: </td>
            <td><input type='text' form='edit' name='title' style='width: 100%'/></td>
            <td><input type='image' form='edit' src='image/ok.png' name='editTitle' value='editTitle'  style='height:18px;'/></td>
        </tr>";
if ($addressTable == 'index') {
echo "  <tr>
            <td style='color: white;'>Жанр: </td>
            <td>
                <select name='genre' form='edit' style='width: 100%'>
                <option></option>";
                if ($result = $mysqli->query("select id, titlegenre from genre"))
                    while ($rowGenre = $result->fetch_row())
                        echo "<option value='$rowGenre[0]'>$rowGenre[1]</option>\n";
echo "          </select>
            </td>
            <td><input type='image' form='edit' src='image/ok.png' name='editGenre' value='editGenre'  style='height:18px;'/></td>
        </tr>
        <tr>
            <td style='color: white;'>Компания: </td>
            <td>
                <select name='company' form='edit' style='width: 100%'>
                <option></option>";
                if ($result = $mysqli->query("select id, titlecompany from company"))
                    while ($rowCompany = $result->fetch_row())
                        echo "<option value='$rowCompany[0]'>$rowCompany[1]</option>\n";
echo "          </select>
            </td>
            <td><input type='image' form='edit' src='image/ok.png' name='editCompany' value='editCompany'  style='height:18px;'/></td>
        </tr>";
}
if($addressTable == 'serials') {
echo"   <tr>
            <td style='color: white;'>Год выпуска: </td>
            <td><input type='text' form='edit' name='yearserial' style='width: 100%'/></td>
            <td><input type='image' form='edit' src='image/ok.png' name='editYear' value='editYear'  style='height:18px;'/></td>
        </tr>
      </table>";
}

if (isset($_POST["close"]))  exit("<meta http-equiv='refresh' content='0; url=$addressTable.php'>");
    //header("Location: $addressTable.php");

if (isset($_POST["editTitle"])) {
    $id = $_GET["id"];
    $title = htmlspecialchars($_POST['title']);

    if ($title != NULL) {
        $mysqli->query("UPDATE serials SET titleserials='$title' WHERE id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$addressTable.php'>");
        //header("Location: $addressTable.php");
    }
}
if (isset($_POST["editGenre"])) {
    $id = $_GET["id"];
    $idGenre = (int)($_POST['genre']);

    if ($idGenre != NULL) {
        $mysqli->query("UPDATE main SET genre_id='$idGenre' WHERE serials_id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$addressTable.php'>");
        //header("Location: $addressTable.php");
    }
}
if (isset($_POST["editCompany"])) {
    $id = $_GET["id"];
    $idCompany = (int)($_POST['company']);

    if ($idCompany != NULL) {
        $mysqli->query("UPDATE main SET company_id='$idCompany' WHERE serials_id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$addressTable.php'>");
        //header("Location: $addressTable.php");
    }
}
if (isset($_POST["editYear"])) {
    $id = $_GET["id"];
    $yearSerial = (int)$_POST['yearserial'];

    if ($yearSerial != NULL) {
        $mysqli->query("UPDATE serials SET yearserial='$yearSerial' WHERE id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$addressTable.php'>");
        //header("Location: $addressTable.php");
    }
}