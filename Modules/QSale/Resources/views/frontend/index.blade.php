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
            <h2>{{trans('apps::frontend.home.all')}}</h2>
            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
              <li><span>{{trans('apps::frontend.home.all')}}</span></li>
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
        <div class="col-lg-12 col-md-12">
          <button class="filterbtn" type="button" onclick="toggleFilterCollapse()">
            <i class="bx bx-filter-alt"></i>
          </button>
        </div>
        <div class="col-lg-3 col-md-12 filter_collapse" id="filter">
          @include('qsale::frontend.aside-search')
        </div>
        <div class="col-lg-9 col-md-12">
          <br>
          <br>
          <div class="row">
            @forelse($ads as $ad)
              @include('qsale::frontend.single-grid')
            @empty

              <div class="alert alert-danger" role="alert">
               @lang("No data found")
              </div>
            @endforelse
            <div class="col-lg-12 col-md-12">
              {{ $ads->links('vendor.pagination.default') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Car Shop Area -->
@endsection
@section("scripts")
<script>
  function toggleFilterCollapse(){

    $('#filter').removeClass('filter_collapse')
    $('#filter').collapse('toggle')
  }
</script>
@stop