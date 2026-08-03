<?php ///error_reporting(0);
include('admin/config.php');

$record = mysqli_query($conn,"select * from configuration");
$row = mysqli_fetch_assoc($record);

$email    = $row['email'];
$mobile   = $row['mobile'];
$time     = $row['time_value'];
$facebook = $row['facebook'];
$linkedin = $row['linkedin'];
$map      = $row['map'];
$address  = $row['address'];
$mailSubject = rawurlencode('Website enquiry from Singhania Refrigeration');
$mailHref = 'mailto:' . rawurlencode($email) . '?subject=' . $mailSubject;
$mobileDigits = preg_replace('/\D+/', '', (string)$mobile);
$contactPhones = array_values(array_filter([
  $mobileDigits ? ['label' => '+91-' . $mobileDigits, 'href' => 'tel:+91' . $mobileDigits] : null,
  ['label' => '+91-7303099094', 'href' => 'tel:+917303099094'],
  ['label' => '+91-9718097170', 'href' => 'tel:+919718097170'],
]));
?>

<?php
// --- Active menu helpers (robust) ---
$uriPath = '';
if (!empty($_SERVER['SCRIPT_NAME'])) {
  $uriPath = $_SERVER['SCRIPT_NAME'];              // /folder/about-us.php
} elseif (!empty($_SERVER['REQUEST_URI'])) {
  $uriPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '';
}
$curBase = basename($uriPath) ?: 'index.php';      // about-us.php or index.php

if (!function_exists('isActive')) {
  function isActive(string $page, string $curBase): string {
    return strcasecmp($page, $curBase) === 0 ? 'current-menu-item' : '';
  }
}
if (!function_exists('isActiveA')) {
  function isActiveA(string $page, string $curBase): string {
    return strcasecmp($page, $curBase) === 0 ? 'active' : '';
  }
}
if (!function_exists('anyActive')) {
  function anyActive(array $pages, string $curBase): string {
    $cur = strtolower($curBase);
    foreach ($pages as $p) { if (strtolower($p) === $cur) return 'current-menu-item'; }
    return '';
  }
}

// Convert internal PHP filenames to their public, extension-free URLs.
if (!function_exists('publicPageUrl')) {
  function publicPageUrl(string $path): string {
    $parts = parse_url($path);
    $file = basename($parts['path'] ?? $path);
    $routes = [
      'index.php' => './',
      'truck-ac.php' => 'truck-ac-installation-india',
      'truck-refrigerator-container.php' => 'truck-refrigerator-container-manufacturer-in-india',
      'cold-storage-refrigeration-units.php' => 'cold-storage-refrigeration-units-manufacturer-in-india',
      'compressor-rack-system.php' => 'compressor-rack-system-manufacturer-in-india',
      'ammonia-refrigeration-units.php' => 'ammonia-refrigeration-units-manufacturer-in-india',
      'freon-refrigeration-units.php' => 'freon-refrigeration-in-india',
      'ripening-systems.php' => 'ripening-systems-manufacturer-in-india',
      'multideck-cabinet.php' => 'multideck-cabinet-manufacturer-in-india',
      'iqf.php' => 'iqf-system-manufacturer-in-india',
      'doors-ca-doors.php' => 'cold-storage-doors-manufacturer-in-india',
      'panels.php' => 'puf-panels-manufacturer-in-india',
      'dock-shelter-dock-leveler.php' => 'dock-shelter-dock-leveler-manufacturer-in-india',
      'heavy-duty-racks.php' => 'heavy-duty-racks-manufacturer-in-india',
      'turnkey-solution.php' => 'turnkey-cold-storage-solutions-in-india',
      'segments-wise.php' => 'segment-wise-cold-storage-solutions-in-india',
      'cold-chain-refrigeration-ca-store-freon-ammonia.php' => 'cold-chain-refrigeration-ca-store-freon-ammonia-in-india',
      'quality-monitoring-solution.php' => 'cold-chain-quality-monitoring-solution-in-india',
      'ware-house-management.php' => 'warehouse-management-solutions-in-india',
      'transport-management.php' => 'transport-management-solutions-in-india',
      'transport-refrigeration.php' => 'transport-refrigeration-solutions-in-india',
    ];
    $url = $routes[$file] ?? preg_replace('/\.php$/i', '', $file);
    if (!empty($parts['query'])) $url .= '?' . $parts['query'];
    if (!empty($parts['fragment'])) $url .= '#' . $parts['fragment'];
    return $url;
  }
}

$productsPages = [
  'truck-ac.php','truck-refrigerator-container.php','cold-storage-refrigeration-units.php',
  'compressor-rack-system.php','ammonia-refrigeration-units.php','freon-refrigeration-units.php','ripening-systems.php',
  'multideck-cabinet.php','iqf.php','doors-ca-doors.php','panels.php',
  'dock-shelter-dock-leveler.php','heavy-duty-racks.php','products.php'
];
$coldStoragePages = [
  'solutions.php','turnkey-solution.php','segments-wise.php','cold-chain-refrigeration-ca-store-freon-ammonia.php',
  'quality-monitoring-solution.php','ware-house-management.php','transport-management.php',
  'transport-refrigeration.php'
];
?>

