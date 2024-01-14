<?php 
session_start();
include 'conn.php';

if(isset($_POST['submit'])) {
    $course_code = $_POST['course_code'];
    $course_description = $_POST['course_description'];

    $query = "INSERT INTO tbl_courses (course_code, course_description)
            VALUES ('$course_code', '$course_description')";

    if(mysqli_query($con, $query)) {
        echo "<script>alert('Courses Saved Successfuly!')</script>";
        echo "<script>window.location='listofcourses.php'</script>";
    } else {
        die("Error with the query: " . mysqli_error($con));
    }
}
?> 

<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
 <form class="form-horizontal span6" action="#" method="post">

           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header"><a href="index.php" style="text-decoration: none; color: black;">Add New Courses</a></h1>
          </div>
       </div> 
                   
                     <div class="form-group">
                  
                    </div>
                  </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COURSE_NAME">Course Code</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="course_code" name="course_code" placeholder=
                            "Course Code" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "YEAR_NAME">Course Description</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="course_description" name="course_description" placeholder=
                            "Course Description" type="text" value="">
                      </div>
                    </div>
                  </div>

 

                 

            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <button class="btn btn-primary btn-sm" name="submit" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                          <a href="index.php" ><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>cancel</strong></a> 
                       </div>
                    </div>
                  </div>

               
        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
       