@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Quản lý</li>
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
              <div class="card-header ">
                  <a type="button" class="btn btn-primary float-right"  href="{{route('newProduct')}}" >Thêm sản phẩm</a>

              </div>

              <!-- /.card-header -->
              <div class="card-body" id="listProduct">

            <table id="example1" class="table table-bordered table-striped " >
                <div class="table-head-right">
                    <input  id="mini" class="width" type="number" placeholder="Tìm giá min">
                    ~
                    <input  id="maxx" class="width"disabled type="number" placeholder="Tìm giá max"/>

                    </button>

                </div>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Tình trạng</th>
                        <th></th>
                        <th></th>






                    </tr>
                </thead>
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
  {{-- <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
              <span style="color:red" id="new_errorName"></span>
            </div>
          </div>


            <div class="form-group row">
              <label  class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control"  placeholder="Nhập Email"  name="email">
                <span style="color:red" id="new_errorEmail"></span>
            </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Điện thoại</label>
                <div class="col-sm-9">
                  <input type="text"  class="form-control" placeholder="Nhập số điện thoại"  name="tel_num" >
                  <span style="color:red" id="new_errorTelnum"></span>
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Địa chỉ</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" >
                  <span style="color:red" id="new_errorAddress"></span>

                </div>
            </div>





            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Trạng thái</label>
                <div class="col-sm-9" style="line-height: 2.6;">
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
  </div> --}}

  {{-- popup errors --}}
  {{-- <div class="modal fade" id="errors" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Lỗi Edit khách hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

              <p style="color:red" id="new_errorName"></p>
              <p style="color:red" id="new_errorEmail"></p>
              <p style="color:red" id="new_errorAddress"></p>
              <p style="color:red" id="new_errorTelnum"></p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>

    </div>
  </div> --}}

  {{-- popup delete --}}
  <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <form action="" method="GET" id="deleteForm">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nhắc nhở</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Bạn có muốn xóa sản phẩm có ID
          <span class="idUser"></span>
          không ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-primary">Đồng ý</button>
        </div>
      </div>
    </form>
    </div>
  </div>


  @endsection
