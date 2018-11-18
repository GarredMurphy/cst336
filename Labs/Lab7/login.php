<!DOCTYPE html>
<html>
    <?php session_start(); ?>
    <head>
        <title> Admin Login </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    </head>
    <body>

        <h1> Ottermart - Admin Login </h1>
        
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
    </body>
</html>