@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết hóa đơn số {{$id}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href='{{route('getListOrder')}}'>Đơn hàng</a></li>
              <li class="breadcrumb-item active">Chi tiết - ID {{$id}}</li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row   ">
          <div class='col' >

            <div class="card">
              <div class="card-header row">
                {{--  --}}
              </div>

              <!-- /.card-header -->
              <div class="card-body" id="listProduct">

            <table id="example1" class="table table-bordered table-striped  " >


                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Shop ID</th>







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






  {{-- popup delete --}}


  @endsection
@section('script')
<script>


        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
         }
        });
    $(document).ready(function () {
        load_data();
        function load_data(){
            // console.log(min,max);
            $("#example1").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{!! route('ajaxListOderDetail',['id'=>$id]) !!}",


                    },
                columns: [
                        {
                        data: 'product_id', name: 'product_id',
                            },

                        {

                        data: 'price_buy',
                        name: 'price_buy',
                        "render": function(data,type,row){
                            return new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(row.price_buy)
                        }
                        },


                        { data: 'quantity', name: 'quantity' },
                        { data: 'shop_id', name: 'shop_id' },






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
                lengthChange: true,
                autoWidth: false,
                buttons: [

                        // {
                        // text: 'Hoạt động',
                        // action: function ( e, dt, node, config ) {
                        //     dt.columns( 5 )
                        //         .search( 1 )
                        //         .draw()
                        //     }
                        // },
                        // {
                        // text: 'Không hoạt động',
                        // action: function ( e, dt, node, config ) {
                        //     dt.columns( 5 )
                        //         .search( 0 )
                        //         .draw()
                        //     }
                        // },
                        // {
                        // text: 'Reload',
                        // action: function ( e, dt, node, config ) {
                        // dt.columns().search('')
                        //         .draw()
                        //     }
                        // },



                ],
                dom:'lBfrtip'
            });
        }






    });




  </script>
@endsection
