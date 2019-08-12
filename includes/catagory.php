



         <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">

                <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="single-sidebar-widget__title">Search</h4>
                  <form action="search.php" method="post">
                  <div class="input-group mt-30">
                    <div class="col-autos">
                      <input name="search" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search here" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Search Posts'" required> <br>
                        <span> <button name="submit" class="bbtns d-block mt-20 w-100" type="submit">Search</button> </span>
                    </div>

                  </div>
                    </form>

                </div>


                <div class="single-sidebar-widget post-category-widget">
                  <h4 class="single-sidebar-widget__title">Category</h4>
                  <ul class="cat-list mt-20">
                    <?php

                      $query = "SELECT * FROM category";
                      $category = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($category))
                      {
                         $catTitle =  $row['cat_title'];
                         $catId =  $row['cat_id'];
                         echo "<li><a href='categoryPosts.php?category=$catId' style='font-family: serif; font-size: 17px; color: black;'>{$catTitle}_Stuff</a></li>";       
                      }

                     ?>


                  </ul>
                </div>

                <div class="single-sidebar-widget popular-post-widget">
                  <h4 class="single-sidebar-widget__title">Popular Post</h4>
        <?php
                            $query = "SELECT * FROM posts WHERE postCategoryId = 13";
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
                  <div class="popular-post-list">
                    <div class="single-post-list">
                      <div class="thumb">
                        <img class="card-img rounded-0" src="images/<?php echo $postImage ?>" alt="">
                        <ul class="thumb-info">
                          <li><a href="#"><?php echo $postAuthor ?></a></li>
                          <li><a href="#"><?php echo $postDate ?></a></li>
                        </ul>
                      </div>
                      <div class="details mt-20">
                        <a href="post.php?p_id=<?php echo $postId ?>">
                          <h6><?php echo $postTitle ?></h6>
                        </a>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>



                </div>
              </div>

          <!-- End Blog Post Siddebar -->
