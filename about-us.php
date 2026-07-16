<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
</head>
<body>
<?php include('header.php'); ?>

<!-- ============== PAGE SCOPED STYLES ============== -->
<style>
  :root{
    --ink:#0f2442; --muted:#667085; --soft:#f6f8ff; --card:#ffffff;
    --line:#e7ecf5; --brand:#0e2344;
  }
  .section-pad{ padding: 92px 0; }
  .section-soft{ background: linear-gradient(180deg, #fafbff 0%, #f3f6ff 100%); }
  .main-content{ max-width:100%; overflow-x:clip; }
  .g-30>[class*="col-"]{ margin-bottom:30px; }
  .g-40>[class*="col-"]{ margin-bottom:40px; }

  .h2{ font-size: clamp(26px, 3.4vw, 36px); line-height:1.5; color: var(--ink); font-weight:800; }
  .lead{ font-size: clamp(15px, 1.7vw, 17px); color:#2c3e68; text-align: justify; }
  .eyebrow{ display:inline-block; font-size:12px; letter-spacing:.18em; text-transform:uppercase; color:#9aa6c3; }

  /* Hero */
  .about-hero{
    position:relative;
    min-height:560px;
    display:flex;
    align-items:center;
    overflow:hidden;
    background:
      linear-gradient(90deg, rgba(6,18,38,.92) 0%, rgba(8,34,67,.78) 48%, rgba(8,34,67,.34) 100%),
      url('assets/images/3.jpg') center/cover no-repeat;
  }
  .about-hero::before{
    content:""; position:absolute; inset:0;
    background:linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,0) 42%);
    pointer-events:none;
  }
  .about-hero::after{
    content:""; position:absolute; left:0; right:0; bottom:0; height:90px;
    /* back ground:linear-gradient(180deg, rgba(255,255,255,0), #ffffff); */
    pointer-events:none;
  }
  .about-hero__bg{
    display:none;
  }
  .about-hero__card{
    position:relative;
    z-index:1;
    max-width:900px;
    padding:110px 0 130px;
    color:#eaf0ff;
  }
  .about-hero__card .eyebrow{
    display:inline-flex;
    align-items:center;
    gap:8px;
    color:#dbe6ff;
    background:rgba(255,255,255,.10);
    border:1px solid rgba(255,255,255,.16);
    border-radius:999px;
    padding:7px 11px;
    margin-bottom:12px;
  }
  .about-hero__card h1{
    font-size:clamp(32px,4.8vw,56px);
    line-height:1.05;
    margin:0 0 16px;
    color:#fff;
    font-weight:900;
    max-width:820px;
  }
  .about-hero__card .brand{ color:#ffffff; }
  .about-hero__card p{
    color:#e6ecff;
    margin:0;
    font-size:17px;
    line-height:1.78;
    max-width:820px;
  }
  .hero-cta-actions{ display:flex; flex-wrap:wrap; gap:12px; margin-top:28px; }
  .hero-cta-btn{ display:inline-flex; align-items:center; justify-content:center; min-height:56px; padding:0 20px; border:1px solid rgba(255,255,255,.48); border-radius:8px; background:rgba(255,255,255,.08); color:#fff !important; font-size:15px; font-weight:800; text-decoration:none; transition:background .2s ease,color .2s ease,transform .2s ease; }
  .hero-cta-btn:hover{ background:#fff; color:#0e2344 !important; transform:translateY(-2px); }

  /* Images & cards */
  .about-img{ width:100%; height:auto; border-radius:8px; box-shadow:0 20px 48px rgba(0,0,0,.12); }
  .img-soft{ transition: transform .4s ease, box-shadow .4s ease; }
  .img-soft:hover{ transform: translateY(-3px); box-shadow:0 28px 60px rgba(0,0,0,.18); }

  /* Who we are */
  .legacy-section{ padding:76px 0 88px; background:#fff; }
  .legacy-row{ margin-left:-24px; margin-right:-24px; }
  .legacy-row>[class*="col-"]{ padding-left:24px; padding-right:24px; }
  .legacy-media{ position:relative; padding:0 22px 26px 0; }
  .legacy-image{ display:block; width:100%; height:500px; object-fit:cover; object-position:center; border-radius:16px; box-shadow:0 18px 45px rgba(15,36,66,.12); }
  .legacy-stat{ position:absolute; right:0; bottom:0; width:220px; min-height:136px; padding:24px 22px 18px; border-radius:18px; background:#fff; box-shadow:0 14px 36px rgba(15,36,66,.16); }
  .legacy-stat strong{ display:block; color:#07557e; font-size:38px; line-height:1; font-weight:900; }
  .legacy-stat span{ display:block; max-width:145px; margin-top:8px; color:#52627a; font-size:13px; line-height:1.45; font-weight:600; }
  .legacy-stat::after{ content:""; display:block; width:48px; height:4px; margin-top:13px; border-radius:99px; background:#18a9e0; }
  .legacy-copy{ padding:2px 0 0 28px; }
  .legacy-kicker{ display:inline-flex; align-items:center; gap:8px; margin-bottom:26px; padding:6px 14px; border-radius:999px; background:#e5f5fd; color:#07557e; font-size:12px; line-height:1; letter-spacing:.1em; text-transform:uppercase; font-weight:700; }
  .legacy-kicker::before{ content:""; width:6px; height:6px; border-radius:50%; background:#15a5df; }
  .legacy-title{ margin:0 0 24px; color:#0f2442; font-size:clamp(34px,3.5vw,46px); line-height:1.14; font-weight:900; letter-spacing:-.02em; }
  /* .legacy-title span{ color:#07557e; } */
  .legacy-copy p{ margin:0 0 16px; color:#364760; font-size:15.5px; line-height:1.62; }
  .legacy-copy p strong{ color:#0f2442; font-weight:800; }
  .legacy-link{ display:inline-flex; align-items:center; gap:10px; margin-top:12px; color:#07557e; font-size:15px; font-weight:800; text-decoration:none; transition:color .2s ease,gap .2s ease; }
  .legacy-link:hover{ color:#0b8ec3; gap:14px; }
  .legacy-link span{ font-size:21px; line-height:1; }

  /* Company metrics */
  .metrics-strip{ background:linear-gradient(110deg,var(--brand) 0%,#173a68 52%,var(--ink) 100%); color:#fff; }
  .metrics-grid{ display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); }
  .metric-item{ min-height:225px; display:flex; flex-direction:column; align-items:center; justify-content:center; padding:30px 18px 26px; text-align:center; border-left:1px solid rgba(255,255,255,.13); }
  .metric-item:last-child{ border-right:1px solid rgba(255,255,255,.13); }
  .metric-icon{ width:48px; height:48px; display:grid; place-items:center; margin-bottom:20px; border-radius:12px; background:rgba(255,255,255,.11); color:#8fc8ff; font-size:23px; }
  .metric-value{ min-height:43px; margin:0; color:#fff; font-size:36px; line-height:1.05; font-weight:900; letter-spacing:-.02em; }
  .metric-title{ margin-top:6px; color:#fff; font-size:13px; line-height:1.35; font-weight:800; }
  .metric-note{ margin-top:7px; color:#b9cce7; font-size:12px; line-height:1.4; }

  /* Why choose us */
  .why-section{ padding:82px 0 90px; background:#f4f8fb; }
  .why-head{ max-width:820px; margin:0 auto 62px; text-align:center; }
  .why-title{ margin:0; color:var(--ink); font-size:clamp(34px,3.5vw,46px); line-height:1.14; font-weight:900; letter-spacing:-.02em; }

  .why-intro{ max-width:760px; margin:22px auto 0; color:#40516b; font-size:15.5px; line-height:1.6; }
  .why-grid{ display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:30px; }
  .why-card{ min-height:258px; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:0; padding:34px 30px; border:1px solid #dce2e8; border-radius:10px; background:#fff; text-align:center; box-shadow:0 5px 16px rgba(15,36,66,.04); transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease; }
  .why-card:hover{ transform:translateY(-4px); border-color:#cbd5df; background:#fff; box-shadow:0 14px 30px rgba(15,36,66,.1); }
  .why-card--featured{ background:#fff; border-color:#dce2e8; }
  .why-icon{ flex:0 0 auto; width:auto; height:auto; display:block; margin-bottom:27px; border-radius:0; background:transparent; color:var(--brand); font-size:37px; line-height:1; transition:transform .25s ease; }
  .why-card:hover .why-icon,.why-card--featured .why-icon{ color:var(--brand); background:transparent; }
  .why-card:hover .why-icon{ transform:scale(1.06); }
  .why-card h3{ margin:0 0 12px; color:var(--ink); font-size:18px; line-height:1.35; font-weight:900; }
  .why-card p{ max-width:310px; margin:0 auto; color:#5f6168; font-size:15px; line-height:1.72; }

  /* Vision showcase */
  .vision-section{ padding:82px 0 92px; background:#fff; }
  .vision-head{ max-width:820px; margin:0 auto 62px; text-align:center; }
  .vision-title{ margin:0; color:var(--ink); font-size:clamp(34px,3.5vw,46px); line-height:1.14; font-weight:900; letter-spacing:-.02em; }
  /* .vision-title span{ color:var(--ink); } */
  .vision-intro{ max-width:760px; margin:22px auto 0; color:#40516b; font-size:15.5px; line-height:1.6; }
  .vision-grid{ display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:48px; align-items:stretch; }
  .vision-panel{ position:relative; min-height:430px; padding:40px; border-radius:24px; overflow:hidden; transition:transform .3s ease,box-shadow .3s ease,border-color .3s ease; }
  .vision-panel::after{ content:""; position:absolute; left:40px; right:40px; top:0; height:4px; border-radius:0 0 99px 99px; transform:scaleX(0); transform-origin:center; transition:transform .3s ease; }
  .vision-panel--light{ border:1px solid var(--line); background:linear-gradient(145deg,#fff 0%,var(--soft) 100%); color:var(--ink); }
  .vision-panel--dark{ border:1px solid rgba(255,255,255,.08); background:linear-gradient(145deg,#1c2f57 0%,#2a427f 100%); color:#fff; box-shadow:0 18px 38px rgba(28,47,87,.18); }
  .vision-panel--light::after{ background:linear-gradient(90deg,#3b5bb7,#2a427f); }
  .vision-panel--dark::after{ background:linear-gradient(90deg,#aebdf0,#fff); }
  .vision-panel:hover{ transform:translateY(-8px); }
  .vision-panel--light:hover{ border-color:#c7d1ed; box-shadow:0 20px 42px rgba(42,66,127,.14); }
  .vision-panel--dark:hover{ border-color:rgba(255,255,255,.2); box-shadow:0 24px 48px rgba(28,47,87,.28); }
  .vision-panel:hover::after{ transform:scaleX(1); }
  .vision-panel-head{ display:flex; align-items:center; gap:14px; margin-bottom:28px; }
  .vision-panel-icon{ flex:0 0 49px; width:49px; height:49px; display:grid; place-items:center; border-radius:12px; font-size:22px; transition:transform .3s ease,box-shadow .3s ease; }
  .vision-panel--light .vision-panel-icon{ color:#fff; background:linear-gradient(135deg,#3b5bb7,#2a427f); box-shadow:0 9px 20px rgba(42,66,127,.2); }
  .vision-panel--dark .vision-panel-icon{ color:#fff; background:rgba(255,255,255,.13); }
  .vision-panel:hover .vision-panel-icon{ transform:translateY(-3px) scale(1.07); }
  .vision-panel--light:hover .vision-panel-icon{ box-shadow:0 13px 25px rgba(42,66,127,.28); }
  .vision-panel h3{ margin:0; font-size:20px; line-height:1.25; font-weight:900; }
  .vision-panel-kicker{ display:block; margin-top:4px; font-size:12px; line-height:1.4; }
  .vision-panel--light .vision-panel-kicker{ color:#64758c; }
  .vision-panel--dark .vision-panel-kicker{ color:#c8d3f2; }
  .vision-panel-copy{ margin:0 0 28px; font-size:14px; line-height:1.7; }
  .vision-panel--dark .vision-panel-copy{ color:#eef1fb; }
  .vision-list{ list-style:none; padding:0; margin:0; display:grid; gap:16px; }
  .vision-list li{ position:relative; min-height:34px; display:flex; align-items:flex-start; font-size:13.5px; line-height:1.6; transition:transform .22s ease; }
  .vision-panel:hover .vision-list li:hover{ transform:translateX(5px); }
  .vision-panel--light .vision-list li{ padding-left:45px; color:#40516b; }
  .vision-panel--light .vision-list li::before{ content:"\f00c"; position:absolute; left:0; top:0; width:34px; height:34px; display:grid; place-items:center; border:1px solid var(--line); border-radius:9px; background:#fff; color:#2a427f; font-family:FontAwesome; font-size:13px; box-shadow:0 3px 8px rgba(15,36,66,.06); }
  .vision-panel--dark .vision-list li{ padding-left:36px; color:#f2f8fc; }
  .vision-panel--dark .vision-list li::before{ content:""; position:absolute; left:0; top:2px; width:24px; height:24px; border:8px solid rgba(255,255,255,.14); border-radius:50%;  }
  .vision-goal{ margin:26px 0 0; padding-top:20px; border-top:1px solid rgba(255,255,255,.16); color:#cce5f3; font-size:13px; line-height:1.6; }

  /* Measurable outcomes */
  .outcomes-section{ padding:86px 0; color:#fff; background:#f4f8fb; }
  .outcomes-layout{ display:grid; grid-template-columns:minmax(0,1.02fr) minmax(0,1fr); gap:70px; align-items:center; }
  /* .outcomes-badge{ display:inline-flex; align-items:center; gap:8px; margin-bottom:26px; padding:7px 13px; border-radius:999px; background:rgba(255,255,255,.11); color:#eef1fb; font-size:11px; line-height:1; letter-spacing:.08em; text-transform:uppercase; font-weight:800; } */
  /* .outcomes-badge::before{ content:""; width:6px; height:6px; border-radius:50%; background:#aebdf0; } */
  .outcomes-title{ max-width:540px; margin:0; color: #0f2442;; font-size:clamp(34px,3.6vw,48px); line-height:1.13; font-weight:900; letter-spacing:-.02em; }
  .outcomes-title span{ color: #0f2442;; }
  .outcomes-copy{ max-width:620px; margin:24px 0 0; color:#0f2442; font-size:15px; line-height:1.7; }
  .outcomes-points{ display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:17px 28px; margin-top:30px; }
  .outcomes-point{ position:relative; padding-left:29px; color:#0f2442; font-size:13.5px; line-height:1.5; font-weight:700; }
  .outcomes-point::before{ content:"\f00c"; position:absolute; left:0; top:0; width:19px; height:19px; display:grid; place-items:center; border:2px solid #aebdf0; border-radius:50%; color:#aebdf0; font-family:FontAwesome; font-size:9px; }
  .outcomes-cards{ display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:18px; }
  .outcome-card{ min-height:205px; padding:25px; border:1px solid rgba(255,255,255,.16); border-radius:14px; background:#0f2442; box-shadow:0 10px 24px rgba(8,20,43,.1); transition:transform .28s ease,background .28s ease,border-color .28s ease,box-shadow .28s ease; }
  .outcome-card:hover{ transform:translateY(-6px); border-color:rgba(255,255,255,.3); background:#0f2442; box-shadow:0 18px 34px rgba(8,20,43,.22); }
  .outcome-icon{ width:42px; height:42px; display:grid; place-items:center; margin-bottom:20px; border-radius:10px; background:rgba(174,189,240,.18); color:#cbd5f7; font-size:18px; transition:transform .28s ease,background .28s ease; }
  .outcome-card:hover .outcome-icon{ transform:scale(1.08); background:rgba(174,189,240,.28); }
  .outcome-card h3{ margin:0 0 10px; color:#fff; font-size:15px; line-height:1.4; font-weight:900; }
  .outcome-card p{ margin:0; color:#cbd4ec; font-size:12.5px; line-height:1.65; }

  /* Sustainable future */
  .sustain-section{ padding:86px 0 94px; background:#fff; }
  .sustain-layout{ display:grid; grid-template-columns:minmax(0,1fr) minmax(0,1fr); gap:72px; align-items:center; }
  /* .sustain-badge{ display:inline-flex; align-items:center; gap:8px; margin-bottom:26px; padding:7px 13px; border-radius:999px; background:#eef1fb; color:#2a427f; font-size:11px; line-height:1; letter-spacing:.08em; text-transform:uppercase; font-weight:800; }
  .sustain-badge::before{ content:"\f06c"; font-family:FontAwesome; font-size:12px; } */
  .sustain-title{ margin:0; color:var(--ink); font-size:clamp(34px,3.5vw,46px); line-height:1.14; font-weight:900; letter-spacing:-.02em; }
  /* .sustain-title span{ color:#2a427f; } */
  .sustain-copy{ margin-top:22px; }
  .sustain-copy p{ margin:0 0 18px; color:#40516b; font-size:15px; line-height:1.7; }
  .sustain-copy strong{ color:var(--ink); font-weight:900; }
  .sustain-features{ display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:18px 28px; margin-top:28px; }
  .sustain-feature{ display:flex; align-items:flex-start; gap:12px; }
  .sustain-feature-icon{ flex:0 0 38px; width:38px; height:38px; display:grid; place-items:center; border-radius:10px; background:#eef1fb; color:#2a427f; font-size:16px; transition:transform .25s ease,background .25s ease,color .25s ease; }
  .sustain-feature:hover .sustain-feature-icon{ transform:translateY(-3px); color:#fff; background:#0f2442 }
  .sustain-feature h3{ margin:1px 0 3px; color:var(--ink); font-size:14px; line-height:1.35; font-weight:700; }
  .sustain-feature p{ margin:0; color:#667085; font-size:12px; line-height:1.45; }
  .sustain-quote{ margin:30px 0 0; padding:17px 20px; border:1px solid #d8dff1; border-radius:12px; background:#0f2442; color:#FFF; font-size:13px; line-height:1.55; font-style:italic; font-weight:800; }
  .sustain-media{ position:relative; padding:0 0 22px 22px; }
  .sustain-image{ display:block; width:100%; height:520px; object-fit:cover; object-position:center; border-radius:20px; box-shadow:0 20px 46px rgba(15,36,66,.14); transition:transform .35s ease,box-shadow .35s ease; }
  .sustain-media:hover .sustain-image{ transform:translateY(-5px); box-shadow:0 28px 56px rgba(15,36,66,.2); }
  .sustain-float{ position:absolute; left:0; bottom:0; min-width:250px; display:flex; align-items:center; gap:13px; padding:18px 20px; border:1px solid var(--line); border-radius:15px; background:#fff; box-shadow:0 15px 34px rgba(15,36,66,.16); }
  .sustain-float-icon{ flex:0 0 46px; width:46px; height:46px; display:grid; place-items:center; border-radius:12px; color:#fff; background: #0f240f;; font-size:20px; }
  .sustain-float strong{ display:block; color:var(--ink); font-size:14px; line-height:1.35; }
  .sustain-float span{ display:block; margin-top:3px; color:#667085; font-size:12px; line-height:1.4; }

  @media (prefers-reduced-motion:reduce){
    .vision-panel,.vision-panel::after,.vision-panel-icon,.vision-list li,.outcome-card,.outcome-icon,.sustain-image,.sustain-feature-icon{ transition:none !important; }
    .vision-panel:hover,.vision-panel:hover .vision-panel-icon,.vision-panel:hover .vision-list li:hover,.outcome-card:hover,.outcome-card:hover .outcome-icon,.sustain-media:hover .sustain-image,.sustain-feature:hover .sustain-feature-icon{ transform:none !important; }
  }

  .card-lite{
    height:100%; border-radius:8px; background: var(--card); border:1px solid var(--line);
    padding: clamp(18px, 3.2vw, 26px); box-shadow: 0 12px 30px rgba(16, 28, 52, .06);
  }

  /* Checklist */
  .checklist{ list-style:none; padding:0; margin:0; display:grid; gap:10px; }
  .checklist li{ position:relative; padding-left:28px; color:#2d3c63; }
  .checklist li::before{
    content:""; position:absolute; left:0; top:5px; width:18px; height:18px; border-radius:50%;
    background: conic-gradient(from 180deg, #3b5bb7, #2a427f); box-shadow: inset 0 0 0 3px #fff;
  }

  .about-cta{
    display:inline-block;
    padding:12px 20px;
    border-radius:6px;
    background:#1c2f57;
    color:#fff !important;
  }

  @media (max-width: 991px){
    .section-pad{ padding: 64px 0; }
    .about-hero{ min-height:auto; }
    .about-hero__card{ padding:92px 0 110px; }
    .about-img{ display:block; max-width:680px; margin:0 auto; }
    .g-30>[class*="col-"]:last-child,
    .g-40>[class*="col-"]:last-child{ margin-bottom:0; }
    .legacy-section{ padding:64px 0 72px; }
    .legacy-media{ max-width:680px; margin:0 auto 48px; }
    .legacy-copy{ padding-left:0; }
    .legacy-title{ max-width:720px; }
    .metrics-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); }
    .metric-item{ border-bottom:1px solid rgba(255,255,255,.13); }
    .metric-item:nth-child(odd){ border-left:1px solid rgba(255,255,255,.13); }
    .why-section{ padding:68px 0 76px; }
    .why-head{ margin-bottom:46px; }
    .why-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); gap:24px; }
    .vision-section{ padding:68px 0 76px; }
    .vision-head{ margin-bottom:46px; }
    .vision-grid{ grid-template-columns:1fr; gap:28px; }
    .vision-panel{ min-height:0; }
    .outcomes-section{ padding:72px 0; }
    .outcomes-layout{ grid-template-columns:1fr; gap:48px; }
    .sustain-section{ padding:72px 0 80px; }
    .sustain-layout{ grid-template-columns:1fr; gap:48px; }
    .sustain-media{ max-width:720px; margin:0 auto; }
  }

  @media (max-width: 767px){
    .section-pad{ padding:48px 0; }
    .about-hero__card{ padding:76px 0 92px; }
    .about-hero__card h1{ font-size:clamp(28px, 8vw, 36px); line-height:1.18; }
    .about-hero__card p,
    .lead{ font-size:15px; line-height:1.7; text-align:left; }
    .h2{ font-size:24px; line-height:1.3; overflow-wrap:anywhere; }
    .card-lite{ height:auto; padding:22px 18px; border-radius:8px; }
    .g-30>[class*="col-"],
    .g-40>[class*="col-"]{ margin-bottom:24px; }
    .g-30>[class*="col-"]:last-child,
    .g-40>[class*="col-"]:last-child{ margin-bottom:0; }
    .checklist{ gap:12px; }
    .checklist li{ padding-left:27px; font-size:15px; line-height:1.55; }
    .about-img{ border-radius:8px; }
    .legacy-section{ padding:52px 0 58px; }
    .legacy-row{ margin-left:-15px; margin-right:-15px; }
    .legacy-row>[class*="col-"]{ padding-left:15px; padding-right:15px; }
    .legacy-media{ padding:0; margin-bottom:34px; }
    .legacy-image{ height:370px; border-radius:14px; }
    .legacy-stat{ position:relative; right:auto; bottom:auto; width:205px; min-height:0; margin:-70px 16px 0 auto; padding:20px; }
    .legacy-stat strong{ font-size:34px; }
    .legacy-kicker{ margin-bottom:18px; }
    .legacy-title{ margin-bottom:20px; font-size:32px; }
    .legacy-copy p{ font-size:15px; line-height:1.7; }
    .metric-item{ min-height:205px; }
    .why-section{ padding:54px 0 60px; }
    .why-head{ margin-bottom:34px; }
    .why-title{ font-size:32px; }
    .why-intro{ margin-top:17px; font-size:15px; }
    .why-grid{ grid-template-columns:1fr; gap:18px; }
    .why-card{ min-height:235px; padding:30px 24px; }
    .vision-section{ padding:54px 0 60px; }
    .vision-head{ margin-bottom:34px; }
    .vision-title{ font-size:32px; }
    .vision-intro{ margin-top:17px; font-size:15px; }
    .vision-panel{ padding:30px 24px; border-radius:18px; }
    .outcomes-section{ padding:58px 0; }
    .outcomes-layout{ gap:38px; }
    .outcomes-title{ font-size:32px; }
    .outcomes-copy{ margin-top:18px; }
    .outcomes-cards{ grid-template-columns:1fr; }
    .outcome-card{ min-height:0; }
    .sustain-section{ padding:58px 0 66px; }
    .sustain-layout{ gap:38px; }
    .sustain-title{ font-size:32px; }
    .sustain-image{ height:410px; border-radius:16px; }
  }

  @media (max-width: 420px){
    .about-hero__card{ padding:64px 0 78px; }
    .section-pad{ padding:42px 0; }
    .about-cta{ width:100%; text-align:center; }
    .legacy-image{ height:320px; }
    .legacy-title{ font-size:29px; }
    .metrics-grid{ grid-template-columns:1fr; }
    .metric-item{ min-height:190px; border-right:1px solid rgba(255,255,255,.13); }
    .metric-value{ font-size:34px; }
    .why-title{ font-size:29px; }
    .why-icon{ margin-bottom:23px; font-size:34px; }
    .vision-title{ font-size:29px; }
    .vision-panel{ padding:26px 20px; }
    .vision-panel-head{ align-items:flex-start; }
    .outcomes-title{ font-size:29px; }
    .outcomes-points{ grid-template-columns:1fr; }
    .sustain-title{ font-size:29px; }
    .sustain-features{ grid-template-columns:1fr; }
    .sustain-media{ padding:0; }
    .sustain-image{ height:340px; }
    .sustain-float{ position:relative; left:auto; bottom:auto; min-width:0; width:calc(100% - 28px); margin:-58px auto 0; }
  }
</style>

<!-- ============== PAGE CONTENT ============== -->
<div class="main-content">

  <!-- Hero -->
  <section class="about-hero">
    <div class="container">
      <div class="about-hero__card" data-aos="fade-up">
        <span class="eyebrow">Company</span>
        <h1><span class="brand">About Singhania Refrigeration</span></h1>
        <p>
          Empowering India's cold chain with innovation and trust. We build reliable, energy-efficient
          refrigeration and transport solutions backed by expert consulting, turnkey execution, and
          responsive service across the country.
        </p>
        <div class="hero-cta-actions">
          <a href="contact" class="hero-cta-btn">Get a Free Quote</a>
          <a href="tel:+919971060822" class="hero-cta-btn">Call Now</a>
        </div>
      </div>
    </div>
    <div class="about-hero__bg"></div>
  </section>

  <!-- Who We Are -->
  <section class="legacy-section">
    <div class="container">
      <div class="row align-items-center legacy-row">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="legacy-media">
            <img class="legacy-image" src="assets/images/products/ware-house-cold-room.webp" alt="Temperature-controlled cold storage warehouse" loading="lazy" decoding="async">
            <div class="legacy-stat" aria-label="More than 25 years of cold chain excellence">
              <strong class="legacy-count count-up" data-target="25" data-suffix="+">0+</strong>
              <span>Years of Cold Chain Excellence</span>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="legacy-copy">
            <h2 class="legacy-title">Singhania Refrigeration<br><span>Empowering India's Cold Chain</span></h2>
            <p>
              Singhania Refrigeration is one of India's trusted suppliers of advanced refrigeration and cold chain solutions. Backed by the legacy of Singhania Logistics for over 25 years, we provide end-to-end cold storage, industrial refrigeration, and cold chain technologies for diverse industries.
            </p>
            <p>
              From concept to commissioning, from farm to fork, and from factory to pharma, we deliver precise temperature control, energy efficiency, and reliable performance at every stage of the supply chain.
            </p>
            <p>
              Our solutions include turnkey cold storage projects, blast freezers, ripening chambers, and refrigerated warehouses designed for modern industry demands. Based in Okhla, New Delhi, we serve clients across Delhi NCR and pan-India.
            </p>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Company Metrics -->
  <section class="metrics-strip" aria-label="Singhania Refrigeration performance highlights">
    <div class="container">
      <div class="metrics-grid">
        <article class="metric-item">
          <div class="metric-icon" aria-hidden="true"><i class="fa fa-clock-o"></i></div>
          <strong class="metric-value count-up" data-target="25" data-suffix="+">0+</strong>
          <span class="metric-title">Years of Excellence</span>
          <span class="metric-note">Deep cold chain expertise</span>
        </article>
        <article class="metric-item">
          <div class="metric-icon" aria-hidden="true"><i class="fa fa-bolt"></i></div>
          <strong class="metric-value count-up" data-target="99.9" data-decimals="1" data-suffix="%">0%</strong>
          <span class="metric-title">System Uptime</span>
          <span class="metric-note">Unmatched reliability</span>
        </article>
        <article class="metric-item">
          <div class="metric-icon" aria-hidden="true"><i class="fa fa-map-marker"></i></div>
          <strong class="metric-value">Pan-India</strong>
          <span class="metric-title">Service Network</span>
          <span class="metric-note">Rapid nationwide support</span>
        </article>
        <article class="metric-item">
          <div class="metric-icon" aria-hidden="true"><i class="fa fa-trophy"></i></div>
          <strong class="metric-value count-up" data-target="30" data-suffix="%">0%</strong>
          <span class="metric-title">Energy Savings</span>
          <span class="metric-note">Lower operating costs</span>
        </article>
      </div>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="why-section" id="why-choose-us">
    <div class="container">
      <div class="why-head" data-aos="fade-up">
        <h2 class="why-title">Why Choose Singhania Refrigeration<br><span>for Cold Chain Solutions?</span></h2>
        <p class="why-intro">Choosing Singhania means investing in trust, innovation, and performance—today and for the future. We take ownership from permissions and design to supply, installation, commissioning, and AMC.</p>
      </div>

      <div class="why-grid">
        <article class="why-card" data-aos="fade-up">
          <div class="why-icon" aria-hidden="true"><i class="fa fa-shield"></i></div>
          <div>
            <h3>Decades of Reliable Experience</h3>
            <p>25+ years of credibility and deep industry expertise through the Singhania Group.</p>
          </div>
        </article>
        <article class="why-card" data-aos="fade-up" data-aos-delay="60">
          <div class="why-icon" aria-hidden="true"><i class="fa fa-cubes"></i></div>
          <div>
            <h3>End-to-End Execution</h3>
            <p>A single accountable partner for the full project lifecycle—from design to AMC.</p>
          </div>
        </article>
        <article class="why-card" data-aos="fade-up" data-aos-delay="120">
          <div class="why-icon" aria-hidden="true"><i class="fa fa-bolt"></i></div>
          <div>
            <h3>Energy-Efficient Technology</h3>
            <p>Lower operating costs without compromising performance or temperature stability.</p>
          </div>
        </article>
        <article class="why-card" data-aos="fade-up">
          <div class="why-icon" aria-hidden="true"><i class="fa fa-users"></i></div>
          <div>
            <h3>Segment Expertise</h3>
            <p>Dairy, pharma, seafood, agriculture, and 3PL solutions—compliant and tailored for every industry.</p>
          </div>
        </article>
        <article class="why-card" data-aos="fade-up" data-aos-delay="60">
          <div class="why-icon" aria-hidden="true"><i class="fa fa-globe"></i></div>
          <div>
            <h3>Nationwide Service Network</h3>
            <p>Rapid, reliable engineering support across Delhi NCR and pan-India.</p>
          </div>
        </article>
        <article class="why-card why-card--featured" data-aos="fade-up" data-aos-delay="120">
          <div class="why-icon" aria-hidden="true"><i class="fa fa-wifi"></i></div>
          <div>
            <h3>IoT &amp; Quality Monitoring</h3>
            <p>Real-time smart controls, automated alerts, and full audit trails for compliance.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Vision & Future -->
  <section class="vision-section">
    <div class="container">
      <div class="vision-head" data-aos="fade-up">
        <h2 class="vision-title">Our Vision for Cold Chain &amp;<br><span>Refrigeration Solutions</span></h2>
        <p class="vision-intro">To transform India’s refrigeration and cold-chain landscape with durable, innovative, high-performance solutions that ensure safety, preserve freshness, and uphold integrity across every link.</p>
      </div>

      <div class="vision-grid">
        <article class="vision-panel vision-panel--light" data-aos="fade-right">
          <div class="vision-panel-head">
            <div class="vision-panel-icon" aria-hidden="true"><i class="fa fa-eye"></i></div>
            <div>
              <h3>Our Vision</h3>
              <span class="vision-panel-kicker">What drives us forward</span>
            </div>
          </div>
          <ul class="vision-list">
            <li>Distribute state-of-the-art technologies across seafood, dairy, agriculture and food processing.</li>
            <li>Guarantee freshness and compliance from farm to factory to fork.</li>
            <li>Maximize efficiency to reduce costs and environmental impact.</li>
            <li>Provide 360° lifecycle support—advisory, installation, commissioning, service and AMC.</li>
            <li>Build trust and long-term partnerships that scale with our customers.</li>
          </ul>
        </article>

        <article class="vision-panel vision-panel--dark" data-aos="fade-left">
          <div class="vision-panel-head">
            <div class="vision-panel-icon" aria-hidden="true"><i class="fa fa-line-chart"></i></div>
            <div>
              <h3 style="color: white;">Future of Cold Chain</h3>
              <span class="vision-panel-kicker">Our roadmap for India</span>
            </div>
          </div>
          <p class="vision-panel-copy">We envision a future where every Indian business—small, medium, or large—has access to world-class, sustainable refrigeration.</p>
          <ul class="vision-list">
            <li>Next-generation technology engineered for performance and efficiency</li>
            <li>Eco-conscious practices that minimize environmental impact</li>
            <li>Integrated systems that ensure safety, freshness, and quality end-to-end</li>
            <li>Customer-focused services that enable risk-free scaling</li>
          </ul>
          <p class="vision-goal">Our goal is to be India’s trusted refrigeration partner—synonymous with quality, dependability, and trust.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Measurable Outcomes -->
  <section class="outcomes-section">
    <div class="container">
      <div class="outcomes-layout">
        <div data-aos="fade-right">
          <!-- <span class="outcomes-badge">What You Get</span> -->
          <h2 class="outcomes-title">Measurable Outcomes,<br><span>Every Time</span></h2>
          <p class="outcomes-copy">Every system we deliver blends precise engineering, smart controls, and sustainable design—so you get real, measurable results that impact your bottom line.</p>
          <div class="outcomes-points" aria-label="Key measurable outcomes">
            <span class="outcomes-point">Reduced Wastage</span>
            <span class="outcomes-point">Lower Energy Consumption</span>
            <span class="outcomes-point">Improved Uptime</span>
            <span class="outcomes-point">Product Safety &amp; Compliance</span>
          </div>
        </div>

        <div class="outcomes-cards" data-aos="fade-left">
          <article class="outcome-card">
            <div class="outcome-icon" aria-hidden="true"><i class="fa fa-check-circle-o"></i></div>
            <h3>Future-Ready, Compliant Systems</h3>
            <p>Designed around FSSAI, WHO-GMP, and industry-specific requirements with scalability built in.</p>
          </article>
          <article class="outcome-card">
            <div class="outcome-icon" aria-hidden="true"><i class="fa fa-check-circle-o"></i></div>
            <h3>Optimized Uptime &amp; Energy Savings</h3>
            <p>Efficient refrigeration systems designed to minimize downtime and reduce electricity consumption.</p>
          </article>
          <article class="outcome-card">
            <div class="outcome-icon" aria-hidden="true"><i class="fa fa-check-circle-o"></i></div>
            <h3>Transparent Documentation &amp; BOQs</h3>
            <p>Clear bills of quantities and complete project documentation at every stage.</p>
          </article>
          <article class="outcome-card">
            <div class="outcome-icon" aria-hidden="true"><i class="fa fa-check-circle-o"></i></div>
            <h3>Proactive AMC &amp; Responsive Support</h3>
            <p>Structured preventive maintenance and responsive service support for reliable operations.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  

  <!-- Sustainable Future -->
  <section class="sustain-section">
    <div class="container">
      <div class="sustain-layout">
        <div data-aos="fade-right">
         
          <h2 class="sustain-title">Building a <span>Sustainable Future</span></h2>
          <div class="sustain-copy">
            <p>As India grows, so does the need for safe, efficient, and responsible cold-chain infrastructure. Singhania Refrigeration helps reduce food waste, protect temperature-sensitive medicines, and improve logistics with future-ready systems.</p>
            <p>Every project we deliver is built for reliability, longevity, and long-term value—reducing environmental impact while maintaining peak performance.</p>
          </div>

          <div class="sustain-features">
            <article class="sustain-feature">
              <div class="sustain-feature-icon" aria-hidden="true"><i class="fa fa-recycle"></i></div>
              <div><h3>Efficient Refrigerants</h3><p>Modern, lower-impact solutions</p></div>
            </article>
            <article class="sustain-feature">
              <div class="sustain-feature-icon" aria-hidden="true"><i class="fa fa-bolt"></i></div>
              <div><h3>Energy Optimization</h3><p>Reduced operating consumption</p></div>
            </article>
            <article class="sustain-feature">
              <div class="sustain-feature-icon" aria-hidden="true"><i class="fa fa-snowflake-o"></i></div>
              <div><h3>Reduced Food Waste</h3><p>Preserve freshness for longer</p></div>
            </article>
            <article class="sustain-feature">
              <div class="sustain-feature-icon" aria-hidden="true"><i class="fa fa-shield"></i></div>
              <div><h3>Built to Last</h3><p>Durable, long-life systems</p></div>
            </article>
          </div>

          <p class="sustain-quote">“Best cold chain company in India—Where Technology Meets Trust.”</p>
        </div>

        <div class="sustain-media" data-aos="fade-left">
          <img class="sustain-image" src="assets/images/products/energy_efficient.png" width="1536" height="1024" alt="Energy-efficient cold storage loading and ventilation facility" loading="lazy" decoding="async">
          <div class="sustain-float">
            <div class="sustain-float-icon" aria-hidden="true"><i class="fa fa-line-chart"></i></div>
            <div><strong>Efficient Systems</strong><span>Future-Ready &amp; Responsible</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
    <div class="container">
      <div class="sec-title text-center truck-body-cta">
        <span class="sub-title modify white">Get Started</span>
        <h2 class="title3 white-color">Talk to Us About Your Fleet&rsquo;s Refrigeration Needs</h2>

        <p class="cta-description">
           Whether you need a refrigerated truck, a ripening chamber, a multi-temperature warehouse,
          or a complete cold-chain infrastructure—Singhania Refrigeration is your partner in success.
        </p>

        <div class="btn-part">
          <a class="readon banner-style" href="contact.php">Request a Quote &rarr;</a>
        </div>

        <p class="cta-phone-numbers">
          Call: <a href="tel:+919971060822"><strong>+91 99710 60822</strong></a>
          <span aria-hidden="true">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
          Call: <a href="tel:+919718097170"><strong>+91 97180 97170</strong></a>
        </p>
      </div>
    </div>
  </div>

  <style>
    .truck-body-cta .cta-description {
      max-width: 760px;
      margin: 16px auto 24px;
      color: #fff;
      font-size: 16px;
      line-height: 1.6;
    }

    .truck-body-cta .cta-phone-numbers {
      margin: 20px 0 0;
      color: #fff;
      font-size: 15px;
      line-height: 1.6;
    }

    .truck-body-cta .cta-phone-numbers a {
      color: #fff;
    }

    .truck-body-cta .cta-phone-numbers a:hover {
      text-decoration: underline;
    }
  </style>



</div>
<!-- /main-content -->

<?php include('footer.php'); ?>

<!-- AOS init (safe if already present) -->
<script>
  window.addEventListener('load', function(){
    if (window.AOS && typeof AOS.init === 'function') {
      AOS.init({ duration: 750, once: true, offset: 80, easing: 'ease-out' });
    }

    var counters = document.querySelectorAll('.count-up');
    if (!counters.length) return;

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function formatCounterValue(value, decimals, prefix, suffix) {
      return prefix + value.toFixed(decimals) + suffix;
    }

    function runCounter(counter) {
      if (counter.getAttribute('data-counted') === 'true') return;
      counter.setAttribute('data-counted', 'true');

      var target = Number(counter.getAttribute('data-target')) || 0;
      var decimals = Number(counter.getAttribute('data-decimals')) || 0;
      var prefix = counter.getAttribute('data-prefix') || '';
      var suffix = counter.getAttribute('data-suffix') || '';

      if (reduceMotion) {
        counter.textContent = formatCounterValue(target, decimals, prefix, suffix);
        return;
      }

      var duration = 1400;
      var startTime = null;

      function updateCount(timestamp) {
        if (startTime === null) startTime = timestamp;
        var progress = Math.min((timestamp - startTime) / duration, 1);
        var easedProgress = 1 - Math.pow(1 - progress, 3);
        var currentValue = target * easedProgress;

        counter.textContent = formatCounterValue(currentValue, decimals, prefix, suffix);

        if (progress < 1) {
          counter.countAnimationFrame = window.requestAnimationFrame(updateCount);
        } else {
          counter.textContent = formatCounterValue(target, decimals, prefix, suffix);
          counter.countAnimationFrame = null;
        }
      }

      counter.countAnimationFrame = window.requestAnimationFrame(updateCount);
    }

    function resetCounter(counter) {
      if (counter.countAnimationFrame) {
        window.cancelAnimationFrame(counter.countAnimationFrame);
        counter.countAnimationFrame = null;
      }

      var decimals = Number(counter.getAttribute('data-decimals')) || 0;
      var prefix = counter.getAttribute('data-prefix') || '';
      var suffix = counter.getAttribute('data-suffix') || '';
      counter.removeAttribute('data-counted');
      counter.textContent = formatCounterValue(0, decimals, prefix, suffix);
    }

    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function(entries){
        entries.forEach(function(entry){
          if (entry.isIntersecting && entry.intersectionRatio >= 0.35) {
            runCounter(entry.target);
          } else if (!entry.isIntersecting) {
            resetCounter(entry.target);
          }
        });
      }, { threshold: [0, 0.35] });

      counters.forEach(function(counter){ observer.observe(counter); });
    } else {
      counters.forEach(runCounter);
    }
  });
</script>
</body>
</html>
