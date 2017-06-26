<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PREMIERSHIP</title>
	<link rel="stylesheet" href="../css/style.css">
	<link type="text/css" href="../css/jquery.lavalamp.css" rel="stylesheet" media="screen" />
	<link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script src="../javascript/jQuery3.2.1.js"></script>
	<script src="../javascript/jquery.lavalamp.min.js"></script>
	<script src="../javascript/script.js"></script>
</head>
<body>

	
	<div class="container">
		<header class="header">
			<div class="logo">
				<a href="../index.php"><img src="../img/logo.jpg" alt=""></a>
			</div>
			<div class="nav-top">
				<nav>
					<ul id="top-menu">
						<li><a href="../index.php" class="bookmark">Start</a></li>
						<li><a href="season.html" class="bookmark">Sezon 2016/2017</a></li>
						<li><a href="history.html" class="bookmark">Historia</a></li>
						<li><a href="teams.php" class="bookmark">Drużyny</a></li>
						<li class="active"><a href="players.php" class="bookmark">Zawodnicy</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<hr>
		<div class="content">

			<div class="main-content">
				<div class="left-c">
					<div class="nav-main" id="main-menu">
						<nav>
							<ul id="navlist">
								<li><a href="../index.php" class="bookmark">Start</a></li>
								<li><a href="season.html" class="bookmark">Sezon 2016/2017</a></li>
								<li><a href="history.html" class="bookmark">Historia</a></li>
								<li><a href="teams.php" class="bookmark">Drużyny</a></li>
								<li class="active"><a href="players.php" class="bookmark">Zawodnicy</a></li>
							</ul>
						</nav>
					</div>				
				</div>
				<div class="content-inside" id="form-teams">
				<h3>Zawodnicy</h3>
				<?php  
					include('db_connect.php');
					include('records_players.php');
					if($result = $mysqli->query('SELECT * FROm players ORDER BY id DESC')){
						if($result->num_rows > 0){
							while($row = $result->fetch_object()){
								echo "<h5 class='col-md-12'>" . $row->created . "</h5>";
								echo "<h2 class='col-md-12'>" . $row->name . "</h2>";
								echo "<p class='col-md-12'>" . $row->description . "</p>";
								echo "<a class='btn btn-info col-md-4' target='_blank' href='" . $row->link . "'>Czytaj więcej...</a>";
								echo "<a class='btn btn-warning col-md-4' href='records_players.php?id=" . $row->id . "'>Edytuj</a>";
								echo "<a class='btn btn-danger col-md-4' href='delete_players.php?id=" . $row->id . "'>Usuń</a>";
							}
						}
					}
					createForm();
				?>
			</div>
		</div>
	</div>
</body>
</html>