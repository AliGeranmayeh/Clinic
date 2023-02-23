
<h1 class="my-3">register</h1>

<form action = "" method = "post">

    <div class="form-group mb-3">
        <label for="name">name</label>
        <input type="text" class="form-control <?php echo $model->hasError('name')?'is-invalid':'' ?>" value = "<?php echo $model->name?>" id="name" name = "name">
        <div class="invalid-feedback"><?php echo $model->getFirstError('name') ?></div>
    </div>

    <div class="form-group mb-3">
        <label for="usernmane">username</label>
        <input type="text" class="form-control <?php echo $model->hasError('username')?'is-invalid':'' ?>" value = "<?php echo $model->username?>" id="usernmane" name = "username">
        <div class="invalid-feedback"><?php echo $model->getFirstError('username') ?></div>
    </div>

    <div class="form-group mb-3">
        <label for="email">email</label>
        <input type="email" class="form-control <?php echo $model->hasError('email')?'is-invalid':'' ?>" value = "<?php echo $model->email?>" id="email" rows="3" name = "email">
        <div class="invalid-feedback"><?php echo $model->getFirstError('email') ?></div>
    </div>
    
    <div class="form-group mb-3">
        <label for="password">password</label>
        <input type="password" class="form-control <?php echo $model->hasError('password')?'is-invalid':'' ?>" value = "<?php echo $model->password?>" id="password" rows="3" name = "password">
        <div class="invalid-feedback"><?php echo $model->getFirstError('password') ?></div>
    </div>
    
    <div class="form-group mb-3">
        <label for="confirm_password">confirm password</label>
        <input type="password" class="form-control <?php echo $model->hasError('confirm_password')?'is-invalid':'' ?>" value = "<?php echo $model->confirm_password?>" id="confirm_password" rows="3" name = "confirm_password">
        <div class="invalid-feedback"><?php echo $model->getFirstError('confirm_password') ?></div>
    </div>
    
    
    <button type="submit" class="btn btn-primary my-3">register</button>
</form>