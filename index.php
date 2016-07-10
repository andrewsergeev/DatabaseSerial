<?php
require_once("include/db.php");


if ($result = $mysqli->query("select titleserials, titlegenre, titlecompany from company, genre, serials, main where serials.id=serials_id and company.id=company_id and genre.id=genre_id order by serials_id; ")) {
    echo "<table BORDER='1' align='center' CELLSPACING='0' CELLPADDING='8' width='80%' bgcolor='#F0F8FF' bordercolor='#DCDCDC'>\n";
    echo "<th bgcolor='#00bfff'><a href='serials.php' style='display: block; width: 100%; height: 100%; text-decoration: none; color: black'>Название сериала</a></th>";
    echo "<th bgcolor='#00bfff'><a href='genre.php' style='display: block; width: 100%; height: 100%; text-decoration: none; color: black'>Жанр</a></th>";
    echo "<th bgcolor='#00bfff' width='25%' style='border-right: none; border-left-width: 2px;' ><a href='company.php' style='display: block; width: 100%; height: 100%; text-decoration: none; color: black'>Телевизионная компания</a></th>";

    echo "<th bgcolor='#00bfff' style='border-left: none; border-right: none; width: 23; '></th>\n";
    echo "<th bgcolor='#00bfff' style='border-left: none; width: 23; '></th>\n";
    while ($row = $result->fetch_row()) {
        echo "\t<tr>\n";
        $cnt = false;
        foreach($row as $value) echo "\t\t<td align='center' style='border-right: none; border-left-width: 2px; '>$value</td>\n";

        if ($idResult = $mysqli->query("select id from serials where titleserials='$row[0]'")) $idSerials = $idResult->fetch_row();
        /*редактирование строки*/
        echo "\t\t<td style='border-right: none; border-left: none;  width: 23; '>
            <form id='edit' method='post'></form>
            <input type='image' form='edit' src='image/edit.png'  style='width:20px; ' name='$idSerials[0]edit' value='edit'/>\n";
        echo "\t\t</td>\n";
        if (isset($_POST["$idSerials[0]edit"])) {
            exit("<meta http-equiv='refresh' content='0; url=edit.php?id=$idSerials[0]&nametable=index'>");
            //header("Location: edit.php?id=$idSerials[0]&nametable=index");
        }


        /*удаление строки*/
        echo "\t\t<td style='border-left: none; width: 23; '>
            <form id='del' method='post'></form>
            <input type='image' form='del' src='image/delete2.png'  style='width:20px; ' name='$idSerials[0]buttonDelete' value='buttonDelete'/>\n";
        echo "\t\t</td>\n";
        if (isset($_POST["$idSerials[0]buttonDelete"])) {
            $mysqli->query("DELETE FROM main WHERE serials_id='$idSerials[0]'");
            $mysqli->query("DELETE FROM serials WHERE id='$idSerials[0]'");
            exit("<meta http-equiv='refresh' content='0; url=$_SERVER[REQUEST_URI]'>");
            //header("Location: ".$_SERVER["REQUEST_URI"]);
        }
        echo "\t</tr>\n";


    }
    echo "<tr>
             <td style='border-right: none; border-left-width: 2px;'></td>
             <td style='border-right: none; border-left: none;'></td>
             <td style='border-right: none; border-left: none;'></td>
             <td style='border-right: none; border-left: none;'></td>
             <td style='border-left: none; width: 23; text-align: right'>
                <form id='tmp' method='post'></form>
                <input type='image' form='tmp' src='image/add.png'  style='width:20px; ' name='addButton1' value='addButton1'/>
             </td>
          </tr>";
    echo "</table>\n";

    $result->close();
}


/*добавление элемента*/
if (isset($_POST["addButton1"])) exit("<meta http-equiv='refresh' content='0; url=add.php?nametable=index'>");
//header("Location: add.php?nametable=index");