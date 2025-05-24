@extends('apps::dashboard.layouts.app')
@section('title', __('user::dashboard.companies.routes.index'))
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
                    <a href="#">{{__('user::dashboard.companies.routes.index')}}</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">

                    @can('add_companies')
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ url(route('dashboard.companies.create')) }}" class="btn sbold green">
                                        <i class="fa fa-plus"></i> {{__('apps::dashboard.buttons.add_new')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                    {{-- DATATABLE FILTER --}}
                    <div class="row">
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>
                                    {{__('apps::dashboard.datatable.search')}}
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="filter_data_table">
                                    <div class="panel-body">
                                        <form id="formFilter" class="horizontal-form">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                {{__('apps::dashboard.datatable.form.date_range')}}
                                                            </label>
                                                            <div id="reportrange" class="btn default form-control">
                                                                <i class="fa fa-calendar"></i> &nbsp;
                                                                <span> </span>
                                                                <b class="fa fa-angle-down"></b>
                                                                <input type="hidden" name="from">
                                                                <input type="hidden" name="to">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                {{__('apps::dashboard.datatable.form.soft_deleted')}}
                                                            </label>
                                                            <div class="mt-radio-list">
                                                                <label class="mt-radio">
                                                                    {{__('apps::dashboard.datatable.form.delete_only')}}
                                                                    <input type="radio" value="only" name="deleted" />
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    {{__('apps::dashboard.datatable.form.with_deleted')}}
                                                                    <input type="radio" value="with" name="deleted" />
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                {{__('apps::dashboard.datatable.form.status')}}
                                                            </label>
                                                            <div class="mt-radio-list">
                                                                <label class="mt-radio">
                                                                    {{__('apps::dashboard.datatable.form.active')}}
                                                                    <input type="radio" value="1" name="status" />
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    {{__('apps::dashboard.datatable.form.unactive')}}
                                                                    <input type="radio" value="0" name="status" />
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                {{__('user::dashboard.companies.datatable.admin_verified')}}
                                                            </label>
                                                            <div class="mt-radio-list">
                                                                <label class="mt-radio">
                                                                    {{__('apps::dashboard.datatable.yes')}}
                                                                    <input type="radio" value="1" name="admin_verified" />
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    {{__('apps::dashboard.datatable.no')}}
                                                                    <input type="radio" value="0" name="admin_verified" />
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>


                                            </div>
                                        </form>
                                        <div class="form-actions">
                                            <button class="btn btn-sm green btn-outline filter-submit margin-bottom" id="search">
                                                <i class="fa fa-search"></i>
                                                {{__('apps::dashboard.datatable.search')}}
                                            </button>
                                            <button class="btn btn-sm red btn-outline filter-cancel">
                                                <i class="fa fa-times"></i>
                                                {{__('apps::dashboard.datatable.reset')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END DATATABLE FILTER --}}

                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">
                                {{__('user::dashboard.companies.routes.index')}}
                            </span>
                        </div>
                    </div>

                    {{-- DATATABLE CONTENT --}}
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="javascript:;" onclick="CheckAll()">
                                            {{__('apps::dashboard.buttons.select_all')}}
                                        </a>
                                    </th>
                                    <th>#</th>
                                    <th>{{__('user::dashboard.companies.datatable.image')}}</th>
                                    <th>{{__('user::dashboard.companies.datatable.name')}}</th>
                                    <th>{{__('user::dashboard.companies.datatable.email')}}</th>
                                    <th>{{__('user::dashboard.companies.datatable.mobile')}}</th>
                                    <th>{{__('user::dashboard.companies.datatable.status')}}</th>
                                    <th>{{__('user::dashboard.companies.datatable.type')}}</th>


                                    <th>{{__('user::dashboard.companies.datatable.created_at')}}</th>
                                    <th>{{__('user::dashboard.companies.datatable.options')}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" id="deleteChecked" class="btn red btn-sm"
                                onclick="deleteAllChecked('{{ url(route('dashboard.companies.deletes')) }}')">
                                {{__('apps::dashboard.datatable.delete_all_btn')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')

<script>
    function tableGenerate(data='') {

      var dataTable =
      $('#dataTable').DataTable({
          "createdRow": function( row, data, dataIndex ) {
             if ( data["deleted_at"] != null ) {
                $(row).addClass('danger');
             }
             if (! data["admin_verified"] ) {
                $(row).addClass('info');
             }

          },
          ajax : {
              url   : "{{ url(route('dashboard.companies.datatable')) }}",
              type  : "GET",
              data  : {
                  req : data,
              },
          },
          language: {
              url:"//cdn.datatables.net/plug-ins/1.10.16/i18n/{{ucfirst(LaravelLocalization::getCurrentLocaleName())}}.json"
          },
          stateSave: true,
          processing: true,
          serverSide: true,
          responsive: !0,
          order     : [[ 1 , "desc" ]],
          columns: [
            {data: 'id' 		 	        , className: 'dt-center'},
      			{data: 'id' 		 	        , className: 'dt-center'},
            { data: "image" ,orderable: false , width: "1%",
              render: function(data, type, row){
                return '<img src="'+data+'" width="50px"/>'
              }
            },
      			{data: 'name' 			      , className: 'dt-center'},
            {data: 'email' 	          , className: 'dt-center'},
                  {data: 'mobile' 	        , className: 'dt-center'},
                  {data: 'is_active' 	        , className: 'dt-center'},
                  {data: 'type' 	        , className: 'dt-center',  render: function(data, type, row){
                        return '<span class="badge badge-info"> {{__('user::dashboard.companies.datatable.company')}} </span>';
                    }},


            {data: 'created_at' 		  , className: 'dt-center'},
            {data: 'id'},
      		],
          columnDefs: [
            {
      				targets: 0,
      				width: '30px',
      				className: 'dt-center',
      				orderable: false,
      				render: function(data, type, full, meta) {
      					return `<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                          <input type="checkbox" value="`+data+`" class="group-checkable" name="ids">
                          <span></span>
                        </label>
                      `;
      				},
      			},
            {
               targets: -1,
 responsivePriority:1,
              width: '13%',
              title: '{{__('user::dashboard.companies.datatable.options')}}',
              className: 'dt-center',
              orderable: false,
              render: function(data, type, full, meta) {

                       // Edit
      					var editUrl = '{{ route("dashboard.companies.edit", ":id") }}';
      					editUrl = editUrl.replace(':id', data);
                        //show
                        var showUrl = '{{ route("dashboard.companies.show", ":id") }}';
      					showUrl = showUrl.replace(':id', data);
      					// Delete
      					var deleteUrl = '{{ route("dashboard.companies.destroy", ":id") }}';
      					deleteUrl = deleteUrl.replace(':id', data);

      					return `
                          <a href="`+showUrl+`" class="btn btn-sm yellow" title="Show">
      			              <i class="fa fa-eye"></i>
      			            </a>
                @can('edit_companies')
      						<a href="`+editUrl+`" class="btn btn-sm blue" title="Edit">
      			              <i class="fa fa-edit"></i>
      			            </a>
      					@endcan

                @can('delete_companies')
                @csrf
                  <a href="javascript:;" onclick="deleteRow('`+deleteUrl+`')" class="btn btn-sm red">
                    <i class="fa fa-trash"></i>
                  </a>
                @endcan`;
              },
            },
            {
      				targets: 6,
      				width: '30px',
      				className: 'dt-center',
      				render: function(data, type, full, meta) {

                        if (data == 1) {
                        return '<span class="badge badge-success"> {{__('apps::dashboard.datatable.available')}} </span>';
                        }else{
                        return '<span class="badge badge-danger"> {{__('apps::dashboard.datatable.unavailable')}} </span>';
                        }
      				},
      			},
          ],
          dom: 'Bfrtip',
          lengthMenu: [
              [ 10, 25, 50 , 100 , 500 ],
              [ '10', '25', '50', '100' , '500']
          ],
  				buttons:[
  					{
  						extend: "pageLength",
              className: "btn blue btn-outline",
              text: "{{__('apps::dashboard.datatable.pageLength')}}",
              exportOptions: {
                  stripHtml: true,
                  columns: ':visible',
                  columns: [ 1 , 2 , 3 , 4 , 5 , 6.7]
              }
  					},
  					{
  						extend: "print",
              className: "btn blue btn-outline" ,
              text: "{{__('apps::dashboard.datatable.print')}}",
                exportOptions: {
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1 , 2 , 3 , 4 , 5 , 6,7]
                }
  					},
  					{
  							extend: "pdf",
                className: "btn blue btn-outline" ,
                text: "{{__('apps::dashboard.datatable.pdf')}}",
                exportOptions: {
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1 , 2 , 3 , 4 , 5 , 6,7]
                }
  					},
  					{
  							extend: "excel",
                className: "btn blue btn-outline " ,
                text: "{{__('apps::dashboard.datatable.excel')}}",
                exportOptions: {
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1  , 3 , 4 , 5 , 6,7]
                }
  					},
  					{
  							extend: "colvis",
                className: "btn blue btn-outline",
                text: "{{__('apps::dashboard.datatable.colvis')}}",
                exportOptions: {
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1 , 2 , 3 , 4 , 5 , 6,7]
                }
  					}
  				]
      });
  }

  jQuery(document).ready(function() {
  	tableGenerate();
  });
</script>

@stop
