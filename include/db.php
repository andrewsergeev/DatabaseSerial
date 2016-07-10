<meta charset="utf-8">
<title>Сериалы - База Данных</title>
<style>
    body {
        background: #000000 url(image/background.jpg);
    }
</style>

<h1 align="center" style="color:#ff0003">База данных "Сериалы"</h1>
<?php
/*
CREATE TABLE main
(
    serials_id int NOT NULL,
    genre_id int NOT NULL,
    company_id int NOT NULL,

  primary key (serials_id, genre_id),
  foreign key (serials_id)
    references serials(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  foreign key (genre_id)
    references genre(id)
    ON UPDATE CASCADE,
  foreign key (company_id)
    references company(id)
    ON UPDATE CASCADE
) ENGINE=InnoDB;
*/
$mysqli = new mysqli("localhost", "root", "andre231091S", "test", 3306);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//ob_start();



