<div class="col-lg-4 col-sm-6">

  @if($ad->category_id == 11)
  <div class="single-blog">
    <a href="{{URL::to('/ads',['slug'=> $ad->translateOrDefault(locale())->slug])}}"><img src="{{$ad->getFirstMediaUrl('default_image')?
                    $ad->getFirstMediaUrl('default_image'):asset('uploads/default.jpg')}}" alt="image"></a>
    <div class="blog-content">
      <div class="tag">{{$ad->category->translateOrDefault(locale())->title}}</div>
      <h3>
        <a href="{{URL::to('/ads',['slug'=> $ad->translateOrDefault(locale())->slug])}}">{{ $ad->translateOrDefault(locale())->title}}</a>
      </h3>
      <ul class="post-meta">
        <li>
          <i class="flaticon-calendar"></i>
          {{date('M d, Y',strtotime($ad->start_at))}}
        </li>
      </ul>
      <p>{{$ad->description}}</p>
    </div>
  </div>
  @else
  <div class="single-car-ranking">
    <div class="car-ranking-image">
      <a href="{{URL::to('/ads',['slug'=> $ad->translateOrDefault(locale())->slug])}}"><img src="{{$ad->getFirstMediaUrl('default_image')?
                    $ad->getFirstMediaUrl('default_image'):asset('uploads/default.jpg')}}" alt="image"></a>
      @auth
        <div class="icon">
          <a href="{{!$ad->is_favorite ? URL::to('/profile/toggle-favorite',['add_id'=>$ad->id]) : '#'}}"><i class="flaticon-love"></i></a>
        </div>
      @endauth
    </div>
    <div class="car-ranking-content">
      <div class="tag">{{$ad->price}} {{currency()}}</div>
      <h3>
        <a href="{{URL::to('/ads',['slug'=> $ad->translateOrDefault(locale())->slug])}}">{{ $ad->translateOrDefault(locale())->title}}</a>
      </h3>
      <p><b>{{trans('user::dashboard.users.create.form.type')}}</b>:
        {{ $ad->category->parent_id ? $ad->category->parent->translateOrDefault(locale())->title : $ad->category->translateOrDefault(locale())->title}}
      </p>
      <hr>
      @if(in_array($ad->category_id,[8,9,10]))
      <ul class="list">
        @foreach($ad->attributes as $adAttribute)
          @if(in_array($adAttribute->attribute_id,[2,8,9]))
          <li>
            {{$adAttribute->attribute->translateOrDefault(locale())->name}} :
            @if(isset($adAttribute->option) && !empty($adAttribute->option))
              <span>{{$adAttribute->option->translateOrDefault(locale())->value}} </span>
            @else
              <span>{{$adAttribute->value}} </span>
            @endif
          </li>
          @endif
        @endforeach
      </ul>
      @elseif(!in_array($ad->category_id,[8,9,10]))
        <ul class="list">
          @foreach($ad->attributes as $key => $adAttribute)
            @if($key<= 2)
            <li>
              {{$adAttribute->attribute->translateOrDefault(locale())->name}} :
              @if(isset($adAttribute->option) && !empty($adAttribute->option))
                <span>{{$adAttribute->option->translateOrDefault(locale())->value}} </span>
              @else
                <span>{{$adAttribute->value}} </span>
              @endif
            </li>
            @endif
          @endforeach
        </ul>
      @endif
    </div>
  </div>
    @endif
</div>
