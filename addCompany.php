<?php
$address = $_GET["name"];
$addressback = $_GET["nametable"];
require_once("$address.php");

echo "  <form id='addCompany' method='post'></form>
        <table BORDER='0' CELLSPACING='0' CELLPADDING='8' border='none' align='center'>
        <tr>
            <th bgcolor='#adff2f'>Добавить компанию</th>
            <td bgcolor='#adff2f' align='right'>
                <input type='image' form='addCompany' src='image/ok.png' name='addButtonCompany' value='addButtonCompany'  style='height:18px;'/>
                <input type='image' form='addCompany' src='image/close.png'  name='closeAdd' value='close'  style='width:20px;'/>
            </td>
        </tr>
        <tr>
            <td style='color: white;'>Название компании: </td>
            <td><input type='text' form='addCompany' name='titleCompany'/></td>
        </tr>
        <tr>
            <td style='color: white;'>Год основания: </td>
            <td><input type='text' form='addCompany' name='yearCompany'/></td>
        </tr>
        <tr>
            <td style='color: white;'>CEO: </td>
            <td><input type='text' form='addCompany' name='CEO'/></td>
        </tr>
      </table>";

if (isset($_POST["closeAdd"])) exit("<meta http-equiv='refresh' content='0; url=$address.php?nametable=$addressback'>");
    //header("Location: $address.php?nametable=$addressTable");

if (isset($_POST["addButtonCompany"])) {
    $titleCompany = htmlspecialchars($_POST['titleCompany']);
    $yearCompany  = (int)($_POST['yearCompany']);
    $CEO = htmlspecialchars($_POST['CEO']);
    if ($titleCompany != NULL && $yearCompany != NULL && $CEO != NULL) {
        $mysqli->query("INSERT INTO company(titlecompany, yearCompany, CEO) VALUES ('$titleCompany', '$yearCompany', '$CEO')");

        exit("<meta http-equiv='refresh' content='0; url=$address.php?nametable=$addressback'>");
        //header("Location: $address.php?nametable=$addressTable");
    }
}

$mysqli->close();