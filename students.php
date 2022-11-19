<?php
// including db configuration file
include('config/db_config.php');

// query for showing data
$sql_select = "SELECT id,sname,fname,lname,class,roll,numb,city FROM student ";

// getting result after running queyr
$result = mysqli_query($conn, $sql_select);

// saving result into data variable
$data = mysqli_fetch_all($result);
// freeing result
mysqli_free_result($result);
?>
<!DOCTYPE html>
<html>
<?php
include('templates/header.php');
?>

<div class="overflow-auto">
    <table class="table table-responsive">
        <thead>
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Father Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Class</th>
                <th scope="col">Roll</th>
                <th scope="col">Number</th>
                <th scope="col">City</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $dat) :
            ?>
                <tr class="table-warning">
                    <th scope="row"><?php echo htmlspecialchars($dat['0']); ?></th>
                    <td><?php echo htmlspecialchars(ucwords($dat['1'])); ?></td>
                    <td><?php echo htmlspecialchars(ucwords($dat['2'])); ?></td>
                    <td><?php echo htmlspecialchars(ucwords($dat['3'])); ?></td>
                    <td><?php echo htmlspecialchars($dat['4']); ?></td>
                    <td><?php echo htmlspecialchars($dat['5']); ?></td>
                    <td><?php echo htmlspecialchars($dat['6']); ?></td>
                    <td><?php echo htmlspecialchars(ucwords($dat['7'])); ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<?php
include('templates/footer.php');
?>