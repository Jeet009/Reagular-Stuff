<?php ob_start(); ?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php";
ch_title("Write Your Own Blog! - Regular_Stuff.in");
 ?>



    <!-- Navigation -->
<?php include "includes/navbar.php"; ?>

<?php

  if(isset($_POST['createPost'])) {
      $postCategoryId = $_POST['postCategoryId'];
      $postTitle = $_POST['postTitle'];
      $postAuthor = $_POST['postAuthor'];

      $postImage = $_FILES['image']['name'];
      $postImageTemp = $_FILES['image']['tmp_name'];
      $postTags = $_POST['postTags'];
      $postContent = $_POST['postContent'];
      $postDate = date('d-m-y');
      $postComCount = 4;


      $location = "images/".$postImage;
      move_uploaded_file($postImageTemp, $location);



    $query = "INSERT INTO posts (postCategoryId, postTitle, postAuthor, postDate, postImage, postContent, postTags, postComCount) VALUES('{$postCategoryId}','{$postTitle}','{$postAuthor}',now(),'{$postImage}','{$postContent}','{$postTags}','{$postComCount}')";

      $addPostQuery = mysqli_query($connection, $query);
      header("Location: credit.php");
      if(!$addPostQuery){
          die("QUERY FAILED ." . mysqli_error($connection));
      }



  }



?>






<main class="site-main">

  <section class="mb-30px">
    <div class="container">

      <div class="hero-banner">

        <div class="hero-banner__content">

          <h3>Regular_Stuff.in</h3><br><br>
          <h4 style="padding-left: 50px; padding-right: 50px">"Welcome to regular_stuff.in, hi this message is from the creator of website & I created this website to prodive you the best information.Feel free to share your word with world."</h4>
          <h4>- Jeet Mukherjee</h4>

        </div>
      </div>

    </div>
      <hr>
  </section>



   <!--================Hero Banner start =================-->

<div class="container">
<div class="row">
<div class="col-md-8">
  <div class="widget-wrap">
  <div class="single-sidebar-widget newsletter-widget" style="border:1px solid; color: black">
    <div class=" single-sidebar-widget__title"><h1> Write New BLog! </h1></div>
<form class="form-contact contact_form" method="post" enctype="multipart/form-data">

   <div class="form-group">
      <div class=" single-sidebar-widget__title"><label for="postTitle" style="color: black"> POST TITLE </label></div>
      <input type="text" name="postTitle" class="form-control" required style="border:1px solid darkorange; color: black">
   </div>

    <div class="form-group">
     <div class=" single-sidebar-widget__title"><label for="postCategoryId" style="color: black"> SELECT POST CATEGORY </label></div>
     <select name="postCategoryId" id="" style="border:1px solid darkorange; color: black">
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
      <div class=" single-sidebar-widget__title"><label for="postAuthor" style="color: black"> YOUR NAME </label></div>
      <input type="text" name="postAuthor" class="form-control" required style="border:1px solid darkorange; color: black">
   </div>
   <div class="form-group">
      <div class=" single-sidebar-widget__title"><label for="postAuthor" style="color: black"> Email Id </label></div>
      <input type="email" name="postAuthor" class="form-control" required style="border:1px solid darkorange; color: black">
   </div>

   <!-- <div class="form-group">
      <div class=" single-sidebar-widget__title"><label for="postStatus" style="color: black"> POST STATUS - DRAFT </label></div>
      <input type="text" name="postStatus" class="form-control">
   </div> -->

   <div class="form-group">
  <div class=" single-sidebar-widget__title">  <label for="postImage" style="color: black"> CHOOSE POST IMAGE </label></div>
    <input type="file" name="image" class="form-control-file" id="postImage" required>
   </div>

   <div class="form-group">
      <div class=" single-sidebar-widget__title"><label for="postTags" style="color: black"> POST TAGS </label></div>
      <input type="text" name="postTags" class="form-control" required style="border:1px solid darkorange; color: black">
   </div>

   <div class="form-group">
    <div class=" single-sidebar-widget__title">  <label for="postContent" style="color: black"> WRITE POST CONTENT </label></div>
    <textarea name="postContent" id="editor1" rows="10" cols="77" required style="border:1px solid black; color: darkorange">

          </textarea>
          <script>
              // Replace the <textarea id="editor1"> with a CKEditor
              // instance, using default configuration.
              CKEDITOR.replace( 'editor1' );
          </script>
   </div>

   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="createPost" value="Submit Post" style="border:1px solid; ">
   </div>

   <div class="" style="border:1px solid; padding-left: 2%; padding-top: 2%; padding-bottom: 2%; color: darkorange">
      <p style="color: black">*Make sure that you've done everything correctly. Otherwise, we'll not approve your post.<br>
      <B>We'll let you know when your post will get published.</B> THANK YOU!</p>
   </div>

</form>
</div>
</div>
 </div>


<?php include "includes/catagory.php"; ?>

</div>
</div>


  <hr>


</main>
 <?php include "includes/footer.php"; ?>
