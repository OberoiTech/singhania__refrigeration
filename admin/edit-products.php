<?php
include('config.php');
session_start();
error_reporting(0);

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";
$msg   = "";
$color = "";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo "<script>alert('Error: Invalid product ID');window.location.href='products-details.php';</script>";
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM products WHERE id = '{$id}'");
$row   = mysqli_fetch_assoc($query);

if (!$row) {
    echo "<script>alert('Error: Product not found');window.location.href='products-details.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = "uploads/";
        $imageName = basename($_FILES['image']['name']);
        $path      = $uploadDir . $imageName;

        $name        = isset($_POST['title']) ? trim($_POST['title']) : '';
        $description = isset($_POST['description']) ? trim($_POST['description']) : '';

        if ($name !== '') {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {

                $nameEsc        = mysqli_real_escape_string($conn, $name);
                $descEsc        = mysqli_real_escape_string($conn, $description);
                $imageEsc       = mysqli_real_escape_string($conn, $imageName);

                $rs = "
                    UPDATE products 
                    SET 
                        title       = '{$nameEsc}',
                        description = '{$descEsc}',
                        image       = '{$imageEsc}'
                    WHERE id = {$id}
                ";

                $result = mysqli_query($conn, $rs);
                if ($result) {
                    echo "<script>alert('Success: Record Updated Successfully');window.location.href='products-details.php';</script>";
                    exit;
                } else {
                    $color = "alert alert-danger";
                    $msg   = "Error: Something not updated.";
                }
            } else {
                $color = "alert alert-danger";
                $msg   = "Error: Image upload failed.";
            }
        } else {
            $color = "alert alert-danger";
            $msg   = "Fill all the fields.";
        }
    } else {
        $color = "alert alert-danger";
        $msg   = "Please choose an image.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Products</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- UI overrides to match new Singhania Admin -->
    <style>

        .cke_notifications_area {
            display: none;

        }
        
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
            content: "\f02d"; /* fa-book */
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
            min-height: 140px;
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

        .current-product-img {
            display: block;
            margin-bottom: 8px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            object-fit: cover;
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
                <h1>Edit Products</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <a href="products-details.php" class="btn btn-primary btn-sm">
                        <i class="fa fa-list"></i> Product List
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
                                           name="title"
                                           required
                                           placeholder="Enter product title"
                                           value="<?php echo htmlspecialchars($row['title']); ?>">
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">Description <span style="color:red;">*</span></label>
                                    <textarea class="form-control"
                                              name="description"
                                              id="description"
                                              required><?php echo htmlspecialchars($row['description']); ?></textarea>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label">Image <span style="color:red;">*</span></label>
                                    <?php if (!empty($row['image'])): ?>
                                        <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>"
                                             alt="Current Product Image"
                                             class="current-product-img"
                                             height="80"
                                             width="80">
                                    <?php endif; ?>
                                    <input class="form-control" type="file" name="image" required>
                                    <small class="text-muted" style="font-size:11px;">
                                        Upload a new product image to replace the existing one.
                                    </small>
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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>

</html>
