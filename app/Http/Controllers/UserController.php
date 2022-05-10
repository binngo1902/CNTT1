<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //


    public function getLogin(){
        if (Auth::check()){
            return redirect()->route('getListProduct');
        }
        return view('admin.login');
    }

    public function postLogin(Request $request){
        // echo($request->remember);

        // $this->validate($request,[
        //     'email' =>'required|email',
        //     'password' =>'required'
        // ],[
        //     'email.required' =>'Email không được trống',
        //     'email.email'  => 'Email không đúng định dạng',
        //     'password.required'=>'Mật khẩu không được trống'
        // ]);
        $validate = Validator::make($request->all(),[
                'email' =>'required|email',
                'password' =>'required'
            ],[
                'email.required' =>'Email không được trống',
                'email.email'  => 'Email không đúng định dạng',
                'password.required'=>'Mật khẩu không được trống'
            ]);
        if ($validate->fails()){
            return response()->json(['error'=>$validate->errors()]);
        }

        $remember = $request->remember;
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials,$remember)){
            return response()->json(['msg'=>'1']);
        }else{
            return response()->json(['msg'=>'Sai email hoặc mật khẩu']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route("login");
    }

    public function listUser(Request $request){
        if($request->ajax()){
            // if($request->groupsearch!='' && $request->activesearch!=''){
            //     $data = User::select("*")
            //     ->where('group_role',$request->groupsearch)->where('is_active',$request->activesearch)->where('is_delete',0)
            //     ->get();
            // }else
            // if ($request->groupsearch!='' && $request->activesearch==''){
            //     $data = User::select("*")->where('group_role',$request->groupsearch)->where('is_delete',0)->get();
            // }else if ($request->groupsearch=='' && $request->activesearch!=''){
            //     $data= User::select("*")->where('is_active',$request->activesearch)->where('is_delete',0)->get();
            // }else{
            //     $data = User::select("*")->get();
            // }
            if($request->groupsearch!=''){
                $data = User::select("*")->where('group_role',$request->groupsearch)->where('is_delete',0)->get();
            }else
            {
                $data = User::select("*")->get();
            }
            return DataTables::of($data)->make(true);
        }
    }

    public function getListUser(){
        $users = User::all();
        return view('admin.usermanage',compact('users'));
    }

    public function lockUser(Request $request){
        $user = User::find($request->id);
        if ($user->is_active === 0){
            $user->is_active = 1;
        }else
        {
            $user->is_active = 0;
        }

        $user->save();
        // $users= User::all();
        // return view('ajax.listuser',compact("users"));

    }

    public function deleteUser(Request $request){
        $user = User::find($request->id);

        $user->is_delete = 1;
        $user->save();
        // $users= User::all();
        // return view('ajax.listuser',compact("users"));

    }

    public function editUser(Request $request){
        $array =[];
        if ($request->has('changePassword')){
            $validate1 = Validator::make($request->all(),[
                'password' => 'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
                'passwordAgain' => 'required|same:password',

            ],[

                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu phải hơn 5 ký tự',
                'password.regex' => 'Mật khẩu không bảo mật',
                'passwordAgain.required' => 'Không được để trống',
                'passwordAgain.same' => 'Mật khẩu và xác nhận mật khẩu không chính xác'
            ]);
            if ($validate1->fails()){
                $array['pass'] = $validate1->errors();
            }

        }

        if ($request->has('changeEmail')){
            $validate2 = Validator::make($request->all(),[
                'email' => 'required|email|unique:users,email',

            ],[
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã được đăng ký',
            ]);
            if ($validate2->fails()){
                $array['email'] = $validate2->errors();
            }
        }


        $validate3 = Validator::make($request->all(),[
            'name' => 'required|min:6',
        ],[
            'name.required' => 'Vui lòng nhập tên người sử dụng',
            'name.min' => 'Tên phải nhiều hơn 5 ký tự',

        ]);
        if ($validate3->fails()){
            $array['another']=$validate3->errors();
        }
        if (count($array)>0){
            return response()->json(['error'=>$array]);
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        if ($request->has('email')){
            $user->email = $request->email;
        }
        if ($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        $user->group_role = $request->group_role;

        if ($request->has('checkLock')){
        $user->is_active = $request->checkLock;
        }else{
            $user->is_active=0;
        }


        $user->save();


    }

    public function newUser(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'passwordAgain' => 'required|same:password',
        ],[
            'name.required' => 'Vui lòng nhập tên người sử dụng',
            'name.min' => 'Tên phải nhiều hơn 5 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được đăng ký',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải hơn 5 ký tự',
            'password.regex' => 'Mật khẩu không bảo mật',
            'passwordAgain.required' => 'Không được để trống',
            'passwordAgain.same' => 'Mật khẩu và xác nhận mật khẩu không chính xác'
        ]);

        if ($validate->fails()){
            return response()->json(['error'=>$validate->errors()]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->group_role = $request->group_role;
        if ($request->has('checkLock')){
            $user->is_active = $request->checkLock;
            }
        else{
            $user->is_active=0;
        }
        $user->is_delete=0;
        $user->created_at = new DateTime();
        $user->save();



    }


}
