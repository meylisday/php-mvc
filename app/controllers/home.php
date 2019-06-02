<?php
class Home extends Controller
{
	public function __construct()
	{
		$this->TaskModel = $this->model('TaskModel');
	}
	public function index($params = '')
	{
		$pages = new Paginator('3','p');
		$pages->set_total($this->TaskModel->getAllCount());
		$limit = $pages->get_limit();
		$tasks = $this->TaskModel->getAll($params, $limit);
		$page_links = $pages->page_links();
		$data = [
			'tasks' => $tasks,
			'params' => isset($_GET['sort']) ? $_GET['sort'] : '',
			'page_links' => $page_links
		];
		return $this->view('home/index', $data);
	}
}