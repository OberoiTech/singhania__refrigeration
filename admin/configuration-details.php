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
    <title>Configuration List</title>
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
            font-size: 13px;
        }

        .table thead th {
            border-bottom-width: 1px;
            background: linear-gradient(90deg, #eff6ff, #e0f2fe);
            color: #1f2933;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            border-top: none;
        }

        .table tbody tr:hover {
            background-color: #f9fafb;
        }

        .table tbody td {
            vertical-align: middle;
            color: #111827;
        }

        .sr-cell-ellipsis {
            max-width: 160px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sr-address-cell {
            max-width: 260px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-sm {
            border-radius: 999px;
            padding: 4px 10px;
            font-size: 11px;
        }

        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
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

        /* map iframe thumbnail */
        iframe {
            width: 120px;
            height: 100px;
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
                <h1><i class="fa fa-th-list"></i> Configuration List</h1>
            </div>
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
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Time</th>
                                        <th>Facebook</th>
                                        <th>LinkedIn</th>
                                        <th>Map</th>
                                        <th>Address</th>
                                        <th style="width:120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i     = 1;
                                    $query = "SELECT * FROM configuration";
                                    $row   = mysqli_query($conn, $query);
                                    while ($result = mysqli_fetch_assoc($row)) {
                                        $fbFull   = $result['facebook'];
                                        $lnFull   = $result['linkedin'];
                                        $addrFull = $result['address'];

                                        $fbShort   = substr($fbFull, 0, 40) . (strlen($fbFull) > 40 ? '...' : '');
                                        $lnShort   = substr($lnFull, 0, 40) . (strlen($lnFull) > 40 ? '...' : '');
                                        $addrShort = substr($addrFull, 0, 80) . (strlen($addrFull) > 80 ? '...' : '');
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo htmlspecialchars($result['mobile']); ?></td>
                                        <td><?php echo htmlspecialchars($result['email']); ?></td>
                                        <td><?php echo htmlspecialchars($result['time_value']); ?></td>
                                        <td class="sr-cell-ellipsis"
                                            title="<?php echo htmlspecialchars($fbFull); ?>">
                                            <?php echo htmlspecialchars($fbShort); ?>
                                        </td>
                                        <td class="sr-cell-ellipsis"
                                            title="<?php echo htmlspecialchars($lnFull); ?>">
                                            <?php echo htmlspecialchars($lnShort); ?>
                                        </td>
                                        <td>
                                            <?php
                                            // map field might contain iframe or URL; keep raw to preserve embed
                                            echo $result['map'];
                                            ?>
                                        </td>
                                        <td class="sr-address-cell"
                                            title="<?php echo htmlspecialchars($addrFull); ?>">
                                            <?php echo htmlspecialchars($addrShort); ?>
                                        </td>
                                        <td>
                                            <a href="edit-configuration.php?id=<?php echo (int)$result['id']; ?>"
                                               class="btn btn-success btn-sm"
                                               title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="delete.php?id=<?php echo (int)$result['id']; ?>&type=configuration"
                                               class="btn btn-danger btn-sm"
                                               title="Delete"
                                               onclick="return confirm('Are you sure you want to delete this configuration?');">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
            "order": [[0, "asc"]]
        });
    </script>
</body>
</html>
