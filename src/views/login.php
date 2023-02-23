
<h1 class="my-3">login</h1>

<form action = "" method = "post">

    <div class="form-group mb-3">
        <label for="usernmane">Username</label>
        <input type="text" class="form-control <?php echo $model->hasError('username')?'is-invalid':'' ?>" value = "<?php echo $model->username ??'' ?>" id="usernmane" name = "username">
        <div class="invalid-feedback"><?php echo $model->getFirstError('username') ?></div>
    </div>
    
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control <?php echo $model->hasError('password')?'is-invalid':'' ?>" value = "<?php echo $model->password ??'' ?>" id="password" rows="3" name = "password">
        <div class="invalid-feedback"><?php echo $model->getFirstError('password') ?></div>
    </div>
    
    <button type="submit" class="btn btn-primary my-3">login</button>
</form>