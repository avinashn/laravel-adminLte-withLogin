<?php 
namespace App\Traits;
use App\SuperAdminModel;
use Session;

trait LoginTrait{

	/*
		Log in the user
	*/
	public function logOnUser($request){

		$salt = env("SALT", "laravelAuth"); //can use any random string for the salt 

		$username = $this->sanatizeInput($request->get('user_name'));

    	$password = $this->sanatizeInput($request->get('pswd'));

    	$isLogedIn = SuperAdminModel::where('username', $username)
    								->where('password', sha1($salt.$password))
    								->first();

    	if(isset($isLogedIn)){

    		Session::put('user_id', $isLogedIn->sa_id);

    	}
    	return $isLogedIn;

	}

	/*
		Check if user logged in
	*/
	public function isUserLogedIn(){

		$user_id = Session::get('user_id');

		return $user_id;
		
	}

	/*
		Sanatize the input
	*/
	public function sanatizeInput($inputVar){

		return filter_var($inputVar, FILTER_SANITIZE_STRING);

	}

}