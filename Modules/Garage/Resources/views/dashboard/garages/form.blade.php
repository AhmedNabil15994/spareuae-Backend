@section('css')
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
@endsection



{!! field()->text('title',__('garage::dashboard.garages.form.title')) !!}

{!! field()->text('desc',__('garage::dashboard.garages.form.desc')) !!}
{!! field()->text('address',__('garage::dashboard.garages.form.address')) !!}


{!! field()->text('mobile',__('garage::dashboard.garages.form.mobile')) !!}
{!! field()->file('image', __('garage::dashboard.garages.form.image'), $model->getFirstMediaUrl('images')) !!}



{!! field()->text('info[time_from]',__('garage::dashboard.garages.form.open_time_from'),
field_attributes:['data-name'=>'info.time_from','class'=>'form-control timepicker 24_format']) !!}

{!! field()->text('info[time_to]',__('garage::dashboard.garages.form.open_time_to'),
field_attributes:['data-name'=>'info.time_to','class'=>'form-control timepicker 24_format']) !!}

{!! field()->text('info[email]',__('email'),field_attributes:['data-name'=>'info.email']) !!}
{!! field()->text('info[facebook]',__('facebook'),field_attributes:['data-name'=>'info.facebook']) !!}
{!! field()->text('info[linkedin]',__('linkedin'),field_attributes:['data-name'=>'info.linkedin']) !!}
{!! field()->text('info[twitter]',__('twitter'),field_attributes:['data-name'=>'info.twitter']) !!}
{!! field()->text('info[instagram]',__('instagram'),field_attributes:['data-name'=>'info.instagram']) !!}
{!! field()->text('info[lat]',__('lat'),field_attributes:['data-name'=>'info.lat']) !!}
{!! field()->text('info[long]',__('long'),field_attributes:['data-name'=>'info.long']) !!}

{!! field()->checkBox('status', __('garage::dashboard.garages.form.status')) !!}
{!! field()->checkBox('is_certified', __('garage::dashboard.garages.form.certified')) !!}


@if ($model->trashed())
{!! field()->checkBox('trash_restore', __('garage::dashboard.garages.form.restore')) !!}
@endif
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
  var timePicker = $(".timepicker");
        timePicker.timepicker({timeFormat: 'h:mm p',interval: 60});

</script>
@endsection
