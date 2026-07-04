<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
<?php include('header.php'); ?>

<!-- ============== PAGE SCOPED STYLES ============== -->
<style>
  :root{
    --ink:#0f2442; --muted:#667085; --soft:#f6f8ff; --card:#ffffff;
    --line:#e7ecf5; --brand:#0e2344;
  }
  .section-pad{ padding: 80px 0; }
  .section-soft{ background: linear-gradient(180deg, #fafbff 0%, #f3f6ff 100%); }
  .g-30>[class*="col-"]{ margin-bottom:30px; }
  .g-40>[class*="col-"]{ margin-bottom:40px; }

  .h2{ font-size: clamp(20px, 3.4vw, 20px); line-height:1.15; color: var(--ink); font-weight:800; }
  .lead{ font-size: clamp(15px, 1.7vw, 17px); color:#2c3e68; }
  .eyebrow{ display:inline-block; font-size:12px; letter-spacing:.18em; text-transform:uppercase; color:#9aa6c3; }

  /* Hero */
  .about-hero{ position: relative; padding: 56px 0 24px; overflow: hidden; }
  .about-hero__bg{
    position:absolute; inset:0 0 auto 0; height:100%;
    background:
      radial-gradient(100% 120% at 10% 0%, rgba(14,35,68,.25) 0%, rgba(14,35,68,0) 55%),
      radial-gradient(120% 100% at 90% -10%, rgba(17,44,92,.18) 0%, rgba(17,44,92,0) 60%),
      linear-gradient(180deg, #0f1a39 0%, #0c1224 100%);
    opacity:.95; z-index:-1;
  }
  .about-hero__card{
    max-width: 900px;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 16px;
    padding: clamp(18px, 4vw, 28px);
    color:#eaf0ff;
    box-shadow: 0 24px 60px rgba(0,0,0,.25);
    backdrop-filter: blur(4px) saturate(120%);
  }
  .about-hero__card h1{ font-size: clamp(28px, 4vw, 44px); line-height:1.08; margin:6px 0 10px; }
  .about-hero__card .brand{ color:#ffffff; }
  .about-hero__card p{ color:#dfe6ff; margin:.35rem 0 0; }

  /* Cards */
  .card-lite{
    height:100%; border-radius:16px; background: var(--card); border:1px solid var(--line);
    padding: clamp(18px, 3.2vw, 26px); box-shadow: 0 12px 30px rgba(16, 28, 52, .06);
  }

  /* Lists */
  .policy-list{ margin:0; padding-left:20px; color:#2d3c63; }
  .policy-list li{ margin:6px 0; }
  .checklist{ list-style:none; padding:0; margin:0; display:grid; gap:10px; }
  .checklist li{ position:relative; padding-left:28px; color:#2d3c63; }
  .checklist li::before{
    content:""; position:absolute; left:0; top:5px; width:18px; height:18px; border-radius:50%;
    background: conic-gradient(from 180deg, #3b5bb7, #2a427f); box-shadow: inset 0 0 0 3px #fff;
  }

  /* TOC */
  .toc a{ color:#2a427f; text-decoration:none; }
  .toc a:hover{ text-decoration:underline; }

  code.badge{
    background:#eef2ff; color:#2a427f; border:1px solid #dfe5ff; border-radius:6px;
    padding:2px 8px; font-size:12px;
  }

  @media (max-width: 991px){
    .section-pad{ padding: 64px 0; }
    .about-hero{ padding: 40px 0 18px; }
    .about-hero__bg{ height:100%; }
  }
</style>

<!-- ============== PAGE CONTENT ============== -->
<div class="main-content">

  <!-- Hero -->
  <section class="about-hero">
    <div class="container">
      <div class="about-hero__card" data-aos="fade-up">
        <span class="eyebrow">Legal</span>
        <h1><span class="brand">Terms & Conditions</span></h1>
        <p>
          These Terms & Conditions (“Terms”) govern your access to and use of the website
          <code class="badge">singhaniarefrigeration.in</code> and our products and services. By using our
          Website or engaging our Services, you agree to be bound by these Terms.
        </p>
      </div>
    </div>
    <div class="about-hero__bg"></div>
  </section>

  <!-- Quick Summary -->
  <section class="section-pad section-soft">
    <div class="container" data-aos="fade-up">
      <div class="card-lite">
        <h2 class="h2 mb-12">Quick Summary</h2>
        <ul class="checklist">
          <li>Quotes/BoQs are estimates; final pricing follows approved scope and site conditions.</li>
          <li>Payments, delivery timelines, and warranties are as per your Work Order/Contract.</li>
          <li>Liability is limited as stated; indirect or consequential losses are excluded.</li>
          <li>Use of our Website is subject to acceptable use and intellectual property rules.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- TOC -->
  <section class="section-pad">
    <div class="container" data-aos="fade-up">
      <div class="row g-30">
        <div class="col-lg-5">
          <div class="card-lite toc">
            <h5 class="mb-12">Table of Contents</h5>
            <ol class="policy-list">
              <li><a href="#acceptance">Acceptance of Terms</a></li>
              <li><a href="#definitions">Definitions</a></li>
              <li><a href="#scope">Scope of Services</a></li>
              <li><a href="#orders">Orders, Quotes & Pricing</a></li>
              <li><a href="#payments">Payment Terms</a></li>
              <li><a href="#delivery">Delivery, Risk & Title</a></li>
              <li><a href="#installation">Installation, Commissioning & Warranty</a></li>
              <li><a href="#amc">Maintenance & AMC</a></li>
              <li><a href="#client">Client Responsibilities</a></li>
              <li><a href="#acceptable-use">Acceptable Use (Website)</a></li>
              <li><a href="#ip">Intellectual Property</a></li>
              <li><a href="#conf">Confidentiality & Data Protection</a></li>
              <li><a href="#compliance">Compliance & Permits</a></li>
              <li><a href="#liability">Limitation of Liability</a></li>
              <li><a href="#indemnity">Indemnity</a></li>
              <li><a href="#force-majeure">Force Majeure</a></li>
              <li><a href="#termination">Suspension & Termination</a></li>
              <li><a href="#law">Governing Law & Dispute Resolution</a></li>
              <li><a href="#changes">Changes to Terms</a></li>
              <li><a href="#contact">Contact Us</a></li>
            </ol>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="card-lite">
            <h2 id="acceptance" class="h2 mb-12">1) Acceptance of Terms</h2>
            <p>
              By accessing our Website or engaging our Services, you agree to these Terms and to any
              specific terms in your proposal, quotation, purchase order, or Work Order/Contract
              (“Contract Documents”). In case of conflict, the Contract Documents prevail for that
              engagement.
            </p>

            <h2 id="definitions" class="h2 mt-30 mb-12">2) Definitions</h2>
            <ul class="policy-list">
              <li><strong>“Company”, “we”, “us”, “our”</strong> – Singhania Refrigeration.</li>
              <li><strong>“Client”, “you”, “your”</strong> – the person or entity purchasing or using our Services.</li>
              <li><strong>“Services”</strong> – our refrigeration, cold-chain, consulting, design, supply, installation, commissioning, and maintenance offerings.</li>
              <li><strong>“Website”</strong> – <code class="badge">singhaniarefrigeration.in</code> and subdomains (if any).</li>
              <li><strong>“Goods/Equipment”</strong> – products, parts, or systems supplied or installed by us.</li>
            </ul>

            <h2 id="scope" class="h2 mt-30 mb-12">3) Scope of Services</h2>
            <p>
              The scope is as described in our proposal/BoQ and Contract Documents. Any change in
              specifications, quantities, layout, or site conditions may require a revised quote and timeline.
            </p>

            <h2 id="orders" class="h2 mt-30 mb-12">4) Orders, Quotes & Pricing</h2>
            <ul class="policy-list">
              <li>All quotes are valid for the period stated (or 15 days if not stated) and subject to market fluctuations in materials, duties, and taxes.</li>
              <li>Prices are exclusive of applicable taxes, duties, freight, unloading, and insurance unless expressly included.</li>
              <li>Orders are accepted upon written confirmation and receipt of the agreed advance.</li>
            </ul>

            <h2 id="payments" class="h2 mt-30 mb-12">5) Payment Terms</h2>
            <ul class="policy-list">
              <li>Payment milestones are specified in the Contract Documents (e.g., advance, dispatch, delivery, installation, commissioning).</li>
              <li>Delays in due payments may lead to suspension of work, interest on overdue amounts, and/or rescheduling of timelines.</li>
              <li>All bank charges are borne by the payer unless agreed otherwise.</li>
            </ul>

            <h2 id="delivery" class="h2 mt-30 mb-12">6) Delivery, Risk & Title</h2>
            <ul class="policy-list">
              <li>Delivery schedules are indicative and subject to availability, approvals, and site readiness.</li>
              <li>Risk passes to the Client upon delivery to site; title passes upon full payment.</li>
              <li>Any transit damage must be reported immediately upon receipt with supporting evidence.</li>
            </ul>

            <h2 id="installation" class="h2 mt-30 mb-12">7) Installation, Commissioning & Warranty</h2>
            <ul class="policy-list">
              <li>Installation/commissioning shall follow manufacturer and safety standards; site utilities and readiness are the Client’s responsibility unless included.</li>
              <li>Warranty terms are as per our proposal and/or OEM warranty. Warranty excludes misuse, improper maintenance, unauthorized alterations, and normal wear & tear.</li>
              <li>Spare parts and consumables are chargeable unless covered by an AMC or stated otherwise.</li>
            </ul>

            <h2 id="amc" class="h2 mt-30 mb-12">8) Maintenance & AMC</h2>
            <ul class="policy-list">
              <li>AMC terms (scope, response time, exclusions) are defined in the AMC agreement, if opted.</li>
              <li>Breakdown calls outside AMC scope are chargeable as per prevailing rates.</li>
            </ul>

            <h2 id="client" class="h2 mt-30 mb-12">9) Client Responsibilities</h2>
            <ul class="policy-list">
              <li>Provide accurate information, drawings, and approvals; ensure site readiness, safe access, and utilities.</li>
              <li>Comply with safety norms; provide required permits and escorts where applicable.</li>
              <li>Ensure trained operators and adherence to recommended operating procedures.</li>
            </ul>

            <h2 id="acceptable-use" class="h2 mt-30 mb-12">10) Acceptable Use (Website)</h2>
            <ul class="policy-list">
              <li>Do not misuse the Website (attempt to breach security, inject malware, scrape without consent, or disrupt services).</li>
              <li>Content on the Website is for general information and may change without notice.</li>
            </ul>

            <h2 id="ip" class="h2 mt-30 mb-12">11) Intellectual Property</h2>
            <ul class="policy-list">
              <li>All trademarks, logos, drawings, designs, proposals, and content remain our or the respective owner’s IP.</li>
              <li>No license is granted except as necessary to use the Website or as expressly agreed in writing.</li>
            </ul>

            <h2 id="conf" class="h2 mt-30 mb-12">12) Confidentiality & Data Protection</h2>
            <ul class="policy-list">
              <li>Both parties shall keep confidential information shared during engagement secure and use it solely for the intended purpose.</li>
              <li>Personal data is handled as per our <a href="privacy-policy.php">Privacy Policy</a> and applicable laws.</li>
            </ul>

            <h2 id="compliance" class="h2 mt-30 mb-12">13) Compliance & Permits</h2>
            <p>
              Client is responsible for obtaining statutory permissions, licenses, and clearances unless explicitly
              included in our scope. We comply with applicable regulations for our deliverables.
            </p>

            <h2 id="liability" class="h2 mt-30 mb-12">14) Limitation of Liability</h2>
            <ul class="policy-list">
              <li>To the maximum extent permitted by law, our total liability for any claim is limited to the amount paid for the specific part of Services giving rise to the claim.</li>
              <li>We are not liable for indirect, incidental, special, punitive, or consequential damages, including loss of profit, production, or business.</li>
            </ul>

            <h2 id="indemnity" class="h2 mt-30 mb-12">15) Indemnity</h2>
            <p>
              You agree to indemnify and hold us harmless from claims arising out of your breach of these Terms,
              misuse of the Website, or violation of law or third-party rights.
            </p>

            <h2 id="force-majeure" class="h2 mt-30 mb-12">16) Force Majeure</h2>
            <p>
              We are not liable for delays or failures due to events beyond reasonable control, including but not
              limited to acts of God, natural disasters, strikes, war, epidemics, governmental actions, or supply chain disruptions.
            </p>

            <h2 id="termination" class="h2 mt-30 mb-12">17) Suspension & Termination</h2>
            <ul class="policy-list">
              <li>We may suspend or terminate Services for non-payment, breach of Terms, or unlawful activity.</li>
              <li>Either party may terminate as per Contract Documents; accrued rights and obligations survive termination.</li>
            </ul>

            <h2 id="law" class="h2 mt-30 mb-12">18) Governing Law & Dispute Resolution</h2>
            <p>
              These Terms are governed by the laws of India. Courts at New Delhi, India shall have exclusive
              jurisdiction. Parties shall first attempt amicable resolution; failing which, disputes may be
              referred to arbitration in New Delhi under the Arbitration and Conciliation Act, 1996, by a sole
              arbitrator mutually appointed. Proceedings in English.
            </p>

            <h2 id="changes" class="h2 mt-30 mb-12">19) Changes to Terms</h2>
            <p>
              We may update these Terms from time to time. The “Last updated” date reflects the latest revision.
              Material changes will be highlighted on this page or notified where appropriate.
            </p>

            <h2 id="contact" class="h2 mt-30 mb-12">20) Contact Us</h2>
            <p class="mb-12">For questions regarding these Terms:</p>
            <ul class="policy-list">
              <li><strong>Email:</strong> <a href="mailto:enquiry@singhanialogistics.in">enquiry@singhanialogistics.in</a></li>
              <li><strong>Phone:</strong> +91 9971060822</li>
              <li><strong>Address:</strong> Singhania Refrigeration, C-19, OKHLA PHASE - I NEW DELHI - 110020, India</li>
            </ul>

            <div class="mt-30">
              <a href="#top" class="readon banner-style" style="background:#1c2f57;color:#fff;border-radius:10px;padding:12px 20px;display:inline-block;">
                Back to top
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section-pad section-soft">
    <div class="container" data-aos="fade-up">
      <div class="card-lite">
        <h2 class="h2 mb-12">Have questions about these Terms?</h2>
        <p class="lead">
          We’re happy to clarify scope, warranty, AMC, or delivery terms. Write to
          <a href="mailto:enquiry@singhanialogistics.in">enquiry@singhanialogistics.in</a>.
        </p>
        <a href="contact.php" class="readon banner-style" style="background:#1c2f57;color:#fff;border-radius:10px;padding:12px 20px;display:inline-block;">
          Contact Us
        </a>
      </div>
    </div>
  </section>

</div>
<!-- /main-content -->

<?php include('footer.php'); ?>

<!-- AOS init (safe if already present) -->
<script>
  window.addEventListener('load', function(){
    if (window.AOS && typeof AOS.init === 'function') {
      AOS.init({ duration: 750, once: true, offset: 80, easing: 'ease-out' });
    }
  });
</script>
</body>
</html>
