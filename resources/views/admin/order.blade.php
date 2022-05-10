@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Đơn hàng</li>
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
                        <th>Order ID</th>
                        <th>Shop</th>
                        <th>Người mua ID</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                        <th>Phí ship</th>
                        <th>Tax</th>
                        <th>Ngày Order</th>
                        <th>Ngày Giao</th>
                        <th>Ngày Hủy</th>
                        <th>Ghi chú</th>
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
                responsive:true,
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{!! route('ajaxListOrder') !!}",


                    },
                columns: [
                        {
                        data: 'order_id', name: 'order_id',
                            },

                        {

                        data: 'order_shop',
                        name: 'order_shop',
                        },


                        { data: 'customer_id', name: 'customer_id' },
                        { data: 'total_price', name: 'total_price' },
                        { data: 'payment_method', name: 'payment_method'},
                        { data: 'ship_charge', name: 'ship_charge'},
                        {
                            data: 'tax',name:'tax'

                        },
                         {
                            data: 'order_date', name: 'order_date'

                        },
                        {
                            data: 'shipment_date', name:'shipment_date'
                        },
                        {
                            data: 'cancel_date' , name: 'cancel_date'
                        },
                        {
                            data: 'note_customer', name: 'note_customer'
                        }
                        ,
                        {
                            "data":null,
                            "render":function(data,type,row){
                                var a = '{{route("getDetailOrder",":id")}}';
                                a =  a.replace(':id',row.order_id);
                                return '<a href="'+a+'" id="iconEditUser"><i class="fas fa-eye" ></i></a>';

                            },
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
                lengthChange: true,
                autoWidth: false,
                buttons: [




                ],
                dom:'lBfrtip'
            });
        }






    });




  </script>
@endsection
