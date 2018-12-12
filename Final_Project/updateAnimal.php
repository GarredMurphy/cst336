<?php
    session_start();
    if(!isset($_SESSION['adminName'])){
        header("Location:login.php");
    }
?>
<html>
<head>
    <!---
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
    --->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Animal Store</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Search</a></li>
      <li><a href="admin.php">Admin</a></li>
      <?php if(isset($_SESSION['adminName'])){ echo '<li><a href="logout.php" style ="color: red;">Logout</a></li>';}?>
    </ul>
  </div>
</nav>
        <div class="jumbotron">
          <h2>Update Animal</h2>
        </div>
    <body><main>
<?php



include 'dbConnection.php';
$conn = startConnection('heroku_178dfb6517b4b02');

function getAnimalInfo()
{
    global $conn;
    $namedParameters[":animalId"] = $_GET['animalId'];
    $sql = "SELECT * FROM final_animals WHERE animalId = :animalId";
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $record;
}

function displayCategories($catId) {
    global $conn;
    $sql="SELECT catId, catName FROM final_category ORDER BY catId";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record) {
        echo "<option ";
        echo ($record["catId"] == $catId)? "selected": "";
        echo " value='".$record["catId"]."'>". $record["catName"]."</option>";
    }
}

function displaySizes($sizeId) {
    global $conn;
    $sql="SELECT sizeId, sizeName FROM final_size ORDER BY sizeId";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record) {
        echo "<option ";
        echo ($record["sizeId"] == $sizeId)? "selected": "";
        echo " value='".$record["sizeId"]."'>". $record["sizeName"]."</option>";
    }
}

function displayResponses($responseId) {
    global $conn;
    $sql="SELECT responseId, responseName FROM final_response ORDER BY responseId";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record) {
        echo "<option ";
        echo ($record["responseId"] == $responseId)? "selected": "";
        echo " value='".$record["responseId"]."'>". $record["responseName"]."</option>";
    }
}


if (isset($_GET['updateAnimal'])) {
    $sql = "UPDATE final_animals 
        SET animalName = :animalName,
            animalDescription = :animalDescription,
            price = :price,
            catId = :catId,
            sizeId = :sizeId,
            responseId = :responseId
        WHERE animalId = :animalId";
        
    $namedParameters = array();
    $namedParameters[':animalName'] = $_GET['animalName'];
    $namedParameters[':animalDescription'] = $_GET['description'];
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':catId'] = $_GET['catId'];
    $namedParameters[':sizeId'] = $_GET['sizeId'];
    $namedParameters[':responseId'] = $_GET['responseId'];
    $namedParameters['animalId'] = $_GET['animalId'];
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    echo "Animal has been updated";
}


if (isset($_GET['animalId'])) {
    $animal = getAnimalInfo();
}
?>
<form>
    <input type="hidden" name = "animalId" value= "<?=$animal['animalId']?>"/>
    <strong>Animal name</strong> <input type="text" class="form-control" value= "<?=$animal['animalName']?>" name="animalName" required/><br>
    <strong>Description</strong> <textarea name ="description" class="form-control" cols =50 rows = 4 required><?=$animal['animalDescription']?></textarea><br>
    <strong>Price</strong> <input type="number" class="form-control" name="price" value= "<?=$animal['price']?>" min = "0" required/><br>
    <strong>Category</strong> <select name ="catId" class = "form-control">
        <?php displayCategories($animal['catId']); ?>
    </select> <br />
    <strong>Size</strong> <select name ="sizeId" class = "form-control">
        <?php displaySizes($animal['sizeId']); ?>
    </select> <br />
    <strong>Response</strong> <select name ="responseId" class = "form-control">
        <?php displayResponses($animal['responseId']); ?>
    </select> <br />
    <input type = "submit" name = "updateAnimal" class= 'btn btn-primary' value="Update Animal">
</form>
    </main></body>
</html>