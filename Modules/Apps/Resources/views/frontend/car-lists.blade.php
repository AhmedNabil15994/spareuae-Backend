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
              <h2>{{trans('apps::frontend.pages.car_lists.title')}}</h2>
              <ul class="pages-list">
                <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
                <li><span>{{trans('apps::frontend.pages.car_lists.title')}}</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->

    <!-- Start Car Shop Area -->
    <div class="car-shop-area ptb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <aside class="widget-area">
              <div class="widget widget_search">
                <form class="search-form">
                  <label>
                    <span class="screen-reader-text">{{trans('apps::frontend.layout.header.search_title')}}</span>
                    <input type="search" class="search-field" placeholder="{{trans('apps::frontend.layout.header.search')}}">
                  </label>
                  <button type="submit">
                    <i class='bx bx-search-alt'></i>
                  </button>
                </form>
              </div>

              <div class="widget widget_filter_results">
                <h3 class="widget-title">{{trans('apps::frontend.layout.header.filter_results')}}</h3>

                <form>
                  <div class="condition">
                    <h3>منشأ السيارة</h3>

                    <div class="condition">
                      <ul class="condition-list">
                        <li><a href="{{URL::to('/car-lists')}}">الكل</a></li>
                        <li><a href="{{URL::to('/car-lists')}}">خليجى</a></li>
                        <li class="active"><a href="{{URL::to('/car-lists')}}">وارد</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>نوع السيارة</label>

                    <select>
                      <option>الكل</option>
                      <option>Sedan</option>
                      <option>MPV</option>
                      <option>SUV</option>
                      <option>Crossover</option>
                      <option>Coupe</option>
                      <option>Convertible</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>ماركة السيارة</label>

                    <select>
                      <option>الكل</option>
                      <option>Sedan</option>
                      <option>MPV</option>
                      <option>SUV</option>
                      <option>Crossover</option>
                      <option>Coupe</option>
                      <option>Convertible</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>موديل السيارة</label>

                    <select>
                      <option>الكل</option>
                      <option>Sedan</option>
                      <option>MPV</option>
                      <option>SUV</option>
                      <option>Crossover</option>
                      <option>Coupe</option>
                      <option>Convertible</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>سنة الموديل</label>

                    <select>
                      <option>2021</option>
                      <option>2021</option>
                      <option>2022</option>
                      <option>2023</option>
                      <option>2024</option>
                      <option>2025</option>
                      <option>2026</option>
                      <option>2027</option>
                      <option>2028</option>
                    </select>
                  </div>
                  <div class="condition">
                    <h3>حالة السيارة</h3>

                    <div class="condition">
                      <ul class="condition-list">
                        <li><a href="{{URL::to('/car-lists')}}">الكل</a></li>
                        <li><a href="{{URL::to('/car-lists')}}">الوكالة</a></li>
                        <li><a href="{{URL::to('/car-lists')}}">مستعمل</a></li>
                        <li class="active"><a href="{{URL::to('/car-lists')}}">سكراب</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="price-range-content">
                    <h4>السعر</h4>

                    <div class="price-range-bar" id="range-slider"></div>
                    <div class="price-range-filter">
                      <div class="price-range-filter-item">
                        <input type="text" id="price-amount" readonly>
                      </div>
                    </div>
                  </div>
                </form>

              </div>

            </aside>
          </div>
          <div class="col-lg-9 col-md-12">
            <div class="row">
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-1.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>
                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$25,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 MAZDA CX-30</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-2.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$49,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 SUBARU XC-60</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-3.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$55,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 NISSAN XX-50</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-4.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$75,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 KIA SOUL XC 60</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-4.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$25,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 MAZDA CX-30</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-3.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$49,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 SUBARU XC-60</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-2.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$55,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 NISSAN XX-50</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-1.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$75,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 KIA SOUL XC 60</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-3.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$55,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 NISSAN XX-50</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-4.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$75,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 KIA SOUL XC 60</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-4.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$25,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 MAZDA CX-30</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="single-car-ranking">
                  <div class="car-ranking-image">
                    <a href="{{URL::to('/car-details')}}"><img src="{{asset('frontend/assets/images/car-ranking/car-ranking-3.jpg')}}" alt="image"></a>
                    <div class="icon">
                      <a href="{{URL::to('/favorites')}}"><i class="flaticon-love"></i></a>
                    </div>

                  </div>
                  <div class="car-ranking-content">
                    <div class="tag">$49,000</div>
                    <h3>
                      <a href="{{URL::to('/car-details')}}">2021 SUBARU XC-60</a>
                    </h3>
                    <p><b>العداد</b>: 100K كيلومتر</p>
                    <hr>
                    <ul class="list">
                      <li>
                        المحرك
                        <span>: 1800cc </span>
                      </li>
                      <li>
                        الناقل
                        <span>: أوتوماتيك </span>
                      </li>
                      <li>
                        الوقود
                        <span>: بنزين</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                  <a href="#" class="prev page-numbers">
                    <i class='flaticon-left-arrow'></i>
                  </a>
                  <span class="page-numbers current" aria-current="page">1</span>
                  <a href="#" class="page-numbers">2</a>
                  <a href="#" class="page-numbers">3</a>
                  <a href="#" class="next page-numbers">
                    <i class='flaticon-right-arrow'></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Car Shop Area -->
@endsection
