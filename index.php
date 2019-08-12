
    <?php include "includes/db.php"; ?>
    <?php include "includes/header.php";
    ch_title("Regular_Stuff.in - Read new blog regularly");
    ?>





    <!-- Navigation -->
    <?php include "includes/navbar.php"; ?>






 <main class="site-main">

    <!--================Hero Banner start =================-->
    <section class="mb-30px">
      <div class="container">

        <div class="hero-banner">

          <div class="hero-banner__content">

            <h3>Regular_Stuff.in</h3><br><br>
            <h4 style="padding-left: 50px; padding-right: 50px">"Welcome to regular_stuff.in, hi this message is from the creator of website & I created this website to prodive you the best information.Feel free to share your word with world."</h4>
            <h4>- Jeet Mukherjee</h4>
          <a href="userPosts.php" style="padding-left:5%; padding-right: 5%; margin-top: 2%;"> <button style="border:1px solid; color: darkorange; background-color: black">WRITE NOW !</button> </a>
          </div>
        </div>

      </div>
    </section>
    <!--================Hero Banner end =================-->

    <!--================ Blog slider start =================-->

    <section>
      <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
         <?php

                     $query = "SELECT * FROM posts WHERE postStatus = 'published' ORDER BY postId DESC";
                     $all_posts = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($all_posts))
                      {
                         $postId =  $row['postId'];
                         $postImage =  $row['postImage'];
                         $postAuthor =  $row['postAuthor'];
                         $postTitle =  $row['postTitle'];
                         $postDate =  $row['postDate'];
                         $postContent = substr($row['postContent'],0,150);


        ?>
          <div class="card blog__slide text-center">
            <div class="blog__slide__img">
              <img class="card-img rounded-0" src="images/<?php echo $postImage ?>" alt="">
            </div>
            <div class="blog__slide__content">
              <a class="blog__slide__label" href="3"><?php echo $postAuthor ?></a>
              <h3><a href="post.php?p_id=<?php echo $postId ?>"><?php echo $postTitle ?></a></h3>
              <p><?php echo $postDate ?></p>
            </div>
          </div>
          <?php  } ?>
        </div>
      </div>
    </section>

    <!--================ Blog slider end =================-->
<hr>
    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
           <?php
                     $query = "SELECT * FROM posts WHERE postStatus = 'published' ORDER BY postId DESC";
                     $all_posts = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($all_posts))
                      {
                         $postId =  $row['postId'];
                         $postCategoryId =  $row['postCategoryId'];
                         $postTitle =  $row['postTitle'];
                         $postAuthor =  $row['postAuthor'];
                         $postDate =  $row['postDate'];
                         $postImage =  $row['postImage'];
                         $postTag =  $row['postTags'];
                         $postContent = substr($row['postContent'],0,150);

            ?>
            <div class="single-recent-blog-post">
              <div class="thumb">
                <img class="img-fluid" src="images/<?php echo $postImage ?>" alt="" width="5472" height="3078">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i><?php echo $postAuthor ?></a></li>
                  <li><a href="#"><i class="ti-notepad"></i><?php echo $postDate ?></a></li>

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
<!--
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
-->

          </div>

          <!-- Start Blog Post Siddebar -->
         <?php include "includes/catagory.php"; ?>


 </div> </div>  </section>
    <!--================ End Blog Post Area =================-->
  </main>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
