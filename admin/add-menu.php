<?php
error_reporting(0);
include('config.php');
session_start();
$error = "";
$msg = "";
$color = "";
if (isset($_POST['submit'])) {
    $name = $_POST['title'];
    $designation    = $_POST['designation'];
    $rs = "insert into menus(title) values('" . $name . "')";
    $result = mysqli_query($conn, $rs);
    if ($result) {
        echo "<script>alert('Success:Record Added Successfully');window.location.href='menu-details.php';</script>";
    } else {
        echo "<script>alert('Error:Something Not Updated');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Menu Form</title>
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
                <h1>Add Menu</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="menu-details.php" class="btn btn-primary">Menu
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
                                        <label class="control-label">Menu Name</label>
                                        <input class="form-control" type="text" placeholder="Enter Menu Name"  name="title" required="">
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
    <script src="ckeditor/ckeditor.js"></script>
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