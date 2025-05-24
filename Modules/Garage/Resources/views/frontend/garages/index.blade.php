@extends('apps::frontend.layouts.app')
@section('content')
<div class="dealers-section ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="dl_listing">
                    <div class="row g-4 justify-content-center">
                        @foreach($garages as $key => $garage)
                        <div class="col-lg-3 col-sm-6">
                            @include('garage::frontend.single-grid')
                        </div>
                        @endforeach
                    </div>
                    {{ $garages->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
