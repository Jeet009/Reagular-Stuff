<?php
$connection = mysqli_connect('localhost','root','','cms_blog');
if(!$connection)
{
    echo "DATABASE connection ERROR!";
}

?>                 
                       <h1 class="page-header">
                              All Posts 
                            <small> ADMIN </small>
                        </h1>
                           <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Post Title</th>
                                    <th>Post Category</th>
                                    <th>Status</th>
                                    <th>Images</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Dates</th>
                                    <th>Delete Posts</th>
                                    <th>Edit Posts</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 
                                  $query = "SELECT * FROM posts";
                                  $allPosts = mysqli_query($connection, $query);
                                  while($row = mysqli_fetch_assoc($allPosts)) {
                                      $postId = $row['postId'];
                                      $postAuthor = $row['postAuthor'];
                                      $postTitle = $row['postTitle'];
                                      $postCategoryId = $row['postCategoryId'];
                                      $postStatus = $row['postStatus'];
                                      $postImage = $row['postImage'];
                                      $postTags = $row['postTags'];
                                      $postComCount = $row['postComCount'];
                                      $postDate = $row['postDate'];
                                      
                                      echo "<tr>";
                                        echo "<td>{$postId}</td>";
                                        echo "<td>{$postAuthor}</td>";
                                        echo "<td>{$postTitle}</td>";
                                      
                                       
                                       $query = "SELECT * FROM category WHERE cat_id = {$postCategoryId} ";
                                        $Selectcategory = mysqli_query($connection, $query);
                                       while($row = mysqli_fetch_assoc($Selectcategory))
                                      {
                                         $catId =  $row['cat_id'];
                                         $catTitle =  $row['cat_title'];
                                           
                                          echo "<td>{$catTitle}</td>";
                                       }
                                       
                                      
                                      
                                      
                                        echo "<td>{$postStatus}</td>";
                                        echo "<td><img width='100' src='$postImage' alt='Image'></td>";
                                        echo "<td>{$postTags}</td>";
                                        echo "<td>{$postComCount}</td>";
                                        echo "<td>{$postDate}</td>";
                                        echo "<td><a href='posts.php?delete=$postId'>Delete</a></td>";
                                        echo "<td><a href='posts.php?source=editPosts&p_id={$postId}'>Edit</a></td>";
                                      
                                      echo "</tr>";
                                  }
                                
                                ?>
                            </tbody>
                        </table>
                        
                       
<?php 

 if(isset($_GET['delete'])) {
     $deleteId = $_GET['delete'];
     $query = "DELETE FROM posts WHERE postId = {$deleteId}";
     $deleteQueryCon = mysqli_query($connection, $query);
     header("Location: posts.php");
 }





?>                      
                     