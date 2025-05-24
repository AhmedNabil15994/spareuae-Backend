@inject("attrs","Modules\Attribute\Entities\Attribute")
<div class="row">
  <label class="col-md-2">
    {{__('attribute::dashboard.attributes.form.related_attributes')}}
  </label>
  <div class="col-md-9">
    <select class="form-control select2" data-toggle="select2" name="option[][parent_id]" data-target="#related_options_container" onchange="getOptionsById(this)">
        <option value=""></option>
        @foreach( $attrs->where('type','drop_down')->get() as $item)
        <option value="{{$item->id}}" {{$item->id == optional($model)->parent_id ? 'selected' : ''}}>{{$item->name}}</option>
      @endforeach
    </select>
    <div class="help-block"></div>
  </div>
</div>

<div id="related_options_container" style="display: {{optional($model)->parent_id ? 'block' : 'none'}}">
  <div class="row">
    <label class="col-md-2">
      {{__('attribute::dashboard.attributes.form.related_options')}}
    </label>
    <div class="col-md-9">
      <select class="form-control select2" data-toggle="select2" name="option_related_options[]" multiple>
        <option value=""></option>
        @foreach( optional(optional(optional(optional($model)->parent)->options))->get() ?? [] as $option)
          <option value="{{$option->id}}">{{$option->value}}</option>
        @endforeach
      </select>
      <div class="help-block"></div>
    </div>
  </div>
{{--    {!! field()->multiSelect('option[][related_options]',  __('attribute::dashboard.attributes.form.related_options') ,--}}
{{--        ->pluck('value','id'))->toArray() ?? [],--}}
{{--        optional($model)->related_options ?? null,--}}
{{--        [--}}
{{--            'v-model' => 'option.related_options',--}}
{{--        ])--}}
{{--    !!}--}}
</div>

@push("scripts")
    <script>

        $('select[name="type"]').on('change',function (){
            $('[data-toggle="select2"]').select2({
                placeholder: "Select",
                allowClear: true
            });
        });
        function getOptionsById(attr) {

            attr = $(attr);
            var opiton_container = $(attr.data('target'));
            var options_selector = $(attr.data('target')+' select');
            var id = attr.val();

            $.ajax({
                method: "GET",
                url: '{{route('dashboard.attributes.get_options_by_attr_id')}}?attr_id=' + id,
                beforeSend: function () {
                    options_selector.empty();
                    opiton_container.hide();
                },
                success: function (data) {
                    var options = '';
                    $.each(data.data, function (index, option) {
                        options += '<option value="' + index + '">' + option + '</option>';
                    });

                    options_selector.append(options);
                    opiton_container.show();
                }
            });
        }
    </script>
@endpush
