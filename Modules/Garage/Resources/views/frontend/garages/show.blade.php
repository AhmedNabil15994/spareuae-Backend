@extends('apps::frontend.layouts.app')
@section('content')
<div class="dealers-section ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="dealer-single-info bg-white rounded d-lg-flex align-items-center">
                    <div class="dl_single_left rounded position-relative flex-shrink-0">
                        <img src="{{$garage->getFirstMediaUrl('images')??asset('frontend/assets/img/dealers/dealer-2.jpg')}}" class="img-fluid">
                        @if($garage->is_certified==1)
                        <span class="listing-count bg-white shadow py-1 px-3 fw-semibold rounded position-absolute start-0 bottom-0">
                            {{ __('Certified') }}</span>
                        @endif
                    </div>
                    <div class="dl_single_right ms-lg-4 mt-4 mt-lg-0">
                        <ul class="rating_box d-flex">

                            @for($i = 0; $i < $garage->comments_avg_infostars; $i++)
                                <li><i class="fa-solid fa-star"></i></li>
                                @endfor


                                <li class="ms-1 me-1"><a href="#" class="pera-text-2">({{ $garage->comments_count }} {{ __('Customer Review') }})</a></li>
                        </ul>


                        <h4 class="mb-0 mt-1">{{ $garage->title }}</h4>
                        <div class="info-meta mt-1">
                            <span><i class="fa-solid fa-location-dot"></i>{{$garage->address }}</span>
                            <span><i class="fa-solid fa-clock"></i>
                                {{ $garage->info?->time_from }} {{ __('TO') }} {{ $garage->info?->time_to }}
                            </span>
                        </div>
                        <p class="mt-3">
                            {{ $garage->desc }}
                        </p>
                        <hr>
                        <ul class="dl_info_meta d-flex align-items-center flex-wrap">
                            <li><a href="tel:{{ $garage->mobile }}">
                                    <span class="me-2 ms-2"><i class="fa-brands fa-whatsapp"></i></span>
                                    {{ $garage->mobile }}
                                </a>
                            </li>
                            <li>
                                <a href="mailto:garage@gmail.com">
                                    <span class="me-2 ms-2"><i class="fa-solid fa-envelope"></i></span>
                                    {{ $garage->info?->email }}
                                </a>
                            </li>
                            <li>
                                <a href="tel:{{ $garage->mobile }}">
                                    <span class="me-2 ms-2">
                                        <i class="fa-regular fa-clock"></i>
                                    </span>
                                    {{ $garage->info?->time_from }} {{ __('TO') }} {{ $garage->info?->time_to }}
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="dealer-single-tab mt-60">
                    <ul class="nav nav-tabs">
                        <li><a href="#reviews" class="active" data-bs-toggle="tab">{{ __("Garage's Reviews") }}</a></li>
                        <li><a href="#review-box" data-bs-toggle="tab">{{ __("Garage's Write a Review") }}</a></li>
                    </ul>
                    <div class="tab-content mt-30">
                        {{-- <div class="tab-pane fade  show" id="location">
                            <h4 class="mb-4">{{ __('Map Location') }}</h4>
                            <div class="map-frame rounded overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d890613.292526755!2d48.09618938209802!3d29.31290254021812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fc5363fbeea51a1%3A0x74726bcd92d8edd2!2z2KfZhNmD2YjZitiq4oCO!5e0!3m2!1sar!2seg!4v1665413778428!5m2!1sar!2seg"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div> --}}
                        <div class="tab-pane fade active show" id="reviews">
                            <ul class="dealer_reviews">
                                @foreach($garage->comments as $key => $comment)
                                <li class="d-flex align-items-center">
                                    <img src="{{ asset('frontend/assets/img/author/cm-user-1.jpg') }}" alt="client" class="flex-shrink-0 rou nded-circle">
                                    <div class="review_content ms-3">
                                        <h6 class="mb-1">{{ $comment->info->name }}
                                            <span class="date ms-4">{{ $comment->created_at->format('d.m.Y[h:ia]') }}</span>
                                        </h6>
                                        <p class="mb-0 mt-3">
                                            {{ $comment->body }}
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="review-box">
                            <div class="review_box bg-white p-4 rounded">
                                <h6>{{ __('Write a Review') }}</h6>
                                <hr class="w-50 mb-4">
                                <div class="review-form-wrap">
                                    <span>{{ __('Your Rating & Review') }}</span>

                                    <form action="{{ route('frontend.comments.store',$garage->id) }}" method="post" class="mt-4">
                                        @csrf
                                        <input type="hidden" name="type" value="garage-review">
                                        <input type="text" name="info[name]" placeholder="{{ __('Your Name') }}" class="border w-100 mt-3 rounded px-3 py-2">
                                        <input type="text" name="info[email]" placeholder="{{ __('Your Email') }}" class="border w-100 mt-3 rounded px-3 py-2">

                                        <select name="info[stars]" class="border w-100 mt-3 rounded px-3 py-2 form-control">
                                            <option value="">{{ __('select stars') }}</option>
                                            @for($i = 1; $i < 5; $i++) <option value="{{ $i }}">
                                                {{ $i }}
                                                </option>
                                                @endfor
                                        </select>

                                        <textarea class="border w-100 mt-3 rounded px-3 py-2" name="body" rows="6" placeholder="Your Review">
                                            </textarea>
                                        <button type="submit" class="btn btn-primary btn-md mt-4">{{ __('Submit Review') }}</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3">
                <div class="dl_single_sidebar mt-5 mt-xl-0">
                    <div class="dl_sidebar_widget dl_contact_widget bg-white">
                        <h6 class="mb-3">{{ __('Contact With This Automall') }}</h6>
                        <form action="" class="dl_form_style">
                            <input type="text" placeholder="{{ __('Your full name') }}" class="border w-100 rounded">
                            <input type="tel" placeholder="{{ __('Phone') }}" class="border w-100 rounded mt-3">
                            <input type="email" placeholder="{{ __('Email') }}" class="border w-100 rounded mt-3">
                            <textarea placeholder="Message" class="border mt-3 w-100 rounded" rows="4"></textarea>
                            <button class="btn btn-secondary w-100 btn-md mt-4">{{ __('Submit Now') }}</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
