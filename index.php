<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PREMIERSHIP</title>
	<link rel="stylesheet" href="css/style.css">
	<link type="text/css" href="css/jquery.lavalamp.css" rel="stylesheet" media="screen" />
	<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script src="javascript/jQuery3.2.1.js"></script>
	<script src="javascript/jquery.lavalamp.min.js"></script>
	<script src="javascript/script.js"></script>
</head>
<body>

	<div class="container" id="cont">
		<header class="header">
			<div class="logo">
				<a href="index.php"><img src="img/logo.jpg" alt=""></a>
			</div>
			<div class="nav-top">
				<nav>
					<ul id="top-menu">
						<li class="active"><a href="index.php" class="bookmark">Start</a></li>
						<li><a href="content/season.html" class="bookmark">Sezon 2016/2017</a></li>
						<li><a href="content/history.html" class="bookmark">Historia</a></li>
						<li><a href="content/teams.php" class="bookmark">Drużyny</a></li>
						<li><a href="content/players.php" class="bookmark">Zawodnicy</a></li>
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
								<li class="active"><a href="index.php" class="bookmark">Start</a></li>
								<li><a href="content/season.html" class="bookmark">Sezon 2016/2017</a></li>
								<li><a href="content/history.html" class="bookmark">Historia</a></li>
								<li><a href="content/teams.php" class="bookmark">Drużyny</a></li>
								<li><a href="content/players.php" class="bookmark">Zawodnicy</a></li>
							</ul>
						</nav>
					</div>				
				</div>
				<div class="content-inside">
				<h4 id='index'>Ostatnia dodana drużyna</h4>
				<?php
				include('content/db_connect.php');
					if($result = $mysqli->query('SELECT * FROM teams ORDER BY id DESC LIMIT 1')){
						if($result->num_rows > 0){
							while($row = $result->fetch_object()){
								echo "<h5 class='col-md-12'>" . $row->created . "</h5>";
								echo "<h2 class='col-md-12'>" . $row->name . "</h2>";
								echo "<p class='col-md-12'>" . substr($row->description, 0, 500) . "..." .  "</p>";
								echo "<a class='btn btn-info col-md-6' target='_blank' href='" . $row->link . "'>Czytaj więcej...</a>";
								echo "<a class='btn btn-success col-md-6' href='content/teams.php'>Zobacz wszystkie drużyny</a>";
							}
						}
					}
				?>
				<h4 id='index2'>Ostatni dodany zawodnik</h4>
				<?php

					if($result = $mysqli->query('SELECT * FROm players ORDER BY id DESC LIMIT 1')){
						if($result->num_rows > 0){
							while($row = $result->fetch_object()){
								echo "<h5 class='col-md-12'>" . $row->created . "</h5>";
								echo "<h2 class='col-md-12'>" . $row->name . "</h2>";
								echo "<p class='col-md-12'>" . substr($row->description, 0, 500) . "..." . "</p>";
								echo "<a class='btn btn-info col-md-6' target='_blank' href='" . $row->link . "'>Czytaj więcej...</a>";
								echo "<a class='btn btn-success col-md-6' href='content/players.php'>Zobacz wszystkich zawodników</a>";
							}
						}
					}
				?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>