<style>
/* Header layout */
.full-width-header .rs-header .menu-area { padding:14px 0; background:#fff; }
.full-width-header .rs-header .menu-area .container .row{
  align-items:center;
  flex-wrap:nowrap;
}
.full-width-header .rs-header .menu-area .logo-area{
  display:flex;
  align-items:center;
}
.full-width-header .rs-header .menu-area .logo-area img {
  display:block;
  width:240px;
  max-width:100%;
  max-height:132px;
  object-fit:contain;
  transition:.4s;
  -webkit-transition:.4s;
}
.full-width-header .rs-header .menu-area.sticky .logo-area img {
  width:195px;
  max-height:92px;
}
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu li { display:inline-block; margin-right:0 !important; padding:0; }
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu li a { transition:all .3s ease; font-size:13px !important; }
.readon-custom { outline:none; padding:11px 11px; border:none; border-radius:10px; display:inline-block; text-transform:uppercase; font-size:13px; font-family:'Poppins',sans-serif; font-weight:500; color:#fff; background:#082243; transition:all .3s ease; }
.full-width-header .rs-header .menu-area.sticky .expand-btn-inner li.search-parent { display:block; }

.full-width-header .rs-header .menu-area .rs-menu-area{
  display:flex;
  align-items:center;
  justify-content:flex-end;
  gap:22px;
  width:100%;
}
.full-width-header .rs-header .menu-area .rs-menu-area .main-menu{ flex:1; }

.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu{
  display:flex;
  align-items:center;
  justify-content:center;
  gap:16px;
  margin:0;
  flex-wrap:nowrap;
}
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li{ margin:0 !important; }

:root{ --navNavy:#0e2344; }

.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li > a{
  display:inline-flex; align-items:center; justify-content:center; height:50px; padding:0 12px; border-radius:5px;
  line-height:1; font-weight:700; letter-spacing:0; color:#0f2442;
  text-align:center; white-space:nowrap;
  transition:background .2s ease, color .2s ease, box-shadow .2s ease;
}
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li > a:hover,
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li > a:focus,
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li.current-menu-item > a{
  background:var(--navNavy); color:#fff !important; box-shadow:0 6px 16px rgba(14,35,68,.22);
}
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li{ background:transparent !important; }

.menu-cta{ display:inline-flex; align-items:center; flex:0 0 auto; }
.menu-cta.menu-cta--flush{ margin-left:0; }
.menu-cta .btn-cfa{
  display:inline-flex; align-items:center; justify-content:center; min-height:50px; padding:0 18px; border-radius:5px;
  background:var(--navNavy); color:#fff !important; font-weight:700; text-decoration:none;
  box-shadow:0 8px 22px rgba(14,35,68,.28); transition:transform .1s ease, box-shadow .2s ease, background .2s ease;
  min-width: 140px;
  white-space:nowrap;
}
.menu-cta .btn-cfa:hover{ transform:translateY(-1px); background:#132e5f; color:#fff !important; box-shadow:0 12px 28px rgba(14,35,68,.34); }
.full-width-header .rs-header .menu-area.sticky .menu-cta .btn-cfa{ height:46px; padding:0 16px; border-radius:10px; }
@media (min-width:992px) and (max-width:1199px){
  .full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu{ gap:8px; }
  .full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li > a{ padding:0 9px; font-size:12px !important; }
  .menu-cta .btn-cfa{ min-width:118px; padding:0 14px; }
}
@media (max-width:991px){
  .full-width-header .rs-header .menu-area .container .row{ flex-wrap:wrap; }
  .full-width-header .rs-header .menu-area .logo-area img{ width:195px; max-height:96px; }
  .menu-cta{ display:none; }
}

.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li .sub-menu{
  margin-top:12px; border-radius:12px; padding:10px 8px; box-shadow:0 18px 40px rgba(0,0,0,.18); border:1px solid rgba(0,0,0,.06);
}
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li .sub-menu li a{
  border-radius:5px; padding:10px 12px; line-height:1.2;
}
.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li .sub-menu li a:hover{
  background:rgba(14,35,68,.08); color:#fff !important;
}

/* Keep the long Products menu compact and fully visible on desktop. */
@media (min-width:992px){
  .full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li .products-sub-menu{
    width:520px;
    display:grid;
    grid-template-columns:repeat(2, minmax(0, 1fr));
    gap:2px 8px;
    padding:10px;
  }
  .full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li .products-sub-menu li{
    display:block;
    width:100%;
    min-width:0;
  }
  .full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li .products-sub-menu li a{
    display:block;
    padding:8px 10px !important;
    line-height:1.35;
  }
}

/* Mobile/off-canvas visibility */
@media (max-width:991px){ .rs-menu{ display:none; } .mobile-menu{ display:block; } .rs-menu-area{ justify-content:flex-end; } .menu-cta{ margin-left:15px; } }
@media (min-width:992px){ .mobile-menu{ display:none; } nav.right_menu_togle{ right:-340px !important; visibility:hidden; } }
.logo-area.logo-area--tall{ max-height:none; }

/* Mobile drawer */
nav.right_menu_togle{
  position:fixed;
  top:0;
  right:-340px;
  width:320px;
  max-width:calc(100vw - 48px);
  height:100dvh;
  padding:0 0 24px;
  background:#fff;
  box-shadow:-18px 0 50px rgba(6,38,74,.2);
  overflow-x:hidden;
  overflow-y:auto;
  transition:right .3s ease-in-out;
  z-index:2000;
}
nav.right_menu_togle.open{ right:0; }
.body-overlay{
  position:fixed;
  inset:0;
  z-index:1990;
  display:block;
  background:rgba(5,18,38,.58);
  opacity:0;
  visibility:hidden;
  transition:opacity .25s ease, visibility .25s ease;
}
.body-overlay.active{ opacity:1; visibility:visible; }
body.menu-open{ overflow:hidden; }
.right_menu_togle .close-btn{
  position:sticky;
  top:0;
  z-index:3;
  display:flex;
  justify-content:flex-end;
  padding:16px 18px 12px;
  background:rgba(255,255,255,.97);
  border-bottom:1px solid #edf1f6;
}
.right_menu_togle .close-btn .close{
  display:grid;
  place-items:center;
  width:38px;
  height:38px;
  padding:0;
  border:0;
  border-radius:10px;
  background:#0e2344;
  color:#fff;
  font-size:25px;
  line-height:1;
  opacity:1;
  cursor:pointer;
  box-shadow:0 7px 18px rgba(14,35,68,.2);
}
.canvas-menu-content{ padding:10px 18px 8px; }
.mobile-drawer-info{ margin:4px 18px 24px; padding:13px; border-radius:12px; background:#0e2344; }
.mobile-drawer-info > a{ display:flex; gap:8px; padding:5px 0; color:#fff !important; font-size:12px; line-height:1.45; text-decoration:none; overflow-wrap:anywhere; }
.mobile-drawer-info > a i{ width:14px; margin-top:2px; text-align:center; }
.mobile-drawer-phone-list{ display:grid; gap:4px; padding:5px 0; }
.mobile-drawer-phone-list a{ display:flex; gap:8px; color:#fff !important; font-size:12px; line-height:1.45; text-decoration:none; }
.mobile-drawer-phone-list i{ width:14px; margin-top:2px; text-align:center; }
/* .mobile-drawer-socials{ display:flex; gap:7px; margin-top:9px; }
.mobile-drawer-socials a{ display:grid; place-items:center; width:30px; height:30px; border-radius:7px; background:rgba(255,255,255,.12); color:#fff !important; transition:transform .18s ease, background .2s ease; }
.mobile-drawer-socials a:hover{ transform:scale(1.08); background:rgba(255,255,255,.18); } */
.mobile-drawer-socials{ display:flex; gap:7px; margin-top:9px; }
.mobile-drawer-socials a{ display:grid; place-items:center; width:30px; height:30px; border-radius:7px; background:rgba(255,255,255,.12); color:#fff !important; transition:transform .18s ease, background .2s ease; }
.mobile-drawer-socials a:hover{ transform:scale(1.08); background:rgba(255,255,255,.18); }
.mobile-drawer-socials a:hover .fa-facebook{ color:#1877f2 !important; }
.mobile-drawer-socials a:hover .fa-x-twitter{ color:#000000 !important; }
.mobile-drawer-socials a:hover .fa-instagram{ color:#e4405f !important; }
.mobile-drawer-socials a:hover .fa-linkedin-square{ color:#0a66c2 !important; }
.mobile-drawer-socials a:hover .fa-pinterest-p{ color:#e60023 !important; }
.mobile-drawer-socials a:hover .fa-youtube-play{ color:#ff0000 !important; }

.mobile-drawer-sites{ margin-top:11px; padding-top:10px; border-top:1px solid rgba(255,255,255,.18); }
.mobile-drawer-sites summary{ display:flex; align-items:center; gap:7px; color:#fff; font-size:12px; font-weight:700; cursor:pointer; list-style:none; }
.mobile-drawer-sites summary::-webkit-details-marker{ display:none; }
.mobile-drawer-sites summary::after{ content:"\f107"; margin-left:auto; font-family:FontAwesome; transition:transform .2s ease; }
.mobile-drawer-sites[open] summary::after{ transform:rotate(180deg); }
.mobile-drawer-sites div{ display:grid; gap:3px; margin-top:8px; }
.mobile-drawer-sites div a{ padding:7px 8px; border-radius:6px; background:rgba(255,255,255,.08); color:#fff !important; font-size:11px; line-height:1.35; text-decoration:none; }
.right_menu_togle .mobile-nav-menu{ list-style:none; margin:0; padding:0; }
.right_menu_togle .mobile-nav-menu > li{ position:relative; margin:0; border-bottom:1px solid #e7ecf3; }
.right_menu_togle .mobile-nav-menu > li:last-child{ border-bottom:0; }
.right_menu_togle .mobile-nav-menu a{
  display:block;
  padding:14px 12px;
  border-radius:8px;
  color:#0f2442 !important;
  font-size:15px;
  line-height:1.35;
  font-weight:600;
  text-decoration:none;
}
/* .right_menu_togle .mobile-nav-menu a:hover,
.right_menu_togle .mobile-nav-menu a.active{ background:#eef4fb; color:#1268d7 !important; } */
.right_menu_togle .mobile-nav-menu .sub-menu{
  display:none;
  position:static;
  width:100%;
  margin:0 0 10px;
  padding:7px;
  border:0;
  border-radius:10px;
  background:#0e2344;
  box-shadow:none;
  list-style:none;
}
.right_menu_togle .mobile-nav-menu .sub-menu.open{ display:block; }
.right_menu_togle .mobile-nav-menu .sub-menu li{ margin:0; border-bottom:1px solid #e6ebf2; }
.right_menu_togle .mobile-nav-menu .sub-menu li:last-child{ border-bottom:0; }
.right_menu_togle .mobile-nav-menu .sub-menu li a{ width:auto; padding:10px 11px; color:white !important; font-size:13px; font-weight:500; }
.right_menu_togle .mobile-nav-menu .has-submenu > a{ position:relative; padding-right:42px; }
.right_menu_togle .mobile-nav-menu .has-submenu > a::after{
  content:"\f105";
  position:absolute;
  top:50%;
  right:14px;
  font-family:FontAwesome;
  transform:translateY(-50%);
  transition:transform .3s ease;
}
.right_menu_togle .mobile-nav-menu .has-submenu.active > a::after{ transform:translateY(-50%) rotate(90deg); }
@media (max-width:420px){
  nav.right_menu_togle{ width:300px; max-width:calc(100vw - 36px); }
  .canvas-menu-content{ padding-right:14px; padding-left:14px; }
}

.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu > li > a.active{
  background:var(--navNavy); color:#fff !important; box-shadow:0 6px 16px rgba(14,35,68,.22);
}

/**/
/* Toolbar alignment */
.full-width-header .toolbar-area{
  display:flex;
  align-items:center;
  min-height:56px;
  padding:0;
}
.full-width-header .toolbar-area .row{
  display:flex;
  align-items:center;
  flex-wrap:nowrap;
}
.full-width-header .toolbar-area .col-md-8,
.full-width-header .toolbar-area .col-md-4{
  float:none;
  width:auto;
  max-width:none;
}
.full-width-header .toolbar-area .col-md-8{
  flex:1 1 auto;
  min-width:0;
}
.full-width-header .toolbar-area .col-md-4{
  flex:0 0 auto;
  margin-left:auto;
}
.toolbar-contact{
  min-width:0;
}
.toolbar-contact ul,
.toolbar-sl-share > ul{
  display:flex;
  align-items:center;
  flex-wrap:nowrap;
  gap:26px;
  margin:0;
  padding:0;
  list-style:none;
}
.toolbar-contact ul li,
.toolbar-sl-share > ul li{
  display:inline-flex;
  align-items:center;
  margin:0;
  white-space:nowrap;
  line-height:1;
}
.toolbar-contact ul li:last-child{
  min-width:0;
}
.toolbar-contact ul li:last-child a{
  min-width:0;
  overflow:hidden;
  text-overflow:ellipsis;
}
.toolbar-contact ul li{
  gap:6px;
}
.toolbar-contact ul li a,
.toolbar-sl-share > ul li a{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  line-height:1;
}
.toolbar-contact ul li i,
.toolbar-sl-share > ul li i{
  line-height:1;
}
.toolbar-phone-links{
  display:inline-flex;
  align-items:center;
  gap:8px;
  min-width:0;
}
.toolbar-phone-links a{
  color:inherit;
  text-decoration:none;
}
.toolbar-phone-links .phone-sep{
  opacity:.72;
}
/* =========================
   GROUP WEBSITES DROPDOWN (TOP BAR)
========================= */
.toolbar-sl-share{
  display:flex;
  align-items:center;
  justify-content:flex-end;
  gap:18px;
  width:100%;
  min-width:0;
  flex-wrap:nowrap;
}
.toolbar-sl-share > ul{ gap:18px; }

/* .group-sites{ position:relative; flex:0 0 auto; } */
.toolbar-sl-share > ul{ gap:18px; }
.toolbar-sl-share > ul li a{ transition:color .2s ease, transform .18s ease; }
.toolbar-sl-share > ul li a:hover{ transform:translateY(-1px); }
.toolbar-sl-share > ul li a:hover .fa-facebook{ color:#1877f2 !important; }
.toolbar-sl-share > ul li a:hover .fa-x-twitter{ color:#000000 !important; }
.toolbar-sl-share > ul li a:hover .fa-instagram{ color:#e4405f !important; }
.toolbar-sl-share > ul li a:hover .fa-linkedin-square{ color:#0a66c2 !important; }
.toolbar-sl-share > ul li a:hover .fa-pinterest-p{ color:#e60023 !important; }
.toolbar-sl-share > ul li a:hover .fa-youtube-play{ color:#ff0000 !important; }

.group-sites{ position:relative; flex:0 0 auto; }

.group-sites-btn{
  border:none;
  outline:none;
  cursor:pointer;
  display:inline-flex;
  align-items:center;
  gap:10px;
  height:44px;
  padding:0 14px;
  border-radius:999px;
  background: rgba(255,255,255,.12);
  color:#fff;
  font-weight:800;
  font-size:13px;
  box-shadow:0 10px 26px rgba(0,0,0,.18);
  backdrop-filter: blur(8px);
  transition: transform .12s ease, box-shadow .2s ease, background .2s ease;
}
.group-sites-btn:hover{
  transform: translateY(-1px);
  background: rgba(255,255,255,.18);
  box-shadow:0 14px 32px rgba(0,0,0,.22);
}
.group-sites-btn i{ font-size:14px; opacity:.95; }

.group-sites-btn .gs-text{
  display:flex;
  flex-direction:column;
  line-height:1.05;
  text-align:left;
}
.group-sites-btn .gs-title 
{  
    font-size: 12px;
    opacity: .95;
    font-family: sans-serif;
    font-weight: 600;
}
.group-sites-btn .gs-sub{ font-size:11px; opacity:.85; font-weight:700; }
.group-sites-btn .gs-caret{ font-size:11px; opacity:.9; }

.group-sites-menu{
    position: absolute;
    top: 49px;
    right: 0;
    min-width: 250px;
    padding: 10px;
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 18px 40px rgba(0, 0, 0, .18);
    border: 1px solid rgba(0, 0, 0, .06);
    display: none;
    z-index: 99999;
    font-family: sans-serif;
    font-weight: 600;
}
.group-sites-menu a{
  display:block;
  padding:8px 12px;
  border-radius:10px;
  text-decoration:none;
  color:#0f2442;
  font-weight:800;
  font-size:13px;
}

.full-width-header .toolbar-area .toolbar-sl-share ul li {
    padding: 0;
}
.group-sites-menu a:hover{
  background: rgba(14,35,68,.08);
}
.group-sites.open .group-sites-menu{ display:block; }
.group-sites.open .gs-caret{ transform: rotate(180deg); }

/* Mobile: compact */
@media (max-width: 767px){
  .group-sites-btn{
    height:40px;
    padding:0 12px;
    gap:8px;
    font-size:12px;
  }
  .group-sites-btn .gs-title{ font-size:11px; }
  .group-sites-btn .gs-sub{ display:none; }
  .group-sites-menu{ top:48px; min-width:220px; }
}

@media (min-width: 992px) and (max-width: 1199px){
  .full-width-header .toolbar-area{ min-height:52px; }
  .toolbar-contact ul{ gap:14px; }
  .toolbar-contact ul li,
  .toolbar-contact ul li a{ font-size:12px; }
  .toolbar-sl-share{ gap:12px; }
  .toolbar-sl-share > ul{ gap:13px; }
  .group-sites-btn{ height:38px; padding:0 12px; gap:8px; }
  .group-sites-btn .gs-title{ font-size:11px; }
}

@media (min-width: 1200px){
  .toolbar-contact ul li:last-child a{
    overflow:visible;
    text-overflow:clip;
  }
}

@media (max-width: 991px){
  .full-width-header .toolbar-area{ display:none; }
  .mobile-drawer-info{ margin-bottom:20px; }
  .mobile-drawer-info > a{ align-items:flex-start; }
  .mobile-drawer-socials{
    flex-wrap:wrap;
    align-items:center;
  }
}

</style>


<div class="full-width-header">
  <!-- Toolbar -->
  <div class="toolbar-area hidden-md">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="toolbar-contact">
            <ul>
              <li><i class="fa fa-envelope"></i><a href="<?php echo htmlspecialchars($mailHref, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Email Singhania Refrigeration"><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></a></li>
              <li>
                <i class="fa fa-phone"></i>
                <span class="toolbar-phone-links">
                  <?php foreach ($contactPhones as $index => $phone): ?>
                    <?php if ($index > 0): ?><span class="phone-sep">/</span><?php endif; ?>
                    <a href="<?php echo htmlspecialchars($phone['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($phone['label'], ENT_QUOTES, 'UTF-8'); ?></a>
                  <?php endforeach; ?>
                </span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="toolbar-sl-share">
            <ul>
                <li><a href="https://www.facebook.com/profile.php?id=61579480251463" aria-label="Visit Singhania Refrigeration on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://x.com/SinghaniaR59102" aria-label="Visit Singhania Refrigeration on X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/singhaniarefrigeration/" aria-label="Visit Singhania Refrigeration on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://www.linkedin.com/company/singhania-refrigeration-and-supply-chain-consultancy/" aria-label="Visit Singhania Refrigeration on LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href="https://in.pinterest.com/singhaniarefrigeration24/" aria-label="Visit Singhania Refrigeration on Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UC-g2bewulBb2oGjPGIDAaJA" aria-label="Visit Singhania Refrigeration on YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
            </ul>
            <div class="group-sites" id="groupSites">
              <button type="button" class="group-sites-btn" id="groupSitesBtn" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-globe"></i>
                <span class="gs-text">
                  <span class="gs-title">Group Websites</span>
                  <!--<span class="gs-sub">Select Website</span>-->
                </span>
                <i class="fa fa-chevron-down gs-caret"></i>
              </button>
            
              <div class="group-sites-menu" id="groupSitesMenu" role="menu" aria-label="Group Websites">
                <a role="menuitem" href="https://singhanialogistics.in/" target="_blank" rel="noopener">Singhania Logistics</a>
                <a role="menuitem" href="https://singhaniaretail.com/" target="_blank" rel="noopener">Singhania Retail</a>
                <a role="menuitem" href="https://singhaniaretail.com/" target="_blank" rel="noopener">Singhania Retail Exim</a>
                <a role="menuitem" href="https://singhaniafoundation.com/" target="_blank" rel="noopener">Singhania Foundation</a>
                <a role="menuitem" href="https://globalsoulhealing.com/" target="_blank" rel="noopener">Global Soul Healing</a>
                <a role="menuitem" href="https://singhaniaroyalfurniture.com/" target="_blank" rel="noopener">Singhania Royal Furniture</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header id="rs-header" class="rs-header">
    <div class="menu-area menu-sticky">
      <div class="container">
        <div class="row">
          <div class="col-lg-2">
            <div class="logo-area logo-area--tall">
              <a href="https://singhaniarefrigeration.com/"><img src="assets/images/logoS.avif" width="1536" height="864" alt="Singhania Refrigeration"></a>
            </div>
          </div>
          <div class="col-lg-10 text-right">
            <div class="rs-menu-area d-flex align-items-center justify-content-between">
              <div class="main-menu flex-grow-1">
                <a class="rs-menu-toggle" role="button" aria-label="Open menu" aria-controls="mobileDrawer" aria-expanded="false"><i class="fa fa-bars"></i></a>

                <!-- ===== DESKTOP MENU (updated to use helpers) ===== -->
                <nav class="rs-menu pr-50">
                  <ul class="nav-menu">
                    <li class="menu-item <?php echo isActive('index.php', $curBase); ?>">
                      <a class="<?php echo isActiveA('index.php', $curBase); ?>" href="https://singhaniarefrigeration.com/">Home</a>
                    </li>

                    <li class="menu-item <?php echo isActive('about-us.php', $curBase); ?>">
                      <a class="<?php echo isActiveA('about-us.php', $curBase); ?>" href="about-us">About</a>
                    </li>
                    <li class="menu-item  <?php echo anyActive($productsPages, $curBase); ?>">
                      <a href="products" class="<?php echo isActiveA('products.php', $curBase); ?>">Products &amp; Services</a>
                      <ul class="sub-menu products-sub-menu">
                        <li class="<?php echo isActive('truck-ac.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('truck-ac.php', $curBase); ?>" href="truck-ac-installation-india">Truck AC</a>
                        </li>
                        <li class="<?php echo isActive('truck-refrigerator-container.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('truck-refrigerator-container.php', $curBase); ?>" href="truck-refrigerator-container-manufacturer-in-india">Refrigerated Truck Body Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('cold-storage-refrigeration-units.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('cold-storage-refrigeration-units.php', $curBase); ?>" href="cold-storage-refrigeration-units-manufacturer-in-india">Cold Storage Refrigeration Units Manufacturer </a>
                        </li>
                        <li class="<?php echo isActive('compressor-rack-system.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('compressor-rack-system.php', $curBase); ?>" href="compressor-rack-system-manufacturer-in-india">Compressor Rack System Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('ammonia-refrigeration-units.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('ammonia-refrigeration-units.php', $curBase); ?>" href="ammonia-refrigeration-units-manufacturer-in-india">Ammonia Refrigeration Units Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('freon-refrigeration-units.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('freon-refrigeration-units.php', $curBase); ?>" href="freon-refrigeration-in-india">Freon Refrigeration Units Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('ripening-systems.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('ripening-systems.php', $curBase); ?>" href="ripening-systems-manufacturer-in-india">Ripening Systems Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('multideck-cabinet.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('multideck-cabinet.php', $curBase); ?>" href="multideck-cabinet-manufacturer-in-india">Multideck Cabinet Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('iqf.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('iqf.php', $curBase); ?>" href="iqf-system-manufacturer-in-india">IQF (Individual Quick Freeze) Systems Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('doors-ca-doors.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('doors-ca-doors.php', $curBase); ?>" href="cold-storage-doors-manufacturer-in-india">Doors &amp; CA Doors Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('panels.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('panels.php', $curBase); ?>" href="puf-panels-manufacturer-in-india">Puf Panels Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('dock-shelter-dock-leveler.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('dock-shelter-dock-leveler.php', $curBase); ?>" href="dock-shelter-dock-leveler-manufacturer-in-india">Dock Shelter &amp; Dock Leveler Manufacturer</a>
                        </li>
                        <li class="<?php echo isActive('heavy-duty-racks.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('heavy-duty-racks.php', $curBase); ?>" href="heavy-duty-racks-manufacturer-in-india">Heavy Duty Racks Manufacturer</a>
                        </li>
                      </ul>
                    </li>

                    <li class="menu-item <?php echo isActive('consulting.php', $curBase); ?>">
                      <a class="<?php echo isActiveA('consulting.php', $curBase); ?>" href="consulting">Consulting</a>
                    </li>
                    <!--  menu-item-has-children -->
                    <li class="menu-item <?php echo anyActive($coldStoragePages, $curBase); ?>">  
                      <a href="solutions">Cold Storage Solutions</a>
                      <ul class="sub-menu">
                        <li class="<?php echo isActive('turnkey-solution.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('turnkey-solution.php', $curBase); ?>" href="turnkey-cold-storage-solutions-in-india">Turnkey Solution</a>
                        </li>
                        <li class="<?php echo isActive('segments-wise.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('segments-wise.php', $curBase); ?>" href="segment-wise-cold-storage-solutions-in-india">Segment Wise Solutions</a>
                        </li>
                        <li class="<?php echo isActive('cold-chain-refrigeration-ca-store-freon-ammonia.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('cold-chain-refrigeration-ca-store-freon-ammonia.php', $curBase); ?>" href="cold-chain-refrigeration-ca-store-freon-ammonia-in-india">Cold Chain Refrigeration, CA Store, Frozen/Ammonia</a>
                        </li>
                        <li class="<?php echo isActive('quality-monitoring-solution.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('quality-monitoring-solution.php', $curBase); ?>" href="cold-chain-quality-monitoring-solution-in-india">Quality Monitoring Solution</a>
                        </li>
                        <li class="<?php echo isActive('ware-house-management.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('ware-house-management.php', $curBase); ?>" href="warehouse-management-solutions-in-india">Ware House Management System</a>
                        </li>
                        <li class="<?php echo isActive('transport-management.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('transport-management.php', $curBase); ?>" href="transport-management-solutions-in-india">Transport Management System</a>
                        </li>
                        <li class="<?php echo isActive('transport-refrigeration.php', $curBase); ?>">
                          <a class="<?php echo isActiveA('transport-refrigeration.php', $curBase); ?>" href="transport-refrigeration-solutions-in-india">Transport Refrigeration</a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item <?php echo isActive('blog.php', $curBase); ?>">
                      <a class="<?php echo isActiveA('blog.php', $curBase); ?>" href="blog">Blog</a>
                    </li>
                    <li class="menu-item <?php echo isActive('contact.php', $curBase); ?>">
                      <a class="<?php echo isActiveA('contact.php', $curBase); ?>" href="contact">Contact</a>
                    </li>

                    
                  </ul>
                </nav>
                <!-- ===== /DESKTOP MENU ===== -->
              </div>

              <!-- right-aligned CTA -->
              <div class="menu-cta">
                <a class="btn-cfa" href="https://www.singhanialogistics.in/consultancy-cfa-training-services">CFA Training</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Off-canvas menu (already using helpers) -->
    <nav id="mobileDrawer" class="right_menu_togle hidden-md" aria-label="Mobile navigation" aria-hidden="true" inert>
      <div class="close-btn">
        <span id="nav-close" class="humburger">
          <button type="button" class="close" aria-label="Close" data-dismiss="modal">&times;</button>
        </span>
      </div>
      <div class="canvas-menu-content">
        <ul class="nav-menu mobile-nav-menu">
          <li class="menu-item <?php echo isActive('index.php', $curBase); ?>">
            <a class="<?php echo isActiveA('index.php', $curBase); ?>" href="https://singhaniarefrigeration.com/">Home</a>
          </li>
          <li class="menu-item <?php echo isActive('about-us.php', $curBase); ?>">
            <a class="<?php echo isActiveA('about-us.php', $curBase); ?>" href="about-us">About Us</a>
          </li>
          <li class="menu-item has-submenu <?php echo anyActive($productsPages, $curBase); ?>">
            <a href="products">Products</a>
            <ul class="sub-menu">
              <li class="<?php echo isActive('truck-ac.php', $curBase); ?>"><a class="<?php echo isActiveA('truck-ac.php', $curBase); ?>" href="truck-ac-installation-india">Truck AC</a></li>
              <li class="<?php echo isActive('truck-refrigerator-container.php', $curBase); ?>"><a class="<?php echo isActiveA('truck-refrigerator-container.php', $curBase); ?>" href="truck-refrigerator-container-manufacturer-in-india">Truck’s Refrigerator Container</a></li>
              <li class="<?php echo isActive('cold-storage-refrigeration-units.php', $curBase); ?>"><a class="<?php echo isActiveA('cold-storage-refrigeration-units.php', $curBase); ?>" href="cold-storage-refrigeration-units-manufacturer-in-india">Cold Storage Refrigeration Units</a></li>
              <li class="<?php echo isActive('compressor-rack-system.php', $curBase); ?>"><a class="<?php echo isActiveA('compressor-rack-system.php', $curBase); ?>" href="compressor-rack-system-manufacturer-in-india">Compressor Rack System</a></li>
              <li class="<?php echo isActive('ammonia-refrigeration-units.php', $curBase); ?>"><a class="<?php echo isActiveA('ammonia-refrigeration-units.php', $curBase); ?>" href="ammonia-refrigeration-units-manufacturer-in-india">Ammonia Refrigeration Units</a></li>
              <li class="<?php echo isActive('freon-refrigeration-units.php', $curBase); ?>"><a class="<?php echo isActiveA('freon-refrigeration-units.php', $curBase); ?>" href="freon-refrigeration-in-india">Freon Refrigeration Units</a></li>
              <li class="<?php echo isActive('ripening-systems.php', $curBase); ?>"><a class="<?php echo isActiveA('ripening-systems.php', $curBase); ?>" href="ripening-systems-manufacturer-in-india">Ripening Systems</a></li>
              <li class="<?php echo isActive('multideck-cabinet.php', $curBase); ?>"><a class="<?php echo isActiveA('multideck-cabinet.php', $curBase); ?>" href="multideck-cabinet-manufacturer-in-india">Multideck Cabinet</a></li>
              <li class="<?php echo isActive('iqf.php', $curBase); ?>"><a class="<?php echo isActiveA('iqf.php', $curBase); ?>" href="iqf-system-manufacturer-in-india">IQF (Individual Quick Freeze)</a></li>
              <li class="<?php echo isActive('doors-ca-doors.php', $curBase); ?>"><a class="<?php echo isActiveA('doors-ca-doors.php', $curBase); ?>" href="cold-storage-doors-manufacturer-in-india">Doors &amp; CA Doors</a></li>
              <li class="<?php echo isActive('panels.php', $curBase); ?>"><a class="<?php echo isActiveA('panels.php', $curBase); ?>" href="puf-panels-manufacturer-in-india">Puf Panels</a></li>
              <li class="<?php echo isActive('dock-shelter-dock-leveler.php', $curBase); ?>"><a class="<?php echo isActiveA('dock-shelter-dock-leveler.php', $curBase); ?>" href="dock-shelter-dock-leveler-manufacturer-in-india">Dock Shelter &amp; Dock Leveler</a></li>
              <li class="<?php echo isActive('heavy-duty-racks.php', $curBase); ?>"><a class="<?php echo isActiveA('heavy-duty-racks.php', $curBase); ?>" href="heavy-duty-racks-manufacturer-in-india">Heavy Duty Racks</a></li>
            </ul>
          </li>
          <li class="menu-item <?php echo isActive('consulting.php', $curBase); ?>">
            <a class="<?php echo isActiveA('consulting.php', $curBase); ?>" href="consulting">Consulting</a>
          </li>
          <li class="menu-item has-submenu <?php echo anyActive($coldStoragePages, $curBase); ?>">
            <a href="solutions">Cold Storage Solutions</a>
            <ul class="sub-menu">
              <li class="<?php echo isActive('turnkey-solution.php', $curBase); ?>"><a class="<?php echo isActiveA('turnkey-solution.php', $curBase); ?>" href="turnkey-cold-storage-solutions-in-india">Turnkey Solution</a></li>
              <li class="<?php echo isActive('segments-wise.php', $curBase); ?>"><a class="<?php echo isActiveA('segments-wise.php', $curBase); ?>" href="segment-wise-cold-storage-solutions-in-india">Segment Wise Solutions</a></li>
              <li class="<?php echo isActive('cold-chain-refrigeration-ca-store-freon-ammonia.php', $curBase); ?>"><a class="<?php echo isActiveA('cold-chain-refrigeration-ca-store-freon-ammonia.php', $curBase); ?>" href="cold-chain-refrigeration-ca-store-freon-ammonia-in-india">Cold Chain Refrigeration, CA Store, Frozen/Ammonia</a></li>
              <li class="<?php echo isActive('quality-monitoring-solution.php', $curBase); ?>"><a class="<?php echo isActiveA('quality-monitoring-solution.php', $curBase); ?>" href="cold-chain-quality-monitoring-solution-in-india">Quality Monitoring Solution</a></li>
              <li class="<?php echo isActive('ware-house-management.php', $curBase); ?>"><a class="<?php echo isActiveA('ware-house-management.php', $curBase); ?>" href="warehouse-management-solutions-in-india">Ware House Management System</a></li>
              <li class="<?php echo isActive('transport-management.php', $curBase); ?>"><a class="<?php echo isActiveA('transport-management.php', $curBase); ?>" href="transport-management-solutions-in-india">Transport Management System</a></li>
              <li class="<?php echo isActive('transport-refrigeration.php', $curBase); ?>"><a class="<?php echo isActiveA('transport-refrigeration.php', $curBase); ?>" href="transport-refrigeration-solutions-in-india">Transport Refrigeration</a></li>
            </ul>
          </li>
          <li class="menu-item <?php echo isActive('blog.php', $curBase); ?>">
            <a class="<?php echo isActiveA('blog.php', $curBase); ?>" href="blog">Blog</a>
          </li>
          <li class="menu-item <?php echo isActive('contact.php', $curBase); ?>">
            <a class="<?php echo isActiveA('contact.php', $curBase); ?>" href="contact">Contact Us</a>
          </li>
        </ul>
      </div>
      <div class="mobile-drawer-info">
        <a href="<?php echo htmlspecialchars($mailHref, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Email Singhania Refrigeration"><i class="fa fa-envelope"></i><span><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></span></a>
        <div class="mobile-drawer-phone-list">
          <?php foreach ($contactPhones as $phone): ?>
            <a href="<?php echo htmlspecialchars($phone['href'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa fa-phone"></i><span><?php echo htmlspecialchars($phone['label'], ENT_QUOTES, 'UTF-8'); ?></span></a>
          <?php endforeach; ?>
        </div>
        <div class="mobile-drawer-socials">
          <a href="https://www.facebook.com/profile.php?id=61579480251463" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
          <a href="https://x.com/SinghaniaR59102" target="_blank" rel="noopener" aria-label="X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
          <a href="https://www.instagram.com/singhaniarefrigeration1/" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
          <a href="https://www.linkedin.com/company/singhania-refrigeration-and-supply-chain-consultancy/" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa fa-linkedin-square"></i></a>
          <a href="https://www.youtube.com/channel/UC-g2bewulBb2oGjPGIDAaJA" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a>
        </div>
        <details class="mobile-drawer-sites">
          <summary><i class="fa fa-globe"></i> Group Websites</summary>
          <div>
            <a href="https://singhanialogistics.in/" target="_blank" rel="noopener">Singhania Logistics</a>
            <a href="https://singhaniaretail.com/" target="_blank" rel="noopener">Singhania Retail</a>
            <a href="https://singhaniafoundation.com/" target="_blank" rel="noopener">Singhania Foundation</a>
            <a href="https://globalsoulhealing.com/" target="_blank" rel="noopener">Global Soul Healing</a>
            <a href="https://singhaniaroyalfurniture.com/" target="_blank" rel="noopener">Singhania Royal Furniture</a>
          </div>
        </details>
      </div>
    </nav>
  </header>
  
  <style>
      .float-logistics-btn{
  position: fixed;
  top: 18px;
  right: 18px;
  z-index: 999999;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  height: 44px;
  padding: 0 14px;
  border-radius: 999px;
  background: #f471b5;
  color: #082243 !important;
  font-weight: 700;
  font-size: 13px;
  text-decoration: none !important;
  box-shadow: 0 10px 26px rgba(0,0,0,.22);
  backdrop-filter: blur(8px);
  transition: transform .12s ease, box-shadow .2s ease, background .2s ease;
}

.float-logistics-btn:hover{
  transform: translateY(-1px);
  background: rgba(19,46,95,.98);
  box-shadow: 0 14px 32px rgba(0,0,0,.26);
  color: #fff !important;
}

.float-logistics-btn .dot{
  width: 10px;
  height: 10px;
  border-radius: 999px;
  background: #2ee59d;
  box-shadow: 0 0 0 4px rgba(46,229,157,.18);
}

/* mobile: thoda chhota */
@media (max-width: 767px){
  .float-logistics-btn{
    top: 10px;
    right: 70px;
    height: 40px;
    padding: 0 12px;
    font-size: 12px;
  }
}

/*other*/

.float-sites{
  position: fixed;
  top: 78px;
  right: 18px;
  z-index: 999999;
}

.float-sites-btn{
  border: none;
  outline: none;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  height: 44px;
  padding: 0 14px;
  border-radius: 999px;
  background: rgba(14,35,68,.95);
  color: #fff;
  font-weight: 800;
  font-size: 13px;
  box-shadow: 0 10px 26px rgba(0,0,0,.22);
  backdrop-filter: blur(8px);
  transition: transform .12s ease, box-shadow .2s ease, background .2s ease;
}

.float-sites-btn:hover{
  transform: translateY(-1px);
  background: rgba(19,46,95,.98);
  box-shadow: 0 14px 32px rgba(0,0,0,.26);
}

.float-sites-btn .dot{
  width: 10px;
  height: 10px;
  border-radius: 999px;
  background: #2ee59d;
  box-shadow: 0 0 0 4px rgba(46,229,157,.18);
}

.float-sites-btn .caret{
  font-size: 12px;
  opacity: .9;
}

.float-sites-menu{
  position: absolute;
  top: 52px;
  right: 0;
  min-width: 240px;
  padding: 10px;
  border-radius: 14px;
  background: #fff;
  box-shadow: 0 18px 40px rgba(0,0,0,.18);
  border: 1px solid rgba(0,0,0,.06);
  display: none;
}

.float-sites-menu a{
  display: block;
  padding: 10px 12px;
  border-radius: 10px;
  text-decoration: none;
  color: #0f2442;
  font-weight: 700;
  font-size: 13px;
}

.float-sites-menu a:hover{
  background: rgba(14,35,68,.08);
}

/* Hover open on desktop */
.float-sites:hover .float-sites-menu{
  display: block;
}

/* Mobile adjustments */
@media (max-width: 767px){
    .float-sites {
        top: 61px;
        right: 70px;
    }
  .float-sites-btn{ height: 40px; padding: 0 12px; font-size: 12px; }
  .float-sites-menu{ top: 48px; min-width: 220px; }
}


  </style>
  
  <!--<a href="https://singhanialogistics.in/" target="_blank" rel="noopener"-->
  <!--     class="float-logistics-btn" aria-label="Open Singhania Logistics">-->
  <!--    <span class="dot"></span>-->
  <!--    Singhania Logistics-->
  <!--  </a>-->
    
  <!--  <div class="float-sites">-->
  <!--    <button type="button" class="float-sites-btn" aria-haspopup="true" aria-expanded="false">-->
  <!--      <span class="dot"></span>-->
  <!--      Other Websites-->
  <!--      <i class="fa fa-chevron-down caret"></i>-->
  <!--    </button>-->
    
  <!--    <div class="float-sites-menu" role="menu">-->
  <!--      <a href="https://globalsoulhealing.com/" target="_blank" rel="noopener">Global Soul Healing</a>-->
  <!--      <a href="https://singhaniaretail.com/" target="_blank" rel="noopener">Singhania Retails</a>-->
  <!--      <a href="https://singhaniafoundation.com/" target="_blank" rel="noopener">Singhania Foundation</a>-->
  <!--    </div>-->
  <!--  </div>-->

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var btn = document.querySelector('.float-sites-btn');
    var menu = document.querySelector('.float-sites-menu');
    if (!btn || !menu) return;

    function openMenu() {
      menu.style.display = 'block';
      btn.setAttribute('aria-expanded', 'true');
    }

    function closeMenu() {
      menu.style.display = 'none';
      btn.setAttribute('aria-expanded', 'false');
    }

    btn.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      if (menu.style.display === 'block') {
        closeMenu();
      } else {
        openMenu();
      }
    });

    document.addEventListener('click', function () {
      closeMenu();
    });

    menu.addEventListener('click', function (e) {
      e.stopPropagation();
    });
  });
</script>


</div>



<script>
(function() {
  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  ready(function() {
    const panel = document.querySelector('.right_menu_togle');
    const toggles = document.querySelectorAll('.rs-menu-toggle');
    const closeBtn = document.getElementById('nav-close');
    const mobileNav = document.querySelector('.mobile-nav-menu');
    if (!panel || !toggles.length) return;

    function ensureOverlay() {
      let overlay = document.querySelector('.body-overlay');
      if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'body-overlay';
        document.body.appendChild(overlay);
        overlay.addEventListener('click', closeMenu);
      }
      return overlay;
    }

    function openMenu() {
      ensureOverlay().classList.add('active');
      document.body.classList.add('menu-open');
      panel.classList.add('open');
      panel.removeAttribute('inert');
      panel.setAttribute('aria-hidden', 'false');
      toggles.forEach(function(toggle) {
        toggle.setAttribute('aria-expanded', 'true');
      });
      const closeControl = panel.querySelector('.close');
      if (closeControl) closeControl.focus();
    }

    function closeMenu() {
      const wasOpen = panel.classList.contains('open');
      panel.classList.remove('open');
      panel.setAttribute('inert', '');
      panel.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('menu-open');

      const overlay = document.querySelector('.body-overlay');
      if (overlay) {
        overlay.classList.remove('active');
        window.setTimeout(function() {
          if (overlay.parentNode) overlay.parentNode.removeChild(overlay);
        }, 260);
      }

      document.querySelectorAll('.mobile-nav-menu .sub-menu').forEach(function(subMenu) {
        subMenu.classList.remove('open');
        subMenu.removeAttribute('style');
      });
      document.querySelectorAll('.mobile-nav-menu .has-submenu').forEach(function(item) {
        item.classList.remove('active');
      });
      document.querySelectorAll('.mobile-drawer-sites').forEach(function(details) {
        details.removeAttribute('open');
      });
      toggles.forEach(function(toggle) {
        toggle.setAttribute('aria-expanded', 'false');
      });
      if (wasOpen) toggles[0].focus();
    }

    toggles.forEach(function(toggle) {
      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        openMenu();
      });
    });
    if (closeBtn) {
      closeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        closeMenu();
      });
    }
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeMenu();
    });
    if (mobileNav) {
      mobileNav.addEventListener('click', function(e) {
        const link = e.target.closest('.has-submenu > a');
        if (!link || !mobileNav.contains(link)) return;
        e.preventDefault();
        const item = link.parentElement;
        const subMenu = item.querySelector(':scope > .sub-menu');
        document.querySelectorAll('.mobile-nav-menu .has-submenu').forEach(function(otherItem) {
          if (otherItem === item) return;
          otherItem.classList.remove('active');
          const otherSub = otherItem.querySelector(':scope > .sub-menu');
          if (otherSub) otherSub.classList.remove('open');
        });
        item.classList.toggle('active');
        if (subMenu) subMenu.classList.toggle('open');
      });
    }
    window.addEventListener('resize', function() {
      if (window.innerWidth > 991) closeMenu();
    });
  });
})();
</script>

<script>
/* Ensure every public internal link displays an extension-free URL on hover. */
document.addEventListener('DOMContentLoaded', function () {
  const routes = {
    'index.php': './',
    'truck-ac.php': 'truck-ac-installation-india',
    'truck-refrigerator-container.php': 'truck-refrigerator-container-manufacturer-in-india',
    'cold-storage-refrigeration-units.php': 'cold-storage-refrigeration-units-manufacturer-in-india',
    'compressor-rack-system.php': 'compressor-rack-system-manufacturer-in-india',
    'ammonia-refrigeration-units.php': 'ammonia-refrigeration-units-manufacturer-in-india',
    'freon-refrigeration-units.php': 'freon-refrigeration-in-india',
    'ripening-systems.php': 'ripening-systems-manufacturer-in-india',
    'multideck-cabinet.php': 'multideck-cabinet-manufacturer-in-india',
    'iqf.php': 'iqf-system-manufacturer-in-india',
    'doors-ca-doors.php': 'cold-storage-doors-manufacturer-in-india',
    'panels.php': 'puf-panels-manufacturer-in-india',
    'dock-shelter-dock-leveler.php': 'dock-shelter-dock-leveler-manufacturer-in-india',
    'heavy-duty-racks.php': 'heavy-duty-racks-manufacturer-in-india',
    'turnkey-solution.php': 'turnkey-cold-storage-solutions-in-india',
    'segments-wise.php': 'segment-wise-cold-storage-solutions-in-india',
    'cold-chain-refrigeration-ca-store-freon-ammonia.php': 'cold-chain-refrigeration-ca-store-freon-ammonia-in-india',
    'quality-monitoring-solution.php': 'cold-chain-quality-monitoring-solution-in-india',
    'ware-house-management.php': 'warehouse-management-solutions-in-india',
    'transport-management.php': 'transport-management-solutions-in-india',
    'transport-refrigeration.php': 'transport-refrigeration-solutions-in-india'
  };

  document.querySelectorAll('a[href]').forEach(function (link) {
    const raw = link.getAttribute('href');
    if (!raw || /^(?:https?:|mailto:|tel:|javascript:|#)/i.test(raw)) return;

    const match = raw.match(/^(.*\/)?([^/?#]+\.php)(\?[^#]*)?(#.*)?$/i);
    if (!match) return;

    const clean = routes[match[2].toLowerCase()] || match[2].replace(/\.php$/i, '');
    link.setAttribute('href', (match[1] || '') + clean + (match[3] || '') + (match[4] || ''));
  });
});
</script>

<script>
(function(){
  const wrap = document.getElementById('groupSites');
  const btn  = document.getElementById('groupSitesBtn');
  const menu = document.getElementById('groupSitesMenu');
  if(!wrap || !btn || !menu) return;

  function open(){
    wrap.classList.add('open');
    btn.setAttribute('aria-expanded','true');
  }
  function close(){
    wrap.classList.remove('open');
    btn.setAttribute('aria-expanded','false');
  }
  function toggle(e){
    e.preventDefault();
    e.stopPropagation();
    wrap.classList.contains('open') ? close() : open();
  }

  btn.addEventListener('click', toggle);

  document.addEventListener('click', function(e){
    if(!wrap.contains(e.target)) close();
  });

  document.addEventListener('keydown', function(e){
    if(e.key === 'Escape') close();
  });
})();
</script>
