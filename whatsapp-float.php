<?php
/** whatsapp-float.php */

$waRaw      = isset($mobile) && $mobile ? $mobile : '9971060822';
$waDigits   = preg_replace('/\D+/', '', $waRaw);
$waDigits   = strlen($waDigits) === 10 ? '91' . $waDigits : $waDigits;
$callHref   = '+'.$waDigits;
$brandName  = 'Singhania Refrigeration';
?>
<style>
  .floating-contact-stack {
    position: fixed;
    left: 18px;
    bottom: 70px;
    z-index: 1035;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
  }

  .floating-contact-options {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transform: translateY(14px) scale(.96);
    transform-origin: left bottom;
    transition: opacity .2s ease, transform .2s ease, visibility .2s ease;
  }

  .floating-contact-stack.is-open .floating-contact-options {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: none;
  }

  .floating-contact-choice {
    display: flex;
    align-items: center;
    gap: 9px;
  }

  .call-float {
    position: relative;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #0e2344;
    color: #fff;
    text-decoration: none;
    box-shadow: 0 10px 24px rgba(0,0,0,.25);
    transition: transform .12s ease, box-shadow .2s ease, background .2s ease;
  }

  .call-float:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 30px rgba(0,0,0,.30);
    background: #0a1830;
    color: #fff;
    text-decoration: none;
  }

  .call-float i {
    font-size: 22px;
    line-height: 1;
  }

  .wa-float {
    position: relative;
    width: 56px; height: 56px; border-radius: 50%;
    display:flex; align-items:center; justify-content:center;
    background:#25D366; color:#fff; z-index: 1035;
    box-shadow: 0 10px 24px rgba(0,0,0,.25);
    transition: transform .12s ease, box-shadow .2s ease, background .2s ease;
    text-decoration:none; outline:0;
  }
  .wa-float:hover {
    transform: translateY(-2px);
    box-shadow:0 14px 30px rgba(0,0,0,.30);
    background:#1ebe5c;
  }
  .wa-float svg { width: 28px; height: 28px; display:block; }

  .contact-float-toggle {
    width: 68px;
    height: 68px;
    padding: 0;
    border: 0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background:linear-gradient(135deg,#0066ff,#0036d9);
    color: #fff;
    cursor: pointer;
     bottom:12px;
    right:25px;
    z-index:99999;
    box-shadow: 0 10px 24px rgba(0,0,0,.25);
    transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
  }
  .contact-float-toggle:hover {
    transform: translateY(-2px);
    background:linear-gradient(135deg,#0066ff,#0036d9);
    box-shadow: 0 14px 30px rgba(0,0,0,.3);
  }
  .contact-float-toggle i { font-size: 24px; }
  .contact-float-toggle .contact-close-icon { display: none; }
  .floating-contact-stack.is-open .contact-float-toggle .contact-chat-icon { display: none; }
  .floating-contact-stack.is-open .contact-float-toggle .contact-close-icon { display: inline-block; }

  .wa-float-badge{
    position: static;
    background: #0e2344; color:#fff; font-weight:700; font-size:12px;
    padding:7px 10px; border-radius:10px; box-shadow:0 10px 22px rgba(14,35,68,.25);
    white-space:nowrap;
  }

  .call-float-badge{
    position: static;
    background: #0e2344; color:#fff; font-weight:700; font-size:12px;
    padding:7px 10px; border-radius:10px; box-shadow:0 10px 22px rgba(14,35,68,.25);
    white-space:nowrap;
  }

  @media (max-width: 575.98px){
    .floating-contact-stack{
      left: 14px;
      bottom: 70px;
      gap: 8px;
    }
    .wa-float{
      width:54px; height:54px;
    }
    .call-float{
      width:54px; height:54px;
    }
    .contact-float-toggle{ width:56px; height:56px; }
    .call-float i{
      font-size: 20px;
    }
    .wa-float-badge{
      font-size:11px;
    }
    .call-float-badge{
      font-size:11px;
    }
  }
</style>

<div class="floating-contact-stack" id="floatingContactStack">
  <div class="floating-contact-options" id="floatingContactOptions">
    <div class="floating-contact-choice">
      <a id="callFloatBtn" class="call-float"
         href="tel:<?php echo htmlspecialchars($callHref, ENT_QUOTES); ?>"
         aria-label="Call now on <?php echo htmlspecialchars($waRaw, ENT_QUOTES); ?>" title="Call Now">
        <i class="fa fa-phone" aria-hidden="true"></i>
      </a>
      <div class="call-float-badge">Call Now</div>
    </div>

    <div class="floating-contact-choice">
      <a id="waFloatBtn" class="wa-float"
         href="https://wa.me/<?php echo htmlspecialchars($waDigits, ENT_QUOTES); ?>"
         target="_blank" rel="noopener"
         aria-label="Chat on WhatsApp with <?php echo htmlspecialchars($brandName,ENT_QUOTES); ?>" title="Chat on WhatsApp">
        <svg viewBox="0 0 32 32" aria-hidden="true" focusable="false">
          <path fill="currentColor" d="M19.11 17.49c-.29-.15-1.7-.84-1.96-.94-.26-.1-.45-.15-.64.15-.19.29-.74.93-.9 1.12-.17.19-.33.22-.62.08-.29-.15-1.23-.45-2.34-1.43-.86-.77-1.44-1.72-1.6-2.01-.17-.29-.02-.45.13-.6.13-.13.29-.33.45-.49.15-.17.2-.29.29-.48.1-.19.05-.36-.02-.51-.08-.15-.64-1.55-.88-2.13-.23-.56-.47-.49-.64-.5h-.55c-.19 0-.5.07-.76.36-.26.29-1 1-1 2.43s1.02 2.82 1.16 3.02c.15.19 2 3.03 4.84 4.26.68.29 1.21.46 1.62.59.68.22 1.31.19 1.8.12.55-.08 1.7-.69 1.95-1.35.24-.66.24-1.22.17-1.34-.06-.12-.24-.2-.53-.34zM16.02 3C9.38 3 4 8.37 4 15c0 2.53.84 4.86 2.26 6.76L5 29l7.4-1.94c1.82 1 3.91 1.58 6.12 1.58 6.63 0 12-5.37 12-12S22.65 3 16.02 3zm0 21.9c-2.06 0-3.98-.62-5.57-1.68l-.4-.25-4.28 1.12 1.14-4.17-.27-.43A9.92 9.92 0 0 1 6.1 15c0-5.47 4.45-9.9 9.92-9.9 5.47 0 9.92 4.43 9.92 9.9s-4.45 9.9-9.92 9.9z"/>
        </svg>
      </a>
      <div class="wa-float-badge">Chat on WhatsApp</div>
    </div>
  </div>

  <button type="button" class="contact-float-toggle" id="contactFloatToggle"
          aria-label="Open contact options" aria-expanded="false" aria-controls="floatingContactOptions">
    <i class="fa fa-comments contact-chat-icon" aria-hidden="true"></i>
    <i class="fa fa-times contact-close-icon" aria-hidden="true"></i>
  </button>
</div>

<script>
(function(){
  var btn  = document.getElementById('waFloatBtn');
  var call = document.getElementById('callFloatBtn');
  var stack = document.getElementById('floatingContactStack');
  var toggle = document.getElementById('contactFloatToggle');
  var msg  = "Hi <?php echo addslashes($brandName); ?>, I'd like to know more about your services.";

  function setContactMenu(open) {
    if (!stack || !toggle) return;
    stack.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    toggle.setAttribute('aria-label', open ? 'Close contact options' : 'Open contact options');
  }

  if (toggle) {
    toggle.addEventListener('click', function(){
      setContactMenu(!stack.classList.contains('is-open'));
    });
    document.addEventListener('click', function(event){
      if (stack && !stack.contains(event.target)) setContactMenu(false);
    });
    document.addEventListener('keydown', function(event){
      if (event.key === 'Escape') setContactMenu(false);
    });
  }

  if (btn) {
    var base = btn.getAttribute('href');
    btn.setAttribute('href', base + '?text=' + encodeURIComponent(msg));

    btn.addEventListener('click', function(){
      if (window.gtag) {
        gtag('event','click', {event_category:'engagement', event_label:'whatsapp_floating'});
      }
    });
  }

  if (call) {
    call.addEventListener('click', function(){
      if (window.gtag) {
        gtag('event','click', {event_category:'engagement', event_label:'call_floating'});
      }
    });
  }
})();
</script>
