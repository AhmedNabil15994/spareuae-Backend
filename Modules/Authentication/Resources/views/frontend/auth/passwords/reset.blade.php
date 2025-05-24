@extends('apps::frontend.layouts.app')
@section('content')

  <!-- Start Page Banner -->
  <div class="page-banner-area item-bg-2">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="page-banner-content">
            <h2>{{ trans('authentication::frontend.reset.title') }}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{ trans('apps::frontend.pages.home.title') }}</a></li>
              <li><span>{{ trans('authentication::frontend.reset.title') }}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Banner -->

  <!-- Start Forgot Password Area -->
  <section class="reset-password-area ptb-100">
    <div class="container">
      <div class="reset-password-form">
        <h2>{{ __('authentication::frontend.reset.title') }}</h2>
        @if($errors->all())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="post" action="{{ route('frontend.password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="form-group">
            <label>{{ trans('authentication::frontend.login.email') }}</label>
            <input type="email" class="form-control" readonly name="email" value="{{ $email ?? old('email') }}" placeholder="{{ trans('authentication::frontend.login.email_placeholder') }}">
          </div>

          <div class="form-group">
            <label>{{ trans('authentication::frontend.login.password') }}</label>
            <input type="password" class="form-control" name="password" placeholder="{{ trans('authentication::frontend.login.password') }}">
          </div>

          <div class="form-group">
            <label>{{ trans('authentication::frontend.reset.form.password_confirmation') }}</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('authentication::frontend.reset.form.password_confirmation') }}">
          </div>

          <button type="submit" class="default-btn">
            {{ trans('authentication::frontend.reset.form.btn.reset') }}
            <span></span>
          </button>
        </form>
      </div>
    </div>
  </section>
  <!-- End Forgot Password Area -->
@endsection

