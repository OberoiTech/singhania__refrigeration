<footer id="rs-footer" class="rs-footer footer-modern">
  <div class="container">
    <!-- Newsletter -->
    <section class="nl-card" data-aos="fade-up">
      <div class="nl-left">
        <h3 class="nl-title">Subscribe to our Newsletter</h3>
        <p class="nl-sub">Insights on cold chain, energy savings, and new projects—1–2 emails/month.</p>
      </div>
      <form class="nl-form" method="post" action="newsletter-subscribe.php">
        <div class="nl-input-wrap">
          <input type="email" name="email" placeholder="Your email address" required>
          <button type="submit" class="nl-btn" aria-label="Subscribe">
            <i class="fa fa-paper-plane"></i>
          </button>
        </div>
        <small class="nl-note">No spam. Unsubscribe anytime.</small>
      </form>
    </section>

    <!-- Widgets -->
    <section class="footer-grid">
      <!-- About -->
      <div class="f-col" data-aos="fade-up" data-aos-delay="50">
        <div class="brand">
          <a href="index.php" class="brand-logo">
            <picture><source srcset="assets/images/logo1.webp" type="image/webp"><img src="assets/images/logo1.png" width="248" height="172" alt="Singhania Refrigeration"></picture>
          </a>
          <p class="brand-copy">
             Singhania Refrigeration is a trusted Delhi NCR-based industrial refrigeration and cold
            storage solutions provider — cold rooms, CA/MA stores, ammonia/freon plants, ripening
            chambers, IQF systems, compressor racks, PUF panels, dock shelters and transport
            refrigeration — engineered for efficiency, safety and reliability across India.
          </p>
          <a class="btn-ghost" href="about-us.php">About Us</a>
          <ul class="social-pills">
                <li><a href="https://www.facebook.com/profile.php?id=61579480251463" aria-label="Visit Singhania Refrigeration on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://x.com/SinghaniaR59102" aria-label="Visit Singhania Refrigeration on X"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/singhaniarefrigeration/" aria-label="Visit Singhania Refrigeration on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://www.linkedin.com/company/singhania-refrigeration-and-supply-chain-consultancy/" aria-label="Visit Singhania Refrigeration on LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UC-g2bewulBb2oGjPGIDAaJA" aria-label="Visit Singhania Refrigeration on YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
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
            <span class="text"><a href="<?php echo htmlspecialchars($mailHref, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></a></span>
          </li>
          <li>
            <span class="ico"><i class="fa fa-clock-o"></i></span>
            <span class="text">Mon–Fri: <?php echo $time; ?></span>
          </li>
        </ul>

        <h4 class="f-title mt-28">Quick Links</h4>
        <ul class="link-list">
          <!-- <li><a href="blog-details.php">Latest Posts</a></li> -->
          <li><a href="consulting.php">Consulting</a></li>
          <li><a href="turnkey-solution.php">Turnkey Solutions</a></li>
          <li><a href="transport-refrigeration.php">Transport Refrigeration</a></li>
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
      <p>© <?php echo date('Y'); ?> Singhania Refrigeration. All Rights Reserved.</p>
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
         

        <!-- modernizr js -->
        <script src="assets/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="assets/js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="assets/js/jquery.nav.js"></script>
        <!-- owl.carousel js -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Slick js -->
        <!-- Homepage unused: <script src="assets/js/slick.min.js"></script> -->
        <!-- isotope.pkgd.min js -->
        <!-- Homepage unused: <script src="assets/js/isotope.pkgd.min.js"></script> -->
        <!-- imagesloaded.pkgd.min js -->
        <!-- Homepage unused: <script src="assets/js/imagesloaded.pkgd.min.js"></script> -->
        <!-- wow js -->
        <!-- Homepage unused: <script src="assets/js/wow.min.js"></script> -->
        <!-- aos js -->
        <script src="assets/js/aos.js"></script>
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
        <script src="assets/inc/custom-slider/js/jquery.nivo.slider.js"></script>
        <!-- plugins js -->
        <script src="assets/js/plugins.js"></script>
        <!-- contact form js -->
        <script src="assets/js/contact.form.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>

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
  height: 86px; width: auto; display: block;
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

