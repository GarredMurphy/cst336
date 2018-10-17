<html>
        <head>

        <meta charset="utf-8"/>
        <title>Garred Murphy: Forms and functions</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <header>
            <h1>Forms and Functions</h1>
        </header>
        
        
        
        <main>
            
            
            
            <?php
            
            $errors = 0;
            
            echo "<div id = 'errors'>";
            if (!isset($_GET["text"]))
            {
                echo "<div id = 'error1a'>string is unset</div>";
                $errors++;
            }
            
            if ($_GET["text"] == "")
            {
                echo "<div id = 'error1b'>string is blank</div>";
                $errors++;
            }
            
            if (!isset($_GET["number"]))
            {
                echo "<div id = 'error2a'>number is unset</div>";
                $errors++;
            }
            
            if ($_GET["number"] < 1 )
            {
                echo "<div id = 'error2b'>number is invalid</div>";
                $errors++;
            }
            
            if (!isset($_GET["function"]))
            {
                echo "<div id = 'error3'>function is unset</div>";
                $errors++;
            }
            
            if ($_GET["function"] == "explode" && $_GET["delimiter"] == "")
            {
                echo "<div id = 'error4'>a delimiter is required when using explode</div>";
                $errors++;
            }
            
            if ($_GET["presentation"] == "")
            {
                echo "<div id = 'error5'>presentation is blank</div>";
                $errors++;
            }
            
            
            echo "</div>";
            
            echo "<div id ='output'>";
            
            if ($errors == 0)
            {
                
                $string = $_GET["text"];
                $number = $_GET["number"];
                

                
                if ($_GET["function"] == "explode")
                {
                    
                    $explodedString = explode($_GET["delimiter"], $string, $number);
                    
                    
                    if ($_GET["presentation"] == "div")
                    {
                        echo '<div id = "resultDiv">';
                        for ($i = 0; $i < sizeof($explodedString); $i++)
                        {
                            echo '"'. $explodedString[$i] .'" ';
                        }
                        echo '</div>';
                    } else if ($_GET["presentation"] == "list")
                    {
                        echo '<ol>';
                        for ($i = 0; $i < sizeof($explodedString); $i++)
                        {
                            echo '<li>'. $explodedString[$i] .'</li>';
                        }
                        echo '</ol>';
                    } else if ($_GET["presentation"] == "table")
                    {
                        echo '<table><tr>';
                        for ($i = 0; $i < sizeof($explodedString); $i++)
                        {
                            echo '<td>'. $explodedString[$i] .'<td>';
                        }
                        echo '</tr></table>';
                    }
                    

                    
                } 
                else if ($_GET["function"] == "str_split")
                {
                    $stringSize = strlen($string) / $number;
                    
                    if (strlen($string) % $number != 0)
                    {
                        $stringSize++;
                    }
                    
                    $splitString = str_split($string, $stringSize);
                    
                    
                    if ($_GET["presentation"] == "div")
                    {
                        echo '<div id = "resultDiv">';
                        for ($i = 0; $i < sizeof($splitString); $i++)
                        {
                            echo '"'. $splitString[$i] .'" ';
                        }
                        echo '</div>';
                    } else if ($_GET["presentation"] == "list")
                    {
                        echo '<ol>';
                        for ($i = 0; $i < sizeof($splitString); $i++)
                        {
                            echo '<li>'. $splitString[$i] .'</li>';
                        }
                        echo '</ol>';
                    } else if ($_GET["presentation"] == "table")
                    {
                        echo '<table><tr>';
                        for ($i = 0; $i < sizeof($splitString); $i++)
                        {
                            echo '<td>'. $splitString[$i] .'<td>';
                        }
                        echo '</tr></table>';
                    }
                }
                else
                {
                    echo "something is very wrong if you are seeing this message";
                }
                
                
                
            
            echo "</div>";
                
            }
            
            ?>
            
            
            
            
            <form>
                Enter a string here:<br>
                <textarea name="text"><?php
                if (isset($_GET["text"]))
                {
                    echo $_GET["text"];
                }
                ?></textarea>
                

                <br>
                
                Enter the maximum number of divisions here: <br>
                <?php
                
                if (!isset($_GET["number"]) || $_GET["number"] == "")
                {
                    echo '<input type="number" name="number" min="1" step="1">';
                }
                else
                {
                    echo '<input type="number" name="number" min="1" step="1" value="' . $_GET["number"] . '">';
                }
                
                
                ?>
                
                
                
                
                <br>
                Choose the function you want to use:
                <br>
                <?php
                    if ($_GET["function"] == "explode")
                    {
                        echo '<input type="radio" name="function" value="explode" checked> explode<br>';
                    }
                    else
                    {
                        echo '<input type="radio" name="function" value="explode"> explode<br>';
                    }
                    if ($_GET["function"] == "str_split")
                    {
                        echo '<input type="radio" name="function" value="str_split" checked> str_split<br>';
                    }
                    else
                    {
                        echo '<input type="radio" name="function" value="str_split"> str_split<br>';
                    }
                ?>
                If using explode, enter a delimiter.
                <br>
                <input type = "text" name = "delimiter"
                
                <?php
                if (isset($_GET["delimiter"]))
                {
                    echo 'value = "'. $_GET["delimiter"] .'"';
                }
                ?>
                
                >
                <br>
                select presentation
                <br>
                <select name="presentation">
                 <option value=""></option>
                 
                 <?php
                 if ($_GET["presentation"] == "div")
                 {
                     echo ' <option value="div" selected> div </option>
                            <option value="list"> list </option>
                            <option value="table"> table </option>';
                 } else if ($_GET["presentation"] == "list")
                 {
                     echo ' <option value="div"> div </option>
                            <option value="list" selected> list </option>
                            <option value="table"> table </option>';
                 } else if ($_GET["presentation"] == "table")
                 {
                     echo ' <option value="div"> div </option>
                            <option value="list"> list </option>
                            <option value="table" selected> table </option>';
                 } else
                 {
                     echo ' <option value="div"> div </option>
                            <option value="list"> list </option>
                            <option value="table"> table </option>';
                 }
                 ?>
            </select>
                
                
                 <br>
                <input type="submit" value="Submit">
            </form>
            </ul>
        </main>
    </body>
</html>