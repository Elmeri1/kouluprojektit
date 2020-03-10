<?php

session_start();

	if (!isset($_SESSION['email'])) {
	}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

	require('config/config.php');
	require('config/db.php');


	// Test if fields are empty
	$aiheErr = $lahettajaErr = $viestiErr = "";
	$aihe = $lahettaja = $viesti = "";

	// Check For Submit
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Onko aihe-kentta tyhja
		if (empty($_POST["aihe"])) {
			$aiheErr = "Aihe on pakollinen";
		} else {
			$aihe = test_input($_POST["aihe"]);
		}

		if (empty($_POST["lahettaja"])) {
			$lahettajaErr = "Lahettaja on pakollinen";
		} else {
			$lahettaja = test_input($_POST["lahettaja"]);
		}

		if (empty($_POST["viesti"])) {
			$viestiErr = "Viesti on pakollinen";
		} else {
			$viesti = test_input($_POST["viesti"]);
		}
		

	
		if (strlen($aihe) > 0 && strlen($lahettaja) > 0 && strlen($viesti) > 0)	{

			// Get form data
			$aihe = mysqli_real_escape_string($conn, $aihe);
			$viesti = mysqli_real_escape_string($conn, $viesti);
			$lahettaja = mysqli_real_escape_string($conn, $lahettaja);
	
			// Hae pvm php-funktiolla
			date_default_timezone_set('Europe/Helsinki');
			$pvm = date("Y-m-d G:i:s ");

			$query = "INSERT INTO viestit (aihe, lahettaja, viesti, pvm) VALUES('$aihe', '$lahettaja', '$viesti', '$pvm')";
			if(mysqli_query($conn, $query)){
				header('Location: '.ROOT_URL.'');
			} else {
				echo 'ERROR: '. mysqli_error($conn);
			}

		}

		
	}
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Lisaa viesti</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Aihe</label>
				<input type="text" name="aihe" class="form-control">
				<span class="error"> <?php echo $aiheErr;?></span>
			</div>
			<div class="form-group">
				<label>Lahettaja</label>
				<input type="text" name="lahettaja" class="form-control">
				<span class="error"> <?php echo $lahettajaErr;?></span>
			</div>
			<div class="form-group">
				<label>Viesti</label>
				<textarea name="viesti" class="form-control"></textarea>
				<span class="error"> <?php echo $viestiErr;?></span>
			</div>
			<input type="submit" name="submit" value="Laheta" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>