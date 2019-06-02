<?php
require_once 'config/config.php';
require_once 'helpers/session_helper.php';
require_once 'core/App.php';
require_once 'helpers/paginator.php';
require_once 'core/Controller.php';
require_once 'models/TaskModel.php';
define('ASSET_ROOT', 
	'http://' . $_SERVER['HTTP_HOST'] .
	str_replace(
		$_SERVER['DOCUMENT_ROOT'], 
		'',
		str_replace('\\', '/', dirname(__DIR__) . '/public')
	)
);