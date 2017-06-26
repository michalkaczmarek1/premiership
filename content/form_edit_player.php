<?php
include('db_connect.php'); 
function createForm($t_name='', $t_description='', $t_link='', $error='', $id='') { ?>
<?php if(isset($_GET['id'])){ ?>
	<head>
		<meta charset="UTF-8">
		<title>PREMIERSHIP</title>
		<link rel="stylesheet" href="../css/style.css">
		<link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet" media="screen" />
	</head>
<?php } else {echo "";} ?>
	<div <?php if(isset($_GET['id'])){echo "class='container-edit'";} else {"";}?>>
	<?php if(isset($_GET['id'])) {echo "<h3>Edytuj artykuł</h3>";} else {echo "<h2>Dodaj artykuł</h2>";} ?>
		<form action="" method="POST">
			<?php if($error != ''){
				echo "<p class='alert alert-danger'>" . $error . "</p>";
			} ?>
			<div class="form-group">
				<?php if($id != '') { ?>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<p>ID: <?php echo $id; ?></p>
				<?php } ?>
			</div>
			<div class="form-group">
				<label for="name">Nazwa drużyny</label>
				<input type="text" class="form-control" name="name" value='<?php echo $t_name; ?>'>
			</div>
			<div class="form-group">	
				<label for="description">Opis</label>
				<textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $t_description; ?></textarea>
			</div>
			<div class="form-group">
				<label for="link">Link do więcej info</label>
				<input type="text" class="form-control" name="link" value='<?php echo $t_link; ?>'>
			</div>
			<input type="submit" <?php if(isset($_GET['id'])) { echo "name='submit'";} else { echo "name='send'";}?> class="btn btn-success" <?php if(isset($_GET['id'])) { echo "value='Zapisz zmiany'";} else { echo "value='Dodaj artykuł'";}?>>
			<?php if(isset($_GET['id'])){ echo "<a href='players.php' class='btn btn-warning'>Powrót</a>";}?>
		</form>
	</div>
<?php }