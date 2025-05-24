<style>
  .hidden{display: none !important;;}
  .form-control{
    background-color: #FFF !important;
    color: #666666 !important;
    height: 50px !important;
  }
</style>
<form class="search-form" method="get" action="{{URL::current()}}">
  <aside class="widget-area">
  <div class="widget widget_search">
    <div class="search-form form">
      <label>
        <span class="screen-reader-text">{{trans('apps::frontend.layout.header.search_title')}}</span>
        <input type="text" name="search" class="search-field" value="{{Request::has('search') ? Request::get('search') : ''}}" placeholder="{{trans('apps::frontend.layout.header.search')}}">
      </label>
      <button type="submit">
        <i class='bx bx-search-alt'></i>
      </button>
    </div>
  </div>

  <div class="widget widget_filter_results">
    <h3 class="widget-title">{{trans('apps::frontend.layout.header.filter_results')}}</h3>

    <div class="form">
      <div class="form-group">
        <select name="orderType">
          <option value="">{{trans('apps::frontend.layout.header.sort_by')}}</option>
          <option value="id" {{Request::has('orderType') && Request::get('orderType') == 'id' ? 'selected' : ''}}>{{trans('apps::frontend.layout.header.creation_date')}}</option>
          <option value="price" {{Request::has('price') && Request::get('price') == 'id' ? 'selected' : ''}}>{{trans('apps::frontend.layout.header.price')}}</option>
          <option value="year" {{Request::has('year') && Request::get('year') == 'id' ? 'selected' : ''}}>{{trans('apps::frontend.layout.header.year')}}</option>
        </select>
      </div>
      <div class="form-group">
        <select name="orderSort">
          <option value="">{{trans('apps::frontend.layout.header.sorting')}}</option>
          <option value="asc" {{Request::has('orderSort') && Request::get('orderSort') == 'asc' ? 'selected' : ''}}>{{trans('apps::frontend.layout.header.asc')}}</option>
          <option value="desc" {{Request::has('orderSort') && Request::get('orderSort') == 'desc' ? 'selected' : ''}}>{{trans('apps::frontend.layout.header.desc')}}</option>
        </select>
      </div>
      @if($category)
        <div class="form-group">
          <label>{{trans('qsale::frontend.preview_payment.type')}}:</label>
          <select name="sub_category_id">
            <option value="">{{trans('qsale::frontend.preview_payment.type')}}</option>
            @foreach($category->children as $child)
              <option value="{{$child->id}}">{{$child->translateOrDefault(locale())->title}}</option>
            @endforeach
          </select>
        </div>
      @endif
        @php
            $requestAttrs = Request::has('attribute') ? Request::get('attribute') : [];
        @endphp

        @foreach($attributes as $key => $oneAttr)
        @if ($loop->index == 3)
          <div class="form-group">
            <label>{{trans('qsale::dashboard.packages.datatable.price')}}:</label>
            <input class="form-control" type="text" name="price_range" class="form-control" placeholder="{{trans('qsale::dashboard.packages.datatable.price')}}"
                  value="{{Request::has('price_range') ? Request::get('price_range') : ''}}">

          </div>
        @endif
          <div class="form-group" id="{{$oneAttr->id}}_attribute_container"
            style="display: {{$oneAttr->parent_id ? 'none' : 'block'}}">
            <label>{{$oneAttr->translateOrDefault(locale())->name}} :</label>
            @if ($oneAttr->type == "drop_down")
            @php $options = ''; @endphp
            @foreach ($oneAttr->options as $option)
            @php
              $options.= '<option value="'.$option->id.'" '.(
                  !empty($requestAttrs) && isset($requestAttrs[$oneAttr->id]) && isset($requestAttrs[$oneAttr->id]['option_id'][0]) && (int)$requestAttrs[$oneAttr->id]['option_id'][0] == $option->id
                  ? 'selected' : '').' >'.$option->value.'</option>';
            @endphp
            @endforeach
              <select class="form-control" name="attribute[{{$oneAttr->id}}][option_id][0]"
                data-id="{{$oneAttr->id}}"
                onchange="changeSelectors(this)">
                <option value="">{{$oneAttr->translateOrDefault(locale())->name}}</option>
                {!! $options !!}
              </select>

            @elseif ($oneAttr->type == "radio")

            @php $radio = '<div class"row">'; @endphp
            @foreach ($oneAttr->options as $option)
              @php
                $radio.= '<div class="col-md-4">'.
                            '<label class="mx-2 for="radi_'.$option->id.'">'.$option->value.'</label>'.
                            '<input type="radio" name="attribute['.$oneAttr->id.'][option_id][0]" id="radi_'.$option->id.'" value="'.$option->id.'"  '.(
                              !empty($requestAttrs) && isset($requestAttrs[$oneAttr->id]) && isset($requestAttrs[$oneAttr->id]['option_id'][0]) && (int)$requestAttrs[$oneAttr->id]['option_id'][0] == $option->id
                              ? 'checked' : '').'>'.
                         '</div>';
              @endphp
            @endforeach
            @php $radio.= "</div>"; @endphp
            {!! $radio !!}

            @elseif ($oneAttr->type == "boolean")

            <input type="checkbox"   class="" value="1"  name="attribute[{{$oneAttr->id}}][value]" >

            @else

              <input type="{{$oneAttr->type}}" class="form-control" placeholder="{{$oneAttr->translateOrDefault(locale())->name}}"
                     name="attribute[{{$oneAttr->id}}][value]"
                     value="{{ !empty($requestAttrs) && isset($requestAttrs[$oneAttr->id]) && isset($requestAttrs[$oneAttr->id]['value']) ? $requestAttrs[$oneAttr->id]['value'] : ''}}">

            @endif
          </div>
        @endforeach
{{--      @endif--}}


    </div>

  </div>

</aside>
</form>
@push('scripts')
<script>
  let relatedAttrs = @json($allAttributesForRelated??[]);
  let searchAttribute = @json(handlingAttrsInRequest()??[]);


  function refreshSearchSelectors(){
    if(searchAttribute.length){

      searchAttribute.map((attr) => {

      if(relatedAttrs.filter(relatedAttr => relatedAttr.parent == attr.id).length && attr.options.length){

        switchVisableityForRelatedAttrs(attr.id,attr.options[0]);
      }
    });
    }
  }

  function changeSelectors(selector){

    selector = $(selector);
    let parentID = selector.attr("data-id");
    let value = selector.val();
    switchVisableityForRelatedAttrs(parentID,value);

  }

  function switchVisableityForRelatedAttrs(parentID,value){

    let showAttrs = relatedAttrs.filter(attr => attr.parent == parentID);

    showAttrs.map((attr) => {
      if(attr.related_options.filter(option => option == value).length)
          $(`#${attr.id}_attribute_container`).show();
      else
          $(`#${attr.id}_attribute_container`).hide();
    });
  }
  refreshSearchSelectors();
</script>
@endpush
