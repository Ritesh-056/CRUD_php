<?php
   
   //get the user data id to update the user data
   $id = $_GET['id'];



   //creating and defining the variable for database connection
   $host ='localhost';
   $db = 'crud';
   $user='root';
   $pass = '';
    

     //making an object of PDO class
   $dsn  ="mysql:host=$host;dbname=$db";
   $pdo  = new PDO($dsn,$user,$pass);
   

   //checking connection with the database
   if(!$pdo){
        echo "Connection error!" ;
   }


    //make a query string
    $query = "SELECT * FROM teacher WHERE id =:id";


    //make a statement for the query and bind the paramaters

    $st = $pdo->prepare($query);
    $st->bindParam(':id', $id);


    //execute the query for fetching the data 
    $st->execute();


    //fetch the data using row variable 
    $row = $st->fetch();
?>




 <!-- create a html form for the user input for updating the data -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert into Database</title>
</head>
<body>
    
   <h2> Teacher Form </h2>

    <form method ="post"  name="form" action="update.php" onsubmit="return checkUserValidation()">
       <table>
           <tr hidden="true">
               <td> Id </td>
               <td><input type="text" name="id"  value="<?php echo $row['id'];?>" /></td>
           </tr>

           <tr> 
               <td> Name</td>
               <td> <input type="text" name="name"  value="<?php echo $row['fullname'];?>"/></td>
        </tr>

        <tr>
            <td>Address </td>
            <td><input type="text" name="address"value="<?php echo $row['address']; ?>"/></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td> <input type="submit" value="save"/></td>
        </tr>
       </table>
    </form>


<script type = "text/javascript">

function  checkUserValidation(){
  
  var userName = document.form.name.value ;
  var userAddress = document.form.address.value ;


  if(userName ==""){
      alert("Insert name");
      document.form.name.focus();
      return false;
  }

  if(userAddress ==""){
      alert("Insert address");
      document.form.address.focus();
      return false;
  }

  return true;
}


</script>
</body>
</html>

