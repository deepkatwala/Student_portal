<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


	  $cid=$_GET['acid'];
	  echo $cid;
	 

  
  
  
  
  ?>
  <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Contact Form Admin | Add Department</title>
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
           Add Course
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Department</li>
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->

<form name="course" method="post" >        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Holidays in DML</h4>
 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
				
				
<?php
$cid=$_GET['acid'];
//echo "select tbladmapplications.*,tblsalary.*,tbluser.* from tbladmapplications inner join tblsalary on tbladmapplications.UserId = tblsalary.userid inner join tbluser on tbladmapplications.Userid=tbluser.ID where tblsalary.id='$cid'";exit;
$query2 =mysqli_query($con,"select tbladmapplications.*,tblsalary.*,tbluser.* from tbladmapplications inner join tblsalary on tbladmapplications.UserId = tblsalary.userid inner join tbluser on tbladmapplications.Userid=tbluser.ID where tblsalary.id='$cid'");
  //echo "Error description: " . $query2->error;
//$row = mysqli_fetch_array($query2);
//echo '<pre>';
//print_r($row);
while ($row = mysqli_fetch_array($query2))
{
//echo "dfgkjnkjfh";exit;
?>
                <div class="card-content">
                  <div class="card-body">
   
<div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Employee Name
						  <?php // echo "ffghlfg";exit; ?>
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="employee_name" type="text" name="employee_name" value="<?php echo $row['FirstName'];?> <?php echo $row['LastName']?>" readonly>
                          </div>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Employee Department
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="Empdept" type="text" name="Empdept" value="<?php echo $row['Empdept'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Employee Designation
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="Empdesignation" type="text" name="Empdesignation" value="<?php echo $row['Empdesignation'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Employee Code
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="emp_code" type="text" name="emp_code" value="<?php echo $row['emp_code'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  
 </div>
  <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Basic Pay (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num1" type="text" name="num1" value="<?php echo $row['basic_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>TA (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num2" type="text" name="num2" value="<?php echo $row['ta_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>HRA (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num3" type="text" name="num3" value="<?php echo $row['hra_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>DA (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num4" type="text" name="num4" value="<?php echo $row['da_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>SA (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num8" type="text" name="num8" value="<?php echo $row['sa_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>PF (in % percentage)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num5" type="text" name="num5" value="<?php echo $row['pf_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>PF Amount 
                          
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="pf" type="text" name="pf" readonly>
                          </div>
                        </fieldset>
                      </div>
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>TDS (in % percentage)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num6" type="text" name="num6" value="<?php echo $row['tds_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>TDS Amount
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="tds" type="text" name="tds" readonly>
                          </div>
                        </fieldset>
                      </div>
   <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Professional TAX (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num7" type="text" name="num7" value="<?php echo $row['pt_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
	   <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Gross Salary (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="sum2" type="text" name="sum2" value="<?php echo $row['gross_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
	   <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Total Deduction (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="sum1" type="text" name="sum1" value="<?php echo $row['deduct_pay'];?>" readonly>
                          </div>
                        </fieldset>
 </div>
	   <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Net Salary (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="sum3" type="text" name="sum3" value="<?php echo $row['net_pay'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>From Date
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="from_date" type=" " name="fromdate" value="<?php echo $row['from_date'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>To Date
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="to_date" type=" " name="todate" value="<?php echo $row['to_date'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>No of Working days
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="no_days" type="text" name="no_days" value="<?php echo $row['no_days'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>No of Leaves
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num9" type="text" name="num9" value="<?php echo $row['days_deduct'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
 <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>No of Present days
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num10" type="text" name="num10"value="<?php echo $row['present_days'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
	
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Bonus
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num12" type="text" name="num12" value="<?php echo $row['commission'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
					  
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Loan Installment
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="num11" type="text" name="num11" value="<?php echo $row['loan_installment'];?>" readonly>
  
                          </div>
                        </fieldset>
                      </div>
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Basic 1
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="basic1" type="text" name="basic1"value="<?php echo $row['basic1'];?>" readonly >
                          </div>
                        </fieldset>
                      </div>
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>TA 1
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="ta1" type="text" name="ta1" value="<?php echo $row['ta1'];?>" readonly >
                          </div>
                        </fieldset>
                      </div>
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>DA 1
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="da1" type="text" name="da1" value="<?php echo $row['da1'];?>" readonly>
                          </div>
                        </fieldset>
                     </div>
<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>HRA 1
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="hra1" type="text" name="hra1" value="<?php echo $row['hra1'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
	<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>SA 1
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="sa1" type="text" name="sa1" value="<?php echo $row['sa1'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>

	   <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Gross Salary Monthly (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="sum2" type="text" name="sum2"value="<?php echo $row['gross_pay1'];?>" readonly>
                          </div>
                        </fieldset>
                      </div>
	   <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Total Deduction Monthly (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="sum1" type="text" name="sum1" value="<?php echo $row['deduct_pay1'];?>" readonly >
                          </div>
                        </fieldset>
 </div>
	   <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Net Salary Monthly (In Rupees)
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="sum3" type="text" name="sum3"  value="<?php echo $row['net_pay1'];?>" readonly >
                          </div>
                        </fieldset>
                      </div>

<div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Mode Of payment
                         
                          </h5>
                          <div class="form-group">
<input class="form-control white_bg" value="<?php echo $row['mode_payment'];?>"  name="mode_payment" readonly >
  
                          </div>
                     
					  
					  
                    </div>
					</div>

 
<div class="row">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">View</button>
</div>
</div>



 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Formatter end -->
      </form>  
     

      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('includes/footer.php');?>
  <!-- BEGIN VENDOR JS-->
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
 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	


<script>

$(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#num1, #num2, #num3, #num4,#num5,#num6,#num7,#num8").on("keydown keyup", function() {
        sum();
    });
});

function sum() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
			var num3 = document.getElementById('num3').value;
			var num4 = document.getElementById('num4').value;
			var num5 = document.getElementById('num5').value;
			var num6 = document.getElementById('num6').value;
			var num7 = document.getElementById('num7').value;
			var num8 = document.getElementById('num8').value;
			
			var result = parseInt(num1) + parseInt(num2) + parseInt(num3)+parseInt(num4)+parseInt(num8);//Total Payable
			var result2 = Math.round(parseFloat((num1*num5)/100));//PF value
			var result3 = Math.round(parseFloat((result*num6)/100));//TDs value
			var result1 = parseInt(result2) + parseInt(result3) + parseInt(num7);//Total deduction
			var result4 = parseInt(result) - parseInt(result1); //Net salary
            if (!isNaN(result)) {
                document.getElementById('sum2').value = result;
				document.getElementById('sum1').value = result1;
				document.getElementById('pf').value = result2;
				document.getElementById('tds').value = result3;
				document.getElementById('sum3').value = result4;
            }
        }
</script>
</body>
</html>
<?php }  ?>
<?php }  ?>