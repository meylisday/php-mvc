<?php

class Controller
{
	protected $db;

	public function getDb()
	{
		return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.'', DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	}
	protected function model($model)
	{
		require_once 'app/models/' . $model . '.php';
		return new $model($this->getDb());
	}

	protected function view($view, $data = [])
	{
		require_once 'app/views/' . $view . '.php';
	}
}