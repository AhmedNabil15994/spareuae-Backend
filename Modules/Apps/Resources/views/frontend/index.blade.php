@extends('apps::frontend.layouts.app')
@section('styles')
  <style>
    html{
      overflow-x: hidden;
    }
    .main-slides-with-category{
      overflow: unset;
    }
    .owl-carousel .owl-stage-outer{
      overflow: unset;
    }
    .slides-category-list-tab .tab_content .tabs_item form .form-group .nice-select .list{
      height: 250px;
    }
  </style>
@endsection
@section('content')
  <!--hero section start-->
<!-- Start Main Slides Area -->
<div class="main-slides-with-category">
  <div class="home-slides owl-carousel owl-theme">
      <div class="main-slides-item">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-12">
                      <div class="main-slides-content">
                        <h1>{{trans('apps::frontend.pages.home.first_heading')}}</h1>
                        <p> {{trans('apps::frontend.pages.home.first_description')}}</p>
                      </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="tab slides-category-list-tab">
                      <ul class="tabs">
                        @foreach($categories as $oneCategory)
                          @if($oneCategory->status)
                          <li>
                            <a href="#">{{$oneCategory->translateOrDefault(locale())->title}}</a>
                          </li>
                          @endif
                        @endforeach
                      </ul>
                      <div class="tab_content">
                        @foreach($categories as $oneCategory)
                          @if($oneCategory->status)
                          <div class="tabs_item">
                          <form method="get" action="{{route('frontend.ads.index')}}">
                            <div class="row">
                              <input type="hidden" name="category_id" value="{{$oneCategory->id}}">
                              @php
                                $requestAttrs = Request::has('attribute') ? Request::get('attribute') : [];
                              @endphp
                              @foreach($oneCategory->SearchAttributes as $attribute)
                              <div class="col-md col-sm-6" id="{{$attribute->id}}_attribute_container"
                              style="">
{{--                                {{count($attribute->options()->whereNotNull('parent_id')->pluck('parent_id')->toArray()) ? 'none' : 'block'}}--}}
                                <div class="form-group">
                                  @if ($attribute->type == "drop_down")
                                    @php $options = ''; @endphp
                                    @foreach ($attribute->options as $option)
                                      @php
                                        $options.= '<option data-parent="'.$option->parent_id.'"  value="'.$option->id.'" '.(
                                            !empty($requestAttrs) && isset($requestAttrs[$attribute->id]) && isset($requestAttrs[$attribute->id]['option_id'][0]) && (int)$requestAttrs[$attribute->id]['option_id'][0] == $option->id
                                            ? 'selected' : '').' >'.$option->value.'</option>';
                                      @endphp
                                    @endforeach
                                    <select name="attribute[{{$attribute->id}}][option_id][0]"
                                      data-id="{{$attribute->id}}" class="selectors">
                                      <option value="">{{$attribute->translateOrDefault(locale())->name}}</option>
                                      {!! $options !!}
                                    </select>
                                  @elseif ($attribute->type == "radio")

                                    @php $radio = '<div class"row">'; @endphp
                                    @foreach ($attribute->options as $option)
                                      @php
                                        $radio.= '<div class="col-md-4">'.
                                                    '<label class="mx-2 for="radi_'.$option->id.'">'.$option->value.'</label>'.
                                                    '<input type="radio" name="attribute['.$attribute->id.'][option_id][0]" id="radi_'.$option->id.'" value="'.$option->id.'"  '.(
                                                      !empty($requestAttrs) && isset($requestAttrs[$attribute->id]) && isset($requestAttrs[$attribute->id]['option_id'][0]) && (int)$requestAttrs[$attribute->id]['option_id'][0] == $option->id
                                                      ? 'checked' : '').'>'.
                                                 '</div>';
                                      @endphp
                                    @endforeach
                                    @php $radio.= "</div>"; @endphp
                                    {!! $radio !!}

                                  @elseif ($attribute->type == "boolean")

                                    <input type="checkbox"   class="" value="1"  name="attribute[{{$attribute->id}}][value]" >

                                  @else

                                    <input type="{{$attribute->type}}" class="form-control" placeholder="{{$attribute->translateOrDefault(locale())->name}}"
                                           name="attribute[{{$attribute->id}}][value]"
                                           value="{{ !empty($requestAttrs) && isset($requestAttrs[$attribute->id]) && isset($requestAttrs[$attribute->id]['value']) ? $requestAttrs[$attribute->id]['value'] : ''}}">

                                  @endif
                                </div>
                              </div>
                              @endforeach
                              @if($oneCategory->id == 8)
                                <div class="col-md col-sm-6 ">
                                  <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="{{trans('apps::frontend.layout.header.search')}}" value="{{Request::has('search') ? Request::get('search') : ''}}">
                                  </div>
                                </div>
                              @endif
                              @if($loop->first)
                             <div class="col-md col-sm-6 ">
                                <div class="form-group">
                                  <input type="text" name="price_range_from" class="form-control" placeholder="{{trans('qsale::dashboard.packages.datatable.price_from')}}" value="{{Request::has('price_range_from') ? Request::get('price_range_from') : ''}}">
                                </div>
                              </div>
                             <div class="col-md col-sm-6 ">
                                <div class="form-group">
                                  <input type="text" name="price_range_to" class="form-control" placeholder="{{trans('qsale::dashboard.packages.datatable.price_to')}}" value="{{Request::has('price_range_to') ? Request::get('price_range_to') : ''}}">
                                </div>
                              </div>
                              @endif
                              @if(count($oneCategory->SearchAttributes) < 4 && count($oneCategory->children) == 0)
                              <div class="col-md col-sm-6 ">
                                <div class="form-group">
                                  <input type="text" value="{{Request::has('search') ? Request::get('search') : ''}}" name="search" placeholder="{{trans('apps::frontend.layout.header.search_title')}}" class="form-control" >
                                </div>
                              </div>
                              @endif
                            </div>
                            <div class="main-search-btn">
                              <button type="submit"><i class='bx bx-search-alt'></i></button>
                            </div>
                          </form>
                        </div>
                          @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Main Slides Area -->


  <!-- Start Car Ranking Area -->
  <section class="car-ranking-area bg-ffffff pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <h2> {{trans('apps::frontend.pages.home.second_heading')}}</h2>
        <p>{{trans('apps::frontend.pages.home.second_description')}}</p>
        <div class="section-btn">
          <a href="{{URL::to('/ads?category_id='.$displayData[0]['category_id'])}}" class="default-btn">
            {{trans('apps::frontend.pages.home.show_more')}}
            <span></span>
          </a>
        </div>
      </div>

      <div class="row">
        @foreach($displayData[0]['data'] as $oneCar)
          @include('qsale::frontend.single-grid',['ad'=>$oneCar])
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Car Ranking Area -->

  <!-- Start Parts Ranking Area -->
  <section class="car-ranking-area bg-2a1e02 pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <h2> {{trans('apps::frontend.pages.home.third_heading')}}</h2>
        <p>{{trans('apps::frontend.pages.home.third_description')}}</p>
        <div class="section-btn">
          <a href="{{URL::to('/ads?category_id='.$displayData[1]['category_id'])}}" class="default-btn">
            {{trans('apps::frontend.pages.home.show_more')}}
            <span></span>
          </a>
        </div>
      </div>

      <div class="row">
        @foreach($displayData[1]['data'] as $oneCar)
          @include('qsale::frontend.single-grid',['ad'=>$oneCar])
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Parts Ranking Area -->

  <!-- Start ELC Ranking Area -->
  <section class="car-ranking-area bg-ffffff pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <h2> {{trans('apps::frontend.pages.home.forth_heading')}}</h2>
        <p>{{trans('apps::frontend.pages.home.forth_description')}}</p>
        <div class="section-btn">
          <a href="{{URL::to('/ads?category_id='.$displayData[2]['category_id'])}}" class="default-btn">
            {{trans('apps::frontend.pages.home.show_more')}}
            <span></span>
          </a>
        </div>
      </div>

      <div class="row">
        @foreach($displayData[2]['data'] as $oneCar)
          @include('qsale::frontend.single-grid',['ad'=>$oneCar])
        @endforeach
      </div>
    </div>
  </section>
  <!-- End ELC Ranking Area -->

  <!-- Start Team Area -->
  <section class="team-area pt-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="single-team">
            <a href="{{URL::to('/profile/create-ad')}}">
              <img src="{{asset('frontend/assets/images/team/team-1.jpg')}}" alt="image">
            </a>
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <div class="single-team">
            <a href="{{URL::to('/ads')}}">
              <img src="{{asset('frontend/assets/images/team/team-2.jpg')}}" alt="image">
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End Team Area -->

  <!-- Start real estate Ranking Area -->
  <section class="car-ranking-area bg-2a1e02 pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <h2> {{trans('apps::frontend.pages.home.fifth_heading')}}</h2>
        <p>{{trans('apps::frontend.pages.home.fifth_description')}}</p>
        <div class="section-btn">
          <a href="{{URL::to('/ads?category_id='.$displayData[3]['category_id'])}}" class="default-btn">
            {{trans('apps::frontend.pages.home.show_more')}}
            <span></span>
          </a>
        </div>
      </div>

      <div class="row">
        @foreach($displayData[3]['data'] as $oneCar)
          @include('qsale::frontend.single-grid',['ad'=>$oneCar])
        @endforeach
      </div>
    </div>
  </section>
  <!-- End real estate Ranking Area -->

  <!-- Start Blog Area -->
  <section class="blog-area bg-ffffff pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <h2> {{trans('apps::frontend.pages.home.sixth_heading')}}</h2>
        <p>{{trans('apps::frontend.pages.home.sixth_description')}}</p>
        <div class="section-btn">
          <a href="{{URL::to('/ads?category_id='.$displayData[4]['category_id'])}}" class="default-btn">
            {{trans('apps::frontend.pages.home.show_more')}}
          </a>
        </div>
      </div>

      <div class="row">
        @foreach($displayData[4]['data'] as $oneCar)
          @include('qsale::frontend.single-grid',['ad'=>$oneCar])
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Blog Area -->

  <!-- Start Newsletter Area -->
  <div class="newsletter-area">
    <div class="container">
      <div class="newsletter-inner-box">
        <div class="row align-items-center">
          <div class="col-lg-4">
            <div class="newsletter-content">
              <h3>{{trans('apps::frontend.pages.home.seventh_heading')}}</h3>
              <p>{{trans('apps::frontend.pages.home.seventh_description')}}</p>
            </div>
          </div>

          <div class="col-lg-6">
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
            <form class="newsletter-form" method="post" action="{{route('frontend.subscribeToNews')}}">
              @csrf
              <input name="email" type="email" class="input-newsletter" placeholder="{{__("Enter your email")}}" required autocomplete="off">
              <button type="submit">{{trans('apps::frontend.pages.home.subscribe_now')}}</button>
              <div id="validator-newsletter" class="form-result"></div>
            </form>
          </div>

          <div class="col-lg-2">
            <div class="newsletter-share-link">
              <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
              <a href="#" target="_blank"><i class='bx bx-camera'></i></a>
              <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Newsletter Area -->
