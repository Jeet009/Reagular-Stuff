<?php
    
                                        $query = "SELECT * FROM users ";
                                        $user = mysqli_query($connection, $query);
                                       while($row = mysqli_fetch_assoc($user))
                                      {
                                         $userId =  $row['userId'];
                                         $userRole =  $row['userRole'];
                                           
                                         echo "<option value='{$userId}'>{$userRole}</option>";
                                      }
          ?>
                 

                 <?php 

                 if(isset($_GET['p_id'])) {
                     $getId = $_GET['p_id'];
                 }
                                  $query = "SELECT * FROM posts WHERE postId = {$getId}";
                                  $allPosts = mysqli_query($connection, $query);
                                  while($row = mysqli_fetch_assoc($allPosts)) {
                                      $postId = $row['postId'];
                                      $postAuthor = $row['postAuthor'];
                                      $postTitle = $row['postTitle'];
                                      $postCategoryId = $row['postCategoryId'];
                                      $postStatus = $row['postStatus'];
                                      $postContent = $row['postContent'];
                                      $postImage = $row['postImage'];
                                      $postTags = $row['postTags'];
                                      $postComCount = $row['postComCount'];
                                      $postDate = $row['postDate'];
                                      
                                      }                      
                          

                          if(isset($_POST['updatePost'])) {
                           $postCategoryId = $_POST['postCategory'];
                           $postTitle = $_POST['postTitle'];
                           $postAuthor = $_POST['postAuthor'];
                           $postStatus = $_POST['postStatus'];
                           $postImage = $_FILES['image']['name'];
                           $postImageTemp = $_FILES['image']['tmp_name'];
                           $postTags = $_POST['postTags'];
                           $postContent = $_POST['postContent'];
                           $postDate = date('d-m-y');
                           $postComCount = 4;
      
                           $location = "../images/".$postImage;
                           move_uploaded_file($postImageTemp, $location);
      
      
$query = "UPDATE posts SET postCategoryId = '{$postCategoryId}', postTitle = '{$postTitle}', postAuthor = '{$postAuthor}', postDate =  now(), postImage = '{$location}', postContent = '{$postContent}', postTags = '{$postTags}', postComCount = '{$postComCount}', postStatus = '{$postStatus}' WHERE postId = {$postId}";
      
                        $updatePostQuery = mysqli_query($connection, $query);
                        if(!$updatePostQuery){
                            die("QUERY FAILED ." . mysqli_error($connection));
                        }
      
                    }
?>




<div class="container">
<div class="row">

<div class="col-md-8">
<h2> Edit your Blog! </h2>
<hr>
<form class="" method="post" enctype="multipart/form-data">
   
   <div class="form-group">
      <label for="postTitle"> Post Title </label>
      <input value="<?php echo $postTitle ?>" type="text" name="postTitle" class="form-control">
   </div>
   <div class="form-group">
      <select name="postCategory" id="">
          <?php
    
                                        $query = "SELECT * FROM category ";
                                        $Selectcategory = mysqli_query($connection, $query);
                                       while($row = mysqli_fetch_assoc($Selectcategory))
                                      {
                                         $catId =  $row['cat_id'];
                                         $catTitle =  $row['cat_title'];
                                           
                                         echo "<option value='{$catId}'>{$catTitle}</option>";
                                      }
          ?>
      </select>
   </div>
   <div class="form-group">
      <label for="postAuthor"> Post Author </label>
      <input value="<?php echo $postAuthor ?>" type="text" name="postAuthor" class="form-control">
   </div>
   <div class="form-group">
      <label for="postStatus"> Post Status </label>
      <input value="<?php echo $postStatus ?>" type="text" name="postStatus" class="form-control">
   </div>
   <div class="form-group">
    <img width="100" src="<?php echo $postImage ?>" alt="image">
    <label for="postImage"> Choose Image </label>
    <input type="file" name="image" class="form-control-file" id="postImage">
   </div>
   <div class="form-group">
      <label for="postTags"> Post Tags </label>
      <input value="<?php echo $postTags ?>" type="text" name="postTags" class="form-control">
   </div>
   <div class="form-group">
      <label for="postContent"> Post Content </label>
      <textarea class="form-control" name="postContent" id="" cols="30" rows="10"><?php echo $postContent ?>
      </textarea>
   </div>
   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="updatePost" value="Submit Post">
   </div>
    
</form>
 
 </div>
</div>   
</div>

