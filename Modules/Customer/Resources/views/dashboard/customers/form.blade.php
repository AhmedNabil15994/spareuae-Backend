{{-- {!! field()->langNavTabs() !!}
<div class="tab-content">
  @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
    <div class="tab-pane fade in {{ $code == locale() ? 'active' : '' }}" id="first_{{ $code }}">
      {!! field()->text('title[' . $code . ']', __('customer::dashboard.customers.form.title') . '-' . $code, $model->getTranslation('title', $code), ['data-name' => 'title.' . $code]) !!}
    </div>
  @endforeach
</div> --}}


{!! field()->file('image', __('customer::dashboard.customers.form.image'), $model ? $model->getFirstMediaUrl('images') : null) !!}
{!! field()->checkBox('status', __('customer::dashboard.customers.form.status')) !!}
