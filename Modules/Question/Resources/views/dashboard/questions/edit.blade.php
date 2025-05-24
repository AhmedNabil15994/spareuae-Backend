@extends('apps::dashboard.layouts.app')
@section('title', __('question::dashboard.questions.routes.update'))
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
                    <a href="{{ url(route('dashboard.questions.index')) }}">
                        {{__('question::dashboard.questions.routes.index')}}
                    </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">{{__('question::dashboard.questions.routes.update')}}</a>
                </li>
            </ul>
        </div>

        <h1 class="page-title"></h1>

        <div class="row">
            {!! Form::model($model,[
            'url'=> route('dashboard.questions.update',$model->id),
            'id'=>'form',
            'role'=>'form',
            'method'=>'put',
            'class'=>'form-horizontal form-row-seperated',
            'files' => true
            ])!!}

            @csrf
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
                                                {{ __('question::dashboard.questions.form.tabs.general') }}
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

                        {{-- UPDATE FORM --}}
                        <div class="tab-pane active fade in" id="global_setting">

                            <div class="col-md-10">
                                @include('question::dashboard.questions.form')
                            </div>
                        </div>
                        {{-- END UPDATE FORM --}}

                    </div>
                </div>

                {{-- PAGE ACTION --}}
                <div class="col-md-12">
                    <div class="form-actions">
                        @include('apps::dashboard.layouts._ajax-msg')
                        <div class="form-group">
                            <button type="submit" id="submit" class="btn btn-lg green">
                                {{__('apps::dashboard.buttons.edit')}}
                            </button>
                            <a href="{{url(route('dashboard.questions.index')) }}" class="btn btn-lg red">
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
