@extends('apps::frontend.layouts.app')
@section('styles')
  <style>
    .profile-contact form input,
    .profile-contact form textarea{
      color:#000 !important;
    }
  </style>
@endsection
@section('content')
  <!--hero section start-->
  <!-- Start Page Banner -->
  <div class="page-banner-area item-bg-2">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="page-banner-content">
            <h2>{{trans('apps::frontend.pages.categories_details.title')}}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
              @if($ads->category->parent_id)
                <li><a href="#">{{$ads->category->parent->translateOrDefault(locale())->slug}}</a></li>
              @endif
              <li><a href="{{URL::to('/categories',['category' => $ads->category->translateOrDefault(locale())->slug])}}">{{$ads->category->translateOrDefault(locale())->slug}}</a></li>
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
        <div class="col-lg-12 col-md-12">
          <div class="car-details-gallery">
            <div class="car-details-main">
              @foreach($ads->media as $key => $main)
                @if($key >= 1)
                <div class="item">
                  <img src="{{$main->getUrl()}}" alt="image">
                </div>
                @endif
              @endforeach
            </div>

            <div class="car-details-preview">
              @foreach($ads->media as $prevKey => $preview)
                @if($prevKey >= 1)
                <div class="item">
                  <img src="{{$preview->getUrl()}}" alt="image">
                </div>
                @endif
              @endforeach
            </div>
          </div>

          <div class="car-details-desc">
            <div class="desc-content">
              <p id="timer">{{$ads->end_at}}</p>
              <div class="tag">{{$ads->price}} {{currency()}}</div>
              @auth
              <div class="tag-favorites"><a href="{{!$ads->is_favorite ? URL::to('/profile/toggle-favorite',['add_id'=>$ads->id]) : '#'}}"><i class="flaticon-love"></i></a></div>
              @endauth
              <h3>{{$ads->translateOrDefault(locale())->slug}}</h3>
            </div>
            @if(!empty($ads->attributes))
            <div class="desc-information">
              <h3>{{trans('qsale::dashboard.specification')}}</h3>

              <ul class="info-list">
                <li>{{trans('user::dashboard.users.create.form.status')}}</li>
                <li><span>: {{$ads->category->title}} </span></li>
                <li>{{trans('user::dashboard.users.create.form.type')}}</li>
                <li><span>: {{trans('user::dashboard.users.datatable.'.$ads->user->type)}} </span></li>

                @foreach($ads->attributes as $key => $oneAttribute)
                  <li>{{$oneAttribute->attribute->translateOrDefault(locale())->name}}</li>
                  @if(isset($oneAttribute->option) && !empty($oneAttribute->option))
                    <li><span>: {{$oneAttribute->option->translateOrDefault(locale())->value}} </span></li>
                  @else
                    <li><span>: {{$oneAttribute->value}} </span></li>
                  @endif
                @endforeach
                @if(!$ads->hide_private_number)
                <li>{{ __('qsale::dashboard.ads.form.mobile') }}</li>
                <li><span>: {{$ads->mobile}}</span></li>
                <li>{{ __('qsale::dashboard.ads.form.user_whatsapp') }}</li>
                <li><span>: {{$ads->settings->user_whatsapp}}</span></li>
                @endif
              </ul>
            </div>
            @endif
            @if($ads->translateOrDefault(locale())->special_specification != null)
            <div class="desc-notes">
              <h3>{{trans('qsale::dashboard.special_specification')}}</h3>
              <p>{{$ads->translateOrDefault(locale())->special_specification}}</p>
            </div>
            @endif
            @if($ads->translateOrDefault(locale())->malfunctions != null)
            <div class="desc-notes">
              <h3>{{trans('qsale::dashboard.malfunctions')}}</h3>
              <p>{{$ads->translateOrDefault(locale())->malfunctions}}</p>
            </div>
            @endif
            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1848965.2379116565!2d56.55326173406632!3d25.216160937054656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e48dfb1ab12bd%3A0x33d32f56c0080aa7!2z2KfZhNil2YXYp9ix2KfYqiDYp9mE2LnYsdio2YrYqSDYp9mE2YXYqtit2K_YqQ!5e0!3m2!1sar!2seg!4v1693071238420!5m2!1sar!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>

