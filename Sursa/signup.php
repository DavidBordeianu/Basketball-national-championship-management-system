<?php include ('functions.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Înscriere nou jucator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2>Înscriere</h2>
</div>
<form method="post" action="signup.php">
<?php echo display_error(); ?>
     <div class="input-group">
		<label>ID-Echipa</label>
		<input type="number" name="idechipa" value="<?php echo $idechipa; ?>">
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
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
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
		<button type="submit" class="btn" name="register_btn">Înregistrare</button>
	</div>

	<p>
		Sunteți deja membru ? <a href="login.php">Logare</a>
	</p>
</form>
</body>
</html>