<?php
error_reporting(0);
include("admin/config.php");

$color = "";
$messageBanner = "";

function sr_image_size_attrs($relativePath) {
    static $cache = [];
    $relativePath = ltrim((string)$relativePath, '/\\');
    if ($relativePath === '') {
        return '';
    }
    if (!array_key_exists($relativePath, $cache)) {
        $absolutePath = __DIR__ . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $relativePath);
        $cache[$relativePath] = '';
        if (is_file($absolutePath)) {
            $size = @getimagesize($absolutePath);
            if (!empty($size[0]) && !empty($size[1])) {
                $cache[$relativePath] = ' width="' . (int)$size[0] . '" height="' . (int)$size[1] . '"';
            }
        }
    }
    return $cache[$relativePath];
}

function sr_webp_path($relativePath) {
    $relativePath = ltrim((string)$relativePath, '/\\');
    $info = pathinfo($relativePath);
    if (empty($info['dirname']) || empty($info['filename'])) {
        return '';
    }
    $webpPath = ($info['dirname'] === '.' ? '' : $info['dirname'] . '/') . $info['filename'] . '.webp';
    return is_file(__DIR__ . '/' . $webpPath) ? $webpPath : '';
}

function sr_preferred_image_path($relativePath) {
    $webpPath = sr_webp_path($relativePath);
    return $webpPath !== '' ? $webpPath : $relativePath;
}

if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $company  = $_POST['company'];
    $location = $_POST['location'];
    $msg      = $_POST['message'];

    if ($name == "" || $email == "" || $phone == "") {
        $color = "<div class='alert alert-danger'>Please fill Name, Email and Phone.</div>";
    } else {
        $sql = "INSERT INTO enquiry (name, email, phone, company, location, message)
                VALUES ('$name', '$email', '$phone', '$company', '$location', '$msg')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Record Added Successfully ✅');</script>";
            $color = "<div class='alert alert-success'>Thanks! We’ll reach out within 24 hours.</div>";
        } else {
            $color = "<div class='alert alert-danger'>Error: Could not save data.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en-IN">
  <?php
    $siteConfigResult = mysqli_query($conn, "SELECT * FROM configuration LIMIT 1");
    if ($siteConfigResult && $siteConfig = mysqli_fetch_assoc($siteConfigResult)) {
      $email = $siteConfig['email'] ?? '';
      $mobile = $siteConfig['mobile'] ?? '';
      $facebook = $siteConfig['facebook'] ?? '';
      $linkedin = $siteConfig['linkedin'] ?? '';
      $address = $siteConfig['address'] ?? '';
    }
    $pageTitle = 'Cold Storage Company in Delhi NCR | Singhania Refrigeration';
    $pageDescription = 'Cold storage company & industrial refrigeration experts in Delhi NCR. Turnkey cold rooms, CA stores, ammonia plants & cold chain infrastructure. Free survey.';
    $ogTitle = 'Singhania Refrigeration | Turnkey Cold Storage & Refrigeration Plants in India';
    $ogDescription = 'Cold storage company & industrial refrigeration experts in Delhi NCR. Turnkey cold rooms, CA stores, ammonia plants & cold chain infrastructure. Free survey.';
    $twitterTitle = 'Cold Storage & Refrigeration Plants in Delhi NCR | Singhania';
    $twitterDescription = $ogDescription;

  ?>
  <head> 
    <?php include('head.php'); ?>
    <?php
      $heroPreload = '';
      $heroBannerResult = mysqli_query($conn, "
        SELECT b.image
        FROM menus m
        JOIN banners b ON b.menu_name = m.id
        WHERE m.title = 'Home'
        ORDER BY b.created_at DESC
        LIMIT 1
      ");
      if ($heroBannerResult && ($heroBanner = mysqli_fetch_assoc($heroBannerResult)) && !empty($heroBanner['image'])) {
          $heroPreloadPath = sr_preferred_image_path('admin/uploads/' . $heroBanner['image']);
          if (is_file(__DIR__ . '/' . $heroPreloadPath)) {
              $heroPreload = $heroPreloadPath;
          }
      }
      if ($heroPreload !== ''):
    ?>
    <link rel="preload" as="image" href="<?php echo htmlspecialchars($heroPreload, ENT_QUOTES); ?>"<?php echo strtolower(pathinfo($heroPreload, PATHINFO_EXTENSION)) === 'webp' ? ' type="image/webp"' : ''; ?> fetchpriority="high">
    <?php endif; ?>

    <!-- ===== Light design polish & animations (framework-agnostic) ===== -->
   <style>
/* ========= Base tokens & typography ========= */
:root{
  --brand:#6c63ff;
  --ink:#1f2937;
  --muted:#667085;
  --card:#ffffff;
  --soft:#f6f8fb;
  --line:#e6eaf0;

  /* Responsive hero height (handles mobile browser chrome) */
  --hero-min: 420px;
  --hero-max: 820px;
  --hero-h: clamp(var(--hero-min), 78svh, var(--hero-max));
}
body{ color:var(--ink); }

/* ========= Micro animations & image polish ========= */
[data-animate]{ opacity:0; transform:translateY(26px) scale(.98); transition:all .7s cubic-bezier(.2,.65,.3,1); }
[data-animate].active{ opacity:1; transform:none; }

.img-soft{
  border-radius:14px;
  box-shadow:0 12px 28px rgba(0,0,0,.10);
  transition:transform .45s ease, box-shadow .45s ease, filter .45s ease;
  will-change:transform;
}
.img-soft:hover{ transform:translateY(-3px) scale(1.02); box-shadow:0 18px 40px rgba(0,0,0,.16); }
.blog-cover-img{ width:100%; height:280px; object-fit:cover; display:block; }
.gtm-noscript-iframe{ display:none !important; visibility:hidden !important; }
.section-title-accent{ color:#082243 !important; font-size:30px; }
.about-copy--lead{ margin-top:15px; }
.notice-banner{
  display:block;
  overflow:hidden;
  background:#0a1f3c;
  color:#fff;
  font-size:13.5px;
  font-weight:500;
  letter-spacing:.3px;
  white-space:nowrap;
}
.notice-banner__track{
  display:flex;
  width:max-content;
  animation:noticeTicker 14s linear infinite;
  will-change:transform;
}
.notice-banner__group{
  display:flex;
  align-items:center;
  gap:18px;
  padding:10px 18px;
  flex:0 0 auto;
}
@keyframes noticeTicker{
  from{ transform:translateX(0); }
  to{ transform:translateX(-50%); }
}
.text-justify{ text-align:justify; }
.flex-center{ align-items:center; }
#rs-about p{ text-align:justify; }
.testimonial-shell{ border-radius:16px; }
.testimonial-quote{ color:var(--brand); }
.rs-testimonial.style1 .bg-part{
 
  min-height:420px;
  display:flex;
  align-items:center;
  justify-content:center;
}
.testimonial-avatar-icon{
  width:76px;
  height:76px;
  border-radius:50%;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  background:#eef2ff;
  color:var(--brand);
  font-size:34px;
  box-shadow:0 12px 28px rgba(0,0,0,.10);
}

/* ========= Cards & common blocks ========= */
.service-wrap{
  border-radius:16px; background:var(--card);
  box-shadow:0 10px 22px rgba(0,0,0,.06);
  transition:transform .2s ease, box-shadow .25s ease;
}
.service-wrap:hover{ transform:translateY(-4px); box-shadow:0 18px 36px rgba(0,0,0,.12); }
.service-wrap .icon-part img{ filter:drop-shadow(0 6px 10px rgba(0,0,0,.08)); }

#rs-about img, #rs-portfolio .img-part img{ border-radius:16px; }

/* ========= Contact form ========= */
.rs-contact.style1{ background:#f6f9fc; }
.rs-contact.style1 .contact-wrap{
  padding:34px;
  border-radius:14px;
  background:#fff;
  border:1px solid #e5edf5;
  box-shadow:0 18px 45px rgba(8,34,67,.08);
}
.rs-contact.style1 .form-part{ padding:18px 24px 18px 18px; }
.contact-tag{
  display:inline-block;
  margin-bottom:10px;
  color:#0b6fc6;
  font-size:13px;
  font-weight:700;
  text-transform:uppercase;
  letter-spacing:.06em;
}
 .sub-title{
          display:inline-block; font-size:22px; letter-spacing:.12em;
          padding:8px 17px; border-radius:999px; background:#e9eeff; 
        }
.rs-contact.style1 .sec-title .title{
  color:#082243;
  font-size:32px;
  line-height:1.22;
  margin-bottom:12px !important;
}
.contact-sub{
  color:#5d6b82;
  margin:0 0 24px;
  max-width:650px;
  font-size:16px;
  line-height:1.65;
}
.rs-contact.style1 .contact-form .row{ margin-left:-7px; margin-right:-7px; }
.rs-contact.style1 .contact-form [class*="col-"]{ padding-left:7px; padding-right:7px; }
.rs-contact.style1 .contact-form .common-control input,
.rs-contact.style1 .contact-form .common-control textarea{
  width:100%;
  background:#fff;
  border:1px solid #d8e2ee;
  border-radius:6px;
  color:#1f2937;
  font-size:15px;
  padding:0 15px;
  box-shadow:0 4px 12px rgba(8,34,67,.04);
  transition:border-color .2s ease, box-shadow .2s ease;
}
.rs-contact.style1 .contact-form .common-control input{ height:50px; }
.rs-contact.style1 .contact-form .common-control textarea{
  min-height:124px;
  padding-top:14px;
  resize:vertical;
}
.rs-contact.style1 .contact-form .common-control ::placeholder{ color:#8a96a8; }
.rs-contact.style1 .contact-form .common-control input:focus,
.rs-contact.style1 .contact-form .common-control textarea:focus{
  border-color:#0b6fc6;
  box-shadow:0 0 0 3px rgba(11,111,198,.12);
  outline:0;
}
.rs-contact.style1 .submit-btn .readon{
  background:#082243;
  color:#fff;
  border:none;
  border-radius:6px;
  padding:13px 26px;
  font-weight:700;
  box-shadow:0 12px 24px rgba(11,111,198,.20);
  transition:background .2s ease, transform .12s ease, box-shadow .2s ease;
}
.rs-contact.style1 .submit-btn .readon:hover{
  /* background:#082243; */
  transform:translateY(-1px);
  box-shadow:0 14px 28px rgba(8,34,67,.22);
}
.contact-side{
  height:100%;
  min-height:420px;
  padding:34px 28px;
  border-radius:12px;
  background:#082243;
  color:#fff;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
  overflow:hidden;
}
.contact-side h3{
  color:#fff;
  font-size:24px;
  line-height:1.25;
  margin:0 0 12px;
}
.contact-side p{ color:#d6e4f5; margin:0; line-height:1.65; }
.contact-areas{ margin:0 0 18px; font-size:13px; color:#d6e4f5; }
.contact-areas strong{
  display:block;
  color:#fff;
  font-size:18px;
  margin-bottom:12px;
}
.contact-area-tags{ display:flex; flex-wrap:wrap; gap:8px; }
.contact-area-tags span{
  display:inline-block;
  background:#f0f4f8;
  color:#082243;
  border-radius:4px;
  padding:5px 11px;
  font-weight:700;
}
.contact-img{
  width:100%;
  max-width:330px;
  height:auto;
  margin:18px auto 0;
  display:block;
  border-radius:10px;
  background:#fff;
}
@media (max-width: 991px){
  .rs-contact.style1 .form-part{ padding:0; }
  .contact-side{ margin-top:28px; min-height:auto; }
  .rs-contact.style1 .sec-title .title{ font-size:28px; }
}
@media (max-width: 575px){
  .rs-contact.style1 .contact-wrap{ padding:22px; }
  .rs-contact.style1 .sec-title .title{ font-size:24px; }
  .contact-sub{ font-size:15px; }
  .rs-contact.style1 .submit-btn .readon{ width:100%; }
}

/* ========= Modal (Quick Connect) ========= */
#myModal .modal-dialog{ max-width:900px; width:94%; margin:1.75rem auto; }
#myModal.modal.in .modal-dialog, #myModal.modal.show .modal-dialog{ display:flex; align-items:center; min-height:calc(100% - 2rem); }
#myModal .modal-content{
  overflow:hidden;
  border:0;
  border-radius:22px;
  background:#fff;
  box-shadow:0 30px 90px rgba(4,16,35,.38), 0 12px 34px rgba(0,0,0,.18);
  transform:translateY(6px);
  transition:transform .25s ease, box-shadow .25s ease;
}
#myModal.modal.in .modal-content, #myModal.modal.show .modal-content{ transform:translateY(0); }
.modal-backdrop.in, .modal-backdrop.show{ opacity:1!important; background:rgba(1,12,27,.64)!important; backdrop-filter:blur(4px); -webkit-backdrop-filter:blur(4px); }

#myModal .modal-header{ display:none; }
#myModal .modal-body{ padding:0; }
#myModal .quote-modal{
  display:grid;
  grid-template-columns: 42% 58%;
  min-height:540px;
}
#myModal .quote-panel{
  position:relative;
  overflow:hidden;
  padding:34px 36px 28px;
  color:#fff;
  background:#0e2344;
}
#myModal .quote-panel::before,
#myModal .quote-panel::after{
  content:"";
  position:absolute;
  width:170px;
  height:170px;
  border-radius:32px;
  background:repeating-linear-gradient(60deg, rgba(255,255,255,.08) 0 8px, transparent 8px 18px);
  opacity:.6;
  transform:rotate(45deg);
}
#myModal .quote-panel::before{ right:-56px; top:-56px; }
#myModal .quote-panel::after{ left:-72px; bottom:46px; }
#myModal .quote-panel > *{ position:relative; z-index:1; }
#myModal .response-pill{
  display:inline-flex;
  align-items:center;
  gap:9px;
  padding:8px 15px;
  border:1px solid rgba(54,213,255,.48);
  border-radius:999px;
  background:rgba(7,98,151,.45);
  color:#56e1ff;
  font-size:12px;
  line-height:1;
  font-weight:800;
  text-transform:uppercase;
}
#myModal .response-pill::before{
  content:"";
  width:8px;
  height:8px;
  border-radius:50%;
  background:#56e1ff;
  box-shadow:0 0 0 4px rgba(86,225,255,.13);
}
#myModal .quote-title{
  margin:30px 0 14px;
  color:#fff;
  font-size:31px;
  line-height:1.18;
  font-weight:900;
}
#myModal .quote-title span{ color:#fff; }
#myModal .quote-copy{
  margin:0 0 28px;
  color:#c7d8ee;
  font-size:15px;
  line-height:1.58;
}
#myModal .quote-benefits{
  display:grid;
  gap:17px;
  margin:0;
  padding:0;
  list-style:none;
}
#myModal .quote-benefits li{
  display:grid;
  grid-template-columns:36px 1fr;
  gap:12px;
  align-items:center;
  color:#edf6ff;
  font-size:14px;
  line-height:1.35;
  font-weight:700;
}
#myModal .quote-benefits i,
#myModal .quote-call i,
#myModal .quote-whatsapp i{
  display:grid;
  place-items:center;
  width:34px;
  height:34px;
  border-radius:5px;
  background:#0e2344;
  color:#49dbff;
  border:1px solid rgba(255,255,255,.1);
}
#myModal .quote-actions{
  display:grid;
  grid-template-columns:1fr 56px;
  gap:10px;
  margin-top:46px;
}
#myModal .quote-call,
#myModal .quote-whatsapp{
  display:flex;
  align-items:center;
  gap:12px;
  min-height:56px;
  padding:10px 14px;
  border-radius:5px;
  background:rgba(255,255,255,.12);
  color:#fff;
  text-decoration:none;
  border:1px solid rgba(255,255,255,.08);
}
#myModal .quote-call small{
  display:block;
  color:#bcd2ea;
  font-size:10px;
  line-height:1;
  text-transform:uppercase;
  font-weight:800;
}
#myModal .quote-call strong{ display:block; margin-top:3px; font-size:14px; line-height:1; }
#myModal .quote-whatsapp{
  justify-content:center;
  padding:0;
  background:rgba(0,161,137,.22);
}
#myModal .quote-whatsapp i{ background:transparent; border:0; color:#21e6a8; font-size:20px; }

