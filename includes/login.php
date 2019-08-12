<?php include "db.php" ?>
<?php session_start(); ?>
<?php 
 if(isset($_POST['login'])) {
$username = $_POST['username'];
$password = $_POST['password'];
     
 $username = mysqli_real_escape_string($connection, $username);    
 $password = mysqli_real_escape_string($connection, $password);  
     
     $query = "SELECT * FROM users WHERE userName = '{$username}'";
     $selectUser = mysqli_query($connection, $query);
     
     while($row = mysqli_fetch_array($selectUser)) {
         $db_user_id = $row['userId'];
         $db_user_name = $row['userName'];
         $db_user_password = $row['userPassword'];
         $db_user_firstname = $row['userFirstname'];
         $db_user_lastname = $row['userLastname'];
         $db_user_role = $row['userRole'];
     }
     
     if( $username === $db_user_name && $password === $db_user_password ) {
         $_SESSION['username'] = $db_user_name;
         $_SESSION['firstname'] = $db_user_firstname;
         $_SESSION['lastname'] = $db_user_lastname;
         $_SESSION['user_role'] = $db_user_role;
         
         header("Location: ../admin");
        
     } else if( $username == $db_user_name && $password == $db_user_password ) {
         
          header("Location: ../index.php");
         
         
     } else{
          header("Location: ../index.php");
     }
     
     
     
     
 }




?>