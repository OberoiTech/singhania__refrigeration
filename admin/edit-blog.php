<?php
include('config.php');
include('blog-seo-validation.php');
session_start();

$error = "";
$msg = "";
$color = "";
error_reporting(0);
$id =$_GET['id'];

$query =mysqli_query($conn,"SELECT c.id AS cate_id, c.category_name AS category, b.id AS id, b.title, b.author, b.description, b.meta_title, b.meta_description, b.keywords, b.image,b.thumb_image FROM category c JOIN blogs b ON b.cate_id = c.id where b.id='$id'");
$row=mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $uploadDir = "uploads/";
    $cate_id = $_POST['cate_id'];
    $name = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $metaTitle = isset($_POST['meta_title']) ? trim($_POST['meta_title']) : '';
    $metaDescription = isset($_POST['meta_description']) ? trim($_POST['meta_description']) : '';
    $keywords = isset($_POST['keywords']) ? trim($_POST['keywords']) : '';
    $old_image = $_POST['old_image'];
    $old_thumb = $_POST['old_thumb'];
    [$seoData, $seoErrors] = sr_prepare_blog_seo_fields($metaTitle, $metaDescription, $keywords);

    $row['cate_id'] = $cate_id;
    $row['title'] = $name;
    $row['author'] = $author;
    $row['description'] = $description;
    $row['meta_title'] = $seoData['meta_title'];
    $row['meta_description'] = $seoData['meta_description'];
    $row['keywords'] = $seoData['keywords'];

    if (!empty($seoErrors)) {
        $color = "alert alert-danger";
        $msg = implode(' ', $seoErrors);
    } else {
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $imagePath = $uploadDir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $image = $old_image; 
    }
    if (!empty($_FILES['thumb_image']['name'])) {
        $thumb_image = $_FILES['thumb_image']['name'];
        $thumbPath = $uploadDir . basename($thumb_image);
        move_uploaded_file($_FILES['thumb_image']['tmp_name'], $thumbPath);
    } else {
        $thumb_image = $old_thumb; // purana use karo
    }

    // Update query
    $rs = "UPDATE blogs
           SET title='" . mysqli_real_escape_string($conn, $name) . "', cate_id='" . mysqli_real_escape_string($conn, $cate_id) . "', author='" . mysqli_real_escape_string($conn, $author) . "', description='" . mysqli_real_escape_string($conn, $description) . "',
               meta_title='" . mysqli_real_escape_string($conn, $seoData['meta_title']) . "', meta_description='" . mysqli_real_escape_string($conn, $seoData['meta_description']) . "', keywords='" . mysqli_real_escape_string($conn, $seoData['keywords']) . "',
               image='" . mysqli_real_escape_string($conn, $image) . "', thumb_image='" . mysqli_real_escape_string($conn, $thumb_image) . "'
           WHERE id='" . $id . "'";
           
    $result = mysqli_query($conn, $rs);

    if ($result) {
        echo "<script>alert('Success: Record Updated Successfully');window.location.href='blogs-details.php';</script>";
    } else {
        echo "<script>alert('Error: Something Not Updated');</script>";
    }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Blog</title>
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
                <h1>Edit Blog</h1>
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
                        <div class="<?= $color; ?>"><label for=""><?= $msg; ?></label></div>
                        <div>
                            <form method="post" enctype="multipart/form-data" action="#">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Category </label>
                                        <select class="form-control" required name="cate_id">
                                            <option value="">Select Category</option>
                                            <?php
                                                $selectedMenu = $row['cate_id']; 
                                                $rs = "SELECT * FROM category";
                                                $result = mysqli_query($conn, $rs);
                                                while($row1 = mysqli_fetch_object($result)) {
                                                    $selected = ($row1->id == $selectedMenu) ? "selected" : "";
                                            ?>
                                                <option value="<?php echo $row1->id; ?>" <?php echo $selected; ?>>
                                                    <?php echo htmlspecialchars($row1->category_name, ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Title</label>
                                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>"
                                            name="title" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Author</label>
                                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8'); ?>"
                                            name="author" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Post Image</label>
                                        <img src="uploads/<?php echo htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8'); ?>" height="80px;" width="80px;">
                                        <input class="form-control" type="file" name="image" >
                                            <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8'); ?>">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Thumb Image</label>
                                        <img src="uploads/<?php echo htmlspecialchars($row['thumb_image'], ENT_QUOTES, 'UTF-8'); ?>" height="80px;" width="80px;">
                                        <input class="form-control" type="file" name="thumb_image" >
                                        <input type="hidden" name="old_thumb" value="<?php echo htmlspecialchars($row['thumb_image'], ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Description</label><span
                                            style="color:red;">*</span>
                                        <textarea class="form-control" type="text" name="description" id="description" required><?php echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Meta Title</label><span
                                            style="color:red;">*</span>
                                        <input class="form-control"
                                            type="text"
                                            name="meta_title"
                                            minlength="30"
                                            maxlength="60"
                                            value="<?php echo htmlspecialchars($row['meta_title'], ENT_QUOTES, 'UTF-8'); ?>"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Keywords</label><span
                                            style="color:red;">*</span>
                                        <input class="form-control"
                                            type="text"
                                            name="keywords"
                                            maxlength="255"
                                            value="<?php echo htmlspecialchars($row['keywords'], ENT_QUOTES, 'UTF-8'); ?>"
                                            required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Meta Description</label><span
                                            style="color:red;">*</span>
                                        <textarea class="form-control"
                                            name="meta_description"
                                            minlength="50"
                                            maxlength="160"
                                            required
                                            rows="4"><?php echo htmlspecialchars($row['meta_description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                    </div>
                                    
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit" name="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
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
