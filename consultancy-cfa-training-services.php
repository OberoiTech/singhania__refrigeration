<?php
$cacheStart = __DIR__ . '/cache_start.php';
if (file_exists($cacheStart)) {
    include $cacheStart;
}
?>
<?php
/* -------- server-side insert (unchanged) -------- */
$color = " ";
$message = " ";
// include('admin/config.php');

// if (isset($_POST['submit'])) {
//     $name        = $_POST['name'];
//     $email       = $_POST['email'];
//     $mobile      = $_POST['phone'];
//     $company     = $_POST['subject'];
//     $description = $_POST['message'];

//     $insert = "INSERT INTO training(name,email,mobile,subject,description)
//               VALUES('$name','$email','$mobile','$company','$description')";
//     $data = mysqli_query($conn, $insert);

//     if ($data) {
//         echo "<script>alert('Success: Record Added Successfully');</script>";
//     } else {
//         echo "<script>alert('Error: Something Not Updated');</script>";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('head.php'); ?>

  <style>
    :root{ --brand:#0e2344; --ink:#0f2442; --muted:#6b7280; }

    /* ===== Full-width hero (matches About band) ===== */
    .cfa-hero{
      position:relative; width:100%;
      padding:48px 0 56px;
      background:
        radial-gradient(120% 160% at 8% -10%, #1a2b55 0%, rgba(26,43,85,0) 55%),
        radial-gradient(110% 140% at 95% -20%, #0f1a39 0%, rgba(15,26,57,0) 55%),
        linear-gradient(180deg, #0e1a37 0%, #0c1224 100%);
      overflow:hidden;
    }
    .cfa-hero .container{ position:relative; z-index:1; }

    .cfa-titlecard{
      max-width: 860px;
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.22);
      border-radius: 16px;
      padding: 22px 22px 24px;
      color: #e8eeff;
      box-shadow: 0 22px 60px rgba(0,0,0,.28);
    }
    .cfa-eyebrow{
      display:inline-block; font-size:12px; letter-spacing:.18em;
      text-transform:uppercase; color:#a9b7df; margin-bottom:4px;
    }
    .cfa-hero h1{
      margin:0 0 10px; font-weight:800; color:#fff;
      font-size: clamp(28px, 4.2vw, 40px);
    }
    .cfa-hero p{ margin:0; color:#cbd6ff; }

    /* ===== Page body (white) with subtle dots ===== */
    .cfa-section{ position:relative; background:#fff; padding:36px 0 80px; }
    .cfa-section::before{
      content:""; position:absolute; inset:0; pointer-events:none;
      background-image:
        radial-gradient(#cfd7ee 1px, transparent 1px),
        radial-gradient(#dfe5f6 1px, transparent 1px);
      background-size: 48px 48px, 64px 64px;
      background-position: 0 0, 12px 18px;
      opacity:.18;
    }

    /* Left content blocks */
    .block{ padding:18px 0; }
    .block + .block{ border-top:1px dashed #e6ecf5; }
    .block h2{
      margin:0 0 10px; color:var(--ink); font-size:20px; font-weight:800;
      display:flex; align-items:center; gap:8px;
    }
    .block .chip{
      font-size:14px; font-weight:800; letter-spacing:.14em; text-transform:uppercase;
      background:#e8eefc; border:1px solid #d9e3fb; color:#20335f;
      border-radius:999px; padding:4px 8px;
    }
    .block p{ margin:0 0 12px; color:#2f3e66; }
    .checklist{ list-style:none; padding:0; margin:0; display:grid; gap:8px; }
    .checklist li{ position:relative; padding-left:26px; color:#2c3c66; }
    .checklist li:before{
      content:""; position:absolute; left:0; top:6px; width:16px; height:16px; border-radius:50%;
      background: conic-gradient(from 180deg,#3b5bb7,#20356b);
      box-shadow: inset 0 0 0 3px #fff;
    }

    /* Right sticky form in brand navy */
    .enquiry-sticky{ position:sticky; top:92px; }
    .enquiry-card{
      background: linear-gradient(180deg, #132b5a, #0f1d43);
      border-radius:14px; border:1px solid rgba(255,255,255,.12);
      color:#eaf1ff; box-shadow:0 18px 44px rgba(0,0,0,.28);
    }
    .enquiry-card .wrap{ padding:20px; }
    .enquiry-card h4{ margin:0 0 6px; font-weight:800; color:#fff; }
    .enquiry-card .sub{ color:#cdd8ff; margin-bottom:14px; font-size:13px; }

    .enquiry-card input,
    .enquiry-card textarea{
      width:100%; border:1px solid rgba(255,255,255,.28);
      background:rgba(255,255,255,.08); color:#fff;
      border-radius:10px; padding:11px 12px; outline:0;
      transition: box-shadow .2s, border-color .2s, background .2s;
    }
    .enquiry-card textarea{ min-height:110px; resize:vertical; }
    .enquiry-card input::placeholder,
    .enquiry-card textarea::placeholder{ color:#c7d4ff; }
    .enquiry-card input:focus,
    .enquiry-card textarea:focus{
      border-color:#7ea2ff; box-shadow:0 0 0 3px rgba(126,162,255,.22);
      background:rgba(255,255,255,.14);
    }
    .btn-brand{
      display:inline-flex; align-items:center; justify-content:center;
      height:44px; padding:0 16px; border-radius:12px; border:0;
      background:#162e63; color:#fff; font-weight:700;
      box-shadow:0 10px 24px rgba(22,46,99,.34);
      transition: transform .1s, box-shadow .2s, background .2s;
    }
    .btn-brand:hover{ transform:translateY(-1px); background:#1e3a7b; }

    @media (max-width:991px){
      .enquiry-sticky{ position:static; top:auto; }
    }

    /* Simple accordion */
    .accordion{ border:1px solid #e6ecf5; border-radius:12px; overflow:hidden; background:#fff; }
    .ac-item + .ac-item{ border-top:1px solid #e6ecf5; }
    .ac-btn{
      width:100%; text-align:left; background:#fff; border:0; padding:14px 16px;
      display:flex; gap:10px; align-items:center; font-weight:700; color:var(--ink); cursor:pointer;
    }
    .ac-btn:focus{ outline:2px solid #d7e2ff; outline-offset:-2px; }
    .ac-btn .caret{ margin-left:auto; transition:transform .2s ease; }
    .ac-panel{ display:none; padding:0 16px 14px; color:#364873; }
    .ac-item.open .ac-panel{ display:block; }
    .ac-item.open .ac-btn .caret{ transform:rotate(180deg); }
  </style>
</head>

<body>
  <?php include('header.php'); ?>

  <!-- ===== Full-width hero band ===== -->
  <section class="cfa-hero">
    <div class="container">
      <div class="cfa-titlecard">
        <span class="cfa-eyebrow">CFA Training</span>
        <h1>Consultancy &amp; CFA Training Services</h1>
        <p>Job-ready CFA training for logistics &amp; distribution.</p>
        <p>Master warehousing, inventory, dispatch, documentation &amp; cold-chain with real case studies.</p>

      </div>
    </div>
  </section>

  <!-- ===== Main white section ===== -->
  <section class="cfa-section">
    <div class="container">
      <div class="row">
        <!-- LEFT: content -->
        <div class="col-lg-8">
          <!-- Program Description -->
          <div class="block">
            <h2><span class="chip">Overview</span> Get Job-Ready in Logistics &amp; Distribution</h2>
            <p>The supply chain industry and logistics is one of the fastest-growing sectors internationally offering immense career opportunities. To help you tap into this dynamic field we provide comprehensive CFA (Carrying & Forwarding) Training and consultancy services designed to equip you with practical knowledge, industry insights and job-ready skills also. Our courses focuses on end-to-end logistics operations including warehousing, inventory management, dispatch, documentation and cold-chain practices also, ensuring you gain hands-on expertise that is highly valued by employers.</p>
            <p>Through a combination of real-world case studies, interactive sessions and expert guidance, our CFA Training Program prepares you to face industry challenges with confidence and efficiency also. By the end of the course, you will be certified and well-versed in practical logistics operations and ready to unlock career opportunities in the supply chain and distribution sector also.</p>
          </div>

          <!-- Program Overview (expanded) -->
          <div class="block">
            <h2><span class="chip">Program Overview</span> Boost Your Career in Logistics with CFA Training</h2>
            <p>The CFA Training Program is meticulously designed to provide a complete understanding of logistics operations. Participants will gain insights into carrying and forwarding processes, warehouse management, inventory control and distribution practices also. The program also covers documentation standards, reverse logistics, cold-chain operations and regulatory compliance also, giving you a comprehensive understanding of supply chain management.</p>
            <p>Our expert-led sessions combine practical knowledge with theoretical understanding. Integrating real-life case studies from leading companies you will learn how to handle operational challenges, optimize resources and improve efficiency in warehousing and distribution also. This holistic approach ensures that you are not just learning concepts but also applying them practically.</p>
            <p>Participants will receive guidance on career advancement skill development and entrepreneurship opportunities in logistics also. The program emphasizes hands-on learning, preparing you to enter the workforce with confidence and competence.</p>
            <p><strong>Inquiry:</strong> Fill out the form to receive detailed information on course, fees and upcoming batches also.</p>
          </div>

        <!-- Benefits of the CFA Training -->
        <div class="block" id="cfa-benefits">
          <h2>
            <span class="chip">Benefits</span>
            Benefits of the CFA Training
          </h2>
        
          <h4>Why Choose Our Program?</h4>
          <p>Joining our CFA Training Program gives you access to multiple career-enhancing benefits:</p>
        
          <ul class="checklist">
            <li>
              <strong>Comprehensive Knowledge:</strong>
              Learn the complete spectrum of Carrying &amp; Forwarding operations, including warehousing, inventory management, and distribution.
            </li>
            <li>
              <strong>Practical Exposure:</strong>
              Work with real-world industry case studies to gain hands-on experience and problem-solving skills.
            </li>
            <li>
              <strong>Expert Guidance:</strong>
              Sessions are delivered by seasoned logistics professionals with decades of experience.
            </li>
            <li>
              <strong>Recognized Certification:</strong>
              Obtain a certificate that enhances your professional credibility and supports career growth.
            </li>
            <li>
              <strong>Skill Enhancement:</strong>
              Acquire expertise in warehouse management, inventory control, and supply-chain operations.
            </li>
            <li>
              <strong>Job-Ready Skills:</strong>
              Prepare for employment opportunities in logistics, distribution, and cold-chain management.
            </li>
          </ul>
        
          <p>
            By focusing on both theory and practical application, our program ensures participants are fully equipped to handle real-world logistics challenges efficiently.
          </p>
        </div>


          <!-- Training Modes -->
        <div class="block" id="training-modes">
          <h2><span class="chip">Modes</span> Flexible Learning Options</h2>
          <p>We understand every learner has unique needs. Choose a mode that fits your schedule and learning style—both options cover the full curriculum.</p>
        
          <ul class="checklist">
            <li>
              <strong>Online Training:</strong>
              Join live, interactive sessions from anywhere. Get access to recorded lectures, study materials, and expert support at your convenience—ideal for working professionals and flexible schedules.
            </li>
            <li>
              <strong>Offline Training:</strong>
              Experience classroom learning with hands-on exercises, practical exposure, and direct interaction with trainers for real-time problem solving.
            </li>
          </ul>
        
          <p>Students can select the mode that best matches their learning style and schedule, ensuring a seamless, outcome-focused learning experience.</p>
        </div>


          <!-- Eligibility -->
          <div class="block">
            <h2><span class="chip">Eligibility</span> Who Can Apply?</h2>
            <p>The CFA Training Program is open to graduates from any stream who wish to pursue a career in logistics and supply chain management also. No prior experience in logistics is required making it an excellent opportunity for fresh graduates, career switchers and professionals looking to enhance their skills.</p>
          </div>

          <!-- Course Outcomes -->
        <div class="block" id="course-outcomes">
          <h2><span class="chip">Outcomes</span> What You Will Gain</h2>
          <p>Participants completing the CFA Training Program will gain industry-ready knowledge, hands-on skills, and a recognized credential.</p>
        
          <ul class="checklist">
            <li>
              <strong>End-to-End Knowledge:</strong>
              Master all core aspects of Carrying &amp; Forwarding operations.
            </li>
            <li>
              <strong>Hands-On Experience:</strong>
              Build practical exposure across warehouse workflows, inventory control, and distribution.
            </li>
            <li>
              <strong>Cold-Chain Logistics:</strong>
              Understand temperature-controlled supply chains, handling perishables, and maintaining quality.
            </li>
            <li>
              <strong>Reverse Logistics &amp; Audits:</strong>
              Learn returns management, repackaging, compliance audits, and related processes.
            </li>
            <li>
              <strong>Documentation &amp; Barcoding:</strong>
              Get familiar with documentation procedures, barcode printing, and record management.
            </li>
            <li>
              <strong>Industry Insights:</strong>
              Learn from experts with 25+ years of logistics and supply-chain experience.
            </li>
            <li>
              <strong>Career Growth &amp; Certification:</strong>
              Earn a recognized certificate that improves employability and supports entrepreneurship.
            </li>
            <li>
              <strong>Internships &amp; Placement:</strong>
              Access real-world exposure and potential opportunities with leading logistics companies.
            </li>
          </ul>
        
          <p>
            This program develops the technical depth, confidence, and problem-solving abilities needed to excel in modern logistics and supply-chain roles.
          </p>
        </div>


          <!-- For Students -->
          <div class="block">
            <h2><span class="chip">For Students</span> Better Job Opportunities</h2>
            <p>The CFA Training Program opens the door to high-growth career opportunities in logistics, warehousing and supply chain management. Students completing this course become job-ready professionals with the technical expertise and practical exposure that top logistics companies seek. With the rapid expansion of e-commerce, retail and distribution networks, skilled CFA professionals are in high demand. Our program ensures that students secure better job opportunities in reputed logistics firms, manufacturing industries and 3PL companies also offering them an excellent start and long-term career stability in the supply chain sector.</p>
          </div>

          <!-- For Pros/Owners -->
          <div class="block">
            <h2><span class="chip">For Pros</span> Growth for Professionals &amp; Business Owners</h2>
            <p>For business owners, entrepreneurs and professionals already involved in logistics the CFA Training Program offers significant growth, operational efficiency and profitability advantages. It helps refine management strategies, improve resource utilization and enhance supply chain performance. By gaining in-depth knowledge of warehousing, inventory control and distribution systems also participants can reduce costs, minimize errors and scale their operations effectively also. This course empowers logistics business owners to stay competitive, adopt modern practices and achieve sustainable business growth in the rapidly logistics industry.</p>
          </div>

        <!-- Schedule & Pricing -->
        <div class="block" id="schedule-pricing">
          <h2><span class="chip">Schedule</span> Duration &amp; Pricing</h2>
        
          <p>
            <strong>Duration:</strong>
            The CFA Training Program is designed to be completed in <strong>6–8 weeks</strong>, blending live sessions, projects, and case studies for a comprehensive learning experience.
          </p>
        
          <p>
            <strong>Pricing:</strong>
            Fees vary based on the selected mode (<em>online</em> or <em>offline</em>) and batch schedule. Use the inquiry form to request the latest brochure with detailed pricing and batch information.
          </p>
        </div>
        
        <!-- Take the Next Step -->
        <div class="block" id="next-step">
          <h2><span class="chip">Next</span> Take the Next Step in Your Career</h2>
        
          <p>
            Whether you’re a fresh graduate entering the logistics sector or a professional aiming to upskill, our
            <strong>CFA Training Program</strong> equips you with the knowledge, practical experience, and certification needed to excel.
            With flexible training modes, hands-on learning, and expert guidance, you’ll be fully prepared to meet industry demands
            and seize opportunities in distribution and supply-chain management.
          </p>
        
          <p>
            <strong>Enquire now</strong> to receive complete details about the course structure, fees, and upcoming batches.
            Transform your career with professional training that makes you job-ready in logistics and distribution.
          </p>
        
          <!-- Optional CTA -->
          <p>
            <a href="#enquiry" class="btn-brand">Enquire Now</a>
          </p>
        </div>



          <!-- FAQ -->
          <div class="block">
            <h2><span class="chip">FAQ</span> Frequently Asked Questions</h2>
            <div class="accordion">
              <div class="ac-item open">
                <button class="ac-btn" type="button">1) What is the CFA Training Program? <span class="caret">▼</span></button>
                <div class="ac-panel">It’s a professional course focused on carrying &amp; forwarding operations, logistics, and cold-chain management—covering warehousing, inventory, dispatch, documentation, and compliance.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">2) Who can join this program? <span class="caret">▼</span></button>
                <div class="ac-panel">Graduates and professionals seeking careers in logistics, warehousing, or supply-chain management.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">3) What career options are available after training? <span class="caret">▼</span></button>
                <div class="ac-panel">Roles such as Warehouse Manager, Logistics Executive, Supply-Chain Analyst, Operations Executive/Manager, and more.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">4) What is the program duration? <span class="caret">▼</span></button>
                <div class="ac-panel">Typically <strong>6–8 weeks</strong>, including practical sessions and case studies.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">5) Is the training available online or offline? <span class="caret">▼</span></button>
                <div class="ac-panel">Yes—both. Online (live sessions + recordings) and offline (classroom practice) are available.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">6) Will I receive a certificate? <span class="caret">▼</span></button>
                <div class="ac-panel">Yes, a recognized completion certificate is provided after successful training.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">7) What practical exposure will I gain? <span class="caret">▼</span></button>
                <div class="ac-panel">Real case studies, warehouse operations, cold-chain documentation, audits, and process walkthroughs.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">8) Are internship or placement options available? <span class="caret">▼</span></button>
                <div class="ac-panel">Yes—internship and placement support with leading logistics and distribution companies.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">9) How can I apply for the program? <span class="caret">▼</span></button>
                <div class="ac-panel">Fill out the enquiry form on this page—our team will share the brochure, fees, and next batch details.</div>
              </div>

              <div class="ac-item">
                <button class="ac-btn" type="button">10) Why choose Singhania Refrigeration’s CFA Training? <span class="caret">▼</span></button>
                <div class="ac-panel">Our curriculum blends expert-led learning with 25+ years of industry experience, ensuring job-ready skills backed by real operational insights.</div>
              </div>
            </div>
          </div>

        </div>

        <!-- RIGHT: sticky enquiry form -->
        <div class="col-lg-4">
          <div class="enquiry-sticky">
            <div class="enquiry-card">
              <div class="wrap">
                <h4>Enquire for Syllabus &amp; Fees</h4>
                <div class="sub">We’ll email the brochure with batch dates.</div>

                <div id="form-messages"><?php echo $color; ?><?php echo $message; ?></div>

                <form method="post" action="#">
                  <div class="mb-2"><input type="text"   name="name"    placeholder="Full Name" required></div>
                  <div class="mb-2"><input type="email"  name="email"   placeholder="Email Address" required></div>
                  <div class="mb-2"><input type="text"   name="phone"   placeholder="Mobile Number" required></div>
                  <div class="mb-2"><input type="text"   name="subject" placeholder="Subject / Interest" required></div>
                  <div class="mb-3"><textarea name="message" placeholder="Your Message" required></textarea></div>
                  <input type="hidden" name="page_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                  <button type="submit" class="btn-brand" name="submit">Submit Now</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /row -->
    </div><!-- /container -->
  </section>

  <?php include('footer.php'); ?>

  <script>
    // Simple accordion
    document.addEventListener('DOMContentLoaded', function(){
      document.querySelectorAll('.accordion .ac-btn').forEach(function(btn){
        btn.addEventListener('click', function(){
          this.parentElement.classList.toggle('open');
        });
      });
    });
  </script>
  <script>
    document.querySelector("form").addEventListener("submit", function(e) {
        e.preventDefault();
    
        let form = this;
        let formData = new FormData(form);
    
        // IMPORTANT: phone → mobile mapping
        formData.append("mobile", formData.get("phone"));
    
        fetch("cfa_training_submit.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert("Enquiry Submitted Successfully");
                form.reset();
            } else {
                alert(data.msg);
            }
        })
        .catch(err => {
            alert("Something went wrong");
        });
    });
    </script>
  <?php
  $cacheEnd = __DIR__ . '/cache_end.php';
  if (file_exists($cacheEnd)) {
      include $cacheEnd;
  }
  ?>
</body>
</html>
