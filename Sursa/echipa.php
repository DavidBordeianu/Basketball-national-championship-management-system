<?php 
include 'functions.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Informatii despre echipe</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">

    <style>
    body {
  		background-image: url('Echipa.jpg');
		background-size: 50%;
		height: auto;
	}
    #echipa{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 68%;
        height: 100%;
        text-align: center;
        margin-top: 20%;
        margin-left: auto; 
        margin-right: auto;
    }

    #echipa td, #echipa th {
        border: 1px solid #ddd;
        padding: 8px;
        color: black;
    }

    #echipa tr:nth-child(even){background-color: #f2f2f2;}
    #echipa tr:nth-child(odd){background-color: #f2f2f2;}

    #echipa tr:hover {background-color: #ddd;}

    #echipa th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-image: linear-gradient(#FFD6B0 ,#DD893B);
        color: white;
        border: 1px solid #ddd;
        text-align: center
    }

    #echipa {
    padding: 10px;
	font-size: 15px;
	background: #F8A251;
	border: none;
	border-radius: 10px;
    margin-top: 5%;
    margin-left: auto; 
    margin-right: auto;
    }

    #int_btn {
    padding: 10px;
	font-size: 15px;
	background: #F8A251;
	border: none;
	border-radius: 10px;
    margin: 10px;
    }

    a:link {
        color: white;
    }

    a:visited {
        color: white;
    }

    a:hover {
        color: white;
    }

    a:active {
        color: white;
    }

 </style>
 </head>
  
</html>

<table class="right" id="echipa">
  <thead class = "table-striped">
    <tr>
      <th scope="col">ID-echipa</th>
      <th scope="col">ID-divizie</th>
      <th scope="col">Antrenor</th>
      <th scope="col">Numele echipei</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php

    $sql = "SELECT * FROM `echipa`";
    $antr= "SELECT nume, prenume FROM `antrenor`";
                        //WHERE idantrenor = $idantrenor";
    $result = mysqli_query($db, $sql);
    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $idechipa   = $row['idechipa'];
            $iddivizie  = $row['iddivizie'];
            $idantrenor = $row['idantrenor'];
            $nume       = $row['nume'];

        echo ' <tr>
            <th scope="row">'.$idechipa.'</th>
            <td>'.$iddivizie.'</td>
            <td>'.$idantrenor.'</td>
            <td>'.$nume.'</td>

            <td>
            <button class = "btn btn-primary" type="submit" id="edit_btn"><a href="edit_echipa.php?
            editid='.$idechipa.'">Edit</a></button>
            <button class = "btn btn-danger" type="submit" id="delete_btn"><a href="delete_echipa.php?
            deleteid='.$idechipa.'">Delete</a></button>
            </td>
        </tr>';
        }
    }
    ?>
  </tbody>
</table>

<body>
    <div class="container">
        <button type="submit" class="btn" id="int_btn"> <a href='inserare_echipa.php'>Inserare Echipa</a></button>
    </div>
</body>
