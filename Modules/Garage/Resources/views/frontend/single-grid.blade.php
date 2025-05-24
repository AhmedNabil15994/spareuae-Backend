<div class="dl_card_box bg-white pt-3 px-3 pb-4 rounded">
    <div class="figure_img position-relative">
        <a href="{{ route('frontend.garages.show',$garage->id) }}">
            <img src="{{$garage->getFirstMediaUrl('images')
                ??asset('frontend/assets/img/dealers/dealer-2.jpg')}}" alt="not found" class="img-fluid">
        </a>
        @if($garage->is_certified==1)
        <span class="listing-count bg-white text-primary fw-500 rounded-1 shadow py-1 px-3 position-absolute start-0 bottom-0">{{ __('Certified') }}</span>
        @endif
    </div>
    <a href="{{ route('frontend.garages.show',$garage->id) }}">
        <h5 class="mt-4"> {{ $garage->title }} </h5>
    </a>
    <span class="slide_meta_text d-block"><i class="fa-solid fa-location-dot"></i>{{$garage->address }}</span>
    <span class="slide_meta_text d-block phone mt-2"><i class="fa-brands fa-whatsapp"></i>{{$garage->mobile }}</span>
    <hr class="mt-3 mb-3">
    <div class="dl_social d-flex align-items-center">
        @if($garage->info?->facebook)
        <a href="{{ $garage->info->facebook }}"><i class="fab fa-facebook-f"></i></a>
        @endif
        @if($garage->info?->linkedin)
        <a href="{{ $garage->info->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
        @endif
        @if($garage->info?->twitter)
        <a href="{{ $garage->info->twitter }}"><i class="fab fa-twitter"></i></a>
        @endif
        @if($garage->info?->instagram)
        <a href="{{ $garage->info->instagram }}"><i class="fab fa-instagram"></i></a>
        @endif
    </div>
</div>
