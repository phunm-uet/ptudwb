<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Mail;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $loginView = "frontend.login";
    protected $registerView = "frontend.register";
    protected $redirectPath = "login";
    protected $username = "username";
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        $rules = [
        'name' => 'required|max:255',
        'username' => 'required|max:30|unique:users',
        'email' => 'required|email|max:255|unique:users|vnuemail',
        'password' => 'required|min:6|confirmed',
        'sex' => 'required',
        
        ];

        $messages = [
            "name.required"     => "Tên không được bỏ trống",
            "username.required" => "Tên đăng nhập không được bỏ trống",
            "username.unique"   => "Tên đăng nhập đã tồn tại",
            "username.max"      => "Tên đăng nhập tối đa 30 ký tự",
            "email.required"    => "Email không được bỏ trống",
            "email.vnuemail"    => "Chỉ chấp nhận email VNU",
            "password.required"  => "Password không được bỏ trống",
            "password.min"       => "Password tối thiều 6 ký tự",
            "pasword.confirmed" => "Password xác nhận không trùng khớp",

        ];
        return Validator::make($data,$rules,$messages);
    }

    protected function register(Request $request)
    {
        $validator = $this->validator($request->all());
        // dd($validator);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard());
        $this->create($request->all());
        session()->flash('register_success', "Đăng ký thành công. Vui lòng xác nhận email");
        return redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);

        do{
            $activeCode = str_random(20);

        }while( User::where("active_code",$activeCode)->first() != null);

        $data['active_code'] = $activeCode;
        
        Mail::send("email.active",['data' => $data],function($message) use ($data) {

            $message->from("phuapplehmu@gmai.com","Minh Phu Nguyen");
            $message->sender("phuapplehmu@gmai.com","Minh Phu Nguyen");
            $message->to($data['email'],$data['name']);
            $message->subject("Active Account");
        });
        return User::create($data);
    }


    protected function validateLogin(Request $request)
    {
        $rules = [
            "username" => 'required|exists:users,username,active,1',
            'password' => 'required'
        ];
        $messages = [
            "username.exists" => "Vui lòng xác thực tài khoản"
        ];
        $this->validate($request,$rules,$messages);
    }

    protected function getFailedLoginMessage()
    {
        return "Tên đăng nhập hoặc mật khẩu không chính xác";
    }

    protected function getCredentials(Request $request)
    {
        $data = $request->only($this->loginUsername(), 'password');
        $data = array_add($data,'active',1);
        return $data;
    }
}
