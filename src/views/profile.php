
<h1 class="my-3  mb-5"">informations</h1>


<?php if ($is_doctor) { ?>
    <form action = "" method = "post">
    <div class="form-group mb-3">
        <label for="medical_code">Medical code</label>
        <input type="text" class="form-control" id="medical_code" name = "medical_code">
    </div>
    <div class="form-group mb-3">
        <label for="educational_information">Educational Information</label>
        <textarea class="form-control" id="educational_information" rows="3" name = "educational_information"></textarea>
    </div>
    <div class="form-group mb-3">
        <label for="work_experience">work experience</label>
        <input type="text" class="form-control" id="work_experience" name = "work_experience">
    </div>
    <div class="form-group mb-3">
        <div class="input-group">
            <input type="file" class="form-control" id="profile" name = "profile">
        </div>
    </div>
    
    <div class="form-group mb-3">
        <select class="form-select"  name = "section">
            <option selected>Activity section</option>
            <option value="1">section 1</option>
            <option value="2">section 2</option>
            <option value="3">section 3</option>
        </select>
    </div>
    <button name="submit-doctor-form" type="submit" class="btn btn-primary my-3">Submit</button>
</form>
<?php } ?>


<h5 class="mt-5 mb-4">Change Your Password</h5>

<form action = "" method = "post">
    
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control <?php echo $user->hasError('password')?'is-invalid':'' ?>" value = "<?php echo $user->password ??'' ?>" id="password" rows="3" name = "password">
        <div class="invalid-feedback"><?php echo $user->getFirstError('password') ?></div>
    </div>
    
    <div class="form-group mb-3">
        <label for="confirm_password">Confirm password</label>
        <input type="password" class="form-control <?php echo $user->hasError('confirm_password')?'is-invalid':'' ?>" value = "<?php echo $user->confirm_password ??'' ?>" id="confirm_password" rows="3" name = "confirm_password">
        <div class="invalid-feedback"><?php echo $user->getFirstError('confirm_password') ?></div>
    </div>

    <button name="submit-new-password" type="submit" class="btn btn-primary my-3">Submit</button>
</form>