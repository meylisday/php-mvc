<?php
class Home extends Controller
{
	public function index ($user = null)
	{
		$userModel = $this->model('User');
		if($user)
		{
			$user = $userModel->get($user);

		}
		$this->view('home/index' , ['user' => $user]);
	}
}