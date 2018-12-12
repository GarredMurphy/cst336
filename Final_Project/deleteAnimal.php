<?php
include 'dbConnection.php';
$conn = startConnection('heroku_178dfb6517b4b02');

$namedParameters[':animalId'] = $_GET['animalId'];

$sql = "DELETE FROM final_animals WHERE animalId = :animalId";
$statement = $conn->prepare($sql);
$statement->execute($namedParameters);

header("Location: admin.php");

?>