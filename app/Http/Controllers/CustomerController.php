<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use DateTime;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    //
    public function listCustomer(){
        return DataTables::of(Customer::query())->make(true);
        // return view('ajax.listcustomer',compact("custs"));
    }


    public function getListCustomer(){
        $custs= Customer::all();
        return view('admin.customer',compact('custs'));
    }

    public function newCustomer(Request $request){
        // echo($request);
        $validate = Validator::make($request->all(),[
            'name' => 'required|min:6',
            'email' => 'required|email|unique:mst_customer,email',
            'tel_num' => 'required|regex:/^[0-9]{10}$/',
            'address' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên khách hàng',
            'name.min' => 'Tên khách hàng phải nhiều hơn 5 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được đăng ký',
            'tel_num.required' => 'Điện thoại không được để trống',
            'tel_num.regex' => 'Số điện thoại phải là số và có 10 số',
            'address.required' => 'Địa chỉ không được để trống',
        ]);

        if ($validate->fails()){
            return response()->json(['error'=>$validate->errors()]);
        }

        $cust = new Customer();
        $cust->customer_name = $request->name;
        $cust->email = $request->email;
        $cust->address = $request->address;
        $cust->tel_num = $request->tel_num;
        if ($request->has('is_active')){
            $cust->is_active = $request->is_active;
            }
        else{
            $cust->is_active=0;
        }
        $cust->created_at = new DateTime();
        $cust->save();



    }
    public function action(Request $request){
        if ($request->ajax()){
            if ($request->action=='edit'){
                $validate = Validator::make($request->all(),[
                    'name' => 'required|min:6',
                    'email' => 'required|email|unique:mst_customer,email,'.$request->id.',customer_id',
                    'tel_num' => 'required|regex:/^[0-9]{10}$/',
                    'address' => 'required',
                    ],[
                    'name.required' => 'Tên khách hàng không được để trống',
                    'name.min' => 'Tên khách hàng phải nhiều hơn 5 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Email không đúng định dạng',
                    'email.unique' => 'Email đã được đăng ký',
                    'tel_num.required' => 'Điện thoại không được để trống',
                    'tel_num.regex' => 'Số điện thoại phải là số và có 10 số',
                    'address.required' => 'Địa chỉ không được để trống',
                ]);
                if ($validate->fails()){
                    return response()->json(['error'=>$validate->errors(),'id'=>$request->id]);
                }

                $customer = Customer::find($request->id);
                $customer->customer_name = $request->name;
                $customer->email = $request->email;
                $customer->tel_num = $request->tel_num;
                $customer->address = $request->address;
                $customer->save();
                return response()->json($request);


            }



            //
        }
    }


}
