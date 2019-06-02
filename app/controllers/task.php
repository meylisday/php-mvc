<?php

class Task extends Controller
{
	public function __construct()
	{
		$this->TaskModel = $this->model('TaskModel');
	}
	public function create(){
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				'username' => trim($_POST['username']),
				'email' => trim($_POST['email']),
				'description' => trim($_POST['description']),
				'status' => 0,
				'errors' => '',
				'created_status' => '',
			];

			$this->TaskModel->username = $data['username'];
			$this->TaskModel->email = $data['email'];
			$this->TaskModel->description = $data['description'];
			if (!$this->TaskModel->is_valid())
			{
				$data['errors'] = $this->TaskModel->errors();
			}
			if(empty($data['errors']))
			{
				$createTask = $this->model('TaskModel')->create($data['username'], $data['email'], $data['description'], $data['status']);
				if ($createTask)
				{
					$data['created_status'] = 'Success!';
				} else {
					$data['created_status'] = 'Failed!';
					$this->view('home/create', $data);
				}
			} else{
				$this->view('home/create', $data);
			}

		} else{
			$data = [
				'username' =>  '',
				'email' => '',
				'description' => '',
				'status' => 0,
				'errors' => '',
				'created_status' => ''
			];
		}
		return $this->view('home/create', $data);
	}

	public function edit($id)
	{
	$task = $this->model('TaskModel')->getTaskById($id);
	if($task) {
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$status = isset($_POST['status']) ?  1 : 0;
				$data = [
					'description' => trim($_POST['description']),
					'task' => $task,
					'id' => $id,
					'status' => $status,
					'errors' => '',
				];

				if(empty($data['description']))
				{
					$data['description_err'] = 'Please, enter description';
				}
				if(empty($data['description_err']))
				{
					$createTask = $this->model('TaskModel')->edit($data['id'], $data['description'], $data['status']);
					if ($createTask)
					{
						header("location: /home/index");
					}else {
						$this->view('home/edit', $data);
					}
				}else{
					$this->view('home/edit', $data);
				}
			} else{
				$data = [
					'task' => $task,
					'description_err' => ''
				];
			}
			return $this->view('home/edit', $data);
		}else {
			header("location: /home/index");
		}
	}
}