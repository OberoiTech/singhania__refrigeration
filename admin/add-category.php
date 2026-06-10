<?php
error_reporting(0);
include('config.php');
session_start();
$error = "";
$msg = "";
$color = "";
if (isset($_POST['submit'])) {
    $category_name    = $_POST['category_name'];
    $rs = "insert into category(category_name) values('" . $category_name . "')";
    $result = mysqli_query($conn, $rs);
    if ($result) {
        echo "<script>alert('Success:Record Added Successfully');window.location.href='category-details.php';</script>";
    } else {
        echo "<script>alert('Error:Something Not Updated');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Category Form</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php include('header.php'); ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include('side.php'); ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Add Category</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="category-details.php" class="btn btn-primary">Category
                        Details</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="<?= $color; ?>"><label for=""><?= $msg; ?></label></div>
                        <div>
                            <form method="post" enctype="multipart/form-data" action="#">
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label class="control-label">Category Name</label>
                                        <input class="form-control" type="text" placeholder="Enter Menu Name"  name="category_name" required="">
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
</body>

</html>
<script>
CKEDITOR.replace('description');
</script>
<style>
    .cke_notifications_area 
    {
        display: none !important;
    }
</style>