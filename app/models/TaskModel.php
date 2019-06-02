<?php
class TaskModel
{
	protected $db;
	public $username;
	public $email;
	public $description;

	private $errors;

 	public function errors()
    {
        return $this->errors;
    }

    public function is_valid()
    {
        $this->validate_username();
        $this->validate_email();
        $this->validate_description();

        return count($this->errors) === 0;
    }
    private function validate_username()
    {
    	if (empty($this->username))
        {
            return $this->errors['username'] = 'Please, enter username.';
        }
        if (!preg_match('/^[a-z\d_]{2,20}$/i', $this->username))
        {
			return $this->errors['username'] = 'Not valid.';
        }
    }

    private function validate_email()
    {
    	if (empty($this->email))
        {
            return $this->errors['email'] = 'Please, enter email.';
        }
    	if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $this->email))
    	{
    		return $this->errors['email'] = 'Not valid';
    	}
    }

    private function validate_description()
    {
    	if (empty($this->description))
        {
            return $this->errors['description'] = 'Please, enter description.';
        }
    	if (!preg_match('/^[a-zA-Z0-9_.,\s]{5,300}$/i', $this->description))
    	{
    		return $this->errors['description'] = 'Not valid.';
    	}
    }

	public function __construct(PDO $db)
	{
		$this->db = $db;
	}

	public function create($username, $email, $description, $status)
	{
		$task = $this->db->prepare("INSERT INTO tasks(username, email, description, status) VALUES (?, ?, ?, ?)");
    	$row = $task->execute(array($username, $email, $description, $status));
		if($row)
		{
			return true;
		} else {
			return false;
		}
	}

	public function getAll($params = '', $limit)
	{
		if(!$params = isset($_GET['sort'])){
			$params = 'created_at';
		}
		$task = $this->db->query("SELECT * FROM tasks ORDER BY {$params} DESC {$limit}");
		return $task->fetchAll(PDO::FETCH_OBJ);
	}

	public function getTaskById($id)
	{
		$id = (int)$id;
		$task = $this->db->query("SELECT * FROM tasks WHERE id = {$id}");
		return $task->fetch(PDO::FETCH_OBJ);
	}

	public function edit($id, $description, $status)
	{
		$task = $this->db->prepare("UPDATE tasks SET description = ?, status = ? WHERE id = ?");
    	$row = $task->execute(array($description, $status, $id));
		if($row)
		{
			return true;
		} else {
			return false;
		}
	}

	public function getAllCount()
	{
		$task = $this->db->query("SELECT * FROM tasks");
		return $task->rowCount();
	}
}