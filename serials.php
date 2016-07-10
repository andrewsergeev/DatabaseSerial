<?php
require_once("include/db.php");

if ($result = $mysqli->query("select * from serials")) {
    echo "<table BORDER='1' align='center' CELLSPACING='0' CELLPADDING='8' width='80%' bgcolor='#F0F8FF' bordercolor='#DCDCDC'>\n";
    echo "<th bgcolor='#00bfff' style='border-right: none; border-left-width: 2px;'>Название сериала</th>";
    echo "<th bgcolor='#00bfff' width='25%' style='border-right: none; border-left-width: 2px;'>Год выпуска</th>";
    echo "<th bgcolor='#00bfff' style='border-left: none; border-right: none; width: 23; '></th>\n";
    echo "<th bgcolor='#00bfff' style='border-left: none; width: 23; '><a href='index.php'><img src='image/back.png' style='width: 23'></a></th>\n";
    while ($row = $result->fetch_row()) {
        echo "\t<tr>\n";
        $cnt = false;
        foreach($row as $value)
            if (!$cnt) $cnt=true;
            else echo "\t\t<td align='center' style='border-right: none; border-left-width: 2px; '>$value</td>\n";

        /*редактирование строки*/
        echo "\t\t<td style='border-right: none; border-left: none;  width: 23; '>
            <form id='edit' method='post'></form>
            <input type='image' form='edit' src='image/edit.png'  style='width:20px; ' name='$row[0]edit' value='edit' />\n";
        echo "\t\t</td>\n";
        if (isset($_POST["$row[0]edit"])) {
            exit("<meta http-equiv='refresh' content='0; url=edit.php?id=$row[0]&nametable=serials'>");
            //header("Location: edit.php?id=$row[0]&nametable=serials");
        }


        /*удаление строки*/
        echo "\t\t<td style='border-left: none; width: 23; '>
            <form id='del' method='post'></form>
            <input type='image' form='del' src='image/delete2.png'  style='width:20px; ' name='$row[0]buttonDelete' value='buttonDelete'/>\n";
        echo "\t\t</td>\n";
        if (isset($_POST["$row[0]buttonDelete"])) {
            $mysqli->query("DELETE FROM serials WHERE id='$row[0]'");

            exit("<meta http-equiv='refresh' content='0; url=$_SERVER[REQUEST_URI]'>");
            //header("Location: ".$_SERVER["REQUEST_URI"]);
        }
        echo "\t</tr>\n";

    }
    echo "<tr>
             <td style='border-right: none; border-left-width: 2px;'></td>
             <td style='border-right: none; border-left: none'></td>
             <td style='border-left: none; border-right: none; width: 23; '></td>
             <td style='border-left: none; width: 23; '>
                <form id='tmp' method='post'></form>
                <input type='image' form='tmp' src='image/add.png'  style='width:20px; ' name='addButton1' value='addButton1'/>
             </td>
          </tr>";
    echo "</table>\n";


    $result->close();
}


/*добавление элемента*/
if (isset($_POST["addButton1"])) exit("<meta http-equiv='refresh' content='0; url=add.php?nametable=serials'>");
    //header("Location: add.php?nametable=serials");