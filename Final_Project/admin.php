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

<?php
    
    session_start();
    if(!isset($_SESSION['adminName'])){
        header("Location:login.php");
    }
    
include 'dbConnection.php';

?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete the animal?");
    }
</script>
<!---
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Animal Store</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin<span class="sr-only">(current)</span></a>
          </li>
          <?php
            if(isset($_SESSION['adminName'])){
                echo '<li class="nav-item"><a class="nav-link" href="logout.php" style ="color: red;">Logout</a></li>';
            }
          ?>
        </ul>
      </div>
    </nav>
--->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Animal Store</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Search</a></li>
      <li class="active"><a href="admin.php">Admin</a></li>
      <?php if(isset($_SESSION['adminName'])){ echo '<li><a href="logout.php" style ="color: red;">Logout</a></li>';}?>
    </ul>
  </div>
</nav>
        <div class="jumbotron">
          <h2>Admin Page</h2>
          <h3>You are logged in as <strong><?php echo $_SESSION['adminName']; ?></strong></h3>
        </div>
<body>
    <main>


<?php
$conn= startConnection("heroku_178dfb6517b4b02");
?>

<input type ="submit" class = 'btn btn-secondary report' id = "report1" name = "report1" value = "Report Total">
<input type ="submit" class = 'btn btn-secondary report' id = "report2" name = "report2" value = "Report Categories">
<input type ="submit" class = 'btn btn-secondary report' id = "report3" name = "report3" value = "Report Sizes">

<hr>



<form action="addAnimal.php">
    <input type ="submit" class = 'btn btn-secondary' id = "beginning" name ="addanimal" value = "Add Animal"/>
</form>









<?php

    
    function displayAllAnimals() {
        global $conn;
        $sql ="SELECT * FROM final_animals LEFT JOIN final_size ON final_animals.sizeId = final_size.sizeId LEFT JOIN final_category ON final_animals.catId = final_category.catId ORDER BY animalId ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }

$records= displayAllAnimals();
echo "<table class = 'table table-hover' id = 'animalTable'>";
echo "<thead>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Name</th>
            <th scope='col'>Description</th>
            <th scope='col'>Category</th>
            <th scope='col'>Size</th>
            <th scope='col'>Price</th>
            <th scope='col'>Response</th>
            <th scope='col'>Update</th>
            <th scope='col'>Remove</th>
        </tr>
        <thead>";
echo "<tbody>";
foreach($records as $record) {
    echo "<tr>";
        echo "<td>" .$record['animalId']."</td>";
        echo "<td>" .$record['animalName']."</td>";
        echo "<td>" .$record['animalDescription']."</td>";
        echo "<td>" .$record['catName']."</td>";
        echo "<td>" .$record['sizeName']."</td>";
        echo "<td>$" .$record['price']."</td>";
        echo "<td>" .$record['responseId']."</td>";
        echo "<td><a class='btn btn-primary' href='updateAnimal.php?animalId=".$record['animalId']."'>Update</a></td>";
        
        echo "<form action='deleteAnimal.php' onsubmit='return confirmDelete()'>";
        echo "<input type='hidden' name='animalId' value= '". $record['animalId'] . "' />";
        echo "<td><input type='submit' class = 'btn btn-danger' value='Remove'></td>";
        echo "</form>";
}
echo "</tbody>";
echo "</table>";
?>




    <script>
	      $('document').ready(function() {
	          $('.report').click(function() {
	              $("#container").html("<img src='img/loading.gif' />");
	              
	              $('#reportModal').modal("show");
	              $.ajax({

                    type: "GET",
                    url: "api/getReport.php",
                    dataType: "json",
                    data: { "report": $(this).attr('id') },
                    success: function(data, status) {
                        
                        if (data.a_count !== undefined && data.a_count != '0')
                        {
                            $("#report").html('<h4>There are ' + data.a_count + ' animals in the table, with an average price of $' + data.a_price.substring(0, data.a_price.length - 2) + '.</h4>');
                        }
                        else if (data[0].catId !== undefined){
                            $("#report").html('<table id = "reportTable" class = "table table-hover"></table>')
                            
                            $("#reportTable").append('<tr><th>Category</th><th>Count</th><th>Average Price</th></tr>');
                            for (var i in data){
                                $("#reportTable").append('<tr><td>' + data[i].catName + '</td><td>' + data[i].a_count + '</td><td>$' + data[i].a_price.substring(0, data[i].a_price.length - 2) + '</td></tr>')
                            }
                        }
                        else if (data[0].sizeId !== undefined){
                            $("#report").html('<table id = "reportTable" class = "table table-hover"></table>')
                            
                            $("#reportTable").append('<tr><th>Size</th><th>Count</th><th>Average Price</th></tr>');
                            for (var i in data){
                                $("#reportTable").append('<tr><td>' + data[i].sizeName + '</td><td>' + data[i].a_count + '</td><td>$' + data[i].a_price.substring(0, data[i].a_price.length - 2) + '</td></tr>')
                            }
                        }
                        
                        
                        
                        
                        
                        $("#container").html("");
                        
                       
                        
                    
                    },
	          }); // ajax closing
	          
	          }); // click
	          
	      }); // doc end
	</script>
	<!-- Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="unused"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div id="container"></div>
            <div>
    	      <div id="report"></div>
    	      </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</main>
</body>

</html>
