@extends('apps::dashboard.layouts.app')
@section('title', __('user::dashboard.users.update.title'))
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
                    <a href="{{ url(route('dashboard.users.index')) }}">
                        {{__('user::dashboard.users.index.title')}}
                    </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">{{__('user::dashboard.users.update.title')}}</a>
                </li>
            </ul>
        </div>

        <h1 class="page-title"></h1>

        <div class="row">
            <form id="updateForm" user="form" class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" action="{{route('dashboard.users.update',$user->id)}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="type" value="user">
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
                                                <a href="#global_setting" data-toggle="tab">
                                                    {{ __('user::dashboard.users.create.form.general') }}
                                                </a>
                                            </li>

                                            <li class="">
                                                <a href="#office" data-toggle="tab">
                                                    {{ __('user::dashboard.users.create.form.office') }}
                                                </a>
                                            </li>

                                            <li class="">
                                                <a href="#currentSubscription" data-toggle="tab">
                                                    {{ __('user::dashboard.users.update.form.currentSubscription.tab') }}
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
                            <div class="tab-pane active fade in" id="global_setting">

                                <div class="col-md-10">


                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.name')}}
                                        </label>
                                        <div class="col-md-9">
                                             <input type="text" name="name" value="{{$user->name}}" class="form-control" data-name="name">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>






                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.email')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="email" name="email" value="{{$user->email}}" class="form-control" data-name="email">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.type')}}
                                        </label>
                                        <div class="col-md-9">
                                            <select name="type" id="userType" class="form-control" data-name="type">
                                                @foreach (config("customs.users") as $type )
                                                    <option value="{{$type}}"
                                                        {{ $user->type == $type ? "selected" : ""}}> {{__('user::dashboard.users.datatable.'.$type)}}</option>
                                                @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>






                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.mobile')}}
                                        </label>
                                        <div class="col-md-3">
                                            <select name="phone_code" class="form-control select2" data-name="phone_code" required>
                                                <option value=""></option>
                                                @foreach ($phoneCodes as $phoneCode)
                                                @if (!empty($phoneCode['calling_code'][0]))
                                                <option value="{{ $phoneCode['calling_code'][0] }}"  @if($user->phone_code == $phoneCode['calling_code'][0] ) selected @endif>
                                                    {{ $phoneCode['flag'] .' '.$phoneCode['code'] . ' +' . $phoneCode['calling_code'][0] }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" data-name="mobile">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.update.form.password')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="password" autocomplete="new-password" name="password" class="form-control" data-name="password">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.confirm_password')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="password" name="confirm_password" class="form-control" data-name="confirm_password">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.image')}}
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image" data-preview="holder" class="btn btn-primary ">
                                                        <i class="fa fa-picture-o"></i>
                                                        {{__('apps::dashboard.buttons.upload')}}
                                                    </a>
                                                </span>
                                                <input name="image" class="form-control image" type="file" >
                                                <span class="input-group-btn">
                                                    <a data-input="image" data-preview="holder" class="btn btn-danger delete">
                                                        <i class="glyphicon glyphicon-remove"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <span class="holder" style="margin-top:15px;max-height:100px;">
                                                <img src="{{url($user->image)}}" style="height: 15rem;max-width:100%">
                                            </span>
                                            <input type="hidden" data-name="image">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>






                                    <div class="form-group">
                                        <label class="col-md-2">

                                            {{__('user::dashboard.users.create.form.status')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch" @if($user->is_active) checked @endif   id="test" data-size="small" name="is_active">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.is_verified')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch"
                                                    @if($user->is_verified) checked @endif  id="is_verified" data-size="small" name="is_verified">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>




                                    @if ($user->trashed())
                                      <div class="form-group">
                                          <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.restore')}}
                                          </label>
                                          <div class="col-md-9">
                                              <input type="checkbox" class="make-switch" id="test" data-size="small" name="restore">
                                              <div class="help-block"></div>
                                          </div>
                                      </div>
                                    @endif




                                </div>
                            </div>

                            @php
                               $office = $user->office
                            @endphp

                             {{-- CREATE FORM --}}
                             <div class="tab-pane office-data fade in" id="office">

                                <div class="col-md-10">


                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.title')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" name="office[title]" value="{{optional($office)->title}}" class="form-control" data-name="office.title">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.description')}}
                                        </label>
                                        <div class="col-md-9">
                                            <textarea name="office[description]"  class="form-control" data-name="office.description">{{optional($office)->description}}</textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.mobile')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" name="office[mobile]" value="{{optional($office)->mobile}}" class="form-control" data-name="office.mobile">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.package_id')}}
                                        </label>
                                        <div class="col-md-9">
                                            <select name="office[package_id]" class="form-control selected" data-name="office.package_id">
                                                @foreach ($packages as $package )
                                                    <option value="{{$package->id}}"
                                                               {{ optional($user->currentSubscription)->package_id == $package->id ? "selected" : ""}}
                                                             > {{$package->title}}</option>
                                                @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.country_id')}}
                                        </label>
                                        <div class="col-md-9">
                                            <select name="office[country_id]" id="office_country" class="form-control selected" data-name="office.country_id">
                                                @foreach ($countries as $country )
                                                    <option value="{{$country->id}}"
                                                         {{ $country->id == optional($office)->country_id ? "selected" : ""}}
                                                        > {{$country->translateOrDefault(locale())->title}}</option>
                                                @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.city_id')}}
                                        </label>
                                        <div class="col-md-9">
                                            <select name="office[city_id]" id="office_city" disabled data-current="{{optional($office)->city_id}}" class="form-control" data-name="office.city_id">

                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.state_id')}}
                                        </label>
                                        <div class="col-md-9">
                                            <select name="office[state_id]" id="office_state" disabled data-current="{{optional($office)->state_id}}" class="form-control" data-name="office.state_id">

                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    @php
                                             $socials =  optional($office)->socials;
                                             $socials = $socials ? collect($socials) : null;


                                    @endphp
                                    @foreach (\Modules\User\Enums\SocialType::getConstList() as $scoial)
                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{$scoial}}
                                        </label>
                                        @php

                                            $value = $socials ? $socials->firstWhere('key', $scoial) : null;

                                        @endphp
                                        <div class="col-md-9">
                                            <input type="hidden" name="office[socials][{{$loop->index}}][key]" value="{{$scoial}}" class="form-control" >
                                            <input type="text" name="office[socials][{{$loop->index}}][link]" value="{{optional($value)['link']}}" class="form-control" data-name="office.socials.{{$loop->index}}.link">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    @endforeach



                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.office_image')}}
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image" data-preview="holder" class="btn btn-primary ">
                                                        <i class="fa fa-picture-o"></i>
                                                        {{__('apps::dashboard.buttons.upload')}}
                                                    </a>
                                                </span>
                                                <input name="office[image]" class="form-control image" type="file" >

                                            </div>

                                            <span class="holder" style="margin-top:15px;max-height:100px;">
                                                @if(optional($office)->image)
                                                <img src="{{url($user->office->image)}}" width="150" style="height: 15rem;">
                                                @endif
                                            </span>
                                            <input type="hidden" data-name="office.image">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>








                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.status')}}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" class="make-switch" @if(optional($office)->status) checked @endif data-size="small" name="office[status]">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>










                                </div>
                            </div>

                            {{-- end --}}


                             {{-- CREATE FORM --}}
                             @php
                                $currentSubscription = $user->currentSubscription
                            @endphp
                             <div class="tab-pane  fade in office-data" id="currentSubscription">

                                <div class="col-md-10">




                                    <div class="form-group">
                                        <label class="col-md-2">
                                            {{__('user::dashboard.users.create.form.package_id')}}
                                        </label>
                                        <div class="col-md-9">

                                            <select name="office[package_id]" class="form-control selected" data-name="office.package_id">
                                                @foreach ($packages as $package )
                                                    <option value="{{$package->id}}"
                                                               {{ optional($user->currentSubscription)->package_id == $package->id ? "selected" : ""}}
                                                             > {{$package->title}}</option>
                                                @endforeach
                                            </select>

                                            <div class="help-block"></div>
                                        </div>
                                        <label>{{ __('user::dashboard.users.update.form.currentSubscription.use_pakcage_info') }}</label>
                                        <input type="checkbox" id="use_pakcage_info" value="1" name="use_pakcage_info" />
                                    </div>

                                    <div class="sub-data">
                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{ __('user::dashboard.users.update.form.currentSubscription.current_use') }}
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" name="subscription[current_use]" value="{{optional($currentSubscription)->current_use}}" class="form-control" data-name="subscription.current_use">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{ __('user::dashboard.users.update.form.currentSubscription.max_use') }}
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" name="subscription[max_use]" value="{{optional($currentSubscription)->max_use}}" class="form-control" data-name="subscription.max_use">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{ __('user::dashboard.users.update.form.currentSubscription.duration_of_ads') }}
                                            </label>
                                            <div class="col-md-9">
                                                <input type="number" name="subscription[duration_of_ads]"
                                                value="{{optional($currentSubscription)->duration_of_ads}}"
                                                 class="form-control" data-name="subscription.duration_of_ads">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{ __('user::dashboard.users.update.form.currentSubscription.start_at') }}
                                            </label>

                                            <div class="col-md-9">
                                                <div class="input-group input-medium date date-picker" data-name="subscription.start_at" data-date-format="yyyy-mm-dd" >
                                                    <input type="text" class="form-control"
                                                            name="subscription[start_at]"
                                                            value="{{optional($currentSubscription)->start_at}}" >
                                                    <span class="input-group-btn">
                                                        <button class="btn default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{ __('user::dashboard.users.update.form.currentSubscription.end_at') }}
                                            </label>

                                            <div class="col-md-9">
                                                <div class="input-group input-medium date date-picker" data-name="subscription.end_at" data-date-format="yyyy-mm-dd" >
                                                    <input type="text" class="form-control"
                                                            name="subscription[end_at]"
                                                            value="{{optional($currentSubscription)->end_at}}" >
                                                    <span class="input-group-btn">
                                                        <button class="btn default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{ __('user::dashboard.users.update.form.currentSubscription.money') }}
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" name="subscription[money]" value="{{optional($currentSubscription)->money}}" class="form-control" data-name="office.title">
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
                                    {{__('apps::dashboard.buttons.edit')}}
                                </button>
                                <a href="{{url(route('dashboard.users.index')) }}" class="btn btn-lg red">
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


