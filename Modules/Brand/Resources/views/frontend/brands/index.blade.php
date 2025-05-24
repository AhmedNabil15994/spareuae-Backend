@extends('apps::frontend.layouts.app')
@section( 'content')
<section class="brands-section ptb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="at-section-title text-center">
                    <span class="at-subtitle lead text-primary position-relative">{{ __('Browse Top Car') }}</span>
                    <h2 class="mt-1 mb-0 h2">{{ __('Popular Car Body Types') }}</h2>
                </div>
            </div>
        </div>
        <div class="ct-row d-flex align-items-center justify-content-center flex-wrap mt-5">
            @foreach($brands as $key => $brand)
            <div class="ct-col">
                <div class="brand-card text-center bg-white position-relative rounded">
                    <h5>{!! $brand->title !!}</h5>
                    <span class="brand-cat">({{ $brand->questions_count }})</span>
                    <a href="{{ route('frontend.brands.show',$brand->id) }}" class="explore-btn position-absolute text-white"><i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
