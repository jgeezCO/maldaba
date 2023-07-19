<h2 class="page-header">Patient Records</h2> 
<br><br>
<div class="patient-form">
    <form action="api/post.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <select name="title" id="title" class="form-control">
                <option>Mr.</option>
                <option>Mrs.</option>
                <option>Miss.</option>
                <option>Lord</option>
            </select>
        </div>

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="fn" class="form-control" id="firstname">
        </div>

        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" name="surname" class="form-control" id="surname">
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" id="dob">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address">
        </div>
        
        <div class="referral_color" style="background-color: white;padding: 5px;">
            <em style='color: #8e9bab;'>If this patient was referred, kindly put the referral email address here otherwise leave empty</em>
            <div class="form-group" style='margin-top:10px;'>
                <label for="email">Referral email address</label>
                <input type="email" name="referred_email" class="form-control" id="email">
            </div>
        </div>

        <br>

        <h1>--OR--</h1>
        <h5>Import records</h5>
        <input type="file" name="file_upload" class="form-control">
        <br><br>
        <input type="submit" style='display:block;width: 100%;' value="Submit" class="btn btn-default">
    </form>
</div>