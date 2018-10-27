<html><head>
        <title> Winter Vacation Planner</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <style>
        	@import url("css/styles.css");
        </style>
    </head>
    <body>

        <div class="jumbotron">
            <h1> Winter Vacation Planner ! </h1>
        </div>
        <div id="wrapper"><form>Select Month:&nbsp;<select name="month"><option value="">Select</option><option>November</option><option>December</option><option>January</option><option>February</option></select><a title="There are 4 months listed, from November to February. No month selected by default." href="#" data-toggle="tooltip"><img width="15" src="info.png"></a><br><br>Number of locations:&nbsp;<input name="locationsNumber" id="l3" type="radio" value="3"><label for="l3">Three</label>&nbsp;<input name="locationsNumber" id="l4" type="radio" value="4"><label for="l4">Four</label>&nbsp;<input name="locationsNumber" id="l5" type="radio" value="5"><label for="l5">Five</label><a title="No number selected by default." href="#" data-toggle="tooltip"><img width="15" src="info.png"></a><br><br>Select Country:&nbsp;<select name="country"><option>USA</option><option>Mexico</option><option>France</option></select><a title="USA is selected by default." href="#" data-toggle="tooltip"><img width="15" src="info.png"></a><br><br>Visit locations in alphabetical order:&nbsp;<input name="order" id="order_asc" type="radio" value="asc"><label for="order_asc">A-Z</label>&nbsp;<input name="order" id="order_desc" type="radio" value="desc"><label for="order_desc">Z-A</label>&nbsp;<a title="Users can leave it blank. If checked, the random locations should be ordered alphabetically" href="#" data-toggle="tooltip"><img width="15" src="info.png"></a><br><br><input type="submit" value="Create Itinerary"><a title="Errors displayed if no month and number of locations submitted." href="#" data-toggle="tooltip"><img width="15" src="info.png"></a></form></div>

                <script src="js/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    


</body></html>