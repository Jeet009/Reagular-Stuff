
    <?php include "includes/adminHeader.php" ?>
    <div id="wrapper">

    <?php include "includes/adminNavigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                        <div class="col-lg-12">
                        <h1 class="page-header">
                           <bold style="font-size: 20px"> Welcome to Admin page </bold>
                             _<?php echo $_SESSION['firstname'] ?> 
                        </h1>
                        </div>
                </div>
                <!-- /.row -->
                      
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       <?php
                                       $query = "SELECT * FROM posts"; 
                                       $selectPosts = mysqli_query($connection, $query);
                                       $postCount = mysqli_num_rows($selectPosts);
                                       echo "<div class='huge'>{$postCount}</div>";
                                        ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php
                                       $query = "SELECT * FROM comment"; 
                                       $selectComments = mysqli_query($connection, $query);
                                       $commentCount = mysqli_num_rows($selectComments);
                                       echo "<div class='huge'>{$commentCount}</div>";
                                        ?>
                                     
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <?php
                                       $query = "SELECT * FROM users"; 
                                       $selectUsers = mysqli_query($connection, $query);
                                       $userCount = mysqli_num_rows($selectUsers);
                                       echo "<div class='huge'>{$userCount}</div>";
                                        ?>
                                    
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       <?php
                                       $query = "SELECT * FROM category"; 
                                       $selectCategory = mysqli_query($connection, $query);
                                       $categoryCount = mysqli_num_rows($selectCategory);
                                       echo "<div class='huge'>{$categoryCount}</div>";
                                        ?>
                                        
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./adminCategory.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row --> 
                <div class="row">
                   <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Counts'],
            <?php 
            $element_text = ['Active Posts', 'Comments', 'Users', 'Category'];
            $element_count = [$postCount, $commentCount, $userCount, $categoryCount];
            
            for($i =0; $i < 4; $i++) {
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
            }
            
            
            ?>
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                   <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                    
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/adminFooter.php" ?>
