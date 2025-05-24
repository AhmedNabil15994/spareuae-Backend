@extends('apps::dashboard.layouts.app')
@section('title', __('attribute::dashboard.attributes.routes.create'))
@inject("attributeType" ,"Modules\Attribute\Enums\AttributeType")
@inject("attrs","Modules\Attribute\Entities\Attribute")


@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url(route('dashboard.home')) }}">{{ __('apps::dashboard.index.title') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ url(route('dashboard.attributes.index')) }}">
                        {{__('attribute::dashboard.attributes.routes.index')}}
                    </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">{{__('attribute::dashboard.attributes.routes.create')}}</a>
                </li>
            </ul>
        </div>

        <h1 class="page-title"></h1>

        <div class="row">
            <form id="form" role="form" class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" action="{{route('dashboard.attributes.store')}}">
                @csrf
                <div class="col-md-12" id="appVue">

                    {{-- RIGHT SIDE --}}
                    <div class="col-md-3">
                        <div class="panel-group accordion scrollable" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle"></a></h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse in">
                                    <div class="panel-body">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active">
                                                <a href="#general" data-toggle="tab">
                                                    {{ __('attribute::dashboard.attributes.form.tabs.general') }}
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#validation" data-toggle="tab">
                                                    {{ __('attribute::dashboard.attributes.form.tabs.validation') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PAGE CONTENT --}}
                    <div class="col-md-9">
                        <div class="tab-content">

                            {{-- CREATE FORM --}}
                            <div class="tab-pane active fade in" id="general">

                                <div class="col-md-10">
                                    {{--  tab for lang --}}
                                    <ul class="nav nav-tabs">
                                        @foreach (config('translatable.locales') as $code)
                                             <li class="@if($loop->first) active @endif"><a data-toggle="tab" href="#first_{{$code}}">{{ $code }}</a></li>
                                        @endforeach
                                    </ul>

                                     {{--  tab for content --}}
                                     <div class="tab-content">

                                        @foreach (config('translatable.locales') as $code)
                                            <div id="first_{{$code}}" class="tab-pane fade @if($loop->first) in active @endif">

                                                <div class="form-group">
                                                    <label class="col-md-2">
                                                        {{__('attribute::dashboard.attributes.form.name')}} - {{ $code }}
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="name[{{$code}}]" class="form-control" data-name="name.{{$code}}">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                {!! field()->text('description['.$code.']',
                                                __('attribute::dashboard.attributes.form.description').'-'.$code ,
                                                       null,
                                                    ['data-name' => 'description.'.$code]
                                                ) !!}
                                            </div>
                                        @endforeach

                                     </div>



                                     <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('Sort')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="number" name="sort" class="form-control" data-name="sort">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('attribute::dashboard.attributes.form.icon')}}
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="icon" data-preview="holder" class="btn btn-primary ">
                                                        <i class="fa fa-picture-o"></i>
                                                        {{__('apps::dashboard.buttons.upload')}}
                                                    </a>
                                                </span>
                                                <input name="icon" class="form-control image" type="file" >

                                            </div>
                                            <span class="holder" style="margin-top:15px;max-height:100px;">
                                            </span>
                                            <input type="hidden" data-name="image">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>



                                     <div class="form-group">
                                        <label class="col-md-2">
                                          {{__('attribute::dashboard.attributes.form.type')}}
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control type" v-model="type" name="type"  >
                                                @foreach ($attributeType::getConstList() as $type )
                                                    <option data-allow-options="{{$attributeType::checkAllowOptions($type)}}"
                                                             value="{{$type}}">{{ucfirst(str_replace("_", " ", $type))}}</option>
                                                @endforeach
                                            </select>

                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group" v-if="allowSetOptions">
                                        <label class="col-md-2">
                                          {{__('attribute::dashboard.attributes.form.options')}}
                                        </label>

                                        <div class="col-md-10">

                                            @foreach ( config('translatable.locales') as $code )
                                                <div class="row" >
                                                        <label class="col-md-2">
                                                            {{__('attribute::dashboard.attributes.form.name')}} - {{ $code }}
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text"  class="form-control" v-model="option.{{$code}}">
                                                            <div class="help-block"></div>
                                                        </div>
                                                </div>
                                            @endforeach

                                            @include("attribute::dashboard.attributes.components.nested-related-options",['model' => null])

                                            <button class="btn btn-block btn-info" :disabled="!isvalid" @click.prevent="addOptions">
                                                {{__('apps::dashboard.buttons.add_new')}}
                                            </button>

                                            <div>
                                                <table class="table">
                                                    <thead>
                                                        @foreach ( config('translatable.locales') as $code )
                                                            <th width="100px">
                                                                {{__('attribute::dashboard.attributes.form.name')}} - {{ $code }}
                                                            </th>
                                                        @endforeach
                                                        <th>{{__('attribute::dashboard.attributes.form.related_attributes')}}</th>
                                                        <th>{{__('attribute::dashboard.attributes.form.related_options')}}</th>
                                                        <th>
                                                            {{__('attribute::dashboard.attributes.datatable.status')}}
                                                        </th>
                                                        <th>
                                                            #
                                                        </th>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(option, index) in options" :key="'option_add' + index ">
                                                            <template v-for="code of lang" >
                                                                    <td>
                                                                        <input v-if="editIndexElment == index && editOption != null" type="text" :class="{invalid:editOption[code].length <=0}" v-model="editOption[code]"/>
                                                                        <template v-else>
                                                                            <span  >@{{option[code]}}</span>
                                                                            <input  type="hidden" class="from-controll" :value="option[code]" :name="`option[${index}][value][${code}]`" />
                                                                        </template>
                                                                    </td>
                                                            </template>
                                                            <td>
                                                              <template v-if="editIndexElment == index && editOption != null" type="text" :class="{invalid:editOption.parent_id.length <=0}" v-model="editOption.parent_id">
                                                                <select data-target="#relative_options" class="form-control parent_id" data-toggle="select2" :value="option.parent_id" :name="`option[${index}][parent_id]`"  v-model="option.parent_id" onchange="getOptionsById(this)">
                                                                  <option value=""></option>
                                                                  @foreach( $attrs->where('type','drop_down')->get() as $item)
                                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                                  @endforeach
                                                                </select>

                                                              </template>

                                                              <template v-else>
                                                                <span style="margin:0">@{{ option.parent }}</span>
                                                                <input  type="hidden" class="from-controll" :value="option.parent_id" :name="`option[${index}][parent_id]`" />
                                                              </template>

                                                            </td>
                                                            <td id="relative_options">
                                                              <template v-if="editIndexElment == index && editOption != null" type="text" :class="{invalid:editOption.related_options.length <=0}" v-model="editOption.related_options">
                                                                <select  class="form-control related_options" data-toggle="select2" :value="option.related_options" :name="`option[${index}][related_options]`" v-model="option.related_options"  multiple>
                                                                  <option value=""></option>
                                                                </select>
                                                              </template>

                                                              <template v-else>
                                                                <span style="margin:0">@{{ option.related }}</span>
                                                                <input type="hidden" class="from-control" :value="option.related_options" :name="`option[${index}][related_options]`" />
                                                              </template>

                                                            </td>
                                                            <td>
                                                                <input type="checkbox" v-model="option.status"  :value="option.status" :name="`option[${index}][status]`" />
                                                                <input class="hidden" type="checkbox" v-model="option.status"  :value="option.is_default" :name="`option[${index}][is_default]`" />
                                                            </td>
                                                            <td>
                                                                <template v-if="editIndexElment == index && editOption != null">
                                                                    <button :data-related="option.related_options" :data-target="option.parent_id" class="btn btn-warning" @click.prevent="saveEditOption()"><i class="fa fa-check-square" aria-hidden="true"></i></button>
                                                                    <button class="btn btn-danger" @click.prevent="cancleEditOption()"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                                </template>
                                                                <template v-else>
                                                                    <button :data-related="option.related_options" :data-target="option.parent_id" class="btn btn-warning" @click.prevent="editOptionData(index)"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                                    <button class="btn btn-danger" @click.prevent="removeOption(index)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                </template>
                                                            </td>
                                                      </tr>
                                                        <tr v-if="options.length > 0">
                                                            <td colspan="6">
                                                                <div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4">
                                                                          {{__('attribute::dashboard.attributes.form.option_default')}}
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control type" v-model="option_default"  v-on:change="setDefault()" >
                                                                                    <option v-for="(option, index)  in options" :value="'new_'+index":key="'new_'+index" >
                                                                                        @{{option[locale]}}
                                                                                    </option>
                                                                            </select>
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                      </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('attribute::dashboard.attributes.form.status')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch" checked id="test" data-size="small" name="status">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group" v-show="allowValidationNumber == true">
                                        <label class="col-md-2">
                                            {{__('attribute::dashboard.attributes.form.allow_from_to')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch"  id="allow_from_to" data-size="small" name="allow_from_to">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('attribute::dashboard.attributes.form.show_in_search')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch"  id="test2" data-size="small" name="show_in_search">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- END CREATE FORM --}}
                            {{-- CREATE FORM --}}
                            <div class="tab-pane  fade in" id="validation">

                                <div class="col-md-10">

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('attribute::dashboard.attributes.form.validation.required')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch"  id="test" data-size="small" name="validation[required]" value="1">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    {{-- handle show the validation number --}}
                                    <div v-show="allowValidationNumber == true">
                                        <div class="form-group">
                                            <label class="col-md-2">
                                            {{__('attribute::dashboard.attributes.form.limit')}}
                                            </label>
                                            <div class="col-md-9">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="">
                                                            <input type="text" :disabled="!allowValidationNumber" name="validation[min]" placeholder="  {{__('attribute::dashboard.attributes.form.validation.min')}}"  class="form-control " data-name="validation.min">
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="">
                                                            <input type="text" :disabled="!allowValidationNumber" name="validation[max]" placeholder="  {{__('attribute::dashboard.attributes.form.validation.max')}}"  class="form-control " data-name="validation.max">
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2">
                                            {{__('attribute::dashboard.attributes.form.allow_limit')}}
                                            </label>
                                            <div class="col-md-9">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <label class="col-md-7">
                                                                {{__('attribute::dashboard.attributes.form.validation.validate_min')}}
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="checkbox"  :disabled="!allowValidationNumber"  id="test" data-size="small" name="validation[validate_min]" value="1">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <label class="col-md-7">
                                                                {{__('attribute::dashboard.attributes.form.validation.validate_max')}}
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="checkbox"  :disabled="!allowValidationNumber"  id="test" data-size="small" name="validation[validate_max]" value="1">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('attribute::dashboard.attributes.form.validation.is_int')}}
                                            </label>
                                            <div class="col-md-9">
                                                <input type="checkbox"  :disabled="!allowValidationNumber"  id="test" data-size="small" name="validation[is_int]" value="1">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PAGE ACTION --}}
                    <div class="col-md-12">
                        <div class="form-actions">
                            @include('apps::dashboard.layouts._ajax-msg')
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-lg blue">
                                    {{__('apps::dashboard.buttons.add')}}
                                </button>
                                <a href="{{url(route('dashboard.attributes.index')) }}" class="btn btn-lg red">
                                    {{__('apps::dashboard.buttons.back')}}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@stop


