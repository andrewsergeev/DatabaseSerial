<?php
$address = $_GET["name"];
require_once("$address.php");

echo "<form id='editCompany' method='post'></form>
      <table BORDER='0' CELLSPACING='0' CELLPADDING='8' border='none' align='center'>
        <tr>
            <th bgcolor='#adff2f'>Редактировать компанию</th>
            <th bgcolor='#adff2f'></th>
            <th bgcolor='#adff2f'><input type='image' form='editCompany' src='image/close.png'  style='width:20px; ' name='close' value='close'/></th>
        </tr>
        <tr>
            <td style='color: white;'>Название компании: </td>
            <td><input type='text' form='editCompany' name='titleCompany'/></td>
            <td><input type='image' form='editCompany' src='image/ok.png' name='editTitleCompany' value='editTitleCompany'  style='height:18px;'/></td>
        </tr>
         <tr>
            <td style='color: white;'>Год основания: </td>
            <td><input type='text' form='editCompany' name='yearCompany'/></td>
            <td><input type='image' form='editCompany' src='image/ok.png' name='edityearCompany' value='edityearCompany'  style='height:18px;'/></td>
        </tr>
        <tr>
            <td style='color: white;'>CEO: </td>
            <td><input type='text' form='editCompany' name='CEO'/></td>
             <td><input type='image' form='editCompany' src='image/ok.png' name='editCEO' value='editCEO'  style='height:18px;'/></td>
        </tr>
      </table>";

if (isset($_POST["close"]))  exit("<meta http-equiv='refresh' content='0; url=$address.php'>");
    //header("Location: $address.php");

if (isset($_POST["editTitleCompany"])) {
    $id = $_GET["id"];
    $titleCompany = htmlspecialchars($_POST['titleCompany']);

    if ($titleCompany != NULL) {
        $mysqli->query("UPDATE company SET titleCompany='$titleCompany' WHERE id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$address.php'>");
        //header("Location: $address.php");
    }
}
if (isset($_POST["edityearCompany"])) {
    $id = $_GET["id"];
    $yearCompany= htmlspecialchars($_POST['yearCompany']);

    if ($yearCompany != NULL) {
        $mysqli->query("UPDATE company SET yearCompany='$yearCompany' WHERE id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$address.php'>");
        //header("Location: $address.php");
    }
}
if (isset($_POST["editCEO"])) {
    $id = $_GET["id"];
    $CEO = htmlspecialchars($_POST['CEO']);

    if ($CEO != NULL) {
        $mysqli->query("UPDATE company SET CEO='$CEO' WHERE id='$id'");

        exit("<meta http-equiv='refresh' content='0; url=$address.php'>");
        //header("Location: $address.php");
    }
}

$mysqli->close();