@inject("attrs","Modules\Attribute\Entities\Attribute")
{!! field()->select('parent_id', 
    __('attribute::dashboard.attributes.form.related_attributes'),
    $attrs->where('type','drop_down')->pluck("name","id")->toArray(),optional($model)->parent_id ?? null,
        [
            'onchange' => 'getOptionsById(this)',
        ]
) !!}
{{-- {{dd(optional($model)->parent->options->pluck('value','id')->toArray())}} --}}
<div id="related_options_container" style="display: {{optional($model)->parent_id ? 'block' : 'none'}}">
    {!! field()->multiSelect('options',  __('attribute::dashboard.attributes.form.related_options') ,
        optional(optional(optional(optional($model)->parent)->options)->pluck('value','id'))->toArray() ?? [],
        optional($model)->related_options ?? null) 
    !!}
</div>

@push("scripts")
    <script>

        function getOptionsById(attr) {

            attr = $(attr);
            var opiton_container = $('#related_options_container');
            var options_selector = $('#options');
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