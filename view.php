<?php 
    $title = "View Record";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    // Get attendee from id
    if(!isset($_GET['id'])) {
        include 'includes/errormsg.php';
        header("Location: viewrecords.php");  
    } else {
        $result = $crud->getAttendeeDetails($_GET['id']);      
?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['first_name'].' '.$result['last_name']?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name']?>
            </h6>
            <p class="card-text">
                Date of Birth: <?php echo $result['date_of_birth']?>
            </p>
            <p class="card-text">
                Email Address: <?php echo $result['email_address']?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $result['contact_number']?>
            </p>
        </div>
    </div>
    <br/>
    <a href="viewrecords.php" class="btn btn-info">Back to List</a>
    <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure you wish to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id']?>" class="btn btn-danger">Delete</a>
<?php }?>

<?php require_once 'includes/footer.php' ?>