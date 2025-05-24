{!! field()->langNavTabs() !!}
<div class="tab-content">
  @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
  <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}" id="first_{{$code}}">
    {!! field()->text('title['.$code.']',
    __('brand::dashboard.brands.form.title').'-'.$code ,
    $model->getTranslation('title',$code),
    ['data-name' => 'title.'.$code]
    ) !!}
    {!! field()->text('description['.$code.']',
    __('brand::dashboard.brands.form.description').'-'.$code ,
    $model->getTranslation('desc',$code),
    ['data-name' => 'description.'.$code]
    ) !!}
  </div>
  @endforeach
</div>
{!! field()->file('image', __('brand::dashboard.brands.form.image'), $model->getFirstMediaUrl('images')) !!}
{!! field()->checkBox('status', __('brand::dashboard.brands.form.status')) !!}
@if ($model->trashed())
{!! field()->checkBox('trash_restore', __('brand::dashboard.brands.form.restore')) !!}
@endif