{{--        <div class="col-lg-4 col-md-12">--}}
{{--          <div class="user-profile-information">--}}
{{--            <div class="profile-title">--}}
{{--              <img src="{{asset('frontend/assets/images/user-profile/profile-1.jpg')}}" alt="image">--}}
{{--              <h3>{{$ads->user->user_name}}</h3>--}}
{{--              <span>{{trans('apps::frontend.pages.car_details.seller')}}</span>--}}
{{--              <p>{{$ads->settings->user_description}}</p>--}}
{{--            </div>--}}
{{--            <hr>--}}
{{--            <ul class="profile-info">--}}
{{--              <li>--}}
{{--                <span><i class='bx bx-current-location'></i> {{trans('apps::frontend.layout.footer.address')}}</span>--}}
{{--                <a href="#">{{$ads->settings->user_address}}</a>--}}
{{--              </li>--}}
{{--              <li>--}}
{{--                <span><i class='bx bx-envelope'></i> {{trans('apps::frontend.layout.footer.email')}}</span>--}}
{{--                <a href="mailto:{{$ads->settings->user_email}}">{{$ads->settings->user_email}}</a>--}}
{{--              </li>--}}

{{--              <li>--}}
{{--                <span><i class='bx bx-phone-call'></i> {{trans('apps::frontend.layout.footer.phone')}}</span>--}}
{{--                <a href="tel:{{$ads->settings->user_phone}}" class="phone-dir">{{$ads->settings->user_phone}}</a>--}}
{{--              </li>--}}

{{--              <li>--}}
{{--                <span><i class='bx bxl-whatsapp'></i>{{trans('apps::frontend.layout.footer.whatsapp')}}</span>--}}
{{--                <a href="https://wa.me/{{ $ads->settings->user_whatsapp }}" class="phone-dir">{{$ads->settings->user_whatsapp}}</a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--            <hr>--}}
{{--            @auth--}}
{{--            <div class="profile-contact">--}}
{{--              @if($errors->all())--}}
{{--                <div class="alert alert-danger">--}}
{{--                  <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                      <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                  </ul>--}}
{{--                </div>--}}
{{--              @endif--}}
{{--              <form action="{{ route('frontend.comments.store', $ads->id) }}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="hidden" name="type" value="ads">--}}
{{--                <div class="form-group">--}}
{{--                  <label>{{trans('apps::frontend.pages.car_details.your_name')}}</label>--}}
{{--                  <input type="text" name="info[name]" value="{{!empty(old('info')) && isset(old('info')['name']) ? old('info')['name'] :  ''}}" class="form-control">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                  <label>{{trans('apps::frontend.layout.footer.email')}}</label>--}}
{{--                  <input type="email" name="info[email]" value="{{!empty(old('info')) && isset(old('info')['email']) ? old('info')['email'] :  ''}}" class="form-control">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                  <label>{{trans('apps::frontend.layout.footer.phone')}}</label>--}}
{{--                  <input type="text" name="info[phone]" value="{{!empty(old('info')) && isset(old('info')['phone']) ? old('info')['phone'] :  ''}}" class="form-control">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                  <label>{{trans('apps::frontend.pages.car_details.questionnaire')}} </label>--}}
{{--                  <textarea name="body" class="form-control">{{!empty(old('info')) && isset(old('info')['body']) ? old('info')['body'] :  ''}}</textarea>--}}
{{--                </div>--}}

{{--                <button type="submit" class="default-btn">--}}
{{--                  {{trans('apps::frontend.pages.car_details.send_to_seller')}}--}}
{{--                  <span></span>--}}
{{--                </button>--}}
{{--              </form>--}}
{{--            </div>--}}
{{--            @endauth--}}
{{--          </div>--}}
{{--        </div>--}}
      </div>
    </div>
  </section>
  <!-- Start Car Details Area -->

@endsection
