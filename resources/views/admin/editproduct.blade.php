@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Điều chỉnh sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('getListProduct')}}">Sản phẩm</a></li>
              <li class="breadcrumb-item active">Điều chỉnh</li>
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
            <form action="" method="post" id="editForm" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header row " id="header" >
                        <span>Chi tiết sản phẩm ID {{$product->product_id}}</span>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body row" id="listProduct">

                            <div class="col">
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm"  name="product_name" value="{{$product->product_name}}">
                                        <span class="error_message" id="errorProductName"></span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Giá bán</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  placeholder="Nhập giá bán"  name="product_price" value="{{$product->product_price}}">
                                        <span class="error_message" id="errorProductPrice"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="col-sm-10">
                                        <textarea  name='description' class="form-control textarea">{{$product->description}}</textarea>
                                        <span class="error_message" id="errorDescription"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Trạng thái</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="is_sales" id="is_sales">

                                            <option value="" disabled selected>Chọn trạng thái</option>
                                            <option value="1" @if ($product->is_sales == 1) {{'selected'}} @endif>Đang bán</option>
                                            <option value="0" @if ($product->is_sales == 0) {{'selected'}} @endif>Dừng bán</option>
                                            <option value="2" @if ($product->is_sales == 2) {{'selected'}} @endif>Hết hàng</option>
                                        </select>
                                        <span class="error_message" id="errorIsSales"></span>


                                    </div>
                                </div>

                                <div class="form-group row" >
                                    <label  class="col-sm-2 col-form-label">Hình ảnh</label>

                                    <div class="col-sm-10 show-picture"  >
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="hidden" id="hinhdelete" name="hinhdelete">
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
                                    @if ($product->product_image)
                                    <img class="img-thumbnail blah" id="blah" style="width:200px; height:200px"src="image/product/{{$product->product_image}}" alt="image product" />
                                    @else
                                    <img class="img-thumbnail blah" id="blah" hidden style="width:200px; height:200px"src="http://placehold.it/200" alt="image product" />
                                    @endif
                                </div>

                            <div class="form-group row  justify-content-center">
                                <span class="error_message" id="errorHinh"></span>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{route('getListProduct')}}" class="btn btn-secondary btn-lg">Hủy</a>
                            <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
                        </div>
                    </div>



                                    {{-- @if ($product->product_image)
                                    <img id="blah" style="width:200px; height:200px"src="image/product/{{$product->product_image}}" alt="your image" />
                                    @else
                                    <img id="blah" style="width:200px; height:200px"src="http://placehold.it/200" alt="your image" />
                                    @endif
                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm show-picture">
                                        <input id="upload" name="hinh"  type="file" onchange="readURL(this);" class="form-control border-0 upload-image">
                                        {{-- <label for="upload" s class="font-weight-light text-muted">Choose file</label> --}}
                                        {{-- <input type="hidden" id="hinhdelete" name="hinhdelete">
                                        <label for="upload"  class="btn btn-light m-0 rounded-pill px-4 label-image"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>

                                        <div class="input-group-append">
                                            <label  class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><span class="text-uppercase font-weight-bold text-muted" id="deletefile">Delete file</span></label>
                                        </div>
                                    </div>
                                    <span class="error_message" id="errorHinh"></span>
                                    <div>
                                        <a href="{{route('getListProduct')}}" class="btn btn-secondary btn-lg">Hủy</a>
                                        <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
                                    </div> --}}
                                </div>
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
            $('#hinhdelete').val(1);
            // console.log($('#hinhdelete').val());
            $('#upload').val('');
            $('#blah').attr('hidden','').attr('src','http://placehold.it/200');
            $('#errorHinh').text('');
        });

        $('#upload').change(function (e) {
            $('#hinhdelete').val('');


        });
        $("#editForm").on('submit',function (e) {
            e.preventDefault();
            var data1 = new FormData(this);

            $.ajax({
                type: "post",
                url: "{{route('postEditProduct',$product->product_id)}}",
                data: data1,
                processData: false,
                contentType: false,
                success: function (response) {
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
