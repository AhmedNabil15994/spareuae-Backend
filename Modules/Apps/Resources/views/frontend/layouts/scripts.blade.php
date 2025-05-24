<!-- Jquery Slim JS -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Meanmenu JS -->
<script src="{{asset('frontend/assets/js/jquery.meanmenu.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<!-- Jquery Appear JS -->
<script src="{{asset('frontend/assets/js/jquery.appear.js')}}"></script>
<!-- Odometer JS -->
<script src="{{asset('frontend/assets/js/odometer.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{asset('frontend/assets/js/nice-select.min.js')}}"></script>
<!-- Popup JS -->
<script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Slick JS -->
<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
<!-- Jquery Ui JS -->
<script src="{{asset('frontend/assets/js/jquery-ui.min.js')}}"></script>
<!-- Ajaxchimp JS -->
<script src="{{asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator JS -->
<script src="{{asset('frontend/assets/js/form-validator.min.js')}}"></script>
<!-- Contact JS -->
<script src="{{asset('frontend/assets/js/contact-form-script.js')}}"></script>
<!-- Wow JS -->
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<!-- Custom JS -->
<?php
if(isset($scripts) && count($scripts)){
  foreach($scripts as $script){
    echo " <script src=\"{{asset('assets/js/{$script}.js')}}\"></script>";
  }
}
?>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

<script>
  // Set the date we're counting down to //
  var elementExists = document.getElementById("timer");
  if(elementExists){
    var countDownDate = new Date(elementExists.innerHTML).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("timer").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";

      // If the count down is over, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML = "EXPIRED / إعلان منتهي";
      }
    }, 1000);
  }
</script>

@if(locale() == 'ar')
  <script>
    // Home Slides
    $('.home-slides').owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      autoplayHoverPause: false,
      items: 1,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      smartSpeed: 100,
      autoplay: false,
      rtl: true
    });

  </script>
@else
<script>

  // Home Slides
  $('.home-slides').owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    autoplayHoverPause: false,
    items: 1,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    smartSpeed: 100,
    autoplay: false,
  });
</script>
@endif

@yield('scripts')
@stack('scripts')

</body>

</html>
