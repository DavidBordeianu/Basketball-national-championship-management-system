<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'multi_login');

// variable declaration
$username = "";
$email    = "";
$errors   = array();

$idechipa = 0;

$nume          = "";
$prenume       = "";
$pozitie       = "";
$dataangajarii = "";

$denumire     =  "";
$oras         =  "";
$strada       =  "";
$numarstrada  =  "";

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $idechipa, $username, $email, $nume, $prenume, $pozitie, $dataangajarii;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$idechipa         =  $_POST['idechipa'];
	$username         =  e($_POST['username']);
	$email            =  e($_POST['email']);
	$password_1       =  e($_POST['password_1']);
	$password_2       =  e($_POST['password_2']);
	$nume             =  e($_POST['nume']);
	$prenume          =  e($_POST['prenume']);
	$pozitie          =  e($_POST['pozitie']);
	$dataangajarii    =  e($_POST['dataangajarii']);

	// form validation: ensure that the form is correctly filled
	if (empty($idechipa)) { 
		array_push($errors, "ID-Echipa is required"); 
	}
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	
	if (empty($nume)) { 
		array_push($errors, "Nume is required"); 
	}
	if (empty($prenume)) { 
		array_push($errors, "Prenume is required"); 
	}
	if (empty($pozitie)) { 
		array_push($errors, "Pozitie is required"); 
	}
	if (empty($dataangajarii)) { 
		array_push($errors, "Data Angajarii is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO jucatori (idechipa, username, email, user_type, password, nume, prenume, pozitie, dataangajarii) 
					  VALUES($idechipa, '$username', '$email', '$user_type', '$password', '$nume', '$prenume', '$pozitie', '$dataangajarii')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO jucatori (idechipa, username, email, user_type, password, nume, prenume, pozitie, dataangajarii) 
					  VALUES($idechipa, '$username', '$email', 'user', '$password', '$nume', '$prenume', '$pozitie', '$dataangajarii')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM jucatori WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function getDte($id){
	global $db;
	$query = "SELECT echipa.nume
	          FROM echipa INNER JOIN jucatori
			  ON echipa.idechipa = jucatori.idechipa 
			  WHERE jucatori.id =" .$id;
			  
	$result = mysqli_query($db, $query);
	
	$team = mysqli_fetch_assoc($result);
	return $team;
}

//TRE SA FIE COMPLEXA
//SA AIBA VARIABILA
function getAntrenor($id){
	global $db;
	/* $query = "SELECT ant.nume, ant.prenume
			  FROM jucatori j INNER JOIN echipa e, antrenor ant
			  ON j.idechipa = e.idechipa
			  WHERE j.id = $id AND ant.idechipa =
				(SELECT ant2.idechipa
				FROM antrenor ant2
				ON ant2.idantrenor = e.idantrenor
				WHERE ant2.idantrenor = e.idantrenor)";
 */
	$query = "SELECT ant.nume, ant.prenume
	           FROM antrenor ant INNER JOIN echipa e
	           ON ant.idantrenor = e.idantrenor
	           WHERE e.idantrenor =
	           (SELECT e2.idantrenor
			    FROM echipa e2 INNER JOIN jucatori j
			    ON e2.idechipa = j.idechipa 
			    WHERE j.id = $id)";

	$result = mysqli_query($db, $query);
	$coach = mysqli_fetch_assoc($result);
	return $coach;
}
function getPuncte($id) {
	global $db;
	$query = "SELECT SUM(puncte.numarpuncte) AS total
	          FROM puncte INNER JOIN jucatori
			  ON puncte.idjucator = jucatori.id 
			  WHERE jucatori.id =" .$id;

	$result = mysqli_query($db, $query);
	$points = mysqli_fetch_assoc($result);
	return $points;
}
function getMeci($id) {
	global $db;
	$query = "SELECT COUNT(puncte.numarpuncte) AS total
	          FROM puncte INNER JOIN jucatori
			  ON puncte.idjucator = jucatori.id 
			  WHERE jucatori.id =" .$id;

	$result = mysqli_query($db, $query);
	$matches = mysqli_fetch_assoc($result);
	return $matches;
}


// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}		

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	unset($_SESSION['echipa']);
	unset($_SESSION['puncte']);
	unset($_SESSION['meci']);
	
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM jucatori WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {
			
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Ați fost logat cu succes";
				header('location: home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Ați fost logat cu succes";
				$_SESSION['echipa']  =  getDte($logged_in_user['id']);
				$_SESSION['puncte']  =  getPuncte($logged_in_user['id']);
				$_SESSION['meci']  =  getMeci($logged_in_user['id']);
				$_SESSION['antrenor']  =  getAntrenor($logged_in_user['id']);
				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


// call the insert_loc() function if it_btn is clicked
if (isset($_POST['it_btn'])) {
	insert_loc();
}

// Inserare Locatie
function insert_loc(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $denumire, $oras, $strada, $numarstrada;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$denumire     =  e($_POST['denumire']);
	$oras         =  e($_POST['oras']);
	$strada       =  e($_POST['strada']);
	$numarstrada  =  e($_POST['numarstrada']);

	// form validation: ensure that the form is correctly filled
	if (empty($denumire)) { 
		array_push($errors, "Denumire is required"); 
	}
	if (empty($oras)) { 
		array_push($errors, "Oras is required"); 
	}
	if (empty($strada)) {
		array_push($errors, "Strada is required");
	}
	if (empty($numarstrada)) { 
		array_push($errors, "Numar is required"); 
	}
	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		
		$query = "INSERT INTO `locatie` (denumire, oras, strada, numarstrada)
					VALUES('$denumire', '$oras', '$strada', '$numarstrada')";
		mysqli_query($db, $query);
		$_SESSION['success']  = "New location successfully created!!";
		header('location: locatie.php');
		}
}
