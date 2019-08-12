<?php
$connection = mysqli_connect('localhost','root','','cms_blog');
if(!$connection)
{
    echo "DATABASE connection ERROR!";
}

?>                 
                       <h1 class="page-header">
                              All Users 
                            <small> _ADMIN </small>
                        </h1>
                           <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th> 
                                    <th>Image</th> 
                                    <th>Role</th> 
                                     
                                    <th>change_role</th> 
                                    <th>change_role</th> 
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 
                                  $query = "SELECT * FROM users";
                                  $allUsers = mysqli_query($connection, $query);
                                  if(!$allUsers) {
                                            die(mysqli_error);
                                        }
                                  while($row = mysqli_fetch_assoc($allUsers)) {
                                      $userId = $row['userId'];
                                      $userName = $row['userName'];
                                      $userPassword = $row['userPassword'];
                                      $userFirstname = $row['userFirstname'];
                                      $userLastname = $row['userLastname'];
                                      $userEmail = $row['userEmail'];
                                      $userImage = $row['userImage'];
                                      $userRole = $row['userRole'];
                                      
                                      echo "<tr>";
                                        echo "<td>{$userId}</td>";
                                        echo "<td>{$userName}</td>";
                                        echo "<td>{$userPassword}</td>";
                                        echo "<td>{$userFirstname}</td>";
                                        echo "<td>{$userLastname}</td>";
                                        echo "<td>{$userEmail}</td>";
                                        echo "<td>{$userImage}</td>";
                                        echo "<td>{$userRole}</td>";
                                        
                                        echo "<td><a href='users.php?changeToAdmin=$userId'>Admin</a></td>";
                                        echo "<td><a href='users.php?changeToUser=$userId'>Subscriber</a></td>";
                                        echo "<td><a href='users.php?delete=$userId'>Delete</a></td>";
                                        
                                      echo "</tr>";
                                  }
                                
                                ?>
                            </tbody>
                        </table>
                        
                       
<?php 
 if(isset($_GET['changeToAdmin'])) {
     $userId = $_GET['changeToAdmin'];
     $query = "UPDATE users SET userRole = 'admin' WHERE userId = {$userId}";
     $adminUser = mysqli_query($connection, $query);
     header("Location: users.php");
 }

 if(isset($_GET['changeToUser'])) {
     $userId = $_GET['changeToUser'];
     $query = "UPDATE users SET userRole = 'subscriber' WHERE userId = {$userId}";
     $subUser = mysqli_query($connection, $query);
     header("Location: users.php");
 }

 if(isset($_GET['delete'])) {
     $deleteId = $_GET['delete'];
     $query = "DELETE FROM users WHERE userId = {$deleteId}";
     $deleteUser = mysqli_query($connection, $query);
     header("Location: users.php");
 }





?>                      
                     