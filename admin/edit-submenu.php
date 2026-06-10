<?php
include('config.php');
session_start();

$error = "";
$msg = "";
$color = "";
error_reporting(0);
$id =$_GET['id'];

$query =mysqli_query($conn,"SELECT m.id AS menu_id, m.title, s.id AS id, s.title AS submenu FROM menus m JOIN submenus s ON s.mene_id = m.id where s.id='$id'");
$row=mysqli_fetch_assoc($query);
 // print_r($row);die;
if (isset($_POST['submit'])) {
    $name = $_POST['title'];
    $mene_id = $_POST['mene_id'];
    
    $rs = "update submenus set title='".$name."',mene_id='".$mene_id."' where id ='".$id."'";
    $result = mysqli_query($conn, $rs);
    if ($result) {
        echo "<script>alert('Success:Record Updated Successfully');window.location.href='submenu-details.php'</script>";
    } else {
        echo "<script>alert('Error:Something Not Updated');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Menu</title>
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
                <h1>Edit Menu</h1>
            </div>
            <!-- <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="products.php" class="btn btn-primary">Products Details</a>
                </li>
            </ul> -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div>
                            <form method="post" enctype="multipart/form-data" action="#">
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label class="control-label">Menu</label>
                                        <select class="form-control" required name="mene_id">
                                            <option value="">Select Menu</option>
                                            <?php
                                                $selectedMenu = $row['menu_id']; // DB se aayi hui menu ki value
                                                $rs = "SELECT * FROM menus";
                                                $result = mysqli_query($conn, $rs);
                                                while($row1 = mysqli_fetch_object($result)) {
                                                    $selected = ($row1->id == $selectedMenu) ? "selected" : "";
                                            ?>
                                                <option value="<?php echo $row1->id; ?>" <?php echo $selected; ?>>
                                                    <?php echo $row1->title; ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-8">
                                        <label class="control-label">Submenu Title </label>
                                        <input class="form-control" type="text" value="<?php echo $row['submenu']; ?>" name="title">
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
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