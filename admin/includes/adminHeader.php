<?php ob_start(); ?>
<?php session_start(); ?>

<?php
if(!isset($_SESSION['user_role'])) {
        header("Location: ../index.php");
} else if($_SESSION['user_role']  == 'subscriber') {
         header("Location: ../index.php"); 
     }



?> 
<?php 
$connection = mysqli_connect('localhost','root','','cms_blog');
if(!$connection)
{
    echo "DATABASE connection ERROR!";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>R_S Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript" src="../js/adminScript.js"></script>
   <script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
</head>

<body>