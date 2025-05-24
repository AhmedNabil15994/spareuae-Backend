@extends('apps::dashboard.layouts.app')
@section('title', __('qsale::dashboard.payments.routes.index'))
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
          <a href="#">{{__('qsale::dashboard.payments.routes.index')}}</a>
        </li>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          {{-- DATATABLE FILTER --}}
          <div class="row">
            <div class="portlet box grey-cascade">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-gift"></i>
                  {{__('apps::dashboard.datatable.search')}}
                </div>
                <div class="tools">
                  <a href="javascript:;"
                    class="collapse"
                    data-original-title=""
                    title=""> </a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="filter_data_table">
                  <div class="panel-body">
                    <form id="formFilter"
                      class="horizontal-form">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label">
                                {{__('apps::dashboard.datatable.form.date_range')}}
                              </label>
                              <div id="reportrange"
                                class="btn default form-control">
                                <i class="fa fa-calendar"></i> &nbsp;
                                <span> </span>
                                <b class="fa fa-angle-down"></b>
                                <input type="hidden"
                                  name="from">
                                <input type="hidden"
                                  name="to">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="form-actions">
                      <button class="btn btn-sm green btn-outline filter-submit margin-bottom"
                        id="search">
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
                {{__('qsale::dashboard.payments.routes.index')}}
              </span>
            </div>
          </div>

          {{-- DATATABLE CONTENT --}}
          <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover"
              id="dataTable">
              <thead>
                <tr>
                  <th data-priority="1">{{__('qsale::dashboard.payments.datatable.user')}}</th>
                  <th data-priority="1">{{__('qsale::dashboard.payments.datatable.ads')}}</th>
                  <th data-priority="1">{{__('qsale::dashboard.payments.datatable.total')}}</th>
                  <th>{{__('qsale::dashboard.payments.datatable.status')}}</th>
                  <th>{{__('qsale::dashboard.payments.datatable.created_at')}}</th>
                </tr>
              </thead>
              <tfoot>
                <th>-</th>
                <th>-</th>
                <th>-</th>
                <th>-</th>
                <th>-</th>
              </tfoot>
            </table>
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

          },
          ajax : {
              url   : "{{ url(route('dashboard.payments.datatable')) }}",
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
          order     : [[ 0 , "desc" ]],
          columns: [
            {data: 'user_id',className: 'dt-center',orderable:false,searchable:false},
            {data: 'ads',className: 'dt-center'},
            {data:"total",className: 'dt-center'},
            {data:"status",className: 'dt-center'},
            {data: 'created_at' 		  , className: 'dt-center'},
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
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1 , 2 , 3 , 4 , 5, 6]
                }
  					},
  					{
    						extend: "print",
                className: "btn blue btn-outline" ,
                text: "{{__('apps::dashboard.datatable.print')}}",
                exportOptions: {
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1 , 2 , 3 , 4 , 5, 6]
                }
  					},
  					{
  							extend: "pdf",
                className: "btn blue btn-outline" ,
                text: "{{__('apps::dashboard.datatable.pdf')}}",
                exportOptions: {
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1 , 2 , 3 , 4 , 5, 6]
                }
  					},
  					{
  							extend: "excel",
                className: "btn blue btn-outline " ,
                text: "{{__('apps::dashboard.datatable.excel')}}",
                exportOptions: {
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1 , 2 , 3 , 4 , 5, 6]
                }
  					},
  					{
  							extend: "colvis",
                className: "btn blue btn-outline",
                text: "{{__('apps::dashboard.datatable.colvis')}}",
                exportOptions: {
                    stripHtml : false,
                    columns: ':visible',
                    columns: [ 1 , 2 , 3 , 4 , 5, 6]
                }
  					}
  				],
          footerCallback: function (row, data, start, end, display) {
            var api = this.api()

            var intVal = function (i) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '') * 1 :
            typeof i === 'number' ?
            i : 0;
            };

            var total = api
            .column(2)
            .data()
            .reduce(function (a, b) {
            return intVal(a) + intVal(b);
            }, 0);


            $(api.column(2).footer()).html(
            `<div style="color:green">${total} </div> `
            );



            }
      });
  }

  jQuery(document).ready(function() {
  	tableGenerate();
  });
</script>
@stop
