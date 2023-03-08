<?php
include 'functions.php';
if(isset($_GET['delete_locid']))
{
    $id = $_GET['delete_locid'];

    $sql = "DELETE FROM `locatie` WHERE idlocatie = $id";
    $result = mysqli_query($db, $sql);
    if($result){
        //echo "Sters cu succes !";
        header('location: locatie.php');
    }else{
        die(mysqli_error($db));
    }
}