    <?php 
        $title = "Home";
        require_once 'includes/header.php';
        require_once 'db/conn.php';

        $results = $crud->getSpecialties();
    ?>
        <!-- 
            - First Name
            - Last Name
            - Date of Birth (DatePicker)
            - Specialty (Database Admin, Software Developer, Web Administrator, Other)
            - Email Address
            - Contact Number
        -->
        <h1 class = "text-center">Registration for IT Conference</h1>

        <form method="post" action="success.php">
            <div class="mb-3 form-group">
                <label for="firstName" class="form-label">First Name</label>
                <input required type="text" class="form-control" id="firstName" name="firstName">
            </div>
            <div class="mb-3 form-group">
                <label for="lastName" class="form-label">Last Name</label>
                <input required type="text" class="form-control" id="lastName" name="lastName">
            </div>
            <div class="mb-3 form-group">
                <label for="dob">Date Of Birth</label>
                <input required type="text" class="form-control" id="dob" name="dob" aria-describedby="dobHelp">
                <small id="dobHelp" class="form-text text-muted">Attendees must be over the age of 18.</small>
            </div>
            <div class="mb-3 form-group">
                <label for="specialty">Area of Expertise</label>
                <select class="form-control" id="specialty" name="specialty">
                    <!-- Retrieve specialties for dropdown from database -->
                    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
                    <?php }?>
                </select>                    
            </div>
            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email address</label>
                <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="mb-3 form-group">
                <label for="phone" class="form-label">Contact Number</label>
                <input required type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
                <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    <?php require_once 'includes/footer.php' ?>