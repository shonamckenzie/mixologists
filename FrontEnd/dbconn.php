<?php


$username  = 'maker';
$password  = 'password';
$result = 0;
try {
    $dbconn = new PDO('mysql:host=localhost;dbname=awesomecocktails', $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
