<?php
include 'functions.php';

if (isset($_GET['edit_locid'])) {
	$id = $_GET['edit_locid'];

	$sql = "SELECT * FROM `locatie` WHERE idlocatie = $id";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	$denumire    = $row['denumire'];
	$oras        = $row['oras'];
	$strada      = $row['strada'];
	$numarstrada = $row['numarstrada'];

	if (isset($_POST['edit_loc_btn'])) {
		$denumire    = $_POST['denumire'];
		$oras        = $_POST['oras'];
		$strada      = $_POST['strada'];
		$numarstrada = $_POST['numarstrada'];

		$sql = "UPDATE `locatie` set idlocatie = $id, denumire = '$denumire', 
        oras = '$oras', strada = '$strada', numarstrada = '$numarstrada'
        WHERE idlocatie = $id";
		$result = mysqli_query($db, $sql);
		if ($result) {
			//echo ($numarstrada);
			header('location:locatie.php');
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
		<label>Denumire</label>
		<input type="text" name="denumire" value="<?php echo $denumire; ?>">
	</div>
	<div class="input-group">
		<label>Oras</label>
		<input type="text" name="oras" value="<?php echo $oras; ?>">
	</div>
	<div class="input-group">
		<label>Strada</label>
		<input type="text" name="strada" value="<?php echo $strada; ?>">
	</div>
	<div class="input-group">
		<label>Numar</label>
		<input type="text" name="numarstrada" value="<?php echo $numarstrada; ?>">
	</div>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="edit_loc_btn">Edit</button>
	</div>
    </form>
</body>
</html>