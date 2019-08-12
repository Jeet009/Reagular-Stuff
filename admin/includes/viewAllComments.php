<?php
$connection = mysqli_connect('localhost','root','','cms_blog');
if(!$connection)
{
    echo "DATABASE connection ERROR!";
}

?>                 
                       <h1 class="page-header">
                              All Comments 
                            <small> _ADMIN </small>
                        </h1>
                           <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Dates</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 
                                  $query = "SELECT * FROM comment";
                                  $allComments = mysqli_query($connection, $query);
                                  if(!$allComments) {
                                            die(mysqli_error);
                                        }
                                  while($row = mysqli_fetch_assoc($allComments)) {
                                      $commentId = $row['commentId'];
                                      $commentPostId = $row['commentPostId'];
                                      $commentAuthor = $row['commentAuthor'];
                                      $commentContent = $row['commentContent'];
                                      $commentEmail = $row['commentEmail'];
                                      $commentStatus = $row['commentStatus'];
                                      $commentDate = $row['commentDate'];
                                      
                                      echo "<tr>";
                                        echo "<td>{$commentId}</td>";
                                        echo "<td>{$commentAuthor}</td>";
                                        echo "<td>{$commentContent}</td>";
                                        echo "<td>{$commentEmail}</td>";
                                      
                                       
//                                       $query = "SELECT * FROM category WHERE cat_id = {$postCategoryId} ";
//                                        $Selectcategory = mysqli_query($connection, $query);
//                                       while($row = mysqli_fetch_assoc($Selectcategory))
//                                      {
//                                         $catId =  $row['cat_id'];
//                                         $catTitle =  $row['cat_title'];
//                                           
//                                          echo "<td>{$catTitle}</td>";
//                                       }
//                                       
                                      
                                      
                                      
                                        echo "<td>{$commentStatus}</td>";
                                      
                                      
                                      
                                      
                                      
                                        $query = "SELECT * FROM posts WHERE postId = $commentPostId";
                                        $selectPost = mysqli_query($connection, $query);
                                        if(!$selectPost) {
                                            die(mysqli_error);
                                        }
                                        while($row = mysqli_fetch_assoc($selectPost)) {
                                            $postId = $row['postId'];
                                            $postTitle = $row['postTitle'];
                                        }
                                      
                                        echo "<td> <a href='../post.php?p_id=$postId'> {$postTitle} </a></td>";
                                      
                                      
                                      
                                        echo "<td>{$commentDate}</td>";
                                        echo "<td><a href='comments.php?approve=$commentId'>Approve</a></td>";
                                        echo "<td><a href='comments.php?unapprove=$commentId'>Unapprove</a></td>";
                                        echo "<td><a href='comments.php?delete=$commentId'>Delete</a></td>";
                                        
                                      
                                      echo "</tr>";
                                  }
                                
                                ?>
                            </tbody>
                        </table>
                        
                       
<?php 
 if(isset($_GET['approve'])) {
     $approveId = $_GET['approve'];
     $query = "UPDATE comment SET commentStatus = 'approved' WHERE commentId = $approveId";
     $approveCom = mysqli_query($connection, $query);
     header("Location: comments.php");
 }

 if(isset($_GET['unapprove'])) {
     $unapproveId = $_GET['unapprove'];
     $query = "UPDATE comment SET commentStatus = 'unapproved' WHERE commentId = $unapproveId";
     $unapproveCom = mysqli_query($connection, $query);
     header("Location: comments.php");
 }

 if(isset($_GET['delete'])) {
     $deleteId = $_GET['delete'];
     $query = "DELETE FROM comment WHERE commentId = {$deleteId}";
     $deleteCom = mysqli_query($connection, $query);
     header("Location: comments.php");
 }





?>                      
                     