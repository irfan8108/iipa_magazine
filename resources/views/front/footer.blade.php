<div id="global-footer" class="global-footer global" data-layer-region="global-footer">
  <footer class="u-content-visible-auto">
    <section class="container" style="padding: 0;">
      <span class="mck-logo-icon">
        <span class="visually-hidden">
          IIPA Magazine
        </span>
      </span>
      <div class="subscription-links-container">
        <div class="subscription-detail" id="EmailBlock">
          <div class="u-mb-3">
            <div class="text-wrapper">
              <h4 class="">
                Subscribe
              </h4>
              <div class="description">
                <p>
                  Select topics and stay current with our latest insights
                </p>
              </div>
            </div>
          </div>
         {{--  <form  forms-v2="true" class="form-content" id="subscribeForm" method="">
            <div class="field-group u-g-3">
              <div class="field" style="display:inline-block;">
                <div class="control" id="InputEmailBlock">
                  <label class="visually-hidden" for="signupemail">
                  </label>
                  <input type="email" id="signupemail" placeholder="Email address" style="padding: 1rem;" 
                  aria-describedby="signupemail-error" name="signupemail">
                </div>
              </div>
              <div class="but-on" style="display: inline-block; margin:1.5rem;">
                <div class="control">
                  <button type="submit" class=" btn-compact" style="padding:.9rem; color: #fff; background: #2251ff; border: 1px solid #000;">
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </form> --}}
        </div>
        <div class="links-detail">
          <nav>
            <ul class="utility-links">
              <li>
                <a href="#" class="" aria-label="Contact us">
                  Contact us
                </a>
              </li>
              <li>
                <a href="#" class="" aria-label="FAQ">
                  FAQ
                </a>
              </li>
              <li>
                <a href="#" class="" aria-label="Privacy policy">
                  Privacy policy
                </a>
              </li>
              <li>
                <a href="#" class="ot-footer-cookie-settings" aria-label="Cookie preferences">
                  Cookie preferences
                </a>
              </li>
              <li>
                <a href="#" class="" aria-label="Terms of use">
                  Terms of use
                </a>
              </li>
              <li>
                <a href="#" class="" aria-label="Local language information">
                  Local language information
                </a>
              </li>
              <li>
                <a href="#" class="" aria-label="Accessibility statement">
                  Accessibility statement
                </a>
              </li>
            </ul>
          </nav>
          <div class="cta-container -align-horizontal -margin-tight icon">
            <ul id="top-social-menu-footer">
              <li><a href="https://twitter.com/iipa9/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/in/indian-institute-of-public-administration-iipa-3a3959222" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UCGuRg5wXYkJbobLLo6caBOw" target="_blank"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-envelope"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="footer-inner container" style="padding: 0;">
      <div class="app-container">
        <div class="app-description" id="AppDescriptionBlock">
          <div class="u-ts-11 description">
            <p>
              IIPA Insights - Get our latest thinking on your iPhone, iPad, or Android
              device.
            </p>
          </div>
        </div>

      </div>
      <div class="copyright">
        <div class="u-ts-11 description">
          © 2022 IIPA &amp; Organisation
        </div>
      </div>
    </section>
  </footer>
</div>
</body>
<script>
    $(window).scroll(function () {
        var sc = $(window).scrollTop()
        if (sc > 150) {
            $("#main-navbar").addClass("navbar-scroll")
        } 
        else {
            $("#main-navbar").removeClass("navbar-scroll")
        }
    });
</script>

@stack('scripts')

</html>