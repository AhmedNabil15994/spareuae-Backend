@extends('apps::dashboard.layouts.app')
@section('title', __('qsale::dashboard.ads.routes.addations.create'))
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
            {{__('qsale::dashboard.ads.routes.index')}}
          </a>
          <i class="fa fa-circle"></i>
        </li>
        <li>
          <a href="#">{{__('qsale::dashboard.ads.routes.addations.create')}}</a>
        </li>
      </ul>
    </div>

    <h1 class="page-title"></h1>

    <div class="row">
      <form id="form"
        role="form"
        class="form-horizontal form-row-seperated"
        method="post"
        enctype="multipart/form-data"
        action="{{route('dashboard.ads.store.additions',['ads'=>$ads->id])}}">
        @csrf
        <div class="col-md-12">

          {{-- RIGHT SIDE --}}
          <div class="col-md-3">
            <div class="panel-group accordion scrollable"
              id="accordion2">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a class="accordion-toggle"></a></h4>
                </div>
                <div id="collapse_2_1"
                  class="panel-collapse in">
                  <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                      <li class="active">
                        <a href="#general"
                          data-toggle="tab">
                          {{ __('qsale::dashboard.ads.form.tabs.general') }}
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
              <div class="tab-pane active fade in"
                id="general">
              
                <div class="col-md-10">
                  <div class="form-group">
                    <label class="col-md-2">
                      {{ __('qsale::dashboard.ads.form.addations') }}
                    </label>
                    <div class="col-md-9">
                      <select name="addation_id"
                        id="addations"
                        class="form-control select2"
                        data-name="addation_id">
                        @foreach ($addations as $addation )
                        <option value="{{$addation->id}}"> {{$addation->name}}</option>
                        @endforeach
                      </select>
                      <div class="help-block"></div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- END CREATE FORM --}}

            </div>
          </div>

          {{-- PAGE ACTION --}}
          <div class="col-md-12">
            <div class="form-actions">
              @include('apps::dashboard.layouts._ajax-msg')
              <div class="form-group">
                <button type="submit"
                  id="submit"
                  class="btn btn-lg blue">
                  {{__('apps::dashboard.buttons.add')}}
                </button>
                <a href="{{url(route('dashboard.ads.index')) }}"
                  class="btn btn-lg red">
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
