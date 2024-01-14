<?php
session_start();
include 'conn.php';

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $result = mysqli_query($con, "SELECT * FROM tbl_students WHERE LNAME LIKE '%$search%' OR FNAME LIKE '%$search%' OR MI LIKE '%$search%'");
} else {
    $result = mysqli_query($con, "SELECT * FROM tbl_students");
}
?>

<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <h1 class="page-header"><a href="index.php" style="text-decoration: none; color: black;"> List of Students</a></h1>
            <a href="addstudent.php" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle fw-fa"></i> New</a>
        </div>
        <!-- Add Search Bar -->
        <div class="col-lg-3">
            <form method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Name" name="search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" style="font-size: 12px;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Date Of Birth</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $fname = $row['FNAME'];
                $mname = $row['MI'];
                $lname = $row['LNAME'];
                $address = $row['PADDRESS'];
                $sex = $row['optionsRadios'];
                $dateofbirth = $row['BIRTHDATE'];
                $pbirth = $row['BIRTHPLACE'];
                $nationality = $row['NATIONALITY'];
                $religion = $row['RELIGION'];
                $contactno = $row['CONTACT'];
                $course = $row['course'];
                $civilstatus = $row['CIVILSTATUS'];
                $guardian = $row['GUARDIAN'];
                $gcontactno = $row['GCONTACT'];
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $lname; ?>, <?php echo $fname; ?>, <?php echo $mname; ?></td>
                        <td><?php echo $sex; ?></td>
                        <td><?php echo $dateofbirth; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $contactno; ?></td>
                        <td><?php echo $course; ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-danger" href="delete.php?delete_list=<?php echo $id; ?>"><i class="fa fa-trash-alt"></i> delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</form>

</div> <!---End of container-->
