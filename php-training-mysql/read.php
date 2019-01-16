<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $conn->select_db($dbname);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>

    <?php


    $sql = "SELECT * from hiking order by id asc ";
        $result = $conn->query($sql);
        $NbreData = $result->num_rows;	// nombre d'enregistrements (lignes)
        echo $NbreData;

        $rowAll = $result->fetch_assoc();


    if ($NbreData != 0)
    {
    ?>

    <table border="1">
      <!-- Afficher la liste des randonnées -->
        <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>difficulté</th>
            <th>distance</th>
            <th>durée</th>
            <th>hauteur</th>
        </tr>
        </thead>
        <tbody>
        <?php

        while( $row = $result->fetch_assoc() )
        {
            $id1 = $row['id'];
            $name1 = $row['name'];
            $difficulte1= $row['difficulty'];
            $distance1 = $row ['distance'];
            $dure = $row['duration'];
            $haut = $row['height_difference']

        // DONNEES A AFFICHER dans chaque cellule de la ligne
        ?>

            <td><?= $row['id'] ?><a href="delete.php?id= <?=$id1 ?>" > suppr</a></td>
            <td><a href="update.php?id=<?=$id1 ?>&amp;name=<?=$name1 ?>&amp;difficulty=<?= $difficulte1 ?>&amp;distance=<?=$distance1?>&amp;duration=<?=$dure ?>&amp;height_difference=<?=$haut ?>" > <?php  echo $row['name']; ?></a></td>
            <td><?php echo $row['difficulty']; ?></td>
            <td><?php echo $row['distance']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['height_difference']; ?></td>
        </tr>
        <?php
	}
        ?>
        </tbody>
    </table>

        <?php
    } else { ?>
        pas de données à afficher
        <?php
    }
    ?>

  </body>
</html>


<?php


echo '<br>'.'<br>';

?>




