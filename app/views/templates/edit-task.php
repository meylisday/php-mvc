<div class="container">
    <div class="row">
        <div class="col-md-4 clearfix">
            <div class="space-top">
                <h3 class="text-center">Edit Task</h3>
                <form class="form-signin" class="form-horizontal" action="/task/edit/<?php echo $data['task']->id;?>" method="POST">
                    <div class="form-group">
                        <label class=""> Username </label>
                        <input type="text" class="form-control disabled" value="<?php echo $data['task']->username;?>" name="username" disabled>
                    </div>
                    <div class="form-group">
                        <label class=""> Email</label>
                        <input type="email" class="form-control disabled" value="<?php echo $data['task']->email;?>" name="email" disabled>
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label class=""> Task description </label>
                        <textarea type="textarea" class="form-control <?php echo (!empty($data['description_err'])) ? 'is-invalid' : '';?>" name="description"><?php echo $data['task']->description?></textarea>
                         <span class="error-message"><?php echo $data['description_err'];?></span>
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label class=""> Completed </label>
                        <input type="checkbox" name="status" value="<?php echo $data['task']->status;?>" <?php echo ($data['task']->status == 1) ? 'checked' : '';?>>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>