@section("scripts")
  <style>
    .select2-container{
      width: 100% !important;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

    <script>
        var lang    = @json(config('translatable.locales')) ;
        var allowOptions = @json($attributeType::$allowOptions);
        var allowValidationNumber = @json($attributeType::$allowValidationNumber);
        var locale                 = "{{locale()}}";

        var afterSucessAjex = function(){
            vm.$data.type = "text"

        }

        $(function(){
            var typeSelect = $("")
            $(document).on('click','.btn.btn-warning',function () {
                $('[data-toggle="select2"]').select2({
                    placeholder: "Select",
                    allowClear: true
                });
                $(this).parents('tr').addClass('opened').find('select[data-target="#relative_options"]').val($(this).data('target')).trigger('change');
                // $(this).parents('tr.opened').children('td#relative_options').find('select').val($(this).data('related')).trigger('change');
            })
        })

        var vm = new Vue({
            el: '#appVue',
            data: {
                "type":"text" ,
                 "allowSetOptions":false   ,
                 editIndexElment:-1,
                 editOption : {},
                 locale: "ar",
                 option:{},
                 options:[],
                 option_default:null
            },
            created:function() {
                this.lang = lang
                this.locale = locale
            },
            methods: {
                setDefault:function(){
                    var select = this.option_default.split("_")

                    if(this.option_default){

                       var options =  this.options.map((option, index)=> {
                            var option = JSON.parse(JSON.stringify(option))
                            option.is_default= 0
                            return option
                        })
                        if(select[0]== "new")  {
                            options[parseInt(select[1]) ].is_default = 1
                        }


                        this.options = options;

                    }

                },
                addOptions:function(){
                    var obj =  JSON.parse(JSON.stringify(this.option))
                    obj = {
                      ...obj,
                      related_options: $('select[name="option_related_options[]"]').val() ? "[" + $('select[name="option_related_options[]"]').val() + "]" : null,
                      parent_id:  $('select[name="option[][parent_id]"]').val(),
                      related: $('select[name="option_related_options[]"] option:selected').toArray().map(item => item.text).join(),
                      parent:  $('select[name="option[][parent_id]"] option:selected').text(),
                    }

                    if(this.validationOption(obj)){
                        this.options.push({...obj,
                          status:1, is_default:0,
                        })
                        this.clearOptions()
                    }

                },
                clearOptions:function(){
                    for (const code of this.lang) {
                        this.$set(this.option, code, "")
                    }
                    $('[data-toggle="select2"]').val('').trigger('change')
                },
                validationOption:function(option){
                    if (Object.keys(option).length === 0) return false
                    for (const attr of lang) {
                      if(!option.hasOwnProperty(attr) || option[attr].length <= 0) return false
                    }
                    if(option.hasOwnProperty('parent_id') && option.parent_id.length &&
                      (option.hasOwnProperty('related_options')  && option.related_options === null) ){
                      return false
                    }
                    return true;
                },
                removeOption:function(index){
                    if(confirm("Are You Sure")) this.options.splice(index,1)
                },
                editOptionData:function(index){
                    this.editIndexElment = index;
                    let currentOption = this.options[index];
                    currentOption.related_options = Array.isArray(currentOption.related_options) ? currentOption.related_options : JSON.parse(currentOption.related_options)
                    this.editOption = {...currentOption}
                },
                saveEditOption:function(){
                    var obj =  JSON.parse(JSON.stringify(this.editOption))
                    obj = {
                      ...obj,
                      related_options: $('tr.opened select.related_options').val() ? "[" + $('tr.opened select.related_options').val() + "]" : null,
                      parent_id:  $('tr.opened select.parent_id').val(),
                      related: $('tr.opened select.related_options option:selected').toArray().map(item => item.text).join(),
                      parent:  $('tr.opened select.parent_id option:selected').text(),
                    }
                    if(this.validationOption(obj)){
                            this.$set(this.options, this.editIndexElment, obj)
                            this.editOption = null ,
                            this.editIndexElment = -1
                    }
                    $('.table .select2-container').remove();
                    $('tr.opened').removeClass('opened');
                },
                cancleEditOption:function(){
                    this.editOption = null ;
                    this.editIndexElment = -1
                    $('.table .select2-container').remove();
                    $('tr.opened').removeClass('opened');
                }
            },
            computed:{
                isvalid:function(){
                    return this.validationOption(this.option)
                },
                "allowValidationNumber":function(){
                    return allowValidationNumber.includes(this.type)
                }
            },
            watch:{
                "type" : function(val, old){
                   if(allowOptions.includes(val)){
                       this.allowSetOptions = true
                   }
                   else{
                         this.allowSetOptions = false
                         this.options = [];
                         this.option  = {};
                   }
                }
            }
        })


    </script>
@stop
