<html>
    <body>
        <main>
            <ul>
            <?php
            function yearList($startYear, $endYear, $rows, $cols)
            {
                echo "<table>";
                
                $sum = 0;
                
                $col = 1;
                
                for ($i = $startYear; $i <= $endYear; $i++)
                {
                    if ($i % 4 == 0)
                    {
                    echo "<td>year " . $i;
                    
                    if ($i == 1776)
                    {
                        echo "<strong> USA Independace!</strong>";
                    }
                    if ($i % 100 == 0)
                    {
                        echo "<strong> Happy New Century</strong>";
                    }
                    

                    
                    
                
                    echo "</rd>";
                    switch (($i + 8) % 12)
                    {   
                        case 0:
                        echo "<img src = 'img/rat.png' >";
                        break;
                        case 1:
                        echo "<img src = 'img/ox.png' >";
                        break;
                        case 2:
                        echo "<img src = 'img/tiger.png' >";
                        break;
                        case 3:
                        echo "<img src = 'img/rabbit.png' >";
                        break;
                        case 4:
                        echo "<img src = 'img/dragon.png' >";
                        break;
                        case 5:
                        echo "<img src = 'img/snake.png' >";
                        break;
                        case 6:
                        echo "<img src = 'img/horse.png' >";
                        break;
                        case 7:
                        echo "<img src = 'img/goat.png' >";
                        break;
                        case 8:
                        echo "<img src = 'img/monkey.png' >";
                        break;
                        case 9:
                        echo "<img src = 'img/rooster.png' >";
                        break;
                        case 10:
                        echo "<img src = 'img/dog.png' >";
                        break;
                        case 11:
                        echo "<img src = 'img/pig.png' >";
                        break;
                        
                        //"rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig"


                    }
                    echo "</table>";
                    
                    $sum = $sum + $i;
                    
                }
                }
               return $sum;
            }
            
            
            
            $sum = yearList($_GET["startYear"], $_GET["endYear"], $_GET["rows"], $_GET["cols"]);
            echo "<h1>" . $sum . "</h1>";
            
            
            ?>
            
            <form>
                Start:<br>
                  <input type="number" name="startYear"><br>
                End:<br>
                  <input type="number" name="endYear">
                  <br>
                <input type="submit" value="Submit">
                <br>
                Rows:<br>
                  <input type="number" name="rows"><br>
                Cols:<br>
                  <input type="number" name="cols">
            </form>
            </ul>
        </main>
    </body>
</html>