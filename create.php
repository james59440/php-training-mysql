
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
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form name="form"  action="create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>

<?php


function add (){

    global $conn;

    if (isset($_POST['name'])
        && $_POST['difficulty'] != ''
        && $_POST['distance'] != ''
            && $_POST['duration']!= ''
                && $_POST['height_difference'] !=''
                    && isset($_POST['button'])
                )

        $nom = $_POST['name'];
    $dif= $_POST['difficulty'];
    $dist = $_POST['distance'];
    $dure = $_POST['duration'];
    $hauteur = $_POST['height_difference'];


    $sql = "INSERT INTO hiking VALUES (NULL ,'$nom','$dif',$dist,'$dure',$hauteur )";
    $conn->query($sql);


}
add();



?>

