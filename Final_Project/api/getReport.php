<?php

include '../dbConnection.php';
$dbConn = startConnection("heroku_178dfb6517b4b02");




if ($_GET['report'] == "report1")
{
    $sql ="SELECT COUNT(animalId) a_count, AVG(price) a_price FROM final_animals";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

    //print_r($record);
    echo json_encode($record);
}
if ($_GET['report'] == "report2")
{
    $sql ="SELECT final_animals.catId, catName, COUNT(final_animals.catId) a_count, AVG(price) a_price FROM final_animals LEFT JOIN final_category ON final_animals.catId = final_category.catId GROUP BY final_animals.catId ";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //print_r($record);
    echo json_encode($records);
}
if ($_GET['report'] == "report3")
{
    $sql ="SELECT final_animals.sizeId, sizeName, COUNT(final_animals.sizeId) a_count, AVG(price) a_price FROM final_animals LEFT JOIN final_size ON final_animals.sizeId = final_size.sizeId GROUP BY final_animals.sizeId ";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //print_r($record);
    echo json_encode($records);
}





?>