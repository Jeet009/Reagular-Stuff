
    <?php include "includes/adminHeader.php" ?>
    <div id="wrapper">

    <?php include "includes/adminNavigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                        <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Catagory page
                            <small> USER </small>
                        </h1>
                        

                        
                        
                        
                        <div class="col-xs-6">
                        <form action="" method="post">
                        <label for="cat_title"> Add Category </label> 
                        <div class="form-group">
                        
                       <!--  ADD CATEGORY -->
                        
                       <?php
                           if(isset($_POST['submit'])){
                               $catTitle = $_POST['cat_title'];
                               
                               if($catTitle == "" || empty('$catTitle')){
                                  echo "SUBMIT PROPER DATA";
                               }else{
                                $queryWeb = "INSERT INTO category(cat_title)";
                                $queryWeb .= "VALUE('{$catTitle}')";
                                $createCategory = mysqli_query($connection, $queryWeb); 
                               }
                             
                           }    
                        ?>
                        
                               <input type="text" class="form-control" name="cat_title">
                           </div>
                           <div class="form-group">
                               <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                           </div>
                            
                        </form>
                        
                        
                        
                          <form action="" method="post">
                          
                           
                           <!-- EDIT CATEGORY -->
                           
                         <?php
                                        if(isset($_GET['edit'])){
                                            $CatId = $_GET['edit'];
                                            $query = "SELECT * FROM category WHERE cat_id = {$CatId}";
                                            $editQuery = mysqli_query($connection, $query);
                                            
                                            while($row = mysqli_fetch_assoc($editQuery))
                                          {
                                           $catId =  $row['cat_id'];
                                           $catTitle =  $row['cat_title'];
                                         
                         ?> 
                         <label for="cat_title"> Update Category </label> 
                         <div class="form-group">
                        <input value="<?php if(isset($catTitle)){echo $catTitle;} ?>" type="text" class="form-control" name="cat_title">
                                     
                        </div>
                              
                        <div class="form-group">
                               <input class="btn btn-warning" type="submit" name="update" value="Update Category">
                        </div>
                                       
                         <?php   } } ?> 
                         
                         
                         
                            <!-- UPDATE CATEGORY -->
                         
                         <?php 
                             if(isset($_POST['update'])) {
                                 $catTitle = $_POST['cat_title'];
                                 $query = "UPDATE category SET cat_title = '{$catTitle}' WHERE cat_id = '{$catId}'";
                                 $updateQuery = mysqli_query($connection, $query);
                                 header("Location: adminCategory.php");
                                 if(!$updateQuery){
                                     die(mysqli_error($connection));
                                 }
                             }
                               
                               
                         ?>
                         
                        </form>       
                        </div>

                        
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> Id </th>
                                        <th> Category Title </th>
                                        <th> Delete Category </th>
                                        <th> Edit Category </th>
                                    </tr>
                                </thead>

                                <tbody>
                                                                   
                                
                                
                                    <tr>
                                    
                                    <!-- SELECT ALL CATEGORY -->
                                    
                                   <?php  
                                        $query = "SELECT * FROM category";
                                        $category = mysqli_query($connection,$query);
                                       while($row = mysqli_fetch_assoc($category))
                                      {
                                         $catId =  $row['cat_id'];
                                         $catTitle =  $row['cat_title'];
                                         echo "<tr>";   
                                         echo "<td>{$catId}</td>";       
                                         echo "<td>{$catTitle}</td>"; 
                                         echo "<td><a href='adminCategory.php?delete={$catId}'>DELETE</a></td>"; 
                                         echo "<td><a href='adminCategory.php?edit={$catId}'>EDIT</a></td>"; 
                                         echo "</tr>";   
                                      }
                                 ?>
                                      
                                      <!-- DELETE CATEGORY -->
                                      
                                       <?php
                                        if(isset($_GET['delete'])){
                                            $theCatId = $_GET['delete'];
                                            $query = "DELETE FROM category WHERE cat_id = {$theCatId}";
                                            $deleteQuery = mysqli_query($connection, $query);
                                            header("Location: adminCategory.php");
                                        }
                                        
                                        ?>
                                        
                                    </tr> 
                                </tbody>
                            </table>
                            
                            
                            
                            
                        </div>
                        
                        
                        
                        
                        </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/adminFooter.php" ?>
