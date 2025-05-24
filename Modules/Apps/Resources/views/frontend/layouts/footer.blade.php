<!-- Start Footer Area -->
<footer class="footer-area pb-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="single-footer-widget">
          <div class="logo-widget">
            <a href="{{URL::to('/')}}">
              <img src="{{asset('frontend/assets/images/white-logo.png')}}" alt="image">
            </a>
          </div>
          <p>{{trans('apps::frontend.layout.footer.description')}}</p>

          <div class="download-store">
            <h4>{{trans('apps::frontend.layout.footer.download_description')}}</h4>

            <a href="#" class="apple-store-btn">
              <i class="flaticon-apple"></i>
              <span>Apple Store</span>
            </a>
            <a href="#" class="play-store-btn">
              <i class="flaticon-google-play"></i>
              <span>Google Play</span>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="single-footer-widget">
          <h3>{{trans('apps::frontend.layout.footer.sitemap')}}</h3>
          <ul class="quick-links">
            <li>
              <a href="{{URL::to('/')}}"><i class='bx bxs-chevrons-right'></i>{{trans('apps::frontend.layout.footer.home')}}</a>
            </li>
            <li>
              <a href="{{URL::to('/contactUs')}}"><i class='bx bxs-chevrons-right'></i>{{trans('apps::frontend.layout.footer.contact_us')}}</a>
            </li>
            <li>
              <a href="{{URL::to('/car-lists')}}"><i class='bx bxs-chevrons-right'></i>{{trans('apps::frontend.layout.footer.gulf_cars')}}</a>
            </li>
            <li>
              <a href="{{URL::to('/car-lists')}}"><i class='bx bxs-chevrons-right'></i>{{trans('apps::frontend.layout.footer.incoming_cars')}}</a>
            </li>
            <li>
              <a href="{{URL::to('/car-shows')}}"><i class='bx bxs-chevrons-right'></i>{{trans('apps::frontend.layout.footer.car_shows')}}</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="single-footer-widget">
          <h3{{trans('apps::frontend.layout.footer.contact_information')}}</h3>

          <ul class="footer-info">
            <li>
              {{trans('apps::frontend.layout.footer.address')}}:
              <span>الامارات العربية المتحدة</span>
            </li>
            <li>
              {{trans('apps::frontend.layout.footer.phone')}}:
              <span class="phone-dir"><a href="tel:+9651682648101">+9651682648101</a></span>
            </li>
            <li>
              {{trans('apps::frontend.layout.footer.email')}}:
              <span><a href="mailto:info@sper.com">info@sper.com</a></span>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="single-footer-widget">
          <h3>{{trans('apps::frontend.layout.footer.follow_us')}}</h3>

          <ul class="instagram-list">
            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-1.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>

            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-2.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>

            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-3.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>

            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-4.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>

            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-5.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>

            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-6.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>

            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-7.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>

            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-8.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>

            <li>
              <div class="box">
                <img src="{{asset('frontend/assets/images/instagram/instagram-9.jpg')}}" alt="image">
                <i class="bx bxl-instagram"></i>
                <a href="#" target="_blank" class="link-btn"></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- End Footer Area -->

<!-- Start Copy Right Area -->
<div class="copyright-area">
  <div class="container">
    <div class="copyright-area-content">
      <p>
        {{trans('apps::frontend.layout.footer.rights')}} &copy; <script>document.write(new Date().getFullYear())</script>
      </p>
    </div>
  </div>
</div>
<!-- End Copy Right Area -->

<!-- Start Go Top Area -->
<div class="go-top">
  <i class='bx bx-up-arrow-alt'></i>
</div>
<!-- End Go Top Area -->
