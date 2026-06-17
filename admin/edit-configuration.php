<?php 
error_reporting(0);
include('config.php');
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = mysqli_query($conn, "SELECT * FROM configuration WHERE id = '$id'");
$row   = mysqli_fetch_assoc($query);

if (!$row) {
    echo "<script>alert('Error: Configuration not found');window.location.href='configuration-details.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {

    $mobile   = trim($_POST['mobile']);
    $email    = trim($_POST['email']);
    $time     = trim($_POST['time_value']);
    $facebook = trim($_POST['facebook']);
    $linkedin = trim($_POST['linkedin']);
    $map      = trim($_POST['map']);
    $address  = trim($_POST['address']);

    $mobileEsc   = mysqli_real_escape_string($conn, $mobile);
    $emailEsc    = mysqli_real_escape_string($conn, $email);
    $timeEsc     = mysqli_real_escape_string($conn, $time);
    $facebookEsc = mysqli_real_escape_string($conn, $facebook);
    $linkedinEsc = mysqli_real_escape_string($conn, $linkedin);
    $mapEsc      = mysqli_real_escape_string($conn, $map);
    $addressEsc  = mysqli_real_escape_string($conn, $address);

    $updateQuery = "
        UPDATE configuration 
        SET 
            mobile     = '{$mobileEsc}',
            email      = '{$emailEsc}',
            time_value = '{$timeEsc}',
            facebook   = '{$facebookEsc}',
            linkedin   = '{$linkedinEsc}',
            map        = '{$mapEsc}',
            address    = '{$addressEsc}'
        WHERE id = {$id}
    ";

    $result = mysqli_query($conn, $updateQuery);
    if ($result) {
        echo "<script>alert('Success: Record Updated Successfully');window.location.href='configuration-details.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error: Something not updated');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Configuration Edit - Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="ckeditor/ckeditor.js"></script>

    <!-- UI overrides to match new Singhania admin -->
    <style>
        .app-content {
            background: radial-gradient(circle at top, #f9fafb 0, #eef2ff 35%, #e0f2fe 100%);
            min-height: calc(100vh - 60px);
            padding: 25px 24px 40px;
        }

        .app-title {
            background: #ffffffee;
            border-radius: 16px;
            padding: 16px 22px;
            margin-bottom: 22px;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
            border: 1px solid rgba(148, 163, 184, 0.25);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .app-title h1 {
            font-size: 20px;
            margin: 0;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .app-title h1::before {
            content: "\f013";
            font-family: FontAwesome;
            font-size: 18px;
            color: #0ea5e9;
        }

        .app-breadcrumb {
            margin-bottom: 0;
            font-size: 12px;
            background: transparent;
        }

        .app-breadcrumb .breadcrumb-item,
        .app-breadcrumb .breadcrumb-item a {
            color: #fff;
        }

        .tile {
            border-radius: 18px;
            border: 1px solid rgba(148, 163, 184, 0.25);
            box-shadow: 0 16px 35px rgba(15, 23, 42, 0.08);
            background: #ffffff;
            padding: 18px 22px 20px;
        }

        .tile-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 14px;
            color: #111827;
        }

        .form-group label.control-label {
            font-size: 12px;
            color: #4b5563;
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
            border-color: #d1d5db;
            font-size: 13px;
        }

        .form-control:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 0.2rem rgba(56, 189, 248, 0.25);
        }

        textarea.form-control {
            min-height: 90px;
        }

        .tile-footer {
            margin-top: 10px;
            padding-top: 14px;
            border-top: 1px solid #e5e7eb;
        }

        .btn-primary {
            border-radius: 999px;
            padding: 8px 20px;
            font-size: 13px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }
    </style>
</head>
<body class="app sidebar-mini">
    <?php include('header.php'); ?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include('side.php'); ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Edit Configuration</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <a href="configuration-details.php" class="btn btn-primary btn-sm">
                        <i class="fa fa-list"></i> Configuration Details
                    </a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Edit Configuration Form</h3>
                    <div class="tile-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mobile No.</label>
                                        <input class="form-control"
                                               type="text"
                                               name="mobile"
                                               value="<?php echo htmlspecialchars($row['mobile']); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email Id</label>
                                        <input class="form-control"
                                               type="email"
                                               name="email"
                                               value="<?php echo htmlspecialchars($row['email']); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Time</label>
                                        <input class="form-control"
                                               type="text"
                                               name="time_value"
                                               value="<?php echo htmlspecialchars($row['time_value']); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Facebook Link</label>
                                        <input class="form-control"
                                               type="text"
                                               name="facebook"
                                               value="<?php echo htmlspecialchars($row['facebook']); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Linkedin Link</label>
                                        <input class="form-control"
                                               type="text"
                                               name="linkedin"
                                               value="<?php echo htmlspecialchars($row['linkedin']); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Address Map (Embed iframe)</label>
                                        <textarea class="form-control"
                                                  rows="5"
                                                  name="map"><?php echo htmlspecialchars($row['map']); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Office Address</label>
                                        <textarea name="address"
                                                  id="editor1"
                                                  rows="5"
                                                  cols="30"><?php echo htmlspecialchars($row['address']); ?></textarea>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" name="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
</body>
</html>
