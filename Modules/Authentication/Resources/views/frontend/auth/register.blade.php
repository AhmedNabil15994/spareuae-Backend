@extends('apps::frontend.layouts.app')
@section('content')

  <!-- Start Page Banner -->
  <div class="page-banner-area item-bg-2">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="page-banner-content">
            <h2>{{ trans('authentication::frontend.register.title') }}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{ trans('apps::frontend.pages.home.title') }}</a></li>
              <li><span>{{ trans('authentication::frontend.register.title') }}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Banner -->

  <!-- Start Register Area -->
  <section class="register-area ptb-100">
    <div class="container">
      <div class="register-form">
        <h2>{{ trans('authentication::frontend.register.title') }}</h2>
        <p>{{ trans('authentication::frontend.register.description') }}</p>

        @if($errors->all())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form method="post" action="{{ route('frontend.register') }}">
          @csrf
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="account_type" id="flexRadioDefault1" value="1" {{old('account_type')  == null || old('account_type') == 1 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                {{ trans('authentication::frontend.login.user_account') }}
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="account_type" id="flexRadioDefault2" value="2" {{old('account_type') == 2 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault2">
                {{ trans('authentication::frontend.login.show_account') }}
              </label>
            </div>
          </div>
          <div class="form-group">
            <label>{{ trans('authentication::frontend.register.name') }}</label>
            <input type="text" class="form-control"  placeholder="{{ trans('authentication::frontend.register.name_placeholder') }}" name="name">
          </div>
          <div class="form-group">
            <label>{{ trans('authentication::frontend.login.email') }}</label>
            <input type="email" class="form-control" name="email" placeholder="{{ trans('authentication::frontend.login.email_placeholder') }}">
          </div>
          <div class="form-group">
            <label>{{ trans('authentication::frontend.login.password') }}</label>
            <input type="password" name="password" placeholder="{{ trans('authentication::frontend.login.password_placeholder') }}" class="form-control">
          </div>
          <div class="form-group">
            <label>{{ trans('authentication::frontend.register.confirm_password') }}</label>
            <input type="password" name="password_confirmation" placeholder="{{ trans('authentication::frontend.register.confirm_password_placeholder') }}"  class="form-control">
          </div>
          <p class="description">{{ trans('authentication::frontend.register.description_2') }}</p>
          <button type="submit" class="default-btn">
            {{ trans('authentication::frontend.register.btn') }}
            <span></span>
          </button>
        </form>
      </div>
    </div>
  </section>
  <!-- End Register Area -->
@endsection
