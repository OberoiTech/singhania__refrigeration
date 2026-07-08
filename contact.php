<?php
session_start();
include('admin/config.php');  // DB connection

// ------------------------------------------------------
// 1) Fetch configuration (mobile, email, address, map)
// ------------------------------------------------------
$mobile  = '';
$email   = '';
$address = '';
$map     = '';

$cfgSql = "SELECT * FROM configuration LIMIT 1";
$cfgRes = mysqli_query($conn, $cfgSql);
if ($cfgRes && mysqli_num_rows($cfgRes) > 0) {
    $cfgRow  = mysqli_fetch_assoc($cfgRes);
    $mobile  = $cfgRow['mobile'] ?? '';
    $email   = $cfgRow['email'] ?? '';
    $address = $cfgRow['address'] ?? '';
    $map     = $cfgRow['map'] ?? '';
}
$mailSubject = rawurlencode('Website enquiry from Singhania Refrigeration');
$mailHref = 'mailto:' . rawurlencode($email) . '?subject=' . $mailSubject;

// ------------------------------------------------------
// 2) Handle contact form (insert into enquiry table)
// ------------------------------------------------------
error_reporting(E_ALL);
ini_set('display_errors', 1);

$alertClass = '';
$alertMsg   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = trim($_POST['name'] ?? '');
    $emailId = trim($_POST['email'] ?? '');
    $mobileNo= trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // fields removed from form – keep empty
    $company  = '';
    $location = '';

    if ($name && $emailId && $mobileNo && $message) {

        $sql = "INSERT INTO enquiry (name, email, phone, company, location, message, created_at)
                VALUES (?, ?, ?, ?, ?, ?, NOW())";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param(
                $stmt,
                "ssssss",
                $name,
                $emailId,
                $mobileNo,
                $company,
                $location,
                $message
            );

            if (mysqli_stmt_execute($stmt)) {
                $alertClass = 'alert-success';
                $alertMsg   = 'Thank you! Your enquiry has been submitted.';
            } else {
                $alertClass = 'alert-danger';
                $alertMsg   = 'Database error: ' . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            $alertClass = 'alert-danger';
            $alertMsg   = 'Query prepare failed: ' . mysqli_error($conn);
        }
    } else {
        $alertClass = 'alert-danger';
        $alertMsg   = 'Please fill in all required fields.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('head.php'); ?>

  <style>
    :root{ --brand:#0e2344; --ink:#0f2442; --muted:#667085; --line:#e6ecf5; }

    /* ===== Full-width hero (matches About) ===== */
    .contact-hero{
      position:relative; width:100%;
      padding:82px 0;
      background:
        radial-gradient(120% 160% at 8% -10%, #1a2b55 0%, rgba(26,43,85,0) 55%),
        radial-gradient(110% 140% at 95% -20%, #0f1a39 0%, rgba(15,26,57,0) 55%),
        linear-gradient(180deg, #0e1a37 0%, #0c1224 100%);
      overflow:hidden;
    }
    .contact-hero .container{ position:relative; z-index:1; }
    .titlecard{
      max-width: 860px;
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.22);
      border-radius: 8px;
      padding: 22px 22px 24px;
      color:#e8eeff; box-shadow:0 22px 60px rgba(0,0,0,.28);
      animation: fadeUp .6s ease-out both;
    }
    .eyebrow{ display:inline-block; font-size:12px; letter-spacing:.18em; text-transform:uppercase; color:#a9b7df; margin-bottom:4px; }
    .contact-hero h1{ margin:0 0 10px; font-weight:800; color:#fff; font-size:clamp(28px,4.2vw,40px); }
    .contact-hero p{ margin:0; color:#cbd6ff; }

    /* ===== Body (white) with subtle texture ===== */
    .contact-section{ position:relative; background:#fff; padding:92px 0; }
    .contact-section::before{
      content:""; position:absolute; inset:0; pointer-events:none;
      background-image:
        radial-gradient(#cfd7ee 1px, transparent 1px),
        radial-gradient(#dfe5f6 1px, transparent 1px);
      background-size:48px 48px, 64px 64px;
      background-position:0 0, 12px 18px;
      opacity:.16;
    }

    /* Info cards row */
    .info-item{
      display:flex; gap:14px; align-items:flex-start;
      padding:18px; border:1px solid var(--line); border-radius:8px; background:#fff;
      box-shadow:0 8px 24px rgba(15,25,44,.06), 0 1px 0 rgba(16,24,40,.04) inset;
      height:100%;
      transition: transform .15s ease, box-shadow .2s ease;
    }
    .info-item:hover{ transform: translateY(-2px); box-shadow:0 14px 34px rgba(15,25,44,.10), 0 1px 0 rgba(16,24,40,.04) inset; }
    .info-item .icon-part{
      width:44px;height:44px;border-radius:12px;display:grid;place-items:center;
      background:#eef2ff;color:#20335f;border:1px solid #dfe7ff;font-size:18px;
    }
    .info-item .title{ margin:0 0 4px; font-weight:800; color:var(--ink); }
    .info-item a,.info-item p{ margin:0; color:#2f426b; }

    /* Layout under hero */
    .contact-grid{ position:relative; z-index:1; }
    .left-col .block{ padding:18px 0; animation: fadeUp .6s ease-out both; }
    .left-col .block:nth-child(2){ animation-delay:.1s; }
    .left-col .block:nth-child(3){ animation-delay:.2s; }
    .left-col .block h3{ margin:0 0 8px; font-size:20px; font-weight:800; color:var(--ink); }
    .left-col .muted{ color:var(--muted); margin:0 0 6px; }

    /* Right form card (brand navy) + animation + layered shadow */
    .form-wrap{ position:sticky; top:92px; }
    .form-card{
      border-radius:8px;
      background: linear-gradient(180deg,#142b5a,#0f1d43);
      color:#eaf1ff; border:1px solid rgba(255,255,255,.14);
      box-shadow:
        0 28px 80px rgba(10,16,32,.35),
        0 10px 22px rgba(10,16,32,.18),
        inset 0 0 0 1px rgba(255,255,255,.06);
      overflow:hidden;
      transform: translateY(10px) scale(.98);
      opacity: 0;
      animation: cardIn .6s cubic-bezier(.2,.7,.2,1) .15s forwards;
    }
    .form-card:hover{ box-shadow:
        0 34px 100px rgba(10,16,32,.40),
        0 14px 26px rgba(10,16,32,.22),
        inset 0 0 0 1px rgba(255,255,255,.08);
    }
    .form-card .inner{ padding:22px; }
    .form-card .form-head{ margin-bottom:12px; }
    .form-card .form-head .sub{ color:#cdd8ff; font-size:13px; }

    .form-card input,.form-card textarea{
      width:100%; border:1px solid rgba(255,255,255,.28);
      background:rgba(255,255,255,.08); color:#fff; border-radius:6px;
      padding:12px 13px; outline:0;
      transition:border-color .2s, box-shadow .2s, background .2s, transform .06s;
    }
    .form-card textarea{ min-height:120px; resize:vertical; }
    .form-card input::placeholder,.form-card textarea::placeholder{ color:#c7d4ff; }
    .form-card input:focus,.form-card textarea:focus{
      border-color:#7ea2ff; box-shadow:0 0 0 3px rgba(126,162,255,.22); background:rgba(255,255,255,.14);
      transform: translateY(-1px);
    }

    .btn-brand{
      display:inline-flex; align-items:center; justify-content:center;
      height:46px; padding:0 18px; border-radius:6px; border:0;
      background:#1a3a7a; color:#fff; font-weight:700;
      box-shadow:0 12px 28px rgba(22,46,99,.36), inset 0 -1px 0 rgba(255,255,255,.12);
      transition:transform .1s, box-shadow .2s, background .2s;
    }
    .btn-brand:hover{ transform:translateY(-1px); background:#22468e; box-shadow:0 16px 34px rgba(22,46,99,.42), inset 0 -1px 0 rgba(255,255,255,.14); }

    /* Map */
    .g-map iframe{ width:100%; border:0; min-height:360px; }

    @media (max-width:991px){
      .form-wrap{ position:static; top:auto; }
      .contact-hero{ padding:64px 0; }
      .contact-section{ padding:72px 0; }
    }

    @media (max-width:575.98px){
      .contact-hero{ padding:48px 0; }
      .contact-section{ padding:56px 0; }
      .titlecard{ padding:22px 18px; border-radius:8px; }
    }

    /* Animations */
    @keyframes fadeUp{
      from{ opacity:0; transform: translateY(10px); }
      to  { opacity:1; transform: translateY(0); }
    }
    @keyframes cardIn{
      to { opacity:1; transform: translateY(0) scale(1); }
    }
  </style>
</head>
<body>
  <?php include('header.php'); ?>

  <!-- ===== Full-width hero band ===== -->
  <section class="contact-hero">
    <div class="container">
      <div class="titlecard">
        <span class="eyebrow">Contact</span>
        <h1>Let’s Talk</h1>
        <p>We’d love to learn about your project. Call, email, or send a message—our team will get back within 1–2 business days.</p>
      </div>
    </div>
  </section>

  <!-- ===== Main content ===== -->
  <section class="contact-section">
    <div class="container contact-grid">
      <!-- Top info cards -->
      <div class="content-info-part mb-40">
        <div class="row gutter-16">
          <div class="col-lg-4 md-mb-20">
            <div class="info-item">
              <div class="icon-part"><i class="fa fa-at"></i></div>
              <div class="content-part">
                <h4 class="title">Phone Number</h4>
                <a href="tel:+91<?php echo htmlspecialchars($mobile); ?>">+91 - <?php echo htmlspecialchars($mobile); ?></a><br>
                <a href="tel:+917303099094">+91-7303099094</a><br>
                <a href="tel:+919718097170">+91-9718097170</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 md-mb-20">
            <div class="info-item">
              <div class="icon-part"><i class="fa fa-envelope-o"></i></div>
              <div class="content-part">
                <h4 class="title">Email Address</h4>
                <a href="<?php echo htmlspecialchars($mailHref, ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($email); ?>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="info-item">
              <div class="icon-part"><i class="fa fa-map-o"></i></div>
              <div class="content-part">
                <h4 class="title">Office Address</h4>
                <p><?php echo $address; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Two columns: left copy + right sticky form -->
      <div class="row">
        <div class="col-lg-6 left-col">
          <div class="block">
            <h3>Tell us about your requirement</h3>
            <p class="muted">Share your application (cold room, CA/MA, transport, racks, etc.) and any timelines. We’ll review and respond with the best approach.</p>
          </div>
          <div class="block">
            <h3>Support hours</h3>
            <p class="muted">Mon – Sat: 09:00 AM – 06:00 PM IST</p>
          </div>
          <div class="block">
            <h3>What happens next?</h3>
            <p class="muted">Our expert gets in touch → understands your scope → suggests options → shares proposal/visit plan.</p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-wrap">
            <div class="form-card">
              <div class="inner">
                <div class="form-head">
                  <h3 class="mb-5" style="color:#fff;font-weight:800;">Get In Touch</h3>
                  <div class="sub">Fill the form and we’ll reach out shortly.</div>

                  <?php if (!empty($alertMsg)): ?>
                  <div id="form-messages" class="mb-3">
                    <div class="alert <?php echo htmlspecialchars($alertClass); ?> text-center"
                         style="padding:8px 12px;border-radius:10px;font-size:13px;">
                      <?php echo htmlspecialchars($alertMsg); ?>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>

                <form method="post" action="#">
                  <div class="mb-2">
                    <input type="text" name="name" placeholder="Full Name" required>
                  </div>
                  <div class="mb-2">
                    <input type="email" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="mb-2">
                    <input type="text" name="phone" placeholder="Phone Number" required>
                  </div>
                  <div class="mb-3">
                    <textarea name="message" placeholder="Your Message" required></textarea>
                  </div>
                  <button type="submit" class="btn-brand" name="submit">Submit Now</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Map -->
      <div class="g-map mt-60">
        <?php echo $map; ?>
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>
</body>
</html>
