<?php

  require_once('dbconn.php');

  $cocktailname = trim($_POST["cocktailname"]);
  $containsalcohol = trim($_POST["containsalcohol"]);
  $fullingredients = trim($_POST["fullingredients"]);
  $preparation = trim($_POST["preparation"]);

    $stmt = $dbconn->prepare("INSERT INTO cocktails(cocktailname, containsalcohol, fullingredients, preparation)
    VALUES (:cocktailname, :containsalcohol, :fullingredients, :preparation)");
    $stmt->bindParam(':cocktailname', $cocktailname);
    $stmt->bindParam(':containsalcohol', $containsalcohol);
    $stmt->bindParam(':fullingredients', $fullingredients);
    $stmt->bindParam(':preparation', $preparation);
 
    if($stmt->execute()){
      $result =1;
    }

    echo $result;
    $dbconn = null;

