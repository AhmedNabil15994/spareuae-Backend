@extends('apps::frontend.layouts.app')
@section( 'content')
<section class="promotion-section ptb-60 position-relative z-1 overflow-hidden">
  <div class="container">
    <div class="fq-area">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8">
          <div class="at-section-title text-center">
            <span class="at-subtitle position-relative text-primary lead">{{ __('Help') }}</span>
            <h2 class="h2 mb-0 mt-2">
              {{ __('Solving Problems') }}
            </h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-12">
          <div class="faq-tabs mt-5 brands-filter">
            <ul class="nav nav-tabs border-0 justify-content-center">
              <li>
                <a href="#general" data-bs-toggle="tab" class="active">
                  <span class="me-2 ms-2">
                    <i class="fa-solid fa-users"></i>
                  </span>
                  {{ __('General Questions') }}
                </a>
              </li>
              <li>
                <a href="#technical" data-bs-toggle="tab">
                  <span class="me-2 ms-2">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                  </span>
                  {{ __('Your Car Problems') }}
                </a>
              </li>
            </ul>
            <div class="tab-content mt-60">
              @include('apps::frontend.layouts._message')
              @if($errors->all())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <div class="tab-pane fade show active" id="general">
                <div class="row g-4">
                  <div class="col-xl-12">
                    <!--blog grid section start-->
                    <div class="blog-grid-area pb-120">
                      <div class="container">
                        <div class="row g-4 justify-content-center masonry_grid">
                          @foreach($questions as $question)
                          <div class="col-xl-3 col-md-6 grid_item">
                            <div class="h2-blog-card bg-white">
                              <a href="{{ route('frontend.questions.show',$question->id) }}" class=" d-block">
                                <i class="fa-solid fa-question-circle"></i>
                                <h4>{!! $question->question !!}</h4>
                              </a>
                              <div class="iv-meta">
                                <span><img src="{{ asset('frontend/assets/img/Flags/ku.jpg') }}" alt="flag" class="img-fluid flags"></span>
                                <span><i class="fa-solid fa-calendar"></i> {{ $question->created_at->format('Y/m/d') }} </span>
                                <span>
                                  <i class="fa-solid fa-comment"></i> {{ $question->comments_count }} {{ __('Comments')
                                  }}</span>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                        <div class="template-pagination mt-50">
                          {{ $questions->links('vendor.pagination.default') }}
                        </div>
                      </div>
                    </div>
                    <!--blog grid section end-->
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="technical">
                <!--car listing section start-->
                <section class="car-listing-section ">
                  <div class="container">
                    <div class="row">
                      <div class="col-xl-12">
                        <div class="car_listing_form">
                          @include('apps::frontend.layouts._message')
                          @if($errors->all())
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif
                          <form method="post" action="{{ route('frontend.questions.ask-question') }}">
                            @csrf
                            <div class="listing_info_box bg-white rounded" id="basic">
                              <h5 class="mb-4">{{ __('Problem information') }}</h5>
                              <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                              <div class="row g-4">
                                <div class="col-sm-12">
                                  <div class="input-field">
                                    <label>{{ __('Your Question') }}</label>
                                    <input type="text" name="question" required placeholder="{{ __('Your Question?') }}">
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-field">
                                    <label>{{ __('Problem Description') }}</label>
                                    <textarea placeholder="{{ __('Description') }}" required name="desc" rows="6"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="form-btns d-flex align-items-center mt-40">
                              <button type="submit" class="btn btn-primary">{{ __('Add Problem') }}
                                <span class="ms-2"><i class="fa-solid fa-arrow-right"></i>
                                </span></button>
                            </div>
                          </form>
                        </div>
                        <hr class="mt-30 mb-30">
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
