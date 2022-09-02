    <?php 
        $title = "Update";
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $dob = $_POST['dob'];
            $specialty = $_POST['specialty'];
            $email = $_POST['email'];
            $contact = $_POST['phone'];

            // Call update function
            $result = $crud->updateAttendee($id, $fname, $lname, $dob, $specialty, $email, $contact);

            // Redirect to view records

            if ($result) {
                header("Location: viewrecords.php");
            } else {
                include 'includes/errormsg.php';
            }
        } else {
            include 'includes/errormsg.php';
        }
    ?>
