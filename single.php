<?php
// including db configuration file
include('config/db_config.php');

// empty variables
$error = '';
$single = '';
$totalId = '';

// query for counting total Id's in db
$totalId_query = "SELECT count(id) FROM student";
// running query 
$idResult = mysqli_query($conn, $totalId_query);
// storing total number of Id's into a variable
$totalId = mysqli_fetch_column($idResult);


if (isset($_POST['search'])) {  //checking whether user clicked the search button or not
    if ($_POST['search'] = '' or empty($_POST['idSearch'])) {   //checking if user enter the Id
        // storing data into error variable to print it down
        $error = 'Please Enter the Value';
    } elseif ($_POST['idSearch'] > $totalId) {      // checking user entered Id is valid or not
        // storing data into error variable to print it down
        $error = 'Please Enter Correct ID';
    } else {        // running query if no error occurred
        $id = htmlspecialchars($_POST['idSearch']);   // putting user entered value in a variable
        $sql_get = "SELECT * FROM student WHERE id= $id ";  // query for getting data from db
        $result = mysqli_query($conn, $sql_get);    // running query 

        if ($result) {
            $data = mysqli_fetch_assoc($result);    // putting data into local variable
            mysqli_free_result($result);     // freeing result variable
            $single = $data;    // assigning data into single variable to use later
        } else {
            //failure error message
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html>

<?php
include('templates/header.php');
?>

<div class="container px-3">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="d-flex mx-5" method="POST">
        <input class="form-control me-2" type="number" name="idSearch" placeholder="Search by ID" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
    </form>
    <div class="red text-center">
        <?php echo $error; ?>
    </div>
</div>

<div class="container text-center m-4">
    <?php if (!empty($single)) { ?>
        <div class="m-3">
            <h4>
                Name: <?php echo htmlspecialchars(ucwords($single['sname'])); ?>
            </h4>
            <h4>
                Father Name: <?php echo htmlspecialchars(ucwords($single['fname'])); ?>
            </h4>
            <h4>
                Last Name: <?php echo htmlspecialchars(ucwords($single['lname'])); ?>
            </h4>
            <hr>
        </div>
        <div class="m-3">
            <h5>
                D.O.B: <?php echo $single['dob']; ?>
            </h5>
            <h5>
                Class: <?php echo htmlspecialchars(strtoupper($single['class'])); ?>
            </h5>
            <h5>
                Division: <?php echo htmlspecialchars($single['divi']); ?>
            </h5>
            <h5>
                Roll No.:<?php echo htmlspecialchars($single['roll']); ?>
            </h5>
            <h5>
                PRN No.: <?php echo htmlspecialchars($single['prn']); ?>
            </h5>
            <hr>
        </div>
        <div class="m-3">
            <h5>
                Contact No.: <?php echo htmlspecialchars($single['numb']); ?>
            </h5>
            <h5>
                Email: <?php echo htmlspecialchars($single['email']); ?>
            </h5>
            <hr>
        </div>
        <div class="m-3">
            <h5>
                Address:
            </h5>
            <h5><?php echo htmlspecialchars($single['address']); ?></h5>
            <h5>
                City: <?php echo htmlspecialchars(ucwords($single['city'])); ?>
            </h5>
            <h5>
                State: <?php echo htmlspecialchars(ucwords($single['state'])); ?>
            </h5>
        </div>
    <?php } ?>
</div>

<?php
include('templates/footer.php');
?>