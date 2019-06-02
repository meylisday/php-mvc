<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
	 <?php if(isset($_SESSION['user_id'])):?>
      	<a class="nav-link" href="/user/logout">Logout</a>
  	<?php else:?>
  		<a class="nav-link" href="/user/login">Login</a>
  	<?php endif;?>
    </div>
  </div>
</nav>