@extends('apps::frontend.layouts.app')

@section('content')
<section class="car-listing-section ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="car_listing_sidebar">
                    <h4 class="mb-2">{{ __('Add Your Garage Information') }}</h4>
                    <p class="mb-0">{{ __('Holistically embrace high standards in information.') }}</p>
                    <div class="car_listing_nav mt-4">
                        <ul>
                            <li><a href="#basic" class="active">{{ __('Basic Info') }}</a></li>
                            <li><a href="#gallery">{{ __('Garage Logo') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="car_listing_form">
                    @include('apps::frontend.layouts._message')
                    @if($errors->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('frontend.garages.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="listing_info_box bg-white rounded" id="basic">
                            <h5 class="mb-4">{{ __('Basic info') }}</h5>
                            <div class="row">
                                {!! field()->text('title',__('garage::dashboard.garages.form.title')) !!}
                                {!! field()->text('address',__('garage::dashboard.garages.form.address')) !!}
                                {!! field()->text('mobile',__('garage::dashboard.garages.form.mobile')) !!}
                                {!! field()->text('info[email]',__('email'),field_attributes:['data-name'=>'info.email']) !!}
                                {!! field()->text('info[facebook]',__('facebook'),field_attributes:['data-name'=>'info.facebook']) !!}
                                {!! field()->text('info[linkedin]',__('linkedin'),field_attributes:['data-name'=>'info.linkedin']) !!}
                                {!! field()->text('info[twitter]',__('twitter'),field_attributes:['data-name'=>'info.twitter']) !!}
                                {!! field()->text('info[instagram]',__('instagram'),field_attributes:['data-name'=>'info.instagram']) !!}
                                {!! field()->text('info[time_from]',__('garage::dashboard.garages.form.open_time_from'),
                                field_attributes:['data-name'=>'info.time_from','class'=>'form-control timepicker 24_format','readonly'=>true]) !!}
                                {!! field()->text('info[time_to]',__('garage::dashboard.garages.form.open_time_to'),
                                field_attributes:['data-name'=>'info.time_to','class'=>'form-control timepicker 24_format' ,'readonly'=>true]) !!}
                                {!! field()->textarea('desc',__('garage::dashboard.garages.form.desc')) !!}
                            </div>
                        </div>
                        <div class="listing_info_box bg-white rounded mt-40" id="gallery">
                            <h4 class="mb-4">{{ __('Garage Logo') }}</h4>
                            <ul class="list-content">
                                <li>{{ __('The maximum photo size is 8 MB. Formats: jpeg, jpg, png. Put the main picture first') }}</li>
                            </ul>
                            <div class="file_upload mt-4">
                                <input type="file" class="file_upload_field" name="image">
                                <button class="btn btn-primary btn-md" type="button"><span class="me-2 ms-2"><i
                                            class="fa-solid fa-arrow-up-from-bracket"></i></span>{{ __('Upload Logo') }}</button>
                                <span class="file_name d-block fw-semibold mt-1">{{ __('or Drag them in') }}</span>
                            </div>
                        </div>
                        <div class="form-btns d-flex align-items-center mt-40">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Garage') }}<span class="ms-2 me-2"><i class="fa-solid fa-arrow-right"></i></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<style>
    .is_full_day {
        margin-left: 15px;
        margin-right: 15px;
    }

    .collapse-custom-time {
        display: none;
    }

    .times-row {
        margin-bottom: 5px;
    }

    .ui-timepicker-standard {
        z-index: 1000 !important;
    }

</style>
@endpush


@push('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    var timePicker = $(".timepicker");
        timePicker.timepicker({timeFormat: 'h:mm p',interval: 60});

</script>
@endpush
