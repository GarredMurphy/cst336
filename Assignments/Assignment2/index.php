<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8"/>
        <title>Power Rangers Random Generator</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
    </head>
    
    <body>
        <header>
            <h1>Garred Murphy</h1>
            <h2>Power Rangers Random Generator</h2>
            <h3>I didn't have time to completely finish the styles, but the random color generator mostly works the way it is supposed to.  I wanted it to change the background colors based on the selection.</h3>
            
        </header>
        
        <main>
        
        <?php
        $coreSize = 1 + 2 * rand(1, 4);
        $possibleCoreColors = array("blue", "green", "pink", "black", "white", "yellow", "orange", "gold", "silver");
        //shuffle($possibleCoreColors);
        $extraSize = rand(0, 3);
        $possibleExtraColors = array("black", "white", "gold", "silver", "grey", "cyan", "crimson", "navy", "green", "orange", "violet");
        shuffle($possibleExtraColors);

        $selectedCore = array();
        $selectedCore[0] = "red";
        
        for ($i = 1; $i <= $coreSize; $i++)
        {
        switch ($coreSize)
        {
            case 3:
                $selectedCore[1] = "yellow";
                $selectedCore[2] = "blue";
                break;
            case 5:
                $newColorNumber = rand(0, 6 - $i);
                $selectedCore[$i] = $possibleCoreColors[$newColorNumber];
                unset($possibleCoreColors[$newColorNumber]);
                $possibleCoreColors = array_values($possibleCoreColors);
                break;
            case 7:
                $newColorNumber = rand(0, 7 - $i);
                $selectedCore[$i] = $possibleCoreColors[$newColorNumber];
                unset($possibleCoreColors[$newColorNumber]);
                $possibleCoreColors = array_values($possibleCoreColors);
                break;
            case 9:
            
                $newColorNumber = rand(0, 9 - $i);
                $selectedCore[$i] = $possibleCoreColors[$newColorNumber];
                unset($possibleCoreColors[$newColorNumber]);
                $possibleCoreColors = array_values($possibleCoreColors);
                break;
            default:
                //error!
                break;
        }
        }
        
        $selectedExtra = array();
        for ($i = 0; $i < $extraSize; $i++)
        {
            $newColorNumber = rand(0, 12 - $i);
            
            if (array_search($possibleExtraColors[$newColorNumber], $selectedCore) != FALSE || $possibleExtraColors[$newColorNumber] == "red")
            {
                $selectedExtra[$i] = $possibleExtraColors[$newColorNumber];
                unset($possibleExtraColors[$newColorNumber]);
                $possibleExtraColors = array_values($possibleExtraColors);
            }
            else {
                $selectedExtra[$i] = "red";
            }
        }
        
        
        echo '<table id = "core"><tr>';
        for ($i = 0; $i < $coreSize; $i++)
        {
            echo '<td class ="'.$selectedCore[$i].'" >'. $selectedCore[$i] .'</td>';
        }
        echo "</tr></table>";
        
        echo '<table id = "extra"><tr>';
        for ($i = 0; $i < $extraSize; $i++)
        {
            echo '<td class ="'.$selectedExtra[$i].'" >'. $selectedExtra[$i] .'</td>';
        }
        echo "</tr></table>";
        

        
        ?>
        
        
        <figure>
                <img src="img/Mmpr-green.png" alt="green" />
                <img src="img/Mmpr-white.png" alt="white" />
           </figure>
</main>
        
        <footer>
            <hr>
            <figure>
                <img src="img/csumblogo.jpg" alt="CSUMB logo" />
                <!--<img src="img/buddy_verified.png" alt="buddy verified" />-->
            </figure>
            CST336 Internet Programing. 2018&copy; Garred Murphy <br />
            <strong>Disclaimer:</strong> The information in this website is fictitious.
            <br /> It is used for accademic purposes only
        </footer>
        
    </body>
</html>