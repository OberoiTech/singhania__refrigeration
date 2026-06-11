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

    $cate_id     = isset($_POST['cate_id']) ? trim($_POST['cate_id']) : '';
    $name        = isset($_POST['title']) ? trim($_POST['title']) : '';
    $author      = isset($_POST['author']) ? trim($_POST['author']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    if (!empty($_FILES['image']['name']) && !empty($_FILES['thumb_image']['name'])) {

        $uploadDir   = "uploads/";
        $image       = $_FILES['image']['name'];
        $imagePath   = $uploadDir . basename($image);
        $thumb_image = $_FILES['thumb_image']['name'];
        $thumbPath   = $uploadDir . basename($thumb_image);

        if ($name !== '' && $author !== '' && $cate_id !== '' && $description !== '') {

            $movedMain  = move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $movedThumb = move_uploaded_file($_FILES['thumb_image']['tmp_name'], $thumbPath);

            if ($movedMain && $movedThumb) {
                $rs = "
                    INSERT INTO blogs (cate_id, title, author, description, image, thumb_image)
                    VALUES (
                        '" . mysqli_real_escape_string($conn, $cate_id) . "',
                        '" . mysqli_real_escape_string($conn, $name) . "',
                        '" . mysqli_real_escape_string($conn, $author) . "',
                        '" . mysqli_real_escape_string($conn, $description) . "',
                        '" . mysqli_real_escape_string($conn, $image) . "',
                        '" . mysqli_real_escape_string($conn, $thumb_image) . "'
                    )
                ";

                $result = mysqli_query($conn, $rs);

                if ($result) {
                    echo "<script>alert('Success: Record Added Successfully');window.location.href='blogs-details.php';</script>";
                    exit;
                } else {
                    $color = "alert alert-danger";
                    $msg   = "Error: Something went wrong while saving.";
                }
            } else {
                $color = "alert alert-danger";
                $msg   = "Error: Image upload failed. Please try again.";
            }

        } else {
            $color = "alert alert-danger";
            $msg   = "Please fill all required fields.";
        }
    } else {
        $color = "alert alert-danger";
        $msg   = "Please choose both Post Image and Thumb Image.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Blog Form</title>
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
            min-height: 160px;
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
                <h1><i class="fa fa-pencil-square-o"></i> Add Blog</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <a href="blogs-details.php" class="btn btn-primary btn-sm">
                        <i class="fa fa-list"></i> Blog Details
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
                                    <label class="control-label">Category Name <span style="color:red;">*</span></label>
                                    <select class="form-control" required name="cate_id">
                                        <option value="">Select Category</option>
                                        <?php
                                        $rsCat   = "SELECT * FROM category ORDER BY category_name ASC";
                                        $resultC = mysqli_query($conn, $rsCat);
                                        while ($row = mysqli_fetch_object($resultC)) { ?>
                                            <option value="<?php echo $row->id; ?>">
                                                <?php echo htmlspecialchars($row->category_name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Title <span style="color:red;">*</span></label>
                                    <input class="form-control"
                                           type="text"
                                           placeholder="Enter blog title"
                                           name="title"
                                           required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Author <span style="color:red;">*</span></label>
                                    <input class="form-control"
                                           type="text"
                                           placeholder="Author"
                                           name="author"
                                           required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label class="control-label">Post Image (1200 × 600) <span style="color:red;">*</span></label>
                                    <input class="form-control"
                                           type="file"
                                           name="image"
                                           required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Thumb Image (1200 × 600) <span style="color:red;">*</span></label>
                                    <input class="form-control"
                                           type="file"
                                           name="thumb_image"
                                           required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">Description <span style="color:red;">*</span></label>
                                    <textarea class="form-control"
                                              placeholder="Enter blog content"
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
    <!-- The javascript plugin to display page loading on top-->
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
