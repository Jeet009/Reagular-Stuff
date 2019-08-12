    <?php ob_start(); ?>
    <?php include "includes/db.php"; ?>
    <?php include "includes/header.php"; 
    ch_title("Category Posts - Regular_Stuff.in");
?>

    <!-- Navigation -->
    <?php include "includes/navbar.php"; ?>   

    <!-- Page Content -->
     
 <main class="site-main">
      <section class="blog-post-area section-margin mt-4">
       <div class="container">
       <div class="row">
        
             <!-- Blog Entries Column -->
             
            <div class="col-md-8">
             <div class="well"> 
             <h1 class="page-header" style="font-family: 'Inconsolata', monospace;">
                 <?php
                    if(isset($_GET['category'])) {
                    $catId = $_GET['category'];
                      }
                    $query = "SELECT * FROM category WHERE cat_id = $catId";
                      $category = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($category))
                      {
                         $catTitle =  $row['cat_title'];
                         $catId =  $row['cat_id'];
                         echo "{$catTitle}";
                      }
                               
                        
                 ?>
                  
                  <small>_Stuff</small>             
              </h1><hr>
               
                 
                <?php
                 
                 
                     if(isset($_GET['category'])) {
                        $thePostCategory = $_GET['category'];
                     }
                     
                      
                     $query = "SELECT * FROM posts WHERE postCategoryId = $thePostCategory";
                     $category_posts = mysqli_query($connection, $query);
                     if(!$category_posts){
                                     die(mysqli_error($connection));
                                 }
                      while($row = mysqli_fetch_assoc($category_posts))
                      {
                         $postId =  $row['postId'];
                         $postTitle =  $row['postTitle'];
                         $postAuthor =  $row['postAuthor'];
                         $postDate =  $row['postDate'];
                         $postImage =  $row['postImage'];
                         $postTag =  $row['postTags'];
                         $postContent = substr($row['postContent'],0,150);
                      
               ?>
                 <div class="single-recent-blog-post">  
              <div class="thumb">
                <img class="img-fluid" src="images/<?php echo $postImage ?>" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="post.php?p_id=<?php echo $postId ?>">
                  <h3><?php echo $postTitle ?></h3>
                </a>
                <p class="tag-list-inline">Tag: <a href="#"><?php echo $postTag ?></a></p>
                <p><?php echo $postContent ?></p>
               <a class="button" href="post.php?p_id=<?php echo $postId ?>">Read More <i class="ti-arrow-right"></i></a>
              </div>
              </div>
            <?php } ?>
         
          </div>
              
               

                   <hr>
                                     
               
                
                 <!-- Pager -->
              <div class="row">
              <div class="col-lg-12">
                
                  <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-left"></i>
                                  </span>
                              </a>
                          </li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Next">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-right"></i>
                                  </span>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
            </div>
             </div>   

                
              <?php include "includes/catagory.php" ?> 
                  
            
            
            <!-- Blog Sidebar Widgets Column Blog Search Well -->
            
          
           
           
           
           
           </div>   
           </div>
</section>
</main>          

        <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>