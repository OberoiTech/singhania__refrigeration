<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Popup Enquiry List - Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
      .app-breadcrumb .breadcrumb-item a,
      .app-breadcrumb .breadcrumb-item i {
        color: #fff;
      }

      .tile {
        border-radius: 18px;
        border: 1px solid rgba(148, 163, 184, 0.25);
        box-shadow: 0 16px 35px rgba(15, 23, 42, 0.08);
        background: #ffffff;
        padding: 18px 20px 18px;
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

      .btn-xs {
        padding: 4px 8px;
        font-size: 11px;
        border-radius: 999px;
      }

      .table-responsive {
        border-radius: 12px;
        overflow: hidden;
      }

      .dataTables_wrapper .dataTables_filter input,
      .dataTables_wrapper .dataTables_length select {
        border-radius: 999px;
        border: 1px solid #cbd5f5;
        font-size: 12px;
      }

      .dataTables_wrapper .dataTables_filter input {
        padding: 4px 9px;
      }

      .dataTables_wrapper .dataTables_info,
      .dataTables_wrapper .dataTables_paginate {
        font-size: 12px;
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
          <h1><i class="fa fa-window-restore"></i> Popup Enquiry List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">Popup Enquiry Details</a></li>
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $i = 1;
                      $query = "SELECT * FROM popup_enquiry ORDER BY id DESC";
                      $row = mysqli_query($conn, $query);
                      if ($row) {
                        while ($result = mysqli_fetch_assoc($row)) {
                    ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo htmlspecialchars($result['name'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($result['email'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($result['mobile'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($result['created_at'] ?? ''); ?></td>
                        <td>
                          <a href="delete.php?id=<?php echo (int)$result['id']; ?>&type=popup_enquiry"
                             class="btn btn-danger btn-xs"
                             onclick="return confirm('Are you sure you want to delete this popup enquiry?');">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php
                        }
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#sampleTable').DataTable({
        "order": [[0, "asc"]]
      });
    </script>
  </body>
</html>