@section('script')
<script>
        $('#mini').keyup(function (){
          if ($('#mini').val()){
            $('#maxx').removeAttr('disabled');
          }else{
            $('#maxx').attr('disabled','');
          }
        });



        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
         }
        });
    $(document).ready(function () {
        load_data();
        function load_data(min,max){
            // console.log(min,max);
            $("#example1").DataTable({

                processing: true,
                serverSide: true,
                ajax: {
                    url:"{!! route('ajaxListProduct') !!}",
                    data: { 'rangemin': min , 'rangemax':max},


                    },
                columns: [
                        {
                        data: 'product_id', name: 'product_id',
                            },

                        {
                        className: 'image',
                        data: 'product_name',
                        name: 'product_name',
                        "render":function(data,type,row){
                            if (row.product_image){
                                return row.product_name+ '<img class="image-product" src="/image/product/'+row.product_image+'" alt="">';
                            }else{
                                return row.product_name;
                            }
                            }
                        },


                        { data: 'description', name: 'description' ,
                            "render":function(data,type,row){
                                function stripHtml(html){
                                    // Create a new div element
                                    var temporalDivElement = document.createElement("div");
                                    // Set the HTML content with the providen
                                    temporalDivElement.innerHTML = html;
                                    // Retrieve the text property of the element (cross-browser support)
                                    return temporalDivElement.textContent || temporalDivElement.innerText || "";
                                }
                                return stripHtml(row.description);
                            }
                        },
                        { data: 'product_price', name: 'product_price' },

                        { data: 'is_sales',
                            "render": function ( data, type, row ) {
                                if (data==1)
                                return '<span style="color:green">Đang bán</span>';
                                if (data==2)
                                    return  '<span style="color:green">Hết hàng</span>';
                                if (data==0)
                                    return  '<span style="color:red">Dừng bán</span>';
                                }

                        },
                        {
                            data: 'product_image',name:'product_image',visible:false,

                        },
                    {
                            "data":null,
                            "render":function(data,type,row){
                                var a = '{{route("editProduct",":id")}}';
                                a =  a.replace(':id',row.product_id);
                                return '<a href="'+a+'" id="iconEditUser"><i class="far fa-edit" ></i></a>'+
                                       '<a href="" id="iconDeleteUser" data-toggle="modal" data-target="#deleteProduct" data-id="'+row.product_id+'"><i class="fas fa-trash-alt" style="padding-left:4px; padding-right:4px; color:red"></i></a>'
                                        ;
                            },
                            orderable:false,

                    }





                    ],


                language:{
                    "lengthMenu": "Hiển thị _MENU_ ",
                "info":           "Hiển thị từ _START_ ~ _END_ trong tổng số _TOTAL_ user",
                "zeroRecords":    "Không có dữ liệu",
                "search" : "Tìm kiếm: ",
                 "infoFiltered" : ""
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

                    },

                    {
                        extend: 'collection',
                        text: '<i class="fas fa-briefcase"></i>',
                        autoClose:true,
                        init: function(api, node, config) {
                            $(node).removeClass(' buttons-collection btn-secondary dropdown-toggle')
                            },
                        buttons: [
                            {
                            text: 'Đang bán',
                            action: function ( e, dt, node, config ) {
                                dt.columns( 4 )
                                    .search( 1 )
                                    .draw()
                                }
                            },
                            {
                            text: 'Hết hàng',
                            action: function ( e, dt, node, config ) {
                                dt.columns( 4 )
                                    .search( 2 )
                                    .draw()
                                }
                            },
                            {
                            text: 'Dừng bán',
                            action: function ( e, dt, node, config ) {
                                dt.columns( 4 )
                                    .search( 0 )
                                    .draw()
                                }
                            },
                            ]
                    }

                ],
                dom:'lfBrtip'
            });
            // $('#example1_wrapper > .dt-buttons').appendTo('div.table-head-right');
            $('#example1_wrapper > .dt-buttons').appendTo('div.dataTables_filter');




        }

        $('#example1').on('init.dt',function(){
            $('.reload_button').click(function(){
                    // console.log('oke');
                    // $('#example1').DataTable().destroy();
                    // load_data();
                    $('#mini').val('');
            $('#maxx').val('');
            $('#maxx').attr('disabled','');

            $('#example1').DataTable().destroy();
            load_data();
            });
        });


        $('#example1 tbody').on('mouseover', 'td.image', function () {
            var tr = $(this).closest('tr');
            // var row = table.row( tr );
            tr.find('img').fadeIn(1);
        });
        $('#example1 tbody').on('mouseout', 'td.image', function () {
            var tr = $(this).closest('tr');
            // var row = table.row( tr );
            tr.find('img').fadeOut(1);
        });



        $('#maxx').blur(function (){
            var mini = $('#mini').val();
            var maxx = $('#maxx').val();
            if (parseInt(maxx) < parseInt(mini))
                $('#maxx').val(mini);

            if (mini!='' && maxx!=''){
                $('#example1').DataTable().destroy();
                load_data(mini,maxx);

            }
        })
        // $('#deleterange').click(function(){
        //     $('#min').val('');
        //     $('#max').val('');
        //     $('#max').attr('disabled','');

        //     $('#example1').DataTable().destroy();
        //     load_data();


        // });



        // popup delete
        $(document).on('click','#iconDeleteUser',function(e){
            var id = $(this).data('id');
            $(".idUser").html(id);
            // console.log(id);
        });

        $('#deleteForm').on('submit',function (e) {
            e.preventDefault();
            $('#deleteUser').modal('hide');

            $.ajax({
                type: "get",
                url: "{{route('ajaxDeleteProduct')}}",
                data: {  'id':$(".idUser").html()},
                success: function (response) {
                    // console.log(response)
                    $('#deleteProduct').modal('hide');
                    $('#example1').DataTable().ajax.reload();
                }
            });

        });

    });




  </script>
@endsection
