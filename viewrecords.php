<?php 
    $title = "View Records";
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getAttendees();
?>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Specialty</th>
                <th>Actions</th>
            </tr>
        <thead>
        <tbody>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <th><?php echo $r['attendee_id']?></th>
                <td><?php echo $r['first_name']?></td>
                <td><?php echo $r['last_name']?></td>
                <td><?php echo $r['name']?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you wish to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

<?php require_once 'includes/footer.php' ?>