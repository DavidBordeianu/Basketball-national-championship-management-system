<?php 
include 'functions.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Informatii despre locatii</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">

    <style>
    body {
  		background-image: url('Locatie.jpeg');
		background-size: 100%;
        
	}
    #locatie{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 68%;
        height: 100%;
        text-align: center;
        margin-top: 7%;
        margin-left: auto; 
        margin-right: auto;
    }

    #locatie td, #locatie th {
        border: 1px solid #ddd;
        padding: 10px;
        color: black;
    }

    #locatie tr:nth-child(even){background-color: #f2f2f2;}
    #locatie tr:nth-child(odd){background-color: #f2f2f2;}

    #locatie tr:hover {background-color: #ddd;}

    #locatie th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-image: linear-gradient(#FFD4AB ,#FB7A00);
        color: white;
        border: 1px solid #ddd;
        text-align: center
    }

    #it_btn {
    padding: 10px;
	font-size: 15px;
	background: #F8A251;
	border: none;
	border-radius: 10px;
    margin: 10px;
    margin-left: auto;
    }

    #edit_btn, #delete_btn {
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

<table class="center" id="locatie">
  <thead class = "table-striped">
    <tr>
      <th scope="col">ID-Locatie</th>
      <th scope="col">Denumire</th>
      <th scope="col">Oras</th>
      <th scope="col">Strada</th>
      <th scope="col">Numar</th>
      <th scope="col">Optiuni</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php

    $sql = "SELECT * FROM `locatie`";
    $result = mysqli_query($db, $sql);
    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $idlocatie   = $row['idlocatie'];
            $denumire    = $row['denumire'];
            $oras        = $row['oras'];
            $strada      = $row['strada']; 
            $numarstrada = $row['numarstrada'];
        echo ' <tr>
            <th scope="row">'.$idlocatie.'</th>
            <td>'.$denumire.'</td>
            <td>'.$oras.'</td>
            <td>'.$strada.'</td>
            <td>'.$numarstrada.'</td>

            <td>
            <button class = "btn btn-primary" type="submit" id="edit_btn"><a href="edit_loc.php?
            edit_locid='.$idlocatie.'">Edit</a></button>
            <button class = "btn btn-danger" type="submit" id="delete_btn"><a href="delete_loc.php?
            delete_locid='.$idlocatie.'">Delete</a></button>
            </td>
        </tr>';
        }
    }
    ?>
  </tbody>
</table>

<body>
    <div class="container">
        <button type="submit" class="btn" id="it_btn"> <a href='loc_insert.php'>Inserati o noua locatie</a></button>
        </div>

        <div class="container1">
        <table class="center" id="locatie">
            <thead class = "table-striped">
        <tr>
        <th scope="row">Antrenori in activitate</th>
        </tr>
            </thead>
        <tbody class="table-group-divider">
            <?php
            $sql = "SELECT antrenor.nume, antrenor.prenume
                    FROM antrenor JOIN echipa
                    ON antrenor.idantrenor = echipa.idantrenor
                    ";
            $result = mysqli_query($db, $sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $nume   = $row['nume'];
                    $prenume    = $row['prenume'];
                echo ' <tr>
                    <td>
                    '.$nume.' '.$prenume.'
                    </td>
                </tr>';
                }
            }
            ?>
        </tbody>
        </table>

        <table class="center" id="locatie">
            <thead class = "table-striped">
        <tr>
        <th scope="row">Locatii la care s-au jucat meciuri</th>
        </tr>
            </thead>
        <tbody class="table-group-divider">
            <?php
            $sql = "SELECT locatie.denumire
            FROM locatie JOIN meci
            ON locatie.idlocatie = meci.idlocatie
            ";
            $result = mysqli_query($db, $sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $denumire   = $row['denumire'];
                echo ' <tr>
                    <td>
                    '.$denumire.'
                    </td>
                </tr>';
                }
            }
            ?>
        </tbody>
        </table>

        </tbody>
    </table>

    <table class="center" id="locatie">
            <thead class = "table-striped">
        <tr>
        <th scope="row">Nume echipa</th>
        <th scope="row">Divizia</th>
        </tr>
            </thead>
        <tbody class="table-group-divider">
            <?php
            $sql = "SELECT echipa.nume, divizie.denumire
                    FROM echipa JOIN divizie
                    ON echipa.iddivizie = divizie.iddivizie
                    ";
            $result = mysqli_query($db, $sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $nume   = $row['nume'];
                    $denumire   = $row['denumire'];
                echo ' <tr>
                    <td>'.$nume.'</td>
                    <td>'.$denumire.'</td>
                </tr>';
                }
            }
            ?>
        </tbody>
        </table>

        </tbody>
    </table>
    
    <br>
    <br>

    </div>
</body>