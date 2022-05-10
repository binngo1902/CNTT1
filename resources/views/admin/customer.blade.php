@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý khách hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Khách hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary float-right" id="iconNewCus" data-toggle='modal' data-target="#newCus">New Customer</button>

              </div>

              <!-- /.card-header -->
              <div class="card-body" id="listCus">

<table id="example1" class="table table-bordered table-striped ">
    @csrf
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Hoạt động</th>



        </tr>
    </thead>
    {{-- <tbody>
        @foreach ($custs as $cust )

        <tr>
            <td>{{$cust->customer_id}}</td>
            <td>{{$cust->customer_name}}</td>
            <td>{{$cust->email}}</td>
            <td>{{$cust->address}}</td>
            <td>{{$cust->tel_num}}</td>


        </tr>
        @endforeach



          <!-- Modal -->

    </tbody> --}}

</table>




              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




  {{-- popup new --}}
  <div class="modal fade" id="newCus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <form action="" method="post" id="newForm">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Thêm khách hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Tên</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" placeholder="Nhập họ tên"  name="name">
              <span class="error_message" id="new_errorName"></span>
            </div>
          </div>


            <div class="form-group row">
              <label  class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control"  placeholder="Nhập Email"  name="email">
                <span class="error_message" id="new_errorEmail"></span>
            </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Điện thoại</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" placeholder="Nhập số điện thoại"  name="tel_num" >
                  <span class="error_message" id="new_errorTelnum"></span>
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Địa chỉ</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" >
                  <span class="error_message" id="new_errorAddress"></span>

                </div>
            </div>





            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Trạng thái</label>
                <div class="col-sm-9" id="checkbox">
                    <input type="checkbox"  name='is_active' value="1" >
                    <label for="">Hoạt động</label>
                </div>
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-primary">Đồng ý</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  {{-- popup errors --}}
  <div class="modal fade" id="errors" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Lỗi Edit khách hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

              <p class="error_message" id="new_errorName"></p>
              <p class="error_message" id="new_errorEmail"></p>
              <p class="error_message" id="new_errorAddress"></p>
              <p class="error_message" id="new_errorTelnum"></p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>

    </div>
  </div>

{{-- popup import --}}
    <div class="modal fade" id="newImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
        <form action="" method="post" id="newImportForm" enctype="multipart/form-data">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Import CSV</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                    <div class="form-group">
                      <label for="exampleFormControlFile1">Chọn file </label>
                      <input type="file" name="excelfile"class="form-control-file" id="file">
                    </div>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
            <button type="submit" class="btn btn-primary">Tải lên</button>
            </form>
            </div>
            <div class="alert alert-success" hidden id="alert">
                Đã thêm thành công. (Hiện lỗi nếu có)
            </div>
            <table class="table table-hover table-danger " id="errorsTable" hidden>
                <thead>
                  <tr>
                    <th scope="col">Dòng</th>
                    <th scope="col">Tên cột</th>
                    <th scope="col">Lỗi</th>
                    <th scope="col">Đã nhập</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>

              </table>
            </div>

        </div>
        </div>
    </div>

  @endsection
