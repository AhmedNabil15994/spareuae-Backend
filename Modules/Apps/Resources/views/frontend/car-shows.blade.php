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
              <h2>{{trans('apps::frontend.pages.car_shows.title')}}</h2>

              <ul class="pages-list">
                <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
                <li><span>{{trans('apps::frontend.pages.car_shows.title')}}</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->


    <!-- Start Team Area -->
    <section class="team-area bg-color pt-100 pb-70">
      <div class="container">
        <div class="row">
          @foreach($shows as $show)
          <div class="col-lg-3 col-md-6">
            <div class="single-team">
              <a href="{{ !empty($show->setting) ? URL::to('/car-shows',['show'=> $show->translateOrDefault(locale())->setting['show_name']]) : ''}}">
                <img src="{{!empty($show->setting) && isset($show->setting['show_logo']) ? url($show->setting['show_logo']) : url($show->image)}}" alt="image">
              </a>
              <div class="team-content">
                <a href="{{URL::to('/show-details')}}">
                  <h3>{{!empty($show->setting) ? $show->setting['show_name'] : $show->name}} <i class='bx bxs-check-circle'></i></h3>
                </a>
                <span><i class='bx bx-map'></i>{{!empty($show->setting) ? $show->setting['show_address'] : ''}}</span>
                <div class="share-link">
                  @if(!empty($show->setting))
                  <a href="{{isset($show->setting['show_facebook']) ? $show->setting['show_facebook'] : ''}}" target="_blank"><i class='bx bxl-facebook'></i></a>
                  <a href="{{isset($show->setting['show_instagram']) ? $show->setting['show_instagram'] : ''}}" target="_blank"><i class='bx bxl-instagram'></i></a>
                  <a href="{{isset($show->setting['show_twitter']) ? $show->setting['show_twitter'] : ''}}" target="_blank"><i class='bx bxl-twitter'></i></a>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- End Team Area -->
@endsection
