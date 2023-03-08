<?php
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style5.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}

	a:link {
        color: #8CA1FF;
    }

    a:visited {
        color: #8CA1FF;
    }

    a:hover {
        color: #8CA1FF;
    }

    a:active {
        color: #8CA1FF;
    }
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
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
			<img src="admin_pfp.jpg" >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
					</small>
						

				<?php endif ?>
			</div>
		</div>
	</div>
	<div class="header1">
		<h2>Go To</h2>
	</div>
	<div class="content1">
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
		<div class="profile_info1">
			<div>
                <a href="jucatori.php"> Informatii despre jucători</a> <br>
				<a href="locatie.php"> Informatii despre locație</a>
			</div>
		</div>
	</div>
</body>
</html>