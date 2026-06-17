<?php
include('config.php'); 
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

/* Recent data for dashboard widgets */
$recentEnquiries = mysqli_query(
    $conn,
    "SELECT * FROM enquiry ORDER BY id DESC LIMIT 5"
);

$recentBlogs = mysqli_query(
    $conn,
    "SELECT * FROM blogs ORDER BY created_at DESC, id DESC LIMIT 5"
);

/* Recent Training enquiries (last 10) */
$recentTraining = mysqli_query(
    $conn,
    "SELECT * FROM training ORDER BY created_at DESC, id DESC LIMIT 10"
);

/* KPI COUNTS */
$enquiryCount = 0;
$trainingCount = 0;
$blogCount = 0;
$teamCount = 0;

$res = mysqli_query($conn, "SELECT COUNT(*) AS c FROM enquiry");
if ($res) {
    $row = mysqli_fetch_assoc($res);
    $enquiryCount = (int)$row['c'];
}

$res = mysqli_query($conn, "SELECT COUNT(*) AS c FROM training");
if ($res) {
    $row = mysqli_fetch_assoc($res);
    $trainingCount = (int)$row['c'];
}

$res = mysqli_query($conn, "SELECT COUNT(*) AS c FROM blogs");
if ($res) {
    $row = mysqli_fetch_assoc($res);
    $blogCount = (int)$row['c'];
}

