<?php 
        $title = "Update";

        require_once 'db/conn.php';

        if (!isset($_GET['id'])) {
            include 'includes/errormsg.php';
            header("Location: viewrecords.php");
        } else {
            $id = $_GET['id'];

            // Call delete function
            $result = $crud->deleteAttendee($id);

            // Redirect to view records
            if ($result) {
                header("Location: viewrecords.php");
            } else {
                include 'includes/errormsg.php';
            }
        }
    ?>