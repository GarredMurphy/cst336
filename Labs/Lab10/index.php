<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <!--
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        -->
        
        
        <style>
            body {
                text-align: center;
            }
            #carousel-example-generic {
                background-color: lightgrey;
            }
        </style>
   
    </head>
    <body>
        
<?php
include 'inc/header.php';
?>
        <!-- Display Carousel here -->
        
        <?php
        $images = ["bear", "lion", "otter", "tiger"];
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    for ($i=0; $i <count($images); $i++){
                        echo "<li data-target='#carousel-example-generic' data-slide-to = $i'";
                        echo ($i == 0)?" class = 'active'": "";
                        echo "></li>";
                    }
                    ?>
                </ol>
                
                <div class ="carousel-inner" role="listbox">
                <?php
                    for ($i = 0; $i < count($images); $i++) {
                        echo '<div class=" carousel-item ';
                        echo ($i == 0)?"active": "";
                        echo '">';
                        echo '<img src="img/' . $images[$i] . '.jpg" >';
                        echo "</div>";
                    }
                ?>
                </div>

                <a class="carousel-control-prev" href="#carousel-example-generic" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-generic" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        
        
        
        
        <a class="btn btn-outline-success" href="pets.php" role="button">Adopt Now</a>
        <br><br><br>
<?php
include 'inc/footer.php';
?>
        
        </body>

</html>