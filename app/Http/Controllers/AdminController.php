<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\SuperAdminModel;
use App\Traits\LoginTrait;
use App\GroupModel;

class AdminController extends Controller
{

	use LoginTrait;

	public function index(){

		if($checkLogin = $this->isUserLogedIn()){

			return view('admin.dashboard');

		}
		else{

			return view('auth.login');

		}

	}

	/*
		Login the user
	*/
	public function login(Request $request){

		$logedin = $this->logOnUser($request);

		if(isset($logedin)){

			return redirect('/admin');

		}else{

			return view('auth.login');

		}

	}

	/*
		Logout the user
	*/
	public function logout(Request $request){

		Session::forget('user_id');

		return view('auth/login');

	}

}
