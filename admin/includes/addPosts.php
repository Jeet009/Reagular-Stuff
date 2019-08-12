<?php ob_start(); ?>
<?php
$connection = mysqli_connect('localhost','root','','cms_blog');

  if(isset($_POST['createPost'])) {
      $postCategoryId = $_POST['postCategoryId'];
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
      
      
$query = "INSERT INTO posts (postCategoryId, postTitle, postAuthor, postDate, postImage, postContent, postTags, postComCount, postStatus) VALUES('{$postCategoryId}','{$postTitle}','{$postAuthor}',now(),'{$location}','{$postContent}','{$postTags}','{$postComCount}','{$postStatus}')";
      
      $addPostQuery = mysqli_query($connection, $query);
      if(!$addPostQuery){
          die("QUERY FAILED ." . mysqli_error($connection));
      }
      
  }

?>
                       <h1 class="page-header">
                            Write New Posts 
                            <small> ADMIN </small>
                        </h1>
  
  <form class="" method="post" enctype="multipart/form-data">
   
   <div class="form-group">
      <label for="postTitle"> Post Title </label>
      <input type="text" name="postTitle" class="form-control">
   </div>
   <div class="form-group">
      <label for="postAuthor"> Post Author </label>
      <input type="text" name="postAuthor" class="form-control">
   </div>
   <div class="form-group">
     <label for="postCategoryId"> Post Category </label>
     <select name="postCategoryId" id="">
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
      <label for="postStatus"> Post Status </label>
      <input type="text" name="postStatus" class="form-control">
   </div>
   <div class="form-group">
    <label for="postImage"> Choose Image </label>
    <input type="file" name="image" class="form-control-file" id="postImage">
    
   </div>
   <div class="form-group">
      <label for="postTags"> Post Tags </label>
      <input type="text" name="postTags" class="form-control">
   </div>
   <div class="form-group">
      <label for="postContent"> Post Content </label>
<!--      <textarea class="form-control" name="postContent" id="body" cols="30" rows="10"></textarea>-->
      <textarea name="postContent" id="editor1" rows="10" cols="170">
               
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
   </div>
   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="createPost" value="Submit Post">
   </div>
    
</form>