$res = mysqli_query($conn, "SELECT COUNT(*) AS c FROM teams");
if ($res) {
    $row = mysqli_fetch_assoc($res);
    $teamCount = (int)$row['c'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin - Singhania</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Dashboard UI overrides -->
    <style>
      /* Overall background of content area – light gradient */
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

      /* Metric cards */
      .widget-small {
        border-radius: 18px;
        padding: 14px 16px;
        border: 1px solid rgba(148, 163, 184, 0.25);
        background: linear-gradient(135deg, #ffffff, #f9fafb);
        box-shadow:
          0 12px 28px rgba(15, 23, 42, 0.08),
          0 0 0 1px rgba(148, 163, 184, 0.06);
        display: flex;
        align-items: center;
        gap: 14px;
        transition: transform 0.12s ease, box-shadow 0.12s ease, border-color 0.12s ease;
      }

      .widget-small .icon {
        width: 46px;
        height: 46px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: radial-gradient(circle at top, #0ea5e9, #0369a1);
        color: #e0f2fe;
        box-shadow: 0 10px 24px rgba(37, 99, 235, 0.45);
        flex-shrink: 0;
      }

      .widget-small.primary .icon {
        background: radial-gradient(circle at top, #0ea5e9, #0369a1);
      }
      .widget-small.info .icon {
        background: radial-gradient(circle at top, #22c55e, #15803d);
      }
      .widget-small.warning .icon {
        background: radial-gradient(circle at top, #facc15, #eab308);
        color: #1f2937;
      }
      .widget-small.danger .icon {
        background: radial-gradient(circle at top, #fb7185, #b91c1c);
      }

      .widget-small .info h4 {
        margin: 0 0 4px;
        font-size: 13px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #64748b;
      }

      .widget-small .info h4 a {
        color: inherit;
        text-decoration: none;
      }

      .widget-small .info h4 a:hover {
        text-decoration: underline;
      }

      .widget-small .info p {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
      }

      .widget-small:hover {
        transform: translateY(-3px);
        box-shadow:
          0 18px 40px rgba(15, 23, 42, 0.14),
          0 0 0 1px rgba(59, 130, 246, 0.25);
        border-color: rgba(59, 130, 246, 0.45);
      }

      .row > [class*="col-"] {
        margin-bottom: 18px;
      }
      h4 a {
        color: #000 !important;
      }

      /* Recent list cards */
      .tile.sr-tile {
        border-radius: 18px;
        border: 1px solid rgba(148, 163, 184, 0.2);
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.06);
        background: rgba(255, 255, 255, 0.96);
      }

      .sr-section-title {
        font-size: 15px;
        font-weight: 600;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
      }

      .sr-section-title i {
        color: #0ea5e9;
      }

      .sr-mini-table {
        width: 100%;
        font-size: 13px;
      }

      .sr-mini-table th {
        background: #eff6ff;
        color: #1f2937;
        font-weight: 600;
        border-color: #e5e7eb;
      }

      .sr-mini-table td {
        border-color: #e5e7eb;
        vertical-align: middle;
      }

      .sr-badge {
        display: inline-flex;
        align-items: center;
        padding: 2px 8px;
        border-radius: 999px;
        font-size: 11px;
        background: #e0f2fe;
        color: #0369a1;
        font-weight: 500;
      }

      .sr-link-small {
        font-size: 11px;
        color: #2563eb;
        text-decoration: none;
      }

      .sr-link-small:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include('header.php'); ?>
    <!-- Sidebar menu-->  
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include('side.php'); ?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>

      <!-- KPI row: Enquiry, Training, Blogs, Team -->
      <div class="row">
        <!-- ENQUIRY -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-envelope-open fa-3x"></i>
            <div class="info">
              <h4><a href="enquiry-details.php">Enquiry</a></h4>
              <p><b><?php echo $enquiryCount; ?></b></p>
            </div>
          </div>
        </div>

        <!-- TRAINING ENQUIRY -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon">
            <i class="icon fa fa-graduation-cap fa-3x"></i>
            <div class="info">
              <h4><a href="training-details.php">Training Enquiry</a></h4>
              <p><b><?php echo $trainingCount; ?></b></p>
            </div>
          </div>
        </div>

        <!-- BLOGS -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon">
            <i class="icon fa fa-file-text-o fa-3x"></i>
            <div class="info">
              <h4><a href="blogs-details.php">Blogs</a></h4>
              <p><b><?php echo $blogCount; ?></b></p>
            </div>
          </div>
        </div>

        <!-- TEAMS -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon">
            <i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4><a href="teams-details.php">Team</a></h4>
              <p><b><?php echo $teamCount; ?></b></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Enquiries + Recent Blogs -->
      <div class="row">
        <!-- Recent Enquiries -->
        <div class="col-md-6">
          <div class="tile sr-tile">
            <div class="sr-section-title">
              <i class="fa fa-clock-o"></i> Recent Enquiries
              <span class="sr-badge" style="margin-left:8px;">Last 5</span>
            </div>
            <div class="table-responsive">
              <table class="table table-hover sr-mini-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name / Company</th>
                    <th>Email / Phone</th>
                    <th style="width:120px;">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if ($recentEnquiries && mysqli_num_rows($recentEnquiries) > 0) {
                    while ($enq = mysqli_fetch_assoc($recentEnquiries)) {
                      $created = isset($enq['created_at']) ? $enq['created_at'] : '';
                      ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td>
                          <strong><?php echo htmlspecialchars($enq['name']); ?></strong><br>
                          <small><?php echo htmlspecialchars($enq['company']); ?></small>
                        </td>
                        <td>
                          <small><?php echo htmlspecialchars($enq['email']); ?></small><br>
                          <small><?php echo htmlspecialchars($enq['phone']); ?></small>
                        </td>
                        <td>
                          <small><?php echo $created ? date('d M Y H:i', strtotime($created)) : '-'; ?></small>
                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="4"><em>No enquiries found.</em></td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div style="margin-top:6px;">
              <a href="enquiry-details.php" class="sr-link-small">
                View all enquiries &raquo;
              </a>
            </div>
          </div>
        </div>

        <!-- Recent Blogs -->
        <div class="col-md-6">
          <div class="tile sr-tile">
            <div class="sr-section-title">
              <i class="fa fa-file-text-o"></i> Recent Blogs
              <span class="sr-badge" style="margin-left:8px;">Last 5</span>
            </div>
            <div class="table-responsive">
              <table class="table table-hover sr-mini-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th style="width:140px;">Published</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $j = 1;
                  if ($recentBlogs && mysqli_num_rows($recentBlogs) > 0) {
                    while ($blog = mysqli_fetch_assoc($recentBlogs)) {
                      ?>
                      <tr>
                        <td><?php echo $j++; ?></td>
                        <td>
                          <strong><?php echo htmlspecialchars($blog['title']); ?></strong>
                        </td>
                        <td>
                          <small><?php echo date('d M Y H:i', strtotime($blog['created_at'])); ?></small>
                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="3"><em>No blogs found.</em></td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div style="margin-top:6px;">
              <a href="blogs-details.php" class="sr-link-small">
                View all blogs &raquo;
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Training Enquiries -->
      <div class="row">
        <div class="col-md-12">
          <div class="tile sr-tile">
            <div class="sr-section-title">
              <i class="fa fa-graduation-cap"></i> Recent Training Enquiries
              <span class="sr-badge" style="margin-left:8px;">Last 10</span>
            </div>
            <div class="table-responsive">
              <table class="table table-hover sr-mini-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email / Phone</th>
                    <th>Subject</th>
                    <th style="width:140px;">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $k = 1;
                  if ($recentTraining && mysqli_num_rows($recentTraining) > 0) {
                    while ($tr = mysqli_fetch_assoc($recentTraining)) {
                      ?>
                      <tr>
                        <td><?php echo $k++; ?></td>
                        <td><strong><?php echo htmlspecialchars($tr['name']); ?></strong></td>
                        <td>
                          <small><?php echo htmlspecialchars($tr['email']); ?></small><br>
                          <small><?php echo htmlspecialchars($tr['mobile']); ?></small>
                        </td>
                        <td><small><?php echo htmlspecialchars($tr['subject']); ?></small></td>
                        <td>
                          <small><?php echo $tr['created_at'] ? date('d M Y H:i', strtotime($tr['created_at'])) : '-'; ?></small>
                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="5"><em>No training enquiries found.</em></td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div style="margin-top:6px;">
              <a href="training-details.php" class="sr-link-small">
                View all training enquiries &raquo;
              </a>
            </div>
          </div>
        </div>
      </div>

    </main>

    <!-- JS -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>

    <script type="text/javascript">
      // Charts kept optional – only if canvas exists
      (function() {
        var lineCanvas = document.getElementById('lineChartDemo');
        var pieCanvas  = document.getElementById('pieChartDemo');

        if (lineCanvas && pieCanvas && window.Chart) {
          var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [
              {
                label: "Enquiries",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56]
              },
              {
                label: "Services",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86]
              }
            ]
          };

          var pdata = [
            {
              value: 300,
              color: "#46BFBD",
              highlight: "#5AD3D1",
              label: "Complete"
            },
            {
              value: 50,
              color:"#F7464A",
              highlight: "#FF5A5E",
              label: "In-Progress"
            }
          ];

          var ctxl = lineCanvas.getContext("2d");
          var lineChart = new Chart(ctxl).Line(data);

          var ctxp = pieCanvas.getContext("2d");
          var pieChart = new Chart(ctxp).Pie(pdata);
        }
      })();
    </script>
  </body>
</html>
