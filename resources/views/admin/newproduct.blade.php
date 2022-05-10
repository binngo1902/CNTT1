@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('getListProduct')}}">Sản phẩm</a></li>
              <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
            <form action="" method="post" id="newForm" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header row justify-content-center" >
                        <span style="font-size:20px">Thêm sản phẩm </span>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body row" id="listProduct">

                            <div class="col">
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm"  name="product_name" >
                                        <span class="error_message" id="errorProductName"></span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Giá bán</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  placeholder="Nhập giá bán"  name="product_price" >
                                        <span class="error_message" id="errorProductPrice"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="col-sm-10">
                                        <textarea  name='description' class="form-control textarea"></textarea>
                                        <span class="error_message" id="errorDescription"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Trạng thái</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="is_sales" id="is_sales">

                                            <option value="" disabled selected>Chọn trạng thái</option>
                                            <option value="1" >Đang bán</option>
                                            <option value="0" >Dừng bán</option>
                                            <option value="2" >Hết hàng</option>
                                        </select>
                                        <span class="error_message" id="errorIsSales"></span>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Hình ảnh</label>

                                    <div class="col-sm-10 show-picture"  >
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input  id="upload" type="file" name='hinh' accept=".jpg, .png, .jpeg" onchange="readURL(this)" class="custom-file-input" id="inputGroupFile02">
                                                <label class="custom-file-label" for="inputGroupFile02">Chọn hình</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text btn" id="deletefile">Xóa hình</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group row  justify-content-center">
                                        <img id="blah" hidden style="width:200px; height:200px"class="img-thumbnail blah"src="http://placehold.it/200" alt="your image" />
                                </div>

                                <div class="form-group row  justify-content-center">
                                    <span class="error_message" id="errorHinh"></span>
                                </div>



                            </div>
                            {{-- <div class="col-sm-4 show-picture"  >
                                <img id="blah" src="http://placehold.it/200" alt="your image" />
                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="upload" name="hinh"  type="file" onchange="readURL(this);" class="form-control border-0 upload-image">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4 label-image"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>

                                    <div class="input-group-append">
                                        <label  class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><span class="text-uppercase font-weight-bold text-muted" id="deletefile">Delete file</span></label>
                                    </div>
                                </div>
                                <span class="error_message" id="errorHinh"></span>

                                <div>
                                    <a href="{{route('getListProduct')}}" class="btn btn-secondary btn-lg">Hủy</a>
                                    <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="{{route('getListProduct')}}" class="btn btn-secondary btn-lg">Hủy</a>
                                <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
                            </div>
                        </div>



                    </div>
                <!-- /.card-body -->
                 </div>
            </form>
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



@endsection
@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '.textarea' ),{
            toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic',  '|',
                'bulletedList', 'numberedList',  '|',
                'insertTable', '|',
                'undo', 'redo'
            ],
                }} )
        .catch( error => {
            console.error( error );
        } );
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $(document).ready(function () {

        $('#deletefile').on('click', function() {
            console.log('oke')
            $('#upload').val('');
            $('#blah').attr('hidden','').attr('src','http://placehold.it/200');
            $('#errorHinh').text('');
        });
        $("#newForm").on('submit',function (e) {
            e.preventDefault();
            var data1 = new FormData(this);


            $.ajax({
                type: "post",
                url: "{{route('postNewProduct')}}",
                data: data1,
                processData: false,
                contentType: false,
                success: function (response) {
                    // console.log(response);
                    $('#errorProductName').empty();
                    $('#errorProductPrice').empty();
                    $('#errorIsSales').empty();
                    $('#errorHinh').empty();

                    if(response.error){

                        $('#errorProductName').text(response.error.product_name);
                        $('#errorProductPrice').text(response.error.product_price);
                        $('#errorIsSales').text(response.error.is_sales);
                        $('#errorHinh').text(response.error.hinh);



                    }else{
                        return window.location.href = '{{route("getListProduct")}}';
                    }


                }
            });

        });

});

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result).removeAttr('hidden');
            };

            reader.readAsDataURL(input.files[0]);


        }
    }
</script>
@endsection