@endsection
@push('scripts')
<script>

  let relatedAttrs = @json(indexAllRelatedAttrs());
  console.log(relatedAttrs)

  $(document).on('change','.selectors',function (){
    selector = $(this);
    let id = selector.attr("data-id");
    let value = selector.val();
    let parentID = selector.find('option:selected').data('parent');

    // attr.parent.includes(parentID)
    let showAttrs = relatedAttrs.filter(attr => attr.id == id);
    console.log(showAttrs)
    showAttrs.map((attr,index) => {
      // if(attr.related_options.filter(option => option == value).length){
        let select = selector.parents('.tabs_item').find(`#${parentID}_attribute_container select`);
        selector.parents('.tabs_item').find(`#${attr.id}_attribute_container`).show();
          $.ajax({
            method: "GET",
            url: '{{route('frontend.options.getById')}}',
            data:{
              '_token': $('meta[name="csrf-content"]').attr('content'),
              'ids' : value,
              'parent_id' : parentID,
            },
            success: function (data) {
              let placeholder = select.children('option')[0];
              select.empty();
              select.niceSelect('destroy');
              select.append(placeholder)
              $.each(data.data,function (itemIndex,item){
                select.append('<option data-parent="'+item.parent_id+'" value="'+item.id+'">'+item.value.{{locale()}}+'</option>');
              });
              select.niceSelect();
            }
          });

      // }

    });
  })
</script>
@endpush
