@extends('apps::frontend.layouts.app')
@section('styles')
  <style>.hidden{display: none}</style>
@endsection
@section( 'content')

  <!-- Start Page Banner -->
  <div class="page-banner-area item-bg-2">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="page-banner-content">
            <h2>{{trans('user::frontend.profile.info')}}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
              <li><span>{{trans('user::frontend.profile.info')}}</span></li>
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
            <h3>{{trans('user::frontend.profile.subscription')}}</h3>
          </div>
          <div class="dashboard-form mb-3">
            @if($user->currentSubscription)
            <div class="row mb-3">
              <div class="col-md-6">
                <label>{{trans('user::frontend.profile.package_id')}}: </label>
                <b>{{$user->currentSubscription->package->title}}</b>
              </div>
              <div class="col-md-6">
                <label>{{trans('user::frontend.profile.leftDays')}}: </label>
                <b>{{$user->currentSubscription->package->title}}</b>
              </div>
            </div>
            <div class="row form">
              <div class="col-md-6">
                <label>{{trans('user::frontend.profile.start_at')}}: </label>
                <b>{{$user->currentSubscription->start_at}}</b>
              </div>
              <div class="col-md-6">
                <label>{{trans('user::frontend.profile.end_at')}}: </label>
                <b>{{$user->currentSubscription->end_at}}</b>
              </div>
            </div>
            @else
              <p>{{trans('user::frontend.profile.subscribe_to_package')}}</p>
            @endif
            <a href="{{route('frontend.ads.pricing')}}" class="default-btn mt-5">{{trans('user::frontend.profile.change_subscription')}}</a>
          </div>



          <div class="dashboard-title">
            <h3>{{trans('user::frontend.profile.info')}}</h3>
          </div>

          <div class="dashboard-form">
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
            <form method="POST" enctype="multipart/form-data"  action="{{route('frontend.user.edit_info.save')}}">
              @csrf
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label>{{trans("user::frontend.info.change_image")}}</label>
                    <input type="file" class="form-control-file" name="image">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label>{{trans('user::frontend.info.name')}}</label>
                    <input type="text" class="form-control" value="{{$user->name}}" class="form-control" name="name">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label>{{trans("user::frontend.info.email")}}</label>
                    <input type="email" value="{{$user->email}}" class="form-control" name="email">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label>{{trans("user::frontend.info.mobile")}}</label>
                    <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label>{{trans('user::dashboard.users.create.form.type')}}</label>
                    <select name="type" id="userType" class="form-control" data-name="type">
                      @foreach (['user','show'] as $type )
                        <option value="{{$type}}"
                          {{ $user->type == $type ? "selected" : ""}}> {{__('user::dashboard.users.datatable.'.$type)}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="showData mx-0 px-0 row {{$user->type == 'show' ? '' : 'hidden'}}">
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_name')}}</label>
                      <input type="text" name="setting[show_name]" value="{{!empty($user->setting) ? $user->setting['show_name'] : ""}}" class="form-control" data-name="setting.show_name">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_description')}}</label>
                      <textarea name="setting[show_description]" class="form-control" data-name="setting.show_description">{{!empty($user->setting) ? $user->setting['show_description'] : ''}}</textarea>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_email')}}</label>
                      <input type="email" name="setting[show_email]" value="{{!empty($user->setting) ? $user->setting['show_email'] : ''}}" class="form-control" data-name="setting.show_email">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_phone')}}</label>
                      <input type="text" name="setting[show_phone]" value="{{!empty($user->setting) ? $user->setting['show_phone'] : ''}}" class="form-control" data-name="setting.show_phone">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_address')}}</label>
                      <input type="text" name="setting[show_address]" value="{{!empty($user->setting) ? $user->setting['show_address'] : ''}}" class="form-control" data-name="setting.show_address">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_facebook')}}</label>
                      <input type="text" name="setting[show_facebook]" value="{{!empty($user->setting) ? $user->setting['show_facebook'] : ""}}" class="form-control" data-name="setting.show_facebook">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_twitter')}}</label>
                      <input type="text" name="setting[show_twitter]" value="{{!empty($user->setting) ? $user->setting['show_twitter'] : ""}}" class="form-control" data-name="setting.show_twitter">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_instagram')}}</label>
                      <input type="text" name="setting[show_instagram]" value="{{!empty($user->setting) ? $user->setting['show_instagram'] : ""}}" class="form-control" data-name="setting.show_instagram">
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      <label> {{__('user::dashboard.users.update.form.show_logo')}}</label>
                      <div class="form-control-file">
                        <input name="setting[show_logo]" class="form-control image" type="file" >
                      </div>
                      <span class="holder" style="margin-top:15px;max-height:100px;">
                          <img src="{{!empty($user->setting) && isset($user->setting['show_logo']) ? asset($user->setting['show_logo']) : asset('/uploads/default.jpg')}}" style="height: 15rem;max-width:100%">
                      </span>
                      <input type="hidden" data-name="setting.show_logo">
                    </div>
                  </div>
                </div>
              </div>

              <button type="submit" class="default-btn">
                {{trans("user::frontend.office.save")}}
                <span></span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Dashboard Area -->
@endsection
@section('scripts')
  <script>
    $(function (){
      $('#userType').on('change',function (){
        $('.showData').toggleClass('hidden')
      })
    })
  </script>
@endsection
