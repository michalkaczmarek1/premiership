<?php

$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'my_database';

$mysqli = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
$mysqli->set_charset('utf8');


if(mysqli_connect_errno()){
	echo 'Blad polaczenia z baza danych';
}