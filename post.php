    <?php ob_start(); ?>
    <?php include "includes/db.php"; ?>
     <?php
                
                if(isset($_GET['p_id'])) {
                    $thePostId = $_GET['p_id'];
                }
                     $query = "SELECT * FROM posts WHERE postId = $thePostId";
                     $all_posts = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($all_posts))
                      {
                         $postTitle =  $row['postTitle'];
                      }
               ?>
    <?php include "includes/header.php";
    ch_title( $postTitle );
    ?>

    <!-- Navigation -->
    <?php include "includes/navbar.php"; ?>   
   
    <?php
                
                if(isset($_GET['p_id'])) {
                    $thePostId = $_GET['p_id'];
                }
                
                
                     $query = "SELECT * FROM posts WHERE postId = $thePostId";
                     $all_posts = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($all_posts))
                      {
                         $postTitle =  $row['postTitle'];
                         $postAuthor =  $row['postAuthor'];
                         $postDate =  $row['postDate'];
                         $postImage =  $row['postImage'];
                         $postContent =  $row['postContent'];
                         $postTag =  $row['postTags'];
               ?>
    <!-- Page Content -->
      <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
                <img class="img-fluid" src="images/<?php echo $postImage ?>" alt="">
                <a href="#"><h4><?php echo $postTitle ?></h4></a>
                <div class="user_details">
                  <div class="float-left">
                    <a href=""><i><B>TAGS : </B></i> <?php echo $postTag ?></a>
                    
                  </div>
                  <div class="float-right mt-sm-0 mt-3">
                    <div class="media">
                      <div class="media-body">
                        <h5><?php echo $postAuthor ?></h5>
                        <p><?php echo $postDate ?></p>
                      </div>
                      <div class="d-flex">
<!--                        <img width="42" height="42" src="img/blog/user-img.png" alt="">-->
                      </div>
                    </div>
                  </div>
                </div>
                <?php echo $postContent ?>
<!--
           <blockquote class="blockquote">
             <p class="mb-0">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p>
           </blockquote>
-->
          
<!--
               <div class="news_d_footer flex-column flex-sm-row">
                 <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4 people like this</a>
                 <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>06 Comments</a>
                 <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-dribbble"></i></a>
               <a href="#"><i class="fab fa-behance"></i></a>
             </div>
               </div>
-->
              </div>
          
                  
                
                

                     
                                     
                <?php                                                    
                      }
                ?>

                
             </div>  
              <?php include "includes/catagory.php" ?>  
            </div>
          </div>
</section>
             

            <!-- Blog Sidebar Widgets Column Blog Search Well -->
            
           
       
           
           
           
    

        <hr>
         
<!--         COMMENT ACTION PHP-->
         
<?php
    if(isset($_POST['createComment'])) {
        $thePostId = $_GET['p_id'];
        $commentAuthor = $_POST['commentAuthor'];
        $commentEmail = $_POST['commentEmail'];
        $commentContent = $_POST['commentContent'];
        
                                  
                                  $query = "INSERT INTO comment (commentPostId, commentAuthor, commentEmail, commentContent, commentStatus, commentDate) VALUES ($thePostId, '{$commentAuthor}', '{$commentEmail}', '{$commentContent}', 'unapproved', now())";
    
                                  $comments = mysqli_query($connection, $query);
    }
                                  
?>
                         <!-- Comments Form -->
                         
               <div class="container">
               <div class="row">
                
               <div class="col-md-8">
               <div class="widget-wrap">
              <div class="single-sidebar-widget newsletter-widget" style="border:1px solid;">
                    <div class="well">
                    <h1>Leave a Comment:</h1><hr>
                    <form action="" method="post" role="form">
                       <div class="form-group">
                          <div class=" single-sidebar-widget__title"> <label for="Author"> Your Name </label> </div>
                            <input type="text" class="form-control" name="commentAuthor">
                        </div>
                        <div class="form-group">
                            <div class=" single-sidebar-widget__title"><label for="Email"> Your Email </label></div>
                            <input type="email" class="form-control" name="commentEmail">
                        </div>
                        
                        <div class="form-group">
                            <div class=" single-sidebar-widget__title"><label for="commentContent"> Your Comment </label></div>
                            <textarea class="form-control" rows="3" name="commentContent"></textarea>
                        </div>
                        <button name="createComment" type="submit" class="btn btn-dark">Submit</button>
                    </form>
                    </div>
                    </div>
                    </div>
                    <hr>
                    
                    <div class="widget-wrap">
              <div class="single-sidebar-widget newsletter-widget" style="border:1px solid; color: darkorange">
              <h1 style="margin-left: 5px">Comments</h1><hr>
<?php
        

                                  $query = "SELECT * FROM comment WHERE commentPostId = $thePostId AND commentStatus = 'approved' ORDER BY commentId DESC ";
                                  $displayComments = mysqli_query($connection, $query);
                                  if(!$displayComments) {
                                            die(mysqli_error);
                                        }
                                  while($row = mysqli_fetch_assoc($displayComments)) {
                                      $commentAuthor = $row['commentAuthor'];
                                      $commentContent = $row['commentContent'];
                                      $commentDate = $row['commentDate'];
                                      
                            
 ?>   
               
              
                        <h4 style="margin-left: 5px">
                           <div class="single-sidebar-widget__title"> <B> <?php echo $commentAuthor ?> </B>
                             <br>  </div>
                            <div class="single-sidebar-widget newsletter-widget" style="border:1px solid; color: darkorange"> - <?php echo $commentContent ?> </div>
                        </h4>
                 
                   
                                
                                
                                 <?php } ?>  
                                  </div>
                    </div>
               


                <hr>
                
                </div>
                </div>
                </div>
    <!-- Footer -->
     
       
    <?php include "includes/footer.php"; ?>