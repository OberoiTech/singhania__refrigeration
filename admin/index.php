<?php
include('config.php');
session_start();

$email      = '';
$errors     = [];

if (isset($_POST['submit'])) {
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validation
    if ($email === '') {
        $errors['email'] = "Please enter your email address.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }

    if ($password === '') {
        $errors['password'] = "Please enter your password.";
    }

    if (empty($errors)) {
        if ($stmt = $conn->prepare("SELECT id, email, password FROM admin WHERE email = ? LIMIT 1")) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $dbPassword = $row['password'];

                $isValid = false;
                if (password_verify($password, $dbPassword)) {
                    $isValid = true;
                } elseif ($password === $dbPassword) { // fallback if old DB has plain text
                    $isValid = true;
                }

                if ($isValid) {
                    $_SESSION['admin_id']    = $row['id'];
                    $_SESSION['admin_email'] = $row['email'];
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $errors['login'] = "Invalid email or password.";
                }
            } else {
                $errors['login'] = "Invalid email or password.";
            }

            $stmt->close();
        } else {
            $errors['login'] = "Something went wrong. Please try again later.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Singhania Refrigeration – Admin Login</title>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      :root {
        --sr-bg-1: #0f172a;
        --sr-bg-2: #1d4ed8;
        --sr-accent: #38bdf8;
        --sr-card-bg: rgba(15, 23, 42, 0.9);
        --sr-border-soft: rgba(148, 163, 184, 0.4);
        --sr-text-main: #e5e7eb;
        --sr-text-soft: #9ca3af;
        --sr-error: #fca5a5;
      }
      *{box-sizing:border-box;}
      body{
        margin:0;
        font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
        min-height:100vh;
        background:radial-gradient(circle at top left,#1d4ed8 0,#0f172a 45%,#020617 100%);
        display:flex;
        align-items:center;
        justify-content:center;
        color:var(--sr-text-main);
      }
      .sr-auth-wrapper{
        width:100%;
        max-width:980px;
        display:grid;
        grid-template-columns:minmax(0,1.1fr) minmax(0,1fr);
        border-radius:24px;
        border:1px solid rgba(148,163,184,0.3);
        background:linear-gradient(135deg,rgba(15,23,42,0.92),rgba(15,23,42,0.98));
        box-shadow:0 24px 60px rgba(15,23,42,0.75),0 0 0 1px rgba(15,23,42,0.9);
        overflow:hidden;
      }
      @media(max-width:768px){
        .sr-auth-wrapper{grid-template-columns:1fr;max-width:480px;}
        .sr-auth-side{display:none;}
      }
      .sr-auth-side{
        position:relative;
        padding:40px 36px;
        background:radial-gradient(circle at top,rgba(56,189,248,0.15) 0,rgba(30,64,175,0.9) 45%,#020617 100%);
        border-right:1px solid rgba(148,163,184,0.4);
        display:flex;
        flex-direction:column;
        justify-content:space-between;
      }
      .sr-brand-badge{
        display:inline-flex;
        align-items:center;
        gap:10px;
        padding:6px 14px;
        border-radius:999px;
        background:rgba(15,23,42,0.75);
        border:1px solid rgba(148,163,184,0.5);
        font-size:11px;
        letter-spacing:0.1em;
        text-transform:uppercase;
        color:var(--sr-text-soft);
      }
      .sr-brand-dot{
        width:8px;height:8px;border-radius:999px;
        background:#22c55e;
        box-shadow:0 0 0 6px rgba(34,197,94,0.25);
      }
      .sr-brand-title{margin-top:28px;}
      .sr-brand-title h1{
        margin:0 0 8px;
        font-size:26px;
        letter-spacing:0.06em;
        text-transform:uppercase;
        color:#e5e7eb;
      }
      .sr-brand-title h1 span{color:var(--sr-accent);}
      .sr-brand-title p{
        margin:0;
        font-size:14px;
        color:var(--sr-text-soft);
      }
      .sr-brand-list{
        margin-top:28px;
        font-size:13px;
        color:rgba(226,232,240,0.95);
      }
      .sr-brand-list ul{
        list-style:none;
        padding:0;
        margin:12px 0 0;
      }
      .sr-brand-list li{
        display:flex;
        align-items:center;
        gap:8px;
        margin-bottom:8px;
        font-size:12px;
        color:rgba(226,232,240,0.9);
      }
      .sr-brand-list li i{
        font-size:11px;
        color:var(--sr-accent);
      }
      .sr-brand-footer{
        margin-top:32px;
        font-size:11px;
        color:rgba(148,163,184,0.9);
      }
      .sr-brand-footer span{color:var(--sr-accent);}

      .sr-auth-main{
        padding:40px 32px;
        display:flex;
        align-items:center;
        justify-content:center;
        background:radial-gradient(circle at bottom right,rgba(56,189,248,0.15),transparent 55%);
      }
      .login-box{
        width:100%;
        max-width:360px;
        background:linear-gradient(145deg,rgba(15,23,42,0.95),rgba(15,23,42,0.98));
        border-radius:20px;
        padding:26px 26px 22px;
        border:1px solid var(--sr-border-soft);
        box-shadow:0 18px 50px rgba(15,23,42,0.9),0 0 0 1px rgba(15,23,42,0.9);
        position:relative;
      }
      .login-box::before{
        content:"";
        position:absolute;
        inset:-1px;
        border-radius:20px;
        background:conic-gradient(from 210deg,rgba(59,130,246,0.85),rgba(56,189,248,0.75),rgba(59,130,246,0.75),transparent 60%);
        opacity:0.4;
        filter:blur(24px);
        z-index:-1;
      }
      .login-head{
        margin:0 0 4px;
        font-size:20px;
        display:flex;
        align-items:center;
        gap:10px;
        color:#e5e7eb;
      }
      .login-subtitle{
        font-size:12px;
        color:var(--sr-text-soft);
        margin-bottom:18px;
      }
      .login-head i{color:var(--sr-accent);}
      .form-group{margin-bottom:14px;}
      .control-label{
        display:flex;
        justify-content:space-between;
        align-items:center;
        font-size:11px;
        letter-spacing:0.08em;
        text-transform:uppercase;
        margin-bottom:4px;
        color:var(--sr-text-soft);
      }
      .control-label span.helper{
        font-size:10px;
        color:rgba(148,163,184,0.9);
      }
      .form-control{
        width:100%;
        padding:9px 11px;
        border-radius:10px;
        border:1px solid rgba(51,65,85,0.9);
        background:radial-gradient(circle at top,#020617,#020617);
        color:var(--sr-text-main);
        font-size:13px;
        outline:none;
        transition:border-color .15s,box-shadow .15s,background .15s,transform .05s;
      }
      .form-control::placeholder{color:rgba(148,163,184,0.9);}
      .form-control:focus{
        border-color:var(--sr-accent);
        box-shadow:0 0 0 1px rgba(56,189,248,0.6),0 0 0 8px rgba(15,23,42,1);
        background:radial-gradient(circle at top,#020617,#020617);
        transform:translateY(-0.5px);
      }
      .form-control.is-invalid{border-color:#f97373;}
      .sr-error-text{
        margin-top:3px;
        font-size:11px;
        color:var(--sr-error);
      }
      .sr-alert{
        padding:8px 10px;
        border-radius:9px;
        margin-bottom:12px;
        font-size:12px;
        border:1px solid rgba(248,113,113,0.7);
        background:rgba(127,29,29,0.75);
        color:#fee2e2;
        display:flex;
        align-items:flex-start;
        gap:8px;
      }
      .sr-alert i{margin-top:2px;}
      .sr-utility-row{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-top:4px;
        margin-bottom:12px;
        font-size:11px;
        color:var(--sr-text-soft);
      }
      .sr-checkbox{
        display:inline-flex;
        align-items:center;
        gap:6px;
        cursor:pointer;
        user-select:none;
      }
      .sr-checkbox input[type="checkbox"]{
        width:14px;height:14px;
        accent-color:#38bdf8;
        cursor:pointer;
      }
      .sr-link{
        color:var(--sr-accent);
        text-decoration:none;
        font-weight:500;
      }
      .sr-link:hover{text-decoration:underline;}
      .btn-container{margin-top:10px;}
      .btn-primary{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:8px;
        width:100%;
        border-radius:999px;
        padding:9px 12px;
        border:none;
        font-size:13px;
        font-weight:600;
        letter-spacing:0.08em;
        text-transform:uppercase;
        background:linear-gradient(135deg,#2563eb,#38bdf8);
        color:#fff;
        cursor:pointer;
        box-shadow:0 14px 34px rgba(37,99,235,0.55);
        transition:transform .12s,box-shadow .12s,filter .12s;
      }
      .btn-primary:hover{
        transform:translateY(-1px);
        box-shadow:0 18px 40px rgba(37,99,235,0.7);
        filter:brightness(1.05);
      }
      .btn-primary:active{
        transform:translateY(0);
        box-shadow:0 6px 18px rgba(15,23,42,0.9);
      }
      .btn-primary i{font-size:14px;}
      .sr-footer-note{
        margin-top:16px;
        font-size:11px;
        text-align:center;
        color:rgba(148,163,184,0.9);
      }
      .forget-form{display:none;}
      .login-box.flipped .login-form{display:none;}
      .login-box.flipped .forget-form{display:block;}
    </style>
  </head>
  <body>

    <div class="sr-auth-wrapper">
      <!-- LEFT: Website Admin Info -->
      <div class="sr-auth-side">
        <div>
          <div class="sr-brand-badge">
            <span class="sr-brand-dot"></span>
            <span>Singhania Admin Console</span>
          </div>

          <div class="sr-brand-title">
            <h1><span>Singhania</span> Refrigeration</h1>
            <p>
              Central backend to manage your websites – pages, banners, products,
              SEO content and enquiry forms for all Singhania properties.
            </p>
          </div>

          <div class="sr-brand-list">
            <strong>From this panel you can:</strong>
            <ul>
              <li><i class="fa fa-check-circle"></i> Update homepage, inner pages & content blocks</li>
              <li><i class="fa fa-check-circle"></i> Manage sliders, promotions & service highlights</li>
              <li><i class="fa fa-check-circle"></i> Review enquiries and website leads</li>
            </ul>
          </div>
        </div>

        <div class="sr-brand-footer">
          Secure access for <span>Website Admins only</span>. Changes are logged for audit and rollback.
        </div>
      </div>

      <!-- RIGHT: Login Form -->
      <div class="sr-auth-main">
        <div class="login-box">
          <form class="login-form" action="" method="post" autocomplete="off">
            <h3 class="login-head">
              <i class="fa fa-lg fa-fw fa-user-circle"></i>
              Website Admin Login
            </h3>
            <div class="login-subtitle">
              Sign in to manage Singhania Refrigeration website content & settings.
            </div>

            <?php if (!empty($errors['login'])): ?>
              <div class="sr-alert">
                <i class="fa fa-exclamation-triangle"></i>
                <div><?php echo htmlspecialchars($errors['login']); ?></div>
              </div>
            <?php endif; ?>

            <div class="form-group">
              <label class="control-label">
                <span>EMAIL</span>
                <span class="helper">Use your admin email</span>
              </label>
              <input
                class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
                type="text"
                name="email"
                placeholder="you@example.com"
                value="<?php echo htmlspecialchars($email); ?>"
              >
              <?php if (isset($errors['email'])): ?>
                <div class="sr-error-text"><?php echo htmlspecialchars($errors['email']); ?></div>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label class="control-label">
                <span>PASSWORD</span>
                <span class="helper">Do not share with anyone</span>
              </label>
              <input
                class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>"
                type="password"
                name="password"
                placeholder="••••••••"
              >
              <?php if (isset($errors['password'])): ?>
                <div class="sr-error-text"><?php echo htmlspecialchars($errors['password']); ?></div>
              <?php endif; ?>
            </div>

            <div class="sr-utility-row">
              <label class="sr-checkbox">
                <input type="checkbox" name="remember_me">
                <span>Stay signed in on this device</span>
              </label>
              <a href="#" class="sr-link" data-toggle="flip">Forgot password?</a>
            </div>

            <div class="form-group btn-container">
              <button class="btn btn-primary" name="submit" type="submit">
                <i class="fa fa-sign-in fa-lg fa-fw"></i>
                <span>Sign In</span>
              </button>
            </div>

            <div class="sr-footer-note">
              Need access or facing issues? Contact the Singhania web admin team.
            </div>
          </form>

          <!-- Forgot Password (UI only for now) -->
          <form class="forget-form" action="#" method="post" autocomplete="off">
            <h3 class="login-head">
              <i class="fa fa-lg fa-fw fa-lock"></i>
              Reset Password
            </h3>
            <div class="login-subtitle">Enter your admin email to receive reset instructions.</div>

            <div class="form-group">
              <label class="control-label">EMAIL</label>
              <input class="form-control" type="email" name="forgot_email" placeholder="you@example.com">
            </div>

            <div class="form-group btn-container">
              <button class="btn btn-primary" type="submit" name="forgot_submit">
                <i class="fa fa-unlock fa-lg fa-fw"></i>
                <span>Send Reset Link</span>
              </button>
            </div>

            <div class="form-group mt-3" style="margin-top: 12px; font-size: 11px;">
              <p style="margin:0;text-align:center;">
                <a href="#" class="sr-link" data-toggle="flip">
                  <i class="fa fa-angle-left fa-fw"></i> Back to login
                </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
      $('.sr-auth-main').on('click','[data-toggle="flip"]',function(e){
        e.preventDefault();
        $('.login-box').toggleClass('flipped');
      });
    </script>
  </body>
</html>
