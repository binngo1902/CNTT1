@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý tài khoản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Tài khoản</li>
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
                <button type="button" class="btn btn-primary float-right" id="iconNewUser" data-toggle='modal' data-target="#newUser">New User</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="listUser">
                <table id="example1" class="table table-bordered table-striped display nowrap">
                    <div class="table-head-right">



                            <select name="group_role" id="roleSearch"    >
                                <option value="default">Chọn nhóm</option>
                                <option value="admin" >Admin</option>
                                <option value="reviewer">Reviewer</option>
                                <option value="editor">Editor</option>
                            </select>


                    </div>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Nhóm</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($users as $user )
                            @if($user->is_delete==1)
                            @continue
                            @endif
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->group_role}}</td>
                            <td>
                                @if ($user->is_active === 0)
                                <span style="color:red">Tạm khóa</span>
                                @endif
                                @if ($user->is_active === 1)
                                <span style="color:green">Đang hoạt động</span>
                                @endif
                            </td>
                            <td>
                                <div style="text-align:center">
                                    <a href="" id="iconEditUser" data-toggle="modal" data-target="#editUser"
                                     data-id="{{$user->id}}" data-name="{{$user->name}}"
                                     data-email="{{$user->email}}" data-password="{{$user->password}}" data-group_role="{{$user->group_role}}" data-is_active="{{$user->is_active}}"><i class="far fa-edit" ></i></a>
                                    <a href="" id="iconDeleteUser" data-toggle="modal" data-target="#deleteUser" data-id="{{$user->id}}"><i class="fas fa-trash-alt" style="padding-left:4px; padding-right:4px; color:red"></i></a>
                                    <a href="" id="iconLockUser" style="color:black;" data-toggle="modal" data-target="#lockUser" data-id="{{$user->id}}"><i class="fas fa-user-times " ></i></a>
                                </div>

                            </td>
                        </tr>
                        @endforeach --}}



                          <!-- Modal -->

                    {{-- </tbody> --}}

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

  {{-- Popup Lock --}}
  <div class="modal fade" id="lockUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form action="" method="GET" id="lockForm">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nhắc nhở</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Bạn có muốn khóa/mở thành viên ID
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

  {{-- Popup Delete --}}
  <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
          Bạn có muốn xóa thành viên ID
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

  {{-- popup edit --}}
  <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <form action="" method="post" id="editForm">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <input type="hidden" name="id" id="idUser">
            <label class="col-sm-3 col-form-label">Tên</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" placeholder="Nhập họ tên" id="name" name="name">
              <span class="error_message" id="errorName"></span>
            </div>
          </div>

          <div style="line-height: 2.6;">
            <input type="checkbox"  name='changeEmail' id='changeEmail' >
            <label for="">Đổi Email</label>
        </div>
            <div class="form-group row">
              <label  class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" disabled  placeholder="Nhập Email" id="email" name="email">
                <span class="error_message" id="errorEmail"></span>
            </div>
            </div>


              <div style="line-height: 2.6;">
                  <input type="checkbox"  name='changePassword' id='changePassword' >
                  <label for="">Đổi mật khẩu</label>
              </div>

            <div class="form-group row">

                <label  class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-9">
                  <input type="password" disabled class="form-control" placeholder="Mật khẩu" id="password" name="password" >
                  <span class="error_message" id="errorPassword"></span>
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Xác nhận</label>
                <div class="col-sm-9">
                  <input type="password" disabled class="form-control" placeholder="Xác nhận mật khẩu" id="passwordAgain" name="passwordAgain" >
                  <span class="error_message" id="errorPasswordAgain"></span>

                </div>
            </div>



            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Nhóm</label>
                <div class="col-sm-9">
                  <select name="group_role" id="group_role" class="form-control" >
                        <option value="none">Chọn nhóm</option>
                        <option value="admin" >Admin</option>
                        <option value="reviewer">Reviewer</option>
                        <option value="editor">Editor</option>
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Trạng thái</label>
                <div class="col-sm-9" style="line-height: 2.6;">
                    <input type="checkbox"  name='checkLock' value="1" id='is_active'>
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


  {{-- popup new --}}
  <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <form action="" method="post" id="newForm" novalidate>
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tạo mới User</h5>
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
                <label  class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-9">
                  <input type="password"  class="form-control" placeholder="Mật khẩu"  name="password" >
                  <span class="error_message" id="new_errorPassword"></span>
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Xác nhận</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="passwordAgain" >
                  <span class="error_message" id="new_errorPasswordAgain"></span>

                </div>
            </div>



            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Nhóm</label>
                <div class="col-sm-9">
                  <select name="group_role"  class="form-control" >
                        <option value="none">Chọn nhóm</option>
                        <option value="admin" >Admin</option>
                        <option value="reviewer">Reviewer</option>
                        <option value="editor">Editor</option>
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Trạng thái</label>
                <div class="col-sm-9" style="line-height: 2.6;">
                    <input type="checkbox"  name='checkLock' value="1" >
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


  @endsection
