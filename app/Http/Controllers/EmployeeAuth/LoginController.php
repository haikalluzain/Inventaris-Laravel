<?php

namespace App\Http\Controllers\EmployeeAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'employee/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }

    public function show()
    {
    	return view('pages.employee.login');
    }

    public function login(Request $request)
    {
    	$this->guard()->logout();
    	$request->session()->invalidate();

    	$auth = Auth::guard('employee')->attempt([
    		'username'=>$request->username,
    		'password'=>$request->password,
    	]);

    	if($auth){
    		return redirect()->route('emp.dashboard');
    	}else{
    		return redirect()->back()->withError('Username or password is invalid!');
    	}
    }

    public function logout(Request $request)
    {
    	$this->guard()->logout();
    	$request->session()->invalidate();
    	return redirect()->route('emp.show');
    }
}










