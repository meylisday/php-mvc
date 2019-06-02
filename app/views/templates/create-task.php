<div class="container">
    <div class="row">
        <div class="col-md-4 clearfix">
            <div class="space-top">
                <h3 class="text-center">Create Task</h3>
                <?php if (!empty($data['created_status'])):?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $data['created_status'];?> 
                    </div>
                <?php endif;?>
                <form class="form-signin" class="form-horizontal" action="/task/create" method="POST">
                    <div class="form-group has-error has-feedback">
                        <label class=""> Username </label>
                        <input type="text" class="form-control <?php echo (!empty($data['errors']['username'])) ? 'is-invalid' : '';?>" value="<?php echo $data['username'];?>" name="username">
                         <?php if (is_array($data['errors'])):?>
                            <?php if (array_key_exists('username', $data['errors'])):?>
                                <span class="error-message"><?php echo $data['errors']['username'];?></span>
                            <?php endif;?>
                          <?php endif;?>
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label class=""> Email</label>
                        <input type="email" class="form-control <?php echo (!empty($data['errors']['email'])) ? 'is-invalid' : '';?>" value="<?php echo $data['email'];?>" name="email">
                        <?php if (is_array($data['errors'])):?>
                            <?php if (array_key_exists('email', $data['errors'])):?>
                                <span class="error-message"><?php echo $data['errors'] ? $data['errors']['email'] : '' ?></span>
                            <?php endif;?>
                        <?php endif;?>
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label class=""> Task description </label>
                        <textarea type="textarea" class="form-control <?php echo (!empty($data['errors']['description'])) ? 'is-invalid' : '';?>" name="description"><?php echo $data['description'];?></textarea>
                        <?php if (is_array($data['errors'])):?>
                            <?php if (array_key_exists('description', $data['errors'])):?>
                                <span class="error-message"><?php echo $data['errors'] ? $data['errors']['description'] : '' ;?></span>
                            <?php endif;?>
                        <?php endif;?>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>