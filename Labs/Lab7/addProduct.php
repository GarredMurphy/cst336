<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<?php
include 'dbConnection.php';
$conn = getDatabaseConnection('heroku_178dfb6517b4b02');

function displayCategories() {
    global $conn;
    $sql="SELECT catId, catName FROM om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record) {
        echo "<option value='".$record["catId"]."'>". $record["catName"]."</option>";
    }
}

if (isset($_GET['submitProduct'])) {
    $productName = $_GET['productName'];
    $productDescription = $_GET['description'];
    $productImage = $_GET['productImage'];
    $productPrice = $_GET['price'];
    $catId = $_GET['catId'];
    
    $sql= "INSERT INTO om_product
            ( productName, productDescription, productImage, price, catId)
            VALUES (:productName, :productDescription, :productImage, :price, :catId)";
    
    $namedParameters = array();
     $namedParameters[':productName'] = $productName;
     $namedParameters[':productDescription'] = $productDescription;
     $namedParameters[':productImage'] = $productImage;
     $namedParameters[':price'] = $productPrice;
     $namedParameters[':catId'] = $catId;
     $statement = $conn->prepare($sql);
     $statement->execute($namedParameters);
}

?>

<form>
    <strong>Product name</strong> <input type="text" class="form-control" name="productName"/><br>
    <strong>Description</strong> <textarea name ="description" class="form-control" cols =50 rows = 4></textarea><br>
    <strong>Price</strong> <input type="number" class="form-control" name="price"/><br>
    <strong>Category</strong> <select name ="catId" class = "form-control">
        <option value = "">Select One</option>
        <?php displayCategories(); ?>
    </select> <br />
    <strong>Set Image URL</strong> <input type = "text" name = "productImage" class="form-control"><br>
    <input type = "submit" name = "submitProduct" class= 'btn btn-primary' value="Add Product">
</form>
</html>