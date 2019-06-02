<?php include_once("app/controllers/user.php"); ?>
<div class="container main">
    <h1 class="text-center title-task-list">Tasks</h1>
        <div class="col-md-8">
            <div class="form-group d-flex justify-content-between align-items-center">
                <label class="form-label mr-2">Sorting: </label>
                <select onchange="filter(this.value)" name="option" class="form-control custom-select selectized">
                    <option <?php echo ($data['params'] == 'created_at') ? 'selected' : ''; ?> value="created_at"> </option>
                    <option <?php echo ($data['params'] == 'username') ? 'selected' : ''; ?> value="username">Username</option>
                    <option <?php echo ($data['params'] == 'email') ? 'selected' : ''; ?> value="email">Email</option>
                    <option <?php echo ($data['params'] == 'status') ? 'selected' : ''; ?> value="status">Status</option>
                </select>
            </div>
        </div>
    <div class="row col-md-8 mb-2">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Description</th>
                </tr>
            </thead>
            <?php foreach ($data['tasks'] as $task):?>
            <tbody>
                <tr class="<?php echo ($task->status == 1) ? 'success' : '' ;?>">
                    <td><?php echo $task->username;?></td>
                    <td><?php echo $task->email;?></td>
                    <td><?php echo $task->description;?></td>
                    <?php if(User::isLoggedIn()):?>
                    <td><a href="/task/edit/<?php echo $task->id;?>">Edit</a></td>
                    <?php endif;?>
                </tr>
            </tbody>
        <?php endforeach;?>
        </table>
    </div>
    <div class="col-md-8">
        <a type="button" class="btn btn-primary mb-2" href="/task/create">Create task</a>
    </div>
    <nav aria-label="Page navigation">
      <?php echo $data['page_links'];?>
    </nav>
</div>