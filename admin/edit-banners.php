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
    echo "<script>alert('Error: Invalid banner ID');window.location.href='banners-details.php';</script>";
    exit;
}

$query = mysqli_query(
    $conn,
    "SELECT 
        m.id AS menu_id,
        m.title,
        b.id AS id,
        b.image AS image,
        b.created_at AS created_at
     FROM menus m
     JOIN banners b ON b.menu_name = m.id
     WHERE b.id = {$id}"
);
$row = mysqli_fetch_assoc($query);

if (!$row) {
    echo "<script>alert('Error: Banner not found');window.location.href='banners-details.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = "uploads/";
        $imageName = basename($_FILES['image']['name']);
        $path      = $uploadDir . $imageName;

        $menuName = isset($_POST['menu_name']) ? trim($_POST['menu_name']) : '';

        if (!empty($menuName)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {

                $menuEsc  = mysqli_real_escape_string($conn, $menuName);
                $imageEsc = mysqli_real_escape_string($conn, $imageName);

                $rs = "
                    UPDATE banners 
                    SET 
                        menu_name = '{$menuEsc}',
                        image     = '{$imageEsc}'
                    WHERE id = {$id}
                ";

                $result = mysqli_query($conn, $rs);
                if ($result) {
                    echo "<script>alert('Success: Record Updated Successfully');window.location.href='banners-details.php';</script>";
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
            $msg   = "Please select a menu.";
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
    <title>Edit Banner</title>
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
            content: "\f03e"; /* fa-picture-o */
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

        .current-banner-img {
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
                <h1>Edit Banner</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <a href="banners-details.php" class="btn btn-primary btn-sm">
                        <i class="fa fa-list"></i> Banner List
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
                                <div class="form-group col-md-8">
                                    <label class="control-label">Menu (Banner Position) <span style="color:red;">*</span></label>
                                    <select class="form-control" required name="menu_name">
                                        <option value="">Select Menu</option>
                                        <?php
                                            $selectedMenu = $row['menu_id'];
                                            $rsMenus = "SELECT * FROM menus";
                                            $resultMenus = mysqli_query($conn, $rsMenus);
                                            while ($row1 = mysqli_fetch_object($resultMenus)) {
                                                $selected = ($row1->id == $selectedMenu) ? "selected" : "";
                                        ?>
                                            <option value="<?php echo $row1->id; ?>" <?php echo $selected; ?>>
                                                <?php echo htmlspecialchars($row1->title); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="control-label">Banner Image <span style="color:red;">*</span></label>
                                    <?php if (!empty($row['image'])): ?>
                                        <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>"
                                             alt="Current Banner"
                                             class="current-banner-img"
                                             height="80"
                                             width="220">
                                    <?php endif; ?>
                                    <input class="form-control" type="file" name="image" required>
                                    <small class="text-muted" style="font-size:11px;">
                                        Recommended size: same ratio as current banner on website.
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
</body>

</html>