@section('script')
<script>


    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //   });


    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
         }
        });
    $(document).ready(function () {
        load_data();
        function load_data(group){
            $("#example1").DataTable({
                    processing:true,
                    serverSide:true,
                    ajax:{
                        url: "{!! route('ajaxListUser')!!}",
                        type: 'get',
                        data: {'groupsearch': group },
                    },
                    columns:[
                        {
                            data:'id', name:'id',
                        },
                        {
                            data:'name', name: 'name'
                        },
                        {
                            data: 'email',name:'email'
                        },
                        {
                            data: 'group_role', name: 'group_role'
                        },
                        {
                            data: 'is_active',
                            name: 'is_active',
                            "render":function(data,type,row){
                                if (data == 1){
                                    return '<span style="color:green">Đang hoạt động</span>';
                                }
                                if (data == 0){
                                    return '<span style="color:red">Không hoạt động</span>';

                                }
                            }
                        },
                        {
                            "data":null,
                            "render": function(data,type,row){

                                return  '<div style="text-align:center">'
                                        + '<a href="" id="iconEditUser" data-toggle="modal" data-target="#editUser"'
                                        + 'data-id="'+row.id+'" data-name="'+row.name+
                                        '"data-email="'+row.email+'"data-group_role="'+row.group_role+
                                        '" data-is_active="'+row.is_active+'"><i class="far fa-edit" ></i></a>'
                                        + '<a href="" id="iconDeleteUser" data-toggle="modal" data-target="#deleteUser" data-id="'+row.id+'"><i class="fas fa-trash-alt" style="padding-left:4px; padding-right:4px; color:red"></i></a>'
                                        +  '<a href="" id="iconLockUser" style="color:black;" data-toggle="modal" data-target="#lockUser" data-id="'+row.id+'"><i class="fas fa-user-times " ></i></a>'

                                        + '</div>'

                            }
                        }


                    ],
                    rowCallback: function(row,data){
                        if(data.is_delete == 1 ){
                            $(row).hide();
                        }

                    },
                    language:{
                        "info":           "Hiển thị từ _START_ ~ _END_ trong tổng số _TOTAL_ user",
                        "zeroRecords":    "Không có dữ liệu",
                        "lengthMenu": "Hiển thị _MENU_ ",
                          "search" : "Tìm kiếm: ",
                          "infoFiltered": ""


                    },
                    "order": [[ 0, "desc" ]],
                    "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
                    "responsive": true, "lengthChange": true, "autoWidth": false,
                    "buttons": [
                        {
                        // className:'fas fa-sync-alt',
                        text: '<i class="fas fa-sync-alt"></i>',
                        className: 'reload_button ',
                        init: function(api, node, config) {
                            $(node).removeClass(' btn-secondary');
                            },

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
                                    dt.columns( 4 )
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
                                    dt.columns( 4 )
                                        .search( 0 )
                                        .draw()
                                    }
                                },
                        ]
                },


                    ],
                    dom:'lBfrtip'
                })
             $('#example1_wrapper > .dt-buttons').appendTo('div.dataTables_filter');

        }

        $('#example1').on('init.dt',function(){
            $('.reload_button').click(function(){
                console.log('oke');
                $('#roleSearch').val("default").change();

            $('#example1').DataTable().destroy();
            load_data();
            });
        });



        $('#roleSearch').on('change',function(){
            var group = $('#roleSearch').val();
            var active = $('#activeSearch').val();

            if (group!=''){
                $('#example1').DataTable().destroy();
                load_data(group);
            }
        });

        // $('#roleSearch').on('blur',function(){
        //     var group = $('#roleSearch').val();
        //     var active = $('#activeSearch').val();

        //     if (group!=''){
        //         $('#example1').DataTable().destroy();
        //         load_data(group,active);
        //     }
        // });












                      // lockuser
        $(document).on('click','#iconLockUser',function(e){
            var id = $(this).data('id');
            $(".idUser").html(id);


         });
        $('#lockForm').on('submit',function (e) {
            e.preventDefault();
            $('#lockUser').modal('hide');

            $.ajax({
                type: "get",
                url: "{{route('ajaxLockUser')}}",
                data: { '_token': '{{csrf_token()}}', 'id':$(".idUser").html()},
                success: function (response) {
                     $("#example1").DataTable().ajax.reload();

                }
            });

        });

        // deleteUser
        $(document).on('click','#iconDeleteUser',function(e){
            var id = $(this).data('id');
            $(".idUser").html(id);
            // console.log(id);
            $("#example1").DataTable().ajax.reload();
        });

        $('#deleteForm').on('submit',function (e) {
            e.preventDefault();
            $('#deleteUser').modal('hide');

            $.ajax({
                type: "get",
                url: "{{route('ajaxDeleteUser')}}",
                data: { '_token': '{{csrf_token()}}', 'id':$(".idUser").html()},
                success: function (response) {
                    $("#example1").DataTable().ajax.reload();

                }
            });

        });


        $('#editUser').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes

            var name = button.data('name'); // Extract info from data-* attributes
            var email = button.data('email');
            var password = button.data('password');
            var group_role = button.data('group_role');
            var is_active = button.data('is_active');

            var modal = $(this);

            modal.find('.modal-body #idUser').val(id);

            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #changeEmail').prop('checked',0);

            modal.find('.modal-body #email').attr('disabled','');

            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #changePassword').prop('checked',0);

            modal.find('.modal-body #password').val('').attr('disabled','');
            modal.find('.modal-body #passwordAgain').val('').attr('disabled','');


            modal.find('.modal-body #group_role').val(group_role);
            modal.find('.modal-body #is_active').prop('checked',is_active);

        });
        $('#changePassword').click(function(e){
            if ($(this).is(":checked")) {
            $("#password").removeAttr("disabled");
            $("#passwordAgain").removeAttr('disabled');
            } else {
            $("#password").attr("disabled", "disabled");
            $("#passwordAgain").attr("disabled", "disabled");
            }
        });
        $('#changeEmail').click(function(e){
            if ($(this).is(":checked")) {
            $("#email").removeAttr("disabled");

            } else {
            $("#email").attr("disabled", "");
            }
        });
        $('#editForm').on('submit', function (e) {
            e.preventDefault();
            // $('#editUser').modal('hide');
            // var dataform = $('#editForm').serialize();
            // console.log(dataform);
            $.ajax({
                type: "post",
                url: "{{route('ajaxEditUser')}}",
                data: $('#editForm').serialize(),
                success: function (response) {
                    console.log(response)
                    $('#errorName ').empty();
                    $('#errorEmail').empty();
                    $('#errorPassword').empty();
                    $('#errorPasswordAgain').empty();
                    if (response.error){
                        if (response.error.another){
                            $('#errorName').html(response.error.another.name);
                        }
                        if (response.error.email){
                            $('#errorEmail').html(response.error.email.email);
                        }
                        if (response.error.pass){
                            $('#errorPassword').html(response.error.pass.password);
                            $('#errorPasswordAgain').html(response.error.pass.passwordAgain);
                        }
                    }else{

                        $('#editUser').modal('hide');
                        $("#example1").DataTable().ajax.reload();


                    }
                }
            });

        });


        $('#newUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var modal = $(this);


            modal.find('.modal-body  input[name="name"]').val('');
            // modal.find('.modal-body #changeEmail').prop('checked',0);

            modal.find('.modal-body input[name="email"]').val('');

            // modal.find('.modal-body #email').val(email);
            // modal.find('.modal-body #changePassword').prop('checked',0);

            modal.find('.modal-body input[name="password"]').val('');
            modal.find('.modal-body input[name="passwordAgain"]').val('');


            modal.find('.modal-body select[name="group_role"]').val('none');
            modal.find('.modal-body input[name="checkLock"]').prop('checked',0);

        });
        $('#newForm').on('submit',function(e){
            e.preventDefault();

            $.ajax({
                type: "get",
                url: "{{route('ajaxNewUser')}}",
                data: $('#newForm').serialize(),
                success: function (response) {
                    // console.log(response);
                    $('#new_errorName ').empty();
                    $('#new_errorEmail').empty();
                    $('#new_errorPassword').empty();
                    $('#new_errorPasswordAgain').empty();
                    if (response.error){

                            $('#new_errorName').html(response.error.name);

                            $('#new_errorEmail').html(response.error.email);
                            if ((response.error.password)){
                                if (response.error.password.length >1){
                                     $('#new_errorPassword').html(response.error.password.shift());
                                }else {
                                $('#new_errorPassword').html(response.error.password);
                                }
                            }
                            $('#new_errorPasswordAgain').html(response.error.passwordAgain);
                        }
                    else{

                        $('#newUser').modal('hide');
                        $('#example1').DataTable().ajax.reload();
                    }
                }
            });
        });



    });
  </script>
@endsection
