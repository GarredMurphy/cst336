<?php
include 'dbConnection.php';
$conn = getDatabaseConnection('heroku_178dfb6517b4b02');

$sql = "DELETE FROM om_product WHERE productId = " . $_GET['productId'];
$statement = $conn->prepare($sql);
$statement->execute();

header("Location: admin.php");

?>