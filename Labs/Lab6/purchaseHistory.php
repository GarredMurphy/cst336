<?php

include 'dbConnection.php';
$conn = getDatabaseConnection("heroku_178dfb6517b4b02");



$productId = $_GET['productId'];

$sql = "SELECT * FROM om_purchase NATURAL RIGHT JOIN om_product WHERE productId = $productId";

$np = array();
$np[":pId"] = $productId;

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
echo $records[0]['productName'] . "<br/>";
echo "<img src='" . $records[0]['productImage'] . "' width='200'/><br/>";


if (empty($records[0]['purchaseId'])) {
        
        echo "Not purchased";
        
    } else {
foreach ($records as $record) {
    echo "Purchase Date: " . $record["purchaseDate"] . "<br/>";
    echo "Unit Price: " . $record["unitPrice"] . "<br/>";
    echo "Quantity: " . $record["quantity"] . "<br/>";
}
}

?>