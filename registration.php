<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navbar.php"; ?>
    
<?php
   if(isset($_POST['submit'])) {
       $username = $_POST['username'];
       $email    = $_POST['email'];
       $password = $_POST['password'];  
       
       $username = mysqli_real_escape_string($connection, $username);
       $email    = mysqli_real_escape_string($connection, $email);
       $password = mysqli_real_escape_string($connection, $password);
   }





?>
    
    
    
    
    
 
    <!-- Page Content -->
    
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Id">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
