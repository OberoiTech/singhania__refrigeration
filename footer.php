<footer id="rs-footer" class="rs-footer footer-modern">
  <div class="container">
    <!-- Widgets -->
    <section class="footer-grid">
      <!-- About -->
      <div class="f-col" data-aos="fade-up" data-aos-delay="50">
        <div class="brand">
          <a href="index.php" class="brand-logo">
             <!-- <img src="assets/images/products/logoF.png" width="340" height="227" alt="Singhania Refrigeration"> -->
              <picture>
                <source srcset="assets/images/logoF.avif" type="image/avif">
                <img src="assets/images/logoF.png"
                      alt="Singhania Refrigeration and Supply Chain Consultancy"
                      class="site-logo-img"
                      width="220"
                      height="85"
                      decoding="async"
                      fetchpriority="high">
              </picture>
          </a>
          <p class="brand-copy">
             Singhania Refrigeration is a trusted Delhi NCR-based industrial refrigeration and cold
            storage solutions provider — cold rooms, CA/MA stores, ammonia/freon plants, ripening
            chambers, IQF systems, compressor racks, PUF panels, dock shelters and transport
            refrigeration — engineered for efficiency, safety and reliability across India.
          </p>
          <h4 class="follow-title">Follow Us</h4>
          <ul class="social-pills">
                <li><a class="social-facebook" href="https://www.facebook.com/profile.php?id=61579480251463" aria-label="Visit Singhania Refrigeration on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a class="social-x" href="https://x.com/SinghaniaR59102" aria-label="Visit Singhania Refrigeration on X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a></li>
                <li><a class="social-instagram" href="https://www.instagram.com/singhaniarefrigeration/" aria-label="Visit Singhania Refrigeration on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a class="social-linkedin" href="https://www.linkedin.com/company/singhania-refrigeration-and-supply-chain-consultancy/" aria-label="Visit Singhania Refrigeration on LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a class="social-youtube" href="https://www.youtube.com/channel/UC-g2bewulBb2oGjPGIDAaJA" aria-label="Visit Singhania Refrigeration on YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>

      <!-- Contact -->
      <div class="f-col" data-aos="fade-up" data-aos-delay="100">
        <h4 class="f-title">Contact</h4>
        <ul class="contact-list">
          <li>
            <span class="ico"><i class="fa fa-map-marker"></i></span>
            <span class="text"><?php echo $address; ?></span>
          </li>
          <li>
            <span class="ico"><i class="fa fa-phone"></i></span>
            <span class="text"><a href="tel:+91<?php echo $mobile; ?>">+91&nbsp;<?php echo $mobile; ?></a> / <a href="tel:+919718097170">+91-9718097170</a></span>
          </li>
          <li>
            <span class="ico"><i class="fa fa-envelope"></i></span>
            <span class="text"><a href="<?php echo htmlspecialchars($mailHref, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Email Singhania Refrigeration">Email Us</a></span>
          </li>
          <li>
            <span class="ico"><i class="fa fa-clock-o"></i></span>
            <span class="text">Mon–Fri: 9AM TO 6PM <?php echo $time; ?></span>
          </li>
        </ul>

      </div>

      <!-- Quick Links -->
      <div class="f-col" data-aos="fade-up" data-aos-delay="125">
        <h4 class="f-title mt-28">Quick Links</h4>
        <ul class="link-list">
          <!-- <li><a href="blog-details.php">Latest Posts</a></li> -->
          <li><a href="about-us.php">About Us</a></li>
          <li><a href="panels.php">PUF Panels</a></li>
          <li><a href="consulting.php">Consulting</a></li>
          <li><a href="cold-chain-refrigeration-ca-store-freon-ammonia.php" aria-label="Cold Storage Solutions: refrigeration, CA store, Freon and ammonia systems">Cold Storage Solutions</a></li>
          <li><a href="blog.php">Blogs</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>

      <!-- Latest Posts -->
      <div class="f-col" data-aos="fade-up" data-aos-delay="150">
        <h4 class="f-title">Latest Posts</h4>
        <div class="post-stack">
          <?php
            $footerBlogs = mysqli_query($conn, "SELECT id, image, title, created_at FROM blogs ORDER BY created_at DESC LIMIT 3");
            if ($footerBlogs && mysqli_num_rows($footerBlogs) > 0):
              while ($fb = mysqli_fetch_assoc($footerBlogs)):
                $fbImg  = !empty($fb['image']) ? 'admin/uploads/' . $fb['image'] : 'assets/images/blog/small/1.jpg';
                $fbDate = !empty($fb['created_at']) ? date('M d, Y', strtotime($fb['created_at'])) : '';
          ?>
          <article class="post-mini">
            <a class="thumb" href="blog-details.php?id=<?php echo (int)$fb['id']; ?>">
              <?php $fbWebp = function_exists('sr_webp_path') ? sr_webp_path($fbImg) : ''; ?>
              <?php if ($fbWebp !== ''): ?><picture><source srcset="<?php echo htmlspecialchars($fbWebp, ENT_QUOTES); ?>" type="image/webp"><?php endif; ?>
              <img src="<?php echo htmlspecialchars($fbImg, ENT_QUOTES); ?>"<?php echo function_exists('sr_image_size_attrs') ? sr_image_size_attrs(function_exists('sr_preferred_image_path') ? sr_preferred_image_path($fbImg) : $fbImg) : ''; ?> alt="<?php echo htmlspecialchars($fb['title']); ?>">
              <?php if ($fbWebp !== ''): ?></picture><?php endif; ?>
            </a>
            <div class="meta">
              <a class="title" href="blog-details.php?id=<?php echo (int)$fb['id']; ?>">
                <?php echo htmlspecialchars($fb['title']); ?>
              </a>
              <div class="date"><i class="fa fa-calendar"></i> <?php echo $fbDate; ?></div>
            </div>
          </article>
          <?php endwhile; else: ?>
          <p class="muted">No posts yet — <a href="blog.php">visit our blog</a>.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Bottom -->
    <div class="footer-bottom">
      <p><span class="footer-secure-icon"><i class="fa fa-shield"></i></span><span>© <?php echo date('Y'); ?> Singhania Refrigeration.<br>All Rights Reserved.</span></p>
      <ul class="bottom-links">
        <li><a href="privacy-policy.php">Privacy</a></li>
        <li><a href="terms.php">Terms</a></li>
        <li><a href="contact.php">Support</a></li>
      </ul>
    </div>
  </div>
