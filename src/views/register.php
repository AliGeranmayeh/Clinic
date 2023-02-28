
<h1 class="my-3">Register</h1>

<form action = "" method = "post">

    <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control <?php echo $model->hasError('name')?'is-invalid':'' ?>" value = "<?php echo $model->name??'' ?>" id="name" name = "name">
        <div class="invalid-feedback"><?php echo $model->getFirstError('name') ?></div>
    </div>

    <div class="form-group mb-3">
        <label for="usernmane">Username</label>
        <input type="text" class="form-control <?php echo $model->hasError('username')?'is-invalid':'' ?>" value = "<?php echo $model->username ??'' ?>" id="usernmane" name = "username">
        <div class="invalid-feedback"><?php echo $model->getFirstError('username') ?></div>
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control <?php echo $model->hasError('email')?'is-invalid':'' ?>" value = "<?php echo $model->email ??'' ?>" id="email" rows="3" name = "email">
        <div class="invalid-feedback"><?php echo $model->getFirstError('email') ?></div>
    </div>
    
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control <?php echo $model->hasError('password')?'is-invalid':'' ?>" value = "<?php echo $model->password ??'' ?>" id="password" rows="3" name = "password">
        <div class="invalid-feedback"><?php echo $model->getFirstError('password') ?></div>
    </div>
    
    <div class="form-group mb-3">
        <label for="confirm_password">Confirm password</label>
        <input type="password" class="form-control <?php echo $model->hasError('confirm_password')?'is-invalid':'' ?>" value = "<?php echo $model->confirm_password ??'' ?>" id="confirm_password" rows="3" name = "confirm_password">
        <div class="invalid-feedback"><?php echo $model->getFirstError('confirm_password') ?></div>
    </div>
    <div class="form-check">
  <input  value = 0 class="form-check-input" type="radio" name="type" id="patient" checked>
  <label class="form-check-label" for="patient">Patient</label>
</div>
<div class="form-check">
  <input value = 1 class="form-check-input" type="radio" name="type" id="doctor">
  <label class="form-check-label" for="doctor">
    Doctor
  </label>
</div>

    
    <button type="submit" class="btn btn-primary my-3">Register</button>
</form>

<div >You have an account? <a href="/login">Login here</a></div>