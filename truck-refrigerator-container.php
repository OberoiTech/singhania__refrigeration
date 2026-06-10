<!DOCTYPE html>
<html lang="zxx">
<head>
<?php include('head.php'); ?>
<style>

/* ================= ROOT ================= */
:root{
  --ink:#0f2442;
  --card:#ffffff;
  --line:#e7ecf5;
  --brand:#243865;
}

/* ================= HERO ================= */
.rs-breadcrumbs.bg-7{
  position:relative;
  background:linear-gradient(180deg,#0f1a39 0%,#0c1224 100%);
}
.rs-breadcrumbs .content-part{padding:90px 0;}

.hero-card{
  max-width:760px;
  background:rgba(255,255,255,.08);
  border:1px solid rgba(255,255,255,.18);
  border-radius:18px;
  padding:32px;
  color:#fff;
  box-shadow:0 30px 70px rgba(0,0,0,.35);
  backdrop-filter: blur(6px);
}
.hero-card h1{
  font-size:42px;
  font-weight:800;
  color:#fff;
}
.hero-card p{
  color:#dfe6ff;
  margin-top:10px;
}

/* ================= SECTION ================= */
.section-pad{padding:70px 0 100px;}
.h2{font-size:28px;font-weight:800;color:var(--ink);margin:28px 0 12px;}
.lead{color:#2c3e68;font-size:16px;line-height:1.7;}

/* ================= MAIN IMAGE ================= */
.prod-media{
  border-radius:18px;
  overflow:hidden;
  box-shadow:0 30px 70px rgba(16,28,52,.20);
  margin-bottom:30px;
}
.prod-media img{
  width:100%;
  aspect-ratio:16/9;
  object-fit:cover;
  transition:.6s;
}
.prod-media:hover img{transform:scale(1.05);}

/* ================= MID GALLERY ================= */
.mid-gallery{
  display:grid;
  grid-template-columns:repeat(2,1fr);
  gap:30px;
  margin:50px 0;
}
.mid-card{
  position:relative;
  border-radius:18px;
  overflow:hidden;
  box-shadow:0 20px 60px rgba(16,28,52,.16);
  transition:.4s;
}
.mid-card img{
  width:100%;
  height:320px;
  object-fit:cover;
  transition:.6s;
}
.mid-card:hover{
  transform:translateY(-8px);
  box-shadow:0 35px 80px rgba(16,28,52,.25);
}
.mid-card:hover img{transform:scale(1.06);}
.caption{
  position:absolute;
  bottom:18px;
  left:18px;
  background:rgba(14,35,68,.95);
  color:#fff;
  padding:10px 18px;
  border-radius:10px;
  font-size:14px;
  font-weight:600;
}

/* ================= HIGHLIGHTS ================= */
.card-lite{
  background:var(--card);
  border:1px solid var(--line);
  border-radius:18px;
  padding:28px;
  box-shadow:0 18px 50px rgba(16,28,52,.12);
  margin-top:40px;
}
.feature-list{list-style:none;padding:0;margin-top:15px;}
.feature-list li{
  padding-left:30px;
  margin-bottom:12px;
  position:relative;
  font-weight:500;
}
.feature-list li:before{
  content:"";
  position:absolute;
  left:0;
  top:6px;
  width:18px;
  height:18px;
  border-radius:50%;
  background:var(--brand);
}

/* ================= BOTTOM GALLERY ================= */
.bottom-gallery{
  display:grid;
  grid-template-columns:repeat(2,1fr);
  gap:30px;
  margin-top:70px;
}
.bottom-card{
  position:relative;
}
.bottom-card img{
  width:100%;
  height:260px;
  object-fit:cover;
  border-radius:16px;
  box-shadow:0 20px 60px rgba(16,28,52,.15);
  transition:.4s;
}
.bottom-card img:hover{
  transform:translateY(-6px);
  box-shadow:0 30px 75px rgba(16,28,52,.25);
}
.bottom-caption{
  margin-top:10px;
  font-weight:600;
  color:#2c3e68;
  font-size:14px;
}

/* ================= SIDEBAR ================= */
.project-sidebar .sb-project-detail{
  background:#fff;
  border:1px solid var(--line);
  border-radius:18px;
  box-shadow:0 20px 60px rgba(16,28,52,.12);
  padding:24px;
}
.project-sidebar .title{
  font-weight:800;
  color:var(--ink);
  margin-bottom:18px;
}
.project-sidebar ul{list-style:none;padding:0;}
.project-sidebar li a{
  display:block;
  padding:10px 14px;
  border-radius:10px;
  margin-bottom:6px;
  text-decoration:none;
  color:#33446f;
  transition:.3s;
}
.project-sidebar li a:hover{
  background:#eef2ff;
}
.project-sidebar li a.active{
  background:linear-gradient(180deg,#2b427f,#243865);
  color:#fff;
  box-shadow:0 10px 30px rgba(20,36,86,.30);
}

/* ================= RESPONSIVE ================= */
@media(max-width:991px){
  .mid-gallery,
  .bottom-gallery{
    grid-template-columns:1fr;
  }
  .mid-card img,
  .bottom-card img{
    height:220px;
  }
}

</style>
</head>

<body>
<?php include('header.php'); ?>

<div class="main-content">

<!-- HERO -->
<div class="rs-breadcrumbs bg-7">
<div class="container">
<div class="content-part">
<div class="hero-card">
<span style="font-size:12px;letter-spacing:.18em;">PRODUCT</span>
<h1>Truck’s Refrigerator Containers</h1>
<p>Rugged insulated containers with reliable cooling to protect temperature-sensitive cargo end-to-end.</p>
</div>
</div>
</div>
</div>

<section class="section-pad">
<div class="container">
<div class="row">

<div class="col-lg-8">

<!-- TOP IMAGE -->
<div class="prod-media">
<img src="assets/images/products/truck-ac-re.jpg" alt="Truck refrigerator container">
</div>

<h2 class="h2">Key Product Features</h2>
<p class="lead">
Singhania Refrigeration Truck's Refrigerator Containers are designed with a robust structure and high-performance PUF insulation...
</p>

<!-- MID 2 IMAGES -->
<div class="mid-gallery">

<div class="mid-card">
<img src="assets/images/products/truck-1.jpeg" alt="Heavy-duty insulated exterior">
<div class="caption">Heavy-Duty Insulated Exterior</div>
</div>

<div class="mid-card">
<img src="assets/images/products/truck-2.jpeg" alt="PUF insulated hygienic interior">
<div class="caption">PUF Insulated Hygienic Interior</div>
</div>

</div>

<!-- HIGHLIGHTS -->
<div class="card-lite">
<h4 style="font-weight:800;color:var(--ink);">Highlights</h4>
<ul class="feature-list">
<li>High-density PUF insulation</li>
<li>Robust frame for long-distance</li>
<li>Rapid pull-down refrigeration</li>
<li>Temperature monitoring options</li>
<li>Nationwide AMC support</li>
</ul>
</div>

<!-- REMAINING 4 IMAGES -->
<div class="bottom-gallery">

<div class="bottom-card">
<img src="assets/images/products/truck-3.jpeg" alt="Optimized airflow and structure">
<div class="bottom-caption">Optimized Airflow & Structure</div>
</div>

<div class="bottom-card">
<img src="assets/images/products/truck-4.jpeg" alt="Advanced cooling distribution">
<div class="bottom-caption">Advanced Cooling Distribution</div>
</div>

<div class="bottom-card">
<img src="assets/images/products/truck-5.jpeg" alt="Carrier refrigeration unit">
<div class="bottom-caption">Carrier Refrigeration Unit</div>
</div>

<div class="bottom-card">
<img src="assets/images/products/truck-ac-re.jpg" alt="Reliable cold chain transportation">
<div class="bottom-caption">Reliable Cold Chain Transportation</div>
</div>

</div>

</div>

<!-- SIDEBAR -->
<div class="col-lg-4">
<div class="project-sidebar">
<div class="sb-project-detail">
<h4 class="title">Products</h4>
<ul>
<li><a href="truck-ac.php">Truck’s AC</a></li>
<li><a class="active" href="truck-refrigerator-container.php">Truck’s Refrigerator Containers</a></li>
<li><a href="cold-storage-refrigeration-units.php">Cold Storage Refrigeration Units</a></li>
<li><a href="compressor-rack-system.php">Compressor Rack System</a></li>
<li><a href="ammonia-refrigeration-units.php">Ammonia Refrigeration Units</a></li>
<li><a href="ripening-systems.php">Ripening Systems</a></li>
<li><a href="multideck-cabinet.php">Multideck Cabinet</a></li>
<li><a href="iqf.php">IQF (Individual Quick Freeze)</a></li>
<li><a href="doors-ca-doors.php">Doors & CA Doors</a></li>
<li><a href="panels.php">PUF Panels</a></li>
<li><a href="dock-shelter-dock-leveler.php">Dock Shelter & Dock Leveler</a></li>
<li><a href="heavy-duty-racks.php">Heavy Duty Racks</a></li>
</ul>
</div>
</div>
</div>

</div>
</div>
</section>

</div>

<?php include('footer.php'); ?>
</body>
</html>
