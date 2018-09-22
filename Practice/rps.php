<!DOCTYPE html>
<html>

<head>
    <title>Garred Murphy and Patrick Breckinridge RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>

    <h1>Garred Murphy and Patrick Breckinridge <br /> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    
    
    <?php 
    


    
    $wins = 0;
    for($i = 0; $i < 3; $i ++)
    {
        $wins = $wins + printrow();
    
    
    }
    choosewinner($wins);
    
    function printrow()
    {
        $winner = rand(0,1);
        $symbol = rand(0,2);

        if ($symbol == 0)
        {
            if ($winner == 0)
            {
            $wins++;
            echo "    <div class='row'>
        <div class='col, matchWinner'><img src='rps/rock.png' alt='rock' width='150'></div>
        <div class='col'><img src='rps/scissors.png' alt='scissors' width='150'></div>
    </div>";
        }
        else {
            echo "<div class='row'>
        <div class='col'><img src='rps/rock.png' alt='rock' width='150'></div>
        <div class='col, matchWinner'><img src='rps/paper.png' alt='paper' width='150'></div>
    </div>";
        }
    }
    
       if ($symbol == 1)
    {
        if ($winner == 0)
        {
            $wins++;
            echo "    <div class='row'>
        <div class='col, matchWinner'><img src='rps/paper.png' alt='paper' width='150'></div>
        <div class='col'><img src='rps/rock.png' alt='rock' width='150'></div>
    </div>";
        }
        else {
            echo "<div class='row'>
        <div class='col'><img src='rps/paper.png' alt='paper' width='150'></div>
        <div class='col, matchWinner'><img src='rps/scissors.png' alt='scissors' width='150'></div>
    </div>";
        }
    }
    
           if ($symbol == 2)
    {
        if ($winner == 0)
        {
            $wins++;
            echo "    <div class='row'>
        <div class='col, matchWinner'><img src='rps/scissors.png' alt='scissors' width='150'></div>
        <div class='col'><img src='rps/paper.png' alt='paper' width='150'></div>
    </div>";
        }
        else {
            echo "<div class='row'>
        <div class='col'><img src='rps/scissors.png' alt='scissors' width='150'></div>
        <div class='col, matchWinner'><img src='rps/rock.png' alt='rock' width='150'></div>
    </div>";
        }
    }
    return $winner;
    }
    
    function choosewinner($wins)
    {
        if ($wins < 2)
    {
    echo "<div id='finalWinner'>

        <h1>The winner is Player 1</h1>

    </div>";
        
    }
    else
    {
        echo "<div id='finalWinner'>

        <h1>The winner is Player 2</h1>

    </div>";
    }
        
    }
    
    
    ?>
    
    

    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
</body>

</html>
