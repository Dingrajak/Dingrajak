<?php 

  session_start();

  require 'conn.php';
  require 'functions.php';

  if(isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Profile - Student Information System</title>

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">

    
</head>
<body>

  <?php include 'header.php'; ?>

  <section>

    <div class="container">
      <strong class="title">My Profile</strong>
    </div>
    
    
    <div class="profile-box box-left">

      <?php

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }


        $query = "SELECT * FROM registrars WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";

        ;

        if($result = mysqli_query($con, $query)) {

          $row = mysqli_fetch_assoc($result);


          $query_date = "SELECT DATE_FORMAT(date_joined, '%m/%d/%Y') FROM registrars WHERE id = '".$_SESSION['userid']."'";
          $result = mysqli_query($con, $query_date);

          $row = mysqli_fetch_row($result);

         

        } else {

          die("Error with the query in the database");

        }

      ?>
      
      <div class="options">
        <a class="btn btn-primary" href="editprofile.php">Edit Profile</a>
        <a class="btn btn-success" href="changepassword.php">Change Password</a>
        <a class="btn btn-success" href="addstudent.php">Add new student</a>
         <a class="btn btn-success" href="adddepartment.php">Add new department</a>
         <a class="btn btn-success" href="addcourses.php">Add new courses</a>
       </div>

      <div class="options">

       <a class="btn btn-danger" href="listofstudents.php">List of Students</a>
       <a class="btn btn-warning" href="listofdepartment.php">List of Departments</a>
       <a class="btn btn-info" href="listofcourses.php">List of courses</a>

    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>

<?php


  } else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>