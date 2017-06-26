<?php
include('db_connect.php'); 
if(isset($_GET['id'])){
	include ('form_edit_player.php');
} else {
	include ('form_new_player.php');
}

?>
<?php 

if(isset($_GET['id'])){
	/* Tryb edycji */

	if(isset($_POST['submit'])){

		if(is_numeric($_POST['id'])){

			$id = $_POST['id'];
			$name = htmlentities($_POST['name'], ENT_QUOTES);
			$description = htmlentities($_POST['description'], ENT_QUOTES);
			$link = htmlentities($_POST['link'], ENT_QUOTES);

			if($name == '' || $description == '' || $link == ''){
				$error = 'Wypelnij wszystkie pola';
				createForm($name, $description, $link, $error, $id);
			} else {
				if($stmt = $mysqli->prepare("UPDATE players SET name = ?, description = ?, link = ?, created = NOW() WHERE id = ?")){
					$stmt->bind_param('sssi', $name, $description, $link, $id);
					$stmt->execute();
					$stmt->close();
				} else {
					echo 'Blad zapytania';
				}
				header("Location: players.php");
			}
		}

	} else {

		if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){

			$id = intval($_GET['id']);

			if($stmt = $mysqli->prepare("SELECT * FROM players WHERE id = ?")){
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->bind_result($id, $name, $description, $link, $created);
				$stmt->fetch();
				createForm($name, $description, $link, NULL, $id);
				$stmt->close();
			} else {
				echo 'Blad zapytania';
			}
		} else {
			header("Location: players.php");
		}
	}

} else {
	/* Tryb nowego rekordu */

	if(isset($_POST['send'])){

		$name = htmlentities($_POST['name'], ENT_QUOTES);
		$description = htmlentities($_POST['description'], ENT_QUOTES);
		$link = htmlentities($_POST['link'], ENT_QUOTES);

		if($name == '' || $description == '' || $link == ''){
			$error = 'Wypelnij wszystkie pola';
			echo "<p class='alert alert-danger'>";
			echo $error;
			echo "</p>";
		} else {
			if($stmt = $mysqli->prepare('INSERT players (name, description, link, created) VALUES (?,?,?, NOW())')){
				$stmt->bind_param('sss', $name, $description, $link);
				$stmt->execute();
				$stmt->close();
			} else {
				echo 'Blad zapytania';
			}

			header("Location: players.php");
		}
	}
}