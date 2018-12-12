<?php
    include 'dbConnection.php';
    $dbConn = startConnection("heroku_178dfb6517b4b02");
    
    // used to display categories for dropdown
    function displayCategories($catId) { 
        global $dbConn;
        
        $sql = "SELECT * FROM final_category ORDER BY catName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record) {
            echo "<option ";
            echo ($record["catId"] == $catId)? "selected": "";
            echo " value='".$record["catId"]."'>". $record["catName"]."</option>";
        }
    }
    
    function displaySizes($sizeId) { 
        global $dbConn;
        
        $sql = "SELECT * FROM final_size ORDER BY sizeId";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record) {
            echo "<option ";
            echo ($record["sizeId"] == $sizeId)? "selected": "";
            echo " value='".$record["sizeId"]."'>". $record["sizeName"]."</option>";
        }
    }

    function filterAnimals() {
        global $dbConn;
        
        $namedParameters = array();
        $keyword = $_GET['keyword'];
      
        $sql = "SELECT * FROM final_animals LEFT JOIN final_size ON final_animals.sizeId = final_size.sizeId LEFT JOIN final_category ON final_animals.catId = final_category.catId WHERE 1"; //Gettting all records from database
        
        if (!empty($keyword)){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND (animalName LIKE :keyword OR animalDescription LIKE :keyword)";
             $namedParameters[':keyword'] = "%$keyword%";
        }
        
        if (!empty($_GET['category'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND final_animals.catId =  :category";
             $namedParameters[':category'] = $_GET['category'] ;
        }
        
        if (!empty($_GET['size'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND final_animals.sizeId =  :size";
             $namedParameters[':size'] = $_GET['size'] ;
        }
        
        if (!empty($_GET['priceFrom'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND price >=  :priceFrom";
              $namedParameters[':priceFrom'] = $_GET['priceFrom'] ;
        }
        
        if (!empty($_GET['priceTo'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND price <=  :priceTo";
              $namedParameters[':priceTo'] = $_GET['priceTo'] ;
        }
        
        
        if (isset($_GET['orderBy'])) {
        if ($_GET['orderBy'] == "low-high") {
            $sql .= " ORDER BY price ASC";
        }else if($_GET['orderBy'] == "high-low"){
            $sql .= " ORDER BY price DESC";
        }else if($_GET['orderBy'] == "az"){
            $sql .= " ORDER BY animalName ASC";
        }else if($_GET['orderBy'] == "za"){
            $sql .= " ORDER BY animalName DESC";
        }
    }
    
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        //print_r($records);
        
        echo "<table class='table table-hover' id = 'animalTable'><thead><tr><th>Name</th><th>Description</th><th>Category</th><th>Size</th><th>Price</th><th>Purchase</th></tr></thead><tbody>";
        foreach ($records as $record) {
            
            echo "<tr>";
            echo "<td>".$record['animalName']."</td>";
            
            
            echo "<td>" . $record['animalDescription']. "</td>";
            
            echo "<td>" . $record['catName']. "</td>";
            echo "<td>" . $record['sizeName']. "</td>";
            
            echo "<td>Price: $" .$record['price']. "</td>";
            
            
            echo "<td><button class='btn btn-warning purchase-button' value = '". $record['responseId'] ."'>Purchase</button></td>";
            
            
            echo "</tr>";
            
        }
        
        echo "</tbody></table>";
    }
?>