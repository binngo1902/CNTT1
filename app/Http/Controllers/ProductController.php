<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    //
    public function getListProduct(){
        $products = Product::all();
        return view('admin.product',compact('products'));
    }

    public function listProduct(Request $request){
        if ($request->ajax()){
            if ($request->has('rangemin')){
                $data = Product::select("*")
                            ->whereBetween('product_price',[$request->rangemin,$request->rangemax])
                            ->get();
            }else{
                $data = Product::select("*")->get();
            }
            return DataTables::of($data)->make(true);
        }
    }

    public function deleteProduct(Request $request){
        $product = Product::find($request->id);
        if($product->product_image){
            if (file_exists('image/product/'.$product->product_image)){
                unlink('image/product/'.$product->product_image);
            };
        }
        $product->delete();

    }

    public function editProduct(Request $request,$id){
        if (!ctype_alnum($id)){
            return redirect()->route('error');
        }

        $product = Product::find($request->id);
        if ($product == ''){
            return redirect()->route('error');

        }
        return view('admin.editproduct',compact('product'));
    }

    public function postEditProduct(Request $request,$id){
        if ($request->ajax()){
            $validate = Validator::make($request->all(),[
                'product_name' => 'required|min:5',
                'product_price' => 'required|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/|gte:0',
                'hinh' =>   'mimes:png,jpg,jpeg|max:2048|dimensions:max_width=1024,max_height=1024'

            ],[
                'product_name.required' => 'Vui lòng nhập tên sản phẩm',
                'product_name.min' => 'Tên phải lớn hơn 5 ký tự',
                'product_price.required' => 'Giá bán không được để trống',
                'product_price.regex' => 'Giá bán chỉ được nhập số',
                'product_price.gte' => 'Giá bán không được nhỏ hơn 0',
                'hinh.mimes' => 'Hình phải có đuôi Jpg,Jpeg,Png',
                'hinh.max' => 'Tấm hình phải dưới 2MB',
                'hinh.dimensions' => 'Kích thước hình không quá 1024px'
            ]);
            if ($validate->fails()){
                return response()->json(['error'=>$validate->errors()]);
            }
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->description = $request->description;
            $product->is_sales = $request->is_sales;
            if($request->hasFile('hinh')){
                if ($product->product_image){
                    if (file_exists('image/product/'.$product->product_image)){
                        unlink('image/product/'.$product->product_image);
                    }
                }
                    $file = $request->file('hinh');
                    $name = $file->getClientOriginalName();

                    $pic = time().'_'.$name;
                    $file->move('image/product/',$pic);
                    $product->product_image = $pic;


            }
            if($request->hinhdelete){
                if ($product->product_image){
                    if (file_exists('image/product/'.$product->product_image)){
                        unlink('image/product/'.$product->product_image);
                    }
                }
                $product->product_image = null;
            }
            $product->save();
            return response()->json(['success'=>1]);

        }

    }

    public function newProduct(){
        return view('admin.newProduct');

    }

    public function postNewProduct(Request $request){
        if ($request->ajax()){
            $validate = Validator::make($request->all(),[
                'product_name' => 'required|min:5',
                'product_price' => 'required|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/|gte:0',
                'hinh' =>   'mimes:png,jpg,jpeg|max:2048|dimensions:max_width=1024,max_height=1024',
                'is_sales' => 'required'
            ],[
                'product_name.required' => 'Vui lòng nhập tên sản phẩm',
                'product_name.min' => 'Tên phải lớn hơn 5 ký tự',
                'product_price.required' => 'Giá bán không được để trống',
                'product_price.regex' => 'Giá bán chỉ được nhập số',
                'product_price.gte' => 'Giá bán không được nhỏ hơn 0',
                'hinh.mimes' => 'Hình phải có đuôi Jpg,Jpeg,Png',
                'hinh.max' => 'Tấm hình phải dưới 2MB',
                'hinh.dimensions' => 'Kích thước hình không quá 1024px',
                'is_sales.required' => 'Vui lòng chọn trạng thái'
            ]);
            if ($validate->fails()){
                return response()->json(['error'=>$validate->errors()]);
            }
            $product = new Product();
            $name_exist = Product::where('product_id','like','%'.$request->product_name[0].'%')->orderBy('product_id','desc')->first();
            if (empty($name_exist)){
                $product->product_id = sprintf('%s%010d',strtoupper($request->product_name[0]),1);
            }else{
                $key = $name_exist->product_id;
                $key++;
                $product->product_id= $key;

            }
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->is_sales = $request->is_sales;
            if ($request->hasFile('hinh')){
                $file = $request->file('hinh');
                $name = $file->getClientOriginalName();

                $pic = time().'_'.$name;
                $file->move('image/product/',$pic);
                $product->product_image = $pic;
            }
            $product->save();
            return response()->json(['success'=>1]);
        }
    }

}
