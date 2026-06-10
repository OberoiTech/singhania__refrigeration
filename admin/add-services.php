<?php
error_reporting(0);
include('config.php');
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";
$msg   = "";
$color = "";

if (isset($_POST['submit'])) {

    $name        = isset($_POST['title']) ? trim($_POST['title']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    if (!empty($_FILES['image']['name'])) {
        $uploadDir  = "uploads/";
        $imageName  = basename($_FILES['image']['name']);
        $path       = $uploadDir . $imageName;

        if ($name !== '' && $description !== '') {
            // Move file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                // Save to DB
                $rs = "INSERT INTO services (title, description, image) 
                       VALUES ('" . mysqli_real_escape_string($conn, $name) . "',
                               '" . mysqli_real_escape_string($conn, $description) . "',
                               '" . mysqli_real_escape_string($conn, $imageName) . "')";
                $result = mysqli_query($conn, $rs);

                if ($result) {
                    echo "<script>alert('Success: Record Added Successfully');window.location.href='services-details.php';</script>";
                    exit;
                } else {
                    $color = "alert alert-danger";
                    $msg   = "Error: Something went wrong while saving.";
                }
            } else {
                $color = "alert alert-danger";
                $msg   = "Error: Unable to upload image.";
            }
        } else {
            $color = "alert alert-danger";
            $msg   = "Please fill all required fields.";
        }
    } else {
        $color = "alert alert-danger";
        $msg   = "Please choose a service image.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Services Form</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Page UI overrides -->
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

        .tile-body {
            padding-top: 4px;
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
            min-height: 150px;
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

        .alert {
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 13px;
            margin-bottom: 14px;
        }

        .alert label {
            margin: 0;
        }

        .ck-editor__editable {
            min-height: 180px;
        }
    </style>
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
                <h1><i class="fa fa-cogs"></i> Add Service</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <a href="services-details.php" class="btn btn-primary btn-sm">
                        <i class="fa fa-list"></i> Services Details
                    </a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <?php if (!empty($msg)) : ?>
                            <div class="<?php echo $color; ?>">
                                <label><?php echo htmlspecialchars($msg); ?></label>
                            </div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data" action="">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Title <span style="color:red;">*</span></label>
                                    <input class="form-control"
                                           type="text"
                                           placeholder="Enter service title"
                                           name="title"
                                           required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Image <span style="color:red;">*</span></label>
                                    <input class="form-control"
                                           type="file"
                                           name="image"
                                           required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Description <span style="color:red;">*</span></label>
                                    <textarea class="form-control"
                                              placeholder="Enter detailed description"
                                              name="description"
                                              id="description"
                                              required
                                              cols="20"
                                              rows="10"></textarea>
                                </div>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" name="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i> Submit
                                </button>
                            </div>
                        </form>

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
    <script src="js/plugins/pace.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description');
    </script>
    <style>
        .cke_notifications_area {
            display: none !important;
        }
    </style>
</body>
</html>
