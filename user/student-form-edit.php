<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
	
  {
	  
    $uid=$_SESSION['uid'];
	$stuid=$_SESSION['uid'];
    $studentclass=$_POST['Studentclass'];
    $contact=$_POST['contactno'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
	$blood=$_POST['blood_group'];
	$address=$_POST['address1'];
	$address2=$_POST['address2'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$studentq= $_POST['studentqualification'];
	$studentqd=$_POST['studentqualificationd'];
	$studentsc=$_POST['studentclass'];
	$studenthb=$_POST['studenthobby'];
	$studentad=$_POST['aadharcardno'];
	$studentschool=$_POST['studentschool'];
	$pincode=$_POST['pincode'];
	$emergencycontact=$_POST['emergencycontact'];
	$nativeplace=$_POST['nativeplace'];
	$fathername=$_POST['fathername'];
	$fatherqualification=$_POST['fatherqualification'];
	$fatheroccupation=$_POST['fatheroccupation'];
	$mothername=$_POST['mothername'];
	$motherqualification=$_POST['motherqualification'];
	$motheroccupation=$_POST['motheroccupation'];
    $dec=$_POST['declaration'];
	$diff = date_diff(date_create($dob), date_create($today));
	$age= $diff->format('%y');
	//$pc=$_FILES["pcimage"]["name"];
	$sql2 ="update tblstudentapplications set Gender='$gender',Bloodgroup ='$blood',Pincode='$pincode',dob='$dob',Addressline1='$address',Addressline2='$address2',city='$city',State='$state' where UserId='$stuid'";
	
$query=mysqli_query($con,$sql2);

    if ($query) {
    $msg="Details  has been updated.";
	print_r($sql2);
	$msg = "update tblstudentapplications set StudentClass='$Studentclass',Gender='$gender',dob='$dob',Addressline1='$address1',Addressline2='$address2',city='$city',State='$state',Pincode='$pincode' where Id='$uid'";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
	  $msg ="update tblstudentapplications set StudentClass='$Studentclass',Gender='$gender',dob='$dob' where Id='$uid'";
    }
}
  } ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Student Registration</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/extended/form-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <style>
    .errorWrap {
    padding: 10px;
    margin: 20px 0 0px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           Student Registration Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application
                </li>
              </ol>
            </div>
          </div>
		  <div class=row style="margin-left:430px">
		  <img src="Jainism Logo.png" alt="My Jainism"  width="180px" height="180px" align="center">
		  </div>
        </div>
   
      </div>
      <div class="content-body">
<?php 
$stuid=$_SESSION['uid'];

$uid=$_SESSION['uid'];
$ret=mysqli_query($con,"select FirstName,LastName from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['FirstName'];
$lname=$row['LastName'];

$ret2=mysqli_query($con,"select * from tblstudentapplications where  UserId=$stuid");
$rw=mysqli_num_rows($ret2);
if($rw>0)
{
while($row=mysqli_fetch_array($ret2)){
?>
<form name="submit" method="post" enctype="multipart/form-data"> 
<div class="row">
<?php echo $id ?>
<div class="col-xl-4 col-lg-12">
<fieldset>
  <h5>StudentDOB(*)                    </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="dob" name="dob"  value="<?php echo $row['dob'];?>" type="date" required>
   </div>
   </fieldset>

</div>
<div class="col-xl-4 col-lg-12">
<fieldset>
  <h5>Gender(*)                 </h5>
   <div class="form-group">

   <select class="form-control white_bg" id="gender" name="gender"  required>
    <option value="<?php echo $row['Gender']; ?>"Selected><?php echo $row['Gender']; ?></option>
<option value="Boy">Boy</option>
<option value="Girl">Girl</option>
   </select>
                          </div>
                        </fieldset>
                      </div>
 <div class="col-xl-4 col-lg-12">					  
 <fieldset>

  <h5>Blood Group           </h5>
   <div class="form-group">
  <input class="form-control white_bg" id="blood_group" name="blood_group"  value="<?php echo $row['Bloodgroup'];?>" type="text" required>
</div>
</fieldset>
</div>
</div>
<div class="row" style="margin-top:1%">
  <div class="col-xl-6 col-lg-12">
    <fieldset>
  <h5>Address Line1(*)                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="address1" name="address1" value="<?php echo $row['Addressline1'];?>" type="text" required>
    </div>
</fieldset>
  </div>
    <div class="col-xl-6 col-lg-12">
    <fieldset>
  <h5>Adress Line2(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="address2" name="address2" value="<?php echo $row['Addressline2'];?>" type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
  <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>City(*)                  </h5>
   <div class="form-group">
   <Select class="form-control white_bg" id="city" name="city"  required>
   <option value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
    <option value="Mumbai">Mumbai</option>
    <option value="Mumbai Suburban">Mumbai Suburban</option>
    <option value="Navi Mumbai">Navi Mumbai</option>
</select>
    </div>
</fieldset>
  </div>
  <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>State(*)                  </h5>
   <div class="form-group">
   <select class="form-control white_bg" id="state" name="state"  required>
      <option value="<?php echo $row['State']; ?>"><?php echo $row['State']; ?></option>
   <option value="Maharashtra">Maharashtra</option>
   </select>
    </div>
</fieldset>
  </div>
  <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>Pincode(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="pincode"  value="<?php echo $row['Pincode']; ?>" name="pincode"  type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
  <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>Student Qualification(*)                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="studentqualification" name="studentqualification" value="<?php echo $row['StudentQualification'];?>" type="text" required>
    </div>
</fieldset>
  </div>
    <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>Student Qualification[Dharma](*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="studentqualificationd" name="studentqualificationd" value="<?php echo $row['StudentQualificationD'];?>" type="text" required>
    </div>
	</div>
	<div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>Student School Name(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="studentschool" name="studentschool" value="<?php echo $row['StudentSchool'];?>"  type="text" required>
    </div>
</div>
</div>
<div class="row">
  <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>Student Hobby(*)                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="studenthobby" name="studenthobby" value="<?php echo $row['StudentHobby'];?>" type="text" required>
    </div>
</fieldset>
  </div>
    <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>Aadhar Card No                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="aadharcardno" name="aadharcardno" value="<?php echo $row['StudentAadhar'];?>"  type="text">
    </div>
	</div>
	</div>
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Contact No(*)                    </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="contactno" name="contactno" value="<?php echo $row['contactno1'];?>" maxlength="20" type="text" required>
          
    </div>

</fieldset>                  
</div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Emergency Contact No(*)                </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="emergencycontact" name="emergencycontact" value="<?php echo $row['contactno2'];?>" maxlength="20"  type="text" required>
                          </div>

                        </fieldset>
                      </div>
					  					  <div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Native Place(*)           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="nativeplace" name="nativeplace" value="<?php echo $row['NativePlace'];?>" type="text" required>

                          </div>
                        </fieldset>
                      </div>

                    </div>

<div class="row">


					  </div>
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Father Name(*)           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="fathername" name="fathername" value="<?php echo $row['FatherName'];?>" type="text" required>

                          </div>
                        </fieldset>
                      </div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Father Qualification          </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="fatherqualification" name="fatherqualification" value="<?php echo $row['FatherQualification'];?>"  type="text">

                          </div>
                        </fieldset>
                      </div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Father Occupation           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="fatheroccupation" name="fatheroccupation" value="<?php echo $row['FatherOccupation'];?>"  type="text">

                          </div>
                        </fieldset>
                      </div>
</div>
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Mother Name           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="mothername" name="mothername" value="<?php echo $row['MotherName'];?>"type="text">

                          </div>
                        </fieldset>
                      </div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Mother Qualification           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="motherqualification" name="motherqualification"value="<?php echo $row['MotherQualification'];?>"  type="text">

                          </div>
                        </fieldset>
                      </div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Mother Occupation           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="motheroccupation" name="motheroccupation" value="<?php echo $row['MotherOccupation'];?>"  type="text">

                          </div>
                        </fieldset>
                      </div>
</div>
<?php } ?>
<?php } ?>
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button>
</div>
</div>
</div>
</form>

<?php include('includes/footer.php');?>
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/handlebars.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/formatter/formatter.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/card/jquery.card.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-typeahead.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-inputmask.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-formatter.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-maxlength.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-card.js" type="text/javascript"></script>
</body>
</html>