#myModal .quote-form{
  position:relative;
  padding:38px 36px;
  background:#fff;
}
#myModal .quote-close{
  position:absolute;
  top:16px;
  right:16px;
  float:none;
  display:grid;
  place-items:center;
  width:38px;
  height:38px;
  padding:0;
  border:0;
  border-radius:50%;
  background:#eef3f9;
  color:#687992;
  font-size:28px;
  line-height:1;
  opacity:1;
  cursor:pointer;
  transition:background .18s ease, color .18s ease, transform .12s ease;
}
#myModal .quote-close:hover{ background:#fee2e2; color:#ef4444; transform:scale(1.04); }
#myModal .modal-title{ margin:0; font-weight:700; font-size:28px; color:#0e2344; }
#myModal .modal-sub{ color:#0e2344; margin:7px 0 22px; font-size:15px; }
#myModal #response{ margin-bottom:12px; }
#myModal .form-row-split{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:16px;
}
#myModal .form-group{ position:relative; margin-bottom:16px; }
#myModal .form-group i{
  position:absolute;
  left:16px;
  top:50%;
  transform:translateY(-50%);
  color:#8ca2bd;
  font-size:16px;
  pointer-events:none;
}
#myModal .form-control{
  height:49px;
  width:100%;
  padding:0 16px 0 44px;
  border-radius:5px;
  border:1px solid #dbe4f0;
  color:#10203a;
  font-size:15px;
  box-shadow:none;
  background:#fff;
}
#myModal .form-control::placeholder{ color:#8aa0bc; }
#myModal .form-control:focus{
  border-color:#2676ff;
  box-shadow:0 0 0 4px rgba(38,118,255,.16);
  outline:0;
}
#myModal .btn-primary{
  width:100%;
  min-height:51px;
  border:0;
  border-radius:5px;
  padding:12px 18px;
  color:#fff;
  font-weight:700;
  background:#0e2344;
  box-shadow:0 15px 30px rgba(35,93,186,.32);
  transition:transform .1s ease, box-shadow .2s ease, filter .2s ease;
}
#myModal .btn-primary:hover{ transform:translateY(-1px); filter:brightness(1.04); box-shadow:0 18px 36px rgba(35,93,186,.38); }
/* #myModal .btn-primary .fa{ margin-left:10px; } */
#myModal .privacy-note{
  display:flex;
  justify-content:center;
  align-items:center;
  gap:8px;
  margin:18px 0 0;
  color:#526783;
  font-size:12px;
}
#myModal .privacy-note i{ color:#0e2344; }
#myModal .error{ display:block; color:#d93025; font-size:12px; margin-top:6px; }
#myModal .submit-spinner{ display:none; margin-left:8px; }
#myModal .submit-spinner.is-visible{ display:inline-block; }
@media (max-width: 767px){
  #myModal .modal-dialog{ width:94%; margin:1rem auto; }
  #myModal .quote-modal{ grid-template-columns:1fr; min-height:auto; }
  #myModal .quote-panel{ padding:26px 24px; }
  #myModal .quote-title{ margin-top:22px; font-size:26px; }
  #myModal .quote-copy{ margin-bottom:20px; }
  #myModal .quote-actions{ margin-top:24px; }
  #myModal .quote-form{ padding:30px 24px 28px; }
  #myModal .form-row-split{ grid-template-columns:1fr; gap:0; }
}

@media (max-width: 991px){ .md-mt-40{ margin-top:40px!important; } }

/* ========= HERO / BANNER (scoped to #rs-slider) ========= */
.rs-slider.slider1{ position:relative; overflow:hidden; }

#rs-slider #nivoSlider,
#rs-slider #nivoSlider img{
  width:100%;
  height:clamp(560px, 78svh, var(--hero-max));
  object-fit:cover;
  object-position:center;
  display:block;
  background:#0a1530; /* fallback while image loads */
}

/* Hide original overlay container to avoid double overlays */
#rs-slider .slider-direction{ display:none !important; }

/* Nivo-injected caption */
#rs-slider .nivo-caption{
  display:flex !important;
  align-items:center;
  justify-content:flex-start;
  opacity:1 !important;
  padding:0 12px;
  pointer-events:none; /* allow arrows to be clickable */
}
#rs-slider .nivo-caption .hero-card{ pointer-events:auto; } /* card stays clickable */

/* Reset the theme's absolute positioning and extra wrapper padding. */
#rs-slider .nivo-caption .container{
  display:flex;
  align-items:center;
  height:100%;
}
#rs-slider .nivo-caption .content-part{
  position:static;
  width:100%;
  max-width:none;
  padding:24px 0;
  overflow:visible;
  transform:none;
}

#rs-slider .nivo-caption .hero-card,
#rs-slider .nivo-caption a,
#rs-slider .nivo-caption button,
#rs-slider .nivo-caption input,
#rs-slider .nivo-caption textarea{ pointer-events:auto; }

/* Hero card */
#rs-slider .hero-card{
  background:rgba(13,31,61,.86); color:#fff;
  border-radius:16px; padding:24px 22px; max-width:720px;
  margin-left:0;
  box-shadow:0 20px 60px rgba(0,0,0,.35), 0 8px 18px rgba(0,0,0,.22);
  backdrop-filter:saturate(120%) blur(2px);
  transform-origin:50% 100%;
  animation:heroFloatIn .8s ease .15s both;
}
#rs-slider .hero-card .sl-title{ 
    font-size: clamp(24px, 4vw, 35px);
    line-height: 1.2;
    margin:0 0 14px;
    padding:0;
 }
#rs-slider .hero-card .sl-desc{ font-size:clamp(14px,1.8vw,16px); line-height:1.7; color:#dfe7ff; }
#rs-slider .hero-card .slider-bottom{ margin:20px 0 0; }
#rs-slider .hero-card .slider-bottom ul{ margin:18px 0 0; padding:0; list-style:none; }
#rs-slider .hero-card .readon.banner-style{
  display:inline-block; background:#1c2f57; color:#fff; border:0; border-radius:10px; padding:12px 20px; font-weight:600;
  transition:transform .15s ease, background .2s ease, box-shadow .2s ease; box-shadow:0 8px 18px rgba(28,47,87,.35);
}
#rs-slider .hero-card .readon.banner-style:hover{ transform:translateY(-1px); background:#102246; box-shadow:0 12px 28px rgba(28,47,87,.45); }

@keyframes heroFloatIn{ from{opacity:0; transform:translateY(22px) scale(.985);} to{opacity:1; transform:translateY(0) scale(1);} }

/* Arrows/dots stacking */
#rs-slider .nivo-directionNav,
#rs-slider .nivo-directionNav a{ display:none !important; }
#rs-slider .nivo-controlNav{ z-index:6; }

/* Readability gradient across photos */
.rs-slider.slider1::after{
  content:""; position:absolute; inset:0; pointer-events:none; z-index:2;
  background:linear-gradient(90deg, rgba(6,14,30,0.28) 0%, rgba(6,14,30,0.18) 28%, rgba(6,14,30,0.06) 55%, rgba(6,14,30,0) 80%);
}

/* Mobile tweaks */
@media (max-width: 767px){
  #rs-slider #nivoSlider,
  #rs-slider #nivoSlider img{ height:clamp(620px, 88svh, 760px); }
  #rs-slider .nivo-caption{ padding:0 15px; }
  #rs-slider .nivo-caption .content-part{ padding:20px 0; }
  #rs-slider .hero-card{ width:100%; max-width:100%; padding:22px 18px; }
  #rs-slider .hero-card .sl-title{ font-size:clamp(22px,7vw,34px); }
  #rs-slider .hero-card .sl-desc{ font-size:14px; }
}

