<!DOCTYPE html>
<html>
    <head>
        
    </head>
    
    <?php
    
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * FROM mp_town WHERE population > 50000 AND population < 80000 ORDER BY population";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($records as $record)
    {
        echo $record['population'];
        echo "<br>";
    }
    
    echo "<br>";
    
    $sql = "SELECT * FROM mp_town ORDER BY population DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($records as $record)
    {
        echo $record['population'];
        echo "<br>";
    }
    
    echo "<br>";
    
    $sql = "SELECT * FROM mp_town ORDER BY population LIMIT 0,3";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($records as $record)
    {
        echo $record['population'];
        echo "<br>";
    }
    
    echo "<br>";
    
    $sql = "SELECT * FROM mp_county WHERE county_name LIKE 'S'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($records as $record)
    {
        echo $record['county_name'];
        echo "<br>";
    }


    ?>
    

    
    <body>
        
        
        
    </body>
</html>