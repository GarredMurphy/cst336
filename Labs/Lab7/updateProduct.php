<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<form action="admin.php">
    <input type ="submit" class = 'btn btn-secondary' id = "beginning" value = "Admin"/>
</form>

<?php

include 'dbConnection.php';
$conn = getDatabaseConnection('heroku_178dfb6517b4b02');

function getProductInfo()
{
    global $conn;
    $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $record;
}

function displayCategories($catId) {
    global $conn;
    $sql="SELECT catId, catName FROM om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record) {
        echo "<option ";
        echo ($record["catId"] == $catId)? "selected": "";
        echo " value='".$record["catId"]."'>". $record["catName"]."</option>";
    }
}

if (isset($_GET['updateProduct'])) {
    $sql = "UPDATE om_product 
        SET productName = :productName,
            productDescription = :productDescription,
            productImage = :productImage,
            price = :price,
            catId = :catId
        WHERE productId = :productId";
        
    $namedParameters = array();
    $namedParameters[':productName'] = $_GET['productName'];
    $namedParameters[':productDescription'] = $_GET['description'];
    $namedParameters[':productImage'] = $_GET['productImage'];
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':catId'] = $_GET['catId'];
    $namedParameters['productId'] = $_GET['productId'];
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    echo "Product has been updated";
}


if (isset($_GET['productId'])) {
    $product = getProductInfo();
}
?>
<form>
    <input type="hidden" name = "productId" value= "<?=$product['productId']?>"/>
    <strong>Product name</strong> <input type="text" class="form-control" value= "<?=$product['productName']?>" name="productName"/><br>
    <strong>Description</strong> <textarea name ="description" class="form-control" cols =50 rows = 4><?=$product['productDescription']?></textarea><br>
    <strong>Price</strong> <input type="text" class="form-control" name="price" value= "<?=$product['price']?>"/><br>
    <strong>Category</strong> <select name ="catId" class = "form-control">
        <option value = "">Select One</option>
        <?php displayCategories($product['catId']); ?>
    </select> <br />
    <strong>Set Image URL</strong> <input type = "text" name = "productImage" class="form-control" value = "<?=$product['productImage']?>"><br>
    <input type = "submit" name = "updateProduct" class= 'btn btn-primary' value="Update Product">
</form>
</html>