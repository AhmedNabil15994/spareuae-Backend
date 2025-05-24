@inject('brands', 'Modules\Brand\Entities\Brand')


{!! field()->text('question',
__('question::dashboard.questions.form.question')) !!}
{!! field()->textarea('answer',__('question::dashboard.questions.form.answer')) !!}
{!! field()->textarea('desc',__('question::dashboard.questions.form.answer')) !!}

{!! field()->select('brand_id',__('question::dashboard.questions.form.brands'),$brands->pluck('title','id') ) !!}
{!! field()->checkBox('status', __('question::dashboard.questions.datatable.status')) !!}
@if ($model->trashed())
{!! field()->checkBox('trash_restore', __('slider::dashboard.sliders.form.restore')) !!}
@endif
