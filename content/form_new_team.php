<?php
include('db_connect.php'); 
function createForm($t_name='', $t_description='', $t_link='', $error='', $id='') { ?>
		<form action="" method="POST">
		<?php if(isset($_GET['id'])) {echo "<h3>Edytuj artykuł</h3>";} else {echo "<h2 id='article'>Dodaj artykuł</h2>";} ?>
			<?php if($error != ''){
				echo "<p>" . $error . "</p>";
			} ?>
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
			<?php if(isset($_GET['id'])){ echo "<a href='teams.php' class='btn btn-warning'>Powrót</a>";}?>
		</form>
	</div>
<?php } ?>