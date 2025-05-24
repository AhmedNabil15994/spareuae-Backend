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
              <h2>{{!empty($show->setting) ? $show->setting['show_name'] : $show->name}}</h2>

              <ul class="pages-list">
                <li><a href="{{URL::current()}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
                <li><a href="{{URL::to('/car-shows')}}">{{trans('apps::frontend.pages.car_shows.title')}}</a></li>
                <li><span>{{!empty($show->setting) ? $show->setting['show_name'] : $show->name}}</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->


    <!-- Start Products Details Area -->
    <section class="products-details-area bg-color ptb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="products-details-image">
              <img src="{{!empty($show->setting) && isset($show->setting['show_logo']) ? url($show->setting['show_logo']) : url($show->image)}}" alt="image">
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="products-details-desc">
              <div class="product-content">
                <h3>{{!empty($show->setting) ? $show->setting['show_name'] : $show->name}}<i class='bx bxs-check-circle'></i></h3>
                <p>{{!empty($show->setting) ? $show->setting['show_description'] : ''}}</p>

                @if(!empty($show->setting))
                <ul class="products-info">
                  <li><span><i class='bx bxl-whatsapp'></i></span> <a href="#" class="phone-dir">{{isset($show->setting['show_phone']) ? $show->setting['show_phone'] : ''}}</a></li>
                  <li><span><i class='bx bxs-envelope'></i></span> <a href="#">{{isset($show->setting['show_email']) ? $show->setting['show_email'] : ''}}</a></li>
                  <li><span><i class='bx bxs-map'></i></span> <a href="#">{{isset($show->setting['show_address']) ? $show->setting['show_address'] : ''}}</a></li>
                </ul>
                @endif
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Products Details Area -->
@endsection
