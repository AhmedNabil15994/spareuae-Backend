{{-- {!! field()->text('title',__('qsale::dashboard.ads.form.title')) !!}
{!! field()->textarea('description',__('qsale::dashboard.ads.form.description'),field_attributes:['class'=>'form-control']) !!} --}}

<ul class="nav nav-tabs">
    @foreach (config('translatable.locales') as $code)
        <li class="@if ($loop->first) active @endif"><a data-toggle="tab"
                href="#first_{{ $code }}">{{ $code }}</a></li>
    @endforeach
</ul>

{{-- tab for content --}}
<div class="tab-content">
    @foreach (config('translatable.locales') as $code)
        <div id="first_{{ $code }}" class="tab-pane fade @if ($loop->first) in active @endif">

            <div class="form-group">
                <label class="col-md-2">
                    {{ __('qsale::dashboard.ads.form.title') }} - {{ $code }}
                </label>
                <div class="col-md-9">
                    <input type="text" name="title[{{ $code }}]" class="form-control"
                        data-name="title.{{ $code }}"
                        value="{{ isset($model) ? $model->getTranslation('title', $code) : '' }}">
                    <div class="help-block"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2">
                    {{ __('qsale::dashboard.ads.form.description') }}
                    - {{ $code }}
                </label>
                <div class="col-md-9">
                    <textarea name="description[{{ $code }}]" rows="8" cols="80" class="form-control"
                        data-name="description.{{ $code }}">{{ isset($model) ? $model->getTranslation('description', $code) : '' }}</textarea>
                    <div class="help-block"></div>
                </div>
            </div>

          <div class="form-group">
            <label class="col-md-2">
              {{ __('qsale::dashboard.special_specification') }}
              - {{ $code }}
            </label>
            <div class="col-md-9">
                    <textarea name="special_specification[{{ $code }}]" rows="8" cols="80" class="form-control"
                              data-name="special_specification.{{ $code }}">{{ isset($model) ? $model->getTranslation('special_specification', $code) : '' }}</textarea>
              <div class="help-block"></div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2">
              {{ __('qsale::dashboard.malfunctions') }}
              - {{ $code }}
            </label>
            <div class="col-md-9">
                    <textarea name="malfunctions[{{ $code }}]" rows="8" cols="80" class="form-control"
                              data-name="malfunctions.{{ $code }}">{{ isset($model) ? $model->getTranslation('malfunctions', $code) : '' }}</textarea>
              <div class="help-block"></div>
            </div>
          </div>

        </div>
    @endforeach
</div>


{{-- {!! field()->number(
    'price',
    __('qsale::dashboard.ads.form.price'),
    $model->price ?? '',
    field_attributes: ['min' => '0'],
) !!} --}}

<div class="form-group">
    <label class="col-md-2">
        {{ __('qsale::dashboard.ads.form.price') }}
    </label>
    <div class="col-md-9">
        <input type="number" step="0.001" min="0" name="price" class="form-control" data-name="price"
            value="{{ $model->price ?? '' }}">
        <div class="help-block"></div>
    </div>
</div>

{!! field()->text(
    'settings[country]',
    __('qsale::dashboard.ads.form.country'),
    field_attributes: ['data-name' => 'settings.model'],
) !!}
