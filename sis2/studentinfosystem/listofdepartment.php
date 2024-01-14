<?php
session_start();
include 'conn.php';
?>

<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <h1 class="page-header"><a href="index.php" style="text-decoration: none; color: black;"> List of Departments</a></h1>
                    <a href="adddepartment.php" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle fw-fa"></i> New</a>
            
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
                    <th>Department Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php 
                $result = mysqli_query($con, "SELECT * FROM tbl_departments" );

                while ($row=mysqli_fetch_array($result)) {
                $id = $row['id'];
                $department_code = $row['department_code'];
                $department_course = $row['department_course'];
            ?>
            <tbody>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $department_code; ?></td>
                    <td><?php echo $department_course; ?></td>
                    <td class="text-center">
                       <a class="btn btn-sm btn-danger" href="delete.php?delete_department=<?php echo $id; ?>"><i class="fa fa-trash-alt"></i> delete</a>
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