</footer>


        <!-- Footer End -->

      <!-- start scrollUp  -->
      <div id="scrollUp">
          <i class="fa fa-angle-up"></i>
      </div>
      <!-- End scrollUp  -->

      <!-- Search Modal Start -->
      <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fa fa-times"></i></span>
          </button>
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="search-block clearfix">
                      <form>
                          <div class="form-group">
                              <input class="form-control" placeholder="Search Here..." type="text" required="">
                              <button type="submit"><i class="fa fa-search"></i></button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- Search Modal End -->
         

        <?php
          if (!function_exists('sr_asset_url')) {
            function sr_asset_url($path) {
              $path = ltrim((string)$path, '/');
              $basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
              $basePath = ($basePath === '/' || $basePath === '.') ? '' : rtrim($basePath, '/');
              $absolutePath = __DIR__ . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $path);
              $version = is_file($absolutePath) ? '?v=' . filemtime($absolutePath) : '';
              return $basePath . '/' . $path . $version;
            }
          }
        ?>
        <!-- modernizr js -->
        <script src="<?php echo sr_asset_url('assets/js/modernizr-2.8.3.min.js'); ?>"></script>
        <!-- jquery latest version -->
        <script src="<?php echo sr_asset_url('assets/js/jquery.min.js'); ?>"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="<?php echo sr_asset_url('assets/js/bootstrap.min.js'); ?>"></script>
        <!-- Menu js -->
        <script src="<?php echo sr_asset_url('assets/js/rsmenu-main.js'); ?>"></script> 
        <!-- op nav js -->
        <script src="<?php echo sr_asset_url('assets/js/jquery.nav.js'); ?>"></script>
        <!-- owl.carousel js -->
        <script src="<?php echo sr_asset_url('assets/js/owl.carousel.min.js'); ?>"></script>
        <!-- Slick js -->
        <!-- Homepage unused: <script src="assets/js/slick.min.js"></script> -->
        <!-- isotope.pkgd.min js -->
        <!-- Homepage unused: <script src="assets/js/isotope.pkgd.min.js"></script> -->
        <!-- imagesloaded.pkgd.min js -->
        <!-- Homepage unused: <script src="assets/js/imagesloaded.pkgd.min.js"></script> -->
        <!-- wow js -->
        <!-- Homepage unused: <script src="assets/js/wow.min.js"></script> -->
        <!-- aos js -->
        <script src="<?php echo sr_asset_url('assets/js/aos.js'); ?>"></script>
        <!-- Skill bar js -->
        <!-- Homepage unused: <script src="assets/js/skill.bars.jquery.js"></script> -->
        <!-- Homepage unused: <script src="assets/js/jquery.counterup.min.js"></script> -->
         <!-- counter top js -->
        <!-- Homepage unused: <script src="assets/js/waypoints.min.js"></script> -->
        <!-- video js -->
        <!-- Homepage unused: <script src="assets/js/jquery.mb.YTPlayer.min.js"></script> -->
        <!-- magnific popup js -->
        <!-- Homepage unused: <script src="assets/js/jquery.magnific-popup.min.js"></script> -->
        <!-- Nivo slider js -->
        <script src="<?php echo sr_asset_url('assets/inc/custom-slider/js/jquery.nivo.slider.js'); ?>"></script>
        <!-- plugins js -->
        <script src="<?php echo sr_asset_url('assets/js/plugins.js'); ?>"></script>
        <!-- contact form js -->
        <script src="<?php echo sr_asset_url('assets/js/contact.form.js'); ?>"></script>
        <!-- main js -->
        <script src="<?php echo sr_asset_url('assets/js/main.js'); ?>"></script>

        <style>
          /* ===== Modern Footer ===== */
