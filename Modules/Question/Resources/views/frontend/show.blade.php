@extends('apps::frontend.layouts.app')
@section( 'content')
<section class="inventory-details-area pb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="inventory-details">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="product_info bg-white rounded widget-padding mt-30">
                                <h4>{!! $question->question !!}</h4>
                                <div class="iv-meta row justify-content-between  mb-40">
                                    <div class="col-12 col-md-6">
                                        <span><img src="{{ asset('frontend/assets/img/Flags/ku.jpg') }}" alt="flag" class="img-fluid flags"></span>
                                        <span><i class="fa-solid fa-calendar"></i> {{ $question->created_at->format('d/m/Y') }} </span>
                                        <span><i class="fa-solid fa-comment"></i> {{ $question->comments_count }} {{ __('Comments') }}</span>
                                        <span><i class="fa-solid fa-eye"></i>{{ __('Views') }}: {{ $question->views }}</span>
                                    </div>
                                </div>
                                <p>{!! $question->desc !!}</p>
                                <p>{!! $question->answer !!}</p>

                                <hr class="mt-30 mb-30">
                                <h4>{{ __('Comments') }}({{ $question->comments_count }})</h4>
                                <ul class="comments_list mt-40">
                                    @foreach($question->comments as $key => $comment)
                                    <li class="d-flex align-items-center">
                                        <img src="{{ asset('frontend/assets/img/author/cm-user-1.jpg') }}" alt="client" class="flex-shrink-0 rou nded-circle">
                                        <div class="review_content ms-3">
                                            <h6 class="mb-1">{{ $comment->user?->name??$comment->info->name }}
                                                <span class="date ms-4">{{ $comment->created_at->format('d.m.Y[h:ia]') }}</span>
                                            </h6>
                                            <p class="mb-0 mt-3">
                                                {{ $comment->body }}
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <hr class="mt-40 mb-40">
                                <div class="comment_form_wrapper">
                                    <h4>{{ __('Leave a Comments') }}</h4>
                                    <p class="mb-30">{{ __('Your email address will not be published. Required fields are marked*') }}</p>
                                    <form action="{{ route('frontend.comments.store',$question->id) }}" method="POST" class="comment_form">
                                        @csrf
                                        <input type="hidden" name="type" value="question">
                                        <div class="row g-3">
                                            @guest
                                            <div class="col-sm-6">
                                                <div class="input-field">
                                                    <input type="text" placeholder="{{ __('Name') }}" name="info[name]">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-field">
                                                    <input type="email" placeholder="{{ __('Email') }}" name="info[email]">
                                                </div>
                                            </div>
                                            @endguest
                                            <div class="col-sm-12">
                                                <div class="input-field">
                                                    <textarea name="body" placeholder="{{ __('Paste Here') }}" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-30">{{ __('Post Comment') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
