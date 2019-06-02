<?php
class UserModel
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

	public function findUserByUsername($username)
	{
		$username = (string)$username;
		$user = $this->db->query("SELECT * FROM users WHERE username = '{$username}'");
		$row = $user->fetchColumn();
		if($row > 0)
		{
			return true;
		} else {
			return false;
		}
	}
	public function login($username, $password)
	{
		$username = (string)$username;
		$user = $this->db->query("SELECT * FROM users WHERE username = '{$username}'");
		$row = $user->fetch(PDO::FETCH_OBJ);
		$hashed_password = $row->password;
		if(password_verify($password, $hashed_password))
		{
			return $row;
		} else {
			return false;
		}
	}
}