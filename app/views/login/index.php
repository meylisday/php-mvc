<?php require APPROOT.'/views/templates/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-md-4 clearfix">
            <div class="space-top">
                <h3 class="text-center">Log In</h3>
                <form class="form-signin" class="form-horizontal" action="/user/login" method="POST">
                    <div class="form-group has-error has-feedback">
                        <label class=""> Username </label>
                        <input type="text" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['username'];?>" name="username" autofocus>
                        <span class="error-message"><?php echo $data['username_err'];?></span>
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label class=""> Password </label>
                        <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['password'];?>" name="password">
                         <span class="error-message"><?php echo $data['password_err'];?></span>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Sign in
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT.'/views/templates/footer.php';?>