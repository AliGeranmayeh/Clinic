
<h1 class="my-3">informations</h1>

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
    <button type="submit" class="btn btn-primary my-3">Submit</button>
</form>