<?php
include 'functions.php';
if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `jucatori` WHERE id = $id";
    $result = mysqli_query($db, $sql);
    if($result){
        //echo "Sters cu succes !";
        header('location: jucatori.php');
    }else{
        die(mysqli_error($db));
    }
}