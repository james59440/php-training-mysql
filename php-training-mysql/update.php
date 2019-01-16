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
	<title>modifier une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Modifier</h1>
	<form action="update.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?=$_GET['name'] ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
                <option selected = "selected" ><?=$_GET['difficulty'] ?> </option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?=$_GET['distance'] ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?=$_GET['duration'] ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?=$_GET['height_difference'] ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
        <input type="hidden" name="id" value="<?=$_GET['id'] ?>">
	</form>
</body>
</html>

<?php


function maj(){
    global $conn;

    if (isset($_POST['name'])
        && $_POST['id'] != ''
        && $_POST['difficulty'] != ''
        && $_POST['distance'] != ''
            && $_POST['duration']!= ''
                && $_POST['height_difference'] !=''
                    && isset($_POST['button'])
    )


        $ident = $_POST['id'];
    $nom = $_POST['name'];
    $dif= $_POST['difficulty'];
    $dist = $_POST['distance'];
    $dure = $_POST['duration'];
    $hauteur = $_POST['height_difference'];


    $sql = "UPDATE `hiking` SET `name` = '$nom' , difficulty = '$dif' , distance = '$dist' , duration = '$dure' , height_difference = '$hauteur' WHERE id = $ident ";
    $conn->query($sql);


}
maj();

?>
