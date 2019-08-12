<!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->

          <h1><a class="navbar-brand" href="index.php">Regular_Stuff</a></h1>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Category</a>
                <ul class="dropdown-menu">
                  <?php
                      $query = "SELECT * FROM category";
                      $all_cat = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($all_cat))
                      {
                         $catTitle =  $row['cat_title'];
                         $catId =  $row['cat_id'];
                         echo "<li class='nav-item active'><a class='nav-link' href='categoryPosts.php?category=$catId' style='font-family: serif;'>{$catTitle}_Stuff</a></li>";

                      }
                ?>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="admin">Admin</a></li>
              <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
              <li class="nav-item"><a class="nav-link" href="userPosts.php">Write Blog</a></li>
            </ul>
            <!-- <ul class="nav navbar-nav navbar-right navbar-social">
              <li><a href="#"><i class="ti-facebook"></i></a></li>
              <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
              <li><a href="#"><i class="ti-instagram"></i></a></li>
              <li><a href="#"><i class="ti-linkedin"></i></a></li>

            </ul> -->
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->
