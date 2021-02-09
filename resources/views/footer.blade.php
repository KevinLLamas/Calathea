<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="100439908749733"
  theme_color="#0A7CFF"
  logged_in_greeting="¡Hola! ¿Como podemos ayudarte?"
  logged_out_greeting="¡Hola! ¿Como podemos ayudarte?">
      </div>

<!-- ======= Footer ======= -->
<footer id="footer">
  <a id="app-whatsapp" target="_blanck" href="https://api.whatsapp.com/send?phone=5213324254804&amp;text=¡Hola!&nbsp;¿me&nbsp;pueden&nbsp;apoyar?">
    <i class="bx bxl-whatsapp"></i>
  </a>
</a>
    <div hidden class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-9 col-md-6 footer-contact">
            <h3>StickySoftware</h3>
            <p>
              Guadalajara, Jalisco<br>
              Mexico <br><br>
              <strong>Telefono:</strong> 3334921985<br>
              <strong>Email:</strong> contacto@stickysoftware.com.mx<br>
            </p>
          </div>

          <div hidden class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div hidden class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nuestras redes sociales</h4>
            <p>Siguenos en las redes</p>
            <div class="social-links mt-3">
                <a href="https://twitter.com/SoftwareSticky"><i class="ri-twitter-fill"></i></a>
                <a href="https://www.facebook.com/StickySoftware-100439908749733"><i class="ri-facebook-fill"></i></a>
                <a href="https://www.instagram.com/stickysofware/"><i class="ri-instagram-fill"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>StickySoftware</span></strong>. Todos los derechos reservados.
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
      </div>
    </div>
  </footer>
<!-- End Footer -->
<!-- Preloader -->
  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  
    <div id="preloader"></div>