/* ========= Services color theme overrides ========= */
.rs-services.style1:not(.modify) .service-wrap,
.rs-services.modify .service-wrap{
  background:#082243 !important;
  color:#ffffff !important;
  border-top-left-radius:20px !important;
  border-top-right-radius:20px !important;
  box-shadow:0 10px 24px rgba(0,0,0,.28) !important;
  position:relative;
  overflow:hidden;
  transition:transform .35s ease, box-shadow .35s ease;
}
.rs-services.style1:not(.modify) .service-wrap:before,
.rs-services.modify .service-wrap:before{
  content:"";
  position:absolute;
  left:0;
  right:0;
  bottom:0;
  height:100%;
  background:#ffffff;
  border-radius:20px 20px 0 0;
  transform:translateY(100%);
  transition:transform .65s ease;
  z-index:0;
  pointer-events:none;
}
.rs-services.style1:not(.modify) .service-wrap:hover,
.rs-services.modify .service-wrap:hover{
  transform:translateY(-6px) !important;
  box-shadow:0 18px 40px rgba(0,0,0,.35) !important;
}
.rs-services.style1:not(.modify) .service-wrap:hover:before,
.rs-services.modify .service-wrap:hover:before{
  transform:translateY(0);
}
.rs-services.style1:not(.modify) .service-wrap .icon-part,
.rs-services.style1:not(.modify) .service-wrap .content-part,
.rs-services.modify .service-wrap .icon-part,
.rs-services.modify .service-wrap .content-part{
  position:relative;
  z-index:1;
}
.rs-services.style1:not(.modify) .service-wrap,
.rs-services.modify .service-wrap{
  cursor:pointer;
}
.rs-services.style1:not(.modify) .service-wrap a,
.rs-services.modify .service-wrap a{
  position:relative;
  z-index:2;
}
.rs-services.style1:not(.modify) .service-wrap .icon-part,
.rs-services.modify .service-wrap .icon-part{
  display:flex;
  justify-content:center;
  align-items:center;
  width:140px;
  max-width:100%;
  min-height:112px;
  margin:0 auto 14px;
}
.rs-services.style1:not(.modify) .service-wrap .icon-part .icon-hover,
.rs-services.modify .service-wrap .icon-part .icon-hover{
  display:none !important;
}
.rs-services.style1:not(.modify) .service-wrap .icon-part img:not(.icon-hover),
.rs-services.modify .service-wrap .icon-part img:not(.icon-hover){
  display:block;
  /* width:140px !important;
  max-width:none !important;
  height:auto !important;
  max-height:112px;
  object-fit:contain; */
  margin:0 auto;
  filter:brightness(0) invert(1) drop-shadow(0 6px 10px rgba(0,0,0,.35));
  transition:transform .45s ease, filter .18s ease .46s;
}
.rs-services.modify .service-wrap .truck-service-icon{
  width:140px !important;
  max-width:none !important;
  height:140px !important;
  max-height:none !important;
  object-fit:contain;
}
.rs-services.modify .service-wrap .service-card-icon{
  width:140px !important;
  max-width:none !important;
  height:140 !important;
  max-height:none !important;
  object-fit:contain;
}
.rs-services.style1:not(.modify) .service-wrap .title,
.rs-services.style1:not(.modify) .service-wrap .title a,
.rs-services.modify .service-wrap .title,
.rs-services.modify .service-wrap .title a{
  color:#ffffff !important;
  transition:color .35s ease .34s;
}
.rs-services.style1:not(.modify) .service-wrap .desc,
.rs-services.style1:not(.modify) .service-wrap p,
.rs-services.modify .service-wrap .desc{
  color:#e7eef9 !important;
  text-align:center !important;
  transition:color .35s ease .12s;
}
.rs-services.style1:not(.modify) .service-wrap:hover .title,
.rs-services.style1:not(.modify) .service-wrap:hover .title a,
.rs-services.style1:not(.modify) .service-wrap:hover .desc,
.rs-services.style1:not(.modify) .service-wrap:hover p,
.rs-services.modify .service-wrap:hover .title,
.rs-services.modify .service-wrap:hover .title a,
.rs-services.modify .service-wrap:hover .desc{
  color:#082243 !important;
  font-weight:700 !important;
}
.rs-services.style1:not(.modify) .service-wrap:hover .icon-part img:not(.icon-hover),
.rs-services.modify .service-wrap:hover .icon-part img:not(.icon-hover){
  transform:scale(1.08);
  filter:brightness(0) drop-shadow(0 10px 16px rgba(0,0,0,.35));
}
.rs-services.modify .services-products-cta{
  display:flex;
  justify-content:flex-end;
  margin-top:18px;
}

/* Put this in your CSS after other hero rules */
#hero-caption{ display:none !important; }

/* About section: keep the detailed copy collapsed until requested. */
.about-more-content{
  display:grid;
  grid-template-rows:0fr;
  transition:grid-template-rows .45s ease;
}
.about-more-content.is-open{
  grid-template-rows:1fr;
}
.about-more-content .about-more-inner{
  overflow:hidden;
  opacity:0;
  transform:translateY(-6px);
  transition:opacity .35s ease, transform .35s ease;
}
.about-more-content.is-open .about-more-inner{
  opacity:1;
  transform:translateY(0);
  transition-delay:.1s;
}
.about-read-more{
  display:inline-flex;
  align-items:center;
  gap:8px;
  margin-top:4px;
  padding:0;
  border:0;
  background:transparent;
  color:#000b4f;
  font:inherit;
  font-weight:600;
  cursor:pointer;
}
.about-read-more::after{
  content:"+";
  font-size:20px;
  line-height:1;
}
.about-read-more[aria-expanded="true"]::after{ content:"\2212"; }
.about-read-more:hover,
.about-read-more:focus-visible{ color:#000b4f; }
.about-read-more:focus-visible{
  outline:2px solid currentColor;
  outline-offset:4px;
}
#rs-about .about-section-image{
  margin-top: 30px;
  width:100%;
  height:540px;
  object-fit:cover;
}
#rs-about .tt-list{
  display:grid;
  gap:10px;
  margin:0 0 20px;
}
#rs-about .tt-list li{
  min-height:54px;
  padding:13px 16px 13px 46px;
  border:1px solid rgba(0,11,79,.1);
  border-radius:10px;
  background:#fff;
  box-shadow:0 5px 16px rgba(0,11,79,.07);
  text-align:left;
}
#rs-about .tt-list li::before{
  left:16px;
  top:17px;
}
@media (max-width:991.98px){
  #rs-about .about-section-image{ height:auto; }
}
</style>

<meta name="google-site-verification" content="t5Xgoar9zL7jV84rmq3iDZQ7vTKJadd2l0ZU3kfFICs" />

<!-- Facebook Pixel Code -->
<script>
  window.addEventListener('load', function () {
    var loadPixel = function () {
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '4268533853363514');
      fbq('track', 'PageView');
    };
    if ('requestIdleCallback' in window) {
      requestIdleCallback(loadPixel, { timeout: 3000 });
    } else {
      setTimeout(loadPixel, 1500);
    }
  });
</script>
<noscript> <img loading="lazy" decoding="async" height="1" width="1" alt="" src="https://www.facebook.com/tr?id=4268533853363514&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->

  </head>

  <body class="defult-home">

    <?php include('header.php'); ?>

    <!-- ===== Main ===== -->
    <main class="main-content">
      
      <!-- ===== Slider ===== -->
        <p class="sr-only">Cold Chain Highlights</p>
        <div id="rs-slider" class="rs-slider slider1">
          <div class="bend niceties">
            <div id="nivoSlider" class="slides">
              <?php
                $i = 1;
                // Fetch Home banners
                $get_banner = "
                  SELECT b.image
                  FROM menus m
                  JOIN banners b ON b.menu_name = m.id
                  WHERE m.title = 'Home'
                  ORDER BY b.created_at DESC
                ";
                $banners = mysqli_query($conn, $get_banner);
                while ($banner = mysqli_fetch_assoc($banners)) {
                  // >>> ALL images use the SAME caption so the same box shows on every slide
                  $bannerAttrs = ($i === 1)
                    ? 'fetchpriority="high" loading="eager" decoding="async"'
                    : 'loading="lazy" decoding="async"';
                  $bannerPath = sr_preferred_image_path('admin/uploads/' . $banner['image']);
                  echo '<img ' . $bannerAttrs . ' src="' . htmlspecialchars($bannerPath, ENT_QUOTES) . '"' . sr_image_size_attrs($bannerPath) . ' alt="Cold Storage" title="#hero-caption" />' . "\n";
                  $i++;
                }
              ?>
            </div>

            <!-- Single caption reused for all slides -->
            <div id="hero-caption" class="slider-direction">
              <div class="container">
                <div class="content-part">
                  <div class="hero-card">
                    <div class="slider-des">
                      <h1 class="sl-title white-color">Cold Storage &amp; Industrial Refrigeration Company in Delhi NCR</h1>
                      <div class="sl-desc">
                        Singhania Refrigeration offers design, installation and maintenance of cold rooms, CA/MA stores, ammonia and freon refrigeration plant, IQF systems, compressor racks complete cold chain infrastructure for various industries from Okhla, New Delhi to
                      </div>
                    </div>
                    <div class="slider-bottom">
                      <ul><li><a href="contact" class="readon banner-style">Contact Us</a></li></ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Single caption -->
          </div>
        </div>
        <!-- /Slider -->

        <!-- ===== TRUST BAR ===== -->
        <div class="notice-banner" aria-label="Singhania Refrigeration trust highlights">
          <div class="notice-banner__track">
            <div class="notice-banner__group">
              <span>&#9989;&nbsp; 25 Years Cold Chain Expertise (Singhania Group)</span>
              <span>|</span>
              <span>&#127981;&nbsp; 10+ Years as Singhania Refrigeration</span>
              <span>|</span>
              <span>&#9881;&nbsp; 99.9% System Uptime</span>
              <span>|</span>
              <span>&#127757;&nbsp; Pan-India Project Delivery</span>
              <span>|</span>
              <span>&#128203;&nbsp; FSSAI &amp; WHO-GMP Aligned Systems</span>
            </div>
            <div class="notice-banner__group" aria-hidden="true">
              <span>&#9989;&nbsp; 25 Years Cold Chain Expertise (Singhania Group)</span>
              <span>|</span>
              <span>&#127981;&nbsp; 10+ Years as Singhania Refrigeration</span>
              <span>|</span>
              <span>&#9881;&nbsp; 99.9% System Uptime</span>
              <span>|</span>
              <span>&#127757;&nbsp; Pan-India Project Delivery</span>
              <span>|</span>
              <span>&#128203;&nbsp; FSSAI &amp; WHO-GMP Aligned Systems</span>
            </div>
          </div>
        </div>
        <!-- ===== TRUST BAR END ===== -->
      <!-- ===== Mini Services ===== -->
      <div class="rs-services style1 pt-100 pb-84 md-pt-80 md-pb-64">
        <div class="container" data-animate>
          <h2 class="sr-only">Cold Chain Service Highlights</h2>
          <div class="row gutter-16">
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/1.webp" width="140" height="140" alt="Turnkey cold chain project execution icon"></div>
                <div class="content-part">
                  <h3 class="title"><a href="turnkey-cold-storage-solutions-in-india">Turnkey Execution</a></h3>
                  <p>Full turnkey cold storage and industrial refrigeration solutions – design, equipment supply, installation and commissioning, all in-house by our own engineering team for smooth accountable delivery from start to finish.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/2.webp" width="70" height="70" alt="Energy efficient refrigeration system icon"></div>
                <div class="content-part">
                  <h3 class="title"><a href="puf-panels-manufacturer-in-india">Energy Efficiency</a></h3>
                  <p>High efficiency compressors, advanced PUF insulation and smart controls help reduce running costs by up to 30% compared with conventional cold storage systems, while maintaining precise temperature control.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/3.webp" width="140" height="140" alt="99.9% uptime cold storage reliability icon"></div>
                <div class="content-part">
                  <h3 class="title"><a href="consulting">99.9% Uptime</a></h3>
                  <p>Preventive maintenance and rapid-response AMC support 24 hours a day, 365 days a year keep your cold room, CA store or refrigeration plant running reliably.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/4.webp" width="70" height="70" alt="Pan-India refrigeration service icon"></div>
                <div class="content-part">
                  <h3 class="title"><a href="contact">Pan-India Service</a></h3>
                  <p>Okhla, New Delhi certified refrigeration engineers offer installation and after sales support to clients across Delhi NCR – Noida, Gurgaon and Faridabad and pan India.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== About ===== -->
      <div id="rs-about" class="rs-about style1 bg1 md-pt-80">
        <div class="container">
          <div class="row y-bottom align-items-center">
            <div class="col-lg-6 padding-0" data-animate>
              <picture>
                <source srcset="assets/images/4.webp" type="image/webp">
                <img loading="lazy" decoding="async" class="img-soft about-section-image" src="assets/images/4.jpg" width="585" height="583" alt="Cold Storage Plant">
              </picture>
            </div>
            <div class="col-lg-6 pl-66 pt-75 pb-75 md-pt-42 md-pb-72" data-animate>
              <div class="sec-title mb-24">
                <h2 class="title mb-0 "><span class="section-title-accent">Trusted Cold Storage &amp; Refrigeration Company in Delhi NCR</span></h2>
              </div>
            <p class="mb-20" >
              Singhania Refrigeration is an industrial refrigeration and cold storage solution company based in Okhla, New Delhi. We design, manufacture, install and maintain cold rooms, <a href="cold-chain-refrigeration-ca-store-freon-ammonia-in-india">CA/MA Stores</a>,
              <a href="ammonia-refrigeration-units-manufacturer-in-india">ammonia and freon refrigeration plants</a>,
              <a href="iqf-system-manufacturer-in-india">IQF systems</a>,
              <a href="compressor-rack-system-manufacturer-in-india">compressor racks</a>,
              <a href="solutions">complete cold chain infrastructure</a>,
              <a href="puf-panels-manufacturer-in-india">PUF panels</a>, and
              <a href="dock-shelter-dock-leveler-manufacturer-in-india">dock shelters and transport refrigeration solutions</a>
              for clients across Delhi NCR and India, backed by 25 years of cold chain and logistics experience through the Singhania Group.
          </p>
              <div id="about-more-content" class="about-more-content">
              <div class="about-more-inner">
              <p class="mb-20">
                <strong>What does Singhania Refrigeration do?</strong> We offer the complete cold chain infrastructure - from site assessment and engineering design to equipment supply, civil work, installation, commissioning and continued maintenance - for food processing, pharmaceutical, dairy, agri-export and logistics enterprises, with systems in keeping with FSSAI and WHO-GMP standards.
              </p>
              <p class="mb-20">
                Our in-house team of certified refrigeration engineers handles every project end to end, so there are no third-party coordination or accountability gaps from the first site visit to final handover and beyond.
              </p>
              <!-- <p class="mb-20">
                We aim to provide services that have perfect temperature control, superb energy efficiency, and flawless operation throughout the entire process, starting from the moment of conception to the end. From fields of Gujarat to plates of families in Delhi NCR.
              </p> -->
              <div class="menu-cta menu-cta--flush">
                  <!-- <a class="btn-cfa" href="about-us">Learn more</a> -->
                <a class="btn-cfa" href="about-us">
    About Singhania Refrigeration
