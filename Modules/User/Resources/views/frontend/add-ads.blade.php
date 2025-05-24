@extends('apps::frontend.layouts.app')
@section('styles')
  <style>
    .hidden,.hide{
      display: none;
    }

    .btn-file{
      background-color: #daa120 !important;
      border: none;
      border-radius: 0px;
    }
  </style>
@endsection
@section( 'content')

  <!-- Start Page Banner -->
  <div class="page-banner-area item-bg-2">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="page-banner-content">
            <h2>{{trans('user::frontend.profile.add-ad')}}</h2>

            <ul class="pages-list">
              <li><a href="{{URL::to('/')}}">{{trans('apps::frontend.pages.home.title')}}</a></li>
              <li><span>{{trans('user::frontend.profile.add-ad')}}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Banner -->

  <!-- Start Dashboard Area -->
  <div class="dashboard-area ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="dashboard-profile">
            <div class="profile-box">
              <div class="profile-icon">
                <img src="{{asset('frontend/assets/images/add.jpg')}}" alt="add" />
              </div>
            </div>
            <div class="profile-info">
              <ul class="info-list">
                <li>
                  <a href="#add-ads" class="active">{{trans('user::frontend.profile.add-ad')}}</a>
                </li>
                <li>
                  <a href="#ad-specifications">{{trans('user::frontend.profile.ad-description')}}</a>
                </li>
                <li>
                  <a href="#payment">{{trans('user::frontend.profile.ad-payment')}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-12">
          <div class="dashboard-form">
            <form method="post" action="{{route('frontend.ads.save_ad')}}" enctype="multipart/form-data">
              @if ($errors->any())
                <div class="container">
                  <div class="alert alert-danger alert-dismissible fade show">

                    <ul>
                      @foreach ($errors->all() as $error)
                        <li class="p-2">{{ $error }}</li>
                      @endforeach
                    </ul>

                  </div>
                </div>
              @endif
              @csrf
              <div class="dashboard-title" id="add-ads">
                <h3>{{trans('user::frontend.profile.add-ad')}}</h3>

                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      <label>{{trans('user::frontend.profile.ad_title')}}</label>
                      <input type="text" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      <label>{{trans('user::frontend.profile.ad_description')}}</label>
                      <input type="hidden" name="ad_price" value="">
                      <textarea name="description" class="form-control">{{old('description')}}</textarea>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label>{{trans('user::frontend.profile.ad_phone')}}</label>
                      <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label>{{trans('user::frontend.profile.ad_whatsapp')}}</label>
                      <input type="text" name="whatsapp" class="form-control" value="{{old('whatsapp')}}">
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      <label>{{trans('user::frontend.create_ads.price')}}</label>
                      <input type="text" placeholder="" name="price" class="form-control">
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label>{{trans('user::frontend.profile.ad_category')}}</label>
                      <select name="category_id">
                        <option value="">{{trans('user::frontend.profile.ad_category_p')}}</option>
                        @foreach($mainCategories as $category)
                          @if($category->status)
                          <option data-cat="{{count($category->children) > 0 ? 1 : 0}}" value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 subCat hidden">
                    <div class="form-group">
                      <label>{{trans('user::frontend.profile.ad_sub_category')}}</label>
                      <select name="sub_category_id"></select>
                    </div>
                  </div>


                  <div class="col-lg-12 col-md-12">
                    {!! field()->file('image', __('examination image')) !!}
                  </div>
                  <div class="col-lg-12 col-md-12">
                    {!! field()->multiFileUpload('attachs', __('user::frontend.profile.ad_image')) !!}
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <p>{{trans('user::frontend.profile.ad_duration')}}</p>
                    <div class="form-group">
                      <select name="duration">
                        <option value="">{{trans('user::frontend.profile.ad_duration')}} </option>
                        <option value="3">3 {{trans('user::frontend.profile.days')}}</option>
                        <option value="7">7 {{trans('user::frontend.profile.days')}}</option>
                        <option value="30">30 {{trans('user::frontend.profile.day')}}</option>
                        <option value="360">{{trans('user::frontend.profile.year')}} </option>
                      </select>
                    </div>
                  </div>
                  <div class="calculator-payment hidden">
                    <p>{{trans('user::frontend.profile.ad_price')}}</p>
                    <h3 class="cost">645 {{currency()}}</h3>
                    <p>{{trans('user::frontend.profile.ad_duration_p')}} : <span class="days">30</span> {{trans('user::frontend.profile.day')}}</p>
                  </div>
                </div>
              </div>
              <hr class="hr">

              <div class="dashboard-title" id="ad-specifications">
                <h3>{{trans('user::frontend.profile.ad-description')}} </h3>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label>{{trans('qsale::dashboard.special_specification')}}</label>
                    <textarea name="special_specification" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label>{{trans('qsale::dashboard.malfunctions')}}</label>
                    <textarea name="malfunctions" class="form-control"></textarea>
                  </div>
                </div>
                <div class="row mainCategory"></div>
                <div class="row subCategory"></div>
              </div>
              <hr class="hr">

              <div class="dashboard-title" id="payment">
                <h3>{{trans('user::frontend.profile.ad-payment')}}</h3>
                <div class="order-details">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <div class="cart-totals">
                        <h3>{{trans('user::frontend.profile.payment_brief')}}</h3>
                        <ul>
                          <li><span class="cost"></span>  {{trans('user::frontend.profile.total_payment')}} </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="hr">

              <button href="#" type="submit" class="default-btn">
                {{trans('user::frontend.profile.request_ad')}}
                <span></span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Dashboard Area -->
@endsection
@section('scripts')
  <script>
    $(function(){
      let attrs =[];
      let days;
      let default_price = "{{(setting("other", "default_price") ?? 3)}}";
      let default_duration = "{{setting("other", "default_duration")}}";

      function calcData(){
        if(days > 0){
          let oneDayCost = Math.floor(days / default_duration);
          let adCost = Math.round( (default_price * oneDayCost)  ,2)
          $('span.days').html(days)
          $('.cost').html(adCost+ " {{currency()}}")
        }
      }

      $('input[name="package_id"]').on('change',function(){
        price = $(this).data('price');
        calcData();
      });

      $('select[name="duration"]').on('change',function(){
        days = $(this).val();
        calcData();
      });

      $('select[name="category_id"]').on('change',function (){
        if($(this).children('option:selected').data('cat')){
          let parent_id = $(this).val();
          let url = "/api/categories/"+parent_id+"/child";
          $.ajax({
            method: "GET",
            headers: {
              "lang": "{{ locale() }}",
              'Content-Type': 'application/json'
            },
            url,
            success: (data) => {
              if(data){
                let subCategories = '<option value="">{{trans('user::frontend.profile.ad_sub_category_p')}}</option>';
                $.each(data.data ,function(index,item){
                  subCategories+="<option value='"+item.id+"'>"+item.title+"</option>"
                })
                $('select[name="sub_category_id"]').niceSelect('destroy');
                $('select[name="sub_category_id"]').empty();
                $('select[name="sub_category_id"]').append(subCategories);
                $('select[name="sub_category_id"]').niceSelect();
                $('.subCat').removeClass('hidden');
              }
            },
          });
          getAttributes($(this).val());
        }else{
          if($(this).val()){
            getAttributes($(this).val());
          }
          $('select[name="sub_category_id"]').empty();
          $('.subCat').addClass('hidden');
        }
      });

      $('select[name="sub_category_id"]').on('change',function (){
        if($(this).val()){
          getAttributes($(this).val(),'subCategory');
        }
      });

      function getAttributes(category_id,type='mainCategory'){
        let url = "/api/attributes?category_id="+category_id;
        $.ajax({
          method: "GET",
          headers: {
            "lang": "{{ locale() }}",
            'Content-Type': 'application/json'
          },
          url,
          success: (data) =>{
            if(data){
              let divItems = '';
              if(type == 'mainCategory'){
                $('.row.'+type).empty();
                attrs = []
              }

              $.each(data.data,function (index,item){
                if(!attrs.includes(item.id)){
                  divItems+= '<div class="col-lg-4 col-md-4">' +
                    '<div class="form-group">' +
                    '<label> '+item.name+' '+ (item.validation.required == 1 ? '*' : '') + ' </label>'+
                    '<input type="hidden" name="adsAttributes['+index+'][attribute_id]" value="'+item.id+'"/>'+
                    inputDraw(item,index) +
                    '</div>'+
                    '</div>';
                  attrs.push(item.id)
                }
              });
              $('.row.'+type).append(divItems);
              $('.row.'+type +' select').niceSelect();
            }
          },
        });
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
                       <input type="radio" name="adsAttributes[${key}][option_id]" id="radi_${option.id}" name="fav_language" value="${option.id}">
                   </div>
                `
          }
          input += radio + "</div>"
        } else if (data.type == "boolean") {

          input = `<input type="checkbox"   class="" value="1"  name="adsAttributes[${key}][value]" >`
        } else {
          input =
            `<input type="${data.type}" ${data.validation.required  == 1 ? 'required' : ''}  class="form-control"  name="adsAttributes[${key}][value]" >`
        }

        return input
      }

      $(document).scroll(function(){
        let scroll = $(this).scrollTop();
        $.each($('.dashboard-title') , function (index,item){
          if(scroll >= $(item).offset().top) {
            var id = $(item).attr('id');
            $("a[href='#"+id+"']").addClass('active').parent('li').siblings('li').children('a.active').removeClass('active')
          }
        });

      });
    });
  </script>
@endsection