@section('script')
<script>


        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
         }
        });
    $(document).ready(function () {
        $("#example1").DataTable({

            processing: true,
            serverSide: true,
            ajax: '{!! route('ajaxListCustomer') !!}',
            columns: [
                    { data: 'customer_id', name: 'customer_id'},
                    { data: 'customer_name', name: 'customer_name' },
                    { data: 'email', name: 'email' },
                    { data: 'address', name: 'address' },
                    { data: 'tel_num', name: 'tel_num' },
                    { data: 'is_active', visible:false,
                        "render": function ( data, type, row ) {
                            // if (type=='filter')
                             return data==1 ? 'Đang hoạt động' : 'Không hoạt động';


                             }

                    }
                ],
            language:{
            "info":           "Hiển thị từ _START_ ~ _END_ trong tổng số _TOTAL_ user",
            "zeroRecords":    "Không có dữ liệu",
            "lengthMenu": "Hiển thị _MENU_ ",
            "search" : "Tìm kiếm: ",
            "infoFiltered": ""

            },
            order: [[ 0, "desc" ]],
            "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            buttons: [
                {
                    // className:'fas fa-sync-alt',
                    text: '<i class="fas fa-sync-alt"></i>',
                    className: 'reload_button ',
                    init: function(api, node, config) {
                        $(node).removeClass(' btn-secondary');
                        },
                    action: function ( e, dt, node, config ) {
                       dt.columns().search('')
                            .draw()
                        }
                    },
                {
                    // className:'',
                        extend: 'collection',
                        text: '<i class="fas fa-briefcase"></i>',
                        autoClose:true,
                        init: function(api, node, config) {
                            $(node).removeClass(' buttons-collection btn-secondary dropdown-toggle')
                            },
                        buttons: [

                                {
                                className: 'btn btn-primary',
                                text: 'Hoạt động',
                                init: function(api, node, config) {
                                    $(node).removeClass('btn-secondary')
                                    },

                                action: function ( e, dt, node, config ) {
                                    dt.columns( 5 )
                                        .search( 1 )
                                        .draw()
                                    }
                                },
                                {
                                className: 'btn btn-primary',
                                text: 'Không hoạt động',
                                init: function(api, node, config) {
                                    $(node).removeClass('btn-secondary')
                                    },
                                action: function ( e, dt, node, config ) {
                                    dt.columns( 5 )
                                        .search( 0 )
                                        .draw()
                                    }
                                },
                        ]
                },

                    {
                        className:'text-dark  ',
                        extend: 'collection',
                        text: '',
                        autoClose:true,
                        init: function(api, node, config) {
                            $(node).removeClass('buttons-collection btn-secondary')
                            },
                        buttons: [


                            {
                                className:'btn-primary popup_csv',
                                init: function(api, node, config) {
                                    $(node).removeClass('btn-secondary');
                                    $(node).attr('data-toggle','modal').attr('data-target','#newImport');
                                },
                                text: 'Import CSV',

                            },
                            {
                                className:'btn btn-primary',
                                init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                                },
                                text: 'Export CSV',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    modifier: { search: 'applied'}
                                }
                            }
                        ]
                    }



            ],
            dom:'lBfrtip'
        });
        $('#example1_wrapper > .dt-buttons').appendTo('div.dataTables_filter');










        $('#example1').on('draw.dt',function () {
            $('#example1').Tabledit({
                url: '{{route("customer.action")}}',
                // dataType:'json',
                columns: {
                    identifier: [0,'id'],
                    editable: [[1,'name'],[2,'email'],[3,'address'],[4,'tel_num']],
                },
                restoreButton:true,
                deleteButton: false,

                buttons:{
                    edit: {
                            class: 'btn btn-sm btn-default',
                            html: '<span class="far fa-edit" style="color:blue"></span>',
                            action: 'edit'
                        },

                },
                onAjax: function(action, serialize) {

                    console.log("on Ajax");
                    console.log("action : ", action);
                    console.log("data : ", serialize);
                },
                onFail: function (jqXHR, textStatus, errorThrown) {
                		console.log(textStatus);
                		console.log(errorThrown);
                	},
                onSuccess:function(data,textStatus,jqXHR){
                    if (data.error){

                        // restoreButton

                        $('#errors').on('show.bs.modal', function (event) {
                            var modal = $(this);

                            modal.find('.modal-body #new_errorName').text('');
                            modal.find('.modal-body #new_errorEmail').text('');
                            modal.find('.modal-body #new_errorAddress').text('');
                            modal.find('.modal-body #new_errorTelnum').text('');

                            modal.find('.modal-header #exampleModalLongTitle').text('Lỗi Edit khách hàng ID '+data.id);

                            modal.find('.modal-body #new_errorName').text(data.error.name);
                            modal.find('.modal-body #new_errorEmail').text(data.error.email);
                            modal.find('.modal-body #new_errorAddress').text(data.error.address);
                            modal.find('.modal-body #new_errorTelnum').text(data.error.tel_num);

                        });
                        $('#errors').modal('show');
                    }
                    $('#example1').DataTable().ajax.reload();
                }

             });
        });


        // lockuser



        $('#newCus').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var modal = $(this);
            modal.find('.modal-body  input[name="name"]').val('');
            modal.find('.modal-body input[name="email"]').val('');
            modal.find('.modal-body input[name="tel_num"]').val('');
            modal.find('.modal-body input[name="address"]').val('');
            modal.find('.modal-body input[name="checkLock"]').prop('checked',0);
            modal.find('.modal-body #new_errorName').text('');
            modal.find('.modal-body #new_errorTelnum').text('');
            modal.find('.modal-body #new_errorAddress').text('');

            modal.find('.modal-body #new_errorEmail').text('');




        });
        $('#newForm').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "{{route('ajaxNewCustomer')}}",
                data: $('#newForm').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#new_errorName ').empty();
                    $('#new_errorEmail').empty();
                    $('#new_errorTelnum').empty();
                    $('#new_errorAddress').empty();
                    if (response.error){

                            $('#new_errorName').html(response.error.name);

                            $('#new_errorEmail').html(response.error.email);

                            $('#new_errorTelnum').html(response.error.tel_num);


                            $('#new_errorAddress').html(response.error.address);
                    }
                    else{

                        $('#newCus').modal('hide');
                        $('#example1').DataTable().ajax.reload();

                    }
                }
            });
        });


        $('#newImport').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var modal = $(this);
            modal.find(' #errorsTable').attr('hidden',1);

            modal.find('#alert').attr('hidden',1);
            modal.find('.modal-body #file').val('');

        });
        $('#newImportForm').on('submit',function(e){
            e.preventDefault();
            var data1 = new FormData(this);
            $.ajax({
                type: "post",
                url: "{{route('submit')}}",
                data: data1,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#errorsTable tbody').html('');
                    if (response.error){
                        $('#errorsTable').removeAttr('hidden');
                        var trtag="";

                        $.each(response.error, function (i, value) {
                            var err = ''
                            if (value.attribute == 'name'){
                                err += '<span>' + value.values.name + '</span>';
                            }else if (value.attribute == 'email'){
                                err += '<span>' + value.values.email + '</span>';
                            }else if (value.attribute == 'address'){
                                err += '<span>' + value.values.address + '</span>';
                            }else if (value.attribute == 'telnum'){
                                err += '<span>' + value.values.telnum + '</span>';
                            };
                            trtag += '<tr><td>' + value.row + '</td><td>'
                                    + value.attribute + '</td><td>' + value.errors+ '</td><td>'+
                                    err+ '</td></tr>';
                        });
                        $('#errorsTable tbody').append(trtag);

                    }
                    $('#alert').removeAttr('hidden');

                    $('#example1').DataTable().ajax.reload();

                }
            });
        });









    });

  </script>
@endsection
