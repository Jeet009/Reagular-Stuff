<?php ob_start(); ?>
<?php
$connection = mysqli_connect('localhost','root','','cms_blog');

  if(isset($_POST['createUser'])) {
      $userFirstname = $_POST['userFirstname'];
      $userLastname = $_POST['userLastname'];
      $userName = $_POST['userName'];
      $userPassword = $_POST['userPassword'];
      $userEmail = $_POST['userEmail'];
      $userRole = $_POST['userRole'];
//      $postImage = $_FILES['image']['name'];
//      $postImageTemp = $_FILES['image']['tmp_name'];
      
      
//      $location = "../images/".$postImage;
//      move_uploaded_file($postImageTemp, $location);
      
      
$query = "INSERT INTO users (userFirstname, userLastname, userName, userPassword, userEmail, userRole) VALUES('{$userFirstname}','{$userLastname}','{$userName}','{$userPassword}','{$userEmail}','{$userRole}')";
      
      $addUserQuery = mysqli_query($connection, $query);
      if(!$addUserQuery){
          die("QUERY FAILED ." . mysqli_error($connection));
      }
      
     echo "<div class='alert alert-success' role='alert'> <h2 class='alert-heading'>User added!</h2>" . " " . "<a href='./users.php' style='color: black;'>View all users</a></div>"; 
      
  }

?>
                       <h1 class="page-header">
                            Write New Posts 
                            <small> ADMIN </small>
                        </h1>
  
  <form class="" method="post" enctype="multipart/form-data">
   
   <div class="form-group">
      <label for="userFirstname"> First Name </label>
      <input type="text" name="userFirstname" class="form-control">
   </div>
   <div class="form-group">
      <label for="userLastname"> Last Name </label>
      <input type="text" name="userLastname" class="form-control">
   </div>
   <div class="form-group">
      <label for="userName"> Username </label>
      <input type="text" name="userName" class="form-control">
   </div>
   <div class="form-group">
     <label for="userRole"> User Role </label>
     <select name="userRole" id="">
      <option> Select </option>
      <option> Admin </option>
      <option> Subscriber </option>
       </select>  
   </div>
   <div class="form-group">
      <label for="userEmail"> Email Id </label>
      <input type="email" name="userEmail" class="form-control">
   </div>
<!--
   <div class="form-group">
    <label for="postImage"> Choose Image </label>
    <input type="file" name="image" class="form-control-file" id="postImage">
    
   </div>
-->
   <div class="form-group">
      <label for="userPassword"> Password </label>
      <input type="password" name="userPassword" class="form-control">
   </div>

   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="createUser" value="Add User">
   </div>
    
</form>