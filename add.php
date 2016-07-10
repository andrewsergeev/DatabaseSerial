<?php
require_once("include/db.php");
$addressTable = $_GET["nametable"];
require_once("$addressTable.php");

echo "<form id='add' method='post'></form>
      <table BORDER='0' CELLSPACING='0' CELLPADDING='8' border='none' align='center'>
        <tr>
            <th bgcolor='#adff2f'>Добавить сериал</th>
            <th bgcolor='#adff2f' align='right'><input type='image' form='add' src='image/ok.png' name='addButton' value='addButton'  style='height:18px;'/></th>
            <td bgcolor='#adff2f' align='right'><input type='image' form='add' src='image/close.png'  style='width:20px; ' name='close' value='close'/></td>
        </tr>
        <tr>
            <td style='color: white;'>Название сериала: </td>
            <td><input type='text' form='add' name='title' style='width: 100%'/></td>

        </tr>
        <tr>
            <td style='color: white;'>Жанр: </td>
            <td>
                <select name='genre' form='add' style='width: 100%'>
                <option></option>";
                if ($result = $mysqli->query("select id, titlegenre from genre"))
                    while ($rowGenre = $result->fetch_row())
                        echo "<option value='$rowGenre[0]'>$rowGenre[1]</option>\n";
echo "          </select>
            </td>
            <td><input type='image' form='add' src='image/add.png' name='addGenre' value='addGenre'  style='height:18px;'/></td>
        </tr>
        <tr>
            <td style='color: white;'>Компания: </td>
            <td>
                <select name='company' form='add' style='width: 100%'>
                <option></option>";
                if ($result = $mysqli->query("select id, titlecompany from company"))
                    while ($rowCompany = $result->fetch_row())
                        echo "<option value='$rowCompany[0]'>$rowCompany[1]</option>\n";
echo "          </select>
            </td>
            <td><input type='image' form='add' src='image/add.png' name='addCompany' value='addCompany'  style='height:18px;'/></td>
        </tr>
        <tr>
            <td style='color: white;'>Год выпуска: </td>
            <td><input type='text' form='add' name='year' style='width: 100%'/></td>
        </tr>
      </table>";

if (isset($_POST["close"]))  exit("<meta http-equiv='refresh' content='0; url=$addressTable.php'>");
    //header("Location: $addressTable.php");

if (isset($_POST["addButton"])) {

    $title = htmlspecialchars($_POST['title']);
    $idGenre = (int)($_POST['genre']);
    $idCompany = (int)($_POST['company']);
    $yearSerial = (int)$_POST['year'];

    if ($title != NULL && $yearSerial != NULL) {
        $mysqli->query("INSERT INTO serials(titleserials, YearSerial) VALUES ('$title', '$yearSerial')");
        if ($result = $mysqli->query("select id from serials where titleserials='$title'")) $idSerial = $result->fetch_row();
        $mysqli->query("INSERT INTO main(serials_id, genre_id, company_id) VALUES ('$idSerial[0]', '$idGenre', '$idCompany')");

        exit("<meta http-equiv='refresh' content='0; url=$addressTable.php'>");
        //header("Location: $addressTable.php");
    }
}

if (isset($_POST["addGenre"])) exit("<meta http-equiv='refresh' content='0; url=addGenre.php?nametable=$addressTable&name=add'>");
    //header("Location: addGenre.php?nametable=$addressTable&name=add");
if (isset($_POST["addCompany"]))  exit("<meta http-equiv='refresh' content='0; url=addCompany.php?nametable=$addressTable&name=add'>");
    //header("Location: addCompany.php?nametable=$addressTable&name=add");