</a>
              </div>
              </div>
              </div>
              <button class="about-read-more" type="button" aria-expanded="false" aria-controls="about-more-content">
                <span>Read More</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== Why Choose Us ===== -->
      <style>
      .rs-why-choose{ padding:64px 0; }
      .rs-why-choose .why-list{
        list-style:none; margin:0; padding:0;
        display:flex; flex-wrap:wrap; justify-content:center; gap:20px;
      }
      .rs-why-choose .why-list li{
        position:relative; padding:20px 20px 20px 54px;
        background:#fff; border:1px solid rgba(0,11,79,.1); border-radius:12px;
        box-shadow:0 5px 16px rgba(0,11,79,.07);
        color:#2d3c63; line-height:1.55;
        /* margin-top: 30px; */
        flex:0 1 calc(33.333% - 14px);
        box-sizing:border-box;
        transition:transform .25s ease, box-shadow .25s ease;
      }
      .rs-why-choose .why-list li:hover{
        transform:translateY(-3px);
        box-shadow:0 12px 26px rgba(0,11,79,.12);
      }
      .rs-why-choose .why-list li::before{
        content:""; position:absolute; left:20px; top:22px; width:20px; height:20px; border-radius:50%;
        background:conic-gradient(from 180deg,#3b5bb7,#2a427f); box-shadow:inset 0 0 0 3px #fff;
      }
      @media (max-width:991.98px){
        .rs-why-choose .why-list li{ flex-basis:calc(50% - 10px); }
      }
      @media (max-width:575.98px){
        .rs-why-choose .why-list li{ flex-basis:100%; }
      }
      </style>
      <section class="rs-why-choose bg1" data-animate>
        <div class="container">
          <div class="sec-title text-center mb-40">
            <h2 class="title mb-0"><span class="section-title-accent">Why Delhi NCR Businesses Choose Us</span></h2>
          </div>
          <ul class="why-list">
            <li>25 years of cold chain engineering experience through the Singhania Group</li>
            <li>10+ years operating as Singhania Refrigeration, with a growing pan-India project base</li>
            <li>Energy-efficient refrigeration systems engineered to reduce electricity consumption vs conventional installations</li>
            <li>99.9% system uptime backed by structured preventive maintenance and AMC services</li>
            <li>Systems designed in line with FSSAI compliant cold storage and WHO-GMP pharma cold room requirements</li>
          </ul>
        </div>
      </section>

      <!-- ===== Services Grid ===== -->
      <style>
      .svc-grid{ position:relative; }
      .svc-marquee{ overflow:hidden; }
      .svc-marquee-track{ display:flex; gap:20px; width:max-content; will-change:transform; }
      .svc-marquee-track .svc-slide{ flex:0 0 auto; width:360px; }
      @media (max-width:767.98px){
        .svc-marquee-track .svc-slide{ width:280px; }
      }
      .svc-grid .svc-card{
        position:relative; display:block; width:100%; height:360px; border-radius:16px; overflow:hidden;
        text-decoration:none; box-shadow:0 10px 24px rgba(0,0,0,.10);
      }
      .svc-grid .svc-card .svc-card__photo{
        position:absolute; inset:0; width:100%; height:100%; object-fit:cover;
        transition:transform .5s ease;
      }
      .svc-grid .svc-card:hover .svc-card__photo{ transform:scale(1.08); }
      .svc-grid .svc-card__overlay{
        position:absolute; inset:0; z-index:2; background:rgba(4,10,26,0);
        display:flex; flex-direction:column; align-items:center; justify-content:center;
        gap:14px; text-align:center; padding:24px; opacity:0;
        transition:opacity .35s ease, background .35s ease;
      }
      .svc-grid .svc-card:hover .svc-card__overlay,
      .svc-grid .svc-card:focus-visible .svc-card__overlay{
        opacity:1; background:rgba(4,10,26,.55);
      }
      .svc-grid .svc-card__icon{
        width:64px; height:64px; border-radius:14px; flex:0 0 auto;
        background:rgba(255,255,255,.18); border:1px solid rgba(255,255,255,.4);
        backdrop-filter:blur(3px); -webkit-backdrop-filter:blur(3px);
        display:flex; align-items:center; justify-content:center;
      }
      .svc-grid .svc-card__icon img{
        width:32px; height:32px; object-fit:contain; filter:brightness(0) invert(1);
      }
      .svc-grid .svc-card__icon i{ color:#fff; font-size:26px; }
      .svc-grid .svc-card__title{
        font-size:16px; font-weight:700; line-height:1.35; margin:0; color:#fff;
      }
      .svc-grid .svc-card__desc{
        font-size:13px; line-height:1.5; margin:0; color:rgba(255,255,255,.88);
        max-width:300px; display:-webkit-box; -webkit-line-clamp:4; line-clamp:4; -webkit-box-orient:vertical;
        overflow:hidden;
      }
      .svc-view-all{
        display:inline-flex; align-items:center; gap:12px; background:#082243; color:#fff;
        padding:15px 28px; border-radius:50px; font-weight:600; font-size:15px;
        text-decoration:none; transition:all .3s ease;
      }
      .svc-view-all:hover{ background:#228bfd; color:#fff; transform:translateY(-2px); }
      .svc-view-all i{
        background:#fff; color:#0a0a0a; width:26px; height:26px; border-radius:50%;
        display:inline-flex; align-items:center; justify-content:center; font-size:12px;
      }
      @media (max-width: 767.98px){
        .svc-grid .svc-card__overlay{ opacity:1; background:rgba(4,10,26,.45); }
      }
      @media (min-width: 576px) and (max-width: 767.98px){
        .svc-grid .svc-card{ height:300px; }
        .svc-grid .svc-card__overlay{ gap:8px; padding:14px; }
        .svc-grid .svc-card__icon{ width:44px; height:44px; border-radius:10px; }
        .svc-grid .svc-card__icon img{ width:22px; height:22px; }
        .svc-grid .svc-card__icon i{ font-size:18px; }
        .svc-grid .svc-card__title{ font-size:13px; }
        .svc-grid .svc-card__desc{ font-size:11px; -webkit-line-clamp:3; line-clamp:3; }
      }
      @media (max-width: 575.98px){
        .svc-grid .svc-card{ height:320px; }
      }
      </style>
      <div id="rs-services" class="rs-services style1 modify pt-64 pb-84 md-pt-72 md-pb-64">
        <div class="container" data-animate>
          <div class="sec-title text-center mb-47 md-mb-42">
            <div class="sub-title primary">Services</div>
            <h2 class="title mb-0 pt-20">Cold Chain &amp; Refrigeration Services in Delhi NCR &amp; India</h2>
            <!-- <p class="about-copy--lead">Singhania Refrigeration, located in Okhla, New Delhi, offers  the entire spectrum of cold chain and industrial refrigeration solutions for your  product, industry and regulatory requirements, whether you are operating a food  processing plant, pharmacy, dairy or 3PL warehouse.
            </p> -->
          </div>

          <div class="svc-marquee svc-grid">
          <div class="svc-marquee-track marquee-track">
            <!-- Service 1 -->
            <div class="svc-slide">
              <a class="svc-card" href="truck-ac-installation-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/truck-ac.webp" alt="Refrigerated truck AC and container unit">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/refrigerated-truck-acs-containers.webp" alt=""></span>
                  <h3 class="svc-card__title">Refrigerated Truck ACs &amp; Containers</h3>
                  <p class="svc-card__desc">Transport Refrigeration Units for trucks and reefer containers, keeping Perishables – Food, Dairy and Pharma Products, temperature controlled on routes across Delhi NCR and Pan India.</p>
                </div>
              </a>
            </div>

            <!-- Service 2 -->
            <div class="svc-slide">
              <a class="svc-card" href="cold-storage-refrigeration-units-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/cold-storage.jpg" alt="Cold room and cold storage solution">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/cold-storage-warehouse.webp" alt=""></span>
                  <h3 class="svc-card__title">Cold Rooms &amp; Storage Solutions</h3>
                  <p class="svc-card__desc">Ammonia and freon cold rooms, Controlled Atmosphere (CA) stores, ripening chambers and blast freezer systems, designed to meet the shelf-life and temperature controlled storage requirements of your product.</p>
                </div>
              </a>
            </div>

            <!-- Service 3 -->
            <div class="svc-slide">
              <a class="svc-card" href="compressor-rack-system-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/compressor-rack-system-e1600420693281.webp" alt="Industrial compressor rack system">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/compressor-rack-systems.webp" alt=""></span>
                  <h3 class="svc-card__title">Compressor Rack Systems</h3>
                  <p class="svc-card__desc">Centralised, energy efficient compressor rack systems for supermarkets, food retail chains and large refrigerated warehouses, reducing refrigerant charge and maintenance.</p>
                </div>
              </a>
            </div>

            <!-- Service 4 -->
            <div class="svc-slide">
              <a class="svc-card" href="ammonia-refrigeration-units-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/ammonia-refrigeration.webp" alt="Ammonia refrigeration unit">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/ammonia-refrigeration-units.webp" alt=""></span>
                  <h3 class="svc-card__title">Ammonia Refrigeration Units</h3>
                  <p class="svc-card__desc">Industrial grade ammonia (NH3) and Freon refrigeration plants for food processing units, temperature controlled warehouses, fisheries and dairy operations requiring high capacity, energy efficient industrial cooling.</p>
                </div>
              </a>
            </div>

            <!-- Service 5 -->
            <div class="svc-slide">
              <a class="svc-card" href="ripening-systems-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/banana-ripening-cold-room.webp" alt="Ripening chamber for fruits and produce">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/ripening-chambers.webp" alt=""></span>
                  <h3 class="svc-card__title">Ripening Chambers</h3>
                  <p class="svc-card__desc">Ethylene-controlled ripening chambers for bananas, mangoes, papayas and other climacteric fruits, delivering consistent, ready-to-sell ripening for every pallet.</p>
                </div>
              </a>
            </div>

            <!-- Service 6 -->
            <div class="svc-slide">
              <a class="svc-card" href="iqf-system-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/seafood-storage-facility.webp" alt="IQF individual quick freezing technology">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/iqf-technology.webp" alt=""></span>
                  <h3 class="svc-card__title">IQF Technology</h3>
                  <p class="svc-card__desc">Individual Quick Freeze (IQF) machine systems flash-freeze seafood, fruits, vegetables and ready-to-eat products for export-quality output and to preserve texture, nutrition and appearance.</p>
                </div>
              </a>
            </div>

            <!-- Service 7 -->
            <div class="svc-slide">
              <a class="svc-card" href="puf-panels-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/panel.webp" alt="PUF panel and insulated cold storage door">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/puf-panels-insulated-doors.webp" alt=""></span>
                  <h3 class="svc-card__title">PUF Panels &amp; Insulated Doors</h3>
                  <p class="svc-card__desc">High density PUF panel insulation and cold room doors that make up the thermal envelope of your cold storage facility – designed for airtight insulation and minimal energy loss.</p>
                </div>
              </a>
            </div>

            <!-- Service 8 -->
            <div class="svc-slide">
              <a class="svc-card" href="dock-shelter-dock-leveler-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/docking-system-facility.webp" alt="Dock shelter and dock leveler equipment">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/dock-shelters-dock-levelers.webp" alt=""></span>
                  <h3 class="svc-card__title">Dock Shelters &amp; Dock Levelers</h3>
                  <p class="svc-card__desc">Dock Shelter and Leveler Systems seal the gap between your cold facility and delivery vehicles. Protect product temperature while loading and unloading.</p>
                </div>
              </a>
            </div>
            <!-- services 9 -->
            <div class="svc-slide">
              <a class="svc-card" href="heavy-duty-racks-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/packing-and-grading-line.webp" alt="Heavy Duty Rack">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><i class="fa fa-cubes" aria-hidden="true"></i></span>
                  <h3 class="svc-card__title">Heavy Duty Racks</h3>
                  <p class="svc-card__desc">Singhania Refrigeration makes Heavy Duty Racks based on your actual pallet loads, aisle lengths and forklift types, instead of making catalog racks that fit your warehouse. Ideal for temperature controlled warehouses, distribution centres and general warehousing in India.</p>
                </div>
              </a>
            </div>
            <!-- Services 10 -->
            <div class="svc-slide">
              <a class="svc-card" href="multideck-cabinet-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/multideck-cabinet.webp" alt="Multideck Cabinet">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
                  <h3 class="svc-card__title">Multideck Cabinet</h3>
                  <p class="svc-card__desc">Singhania Refrigeration manufactures Multideck Cabinets that offer the right balance of product visibility and uniform, energy-efficient cooling for supermarket chains, convenience stores and food retail outlets that need their dairy, beverage, deli and frozen displays to look good and stay cold all day long.</p>
                </div>
              </a>
            </div>
            <!-- services 11 -->
            <div class="svc-slide">
              <a class="svc-card" href="cold-storage-doors-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/coldroom-door.webp" alt="Doors and CA Doors">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/puf-panels-insulated-doors.webp" alt=""></span>
                  <h3 class="svc-card__title">Doors &amp; CA Doors</h3>
                  <p class="svc-card__desc">At Singhania Refrigeration, we design and build insulated Doors & CA Doors for chiller rooms, freezers, and controlled-atmosphere (CA) stores — access points that must keep their seal through hundreds of openings a day, not just look insulated on a spec sheet.</p>
                </div>
              </a>
            </div>
            <!-- services 12 -->
            <div class="svc-slide">
              <a class="svc-card" href="truck-refrigerator-container-manufacturer-in-india">
                <img class="svc-card__photo" loading="lazy" decoding="async" src="assets/images/products/truck-ac-re.jpg" alt="Refrigerated Truck Bodies & Reefer Containers">
                <div class="svc-card__overlay">
                  <span class="svc-card__icon"><img loading="lazy" src="assets/images/services/icons/modify/refrigerated-truck-acs-containers.webp" alt=""></span>
                  <h3 class="svc-card__title">Refrigerated Truck Bodies &amp; Reefer Containers</h3>
                  <p class="svc-card__desc">Singhania Refrigeration is one of the reputed Refrigerated Truck Body Manufacturer in India manufacturing insulated cargo bodies and reefer containers for companies that ship temperature sensitive products.</p>
                </div>
              </a>
            </div>
          </div>
          </div>

          <div class="tt-cta services-products-cta text-center mt-30">
            <a href="products" class="svc-view-all">View All Products <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>

      <!-- ===== Portfolio ===== -->
      <div id="rs-portfolio" class="rs-portfolio style1">
        <div class="rs-carousel owl-carousel dot-style1"
             data-loop="true" data-items="4" data-margin="22" data-autoplay="true"
             data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
             data-dots="true" data-nav="false" data-center-mode="false"
             data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
             data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true"
             data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
             data-md-device="3" data-lg-device="4" data-md-device-nav="false" data-md-device-dots="true"
             data-animate>
          <?php
            $get_products = "select * from products";
            $products = mysqli_query($conn, $get_products);
            while ($product = mysqli_fetch_assoc($products)) {
          ?>
          <div class="portfolio-item">
            <div class="img-part">
              <?php $productImage = "admin/uploads/" . $product['image']; ?>
              <?php $productWebp = sr_webp_path($productImage); ?>
              <?php if ($productWebp !== ''): ?><picture><source srcset="<?php echo htmlspecialchars($productWebp, ENT_QUOTES); ?>" type="image/webp"><?php endif; ?>
              <img loading="lazy" decoding="async" class="img-soft" src="<?php echo htmlspecialchars($productImage, ENT_QUOTES); ?>"<?php echo sr_image_size_attrs(sr_preferred_image_path($productImage)); ?> alt="Cold Storage Equipment">
              <?php if ($productWebp !== ''): ?></picture><?php endif; ?>
            </div>
            <div class="content-part">
              <h3 class="title"><a href="products"><?php echo $product['title'];?></a></h3>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

      <!-- ===== Our Brands ===== -->
      <?php
      $brandLogoFiles = array_merge(
        glob(__DIR__ . '/assets/images/clients/*.avif') ?: [],
        glob(__DIR__ . '/assets/images/clients/*.webp') ?: [],
        glob(__DIR__ . '/assets/images/clients/*.png') ?: [],
        glob(__DIR__ . '/assets/images/clients/*.jpg') ?: [],
        glob(__DIR__ . '/assets/images/clients/*.jpeg') ?: []
      );
      natsort($brandLogoFiles);
      $brandLogos = array_values(array_map(function($p){ return 'assets/images/clients/' . basename($p); }, $brandLogoFiles));

      $brandLaneCount = 3;
      $brandLanes = array_fill(0, $brandLaneCount, []);
      foreach ($brandLogos as $bi => $bsrc) {
        $brandLanes[$bi % $brandLaneCount][] = $bsrc;
      }
      ?>
      <style>
      .rs-brands{ padding:80px 0;  background:linear-gradient(180deg,#fafbff 0%,#f3f6ff 100%); }
      .rs-brands .brands-heading-col .sub-title{ margin-bottom:6px; }
      .rs-brands .brands-heading-col .title{ font-size:clamp(24px,3vw,44px); margin-top: 21px; }
      .rs-brands .brands-subtext{ color:#6b7686; margin-top:15px; }

      .brand-marquee{
        display:flex; gap:20px; height:370px; overflow:hidden;
      }
      .brand-marquee__lane{
        flex:1 1 0; min-width:0; overflow:hidden; cursor:ns-resize;
        -webkit-mask-image:linear-gradient(to bottom, transparent, #000 10%, #000 90%, transparent);
        mask-image:linear-gradient(to bottom, transparent, #000 10%, #000 90%, transparent);
      }
      .brand-marquee__track{
        display:flex; flex-direction:column; gap:20px; will-change:transform;
      }
      .brand-card{
        flex:0 0 auto; height:110px; width:100%;
        background:#fff; border-radius:16px; box-shadow:0 8px 22px rgba(0,0,0,.07);
        display:flex; align-items:center; justify-content:center; padding:16px;
      }
      .brand-card img{ max-height:64px; max-width:82%; object-fit:contain; }
      @media (max-width:991.98px){
        .rs-brands .brands-heading-col{ margin-bottom:28px; text-align:center; }
      }
      @media (max-width:575.98px){
        .brand-marquee{ height:340px; }
        .brand-card{ height:100px; }
        .brand-card img{ max-height:56px; }
      }
      </style>
      <section class="rs-brands" data-animate>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-4 brands-heading-col">
              <div class="sec-title mb-0">
                <div class="sub-title primary">OUR PARTNERS</div>
                <h2 class="title mb-0">Popular Partners We Work With</h2>
                <p class="brands-subtext">Prefab, Modular Solutions For Your Special Needs</p>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="brand-marquee">
                <?php foreach ($brandLanes as $lane): if (empty($lane)) continue; ?>
                <div class="brand-marquee__lane">
                  <div class="brand-marquee__track">
                    <?php foreach ([1, 2] as $rep): // duplicated once for a seamless loop ?>
                      <?php foreach ($lane as $lsrc): ?>
                      <div class="brand-card"><img src="<?php echo htmlspecialchars($lsrc); ?>" alt="Client logo" loading="lazy"></div>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script>
      document.addEventListener("DOMContentLoaded", function(){
        var speed = 26; // px per second, auto-scroll
        document.querySelectorAll(".brand-marquee__lane").forEach(function(lane){
          var track = lane.querySelector(".brand-marquee__track");
          if(!track) return;
          var offset = 0, half = 0, paused = false, last = null;
          function measure(){ half = track.scrollHeight / 2; }
          measure();
          window.addEventListener("resize", measure);
          function wrap(){ if(half > 0){ offset = ((offset % half) + half) % half; } }
          function frame(now){
            if(last === null) last = now;
            var dt = (now - last) / 1000;
            last = now;
            if(!paused){ offset += speed * dt; wrap(); }
            track.style.transform = "translateY(" + (-offset) + "px)";
            requestAnimationFrame(frame);
          }
          requestAnimationFrame(frame);
          lane.addEventListener("mouseenter", function(){ paused = true; });
          lane.addEventListener("mouseleave", function(){ paused = false; });
          // Scrolling the mouse wheel over the logos scrolls the images, not the page.
          lane.addEventListener("wheel", function(e){
            e.preventDefault();
            offset += e.deltaY;
            wrap();
            track.style.transform = "translateY(" + (-offset) + "px)";
          }, { passive: false });
        });
      });
      </script>

      <!-- ===== Testimonials ===== -->
      <style>
      .rs-testimonial.testimonial-blue-bg{
        /* background:linear-gradient(180deg,#fafbff 0%,#f3f6ff 100%); */
        padding:48px 0 56px;
      }
      .rs-testimonial.testimonial-blue-bg .sub-title{ color:#002243; }
      .rs-testimonial.testimonial-blue-bg .title{ color:#002243; }
      .rs-testimonial .testimonial-card-shell{
        background:#fff;
        border-radius:26px;
        padding:32px 28px 20px;
        box-shadow:0 30px 60px rgba(0,0,0,.22);
      }
      .testi-marquee{ overflow:hidden; }
      .testi-marquee-track{ display:flex; width:max-content; will-change:transform; }
      .rs-testimonial .testi-item{ padding:0 16px; text-align:left; flex:0 0 auto; width:360px; }
      @media (max-width:767.98px){
        .rs-testimonial .testi-item{ width:280px; }
      }
      .rs-testimonial .content-part{ position:relative; }
      .rs-testimonial .icon-part.testimonial-quote{
        color:#e2e7f2; font-size:30px; text-align:right; line-height:1; margin-bottom:6px;
      }
      .rs-testimonial .desc{
        color:#54607a; font-size:15px; line-height:1.7;
        display:-webkit-box; -webkit-line-clamp:5; -webkit-box-orient:vertical; overflow:hidden;
        min-height:130px;
      }
      .rs-testimonial .posted-by{
        display:flex; align-items:center; gap:12px;
        /* margin-top:16px; padding-top:16px;  */
        border-top:1px solid #e7ebf3;
      }
      .rs-testimonial .avatar-initial{
        width:40px; height:40px; border-radius:50%; flex:0 0 auto;
        background:#0f2442; color:#fff; font-weight:700; font-size:16px;
        display:flex; align-items:center; justify-content:center;
      }
      .rs-testimonial .posted-by-info{ text-align:left; }
      .rs-testimonial .posted-by .name{ margin:0; font-size:15px; font-weight:700; color:#0f2442; }
      .rs-testimonial .posted-by .designation{ font-size:13px; color:#8792a8; }
      @media (max-width:767.98px){
        .rs-testimonial .testimonial-card-shell{ padding:26px 18px 16px; }
        .rs-testimonial .desc{ min-height:0; -webkit-line-clamp:6; }
      }
      </style>
      <div class="rs-testimonial style1 testimonial-blue-bg">
        <div class="container" data-animate>
          <div class="sec-title text-center mb-28 md-mb-24">
            <div class="sub-title primary">TESTIMONIAL</div>
            <h2 class="title mb-0">What Our Clients Say</h2>
          </div>
          <div class="testimonial-card-shell">
            <div class="testi-marquee">
            <div class="testi-marquee-track marquee-track">
              <div class="testi-item">
                <div class="content-part">
                  <div class="icon-part testimonial-quote"><i class="fa fa-quote-right"></i></div>
                  <div class="desc">Singhania Refrigeration delivered our entire CA store on time, within budget and to   exact specification. We have not had a single unplanned downtime in over a year.</div>
                </div>
                <div class="posted-by">
                  <span class="avatar-initial">O</span>
                  <div class="posted-by-info">
                    <h3 class="name">Operations Director</h3>
                    <span class="designation">Agri-Export Company, Delhi NCR</span>
                  </div>
                </div>
              </div>
              <div class="testi-item">
                <div class="content-part">
                  <div class="icon-part testimonial-quote"><i class="fa fa-quote-right"></i></div>
                  <div class="desc">We needed a WHO-GMP-aligned pharma cold room on a tight deadline. Singhania's team
                                  handled the complete turnkey delivery — design, panels, refrigeration and documentation
                                  — without a single coordination issue.</div>
                </div>
                <div class="posted-by">
                  <span class="avatar-initial">O</span>
                  <div class="posted-by-info">
                    <h3 class="name">Operations Head</h3>
                    <span class="designation">Pharmaceutical Distributor, New Delhi</span>
                  </div>
                </div>
              </div>
              <div class="testi-item">
                <div class="content-part">
                  <div class="icon-part testimonial-quote"><i class="fa fa-quote-right"></i></div>
                  <div class="desc">Their AMC support has been dependable for our cold storage plant. Whenever there is a service requirement, the response is practical and fast, which helps us avoid unnecessary downtime.</div>
                </div>
                <div class="posted-by">
                  <span class="avatar-initial">M</span>
                  <div class="posted-by-info">
                    <h3 class="name">Manoj Aggarwal</h3>
                    <span class="designation">Cold Storage Owner, Kundli</span>
                  </div>
                </div>
              </div>
              <div class="testi-item">
                <div class="content-part">
                  <div class="icon-part testimonial-quote"><i class="fa fa-quote-right"></i></div>
                  <div class="desc">We got a controlled temperature room installed for our pharma inventory in Noida. The finishing, insulation work, and after-installation checks were handled properly by their team.</div>
                </div>
                <div class="posted-by">
                  <span class="avatar-initial">N</span>
                  <div class="posted-by-info">
                    <h3 class="name">Neeraj Malhotra</h3>
                    <span class="designation">Pharma Warehouse Manager, Noida</span>
                  </div>
                </div>
              </div>
              <div class="testi-item">
                <div class="content-part">
                  <div class="icon-part testimonial-quote"><i class="fa fa-quote-right"></i></div>
                  <div class="desc">For our fruit and vegetable storage, they suggested a practical cold room setup instead of overselling. The cooling is uniform and the maintenance team is easy to reach.</div>
                </div>
                <div class="posted-by">
                  <span class="avatar-initial">S</span>
                  <div class="posted-by-info">
                    <h3 class="name">Sandeep Yadav</h3>
                    <span class="designation">Vegetable Supplier, Gurugram</span>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

      <style>
        .section-pad{ padding:80px 0; }
        .section-soft{ background: linear-gradient(180deg,#fafbff 0%,#f3f6ff 100%); }
        .h2{ font-size:clamp(26px,3.4vw,36px); line-height:1.15; font-weight:800; color:#0f2442; }
        .lead{ font-size:clamp(15px,1.7vw,17px); color:#2c3e68; }

        .checklist{ list-style:none; margin:16px 0 0; padding:0; display:grid; gap:10px; }
        .checklist li{ position:relative; padding-left:28px; color:#2d3c63; }
        .checklist li::before{
          content:""; position:absolute; left:0; top:5px; width:18px; height:18px; border-radius:50%;
          background:conic-gradient(from 180deg,#3b5bb7,#2a427f); box-shadow:inset 0 0 0 3px #fff;
        }
      </style>
      
<style>
        /* === Innovation That Drives Trust (scoped) === */
        .innov-section{ padding:88px 0; }
        .innov-eyebrow{
          display:inline-block; font-weight:700; font-size:22px; letter-spacing:.12em; text-transform:uppercase;
          padding:8px 17px; border-radius:999px; background:#e9eeff; color:#0e2344; margin-bottom:12px;
        }
        .innov-title{ font-size:clamp(26px,3.4vw,36px); line-height:1.15; font-weight:800; color:#0e2344; margin:0 0 10px; }
        .innov-lead{ font-size:clamp(15px,1.7vw,17px); color:#2c3e68; max-width:900px; margin:0 auto 24px; }
        
        /* cards */
        .innov-grid{ margin-top:18px; }
        .innov-card{
          height:100%; background:#ffffff; border:1px solid rgba(15,36,66,.06); border-radius:16px;
          padding:20px 18px; box-shadow:0 10px 26px rgba(15,36,66,.08);
          position:relative; overflow:hidden;
          transition:transform .35s ease, box-shadow .35s ease, border-color .35s ease;
        }
        .innov-card:before{
          content:""; position:absolute; left:0; right:0; bottom:0; height:100%;
          background:#082243; border-radius:16px 16px 0 0;
          transform:translateY(100%); transition:transform .65s ease; z-index:0;
        }
        .innov-card:hover:before{ transform:translateY(0); }
        .innov-card > *{ position:relative; z-index:1; }
        .innov-card:hover{
          transform:translateY(-6px);
          box-shadow:0 18px 40px rgba(15,36,66,.18);
          border-color:rgba(8,34,67,.18);
        }
        .innov-icon{
          width:48px; height:48px; border-radius:12px; display:inline-flex; align-items:center; justify-content:center;
          background:#0e2344; color:#fff; font-size:22px; box-shadow:0 8px 20px rgba(108,99,255,.28);
          margin-bottom:12px; transition:background .3s ease .42s, color .3s ease .42s, transform .35s ease;
        }
        .innov-card h3{ margin:0 0 6px; color:#0f2442; font-size:20px; font-weight:800; transition:color .35s ease .24s; }
        .innov-card p{ margin:0; color:#42507a; transition:color .35s ease .08s; }
        .innov-card:hover .innov-icon{
          background:#ffffff;
          color:#082243;
          transform:scale(1.08);
        }
        .innov-card:hover h3,
        .innov-card:hover p{ color:#ffffff !important; }
        
        @media (max-width: 991.98px){
          .innov-section{ padding:64px 0; }
        }
        </style>

      <!-- ===== Innovation That Drives Trust ===== -->
     <section class="innov-section section-pad" data-animate>
          <div class="container">
            <div class="row justify-content-center text-center">
              <div class="col-lg-10">
                <span class="innov-eyebrow">WHY CHOOSE US</span>
                <h2 class="innov-title pt-20">Engineered for Reliability: Industrial Refrigeration Built for Tomorrow</h2>
                <p class="innov-lead">
                 Singhania Refrigeration engineers reliability into every cold room, CA store and industrial refrigeration plant we deliver. Reliability is not an afterthought.
                </p>
              </div>
            </div>
        
            <!-- 2×2 feature cards -->
            <div class="row innov-grid">
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-recycle" aria-hidden="true"></i></div>
                  <h3>Reduced Wastage &amp; Losses</h3>
                  <p class="text-justify">Precision temperature control and CA/MA technology keep products fresh from storage to transit, reducing cold chain losses in food and agri businesses.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <h3>Lower Energy Consumption</h3>
                  <p class="text-justify">Energy-efficient refrigeration with high-efficiency compressors, PUF insulation and smart controls that minimize operating costs without compromising temperature stability.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                  <h3>Improved Uptime</h3>
                  <p class="text-justify">We do preventive maintenance and AMC services. We also give equipment redundancy to ensure 99.9% system availability across our installed base.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-shield" aria-hidden="true"></i></div>
                  <h3>Safety &amp; Compliance</h3>
                  <p class="text-justify">Systems for FSSAI compliant cold storage and WHO-GMP pharma cold room applications with auditable temperature logs and alarms for food and pharmaceutical cold storage.</p>
                </div>
              </div>
            </div>
          </div>
        </section>      
      
      <style>
        /* === Towards Tomorrow (scoped) === */
        .tt-section{ padding:88px 0; background: linear-gradient(180deg,#fafbff 0%,#f3f6ff 100%); }
        .tt-section.reverse .tt-col-text{ order:2; }
        .tt-section.reverse .tt-col-visual{ order:1; }
        
        .tt-eyebrow{
          display:inline-block; font-weight:600; font-size:22px; letter-spacing:.12em; text-transform:uppercase;
          padding:9px 12px; border-radius:999px; background:#e9eeff; color:#1a2b6b; margin-bottom:12px;
        }
        .tt-title{ font-size:clamp(26px,3.4vw,36px); line-height:1.15; font-weight:800; color:#0f2442; margin:0 0 10px; }
        .tt-lead{ font-size:clamp(15px,1.7vw,17px); color:#2c3e68; margin-bottom:16px; text-align: justify; }
        .tt-desc{ color:#44527a; margin-bottom:20px; }
        
        .tt-list{ list-style:none; padding:0; margin:0 0 18px; display:grid; gap:12px; text-align: justify; }
        .tt-list li{ position:relative; padding-left:32px; color:#2d3c63; line-height:1.55; text-align: justify;}
        .tt-list li:before{
          content:""; position:absolute; left:0; top:.35em; width:18px; height:18px; border-radius:50%;
          background:conic-gradient(from 180deg,#3b5bb7,#2a427f); box-shadow:inset 0 0 0 3px #fff;
        }
        
        .tt-cta{ display:flex; gap:12px; flex-wrap:wrap; margin-top:6px; }
        .tt-cta-center{
          justify-content:center;
          align-items:center;
          margin-top:34px;
        }
        .tt-cta .btn-primary{
          background:#17203b; border:none; border-radius:5px; padding:12px 18px; font-weight:700; color:#fff;
          box-shadow:0 10px 22px rgba(23,32,59,.22); transition:transform .12s ease, box-shadow .2s ease, background .2s ease;
        }
        .tt-cta .btn-primary:hover{ background:#0f1630; transform:translateY(-1px); box-shadow:0 14px 28px rgba(23,32,59,.28); }
        .tt-cta .btn-link{ font-weight:700; color:#1a2b6b; text-decoration:none; padding:12px 6px; }
        .tt-cta .btn-link:hover{ text-decoration:underline; }
        
        /* Visual */
        .tt-visual{
          position:relative; max-width:520px; margin:0 auto;
        }
        .tt-visual .tt-img{
          width:100%; height:auto; display:block; border-radius:18px;
          box-shadow:0 18px 44px rgba(15,36,66,.18), 0 6px 16px rgba(15,36,66,.10);
        }
        .tt-stats{
          position:absolute; right:-10px; bottom:-16px; background:#fff; border-radius:16px;
          padding:14px 16px; box-shadow:0 16px 40px rgba(0,0,0,.18), 0 6px 16px rgba(0,0,0,.10);
          display:grid; grid-template-columns:auto auto; gap:10px 16px; border:1px solid rgba(0,0,0,.06);
        }
        .tt-chip{
          display:flex; align-items:center; gap:8px; white-space:nowrap;
          font-weight:700; color:#0f2442;
        }
        .tt-dot{ width:10px; height:10px; border-radius:50%; background:linear-gradient(180deg,#6c63ff,#3b5bb7); box-shadow:0 0 0 3px #eef2ff inset;}
        
        /* Mobile tweaks */
        @media (max-width: 991.98px){
          .tt-section{ padding:64px 0; }
          .tt-stats{ position:static; margin-top:12px; }
          .tt-cta-center{ margin-top:24px; }
        }
        </style>


      <!-- ===== Towards Tomorrow ===== -->
      <section class="tt-section section-soft" data-animate>
          <div class="container">
            <div class="row align-items-center">
              <!-- CONTENT -->
              <div class="col-lg-7 tt-col-text" data-animate>
                <!-- <span class="tt-eyebrow">Advanced Cold Chain &amp; Refrigeration Services</span> -->
                 <span class="tt-eyebrow">OUR EXPERTISE</span>
                <h2 class="tt-title">Advanced Cold Chain &amp; Refrigeration Solutions in India</h2>
                <p class="tt-lead">
                   Singhania Refrigeration provides cold chain &amp; industrial refrigeration solutions for food processing, pharmaceuticals, dairy, agri-export &amp; logistics in Delhi NCR &amp; India. Our energy efficient ammonia and freon refrigeration systems are designed to ensure product quality from production to final delivery.
                </p>
                <p class="tt-desc">
                  Our core solutions include:
                </p>
                <ul class="tt-list">
                  <li><a href="turnkey-cold-storage-solutions-in-india">Turnkey cold storage and refrigeration project execution</a> &mdash; from design to commissioning and AMC.</li>
                  <li><a href="segment-wise-cold-storage-solutions-in-india">Segment-specific cold chain solutions</a> for dairy, pharma, seafood and agriculture.</li>
                  <li><a href="cold-chain-refrigeration-ca-store-freon-ammonia-in-india">Cold chain refrigeration, CA store and ammonia/freon systems</a>.</li>
                  <li><a href="cold-chain-quality-monitoring-solution-in-india">Real-time quality monitoring for cold storage</a> with IoT sensors and audit trails.</li>
                  <li><a href="warehouse-management-solutions-in-india">End-to-end warehouse management system</a> for cold chain operations.</li>
                  <li><a href="transport-management-solutions-in-india">Cold chain transport management</a> for reliable in-transit visibility.</li>
                  <li><a href="transport-refrigeration-solutions-in-india">Transport refrigeration solutions</a> for reefer trucks and insulated vehicles.</li>
                </ul>
                <!-- <ul class="tt-list">
                  <li>Advanced cold storage and refrigeration systems for industrial applications</li>
                  <li>Energy-efficient ammonia and freon-based cooling solutions</li>
                  <li>End-to-end cold chain infrastructure for logistics and warehousing</li>
                </ul> -->
                <br>
                <!-- <div class="tt-cta">
                  <a href="contact" class="btn btn-primary">Talk to an Expert</a>
                  <a href="products" class="btn-link">Explore Our Products →</a>
                </div> -->
              </div>
        
              <!-- VISUAL -->
              <div class="col-lg-5 tt-col-visual md-mt-40" data-animate>
                <div class="tt-visual">
                  <!-- Replace src with your image -->
                  <img loading="lazy" decoding="async" class="tt-img" src="admin/uploads/Blog-Image-Cold-Chain-Logistics.jpg" width="1110" height="791" alt="Industrial Refrigeration and Cold Storage">
                  <div class="tt-stats">
                    <div class="tt-chip"><span class="tt-dot"></span> 10+ Years</div>
                    <div class="tt-chip"><span class="tt-dot"></span> 99.9% Uptime</div>
                    <div class="tt-chip"><span class="tt-dot"></span> Pan-India</div>
                    <div class="tt-chip"><span class="tt-dot"></span> Energy-Smart</div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="tt-cta tt-cta-center">
                  <a href="contact" class="btn btn-primary">Talk to an Expert</a>
                  <a href="products" class="btn-link">Explore Our Products →</a>
                </div>
              </div>
            </div>
          </div>
        </section>

      <style>
        /* === FAQ Section (scoped) === */
        .faq-section{ padding:88px 0; background:#ffffff; }
        .faq-eyebrow{
          display:inline-block; font-weight:600; font-size:22px; letter-spacing:.12em; text-transform:uppercase;
          padding:9px 12px; border-radius:999px; background:#e9eeff; color:#0e2344; margin-bottom:12px;
        }
        .faq-title{ font-size:clamp(26px,3.4vw,36px); line-height:1.15; font-weight:800; color:#0f2442; margin:0; }
        .faq-lead{ color:#44527a; max-width:760px; margin:12px auto 0; }
        .faq-list{ max-width:980px; margin:34px auto 0; display:grid; gap:12px; }
        .faq-list details{
          background:#fff;
          border:1px solid rgba(15,36,66,.08);
          border-radius:12px;
          box-shadow:0 10px 26px rgba(15,36,66,.06);
          overflow:hidden;
          transition:border-color .2s ease, box-shadow .2s ease;
        }
        .faq-list details[open]{ border-color:rgba(59,91,183,.22); box-shadow:0 16px 34px rgba(15,36,66,.10); }
        .faq-list summary{
          cursor:pointer;
          list-style:none;
          position:relative;
          padding:18px 52px 18px 20px;
          color:#0f2442;
          font-size:17px;
          line-height:1.45;
        }
        .faq-list summary::-webkit-details-marker{ display:none; }
        .faq-list summary:after{
          content:"+";
          position:absolute;
          right:20px;
          top:50%;
          transform:translateY(-50%);
          width:26px;
          height:26px;
          border-radius:50%;
          background:#eef2ff;
          color:#1a2b6b;
          display:flex;
          align-items:center;
          justify-content:center;
          font-weight:800;
        }
        .faq-list details[open] summary:after{ content:"-"; }
        .faq-list details p{
          margin:0;
          padding:0 20px 20px;
          color:#44527a;
          line-height:1.7;
        }
        @media (max-width: 991.98px){
          .faq-section{ padding:64px 0; }
        }
      </style>

      <!-- ===== FAQ SECTION — FAQPage Schema target ===== -->
      <section id="faqs" class="faq-section" data-animate>
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-lg-10">
              <span class="faq-eyebrow">FAQS</span>
              <h2 class="faq-title">Frequently Asked Questions</h2>
              <p class="faq-lead">Quick answers about Singhania Refrigeration's cold storage, refrigeration and cold chain services.</p>
            </div>
          </div>

          <div class="faq-list">
            <details>
              <summary><strong>What services does Singhania Refrigeration offer?</strong></summary>
              <p>We offer turnkey cold storage construction, cold rooms and CA/MA stores, ammonia and freon refrigeration plants, IQF systems, ripening chambers, compressor rack systems, PUF panels, dock shelters, transport refrigeration and cold chain consulting.</p>
            </details>

            <details>
              <summary><strong>Where is Singhania Refrigeration located?</strong></summary>
              <p>Our office is at C-19, Okhla Phase-I, New Delhi - 110020. We serve clients across Delhi NCR, including Noida, Gurgaon and Faridabad, and execute projects pan-India.</p>
            </details>

            <details>
              <summary><strong>Which industries do you serve?</strong></summary>
              <p>We design cold storage and refrigeration systems for food processing, pharmaceuticals, dairy, agri-export and logistics businesses, with systems aligned to FSSAI and WHO-GMP standards.</p>
            </details>

            <details>
              <summary><strong>How experienced is the Singhania Refrigeration team?</strong></summary>
              <p>Our engineering team draws on 25 years of cold chain and logistics experience through the Singhania Group, delivering ammonia refrigeration, CA storage, IQF and transport refrigeration projects across India.</p>
            </details>

            <details>
              <summary><strong>How quickly will I hear back after submitting an enquiry?</strong></summary>
              <p>Our engineering team responds to all enquiries within 24 hours to discuss your cold storage or refrigeration requirements.</p>
            </details>

            <details>
              <summary><strong>What is controlled atmosphere storage?</strong></summary>
              <p>Controlled atmosphere (CA) storage is a cold storage method that regulates oxygen, carbon dioxide and humidity levels inside a sealed store, alongside temperature, to slow the ripening and respiration of fruits and vegetables. This extends shelf life far beyond standard refrigeration alone, making it the preferred storage format for agri-export businesses handling apples, pears and other long-storage produce.</p>
            </details>

            <details>
              <summary><strong>Ammonia vs freon refrigeration - which is better?</strong></summary>
              <p>Ammonia refrigeration plants are generally more energy-efficient and better suited to large-capacity industrial cold storage, such as food processing units and warehouses, but require stricter safety handling due to toxicity. Freon (HFC/HCFC) refrigeration systems are easier to maintain and commonly used in smaller cold rooms and retail cold storage. The right choice depends on capacity, budget and safety infrastructure - our engineering team assesses this during the site visit.</p>
            </details>

            <details>
              <summary><strong>How does an IQF system work?</strong></summary>
              <p>An IQF (Individual Quick Freeze) machine rapidly freezes individual food items, such as seafood, fruit pieces or vegetables, using high-velocity cold air or cryogenic methods, so each piece freezes separately rather than clumping together. This locks in texture, nutrition and appearance, which is why IQF machine technology is the standard for export-quality frozen food production.</p>
            </details>

            <details>
              <summary><strong>How can I reduce cold storage energy consumption?</strong></summary>
              <p>Cold storage energy consumption can be reduced through high-efficiency compressors, properly sized PUF panel insulation, smart temperature controls, regular preventive maintenance and AMC services, and minimising door-opening losses with dock shelters and dock levelers. Singhania Refrigeration's energy-efficient refrigeration systems are engineered to cut running costs by up to 30% compared with conventional installations.</p>
            </details>

            <details>
              <summary><strong>What does it cost to build a cold storage in Delhi NCR?</strong></summary>
              <p>Cold storage construction cost depends on storage capacity, temperature band, insulation thickness and refrigerant choice. A chiller room at 2–8°C costs considerably less per square foot than a −25°C frozen store or a controlled atmosphere facility, because of compressor sizing and PUF panel thickness. Our engineering team provides a costed layout after a free site survey.</p>
            </details>

            <details>
              <summary><strong>How long does a turnkey cold storage project take?</strong></summary>
              <p>A standard cold room can be commissioned in a few weeks. Larger turnkey cold storage projects involving civil work, ammonia refrigeration plant rooms and CA store commissioning run longer, with the schedule driven by civil readiness and power sanction rather than by refrigeration equipment lead time.</p>
            </details>
          </div>
        </div>
      </section>
      <!-- ===== END FAQ SECTION ===== -->


      <!-- ===== Contact ===== -->
      <div class="rs-contact style1 pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
          <div class="white-bg contact-wrap" data-animate>
            <div class="row align-items-center">
              <!-- LEFT: form -->
              <div class="col-lg-7 form-part">
                <div class="sec-title mb-20">
                  <!-- H2 -->
                  <h2 class="title mb-0">Get In Touch — Cold Storage &amp; Refrigeration Solutions in Okhla, Delhi NCR</h2>

                  <!-- Intro paragraph -->
                  <p class="contact-sub">
                    Looking for cold storage solutions, an industrial refrigeration company or cold chain
                    consulting near you? Fill in the form and our engineering team will respond within
                    24 hours.
                  </p>
                  <!-- <h2 class="title mb-0">Get In Touch</h2>
                  <p class="contact-sub">Fill the form and we’ll reach out within 24 hours.</p> -->
                </div>

                <div id="form-messages"><?php echo $color;?><?php echo $messageBanner;?></div>

                <form class="contact-form" method="post" action="#">
                  <div class="row">
                    <div class="col-md-6 mb-20">
                      <div class="common-control"><input type="text" name="name" placeholder="Name" required=""></div>
                    </div>
                    <div class="col-md-6 mb-20">
                      <div class="common-control"><input type="email" name="email" placeholder="Email" required=""></div>
                    </div>
                    <div class="col-md-6 mb-20">
                      <div class="common-control"><input type="text" name="phone" placeholder="Phone Number" required=""></div>
                    </div>
                    <div class="col-md-6 mb-20">
                      <div class="common-control"><input type="text" name="company" placeholder="Company Name / Organization" required=""></div>
                    </div>
                    <div class="col-md-12 mb-20">
                      <div class="common-control"><input type="text" name="location" placeholder="Your Location" required=""></div>
                    </div>
                    <div class="col-md-12 mb-20">
                      <div class="common-control"><textarea name="message" placeholder="Your Message Here" required=""></textarea></div>
                    </div>
                    <!-- <div class="col-md-12"> -->
                      <div class="submit-btn"><button type="submit" class="readon flex-center" name="submit">Submit Now</button></div>
                    <!-- </div> -->
                  </div>
                </form>
              </div>

              <!-- RIGHT: image -->
              <div class="col-lg-5 text-center md-mt-40">
                <div class="contact-side text-left">
                  <div>
                    <!-- GEO areas — bold tag pills for local/AI search matching -->
                    <p class="contact-areas">
                      <strong>Areas We Serve:</strong>
                      <span class="contact-area-tags">
                        <span>Okhla</span>
                        <span>South Delhi</span>
                        <span>New Delhi</span>
                        <span>Delhi NCR</span>
                        <span>Noida</span>
                        <span>Gurgaon</span>
                        <span>Faridabad</span>
                        <span>Pan-India</span>
                      </span>
                    </p>
                  </div>
                  <img loading="lazy" decoding="async" src="assets/images/contact/contact-us.png" width="740" height="740" alt="Cold Storage Support" class="contact-img">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== Blog ===== -->
      <div class="rs-blog style1 gray-bg pt-91 pb-92 md-pt-71 md-pb-72 sm-pb-75">
        <div class="container" data-animate>
          <div class="row y-middle mb-40 sm-mb-40">
            <div class="col-md-6 sm-mb-22">
              <div class="sec-title">
                <!-- Eyebrow -->
                <span class="sub-title primary right-line">LATEST NEWS</span>
                <!-- H2 -->
                <h2 class="title mb-0 text-justify">Read Latest Updates — Cold Storage &amp; Cold Chain Insights</h2>
                <!-- Intro -->
                <p>Practical guidance on cold storage, industrial refrigeration, energy efficiency and cold chain compliance — written by our in-house refrigeration engineers.</p>
                <!-- <span class="sub-title primary right-line">LATEST NEWS</span>
                <h2 class="title mb-0">Read Latest Updates</h2> -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="btn-part text-right sm-text-left">
                <a class="readon" href="blog">View All Blogs</a>
              </div>
            </div>
          </div>

          <div class="rs-carousel owl-carousel dot-style1"
               data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true"
               data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false"
               data-center-mode="false" data-mobile-device="1" data-ipad-device="2" data-ipad-device2="1"
               data-md-device="3" data-lg-device="3">
            <?php
              require_once __DIR__ . '/blog-slug-helper.php';
              $blogSlugMap = sr_blog_slug_map($conn);
              $record = mysqli_query($conn,"SELECT c.id AS cate_id, c.category_name, b.id AS id , b.image AS image , b.created_at AS created_at,b.title
                                            FROM category c JOIN blogs b ON b.cate_id = c.id ");
              while($row = mysqli_fetch_assoc($record)){
                $blogUrl = 'blog/' . ($blogSlugMap[(int)$row['id']] ?? sr_slugify($row['title']));
              ?>
              <div class="blog-wrap">
                <div class="img-part">
                  <?php $blogImage = (!empty($row['image']) && is_file(__DIR__ . "/admin/uploads/" . $row['image'])) ? "admin/uploads/" . $row['image'] : "admin/uploads/docking-facility.webp"; ?>
                  <?php $blogWebp = sr_webp_path($blogImage); ?>
                  <?php if ($blogWebp !== ''): ?><picture><source srcset="<?php echo htmlspecialchars($blogWebp, ENT_QUOTES); ?>" type="image/webp"><?php endif; ?>
                  <img loading="lazy" decoding="async" class="img-soft blog-cover-img" src="<?php echo htmlspecialchars($blogImage, ENT_QUOTES); ?>"<?php echo sr_image_size_attrs(sr_preferred_image_path($blogImage)); ?> alt="Cold Storage Blog">
                  <?php if ($blogWebp !== ''): ?></picture><?php endif; ?>
                  <div class="fly-btn"><a href="<?php echo htmlspecialchars($blogUrl, ENT_QUOTES, 'UTF-8'); ?>"><i class="flaticon-right-arrow"></i></a></div>
                </div>
                <div class="content-part">
                  <span class="categories"><?php echo $row['category_name'];?></span>
                  <h3 class="title"><a href="<?php echo htmlspecialchars($blogUrl, ENT_QUOTES, 'UTF-8'); ?>"><?php echo $row['title'];?></a></h3>
                  <div class="blog-meta">
                    <div class="user-data"><img loading="lazy" decoding="async" src="assets/images/blog/avatar/1.png" width="40" height="40" alt="Customer Review"><span>Singhania</span></div>
                    <div class="date"><i class="fa fa-clock-o"></i> <?php echo $row['created_at'];?></div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </main>
    <!-- /Main -->
    
         <?php 
            include("chat-box.php");
    ?>

    <?php include('footer.php'); ?>

    <!-- ===== Quick Connect Popup ===== -->
  <div class="modal fade" id="myModal" role="dialog"
       aria-labelledby="quoteDialogTitle"
       aria-describedby="quoteDialogDescription"
       aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="quote-modal">
            <aside class="quote-panel">
             
              <h2 class="quote-title" id="quoteDialogTitle">Get a free quote for your <span>cold storage project</span></h2>
              <p class="quote-copy" id="quoteDialogDescription">Design, installation &amp; maintenance of cold rooms, CA/MA plants, ripening chambers,PUF Panels and IQF systems in Delhi NCR.</p>

              <ul class="quote-benefits">
                <li><i class="fa fa-shield"></i><span>Customized solution for your storage capacity</span></li>
                <li><i class="fa fa-clock-o"></i><span>Quick consultation from our refrigeration team</span></li>
                <li><i class="fa fa-wrench"></i><span>Expert guidance on plant design &amp; equipment selection</span></li>
              </ul>

              <div class="quote-actions">
                <a class="quote-call" href="tel:+91<?php echo preg_replace('/\D+/', '', $mobile ?? ''); ?>">
                  <i class="fa fa-phone"></i>
                  <span><small>Call us</small><strong>+91 <?php echo htmlspecialchars($mobile ?? '', ENT_QUOTES); ?></strong></span>
                </a>
                <a class="quote-whatsapp" href="https://wa.me/91<?php echo preg_replace('/\D+/', '', $mobile ?? ''); ?>" aria-label="Chat on WhatsApp">
                  <i class="fa fa-whatsapp"></i>
                </a>
              </div>
            </aside>

            <section class="quote-form">
              <button type="button" class="quote-close close" aria-label="Close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">Quick Connect</h2>
              <p class="modal-sub">Fill in your details &mdash; we'll do the rest.</p>
              <div id="response" class="mb-3"></div>

              <form action="#" method="post" id="enquiryForm" novalidate>
                <div class="form-group">
                  <label for="name" class="sr-only">Name</label>
                  <i class="fa fa-user-o" aria-hidden="true"></i>
                  <input type="text" class="form-control" id="name" name="name"
                        placeholder="Full name" required>
                </div>

                <div class="form-row-split">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <input type="email" class="form-control" id="email" name="email"
                          placeholder="Email address" required>
                  </div>

                  <div class="form-group">
                    <label for="mobile" class="sr-only">Mobile Number</label>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <input type="tel" class="form-control" id="mobile" name="mobile"
                          placeholder="Mobile number" inputmode="tel" pattern="[0-9+\-\s()]{6,}" required>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary submit_data">
                  <span class="btn-text">Get My Free Quote</span>
                 
                  <span class="submit-spinner" aria-hidden="true">...</span>
                </button>

                <p class="privacy-note"><i class="fa fa-shield"></i><span>Your details are safe with us. No spam, ever.</span></p>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
    <style>
/* Equal-height service cards */
.rs-services .row.gutter-16, .rs-services.modify .row.gutter-16 { display:flex; flex-wrap:wrap; }
.rs-services .row.gutter-16 > [class*="col-"], .rs-services.modify .row.gutter-16 > [class*="col-"] { display:flex; }
.rs-services .service-wrap, .rs-services.modify .service-wrap{
  display:flex; flex-direction:column; height:100%; padding:28px; border-radius:14px; background:#f7f9ff;
  box-shadow:0 4px 16px rgba(0,0,0,0.05); transition: transform .15s ease, box-shadow .15s ease;
}
.rs-services .service-wrap:hover, .rs-services.modify .service-wrap:hover{ transform: translateY(-2px); box-shadow:0 10px 24px rgba(0,0,0,0.08); }
.rs-services .service-wrap .icon-part{ margin-bottom:14px; }
.rs-services .service-wrap .title,
.portfolio-item .content-part .title{ margin:8px 0 6px; font-size:18px; line-height:28px; }
.rs-services .service-wrap .desc{ margin:0; }
@media (max-width: 767.98px){
  .rs-services .row.gutter-16, .rs-services.modify .row.gutter-16 { display:block; }
  .rs-services .row.gutter-16 > [class*="col-"], .rs-services.modify .row.gutter-16 > [class*="col-"] { display:block; }
  .rs-services .service-wrap, .rs-services.modify .service-wrap{ height:auto; }
}
    </style>

    <!-- ===== Micro-animations & Popup timing ===== -->
    <script>
$(window).on('load', function () {
  if (!sessionStorage.getItem('sr_popup_shown')) {
    setTimeout(function () {
      $('#myModal').modal('show');
      // sessionStorage.setItem('sr_popup_shown', '1');
    }, 2500);
  }
});

document.addEventListener("DOMContentLoaded", function(){
  const aboutToggle = document.querySelector(".about-read-more");
  const aboutMore = document.getElementById("about-more-content");
  if (aboutToggle && aboutMore) {
    aboutToggle.addEventListener("click", function(){
      const isExpanded = this.getAttribute("aria-expanded") === "true";
      this.setAttribute("aria-expanded", String(!isExpanded));
      aboutMore.classList.toggle("is-open", !isExpanded);
      this.querySelector("span").textContent = isExpanded ? "Read More" : "Read Less";
    });
  }

  const elems = document.querySelectorAll("[data-animate]");
  const io = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        e.target.classList.add("active");
        io.unobserve(e.target);
      }
    });
  }, {threshold: 0.2});
  elems.forEach(el=>io.observe(el));

  document.querySelectorAll('.rs-services .service-wrap').forEach(function(card){
    card.addEventListener('click', function(e){
      if (e.target.closest('a')) return;
      var firstLink = card.querySelector('a[href]');
      if (firstLink) {
        window.location.href = firstLink.href;
      }
    });
  });
});

$(function(){
  function showError($el, msg){
    $el.after('<span class="error">'+msg+'</span>');
  }

  $('#enquiryForm').on('submit', function(e){
    e.preventDefault();

    var $form     = $('#enquiryForm');
    var $btn      = $form.find('.submit_data');

    var name      = $('#name').val().trim();
    var email     = $('#email').val().trim();
    var mobile    = $('#mobile').val().trim();

    $("#response").empty();
    $("#myModal .error").remove();

    var hasError = false;
    if (!name){ showError($('#name'), 'Please enter your name'); hasError = true; }

    if (!email){
      showError($('#email'), 'Please enter your email');
      hasError = true;
    } else {
      var regEx = /^([a-zA-Z0-9_.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})$/;
      if (!regEx.test(email)){ showError($('#email'), 'Please enter a valid email'); hasError = true; }
    }

    if (!mobile){
      showError($('#mobile'), 'Please enter your mobile number');
      hasError = true;
    } else if (!/^[0-9]{10}$/.test(mobile)){
      showError($('#mobile'), 'Enter a valid 10-digit mobile number');
      hasError = true;
    }

    if (hasError) return;

    $btn.prop('disabled', true);
    $btn.find('.submit-spinner').addClass('is-visible');

    $.ajax({
      url: "enquirypopup.php",
      method: "POST",
      dataType: "json",
      data: {
        name: name,
        email: email,
        mobile: mobile
      },
      success: function(res){
        if (res && res.status === "success"){
          $("#response").html("<span class='text-success'>Enquiry has submitted Successfully ✅</span>");
          $form[0].reset();
          setTimeout(function(){
            $("#myModal").modal('hide');
            $("#response").html("");
          }, 1500);
        } else {
          var msg = (res && res.message) ? res.message : "Something went wrong";
          $("#response").html("<span class='text-danger'>"+ msg +" ❌</span>");
        }
      },
      error: function(xhr, status, error){
        console.error("AJAX Error:", error);
        $("#response").html("<span class='text-danger'>Network error. Please try again.</span>");
      },
      complete: function(){
        $btn.prop('disabled', false);
        $btn.find('.submit-spinner').removeClass('is-visible');
      }
    });
  });
});


</script>

<script>
document.addEventListener("DOMContentLoaded", function(){
  function initHorizontalMarquee(container, speed){
    var track = container.querySelector(".marquee-track");
    if(!track || track.dataset.marqueeInit) return;
    track.dataset.marqueeInit = "1";
    var originalChildren = Array.prototype.slice.call(track.children);
    originalChildren.forEach(function(node){ track.appendChild(node.cloneNode(true)); });
    var offset = 0, half = 0, paused = false, last = null;
    function measure(){ half = track.scrollWidth / 2; }
    measure();
    window.addEventListener("resize", measure);
    function wrap(){ if(half > 0){ offset = ((offset % half) + half) % half; } }
    function frame(now){
      if(last === null) last = now;
      var dt = (now - last) / 1000;
      last = now;
      if(!paused){ offset += speed * dt; wrap(); }
      track.style.transform = "translateX(" + (-offset) + "px)";
      requestAnimationFrame(frame);
    }
    requestAnimationFrame(frame);
    container.addEventListener("mouseenter", function(){ paused = true; });
    container.addEventListener("mouseleave", function(){ paused = false; });
  }
  document.querySelectorAll(".svc-marquee").forEach(function(el){ initHorizontalMarquee(el, 40); });
  document.querySelectorAll(".testi-marquee").forEach(function(el){ initHorizontalMarquee(el, 30); });
});
</script>

<script>
jQuery(function ($) {
  var $slider = $('#nivoSlider');
  var TICK_MS = 4000;                 // same as pauseTime
  var tick = null;

  var captionSyncTimer = null;
  var captionObserver = null;

  function ensureCaption(){
    var $cap = $('#rs-slider .nivo-caption');
    if (!$cap.length) return;
    if (!$cap.find('.hero-card').length){
      $cap.html($('#hero-caption').html());
    }
    var $title = $cap.find('.slider-des .sl-title').first();
    if ($title.length && !$title.is('h1')) {
      $title.replaceWith($('<h1>', {
        class: $title.attr('class'),
        text: $title.text()
      }));
    }
    var $sourceTitle = $('#hero-caption .slider-des .sl-title').first();
    if ($sourceTitle.is('h1')) {
      $sourceTitle.replaceWith($('<div>', {
        class: $sourceTitle.attr('class'),
        html: $sourceTitle.html()
      }));
    }
    $cap.addClass('is-visible');
  }

  function scheduleCaptionSync(delay){
    clearTimeout(captionSyncTimer);
    captionSyncTimer = setTimeout(ensureCaption, delay == null ? 700 : delay);
  }

  function watchCaption(){
    if (captionObserver || !window.MutationObserver) return;
    var cap = document.querySelector('#rs-slider .nivo-caption');
    if (!cap) return;
    captionObserver = new MutationObserver(function () {
      scheduleCaptionSync(0);
    });
    captionObserver.observe(cap, { childList: true, subtree: true, characterData: true });
  }

  function startTick(){
    stopTick();
    tick = setInterval(function(){
      if (document.hidden) return; // don’t advance on hidden tab
      // Advance to the next slide (works even if Nivo’s internal timer stalls)
      $('#rs-slider .nivo-directionNav .nivo-nextNav').trigger('click');
    }, TICK_MS);
  }
  function stopTick(){ if (tick){ clearInterval(tick); tick = null; } }

  var heroEnhancementsBound = false;

  function attachHeroEnhancements(){
    if (heroEnhancementsBound) return true;

    var $cap = $('#rs-slider .nivo-caption');
    if (!$cap.length) return false;

    heroEnhancementsBound = true;
    watchCaption();
    scheduleCaptionSync(800);
    startTick();

    $('#rs-slider')
      .off('mouseenter.heroTicker mouseleave.heroTicker')
      .on('mouseenter.heroTicker', stopTick)
      .on('mouseleave.heroTicker', startTick);

    document.addEventListener('visibilitychange', function () {
      if (document.hidden) stopTick();
      else startTick();
    });

    return true;
  }

  (function waitForHeroSlider(){
    if (!attachHeroEnhancements()) {
      setTimeout(waitForHeroSlider, 100);
    }
  })();
});
</script>






  </body>
</html>
