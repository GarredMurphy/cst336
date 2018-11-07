<?php

function startConnection($dbname = 'heroku_178dfb6517b4b02') {
    
    
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $username = 'b65b0e9c588f70';
    $password = 'c4800ffe';
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>