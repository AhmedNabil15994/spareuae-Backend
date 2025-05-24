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
            <h2>{{$category->translateOrDefault(locale())->title}}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
              <li><span>{{$category->translateOrDefault(locale())->slug}}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Banner -->

  <!-- Start Car Shop Area -->
  <div class="car-shop-area ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12">
          @include('qsale::frontend.aside-search')
        </div>
        <div class="col-lg-9 col-md-12">
          <div class="row">
            @foreach($ads as $ad)
              @include('qsale::frontend.single-grid')
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Car Shop Area -->
@endsection
