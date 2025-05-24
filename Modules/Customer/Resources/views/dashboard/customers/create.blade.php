@extends('apps::dashboard.layouts.app')
@section('title', __('customer::dashboard.customers.routes.create'))
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
            <a href="{{ url(route('dashboard.customers.index')) }}">
              {{ __('customer::dashboard.customers.routes.index') }}
            </a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <a href="#">{{ __('customer::dashboard.customers.routes.create') }}</a>
          </li>
        </ul>
      </div>

      <h1 class="page-title"></h1>

      <div class="row">

        {!! Form::model($model, [
    'url' => route('dashboard.customers.store'),
    'id' => 'form',
    'role' => 'form',
    'method' => 'POST',
    'class' => 'form-horizontal form-row-seperated',
    'files' => true,
]) !!}

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
                          {{ __('customer::dashboard.customers.form.tabs.general') }}
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

                  @include('customer::dashboard.customers.form')

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
                    <a href="{{ url(route('dashboard.customers.index')) }}" class="btn btn-lg red">
                      {{ __('apps::dashboard.buttons.back') }}
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
