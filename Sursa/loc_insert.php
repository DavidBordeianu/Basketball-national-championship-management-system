<?php include ("functions.php")?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adaugare l
		ocatie</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div class="header">
	<h2>Adaugare locatie</h2>
</div>
<form method="post" action="loc_insert.php"> 
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
		<button type="submit" class="btn" name="it_btn">Adaugati locatia</button>
	</div>
    </form>
</body>
</html>