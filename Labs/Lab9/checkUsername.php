<?php
header('Access-Control-Allow-Origin: *');
include 'dbConnection.php';
$dbConn = getDatabaseConnection("heroku_178dfb6517b4b02");
$sql = "SELECT * FROM om_admin WHERE username =:username ";
$parameters = array();
$parameters[":username"]=$_GET["username"];
$stmt = $dbConn->prepare($sql);
$stmt->execute($parameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($record);
?>