<?php
error_reporting(0);
session_start();
include('config.php');

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blogs List</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- UI overrides -->
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
            gap: 10px;
        }

        .app-title h1 i {
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
            color: #64748b;
        }

        .tile {
            border-radius: 18px;
            border: 1px solid rgba(148, 163, 184, 0.25);
            box-shadow: 0 16px 35px rgba(15, 23, 42, 0.08);
            background: #ffffff;
            padding: 18px 20px 20px;
        }

        .tile-body {
            padding-top: 4px;
        }

        .table {
            margin-bottom: 0;
            font-size: 12px;
            table-layout: fixed;
            width: 100% !important;
        }

        .table thead th {
            border-bottom-width: 1px;
            background: linear-gradient(90deg, #eff6ff, #e0f2fe);
            color: #1f2933;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            border-top: none;
            white-space: nowrap;
        }

        .table tbody tr:hover {
            background-color: #f9fafb;
        }

        .table tbody td {
            vertical-align: top;
            color: #111827;
            padding: 12px 10px;
        }

        .sr-desc-cell {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.55;
        }

        .sr-blog-title {
            color: #0f172a;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.45;
            margin-bottom: 8px;
        }

        .sr-muted-line {
            color: #64748b;
            font-size: 11px;
            line-height: 1.45;
            margin-top: 4px;
        }

        .sr-meta-block + .sr-meta-block {
            margin-top: 8px;
            padding-top: 8px;
            border-top: 1px solid #edf2f7;
        }

        .sr-meta-label {
            color: #2563eb;
            display: block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.08em;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .sr-image-stack {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 92px;
        }

        .sr-image-label {
            color: #64748b;
            display: block;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .sr-blog-thumb-main,
        .sr-blog-thumb-small {
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.2);
        }

        .sr-blog-thumb-main {
            width: 92px;
            height: 54px;
        }

        .sr-blog-thumb-small {
            width: 92px;
            height: 54px;
        }

        .sr-action-cell {
            display: flex;
            gap: 6px;
            justify-content: center;
        }

        .btn-sm {
            border-radius: 999px;
            padding: 4px 10px;
            font-size: 11px;
        }

        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
            overflow-y: hidden;
            width: 100%;
        }

        #sampleTable th:nth-child(1),
        #sampleTable td:nth-child(1) {
            width: 55px;
        }

        #sampleTable th:nth-child(2),
        #sampleTable td:nth-child(2) {
            width: 24%;
        }

        #sampleTable th:nth-child(3),
        #sampleTable td:nth-child(3) {
            width: 34%;
        }

        #sampleTable th:nth-child(4),
        #sampleTable td:nth-child(4) {
            width: 21%;
        }

        #sampleTable th:nth-child(5),
        #sampleTable td:nth-child(5) {
            width: 115px;
        }

        #sampleTable th:nth-child(6),
        #sampleTable td:nth-child(6) {
            width: 95px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 999px;
            border: 1px solid #cbd5f5;
            padding: 4px 9px;
            font-size: 12px;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 999px;
            border: 1px solid #cbd5f5;
            font-size: 12px;
        }

        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            font-size: 12px;
        }

        @media (max-width: 991px) {
            .table {
                min-width: 980px;
            }
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
                <h1><i class="fa fa-th-list"></i> Blogs List</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <a href="add-blog.php" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Add Blog
                    </a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Blog Details</th>
                                        <th>SEO Details</th>
                                        <th>Content</th>
                                        <th>Images</th>
                                        <th style="width:120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query = "
                                        SELECT 
                                            c.id            AS cate_id,
                                            c.category_name AS category,
                                            b.id            AS id,
                                            b.title,
                                            b.author,
                                            b.meta_title,
                                            b.meta_description,
                                            b.keywords,
                                            b.description,
                                            b.image,
                                            b.thumb_image
                                        FROM blogs b
                                        JOIN category c ON b.cate_id = c.id
                                        ORDER BY b.id DESC
                                    ";

                                    $row = mysqli_query($conn, $query);
                                    while ($result = mysqli_fetch_assoc($row)) {

                                        $fullDesc  = strip_tags($result['description']);
                                        $shortDesc = substr($fullDesc, 0, 160);
                                        if (strlen($fullDesc) > 160) {
                                            $shortDesc .= '...';
                                        }

                                        $metaTitle = !empty($result['meta_title']) ? $result['meta_title'] : 'Not added';
                                        $metaDescription = !empty($result['meta_description']) ? $result['meta_description'] : 'Not added';
                                        $keywords = !empty($result['keywords']) ? $result['keywords'] : 'Not added';
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <div class="sr-blog-title">
                                                <?php echo htmlspecialchars($result['title'], ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                            <div class="sr-muted-line">
                                                <strong>Category:</strong>
                                                <?php echo htmlspecialchars($result['category'], ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                            <div class="sr-muted-line">
                                                <strong>Author:</strong>
                                                <?php echo htmlspecialchars($result['author'], ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="sr-meta-block">
                                                <span class="sr-meta-label">Meta Title</span>
                                                <div class="sr-desc-cell" title="<?php echo htmlspecialchars($metaTitle, ENT_QUOTES, 'UTF-8'); ?>">
                                                    <?php echo htmlspecialchars($metaTitle, ENT_QUOTES, 'UTF-8'); ?>
                                                </div>
                                            </div>
                                            <div class="sr-meta-block">
                                                <span class="sr-meta-label">Meta Description</span>
                                                <div class="sr-desc-cell" title="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>">
                                                    <?php echo htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>
                                                </div>
                                            </div>
                                            <div class="sr-meta-block">
                                                <span class="sr-meta-label">Keywords</span>
                                                <div class="sr-desc-cell" title="<?php echo htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'); ?>">
                                                    <?php echo htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="sr-desc-cell" title="<?php echo htmlspecialchars($fullDesc, ENT_QUOTES, 'UTF-8'); ?>">
                                                <?php echo htmlspecialchars($shortDesc, ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="sr-image-stack">
                                            <?php if (!empty($result['image'])) : ?>
                                                <div>
                                                <span class="sr-image-label">Post</span>
                                                <img class="sr-blog-thumb-main"
                                                     src="<?php echo 'uploads/' . htmlspecialchars($result['image'], ENT_QUOTES, 'UTF-8'); ?>"
                                                     alt="<?php echo htmlspecialchars($result['title'], ENT_QUOTES, 'UTF-8'); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($result['thumb_image'])) : ?>
                                                <div>
                                                <span class="sr-image-label">Thumb</span>
                                                <img class="sr-blog-thumb-small"
                                                     src="<?php echo 'uploads/' . htmlspecialchars($result['thumb_image'], ENT_QUOTES, 'UTF-8'); ?>"
                                                     alt="<?php echo htmlspecialchars($result['title'], ENT_QUOTES, 'UTF-8'); ?>">
                                                </div>
                                            <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="sr-action-cell">
                                            <a href="edit-blog.php?id=<?php echo (int)$result['id']; ?>"
                                               class="btn btn-success btn-sm"
                                               title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="delete.php?id=<?php echo (int)$result['id']; ?>&type=blog"
                                               class="btn btn-danger btn-sm"
                                               title="Delete"
                                               onclick="return confirm('Are you sure you want to delete this blog?');">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
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
    <script src="js/plugins/pace.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable({
            "order": [[0, "asc"]],
            "autoWidth": false
        });
    </script>
</body>
</html>
