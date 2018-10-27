<?php
// mysql://b65b0e9c588f70:c4800ffe@us-cdbr-iron-east-01.cleardb.net/heroku_178dfb6517b4b02?reconnect=true

/*
function getDatabaseConnection($dbname = 'ottermart'){
    
    
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
*/

function getDatabaseConnection($dbname = 'heroku_178dfb6517b4b02'){
    
    
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $username = 'b65b0e9c588f70';
    $password = 'c4800ffe';
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}


?>