
    <?php include "includes/adminHeader.php" ?>
    <div id="wrapper">

    <?php include "includes/adminNavigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                        
                        
   <?php 
    
    if(isset($_GET['source'])){
        $source = $_GET['source'];
    } else{
        $source = "";
    }
  
   switch($source) {
       case 'addPosts': 
           include "includes/addPosts.php";
           break;
       case 'editPosts': 
           include "includes/editPosts.php";
           break;
           
       default:
           include "includes/viewAllComments.php";
           break;
   }
    
    
    ?>

                        
                        
                        
                       
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/adminFooter.php" ?>
