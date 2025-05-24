@extends('apps::frontend.layouts.app')
@section('content')
  <!-- Start Page Banner -->
  <div class="page-banner-area item-bg-2">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="page-banner-content">
            <h2>{{trans('apps::frontend.pages.pricing.title')}}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
              <li><span>{{trans('apps::frontend.pages.pricing.title')}}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Banner -->

  <!-- Start FAQ Area -->
  <section class="pricing-area bg-fafbfc position-relative ptb-100">
    <div class="container">
      <div class="promotion-pricing-plan mt-5 position-relative z-1">
        <!--hero section start-->
        @if (!empty($errorsArr))
          <div class="container">
            <div class="alert alert-danger alert-dismissible fade show">

              <ul>
                @foreach ($errorsArr as $error)
                  <li class="p-2">{{ $error }}</li>
                @endforeach
              </ul>

            </div>
          </div>
        @endif

        <span class="bg-circle-shape position-absolute z--1"></span>
        <div class="row g-4 justify-content-center">
          @php
//            {{asset('frontend/assets/images/icons/bell.svg')}}
              $imagesArr = ['bell.svg','shield.svg','rocket.svg'];
          @endphp
          @foreach($packages as $key => $package)
            @php
              $html = $package->translateOrDefault(locale())->description ;
              $uldom = new DOMDocument;
              $uldom->loadHTML('<?xml encoding="UTF-8">' . $html);
            @endphp
          <div class="col-xl-4 col-lg-6 col-sm-10">
            <div class="promotion-price-single  rounded position-relative z-1 overflow-hidden">
              <img src="{{asset('frontend/assets/images/icons/'.$imagesArr[$key])}}" alt="bell" class="pr-icon">
              <h5 class="mb-2">{{$package->translateOrDefault(locale())->title}}</h5>
              <h2 class="mb-3">{{$package->price}} {{currency()}} <span>/{{trans('qsale::frontend.monthly')}}</span></h2>

              <p>{{$uldom->getElementsByTagName('span')->item(0)->nodeValue}}</p>
              <span class="spacer mt-4 mb-4"></span>
              <ul>
                @for($i = 0; $i < $uldom->getElementsByTagName('li')->length; $i++ )
                  <li><span class=" text-success"><i class="bx bx-badge-check"></i></span>{{$uldom->getElementsByTagName('li')->item($i)->nodeValue}}</li>
                @endfor
              </ul>
              <a href="{{URL::current().'?package_id='.$package->id}}"
                 class="btn default-btn mt-30 d-block">{{trans('apps::frontend.pages.pricing.choose_package')}}</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- End FAQ Area -->
@endsection
