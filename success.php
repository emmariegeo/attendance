    <?php 
        $title = "Success";
        require_once 'includes/header.php';
        require_once 'db/conn.php';

        if (isset($_POST['submit'])) {
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $dob = $_POST['dob'];
            $specialty = $_POST['specialty'];
            $email = $_POST['email'];
            $contact = $_POST['phone'];
            $isSuccess = $crud->insertAttendee($fname, $lname, $dob, $specialty, $email, $contact);

            if ($isSuccess) {
                include 'includes/successmsg.php';
            } else {
                include 'includes/errormsg.php';
            }
        }
    ?>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $_POST['firstName'].' '.$_POST['lastName'] ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    <?php echo $_POST['specialty'] ?>
                </h6>
                <p class="card-text">
                    Date of Birth: <?php echo $_POST['dob'] ?>
                </p>
                <p class="card-text">
                    Email Address: <?php echo $_POST['email'] ?>
                </p>
                <p class="card-text">
                    Contact Number: <?php echo $_POST['phone'] ?>
                </p>
            </div>
        </div>
        <br/>
        <a href="viewrecords.php" class="btn btn-info">View List</a>
    <?php require_once 'includes/footer.php' ?>
