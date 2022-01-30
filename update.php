<?php


   // get the user input for updaing the data 
   
   $id = $_POST['id'];  //here id is not assign by the user but programmatically it is assign by the program.
   $fullname = $_POST['name'];
   $address= $_POST['address'];


   //creating and defining the variables for database connection
   $host ='localhost';
   $db = 'crud';
   $user='root';
   $pass = '';
    

   // make a object of PDO class
   $dsn  ="mysql:host=$host;dbname=$db";
   $pdo  = new PDO($dsn,$user,$pass);
   

   //checking connection with the databse
   if(!$pdo){
        echo "Connection error!" ;
   }

   //make a query for updating the data 

   $query = "UPDATE teacher SET fullname = :fullname, address = :address WHERE id = :id";

    //prepare statement for the query and add the row id and parameters you want to update
    $st = $pdo->prepare($query);
    $st->bindParam(':id', $id); 
    $st->bindParam(':fullname', $fullname);
    $st->bindParam(':address', $address);


    //execute the query
    $st->execute();


    //redirecting to the selection to see the updated data
    header('Location: select.php');
?>

