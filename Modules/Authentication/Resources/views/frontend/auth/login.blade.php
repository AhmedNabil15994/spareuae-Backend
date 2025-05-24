@extends('apps::frontend.layouts.app')
@section('content')
  <!-- Start Page Banner -->
  <div class="page-banner-area item-bg-2">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="page-banner-content">
            <h2>{{ trans('authentication::frontend.login.title') }}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{ trans('apps::frontend.pages.home.title') }}</a></li>
              <li><span>{{ trans('authentication::frontend.login.title') }}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Banner -->

  <!-- Start Login Area -->
  <section class="login-area ptb-100">
    <div class="container">
      <div class="login-form">
        <h2>{{ trans('authentication::frontend.login.title') }}</h2>
        <p>{{ trans('authentication::frontend.login.description') }}</p>

        @if($errors->all())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('frontend.post_login') }}" method="post">
          @csrf
{{--          <div class="form-group">--}}
{{--            <div class="form-check">--}}
{{--              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>--}}
{{--              <label class="form-check-label" for="flexRadioDefault1">--}}
{{--                {{ trans('authentication::frontend.login.user_account') }}--}}
{{--              </label>--}}
{{--            </div>--}}
{{--            <div class="form-check">--}}
{{--              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">--}}
{{--              <label class="form-check-label" for="flexRadioDefault2">--}}
{{--                {{ trans('authentication::frontend.login.show_account') }}--}}
{{--              </label>--}}
{{--            </div>--}}
{{--          </div>--}}
          <div class="form-group">
            <label>{{ trans('authentication::frontend.login.email') }}</label>
            <input type="email" class="form-control" placeholder="{{ trans('authentication::frontend.login.email_placeholder') }}" name="email">
          </div>

          <div class="form-group">
            <label>{{ trans('authentication::frontend.login.password') }}</label>
            <input type="password" class="form-control" name="password" placeholder="{{ __('Enter your Password') }}" >
          </div>

          <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkme">
                <label class="form-check-label" for="checkme">{{ trans('authentication::frontend.login.remember_me') }}</label>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password">
              <a href="{{route('frontend.forget')}}" class="lost-your-password">{{ trans('authentication::frontend.login.forget') }}</a>
            </div>

            <div class="col-sm-12">
              <p class="text-xl-center mt-4">{{ trans('authentication::frontend.login.dont_have') }} <a href="{{URL::to('/register')}}" class="lost-your-password">{{ trans('authentication::frontend.login.sign_up') }}</a>
              </p>

            </div>
          </div>

          <button type="submit" class="default-btn">
            {{ trans('authentication::frontend.login.login_btn') }}
            <span></span>
          </button>
        </form>
      </div>
    </div>
  </section>
  <!-- End Login Area -->
@endsection
