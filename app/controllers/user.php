<?php
class User extends Controller
{
	public function __construct()
	{

	}
	public function login ()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				'username' => trim($_POST['username']),
				'password' => trim($_POST['password']),
				'username_err' => '',
				'password_err' => ''
			];
			if(empty($data['username']))
			{
				$data['username_err'] = 'Please, enter username';
			}

			if(empty($data['password']))
			{
				$data['password_err'] = 'Please, enter password';
			}
			if($this->model('UserModel')->findUserByUsername($data['username']))
			{

			} else {
				$data['username_err'] = 'No user found';
			}
			if(empty($data['username_err']) && empty($data['password_err']))
			{
				$loggedInUser = $this->model('UserModel')->login($data['username'], $data['password']);

				if ($loggedInUser)
				{
					$this->createUserSession($loggedInUser);
				} else {
					$data['password_err'] = 'Password incorrect!';
					$this->view('login/index', $data);
				}
			} else {
				$this->view('login/index', $data);
			}
		} else {
			$data = [
				'username' =>  '',
				'password' => '',
				'username_err' => '',
				'password_err' => ''
			];
			$this->view('login/index', $data);
		}
	}
	public function createUserSession($user)
	{
		$_SESSION['user_id'] = $user->id;
		$_SESSION['user_username'] = $user->username;
		header("location: /home/index");

	}

	public function logout()
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['user_username']);
		session_destroy();
		header("location: /user/login");
	}

	public static function isLoggedIn()
	{
		if(isset($_SESSION['user_id']))
		{
			return true;
		} else {
			return false;
		}
	}
}