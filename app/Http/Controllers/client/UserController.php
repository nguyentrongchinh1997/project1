<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests\Login;
use App\Http\Requests\Signup;
use App\Http\Service\UserService;

class UserController extends Controller
{
        protected $userService;

        public function __construct(UserService $userService)
        {
            $this->userService = $userService;
            
        }
    /*return view login*/
        public function getLogin(){
            return view("client.pages.login");
            
        }

    /*chức năng đăng nhâp sử dụng form request*/
        public function postLogin(Login $request){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect("admin/index");
            }
            else{
                return redirect()->back()->withInput()->with("error", "Đăng nhập không thành công");
            }

        }
    //end

    /*return view singup*/
        public function getSignup(){
            return view("client.pages.signup");

        }

    /*chức năng đăng ký sử dụng form request*/
        public function postSignup(Signup $request){
            $userService = new UserService;
            $userService->create($request->all());
            return redirect()->back()->withInput()->with("thongbao", "Đăng ký thành công");

        }
    //end

}
