<?php

include '../dbConnection.php';
$dbConn = startConnection("heroku_178dfb6517b4b02");

$namedParameters[':responseId']= $_GET['responseId'];

$sql ="SELECT * FROM final_response WHERE responseId = :responseId";
$stmt = $dbConn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
echo json_encode($record);
?>