<?php

include('db_connect.php');

if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){

	$id = intval($_GET['id']);

	if($stmt = $mysqli->prepare("DELETE FROM players WHERE id=? LIMIT 1")){
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->close();
	} else {
		echo 'Blad zapytania';
	}

	$mysqli->close();

	header("Location: players.php");

} else {
	header("Location: players.php");
}

