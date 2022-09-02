<?php 
        $title = "Edit Record";
        require_once 'includes/header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        // Get attendee from id
        if(!isset($_GET['id'])) {
            include 'includes/errormsg.php';
            header("Location: viewrecords.php");
        } else {
            $specialties = $crud->getSpecialties();
            $result = $crud->getAttendeeDetails($_GET['id']);
    ?>
        <!-- 
            - First Name
            - Last Name
            - Date of Birth (DatePicker)
            - Specialty (Database Admin, Software Developer, Web Administrator, Other)
            - Email Address
            - Contact Number
        -->
        <h1 class = "text-center">Edit Record</h1>

        <form method="post" action="editpost.php">
            <input type="hidden" value="<?php echo $result['attendee_id']?>" name="id">
            <div class="mb-3 form-group">
                <label for="firstName" class="form-label">First Name</label>
                <input value="<?php echo $result['first_name']?>" type="text" class="form-control" id="firstName" name="firstName">
            </div>
            <div class="mb-3 form-group">
                <label for="lastName" class="form-label">Last Name</label>
                <input value="<?php echo $result['last_name']?>" type="text" class="form-control" id="lastName" name="lastName">
            </div>
            <div class="mb-3 form-group">
                <label for="dob">Date Of Birth</label>
                <input type="text" value="<?php echo $result['date_of_birth']?>" class="form-control" id="dob" name="dob" aria-describedby="dobHelp">
                <small id="dobHelp" class="form-text text-muted">Attendees must be over the age of 18.</small>
            </div>
            <div class="mb-3 form-group">
                <label for="specialty">Area of Expertise</label>
                <select class="form-control" id="specialty" name="specialty">
                    <!-- Retrieve specialties for dropdown from database -->
                    <?php while ($r = $specialties->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value="<?php echo $r['specialty_id'] ?>" 
                        <?php if($r['specialty_id'] == $result['specialty_id']) { echo 'selected'; } ?>>
                            <?php echo $r['name']; ?>
                        </option>
                    <?php }?>
                </select>                    
            </div>
            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email address</label>
                <input type="email" value="<?php echo $result['email_address']?>" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="mb-3 form-group">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="text" value="<?php echo $result['contact_number']?>" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
                <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
            </div>
            <a href="viewrecords.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </form>
    <?php }?>
    <?php require_once 'includes/footer.php' ?>