@extends('apps::dashboard.layouts.app')
@section('title', __('qsale::dashboard.ads.routes.create'))
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
                        <a href="{{ url(route('dashboard.ads.index')) }}">
                            {{ __('qsale::dashboard.ads.routes.index') }}
                        </a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">{{ __('qsale::dashboard.ads.routes.create') }}</a>
                    </li>
                </ul>
            </div>

            <h1 class="page-title"></h1>

            <div class="row">
                {!! Form::model($model ?? null, [
                    'url' => route('dashboard.ads.store'),
                    'id' => 'form',
                    'role' => 'form',
                    'method' => 'POST',
                    'class' => 'form-horizontal form-row-seperated',
                    'files' => true,
                ]) !!}
                @csrf
                <div class="col-md-12">

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
                                                    {{ __('qsale::dashboard.ads.form.tabs.general') }}
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#user" data-toggle="tab">
                                                    {{ __('qsale::dashboard.ads.form.tabs.user') }}
                                                </a>
                                            </li>

                                            <li class="">
                                                <a href="#attachs" data-toggle="tab">
                                                    {{ __('qsale::dashboard.ads.form.tabs.attachs') }}
                                                </a>
                                            </li>

                                            <li class="">
                                                <a href="#videoGalleries" data-toggle="tab">
                                                    {{ __('qsale::dashboard.ads.form.tabs.video_gallery') }}
                                                </a>
                                            </li>

                                            <li class="">
                                                <a href="#categories" data-toggle="tab">
                                                    {{ __('qsale::dashboard.ads.form.tabs.categories') }}
                                                </a>
                                            </li>

                                            <li class="">
                                                <a href="#attrbiutes" data-toggle="tab">
                                                    {{ __('qsale::dashboard.ads.form.tabs.attrbiutes') }}
                                                </a>
                                            </li>

                                            <li class="">
                                                <a href="#address" data-toggle="tab">
                                                    {{ __('qsale::dashboard.ads.form.tabs.address') }}
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
                                    @include('qsale::dashboard.ads.form')
                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.mobile') }}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" name="mobile" id="mobile" class="form-control "
                                                data-name="mobile">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.hide_private_number') }}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch" value="1"
                                                id="hide_private_number" data-size="small" name="hide_private_number">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                  <label class="col-md-2">
                    {{ __('qsale::dashboard.ads.datatable.user_type') }}
                  </label>
                  <div class="col-md-9">
                    <select class="form-control" name="user_type" id="user_type">
                      @foreach (Modules\User\Enums\UserType::getConstList() as $type)
                      @if ($type != Modules\User\Enums\UserType::ADMIN)
                      <option data-url="{{Modules\User\Enums\UserType::routeSelect2($type)}}" value="{{$type}}">{{ucfirst(str_replace("_", " ", $type))}}
                      </option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div> --}}

                                    <input type="hidden" name="user_type" id="user_type" value="user">


                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.image') }}
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image" data-preview="holder" class="btn btn-primary ">
                                                        <i class="fa fa-picture-o"></i>
                                                        {{ __('apps::dashboard.buttons.upload') }}
                                                    </a>
                                                </span>
                                                <input name="image" class="form-control image" type="file">

                                            </div>
                                            <span class="holder" style="margin-top:15px;max-height:100px;">
                                            </span>
                                            <input type="hidden" data-name="image">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.status') }}
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" name="status">

                                                @foreach (Modules\QSale\Enum\AdsStatus::getConstList() as $status)
                                                    @if (!in_array($status, ['wait']))
                                                        <option value="{{ $status }}">{{ $status }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                  <label class="col-md-2">
                    {{ __('qsale::dashboard.ads.form.country_id') }}
                  </label>
                  <div class="col-md-9">
                    <select name="country_id" id="country" class="form-control select2" data-name="country_id">
                      @foreach ($countries as $country)
                      <option value="{{$country->id}}"> {{$country->translateOrDefault(locale())->title}}</option>
                      @endforeach
                    </select>
                    <div class="help-block"></div>
                  </div>
                </div> --}}

                                    {{-- <div class="form-group">
                  <label class="col-md-2">
                    {{ __('qsale::dashboard.ads.form.city_id') }}
                  </label>
                  <div class="col-md-9">
                    <select name="city_id" id="city" disabled data-current="" class="form-control" data-name="city_id">

                    </select>
                    <div class="help-block"></div>
                  </div>
                </div> --}}

                                    {{-- <div class="form-group">
                  <label class="col-md-2">
                    {{ __('qsale::dashboard.ads.form.state_id') }}
                  </label>
                  <div class="col-md-9">
                    <select name="state_id" id="state" disabled data-current="" class="form-control" data-name="state_id">

                    </select>
                    <div class="help-block"></div>
                  </div>
                </div> --}}

                                    {{-- <div class="form-group">
                  <label class="col-md-2">
                    {{ __('qsale::dashboard.ads.form.addations') }}
                  </label>
                  <div class="col-md-9">
                    <select name="addations[]" id="addations" class="form-control select2" multiple data-name="addations.*">
                      @foreach ($addations as $addation)
                      <option value="{{$addation->id}}"> {{$addation->name}}</option>
                      @endforeach
                    </select>
                    <div class="help-block"></div>
                  </div>
                </div> --}}

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.ad_types') }}
                                        </label>
                                        <div class="col-md-9">
                                            <select name="ad_types[]" id="ad_types" class="form-control select2" multiple
                                                data-name="ad_types.*">
                                                @foreach ($ad_types as $ad_type)
                                                    <option value="{{ $ad_type->id }}"> {{ $ad_type->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane  fade in" id="user">
                                <div class="col-md-10">
                                    @include('qsale::dashboard.ads.tabs.user-info')
                                    {{-- <div class="form-group">
                  <label class="col-md-2">
                    {{ __('qsale::dashboard.ads.form.user_id') }}
                  </label>
                  <div class="col-md-9">
                    <select name="user_id" id="user_id" class="form-control " style="width: 100%;" data-name="user_id">
                      @foreach ($users as $user)
                      <option value="{{$user->id}}"> {{$user->name}} @if ($user->type == 'office' && $user->office)
                        -<span style="color: red"> ({{optional($user->office)->title}}) </span>
                        @endif
                      </option>
                      @endforeach
                    </select>
                    <div class="help-block"></div>
                  </div>
                </div> --}}

                                    <input type="hidden" id="user_id" name="user_id"
                                        value="{{ \Modules\User\Entities\User::first()->id }}" data-name="user_id" />


                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.take_from_subscription') }}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch" id="test" data-size="small"
                                                value="1" name="take_from_subscription">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.start_at') }}
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group input-medium date date-picker"
                                                data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                                                <input type="text" class="form-control out_item"
                                                    value="{{ date('Y-m-d') }}" name="start_at">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.duration') }}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="number" min="0" class="form-control"
                                                cldata-size="small"
                                                value="{{ setting('other', 'default_duration') ?? 0 }}" name="duration">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.ads_price') }}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="number" min="0" class="form-control"
                                                cldata-size="small" value="{{ setting('other', 'default_price') ?? 0 }}"
                                                name="ads_price">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                            <div class="tab-pane  fade in" id="videoGalleries">
                                <div class="col-md-10">
                                    @include('qsale::dashboard.ads.tabs.galleries-form')
                                </div>
                            </div>
                            {{-- END CREATE FORM --}}
                            {{-- CREATE FORM --}}
                            <div class="tab-pane  fade in" id="attachs">

                                <div class="col-md-10">

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{ __('qsale::dashboard.ads.form.attachs') }}
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image" data-preview="holder" class="btn btn-primary ">
                                                        <i class="fa fa-picture-o"></i>
                                                        {{ __('qsale::dashboard.ads.form.attachs') }}
                                                    </a>
                                                </span>
                                                <input name="attachs[]" multiple class="form-control image"
                                                    type="file">

                                            </div>
                                            <span class="holder" style="margin-top:15px;max-height:100px;">
                                            </span>
                                            <input type="hidden" data-name="attachs">
                                            <div class="help-block"></div>
                                        </div>

                                    </div>






                                </div>
                            </div>
                            {{-- END CREATE FORM --}}
                            {{-- tab categories --}}
                            <div class="tab-pane fade in" id="categories">


                                <div class="user jstree">

                                    @include('qsale::dashboard.tree.ads.view', [
                                        'mainCategories' => $normalCategories,
                                    ])
                                </div>

                                {{-- <div class="company jstree">
                @include('qsale::dashboard.tree.ads.view',['mainCategories' => $companyCategories])
              </div> --}}

                                {{-- <div class="technical jstree">
                @include('qsale::dashboard.tree.ads.view',['mainCategories' => $technicalCategories])
              </div> --}}

                                <div class="form-group">
                                    <input type="hidden" name="category_id" id="root_category" value=""
                                        data-name="category_id">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            {{-- end --}}

                            {{-- tab categories --}}
                            <div class="tab-pane fade in" id="attrbiutes">

                                <div class="row" id="attrbiutes">

                                </div>
                            </div>
                            {{-- end --}}

                            {{-- tab address --}}
                            <div class="tab-pane fade in" id="address">

                                <div id="contianer-address">
                                    <div class="row group_address">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-2">
                                                    {{ __('qsale::dashboard.ads.form.country_id') }}
                                                </label>
                                                <div class="col-md-10">
                                                    <select name="address[0][country_id]"
                                                        class="form-control select2 country-address">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">
                                                                {{ $country->translateOrDefault(locale())->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-2">
                                                    {{ __('qsale::dashboard.ads.form.city_id') }}
                                                </label>
                                                <div class="col-md-9">
                                                    <select name="address[0][city_id]" id="city" disabled
                                                        data-current="" class="form-control city-address">

                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label class="col-md-2">
                                                    {{ __('qsale::dashboard.ads.form.state_id') }}
                                                </label>
                                                <div class="col-md-9">
                                                    <select name="address[0][state_id]" id="state" disabled
                                                        data-current="" class="form-control state-address">

                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="row text-center">
                                    <button class="btn btn-info" id="addAddress">Add</button>
                                    <input type="hidden" data-name="address" />
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            {{-- end --}}

                        </div>
                    </div>

                    <div class="d-none " id="copyCounty" style="display: none">
                        <div class="row group_address">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-2">
                                        {{ __('qsale::dashboard.ads.form.country_id') }}
                                    </label>
                                    <div class="col-md-10">
                                        <select name="address[:id_stub][country_id]"
                                            class="form-control  country-address">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">
                                                    {{ $country->translateOrDefault(locale())->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-2">
                                        {{ __('qsale::dashboard.ads.form.city_id') }}
                                    </label>
                                    <div class="col-md-9">
                                        <select name="address[:id_stub][city_id]" disabled data-current=""
                                            class="form-control city-address">

                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label class="col-md-2">
                                        {{ __('qsale::dashboard.ads.form.state_id') }}
                                    </label>
                                    <div class="col-md-9">
                                        <select name="address[:id_stub][state_id]" disabled data-current=""
                                            class="form-control state-address">

                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-danger delete-address">X</button>
                            </div>


                        </div>
                    </div>
                    {{-- PAGE ACTION --}}
                    <div class="col-md-12">
                        <div class="form-actions">
                            @include('apps::dashboard.layouts._ajax-msg')
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-lg blue">
                                    {{ __('apps::dashboard.buttons.add') }}
                                </button>
                                <a href="{{ url(route('dashboard.ads.index')) }}" class="btn btn-lg red">
                                    {{ __('apps::dashboard.buttons.back') }}
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


@section('scripts')

    <script>
        // loading
        $(function() {

            // variable
            var country = $("#country")
            var city = $("#city")
            var state = $("#state")

            // handle user type
            var userType = $("#user_type")
            var usersSelect = $("#user_id")
            var jstree = $(".jstree")

            function handleUserType() {
                let optionSelected = userType.find('option:selected');
                // handleUsersSelect(optionSelected.data('url'))
                handleCategoryType(userType.val())

            }

            userType.on("change", function() {
                handleUserType()
            })

            handleUserType()

            // function handleUsersSelect(url){
            //     // usersSelect.select2({
            //     //     ajax: {
            //     //         url,
            //     //         dataType: 'json',
            //     //         cache: true,
            //     //         data: function (params) {
            //     //             var query = {
            //     //                 search: params.term,
            //     //                 page: params.page || 1
            //     //             }

            //     //             // Query parameters will be ?search=[term]&page=[page]
            //     //             return query;
            //     //         },
            //     //         processResults: function (data, params) {

            //     //             return {
            //     //                 results: data.data,
            //     //                 pagination: {
            //     //                     more: data.next_page_url ?  true  : false
            //     //                 }
            //     //             };
            //     //         }
            //     //     }
            //     // });
            // }

            function handleCategoryType(val) {

                jstree.hide();
                $('#root_category').val('');
                handleCategoryAttrbiute('')
                $(`.${val}`).show();
            }


            // method and event for country
            function handleCountryChangeData(country, cityElment = null, stateElment = null) {
                var value = country.val()
                var url = "{{ route('api.areas.cities', ['country_id' => 'xid']) }}"
                cityElment = cityElment ? cityElment : city;
                stateElment = stateElment ? stateElment : state;

                if (value) {
                    country.prop('disabled', true)
                    resetOpion(cityElment)
                    resetOpion(cityElment)
                    url = url.replace('xid', value);

                    $.ajax({
                        headers: {
                            "lang": "{{ locale() }}",
                            'Content-Type': 'application/json'
                        },
                        url,
                        success: (data) => setOptionToCity(data.data, cityElment),
                        error: (error) => console.log(error)
                    }).done(() => country.prop('disabled', false));

                }
            }

            handleCountryChangeData(country)

            country.change(function() {
                handleCountryChangeData(country)
            })

            // hande city
            function resetOpion(_elm) {
                _elm.html("");
                _elm.prop('disabled', true);
            }

            function setOptionToCity(data, elment = null) {
                var options = "";
                elment = elment ? elment : city
                var selectOption = elment.data("current")

                for (const option of data) {
                    options +=
                        `<option data-states='${JSON.stringify(option.states)}' value="${option.id}" ${option.id == selectOption ? "selected" :""} >${option.title}</option>`
                }
                elment.html(options);
                elment.change()
                elment.prop('disabled', false);
            }

            function handleCityChange(city, elment = null) {
                var optionSelected = city.find("option:selected")
                var data = optionSelected.data("states");

                setOptionToState(data ? data : [], elment)
            }

            city.change(function() {
                handleCityChange(city)
            })

            function setOptionToState(data, elment = null) {

                var options = "";
                elment = elment ? elment : state
                var selectOption = elment.data("current")

                for (let index = 0; index < data.length; index++) {
                    const object = data[index];

                    options +=
                        `<option  value="${object.id}" ${object.id == selectOption ? "selected" :""} >${object.title}</option>`


                }

                elment.html(options);
                elment.change()
                elment.prop('disabled', false);
            }

            //  end handle country

            // hnadle category
            var attributes = $("#attrbiutes")
            $('.jstree').jstree();
            $('.jstree').on("changed.jstree", function(e, data) {
                $('#root_category').val(data.selected);
                handleCategoryAttrbiute(data.selected)
            });

            function handleCategoryAttrbiute(categroy_id) {
                if (attributes) attributes.html("");
                if (categroy_id) {
                    var url = "{{ route('api.attributes', ['category_id' => 'xid']) }}"
                    url = url.replace('xid', categroy_id);
                    $.ajax({
                        method: "GET",
                        headers: {
                            "lang": "{{ locale() }}",
                            'Content-Type': 'application/json'
                        },
                        url,
                        success: (data) => handleCategoryAttrbiuteDraw(data.data),
                        error: (error) => console.log(error)
                    });
                }
            }

            function handleCategoryAttrbiuteDraw(data) {
                var attrbitueinput = ""
                var key = 0
                for (const attribute of data) {

                    attrbitueinput += drawAttrbiute(attribute, key)
                    key++
                }

                attributes.html(attrbitueinput);
            }

            function drawAttrbiute(data, key = 0) {

                var input = inputDraw(data, key)

                var html = `
        <div class="form-group">
            <label class="col-md-2">
                ${data.name}

            </label>
             <div class="col-md-9">
                <input type="hidden" name="adsAttributes[${key}][attribute_id]" value="${data.id}"/>
                 ${input}
               <div class="help-block"></div>
             </div>
            </div>
        `;
                return html;
            }

            function inputDraw(data, key = 0) {
                var input = "";

                if (data.type == "drop_down") {
                    var options = "";
                    for (const option of data.options) {
                        options += `<option value="${option.id}">${option.value}</option>`
                    }
                    input = `<select class="form-control" ${data.validation.required  == 1 ? 'required' : ''}  name="adsAttributes[${key}][option_id]">
                    ${options}
                </select>`
                } else if (data.type == "radio") {

                    let radio = `<div class"row">`
                    for (const option of data.options) {
                        radio += `
                   <div class="col-md-4">
                       <label for="radi_${option.id}">${option.value}</label>
                       <input type="radio" name="adsAttributes[${key}][option_id]" id="radi_${option.id}" value="${option.id}">
                   </div>
                `
                    }
                    input += radio + "</div>"
                } else if (data.type == "boolean") {

                    input =
                        `<input type="checkbox"   class="" value="1"  checked name="adsAttributes[${key}][value]" >`
                } else {
                    input =
                        `<input type="${data.type}" ${data.validation.required  == 1 ? 'required' : ''}  class="form-control"  name="adsAttributes[${key}][value]" >`
                }

                return input
            }

            // ================================ address ======================
            var copyCounty = $("#copyCounty");
            copyCounty = copyCounty.html()
            $("#copyCounty").remove();
            var contianerAddress = $("#contianer-address")
            var addAddress = $("#addAddress")
            var addressIncrement = 1;
            // handle country address
            $("body").on("change", ".country-address", function() {
                var _elment = $(this)
                var _contianter = _elment.parents("div.group_address");
                var _city = _contianter.find(".city-address")
                var _state = _contianter.find(".state-address")

                handleCountryChangeData(_elment, _city, _state)

                // var cittElment =

            })

            $("body").on("change", ".city-address", function() {
                var _elment = $(this)
                var _contianter = _elment.parents("div.group_address");
                var _state = _contianter.find(".state-address")
                handleCityChange(_elment, _state)

            })

            $("body").on("click", ".delete-address", function(event) {
                event.preventDefault();
                var _elment = $(this)
                var _contianter = _elment.parents("div.group_address");

                _contianter.remove();

            })
            addAddress.click(function(event) {
                event.preventDefault();
                var html = copyCounty;
                html = $(html.replace(/:id_stub/gi, addressIncrement))

                var _elment = html.find(".country-address").last()
                var _contianter = _elment.parents("div.group_address");
                var _city = _contianter.find(".city-address")
                var _state = _contianter.find(".state-address")
                // console.log(html)
                contianerAddress.append(html)
                handleCountryChangeData(_elment, _city, _state)
                addressIncrement++


            })

            $(".country-address").each(function() {

                var _elment = $(this)
                var _contianter = _elment.parents("div.group_address");
                var _city = _contianter.find(".city-address")
                var _state = _contianter.find(".state-address")

                handleCountryChangeData(_elment, _city, _state)
            })



        })
    </script>


@stop
