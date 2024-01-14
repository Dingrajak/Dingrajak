<?php 
session_start();
require 'conn.php';
require 'functions.php';

$coursesQuery = mysqli_query($con, "SELECT * FROM tbl_courses");
$courses = mysqli_fetch_all($coursesQuery, MYSQLI_ASSOC);

if(isset($_POST['submit'])) {
    $fname = clean($_POST['FNAME']);
    $mname = clean($_POST['MI']);
    $lname = clean($_POST['LNAME']);
    $address = clean($_POST['PADDRESS']);
    $sex = clean($_POST['optionsRadios']);
    $dateofbirth = clean($_POST['BIRTHDATE']);
    $pbirth = clean($_POST['BIRTHPLACE']);
    $nationality = clean($_POST['NATIONALITY']);
    $religion = clean($_POST['RELIGION']);
    $contactno = clean($_POST['CONTACT']);
    $course = clean($_POST['course']);
    $civilstatus = clean($_POST['CIVILSTATUS']);
    $guardian = clean($_POST['GUARDIAN']);
    $gcontactno = clean($_POST['GCONTACT']);

    $query = "INSERT INTO tbl_students (FNAME, MI, LNAME, PADDRESS, optionsRadios, BIRTHDATE, BIRTHPLACE, NATIONALITY, RELIGION, CONTACT, course, CIVILSTATUS, GUARDIAN, GCONTACT)
            VALUES ('$fname', '$mname', '$lname', '$address', '$sex', '$dateofbirth', '$pbirth', '$nationality', '$religion', '$contactno', '$course', '$civilstatus', '$guardian', '$gcontactno')";

    if(mysqli_query($con, $query)) {
        echo "<script>alert('Students Saved Successfuly!')</script>";
        echo "<script>window.location='listofstudents.php'</script>";
    } else {
        die("Error with the query: " . mysqli_error($con));
    }
}

?> 
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<body>
<form action="#" class="form-horizontal well" method="post" >
 <form action="index.php?q=subject" class="form-horizontal well" method="post" > 
  <div class="table-responsive">
  <div class="col-md-7"><h2><a href="index.php" style="text-decoration: none; color: black;">Add New Student</a></h2></div> 
  <div class="col-md-5">
     
    </div> 
    
    <table class="table">
      
      <tr>
        <td><label>Firstname</label></td>
        <td>
          <input required="true"   class="form-control input-md" id="FNAME" name="FNAME" placeholder="First Name" type="text" value="<?php echo isset($_POST['FNAME']) ? $_POST['FNAME'] : ''; ?>">
        </td>
        <td><label>Lastname</label></td>
        <td colspan="2">
          <input required="true"  class="form-control input-md" id="LNAME" name="LNAME" placeholder="Last Name" type="text" value="<?php echo isset($_POST['LNAME']) ? $_POST['LNAME'] : ''; ?>">
        </td> 
        <td>
          <input class="form-control input-md" id="MI" name="MI" placeholder="MI"  maxlength="1" type="text" value="<?php echo isset($_POST['MI']) ? $_POST['MI'] : ''; ?>">
        </td>
      </tr>
      <tr>
        <td><label>Address</label></td>
        <td colspan="5"  >
        <input required="true"  class="form-control input-md" id="PADDRESS" name="PADDRESS" placeholder="Permanent Address" type="text" value="<?php echo isset($_POST['PADDRESS']) ? $_POST['PADDRESS'] : ''; ?>">
        </td> 
      </tr>
      <tr>
        <td ><label>Sex </label></td> 
        <td colspan="2">
          <label>
            <input checked id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Female 
             <input id="optionsRadios2" name="optionsRadios" type="radio" value="Male"> Male
          </label>
        </td>
        <td ><label>Date of birth</label></td>
        <td colspan="2"> 
        <div class="input-group" >
                  <div class="input-group-addon"> 
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  required="true" name="BIRTHDATE"  id="BIRTHDATE"  type="text" class="form-control input-md"  placeholder="mm/dd/yyyy"  data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="<?php echo isset($_POST['BIRTHDATE']) ? $_POST['BIRTHDATE'] : ''; ?>">
           </div>             
        </td>
         
      </tr>
      <tr><td><label>Place of Birth</label></td>
        <td colspan="5">
        <input class="form-control input-md" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth (* Optional)" type="text" value="<?php echo isset($_POST['BIRTHPLACE']) ? $_POST['BIRTHPLACE'] : ''; ?>">
         </td>
      </tr>
      <tr>
        <td><label>Nationality</label></td>
        <td colspan="2"><input class="form-control input-md" id="NATIONALITY" name="NATIONALITY" placeholder="Nationality (* Optional)" type="text" value="<?php echo isset($_POST['CONTACT']) ? $_POST['CONTACT'] : ''; ?>">
              </td>
        <td><label>Religion</label></td>
        <td colspan="2"><input  class="form-control input-md" id="RELIGION" name="RELIGION" placeholder="Religion (* Optional)" type="text" value="<?php echo isset($_POST['RELIGION']) ? $_POST['RELIGION'] : ''; ?>">
        </td>
        
      </tr>
      <tr>
      <td><label>Contact No.</label></td>
        <td><input class="" id="CONTACT" name="CONTACT" placeholder="Contact Number" type="text" maxlength="11" value="<?php echo isset($_POST['CONTACT']) ? $_POST['CONTACT'] : ''; ?>">
              </td>
        
      </tr>
      <tr>
        <td>
                <label for="course">Course</label>
      </td>
      <td>
                <select class="form-control" name="course">
                  <option disabled selected>Choose Courses</option>
                    <?php foreach ($courses as $course) : ?>
                        <option value="<?php echo $course['course_code']; ?>"><?php echo $course['course_code']; ?></option>
                    <?php endforeach; ?>
                </select>
              
                  
          

        </td>
        
       
        <td><label>Civil Status</label></td>
        <td colspan="2">
          <select class="form-control input-sm" name="CIVILSTATUS">
            <option value="<?php echo isset($_POST['CIVILSTATUS']) ? $_POST['CIVILSTATUS'] : 'Select'; ?>">Select (* Optional)</option>
             <option value="Single">Single</option>
             <option value="Married">Married</option> 
             <option value="Widow">Widow</option>
          </select>
        </td>
      </tr>
    
      <tr>
        <td><label>Guardian</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="GUARDIAN" name="GUARDIAN" placeholder="Parents/Guardian Name (*optional)" type="text">
        </td>
        <td><label>Contact No.</label></td>
        <td colspan="2"><input  class="form-control input-md" id="GCONTACT" name="GCONTACT" placeholder="Contact Number" type="text" value="<?php
         echo isset($_POST['GCONTACT']) ? $_POST['GCONTACT'] : '';
          ?>"></td>
      </tr>
      <tr>
      <td></td>
        <td colspan="5">  
          <button class="btn btn-success btn-lg" name="submit" type="submit">Save</button>
        </td>
      </tr>
    </table>
  </div>
</form>
</body>
<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>
