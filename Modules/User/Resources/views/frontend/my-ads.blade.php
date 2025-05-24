@extends('apps::frontend.layouts.app')
@section( 'content')

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
            <h2>{{trans('user::frontend.profile.myAds')}}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
              <li><span>{{trans('user::frontend.profile.myAds')}}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Banner -->

  <!-- Start Dashboard Area -->
  <div class="dashboard-area ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="dashboard-profile">
            <div class="profile-box">
              <div class="profile-icon">
                <img src="{{asset($user->image)}}" alt="">
              </div>
            </div>

            <div class="profile-info">
              <ul class="info-list">
                <li>
                  <a href="{{URL::to('/profile/create-ad')}}" class="{{Active(URL::to('*/create-ad'))}}">{{trans('user::frontend.profile.add-ad')}}</a>
                </li>
                <li>
                  <a href="{{URL::to('/profile/my-ads')}}" class="{{Active(URL::to('*/my-ads'),'active')}}" >{{trans('user::frontend.profile.myAds')}}</a>
                </li>
                <li>
                  <a href="{{URL::to('/profile/my-favorites')}}" class="{{Active(URL::to('*/my-favorites'))}}">{{trans('user::frontend.profile.favorites')}}</a>
                </li>
                <li>
                  <a href="{{URL::to('/profile/info')}}" class="{{Active(URL::to('*/info'))}}">{{trans('user::frontend.profile.info')}}</a>
                </li>
                <li>
                  <a href="{{URL::to('/profile/transactions')}}" class="{{Active(URL::to('*/transactions'))}}">{{trans('user::frontend.profile.transactions')}}</a>
                </li>
                <li>
                  <a href="{{URL::to('/logout')}}">{{trans('user::frontend.profile.logout')}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-9 col-md-12">
          <div class="dashboard-title">
            <h3>{{trans('user::frontend.profile.myAds')}}</h3>
          </div>

          <div class="row">
            @foreach($ads as $ad)
              @include('qsale::frontend.single-grid')
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Dashboard Area -->
@endsection
