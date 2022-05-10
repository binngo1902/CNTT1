<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    //
    public function getListOrder(){
        $orders = Order::all();
        return view('admin.order',compact('orders'));
    }

    public function listOrder(){
        return DataTables::of(Order::query())->make(true);
    }

    public function getDetailOrder(Request $request,$id){
        if (!is_numeric($id)){
            return redirect()->route('error');
        }


        $data = Order_detail::where('order_id',$request->id)->get();

        if (count($data) == 0){
            return redirect()->route('error');

        }
        $id = $request->id;
        return view('admin.order_detail',compact('data','id'));

        // add table
        // $data = Product::find($request->id,['product_name','product_image','product_price','description']);
        // $detail = new Order_detail;
        // $detail->order_id = 17;
        // $detail->product_id = $request->id;
        // $detail->detail_product = json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        // $detail->price_buy = $data->product_price;
        // $detail->quantity = 1;
        // $detail->shop_id = 'A001';
        // $detail->receiver_id = 52;
        // $detail->save();

        // // $data = Order_detail::find(7)->pluck('detail_product');
        // // // echo($data['product_name']);
        // // $data1 = json_decode($data[0]);
        // // dd($data1->product_name);
        // $data = Order_detail::where('order_id',$request->id)->get();
        // dd($data);
    }

    public function listOrderDetail(Request $request,$id){
        $data = Order_detail::select('*')->where('order_id',$id)->get();
        return Datatables::of($data)->make(true);
    }
}
