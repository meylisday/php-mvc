<?php
session_start();

function flash ($username = '', $message = '', $class = 'alert alert-success')
{
	if(!empty($username))
	{
		if(!empty($username) && empty($_SESSION[$username]))
		{
			if(!empty($_SESSION[$username]))
			{
				unset($_SESSION[$username]);
			}

			if(!empty($_SESSION[$username. '_class']))
			{
				unset($_SESSION[$username. '_class']);
			}

			$_SESSION[$username] = $message;
			$_SESSION[$username. '_class'] = $class;

		} elseif (empty($username) && !empty($_SESSION[$username])) {
			$class = !empty($_SESSION[$username. '_class']) ? $_SESSION[$username. '_class'] : '';
			echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$username].'</div>';
			unset($_SESSION[$username]);
			unset($_SESSION[$username. '_class']);
		}
	}
}