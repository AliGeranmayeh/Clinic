
<form method="post" action="" class="d-flex justify-content-center m-4">
<select class="form-select mx-1 w-25" aria-label="Default select example " name="section_name">
  <option selected value = " ">choose a section</option>
  <?php foreach ($sections as $section) { ?>
    <option value="<?php echo $section->id ?>"><?php echo $section->name ?></option>
  <?php } ?>
</select>
      <input class="form-control me-2 w-50 " type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-secondary mx-1 " type="submit">Search</button>
</form>

<div class="row row-cols-3 my-5">
<?php 
    foreach ($doctors as $doctor) { ?>
        <div class="col">
            <div class="card border-secondary mb-3 " style="max-width: 18rem;">
                <div class="card-body text-secondary p-0">
                    <?php foreach ($users as $user) { 
                        if ($user->id == $doctor->user_id) { ?>
                            <div class="card-header"> <h5> <?php echo $user->name ?> </h5></div>
                       <?php } ?>
                    <?php } ?>
                    <p class="card-title p-1  m-0"><b> Payment:</b> <?php echo $doctor->visit ?></p>
                    <hr style="margin: 0">
                    <p class="card-text p-1  m-0"><b> Phone Number: </b><?php echo $doctor->phone_number ?></p>
                    <hr style="margin: 0">
                    <b class="card-text p-1">Times: </b>
                    <p class="card-text m-0 p-1 px-3"><b>Monday: </b><?php echo $doctor->Monday_time ?></p>
                    <p class="card-text m-0 p-1 px-3"><b>Tuesday: </b><?php echo $doctor->Tuesday_time ?></p>
                    <p class="card-text m-0 p-1 px-3"><b>Wednesday: </b><?php echo $doctor->Wednesday_time ?></p>
                    <p class="card-text m-0 p-1 px-3"><b>Thursday: </b><?php echo $doctor->Thursday_time ?></p>
                    <p class="card-text m-0 p-1 px-3"><b>Friday: </b><?php echo $doctor->Friday_time ?></p>
                    <p class="card-text m-0 p-1 px-3"><b>Saturday: </b><?php echo $doctor->Saturday_time ?></p>
                    <p class="card-text m-0 p-1 px-3"><b>Sunday: </b><?php echo $doctor->Sunday_time ?></p>
                    <hr style="margin: 0">
                    <p class="card-text p-1 m-0"><b>Address:</b> <?php echo $doctor->office_address ?></p>
                    <hr style="margin: 0">
                    <p class="card-text p-1 m-0"><b>Website:</b> <?php echo $doctor->website_url ?></p>
                    <hr style="margin: 0">
                </div>
            </div>
        </div>
    
    <?php } ?>
</div>