<!DOCTYPE html>
<html>
    <?php session_start();
        if(isset($_SESSION['adminName'])){
        header("Location:admin.php");
    }
    ?>
    <head>
        <title> Admin Login </title>
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
          <h2>Login Page</h2>
        </div>
            <body>
                <main>
        <form method="post" action="loginProcess.php">
          Username:  <input type="text" name="username"/> <br>
          Password:  <input type="password" name="password"/> <br>
          <input type="submit" class = 'btn btn-primary' name="submitForm" value="Login!">
        <br />
        <?php
        if ($_SESSION['incorrect']){
            echo "<p class = 'lead' id = 'error' style='color:red'";
            echo "<strong>Incorrect Username or Password!</strong></p>";
        }
        ?>
        </form>
    </main></body>
</html>