<?php
// including db configuration file
include('config/db_config.php');

// creating empty variable to store errorz
$errors = array(
    'name' => '',
    'fname' => '',
    'lname' => '',
);

// if submit button is clicked
if (isset($_POST['submit'])) {

    // checking if name is valid or not
    if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
        // saving error in to error variable to use later
        $errors['name'] = '*Enter valid name*';

        // checking if name is valid or not
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $_POST['fname'])) {
        // saving error in to error variable to use later
        $errors['fname'] = '*Enter valid father name*';

        // checking if name is valid or not
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $_POST['lname'])) {
        // saving error in to error variable to use later
        $errors['lname'] = '*Enter valid last name*';
    };

    // saving user entered data into db
    if (array_filter($errors)) {
    } else {
        // creating variables to insert data into db
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $class = mysqli_real_escape_string($conn, $_POST['class']);
        $division = mysqli_real_escape_string($conn, $_POST['division']);
        $roll = mysqli_real_escape_string($conn, $_POST['roll']);
        $prn = mysqli_real_escape_string($conn, $_POST['prn']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $add = mysqli_real_escape_string($conn, $_POST['add']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $zip = mysqli_real_escape_string($conn, $_POST['zip']);

        // query for insertion in db
        $sql_insert = "INSERT INTO student(sname,fname,lname,dob,class,divi,roll,prn,numb,email,address,city,state,zip) VALUES ('$name','$fname','$lname','$dob','$class','$division','$roll','$prn','$number','$email','$add','$city','$state','$zip')";

        // running query
        if (mysqli_query($conn, $sql_insert)) {
            header('Location: index.php');
        } else {
            echo 'query error' . mysqli_error($conn);
        };
    };
}
?>

<?php
include('templates/header.php');
?>

<h3 class="text-center">Add a New Student</h3>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mx-5 px-2">
    <div class="row g-3 m-3">
        <div class="col-sm">
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            <div class="red"><?php echo $errors['name']; ?></div>
        </div>
        <div class="col-sm">
            <input type="text" name="fname" class="form-control" placeholder="Enter your father name" required>
            <div class="red"><?php echo $errors['fname']; ?></div>
        </div>
        <div class="col-sm">
            <input type="text" name="lname" class="form-control" placeholder="Enter your last name" required>
            <div class="red"><?php echo $errors['lname']; ?></div>
        </div>
    </div>
    <div class="row m-3">
        <h5 class="col-sm-1 text-center fw-normal m-1">D.O.B:</h5>
        <div class="col-sm-3">
            <input type="date" name="dob" class="form-control" required>
        </div>
        <div class="col-sm">
            <input type="text" name="class" class="form-control" placeholder="Class" required>
        </div>
        <div class="col-sm">
            <input type="text" name="division" class="form-control" placeholder="Division">
        </div>
    </div>
    <div class="row m-3">
        <div class="col-sm-2">
            <input type="number" name="roll" placeholder="roll number" class="form-control" required>
        </div>
        <div class="col-sm-2">
            <input type="number" name="prn" placeholder="PRN number" class="form-control" required>
        </div>
        <div class="col-sm">
            <input type="number" name="number" placeholder="Enter your number" class="form-control" required>
        </div>
        <div class="col-sm">
            <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-sm">
            <input type="text" class="form-control" placeholder="Current Address" name="add" required>
        </div>
    </div>
    <div class="row m-3 mt-2">
        <div class="col-sm">
            <input type="text" class="form-control" placeholder="City" name="city" required>
        </div>
        <div class="col-sm">
            <input type="text" class="form-control" placeholder="State" name="state" required>
        </div>
        <div class="col-sm">
            <input type="number" class="form-control" placeholder="Zip" name="zip" required>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <input type="submit" name="submit" value="submit" class="btn btn-outline-secondary">
    </div>
</form>

<?php
include('templates/footer.php');
?>