:root{
  --footer-bg: #0c1224;
  --footer-bg-2: #0a1020;
  --footer-card: rgba(255,255,255,0.06);
  --footer-line: rgba(255,255,255,0.12);
  --footer-text: #cfd6e6;
  --footer-muted: #9aa5bf;
  --footer-white: #ffffff;
  --accent: #152650;            /* matches your brand navy */
  --accent-2: #1f3b86;          /* brighter on hover */
}

.footer-modern{
  position: relative;
  color: var(--footer-text);
  background:
    radial-gradient(90% 140% at 0% 0%, #17203b 0%, transparent 55%),
    radial-gradient(80% 120% at 100% 0%, #0f1a39 0%, transparent 50%),
    linear-gradient(180deg, var(--footer-bg) 0%, var(--footer-bg-2) 100%);
  padding-top: 48px;
}

.footer-modern .container{ position: relative; z-index: 1; }

/* Keep footer content visible even if AOS scroll state is delayed */
.footer-modern [data-aos]{
  opacity: 1 !important;
  transform: none !important;
}

/* Newsletter "glass" card */
.nl-card{
  display: grid;
  grid-template-columns: 1.2fr 1fr;
  gap: 24px;
  align-items: center;
  padding: 24px clamp(16px, 3vw, 28px);
  margin-bottom: 36px;
  border-radius: 14px;
  background: linear-gradient(180deg, rgba(255,255,255,0.06), rgba(255,255,255,0.04));
  border: 1px solid var(--footer-card);
  box-shadow: 0 10px 24px rgba(0,0,0,0.25);
}
.nl-title{
  color: var(--footer-white);
  margin: 0 0 4px;
  font-size: clamp(20px, 2.2vw, 28px);
  font-weight: 700;
  letter-spacing: .2px;
}
.nl-sub{ margin: 0; color: var(--footer-muted); }
.nl-form{ display: flex; flex-direction: column; align-items: flex-end; gap: 6px; }
.nl-input-wrap{
  width: 100%;
  display: grid;
  grid-template-columns: 1fr auto;
  background: rgba(255,255,255,0.08);
  border: 1px solid var(--footer-card);
  border-radius: 12px;
  overflow: hidden;
}
.nl-input-wrap input{
  background: transparent;
  border: 0;
  color: var(--footer-white);
  padding: 14px 14px;
  outline: none;
}
.nl-input-wrap input::placeholder{ color: #b8c2da; }
.nl-btn{
  border: 0;
  background: var(--accent);
  color: #fff;
  padding: 0 18px;
  display: inline-flex; align-items:center; justify-content:center;
  cursor: pointer;
  transition: background .22s ease, transform .12s ease;
}
.nl-btn:hover{ background: var(--accent-2); transform: translateY(-1px); }
.nl-note{ color: var(--footer-muted); }

/* Grid columns */
.footer-grid{
  display: grid;
  grid-template-columns: 1.2fr 1fr 1fr;
  gap: clamp(20px, 3vw, 36px);
  padding: 26px 0 18px;
  border-top: 1px dashed var(--footer-line);
  border-bottom: 1px dashed var(--footer-line);
}

/* Brand column */
.brand-logo img{
  height: 112px; width: auto; display: block;
  filter: drop-shadow(0 4px 14px rgba(0,0,0,.35));
  margin-bottom: 10px;
}
.brand-copy{ color: var(--footer-text); line-height: 1.7; margin-bottom: 14px; text-align: justify; }
.btn-ghost{
  display:inline-block;
  padding: 10px 14px;
  border-radius:10px;
  border:1px solid var(--footer-card);
  background: transparent;
  color:#fff; text-decoration:none; font-weight:600;
  transition: background .22s ease, transform .12s ease, border-color .22s ease;
}
.btn-ghost:hover{ background: rgba(255,255,255,0.06); transform: translateY(-1px); border-color: rgba(255,255,255,0.24); }

.social-pills{ display:flex; gap:10px; margin:14px 0 0; padding:0; list-style:none; }
.social-pills a{
  width:38px; height:38px; border-radius:999px;
  display:grid; place-items:center;
  color:#fff; background: rgba(255,255,255,0.08);
  border:1px solid var(--footer-card); transition: transform .12s ease, background .22s ease;
}
.social-pills a:hover{ background: var(--accent); transform: translateY(-1px); }

/* Contact */
.f-title{
  color: #fff; font-size: 16px; text-transform: uppercase; letter-spacing:.6px; margin: 2px 0 14px;
}
.contact-list{ list-style:none; padding:0; margin:0; display:grid; gap:12px; }
.contact-list .ico{
  width:28px; height:28px; display:inline-grid; place-items:center;
  background: rgba(255,255,255,0.08); border:1px solid var(--footer-card); border-radius:8px; margin-right:10px;
}
.contact-list .text a{ color: var(--footer-text); text-decoration:none; }
.contact-list .text a:hover{ color:#fff; }

.mt-28{ margin-top: 28px; }

.link-list{ list-style:none; padding:0; margin:0; display:grid; gap:8px; }
.link-list a{
  position:relative; color: var(--footer-text); text-decoration:none; padding-left:16px;
}
.link-list a::before{
  content:"›"; position:absolute; left:0; top:0; color: var(--footer-muted);
}
.link-list a:hover{ color:#fff; }

/* Posts */
.post-stack{ display:grid; gap:12px; }
.post-mini{ display:grid; grid-template-columns: 68px 1fr; gap:10px; align-items:center; }
.post-mini .thumb{
  display:block; border-radius:10px; overflow:hidden; border:1px solid var(--footer-card);
}
.post-mini .thumb img{ width:100%; height:56px; object-fit:cover; display:block; }
.post-mini .title{ color:#fff; line-height:1.35; text-decoration:none; display:inline-block; }
.post-mini .title:hover{ text-decoration:underline; }
.post-mini .date{ color: var(--footer-muted); font-size:12px; margin-top:4px; }

/* Bottom strip */
.footer-modern .footer-bottom{
  display:flex; justify-content:space-between; align-items:center;
  gap: 16px;
  padding: 18px 0 24px;
}
.footer-modern .footer-bottom p{ margin:0; color: var(--footer-muted); }
.bottom-links{ display:flex; gap:16px; list-style:none; margin:0; padding:0; }
.bottom-links a{ color: var(--footer-text); text-decoration:none; }
.bottom-links a:hover{ color:#fff; }

/* Responsive */
@media (max-width: 991px){
  .nl-card{ grid-template-columns: 1fr; }
  .nl-form{ align-items:flex-start; }
  .footer-grid{ grid-template-columns: 1fr 1fr; }
}
@media (max-width: 575px){
  .footer-grid{ grid-template-columns: 1fr; }
  .footer-modern{ padding-top: 40px; }
}

/* ===== Screenshot-style footer override ===== */
.footer-modern{
  padding:0;
  background:
    radial-gradient(80% 95% at 50% 0%, rgba(12,54,103,.38), transparent 54%),
    linear-gradient(180deg,#020b16 0%,#031021 100%);
}
.footer-modern .container{
  max-width:100%;
  width:100%;
  padding:0;
  border:0;
  border-radius:0;
  overflow:hidden;
  background:
    radial-gradient(90% 120% at 50% 0%, rgba(12,63,121,.25), transparent 58%),
    linear-gradient(180deg,rgba(5,23,49,.96) 0%,rgba(3,15,33,.98) 100%);
  box-shadow:inset 0 1px 0 rgba(190,210,238,.18), inset 0 -1px 0 rgba(190,210,238,.12);
}
.footer-grid{
  grid-template-columns:minmax(260px,1.08fr) minmax(250px,1fr) minmax(220px,.86fr) minmax(300px,1.2fr);
  gap:0;
  max-width:1540px;
  margin:0 auto;
  padding:42px clamp(20px,3vw,42px) 38px;
  border:0;
  border-bottom:1px solid rgba(190,210,238,.22);
}
.footer-grid .f-col{
  padding:0 clamp(18px,2.1vw,30px);
  border-left:1px solid rgba(190,210,238,.18);
}
.footer-grid .f-col:first-child{
  border-left:0;
  padding-left:18px;
}
.footer-grid .f-col:last-child{
  padding-right:18px;
}
.brand-logo{
  display:block;
  width:max-content;
  margin:0 auto 18px;
}
.brand-logo img{
  width:220px;
  height:auto;
  max-height:150px;
  object-fit:contain;
  margin:0;
  filter:drop-shadow(0 10px 24px rgba(26,116,219,.24));
}
.brand-copy{
  color:#d7e2f4;
  font-size:15px;
  line-height:1.65;
  margin:0 0 18px;
}
.btn-ghost{
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:10px 18px;
  border-radius:999px;
  border:1px solid #1e90ff;
  color:#fff;
  font-size:15px;
  font-weight:800;
}
.btn-ghost::after{
  content:"\f105";
  font-family:FontAwesome;
  color:#1e90ff;
}
.follow-title{
  margin:22px 0 10px;
  color:#fff;
  font-size:16px;
  font-weight:700;
}
.social-pills{
  gap:14px;
  margin-top:0;
}
.social-pills a{
  width:38px;
  height:38px;
  border-color:rgba(190,210,238,.34);
  background:rgba(255,255,255,.035);
  font-size:15px;
}
.social-pills a:hover{
  background:#0b4d8f;
  border-color:#3ca0ff;
}
.social-pills a.social-facebook:hover{
  background:#1877f2;
  border-color:#1877f2;
}
.social-pills a.social-x:hover{
  background:#000;
  border-color:#fff;
}
.social-pills a.social-instagram:hover{
  background:#e4405f;
  border-color:#e4405f;
}
.social-pills a.social-linkedin:hover{
  background:#0a66c2;
  border-color:#0a66c2;
}
.social-pills a.social-youtube:hover{
  background:#ff0000;
  border-color:#ff0000;
}
.f-title{
  position:relative;
  margin:0 0 32px;
  color:#fff;
  font-size:19px;
  line-height:1;
  font-weight:900;
  letter-spacing:0;
}
.f-title::after{
  content:"";
  position:absolute;
  left:0;
  bottom:-16px;
  width:40px;
  height:3px;
  border-radius:999px;
  background:#1598ff;
}
.mt-28{
  margin-top:0;
}
.contact-list{
  gap:0;
}
.contact-list li{
  display:grid;
  grid-template-columns:44px minmax(0,1fr);
  gap:16px;
  align-items:center;
  padding:0 0 20px;
  margin-bottom:20px;
  border-bottom:1px solid rgba(190,210,238,.18);
}
.contact-list li:last-child{
  margin-bottom:0;
  border-bottom:0;
}
.contact-list .ico{
  width:44px;
  height:44px;
  margin:0;
  border:0;
  border-radius:12px;
  background:linear-gradient(145deg,rgba(28,117,212,.48),rgba(15,50,101,.7));
  color:#7fc1ff;
  font-size:18px;
}
.contact-list .text,
.contact-list .text a{
  color:#dbe6f8;
  font-size:15px;
  line-height:1.5;
}
.link-list{
  gap:0;
}
.link-list li{
  border-bottom:1px dashed rgba(190,210,238,.17);
}
.link-list li:last-child{
  border-bottom:0;
}
.link-list a{
  display:flex;
  align-items:center;
  min-height:42px;
  padding:9px 0 9px 28px;
  margin:0;
  color:#dbe6f8;
  font-size:15px;
  line-height:1.35;
  transition:color .18s ease, transform .18s ease;
}
.link-list a::before{
  content:"\f105";
  top:50%;
  transform:translateY(-50%);
  font-family:FontAwesome;
  color:#1e9bff;
  font-size:18px;
  line-height:1;
}
.link-list a:hover{transform:translateX(4px);}
.post-stack{
  gap:0;
}
.post-mini{
  grid-template-columns:82px minmax(0,1fr);
  gap:16px;
  align-items:start;
  padding-bottom:20px;
  margin-bottom:20px;
  border-bottom:1px solid rgba(190,210,238,.18);
}
.post-mini:last-child{
  margin-bottom:0;
  border-bottom:0;
}
.post-mini .thumb{
  border:0;
  border-radius:12px;
}
.post-mini .thumb img{
  width:82px;
  height:68px;
  object-fit:cover;
}
.post-mini .title{
  color:#fff;
  font-size:16px;
  line-height:1.4;
  font-weight:800;
}
.post-mini .date{
  margin-top:9px;
  color:#aebbd1;
  font-size:13px;
}
.post-mini .date i{
  color:#168ff0;
  margin-right:7px;
}
.footer-modern .footer-bottom{
  max-width:1540px;
  margin:0 auto;
  padding:20px clamp(20px,3vw,42px);
}
.footer-modern .footer-bottom p{
  display:flex;
  align-items:center;
  gap:14px;
  color:#dbe6f8;
  font-size:15px;
  line-height:1.4;
}
.footer-secure-icon{
  display:grid;
  place-items:center;
  width:42px;
  height:42px;
  border-radius:50%;
  background:linear-gradient(145deg,rgba(28,117,212,.55),rgba(15,50,101,.72));
  color:#5fb6ff;
}
.bottom-links{
  gap:0;
}
.bottom-links li{
  padding:0 22px;
  border-left:1px solid rgba(190,210,238,.22);
}
.bottom-links li:first-child{
  border-left:0;
}
.bottom-links a{
  color:#fff;
  font-size:15px;
}
.footer-modern a:focus-visible{
  outline:2px solid #3ca0ff;
  outline-offset:4px;
  border-radius:8px;
}
@media (max-width:1199px){
  .footer-modern .container{max-width:100%;}
  .footer-grid{grid-template-columns:1fr 1fr; row-gap:30px; max-width:100%;}
  .footer-grid .f-col:nth-child(odd){border-left:0;}
  .footer-grid .f-col:nth-child(n+3){padding-top:28px; border-top:1px solid rgba(190,210,238,.18);}
}
@media (max-width:767px){
  .footer-modern{padding:0;}
  .footer-modern .container{max-width:100%; border-radius:0;}
  .footer-grid{grid-template-columns:1fr; padding:28px 18px;}
  .footer-grid .f-col{border-left:0; padding:0;}
  .footer-grid .f-col + .f-col{padding-top:26px; border-top:1px solid rgba(190,210,238,.18);}
  .footer-modern .footer-bottom{flex-direction:column; align-items:flex-start; padding:20px 18px;}
  .bottom-links{flex-wrap:wrap;}
  .bottom-links li{padding:0 18px 0 0; border-left:0;}
  .brand-logo{margin-left:0;}
  .brand-logo img{width:185px;}
  .contact-list li{grid-template-columns:46px minmax(0,1fr); gap:15px;}
  .contact-list .ico{width:46px; height:46px;}
  .post-mini{grid-template-columns:88px minmax(0,1fr); gap:16px;}
  .post-mini .thumb img{width:88px; height:76px;}
  .post-mini .title{font-size:16px;}
}

        </style>
        
        <script>
  (function () {
    // Hover intent for desktop dropdowns (with small delay)
    var items = document.querySelectorAll('.rs-menu .nav-menu > li.menu-item-has-children');
    var timers = new WeakMap();

    function open(li){ li.classList.add('open'); }
    function close(li){ li.classList.remove('open'); }

    items.forEach(function(li){
      li.addEventListener('mouseenter', function(){
        clearTimeout(timers.get(li));
        timers.set(li, setTimeout(function(){ open(li); }, 110));
      });
      li.addEventListener('mouseleave', function(){
        clearTimeout(timers.get(li));
        timers.set(li, setTimeout(function(){ close(li); }, 140));
      });
      // Touch/click support
      li.querySelector('a').addEventListener('click', function(e){
        if (window.innerWidth > 991 && li.classList.contains('menu-item-has-children')) {
          if (!li.classList.contains('open')) {
            e.preventDefault();
            open(li);
          }
        }
      });
    });

    // Prevent layout "jump" when header becomes sticky:
    var menu = document.querySelector('.full-width-header .rs-header .menu-area');
    if (menu) {
      var spacer = document.createElement('div');
      var lastSticky = false;

      function tick(){
        var isSticky = menu.classList.contains('sticky');
        if (isSticky !== lastSticky){
          lastSticky = isSticky;
          if (isSticky){
            spacer.style.height = menu.offsetHeight + 'px';
            menu.parentNode.insertBefore(spacer, menu.nextSibling);
          } else if (spacer.parentNode){
            spacer.parentNode.removeChild(spacer);
          }
        }
        requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
    }
  })();
</script>
<?php include('whatsapp-float.php'); ?>

