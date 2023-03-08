<?php include_once('functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

</head>
<body>
	<link rel="stylesheet" type="text/css" href="style.css">
<!-- 	<link rel="stylesheet" type="text/css" href="style3.css"> -->

	<style>
		body {
  			background-image: url('Fundal.jpg');
			background-size: contains;
			height: auto;
		}
	</style>

	<div class="header">
		<h2>Bine ați venit la campionatul național de baschet!</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['nume'];    ?></strong>
					<strong><?php echo $_SESSION['user']['prenume']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">Delogare</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

 <!--    <div class = "container"> -->
		
	<!-- <div class = "item1"> -->
	<div class="header">
		<h2>Echipa</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
		    <div>
				<?php  if (isset($_SESSION['echipa'])) : ?>
					<strong><?php echo $_SESSION['echipa']['nume'];    ?></strong>
				<?php endif ?>
			</div>
		</div>
	</div>
	<!-- </div> -->

	<!-- <div class = "item2"> -->
	<div class="header">
		<h2>Puncte</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
		    <div>
				<?php  if (isset($_SESSION['puncte'])) : ?>
					<strong><?php echo $_SESSION['puncte']['total'];    ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo "puncte marcate în campionat"?>)</i>
					</small>
				<?php endif ?>
			</div>
		</div>
	</div>
	<!-- </div> -->
	
	<!-- ---------------------------------- -->

	<!-- <div class = "item3"> -->
	<div class="header">
		<h2>Meciuri</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
		    <div>
				<?php  if (isset($_SESSION['meci'])) : ?>
					<strong><?php echo $_SESSION['meci']['total'];    ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo "meciuri jucate în campionat"?>)</i>
					</small>
				<?php endif ?>
			</div>
		</div>
	</div>

	<!-- 	<div class = "item4"> -->
	<div class="header">
		<h2>Antrenori</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
		    <div>
				<?php  if (isset($_SESSION['antrenor'])) : ?>
					<strong><?php echo $_SESSION['antrenor']['nume'];    ?></strong>
					<strong><?php echo $_SESSION['antrenor']['prenume'];    ?></strong>
				<?php endif ?>
			</div>
		</div>
	</div>
	<br>
	<br>
	
	<!-- </div> -->

</body>
</html>