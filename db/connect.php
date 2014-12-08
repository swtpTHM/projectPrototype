<?php

$db = mysqli_connect($db_server,$db_username,$db_password,$db_database);

if(!$db)
{
    exit("Verbindungsfehler: ".mysqli_connect_error());
}
