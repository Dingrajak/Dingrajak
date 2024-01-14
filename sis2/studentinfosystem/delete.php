<?php 
include 'conn.php';

if (isset($_GET['delete_list'])) {
	$delete_list = $_GET['delete_list'];

	mysqli_query($con, "DELETE FROM tbl_students WHERE id='$delete_list'");
	echo "<script>alert('Deleted Successfuly!')</script>";
    echo "<script>window.location='listofstudents.php'</script>";
}

if (isset($_GET['delete_department'])) {
	$delete_department = $_GET['delete_department'];

	mysqli_query($con, "DELETE FROM tbl_departments WHERE id='$delete_department'");
	echo "<script>alert('Deleted Successfuly!')</script>";
    echo "<script>window.location='listofdepartment.php'</script>";
}

if (isset($_GET['delete_course'])) {
	$delete_course = $_GET['delete_course'];

	mysqli_query($con, "DELETE FROM tbl_courses WHERE id='$delete_course'");
	echo "<script>alert('Deleted Successfuly!')</script>";
    echo "<script>window.location='listofcourses.php'</script>";
}
?>