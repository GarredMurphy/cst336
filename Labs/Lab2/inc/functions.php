<?php
function play() {
    for($i=1; $i<4; $i++) {
        ${"random".$i} = rand(0,4);
        display(${"random".$i}, $i);
    }
    points($random1, $random2, $random3);
}

function display($random, $pos)
{
    switch ($random)
    {
        case 0: $symbol = seven;
        break;
        case 1: $symbol = cherry;
        break;
        case 2: $symbol = lemon;
        break;
        case 3: $symbol = grapes;
        break;
    }
    echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' width='70' />";
}

function points($random1, $random2, $random3)
{
    echo "<div id='output'>";
    if ($random1 == $random2 && $random2 == $random3)
    {
        switch ($random1){
            case 0: $total = 1000;
            echo "<h1>Jackpot!</h1>";
            break;
            case 1: $total = 500;
            break;
            case 2: $total = 250;
            break;
            case 3: $total = 900;
            break;
        }
        echo "<h2>You won $total points!</h2>";
    }
    else
    {
        echo "<h3> Try Again! </h3>";
    }
    echo "</div>";
}
?>