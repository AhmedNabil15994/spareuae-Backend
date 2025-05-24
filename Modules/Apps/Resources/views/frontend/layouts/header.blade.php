

<!-- Start Navbar Area -->
<div class="navbar-area">
  <div class="main-responsive-nav">
    <div class="container">
      <div class="main-responsive-menu">
        <div class="logo">
          <a href="{{URL::to('/')}}">
            <img src="{{asset('frontend/assets/images/black-logo.png')}}" alt="image">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main-navbar">
    <div class="container">
      <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="{{URL::to('/')}}">
          <img src="{{asset('frontend/assets/images/white-logo.png')}}" class="white-logo" alt="image">
          <img src="{{asset('frontend/assets/images/black-logo.png')}}" class="black-logo" alt="image">
        </a>
        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item">
              <a href="{{URL::to('/')}}" class="nav-link active">
                {{trans('apps::frontend.layout.footer.home')}}
              </a>
            </li>
            @foreach($mainCategories as $category)
              @if(!$category->is_end_category)
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    {{$category->translateOrDefault(locale())->title}}
                    <i class='bx bx-chevron-down'></i>
                  </a>
                  <ul class="dropdown-menu">
                    @foreach($category->children as $child)
                    <li class="nav-item">
                      <a href="{{URL::to('/categories',['category' => $child->translateOrDefault(locale())->slug])}}" class="nav-link">
                        {{$child->translateOrDefault(locale())->title}}
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </li>
              @endif
            @endforeach
            <li class="nav-item">
              <a href="{{URL::to('/car-shows')}}" class="nav-link">
                {{trans('apps::frontend.layout.header.car_shows')}}
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                {{trans('apps::frontend.layout.header.other_categories')}}
                <i class='bx bx-chevron-down'></i>
              </a>
              <ul class="dropdown-menu">
                @foreach($mainCategories as $category)
                  @if($category->is_end_category && $category->status)
                  <li class="nav-item">
                    <a href="{{URL::to('/categories',['category' => $category->translateOrDefault(locale())->slug])}}" class="nav-link">
                      {{ $category->translateOrDefault(locale())->title }}
                    </a>
                  </li>
                  @endif
                @endforeach
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/pricing')}}" class="nav-link">
                {{trans('apps::frontend.layout.header.pricing')}}
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/contactUs')}}" class="nav-link">
                {{trans('apps::frontend.layout.header.contact_us')}}
              </a>
            </li>
          </ul>

          <div class="others-options d-flex align-items-center">
            <div class="option-item">
              <div class="languages-list">
                <a href="{{URL::to( locale() == 'ar' ? 
                str_replace('/'.Request::segment(1),'/en',URL::current()) : str_replace('/'.Request::segment(1),'/ar',URL::current()) )}}" class="link-lang">
                  {{locale() == 'ar' ? 'English' : 'العربية'}}
                </a>
              </div>
            </div>

            @if(auth()->user())
            <div class="option-item">
              <a href="{{URL::to('/profile/create-ad')}}" class="navbar-btn">
                {{trans('apps::frontend.layout.header.add')}}
                <i class='bx bx-bell-plus'></i>
              </a>
            </div>

            <div class="option-item">
              <div class="dropdown-account">
                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                  <i class='flaticon-user'></i>
                  <span>{{ucwords(auth()->user()->name)}}</span>
                </button>

                <div class="dropdown-menu">
                  <a href="{{URL::to('/profile/my-ads')}}" class="dropdown-item">
                    <span>{{trans('apps::frontend.layout.header.myAds')}}</span>
                  </a>
                  <a href="{{URL::to('/profile/my-favorites')}}" class="dropdown-item">
                    <span>{{trans('apps::frontend.layout.header.favorite')}}</span>
                  </a>
                  <a href="{{URL::to('/profile/info')}}" class="dropdown-item">
                    <span>{{trans('apps::frontend.layout.header.settings')}}</span>
                  </a>
                  <a href="{{URL::to('/profile/transactions')}}" class="dropdown-item">
                    <span>{{trans('user::frontend.profile.transactions')}}</span>
                  </a>
                  <a href="{{URL::to('/logout')}}" class="dropdown-item">
                    <span>{{trans('apps::frontend.layout.header.logout')}}</span>
                  </a>
                </div>
              </div>
            </div>
            @else
              <div class="option-item">
                <a href="{{URL::to('/login')}}" class="navbar-btn">
                  {{__("Sign in")}}
                  <i class='bx bx-bell-plus'></i>
                </a>
              </div>
            @endif
          </div>
        </div>
      </nav>
    </div>
  </div>

  <div class="others-option-for-responsive">
    <div class="container">
      <div class="dot-menu">
        <div class="inner">
          <div class="circle circle-one"></div>
          <div class="circle circle-two"></div>
          <div class="circle circle-three"></div>
        </div>
      </div>

      <div class="container">
        <div class="option-inner">
          <div class="others-options d-flex align-items-center">
            @if(auth()->user())
            <div class="option-item">
              <div class="dropdown-account">
                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                  <i class='flaticon-user'></i>
                  <span>{{ucwords(auth()->user()->name)}}</span>
                </button>

                <div class="dropdown-menu">
                  <a href="{{URL::to('/profile/my-ads')}}" class="dropdown-item">
                    <span>{{trans('apps::frontend.layout.header.myAds')}}</span>
                  </a>
                  <a href="{{URL::to('/profile/my-favorites')}}" class="dropdown-item">
                    <span>{{trans('apps::frontend.layout.header.favorite')}}</span>
                  </a>
                  <a href="{{URL::to('/profile/info')}}" class="dropdown-item">
                    <span>{{trans('apps::frontend.layout.header.settings')}}</span>
                  </a>
                  <a href="{{URL::to('/profile/transactions')}}" class="dropdown-item">
                    <span>{{trans('user::frontend.profile.transactions')}}</span>
                  </a>
                  <a href="{{URL::to('/logout')}}" class="dropdown-item">
                    <span>{{trans('apps::frontend.layout.header.logout')}}</span>
                  </a>
                </div>
              </div>
            </div>
            @endif
            <div class="option-item">
              <div class="languages-list">
                <a href="{{URL::to( locale() == 'ar' ? 
                str_replace('/'.Request::segment(1),'/en',URL::current()) : str_replace('/'.Request::segment(1),'/ar',URL::current()) )}}" class="link-lang">{{locale() == 'ar' ? 'English' : 'العربية'}}</a>
              </div>
            </div>
            @if(auth()->user())
            <div class="option-item">
              <a href="{{URL::to('/profile/create-ad')}}" class="navbar-btn">
                {{trans('apps::frontend.layout.header.add')}}
                <i class='bx bx-bell-plus'></i>
              </a>
            </div>
            @else
                <div class="option-item">
                  <a href="{{URL::to('/login')}}" class="navbar-btn">
                    {{__("Sign in")}}
                    <i class='bx bx-bell-plus'></i>
                  </a>
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Navbar Area -->
