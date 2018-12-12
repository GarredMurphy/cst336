<?php
    include 'functions.php';
    session_start();
?>

<!DOCTYPE html>
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
      <li class="active"><a href="index.php">Search</a></li>
      <li><a href="admin.php">Admin</a></li>
      <?php if(isset($_SESSION['adminName'])){ echo '<li><a href="logout.php" style ="color: red;">Logout</a></li>';}?>
    </ul>
  </div>
</nav>
        
        
        <div class="jumbotron">
          <h1>Animal Store</h1>
          <h2>Search Page</h2>
        </div>
        <body>
            <main>
<form action='index.php#theSearchResults'>
        Keyword: <input type="text" name="keyword" placeholder="keyword" class ="searchInputs form-control" value = "<?php echo $_GET['keyword'];?>"/>
        
        Category: 
        <select name="category" class ="searchInputs form-control">
           <option value=""> -Select one- </option>  
           <?=displayCategories($_GET['category'])?>
        </select>
        Size: 
        <select name="size" class ="searchInputs form-control">
           <option value="" class = "form-control"> -Select one- </option>  
           <?=displaySizes($_GET['size'])?>
        </select>
        Minimum Price: <input type="number" name="priceFrom" size="7" class ="searchInputs form-control" value = "<?php echo $_GET['priceFrom'];?>"/> 
        Maximum Price: <input type="number" name="priceTo" size="7" class ="searchInputs form-control" value = "<?php echo $_GET['priceTo'];?>"/>
        
        <?php
            function checkIfSelected($value){
                if ($value == $_GET['orderBy']){
                    echo "checked";
                }
            }
        ?>
        
        Order By: <br>
        <input type="radio" name="orderBy" value=""         <?php checkIfSelected('');         ?>/>  Off
        <input type="radio" name="orderBy" value="low-high" <?php checkIfSelected('low-high'); ?>/>  Price: low-high
        <input type="radio" name="orderBy" value="high-low" <?php checkIfSelected('high-low'); ?>/>  Price: high-low
        <input type="radio" name="orderBy" value="az"       <?php checkIfSelected('az');       ?>/>  Name: A-Z
        <input type="radio" name="orderBy" value="za"       <?php checkIfSelected('za');       ?>/>  Name: Z-A
        <br />
        <br />
        <input id='search' class = 'btn btn-info' type="submit" name="submit" value="Search!"/>
    </form>
    <br>
    <hr>
    
    <?php
        if($_GET['submit'] == "Search!") {
            echo "<h2 id = 'theSearchResults'>Search Results:</h2>";
            filterAnimals();
        }
    ?>
    </main>
</body>
    
    
    
    <script>
	      $('document').ready(function() {
	          $('.purchase-button').click(function() {
	              $("#container").html("<img src='img/loading.gif' />");
	              
	              $('#responseModal').modal("show");
	              $.ajax({

                    type: "GET",
                    url: "api/getResponse.php",
                    dataType: "json",
                    data: { "responseId": $(this).attr('value') },
                    success: function(data, status) {
                        $("#response").html(data.responseName);
                        $("#container").html("");
                        //alert(data); 
                       
                        
                    
                    },
	          }); // ajax closing
	          
	          }); // click
	          
	      }); // doc end
	</script>
	<!-- Modal -->
    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    	      <div id="response"></div>
    	      
    	      </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</html>