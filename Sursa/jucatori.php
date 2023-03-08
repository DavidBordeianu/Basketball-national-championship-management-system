<?php include ('functions.php') ?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Informatii despre jucatori</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">

    <style>
    body {
  		background-image: url('JucatoriF.jpg');
		background-size: 35.5%;
		height: auto;
	}
    #jucatori{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 68%;
        height: 100%;
        text-align: center;
        margin-top: 7%;
        margin-left: auto; 
        margin-right: auto;
    }

    #jucatori td, #jucatori th {
        border: 1px solid #ddd;
        padding: 8px;
        color: black;
    }

    #jucatori tr:nth-child(even){background-color: #f2f2f2;}
    #jucatori tr:nth-child(odd){background-color: #f2f2f2;}

    #jucatori tr:hover {background-color: #ddd;}

    #jucatori th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-image: linear-gradient(#FFD6B0 ,#DD893B);
        color: white;
        border: 1px solid #ddd;
        text-align: center
    }

    #insert_btn {
    padding: 10px;
	font-size: 15px;
	background: #F8A251;
	border: none;
	border-radius: 10px;
    margin: 10px;
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

<table class="center" id="jucatori">
  <thead class = "table-striped">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Nume</th>
      <th scope="col">prenume</th>
      <th scope="col">Pozitie</th>
      <th scope="col">Data Angajarii</th>
      <th scope="col">Optiuni</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php

    $sql = "SELECT * FROM `jucatori`";
    $result = mysqli_query($db, $sql);
    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['user_type'] != 'admin')
            {
            $id            = $row['id'];
            $username      = $row['username'];
            $email         = $row['email'];
            //$user_type     = $row['user_type']; 
            //$password      = $row['password'];
            $nume          = $row['nume'];
            $prenume       = $row['prenume'];
            $pozitie       = $row['pozitie'];
            $dataangajarii = $row['dataangajarii'];
        echo ' <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$username.'</td>
            <td>'.$email.'</td>
            <td>'.$nume.'</td>
            <td>'.$prenume.'</td>
            <td>'.$pozitie.'</td>
            <td>'.$dataangajarii.'</td>

            <td>
            <button class = "btn btn-primary" type="submit" id="edit_btn"><a href="edit.php?
            editid='.$id.'">Edit</a></button>
            <button class = "btn btn-danger" type="submit" id="delete_btn"><a href="delete.php?
            deleteid='.$id.'">Delete</a></button>
            </td>
        </tr>';
        }
        }
    }
    ?>
  </tbody>
</table>

<body>
    <div class="container">
        <button type="submit" class="btn" id="insert_btn"> <a href='signup.php'>Inserare Jucator</a></button>

        <div class="container1">
        <table class="center" id="jucatori">
            <thead class = "table-striped">
        <tr>
        <th scope="col">Antrenori ce nu se afla in activitate</th>
        </tr>
            </thead>
        <tbody class="table-group-divider">
            <?php
            $sql = "SELECT ant.nume, ant.prenume
                    FROM antrenor ant
                    WHERE ant.idantrenor NOT IN
                    (SELECT DISTINCT ant2.idantrenor
                     FROM antrenor ant2 JOIN echipa e
                     ON ant2.idantrenor = e.idantrenor)
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

        <table class="center" id="jucatori">
            <thead class = "table-striped">
        <tr>
        <th scope="col">Locatii unde nu au fost jucate meciuri</th>
        </tr>
            </thead>
        <tbody class="table-group-divider">
            <?php
            $sql = "SELECT loc.denumire
                    FROM locatie loc
                    WHERE loc.idlocatie != ALL
                    (SELECT DISTINCT loc2.idlocatie
                     FROM locatie loc2 JOIN meci
                     ON loc2.idlocatie = meci.idlocatie)
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

    <table class="center" id="jucatori">
            <thead class = "table-striped">
        <tr>
        <th scope="col">Numele echipelor gazda din meciurile</th>
        <th scope="col">jucate in ultimele doua luni, din diviza 2</th>
        </tr>
            </thead>
        <tbody class="table-group-divider">
            <?php
            // Numele echipelor gazda din diviza 2
            // Din meciurile jucate in ultimele doua luni
            
            $sql = "SELECT e.nume, d.denumire
                    FROM echipa e JOIN divizie d ON e.iddivizie = d.iddivizie
                    WHERE d.iddivizie = '222000' AND e.idechipa IN
                    (SELECT e2.idechipa
                     FROM echipa e2, meci
                     WHERE e2.idechipa = meci.idgazda
                     AND meci.data BETWEEN '2022-11-12' AND '2023-01-12')
                    ";

            $result = mysqli_query($db, $sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $nume   = $row['nume'];
                    $denumire = $row['denumire'];
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

    <table class="center" id="jucatori">
        <thead class = "table-striped">
            <tr>
            <th scope="col">Numele, prenumele si punctele jucatorilor</th>
            <th scope="col">care au dat peste 10 de puncte</th>
            <th scope="col">si joaca in divizia 1</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            // Numele si prenumele jucatorilor, care au dat peste 10 de puncte in campionat
            // Si joaca in divizia 1
            
            $sql = "SELECT j.nume, j.prenume, SUM(pct.numarpuncte) AS total
                    FROM puncte pct INNER JOIN jucatori j
			        ON pct.idjucator = j.id 
                    WHERE j.idechipa IN
                    (SELECT e.idechipa
                     FROM echipa e, divizie d
                     WHERE e.iddivizie = d.iddivizie AND d.iddivizie = '111100')
                    GROUP BY j.nume
                    HAVING SUM(pct.numarpuncte) > 10
                    ";
            /* "SELECT SUM(puncte.numarpuncte) AS total
	          FROM puncte INNER JOIN jucatori
			  ON puncte.idjucator = jucatori.id 
			  WHERE jucatori.id =" .$id; */

            $result = mysqli_query($db, $sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $nume      = $row['nume'];
                    $prenume   = $row['prenume'];
                    $total     = $row['total'];
                echo ' <tr>
                    <td>'.$nume.'</td>
                    <td>'.$prenume.'</td>
                    <td>'.$total.' <small><i  style="color: #888;">(puncte date)</i></small></td>
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