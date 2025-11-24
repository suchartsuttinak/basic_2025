  <!-- Navbar  -->`
  <div class="preloader">
    <div class="preloader-inner">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!-- End preloader -->

  <div class="progress-bar-container">
    <div class="progress-bar"></div>
  </div>

  <!-- progress circle -->
  <div class="paginacontainer">
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
      <div class="top-arrow">
        <svg width="12" height="20" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.999999 1L8 8L1 15" stroke="#142D6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </div>
  </div>
  <!-- End All Js -->



  <!-- Mobile Menu -->
  <div class="lonyo-menu-wrapper">
    <div class="lonyo-menu-area text-center">
      <div class="lonyo-menu-mobile-top">
        <div class="mobile-logo">
          <a href="index.html">
            <img src="assets/images/logo/logo-dark.svg" alt="logo">
          </a>
        </div>
        <button class="lonyo-menu-toggle mobile">
          <i class="ri-close-line"></i>
        </button>
      </div>
      <div class="lonyo-mobile-menu">
        <ul>
          <li class="menu-item-has-children">
            <a href="#">Home1</a>
            <ul class="sub-menu">
              <li>
                <a href="index.html">
                  Home 010
                </a>
              </li>
              <li>
                <a href="index-02.html">
                  Home 02
                </a>
              </li>
              <li>
                <a href="index-03.html">
                  Home 03
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item-has-children">
            <a href="#">Pages</a>
            <ul class="sub-menu">
              <li><a href="about-us.html">About Us</a></li>
              <li><a href="pricing.html">Pricing</a></li>
              <li class="menu-item-has-children">
                <a class="no-border" href="#">Integratios</a>
                <ul class="sub-menu">
                  <li><a href="integration.html">Integratios</a></li>
                  <li><a href="single-integration.html">Integratios Details</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a class="no-border" href="#">Team</a>
                <ul class="sub-menu">
                  <li><a href="team.html">team</a></li>
                  <li><a href="single-team.html">team details</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a class="no-border" href="#">Service</a>
                <ul class="sub-menu">
                  <li><a href="service.html">Service</a></li>
                  <li><a href="single-service.html">Service Details</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a class="no-border" href="#">Career</a>
                <ul class="sub-menu">
                  <li><a href="career.html">Career</a></li>
                  <li><a href="single-career.html">Career details</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a class="no-border" href="#">Utility</a>
                <ul class="sub-menu">
                  <li><a href="faq.html">faq</a></li>
                  <li><a href="errors-404.html">errors 404</a></li>
                  <li><a href="cooming-soon.html">Cooming Soon</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a class="no-border" href="#">Accounts</a>
                <ul class="sub-menu">
                  <li><a href="sign-up.html">Sign Up</a></li>
                  <li><a href="sign-in.html">Sign In</a></li>
                  <li><a href="reset-password.html">Reset Password</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="menu-item-has-children">
            <a href="#">Portfolio</a>
            <ul class="sub-menu">
              <li><a href="portfolio.html">Portfolio</a></li>
              <li><a href="single-portfolio.html">Portfolio Details</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children">
            <a href="#">Blog</a>
            <ul class="sub-menu">
              <li><a href="blog.html">Blog</a></li>
              <li><a href="single-blog.html">Blog Details</a></li>
            </ul>
          </li>
          <li>
            <a href="contact-us.html">Contact</a>
          </li>
        </ul>
      </div>
      <div class="lonyo-mobile-menu-btn">
        <a class="lonyo-default-btn sm-size" href="contact-us.html" data-text="Get in Touch"><span class="btn-wraper">Get in Touch</span></a>
        <a class="lonyo-default-btn sm-size" href="contact-us.html" data-text="Get in Touch"><span class="btn-wraper">Get in Touch</span></a>
      </div>
    </div>
  </div>
  <!-- End mobile menu -->

  <header class="site-header lonyo-header-section light-bg" id="sticky-menu">
    <div class="container">
      <div class="row gx-3 align-items-center justify-content-between">
        <div class="col-8 col-sm-auto ">
          <div class="header-logo1 ">
            <a href="index.html">
              <img src="{{ $recipients->image ? asset('upload/recipient_images/'.$recipients->image) 
                               : asset('upload/no_image.jpg') }}" alt="logo"
                               style="height: 60px; width: 60px; object-fit: cover; border-radius: 50%;">

            </a>
          </div>
        </div>
        <div class="col">
          <div class="lonyo-main-menu-item">
            <nav class="main-menu menu-style1 d-none d-lg-block menu-left">
              <ul>
                <li class="menu-item-has-children">
                  <a href="#">ประวัติผู้รับ</a>
                  <ul class="sub-menu">
                    <li>
                      <a href="{{ route('fact.all', $recipients->id) }}">
                        ประวัติ
                      </a>
                    </li>
                  
                    <li>
                      <a href="{{ route('remark.all', $recipients->id) }}">
                        รายงานสอบข้อเท็จจริง
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('factmaster.add', $recipients->id) }}">
                        บันทึกสอบข้อเท็จจริง
                      </a>
                    </li>
                  </ul>
                </li>

                
                <li class="menu-item-has-children">
                  <a href="#">ประวัติการศึกษา</a>
                  <ul class="sub-menu">
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li class="menu-item-has-children">
                      <a class="no-border" href="#">Integratios</a>
                      <ul class="sub-menu">
                        <li><a href="integration.html">Integratios</a></li>
                        <li><a href="single-integration.html">Integratios Details</a></li>
                      </ul>
                    </li>
                    <li class="menu-item-has-children">
                      <a class="no-border" href="#">Team</a>
                      <ul class="sub-menu">
                        <li><a href="team.html">team</a></li>
                        <li><a href="single-team.html">team details</a></li>
                      </ul>
                    </li>
                    <li class="menu-item-has-children">
                      <a class="no-border" href="#">Service</a>
                      <ul class="sub-menu">
                        <li><a href="service.html">Service</a></li>
                        <li><a href="single-service.html">Service Details</a></li>
                      </ul>
                    </li>
                    <li class="menu-item-has-children">
                      <a class="no-border" href="#">Career</a>
                      <ul class="sub-menu">
                        <li><a href="career.html">Career</a></li>
                        <li><a href="single-career.html">Career details</a></li>
                      </ul>
                    </li>
                    <li class="menu-item-has-children">
                      <a class="no-border" href="#">Utility</a>
                      <ul class="sub-menu">
                        <li><a href="faq.html">faq</a></li>
                        <li><a href="errors-404.html">errors 404</a></li>
                        <li><a href="cooming-soon.html">Cooming Soon</a></li>
                      </ul>
                    </li>
                    <li class="menu-item-has-children">
                      <a class="no-border" href="#">Accounts</a>
                      <ul class="sub-menu">
                        <li><a href="sign-up.html">Sign Up</a></li>
                        <li><a href="sign-in.html">Sign In</a></li>
                        <li><a href="reset-password.html">Reset Password</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="#">Portfolio</a>
                  <ul class="sub-menu">
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="single-portfolio.html">Portfolio Details</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="#">Blog</a>
                  <ul class="sub-menu">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="single-blog.html">Blog Details</a></li>
                  </ul>
                </li>
                <li>
                  <a href="contact-us.html">Contact</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-auto d-flex align-items-center">
          <div class="lonyo-header-info-wraper2">
            <div class="lonyo-header-info-content">
              <ul>
                <li><a href="{{ route('recipient.all') }}">กลับหน้าหลัก</a></li>
              </ul>
            </div>
            <a class="lonyo-default-btn lonyo-header-btn" href="conact-us.html">Book a demo</a>
          </div>
          <div class="lonyo-header-menu">
            <nav class="navbar site-navbar justify-content-between">
              <!-- Brand Logo-->
              <!-- mobile menu trigger -->
              <button class="lonyo-menu-toggle d-inline-block d-lg-none">
                <span></span>
              </button>
              <!--/.Mobile Menu Hamburger Ends-->
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Navbar -->`