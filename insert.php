<?php 

     $id  = $_POST['id'];
     $fullname = $_POST['name'];
     $address = $_POST['address'];


     //creating and defining the variable for database connection

     $host = 'localhost';
     $db= 'crud';
     $user ='root';
     $pass = '';



     //making an object of PDO class
     $dsn = "mysql:host=$host;dbname=$db";
     $pdo = new PDO($dsn, $user, $pass);


     //checking connection with the database
     if(!$pdo){
     echo "Connection error!";
     return;
    }

    //make a query string
    $query = "INSERT INTO teacher VALUES(:id, :fullname, :address)";

    //prepare statement for the query
    $stat = $pdo->prepare($query);

    //bind the parameters to insert the data into the database
    $stat->bindParam(':id', $id);
    $stat->bindParam(':fullname', $fullname);
    $stat->bindParam(':address', $address);

    //execute the query
    $stat->execute();

    
//redirecting to the selection to see the updated data
header('Location: select.php');

?>