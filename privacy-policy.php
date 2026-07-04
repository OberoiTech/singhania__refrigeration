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

  .h2{ font-size: clamp(20px, 3.4vw, 20px);; line-height:1.15; color: var(--ink); font-weight:800; }
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
        <span class="eyebrow">Policy</span>
        <h1><span class="brand">Privacy Policy</span></h1>
        <p>
          This Privacy Policy explains how <strong>Singhania Refrigeration</strong> (“we”, “us”, “our”)
          collects, uses, shares, and protects your information when you use our website, products,
          and services. We are committed to handling your data responsibly and in compliance with
          applicable laws, including India’s <em>Digital Personal Data Protection Act, 2023</em> (DPDP Act).
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
          <li>We collect only what’s necessary to deliver and improve our services.</li>
          <li>We don’t sell your personal data.</li>
          <li>You can access, correct, or delete your data—write to <a href="mailto:enquiry@singhanialogistics.in">enquiry@singhanialogistics.in</a>.</li>
          <li>We use cookies for essential features, performance, and analytics—you control them.</li>
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
              <li><a href="#scope">Scope & Definitions</a></li>
              <li><a href="#info-we-collect">Information We Collect</a></li>
              <li><a href="#how-we-use">How We Use Your Information</a></li>
              <li><a href="#legal-basis">Legal Basis & Consent</a></li>
              <li><a href="#cookies">Cookies & Similar Technologies</a></li>
              <li><a href="#sharing">How We Share Information</a></li>
              <li><a href="#retention">Data Retention</a></li>
              <li><a href="#security">Data Security</a></li>
              <li><a href="#your-rights">Your Rights</a></li>
              <li><a href="#children">Children’s Privacy</a></li>
              <li><a href="#intl">International Transfers</a></li>
              <li><a href="#changes">Changes to This Policy</a></li>
              <li><a href="#contact">Contact Us</a></li>
            </ol>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="card-lite">
            <h2 id="scope" class="h2 mb-12">1) Scope & Definitions</h2>
            <p class="mb-12">
              This Policy covers personal data processed by us when you browse our website, submit
              enquiries, purchase our products or services, or interact with our support and sales teams.
            </p>
            <ul class="policy-list">
              <li><strong>“Personal Data”</strong> means any data about an individual who is identifiable by or in relation to such data.</li>
              <li><strong>“Website”</strong> means pages under <code class="badge">singhaniarefrigeration.in</code> (and subdomains, if any).</li>
              <li><strong>“Services”</strong> means our refrigeration, cold-chain, consulting, installation, and maintenance offerings.</li>
            </ul>

            <h2 id="info-we-collect" class="h2 mt-30 mb-12">2) Information We Collect</h2>
            <ul class="policy-list">
              <li><strong>Information you provide:</strong> name, email, phone, company, role, billing/shipping address, enquiry details, documents shared for proposals or service delivery.</li>
              <li><strong>Transactional data:</strong> orders, invoices, payments, service tickets, warranties, AMC details.</li>
              <li><strong>Usage data:</strong> pages viewed, buttons clicked, referring URLs, device/browser metadata, IP address, approximate location.</li>
              <li><strong>Cookies & identifiers:</strong> session IDs, preference cookies, analytics identifiers (see Cookies section).</li>
            </ul>

            <h2 id="how-we-use" class="h2 mt-30 mb-12">3) How We Use Your Information</h2>
            <ul class="policy-list">
              <li>Provide, operate, and maintain our Website and Services.</li>
              <li>Prepare proposals, BoQs, agreements, and execute projects end-to-end.</li>
              <li>Process orders, payments, billing, and after-sales support/AMC.</li>
              <li>Respond to enquiries and provide customer support.</li>
              <li>Improve performance, safety, and user experience of our systems.</li>
              <li>Send service communications and (with consent) marketing updates.</li>
              <li>Comply with legal obligations, resolve disputes, and enforce agreements.</li>
            </ul>

            <h2 id="legal-basis" class="h2 mt-30 mb-12">4) Legal Basis & Consent</h2>
            <p class="mb-12">
              We process personal data on the basis of: (a) your consent; (b) performance of a contract or
              to take steps at your request before entering into a contract; (c) compliance with legal
              obligations; and (d) legitimate interests (such as improving services, ensuring security).
              Where consent is the basis, you may withdraw it at any time by contacting us.
            </p>

            <h2 id="cookies" class="h2 mt-30 mb-12">5) Cookies & Similar Technologies</h2>
            <p class="mb-12">We use:</p>
            <ul class="policy-list">
              <li><strong>Essential cookies:</strong> for core site functionality (login, forms, CSRF protection).</li>
              <li><strong>Preference cookies:</strong> remember language and UI settings.</li>
              <li><strong>Analytics cookies:</strong> help us understand site usage to improve performance.</li>
            </ul>
            <p class="mb-0">
              You can manage cookies via your browser settings. Blocking certain cookies may impact functionality.
            </p>

            <h2 id="sharing" class="h2 mt-30 mb-12">6) How We Share Information</h2>
            <ul class="policy-list">
              <li><strong>Vendors/Service Providers:</strong> hosting, analytics, payment processors, logistics, and field service partners bound by confidentiality and data-processing terms.</li>
              <li><strong>Compliance & Safety:</strong> to regulators, courts, or authorities as required by law or to protect rights, safety, and property.</li>
              <li><strong>Business Transfers:</strong> in connection with a merger, acquisition, or sale of assets, where permitted by law.</li>
            </ul>
            <p class="mb-0"><em>We do not sell your personal data.</em></p>

            <h2 id="retention" class="h2 mt-30 mb-12">7) Data Retention</h2>
            <p>
              We retain personal data only for as long as necessary to fulfill the purposes outlined in this
              Policy, including legal, accounting, or reporting requirements. Typical retention:
            </p>
            <ul class="policy-list">
              <li>Enquiries & support tickets: up to 3 years after closure.</li>
              <li>Orders, invoices, and tax records: as required by applicable law (often 8 years).</li>
              <li>Marketing preferences: until you opt-out or withdraw consent.</li>
            </ul>

            <h2 id="security" class="h2 mt-30 mb-12">8) Data Security</h2>
            <p>
              We implement reasonable technical and organizational measures to protect data (access controls,
              encryption in transit where applicable, role-based permissions, backups). No method is 100% secure;
              we work to continually strengthen our safeguards.
            </p>

            <h2 id="your-rights" class="h2 mt-30 mb-12">9) Your Rights</h2>
            <p class="mb-12">
              Subject to applicable law (including the DPDP Act), you may have the right to access, correct,
              update, or delete your personal data; withdraw consent; and register grievances.
            </p>
            <ul class="policy-list">
              <li><strong>Access/Correction/Deletion:</strong> email <a href="mailto:enquiry@singhanialogistics.in">enquiry@singhanialogistics.in</a>.</li>
              <li><strong>Marketing Opt-out:</strong> use unsubscribe links or write to us.</li>
              <li><strong>Grievance Officer:</strong> see Contact Us for details.</li>
            </ul>

            <h2 id="children" class="h2 mt-30 mb-12">10) Children’s Privacy</h2>
            <p>
              Our Website and Services are not directed to children under 18. If you believe a child has provided
              personal data to us, please contact us to request deletion.
            </p>

            <h2 id="intl" class="h2 mt-30 mb-12">11) International Transfers</h2>
            <p>
              If personal data is processed outside India (e.g., cloud hosting/backup), we take reasonable steps
              to ensure appropriate safeguards consistent with applicable laws.
            </p>

            <h2 id="changes" class="h2 mt-30 mb-12">12) Changes to This Policy</h2>
            <p>
              We may update this Policy from time to time. The “Last updated” date at the top indicates the latest
              revision. Material changes will be highlighted on this page or notified where appropriate.
            </p>

            <h2 id="contact" class="h2 mt-30 mb-12">13) Contact Us</h2>
            <p class="mb-12">For questions, requests, or complaints about this Policy or your personal data:</p>
            <ul class="policy-list">
              <li><strong>Email (Privacy):</strong> <a href="mailto:enquiry@singhanialogistics.in">enquiry@singhanialogistics.in</a></li>
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
        <h2 class="h2 mb-12">Need help or have a data request?</h2>
        <p class="lead">
          We’re here to help. Write to <a href="mailto:enquiry@singhanialogistics.in">enquiry@singhanialogistics.in</a> with your request
          (access, correction, deletion, or consent withdrawal).
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
