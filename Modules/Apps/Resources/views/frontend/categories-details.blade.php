@extends('apps::frontend.layouts.app')
@section('content')
    <!--hero section start-->
    @include('apps::frontend.layouts._message')
    @if ($errors->any())
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show">

                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="p-2">{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        </div>
    @endif

    <!-- Start Page Banner -->
    <div class="page-banner-area item-bg-2">
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <div class="page-banner-content">
              <h2>{{trans('apps::frontend.pages.categories_details.title')}}</h2>
              <ul class="pages-list">
                <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
                <li><a href="{{URL::to('/categories-lists')}}">العقارات</a></li>
                <li><span>{{trans('apps::frontend.pages.categories_details.title')}}</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->


    <!-- Start Car Details Area -->
    <section class="car-details-area ptb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <div class="car-details-gallery">
              <div class="car-details-main">
                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>
              </div>

              <div class="car-details-preview">
                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>

                <div class="item">
                  <img src="{{asset('frontend/assets/images/car-details/categories-details-1.jpg')}}" alt="image">
                </div>
              </div>
            </div>

            <div class="car-details-desc">
              <div class="desc-content">
                <p id="timer"></p>
                <div class="tag">$75,000</div>
                <div class="tag-favorites"><a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a></div>
                <h3>عقارات دبي</h3>
              </div>
              <hr>
              <div class="desc-notes">
                <h3>مواصفات خاصة </h3>
                <p> لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                  أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                  أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس
                  أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت
                  نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا
                  كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم
                </p>
              </div>



              <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27814.422039668534!2d47.99937637067242!3d29.37606405632665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9c83ce455983%3A0xc3ebaef5af09b90e!2z2YXYr9mK2YbYqSDYp9mE2YPZiNmK2KrYjCDYp9mE2YPZiNmK2KrigI4!5e0!3m2!1sar!2seg!4v1665664561974!5m2!1sar!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-12">
            <div class="user-profile-information">
              <div class="profile-title">
                <img src="{{asset('frontend/assets/images/user-profile/profile-1.jpg')}}" alt="image">
                <h3>محمد البرلسي</h3>
                <span>{{trans('apps::frontend.pages.car_details.seller')}}</span>
              </div>
              <hr>
              <ul class="profile-info">
                <li>
                  <span><i class='bx bx-current-location'></i>{{trans('apps::frontend.layout.footer.address')}}</span>
                  <a href="#"> الكويت. مدينة الكويت </a>
                </li>
                <li>
                  <span><i class='bx bx-envelope'></i>{{trans('apps::frontend.layout.footer.email')}}</span>
                  <a href="mailto:seller@gmail.com">seller@gmail.com</a>
                </li>

                <li>
                  <span><i class='bx bx-phone-call'></i>{{trans('apps::frontend.layout.footer.phone')}}</span>
                  <a href="tel:+9655143214567" class="phone-dir">+965 514-321-4567</a>
                </li>

                <li>
                  <span><i class='bx bxl-whatsapp'></i>{{trans('apps::frontend.layout.footer.whatsapp')}}</span>
                  <a href="#" class="phone-dir">+965 514-321-4567</a>
                </li>
              </ul>
              <hr>
              <div class="profile-contact">
                <form>
                  <div class="form-group">
                    <label>{{trans('apps::frontend.pages.car_details.your_name')}}</label>
                    <input type="text" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>{{trans('apps::frontend.layout.footer.email')}}</label>
                    <input type="text" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>{{trans('apps::frontend.layout.footer.phone')}}</label>
                    <input type="text" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>{{trans('apps::frontend.pages.car_details.questionnaire')}} </label>
                    <textarea name="message" class="form-control"></textarea>
                  </div>

                  <button type="submit" class="default-btn">
                    {{trans('apps::frontend.pages.car_details.send_to_seller')}}
                    <span></span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Start Car Details Area -->
@endsection
