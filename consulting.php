<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('head.php');?>

    <style>
      :root{
        --brand:#0e2344; --ink:#0f2442; --muted:#667085; --line:#e6ecf5;
        --card:#ffffff; --soft:#f7f9ff;
      }

      /* ========= HERO ========= */
      .consult-hero{
        position:relative; width:100%;
        padding:82px 0;
        background:
          radial-gradient(120% 160% at 8% -10%, #1a2b55 0%, rgba(26,43,85,0) 55%),
          radial-gradient(110% 140% at 95% -20%, #0f1a39 0%, rgba(15,26,57,0) 55%),
          linear-gradient(180deg, #0e1a37 0%, #0c1224 100%);
        overflow:hidden;
      }
      .consult-hero .container{ position:relative; z-index:1; }
      .titlecard{
        max-width: 980px;
        margin: 0 auto;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.20);
        border-radius: 8px;
        padding: 26px 26px 28px;
        box-shadow:0 22px 60px rgba(0,0,0,.28);
        color:#e8eeff;
      }
      .eyebrow{ display:inline-block; font-size:12px; letter-spacing:.18em; text-transform:uppercase; color:#a9b7df; margin-bottom:4px;}
      .consult-hero h1{ margin:0 0 10px; font-weight:800; color:#fff; font-size:clamp(28px,4.2vw,42px);}
      .consult-hero p{ margin:0; color:#cbd6ff;}

      /* ========= BODY ========= */
      .consult-body{ background:#fff; position:relative; padding:92px 0; }
      .consult-body::before{
        content:""; position:absolute; inset:0; pointer-events:none;
        background-image:
          radial-gradient(#cfd7ee 1px, transparent 1px),
          radial-gradient(#dfe5f6 1px, transparent 1px);
        background-size:48px 48px, 64px 64px; background-position:0 0, 12px 18px; opacity:.12;
      }

      .lead-wrap{ max-width:980px; margin:0 auto 22px; }
      .lead{
        color:#2b3e66; margin:0 0 12px;
        text-align: justify; text-justify: inter-word; hyphens: auto;
      }
      @media (max-width: 575.98px){
        .lead{ text-align:left; }
      }

      /* Blocks */
      .block{
        max-width:980px; margin: 22px auto 0;
        background:#fff; border:1px solid var(--line); border-radius:8px;
        box-shadow:0 10px 26px rgba(16,28,52,.06);
        padding:18px 18px 16px;
      }
      .block,
      .block h3,
      .block p,
      .block li,
      .feat,
      .feat h5,
      .feat p{
        font-family: 'Roboto', sans-serif;
      }
      .block + .block{ margin-top:16px; }
      .block h3{ font-size:22px; font-weight:800; color:var(--ink); margin:0 0 6px; }
      .block p{ margin:0 0 10px; color:#2f426b; }

      .ticklist{ list-style:none; margin:8px 0 0; padding:0; display:grid; gap:8px;}
      .ticklist li{ position:relative; padding-left:28px; color:#2c3c66;}
      .ticklist li:before{
        content:""; position:absolute; left:0; top:6px; width:18px; height:18px; border-radius:50%;
        background: conic-gradient(from 180deg,#3b5bb7,#20356b);
        box-shadow: inset 0 0 0 3px #fff;
      }

      /* Feature badges row */
      .features{ max-width:1080px; margin:22px auto 0; }
      .feat{
        height:100%;
        display:flex; gap:12px; align-items:flex-start;
        padding:18px; border:1px solid var(--line); border-radius:8px; background:#fff;
        box-shadow:0 8px 24px rgba(15,25,44,.06), 0 1px 0 rgba(16,24,40,.04) inset;
        transition: transform .15s ease, box-shadow .2s ease;
      }
      .feat:hover{ transform: translateY(-2px); box-shadow:0 16px 34px rgba(15,25,44,.10), 0 1px 0 rgba(16,24,40,.04) inset; }
      .feat .badge{
        min-width:42px; height:42px; border-radius:11px; display:grid; place-items:center;
        background:#eef2ff; color:#20335f; border:1px solid #dfe7ff; font-size:18px;
      }
      .feat h5{ margin:0 0 3px; font-weight:800; color:var(--ink); }
      .feat p{ margin:0; color:#41507a; }

      /* Utility */
      .mt-32{ margin-top:32px; }
      @media (max-width: 991px){
        .consult-hero{ padding:64px 0; }
        .consult-body{ padding:72px 0; }
      }
      @media (max-width: 575.98px){
        .consult-hero{ padding:48px 0; }
        .consult-body{ padding:56px 0; }
        .titlecard{ padding:22px 18px; border-radius:8px; }
        .block{ padding:20px 18px; }
      }
    </style>
  </head>
  <body>
    <?php include('header.php');?>

    <!-- ===== HERO ===== -->
    <section class="consult-hero">
      <div class="container">
        <div class="titlecard">
          <span class="eyebrow">Consulting</span>
          <h1>End-to-End Integrated Cold Chain Solutions</h1>
          <p>We don’t just build cold rooms—we engineer complete, future-ready cold chain ecosystems.</p>
        </div>
      </div>
    </section>

    <!-- ===== MAIN ===== -->
    <section class="consult-body">
      <div class="container">

        <!-- Intro (JUSTIFIED) -->
        <div class="lead-wrap">
          <p class="lead">
            At Singhania Refrigeration, we do not just build storage rooms. We create complete cold chain solutions with the latest technology that are ready for the future. We have years of experience in the field. We offer a range of services, including construction, consulting, refrigeration for transport, packaging and grading lines, refrigeration systems, and solutions to manage quality. No matter what industry or use you have in mind, we make sure all parts of your chain work well together, can grow with your needs, and are ready for what's next.
          </p>
          <p class="lead">
            We provide solutions based on data that consider how much you invest, energy efficiency, how often you can use it, and security needs. We work in areas such as food and dairy, medicine, seafood, farming, and restaurants that serve food quickly. From the start of an idea to when it's up and running our team at Singhania Refrigeration makes sure everything goes smoothly and works reliably at every step of the chain.
          </p>
        </div>

        <!-- Cold storage consulting -->
        <div class="block">
          <h3>Cold storage consulting</h3>
          <p>
            We guide clients through every step of their cold storage journey—advising, conceptualizing, planning, designing, and budgeting.
            Designed to achieve a harmonious balance between operational uptime, efficiency, and investment, our consulting is data-driven and practical.
          </p>
          <ul class="ticklist">
            <li>Site assessment, thermal load calculations, and capacity planning</li>
            <li>Effective insulation and door strategies, optimized layouts, and material flow</li>
            <li>Equipment sizing (Freon/Ammonia), redundancy, and safety conformance</li>
            <li>Detailed models of Capex and Opex, and Milestone Program</li>
          </ul>
          <p class="mt-32">
            This overall approach ensures that your convenience is technically scalable for sound, cost-skilled and long-term development.
          </p>
        </div>

        <!-- Grant coordination -->
        <div class="block">
          <h3>Grant coordination and documentation</h3>
          <p>
            Understanding how government subsidies and incentives work may sometimes be quite difficult. Our services cover the whole process,
            including putting together the packet, checking your eligibility, and working with the various departments. We ensure you receive the
            much-needed subsidy efficiently and hassle-free.
          </p>
        </div>

        <!-- PMC -->
        <div class="block">
          <h3>Project Management Services</h3>
          <p>
            Our active Project Management Consultancy (PMC) guarantees that your project remains on schedule, within budget, and in alignment.
            Our responsibilities include the supervision of vendor management, quality reviews, safety protocols, and commissioning sign-offs, which
            guarantee a smooth startup process and minimal surprises.
          </p>
        </div>

        <!-- Three feature badges -->
        <div class="features">
          <div class="row g-3">
            <div class="col-md-6 col-lg-4">
              <div class="feat">
                <div class="badge"><i class="fa fa-snowflake-o"></i></div>
                <div>
                  <h5>Refrigeration Expertise</h5>
                  <p>We have a profound understanding of maturation chambers, blast freezing, IQF systems, CA/MA storage technologies, and Freon and Ammonia refrigeration systems. The design of each system is customized to your industry with an emphasis on sustainability, performance, and safety.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="feat">
                <div class="badge"><i class="fa fa-bar-chart"></i></div>
                <div>
                  <h5>Energy &amp; Reliability</h5>
                  <p>Smart controls, sophisticated insulation, and high-COP equipment reduce kWh/MT consumption. Preventive measures and redundancy planning target 99.9% uptime—even in hazardous operating conditions.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="feat">
                <div class="badge"><i class="fa fa-file-text-o"></i></div>
                <div>
                  <h5>Subsidy Guidance</h5>
                  <p>We offer strategic guidance and execution support to leverage Grant-in-Aid schemes and subsidies. Our coordination and documentation expertise helps improve approval odds and accelerate disbursal.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <?php include('footer.php');?>

    <script>
      // Initialize AOS if present (already included in head.php)
      window.addEventListener('load', function(){
        if (window.AOS && typeof AOS.init === 'function') {
          AOS.init({ duration: 700, once: true, offset: 80 });
        }
      });
    </script>
  </body>
</html>
