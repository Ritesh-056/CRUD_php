<?php

    //get user id from the url
     $id = $_GET['id'];


     //creating and defining the variable for database connection
     $host ='localhost';
     $db = 'crud';
     $user='root';
     $pass = '';
      

     //making an object of PDO class
     $dsn  ="mysql:host=$host;dbname=$db";
     $pdo  = new PDO($dsn,$user,$pass);
     

     //checking connection with the databse
     if(!$pdo){
          echo "Connection error!" ;
     }

     //make a query string 
    $query = "DELETE FROM teacher WHERE id =:id";

    //prepare statement for the query and add the row id you want to delete
    $st = $pdo->prepare($query);
    $st->bindParam(':id', $id);

    //execute the query
    $st->execute();


    //set location after execution to selection database table
    header('Location: select.php');

 
    
?>
