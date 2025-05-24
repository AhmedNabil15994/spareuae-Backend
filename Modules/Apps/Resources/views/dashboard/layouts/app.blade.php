<!DOCTYPE html>
<html lang="{{ locale() }}" dir="{{ is_rtl() }}">

@if (is_rtl() == 'rtl')
@include('apps::dashboard.layouts._head_rtl')
@else
@include('apps::dashboard.layouts._head_ltr')
@endif
<style>
  .table-striped {
    width: 100% !important;
  }

</style>


<link href="{{asset('SewidanField/plugins/ck-editor-5/css/ckeditor.css')}}" rel="stylesheet" id="style_components" type="text/css" />

{{-- scripts --}}

@stack('styles')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
  <div class="page-wrapper">

    @include('apps::dashboard.layouts._header')

    <div class="clearfix"> </div>

    <div class="page-container">
      @include('apps::dashboard.layouts._aside')

      @yield('content')
    </div>

    @include('apps::dashboard.layouts._footer')
  </div>

  @include('apps::dashboard.layouts._jquery')
  @include('apps::dashboard.layouts._js')
  <script src="{{asset('SewidanField/plugins/ck-editor-5/js/ckeditor.js')}}"></script>
  <script src="{{asset('SewidanField/plugins/ck-editor-5/js/ckEditorScripts.js')}}"></script>
  @stack('scripts')
</body>

</html>
