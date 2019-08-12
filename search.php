    <?php include "includes/db.php"; ?>
    <?php include "includes/header.php"; 
    ch_title("Searched Posts - Regular_Stuff.in");
?>

    <!-- Navigation -->
    <?php include "includes/navbar.php"; ?>   

    <!-- Page Content -->
    <main class="site-main">
      <section class="blog-post-area section-margin mt-4">
       <div class="container">
       <div class="row">
        
             <!-- Blog Entries Column -->
             
           
              

             <!-- Blog Entries Column -->
            <div class="col-md-8">
               
               <div class="well">
               <h1 class="page-header">
                  Your Searched Posts
                  <small> on Regular Stuff</small>             
              </h1>
              
               
               <div class="single-recent-blog-post">
                <?php
                
                        if( isset($_POST['submit'])){
                            $search = $_POST['search'];
                            $query = "SELECT * FROM posts WHERE postTags LIKE '%$search%'";
                            $querySearch = mysqli_query($connection, $query);
                            if(!$querySearch){
                                die("QUERY FAILED".mysqli_error($connection));
                            } 
                            
                            $count = mysqli_num_rows($querySearch);
                            if($count == 0){
                                echo "NO RESULT FOUND";
                            }else{
                         while($row = mysqli_fetch_assoc($querySearch))
                           {
                         $postId =  $row['postId'];
                         $postTitle =  $row['postTitle'];
                         $postAuthor =  $row['postAuthor'];
                         $postDate =  $row['postDate'];
                         $postImage =  $row['postImage'];
                         $postTag =  $row['postTags'];
                         $postContent =  substr($row['postContent'],0,150);
                            ?>
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
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
                                     
                <?php                                                    
                      }  }  }
                ?>
                </div>
                </div>
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

            <!-- Blog Sidebar Widgets Column Blog Search Well -->
            
           <?php include "includes/catagory.php" ?>
           
           
           
           
           </div>   
           </div>
        </section>
</main>
    

        <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>