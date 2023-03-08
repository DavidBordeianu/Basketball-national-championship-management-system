<?php include 'functions.php';


if (isset($_GET['editid'])) {
	$id = $_GET['editid'];

	$sql = "SELECT * FROM `jucatori` WHERE id = $id";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	$idechipa = $row['idechipa'];
	$username = $row['username'];
	$email = $row['email'];
	$password_1 = $row['password'];
	$password_2 = $row['password'];
	$nume = $row['nume'];
	$prenume = $row['prenume'];
	$pozitie = $row['pozitie'];
	$dataangajarii = $row['dataangajarii'];

	if (isset($_POST['edit_btn'])) {
		$idechipa = $_POST['idechipa'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
		$pozitie = $_POST['pozitie'];
		$dataangajarii = $_POST['dataangajarii'];

		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		$password = md5($password_1);//encrypt the password before saving in the database

		$sql = "UPDATE `jucatori` set id = $id, idechipa = $idechipa, username = '$username', email = '$email', password = '$password',
		nume = '$nume', prenume = '$prenume', pozitie = '$pozitie', dataangajarii = '$dataangajarii'
        WHERE id = $id";
		$result = mysqli_query($db, $sql);
		if ($result) {
			//echo "Actualizat cu succes !";
			header('location:jucatori.php');
		} else {
			die(mysqli_error($db));
		}

	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div class="header">
	<h2>Edit</h2>
</div>
<form method="post"> 
<?php echo display_error(); ?>
    <div class="input-group">
		<label>ID-Echipa</label>
		<input type="text" name="idechipa" value="<?php echo $idechipa; ?>">
	</div>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1" value="<?php echo $password_1; ?>">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2" value="<?php echo $password_2; ?>">
	</div>
	<div class="input-group">
		<label>Nume</label>
		<input type="text" name="nume" value="<?php echo $nume; ?>">
	</div>
	<div class="input-group">
		<label>Prenume</label>
		<input type="text" name="prenume" value="<?php echo $prenume; ?>">
	</div>
	<div class="input-group">
		<label>Pozitie</label>
		<input type="text" name="pozitie" value="<?php echo $pozitie; ?>">
	</div>
	<div class="input-group">
		<label>Data Angajarii</label>
		<input type="date" name="dataangajarii" value="<?php echo $dataangajarii; ?>">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="edit_btn">Edit</button>
	</div>
    </form>
</body>
</html>