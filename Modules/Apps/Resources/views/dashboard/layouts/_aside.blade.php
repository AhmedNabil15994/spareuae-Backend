<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
      <li class="sidebar-toggler-wrapper hide">
        <div class="sidebar-toggler">
          <span></span>
        </div>
      </li>
      <li class="nav-item {{ active_menu('home') }}">
        <a href="{{ url(route('dashboard.home')) }}" class="nav-link nav-toggle">
          <i class="icon-home"></i>
          <span class="title">{{ __('apps::dashboard.index.title') }}</span>
          <span class="selected"></span>
        </a>
      </li>
      @can(['show_users', 'show_admins'])
      <li class="nav-item {{ active_slide_menu(['users', 'admins']) }}">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-pointer"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside.users') }}</span>
          <span class="arrow {{ active_slide_menu(['users', 'admins']) }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          @can('show_users')
          <li class="nav-item {{ active_menu('users') }}">
            <a href="{{ url(route('dashboard.users.index')) }}" class="nav-link nav-toggle">
              <i class="fa fa-building"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.users') }}</span>
              <span class="selected"></span>
            </a>
          </li>
          @endcan
          @can('show_admins')
          <li class="nav-item {{ active_menu('admins') }}">
            <a href="{{ url(route('dashboard.admins.index')) }}" class="nav-link nav-toggle">
              <i class="fa fa-building"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.admins') }}</span>
              <span class="selected"></span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan

      @can(['show_sections',
      'show_attributes','show_categories','show_addations','show_ad_types','show_ads','show_payments','show_packages','show_republished_packages'])
      <li class="nav-item  active open">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-pointer"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside._tabs.ads') }}</span>
          <span
            class="arrow {{ active_slide_menu(['sections','attributes','categories','addations','ad_types','ads','payments','packages','republished_packages']) }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          @can('show_ads')
          <li class="nav-item {{ active_menu('ads') }}">
            <a href="{{ url(route('dashboard.ads.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.ads') }}</span>
            </a>
          </li>
          @endcan
          {{-- @can('show_sections')
          <li class="nav-item {{ active_menu('sections') }}">
            <a href="{{ url(route('dashboard.sections.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.sections') }}</span>
            </a>
          </li>
          @endcan --}}
          @can('show_attributes')
          <li class="nav-item {{ active_menu('attributes') }}">
            <a href="{{ url(route('dashboard.attributes.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.attributes') }}</span>
            </a>
          </li>
          @endcan
          @can('show_categories')
          <li class="nav-item {{ active_menu('categories') }}">
            <a href="{{ url(route('dashboard.categories.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.categories') }}</span>
            </a>
          </li>
          @endcan
          @can('show_addations')
          <li class="nav-item {{ active_menu('addations') }}">
            <a href="{{ url(route('dashboard.addations.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.addations') }}</span>
            </a>
          </li>
          @endcan
          {{-- @can('show_payments')
          <li class="nav-item {{ active_menu('payments') }}">
            <a href="{{ url(route('dashboard.payments.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.payments') }}</span>
            </a>
          </li>
          @endcan --}}
          @can('show_ad_types')
          <li class="nav-item {{ active_menu('ad_types') }}">
            <a href="{{ url(route('dashboard.ad_types.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.ad_types') }}</span>
            </a>
          </li>
          @endcan

          @can('show_packages')
          <li class="nav-item {{ active_menu('packages') }}">
            <a href="{{ url(route('dashboard.packages.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.packages') }}</span>
            </a>
          </li>
          @endcan
          @can('show_republished_packages')
          <li class="nav-item {{ active_menu('republished_packages') }}">
            <a href="{{ url(route('dashboard.republished_packages.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.republished_packages') }}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan
      @can(['show_contact', 'show_slider'])
      <li class="nav-item {{ active_slide_menu(['contact', 'slider']) }}">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-pointer"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside._tabs.marketing') }}</span>
          <span class="arrow {{ active_slide_menu(['contact', 'slider']) }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          @can('show_contact')
          <li class="nav-item {{ active_menu('contact') }}">
            <a href="{{ url(route('dashboard.contact.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.contact') }}</span>
            </a>
          </li>
          @endcan

          @can('show_slider')
          <li class="nav-item {{ active_menu('sliders') }}">
            <a href="{{ url(route('dashboard.sliders.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.slider') }}</span>
            </a>
          </li>
          @endcan
          @can('show_customers')
          <li class="nav-item {{ active_menu('customers') }}">
            <a href="{{ url(route('dashboard.customers.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.customers') }}</span>
            </a>
          </li>
          @endcan

        </ul>
      </li>
      @endcan

      @can('show_garages')
      <li class="nav-item {{ active_menu('garages') }}">
        <a href="{{ url(route('dashboard.garages.index')) }}" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside.garages') }}</span>
        </a>
      </li>
      @endcan
      @can(['show_countries', 'show_cities','show_states'])
      <li class="nav-item {{ active_slide_menu(['countries', 'cities','states']) }}">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-pointer"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside._tabs.areas') }}</span>
          <span class="arrow {{ active_slide_menu(['countries', 'cities','states']) }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          @can('show_countries')
          <li class="nav-item {{ active_menu('countries') }}">
            <a href="{{ url(route('dashboard.countries.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.countries') }}</span>
            </a>
          </li>
          @endcan

          @can('show_cities')
          <li class="nav-item {{ active_menu('cities') }}">
            <a href="{{ url(route('dashboard.cities.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.cities') }}</span>
            </a>
          </li>
          @endcan
          @can('show_states')
          <li class="nav-item {{ active_menu('states') }}">
            <a href="{{ url(route('dashboard.states.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.states') }}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan
      @can(['show_settings', 'show_pages'])
      <li class="nav-item {{ active_slide_menu(['setting', 'pages']) }}">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-pointer"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside.setting') }}</span>
          <span class="arrow {{ active_slide_menu(['setting', 'pages']) }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          @can('show_settings')
          <li class="nav-item {{ active_menu('setting') }}">
            <a href="{{ url(route('dashboard.setting.index')) }}" class="nav-link nav-toggle">
              <i class="icon-settings"></i>
              <span class="title">{{ __('apps::dashboard._layout.aside.setting') }}</span>
            </a>
          </li>
          @endcan
{{--          @can('show_pages')--}}
{{--          <li class="nav-item {{ active_menu('pages') }}">--}}
{{--            <a href="{{ url(route('dashboard.pages.index')) }}" class="nav-link nav-toggle">--}}
{{--              <i class="icon-settings"></i>--}}
{{--              <span class="title">{{ __('apps::dashboard._layout.aside.pages') }}</span>--}}
{{--            </a>--}}
{{--          </li>--}}
{{--          @endcan--}}
        </ul>
      </li>
      @endcan












      {{--
      @can('show_advertisement')
      <li class="nav-item {{ active_menu('advertisement') }}">
        <a href="{{ url( route('dashboard.advertisement.index') ) }}" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside.advertisement') }}</span>
        </a>
      </li>
      @endcan --}}

      {{--


      @can('show_offers')
      <li class="nav-item {{ active_menu('offers') }}">
        <a href="{{ url(route('dashboard.offers.index')) }}" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside.offers') }}</span>
        </a>
      </li>
      @endcan --}}


      @can('show_questions')
      <li class="nav-item {{ active_menu('questions') }}">
        <a href="{{ url(route('dashboard.questions.index')) }}" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside.questions') }}</span>
        </a>
      </li>
      @endcan


      {{--
      @can('show_telescope')
      <li class="nav-item {{ active_menu('telescope') }}">
        <a href="{{ url(route('telescope')) }}" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">{{ __('apps::dashboard._layout.aside.telescope') }}</span>
        </a>
      </li>
      @endcan --}}

      <li class="nav-item {{ active_menu('news_subscriptions') }}">
        <a href="{{ url(route('dashboard.news_subscriptions.index')) }}" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">{{ __('qsale::dashboard.news_subscriptions.title') }}</span>
          <span class="selected"></span>
        </a>
      </li>

    </ul>
  </div>
</div>
