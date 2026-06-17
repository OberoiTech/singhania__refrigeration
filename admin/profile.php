<?php
include('db.php');
session_start();
$error = "";
$msg = "";
$color = "";
$user_id = $_SESSION['user_id'];
if ($user_id === null) {
    echo "Please login before access this page.";
}

$query = "select * from users where user_id = $user_id limit 1";
$rowUser = mysqli_query($conn, $query);
$resultUser = mysqli_fetch_assoc($rowUser);
if ($resultUser['type'] == 'Admin') {
    header("location:dashboard.php");
}

if (isset($_POST['submit'])) {
    if (!empty($_FILES['user_pic']) && !empty($_FILES['aadhar_pic'])) {
        $path = "upload/";
        $path = $path . basename($_FILES['user_pic']['name']);
        $image = $_FILES['user_pic']['name'];

        $path2 = "upload/";
        $path2 = $path2 . basename($_FILES['aadhar_pic']['name']);
        $image2 = $_FILES['aadhar_pic']['name'];

        $path3 = "upload/";
        $path3 = $path3 . basename($_FILES['pancard_pic']['name']);
        $image3 = $_FILES['pancard_pic']['name'];

        $name = $_POST['name'];
        $email    = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address    = $_POST['address'];
        $account_number    = $_POST['account_number'];
        $ifsc_code    = $_POST['ifsc_code'];
        $branch_address        = $_POST['branch_address'];
        $upi        = $_POST['upi'];
        if (!empty($name)) {
            //if(move_uploaded_file($_FILES['user_pic']['tmp_name'], $path))
            //{ 
            // if(move_uploaded_file($_FILES['aadhar_pic']['tmp_name'], $path2))
            // { 

            // }

            // if(move_uploaded_file($_FILES['pancard_pic']['tmp_name'], $path3))
            // { 

            // }

            $rs = "update users set name='" . $name . "', email= '" . $email . "', mobile = '" . $mobile . "',  address = '" . $address . "',account_number='" . $account_number . "', ifsc_code = '" . $ifsc_code . "', branch_address = '" . $branch_address . "', upi = '" . $upi . "', user_pic = '" . $image . "', aadhar_pic = '" . $image2 . "', pancard_pic = '" . $image3 . "' where user_id = '" . $user_id . "'";

            $result = mysqli_query($conn, $rs);
            if ($result) {
                $queryl = "select * from users where user_id='" . $user_id . "' limit 1";
                $rowl = mysqli_query($conn, $queryl);
                while ($resultl = mysqli_fetch_assoc($rowl)) {
                    $_SESSION['name'] = $resultl['name'];
                    $_SESSION['type'] = $resultl['type'];
                    $_SESSION['user_id'] = $resultl['user_id'];
                    $_SESSION['email'] = $resultl['email'];
                }
                echo "<script>alert('Success:Record Updated Successfully');window.location.href='profile.php';</script>";
            } else {
                echo "<script>alert('Error:Something Not Updated');</script>";
            }
            // }
            // else
            // {
            //     $color="alert alert-danger";
            //     $msg="Not Added";
            // }
        } else {
            $color = "alert alert-danger";
            $msg = "Fill All the fields";
        }
    } else {
        $color = "alert alert-danger";
        $msg = "Choose Image";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <h1>Profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="<?= $color; ?>"><label for=""><?= $msg; ?></label></div>
                        <div>
                            <form method="post" enctype="multipart/form-data" action="#">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Customer Id</label>
                                        <input class="form-control" type="text" readonly value="<?php echo $user_id; ?>" name="user_id">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Name</label>
                                        <input class="form-control" type="text" value="<?php echo $resultUser['name']; ?>" placeholder="Enter full name" name="name" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Email</label>
                                        <input class="form-control" type="text" value="<?php echo $resultUser['email']; ?>" placeholder="Enter Email" name="email" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Mobile</label>
                                        <input class="form-control" type="text" value="<?php echo $resultUser['mobile']; ?>" placeholder="Enter Mobile" name="mobile" required="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Address</label>
                                        <textarea class="form-control" type="text" value="<?php echo $resultUser['address']; ?>" placeholder="Enter Address" name="address" required=""><?php echo $resultUser['address']; ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h3 class="control-label text-danger">Bank Details</h3>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Account No.</label>
                                        <input class="form-control" type="number" value="<?php echo $resultUser['account_number']; ?>" placeholder="Enter Account No." name="account_number" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">IFSC Code</label>
                                        <input class="form-control" type="text" value="<?php echo $resultUser['name']; ?>" placeholder="Enter IFSC Code" name="ifsc_code" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Branch Address</label>
                                        <input class="form-control" type="text" value="<?php echo $resultUser['branch_address']; ?>" placeholder="Enter Branch Address" name="branch_address" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">UPI</label>
                                        <input class="form-control" type="text" value="<?php echo $resultUser['upi']; ?>" placeholder="Enter UPI " name="upi" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Upload Photo</label>
                                        <input class="form-control" type="file" name="user_pic" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Upload Aadhar</label>
                                        <input class="form-control" type="file" name="aadhar_pic" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Upload Pan Card</label>
                                        <input class="form-control" type="file" name="pancard_pic" required="">
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
</body>

</html>