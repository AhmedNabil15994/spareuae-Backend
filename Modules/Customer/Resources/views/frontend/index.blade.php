@extends('apps::frontend.layouts.app')
@section('title', __('apps::frontend.index.clients'))
@section('content')
  <section class="page-head align-items-center d-flex text-center">
    <div class="container">
      <h1>{{ __('apps::frontend.index.clients') }}</h1>
    </div>
  </section>
  <div class="inner-page grey-bg">
    <div class="container">
      <div class="row clients">
        @foreach ($customers as $customer)
          <div class="col-md-3 col-6">
            <div class="client-block">
              <img class="img-fluid" src="{{ $customer->getFirstMediaUrl('images') }}" alt="" />
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection
