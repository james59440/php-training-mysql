<?php
header('Location: read.php' );

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



    $ident = $_GET['id'];


    $sql =  $sql ="DELETE FROM hiking WHERE id = $ident";
    $conn->query($sql);


/*}
suppr();
*/
?>