@section('scripts')

<script>
    $(function() {
      var typeOfUser = $("#userType")
      var officeContainer = $(".office-data")
      var office_country  = $("#office_country")
      var office_city     = $("#office_city")
      var office_state    = $("#office_state")
      var use_pakcage_info = $("#use_pakcage_info")
      var currentSubscription = $("#currentSubscription")
      var subscriptionData    = $(".sub-data")

      // handle the type of user
      function handleUserTypeData(_elm){
          if(_elm.val()== "user"){
            officeContainer.find("input , textarea, .selected, select").prop('disabled', true);
            officeContainer.find('.make-switch').bootstrapSwitch('toggleDisabled',true,true);
            use_pakcage_info.prop("checked", false);
          }else{
            officeContainer.find("input , textarea, .selected, select").prop('disabled', false);
            officeContainer.find('.make-switch').bootstrapSwitch('disabled',false);
            handleCountryChangeData(office_country)
          }



      }

      //hande if use_package_info_check
      use_pakcage_info.change(function(){
          if($(this).is(":checked")){
            subscriptionData.find("input , textarea, .selected, select").prop('disabled', true);
            subscriptionData.hide();
          }else{
            subscriptionData.find("input , textarea, .selected, select").prop('disabled', false);
            subscriptionData.show()
          }
      })


      // handle chnage of type
      typeOfUser.change(function(){
        handleUserTypeData(typeOfUser)
      })
      handleUserTypeData(typeOfUser)

      // handle address
      function handleCountryChangeData(office_country){
        var value = office_country.val()
        var url   = "{{route('api.areas.cities', ['country_id'=>'xid'])}}"

        if(value){
            office_country.prop('disabled', true)
            resetOpion(office_city)
            resetOpion(office_state)
            url = url.replace('xid', value);

            $.ajax(
                {
                    headers: {
                        "lang" : "{{locale()}}" ,
                        'Content-Type':'application/json'
                    },
                    url,
                   success:(data)=>setOptionToCity(data.data),
                   error:(error)=>console.log(error)
                }
            ).done(()=> office_country.prop('disabled', false) );

        }
      }

      office_country.change(function(){

                handleCountryChangeData(office_country)
      })

      if(typeOfUser.val() != "user")
            handleCountryChangeData(office_country)

      function resetOpion(_elm){
           _elm.html("");
           _elm.prop('disabled', true);
      }

      function setOptionToCity(data){
          var options = "";
          var selectOption = office_city.data("current")

           for (const option of data) {
                options += `<option data-states='${JSON.stringify(option.states)}' value="${option.id}" ${option.id == selectOption ? "selected" :""} >${option.title}</option>`
           }
        //    console.log(data)
           office_city.html(options);
           office_city.change()
           office_city.prop('disabled', false);
      }

      function handleCityChange(office_city){
          var optionSelected = office_city.find("option:selected")
          var data   = optionSelected.data("states");
          setOptionToState(data ? data : [] )
      }

      office_city.change(function(){
          handleCityChange(office_city)
      })

      function setOptionToState(data){
          var options = "";
          var selectOption = office_state.data("current")

           for (const option of data) {
                options += `<option  value="${option.id}" ${option.id == selectOption ? "selected" :""} >${option.title}</option>`
           }
           office_state.html(options);
           office_state.change()
           office_state.prop('disabled', false);
      }




    });


</script>

@stop
