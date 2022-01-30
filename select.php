<?php

    //creating and defining the variables for database connection
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


     //make a query string to select the data records from the database
    $query = "SELECT * FROM teacher";



    //prepare statement for the query
    $statement = $pdo->prepare($query);


    //execute the query
    $statement->execute();


    //print the all the records using record variable executing fectAll func
    $records = $statement->fetchAll();

    // echo("<pre>");
    // print_r($records);===> this simply prints the array in the browser with the help of pre tag
 
?>


<!-- displaying the database content to html table -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select from database</title>
</head>
<body>
        <h2> Teacher List </h2>

        <table border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Actions </th>
            </tr>

             <?php foreach ($records as $row) {?>

             <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['address'];?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id'];?>">Delete</a>                    
                    |
                    <a href="updateForm.php?id=<?php echo $row['id']?>">Update</a>
                </td>
            </tr>

            <?php }?>
          
        </table>

             </br>
             </br>
             </br>
            <a href="insert.html">Add record to database</a>
</body>
</html>




