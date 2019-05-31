<?php
class User
{
	protected $db;
	public function __construct(PDO $db)
	{
		$this->db = $db;
	}

	public function get($id)
	{
		$id = (int)$id;
		$user = $this->db->query("SELECT username FROM users WHERE id = {$id}");
		return $user->fetch(PDO::FETCH_OBJ);
	}
}