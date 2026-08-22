<?php 
	error_reporting(0);
  	include('config.php');
  	$color="";
  	$message="";

  	if(isset($_POST['submit'])){

    	$mobile = $_POST['mobile'];
   		$email = $_POST['email'];
    	$time = $_POST['time_value'];
    	$facebook	=$_POST['facebook'];
    	$linkedin=$_POST['linkedin'];
    	$map=$_POST['map'];
    	$address = $_POST['address'];

    	$query="insert into configuration(mobile,email,time_value,facebook,linkedin,map,address) values('$mobile','$email','$time','$facebook','$linkedin','$map','$address')";
    	// print_r($query);die;
    	$result=mysqli_query($conn,$query);
    	if ($result) {
                echo "<script>alert('Success:Record Added Successfully');window.location.href='configuration-details.php';</script>";
        } else {
                echo "<script>alert('Error:Something Not Updated');</script>";
        }
	}
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
    	<title>Configuration Form - Admin</title>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- Main CSS-->
    	<link rel="stylesheet" type="text/css" href="css/main.css">
    	<!-- Font-icon css-->
    	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script src="ckeditor/ckeditor.js"></script>
  	</head>
  	<body class="app sidebar-mini">
    	<?php include('header.php');?>
    	<!-- Sidebar menu-->
    	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    	<?php include('side.php');?>
    	<main class="app-content">
      		<div class="app-title">
        		<div>
          			<h1><i class="fa fa-edit"></i> Configuration Form <a href="configuration-details.php" class="btn btn-primary pull-right">  Configuration Form Details</a></h1>
        		</div>
        		<ul class="app-breadcrumb breadcrumb">
          			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          			<li class="breadcrumb-item">Forms</li>
          			<li class="breadcrumb-item"><a href="#">Configuration Form</a></li>
        		</ul>
      		</div>
      		<div class="row">
        		<div class="col-md-12">
         	 		<div class="tile">
            			<h3 class="tile-title">Configuration Form</h3>
            			<div class="tile-body">
              				
              				<form action="#" method="post" enctype="multipart/form-data">
                				<div class="row">
                 	 				<div class="col-md-6">
                    					<div class="form-group">
                     	 					<label class="control-label">Mobile No.</label>
                      						<input class="form-control" type="text" placeholder="Enter Mobile No." name="mobile" required="" >
                    					</div>
                  					</div>
                  					<div class="col-md-6">
                    					<div class="form-group">
                      						<label class="control-label">Email Id </label>
                      						<input class="form-control" type="email" placeholder="Enter Email" name="email" >
                    					</div>
                 	 				</div>
                 	 				<div class="col-md-6">
                   						<div class="form-group">
                      						<label class="control-label">Time</label>
                      						<input class="form-control" type="text" placeholder="Enter Time" name="time_value" required="">
                    					</div>
                  					</div>
                  					<div class="col-md-6">
                   						<div class="form-group">
                      						<label class="control-label">Facebook Link</label>
                      						<input class="form-control" type="text" placeholder="Enter Facebook Link" name="facebook" required="">
                    					</div>
                  					</div>
                  					<div class="col-md-6">
                   						<div class="form-group">
                      						<label class="control-label">Linkedin Link</label>
                      						<input class="form-control" type="text" placeholder="Enter Linkedin Link" name="linkedin" required="">
                    					</div>
                  					</div>
                  					<div class="col-md-6">
                   						<div class="form-group">
                      						<label class="control-label">Address Map</label>
                      						<input class="form-control" type="text" placeholder="Enter Address Map" name="map" required="">
                    					</div>
                  					</div>
                  					
                  					<div class="col-md-12">
                    					<div class="form-group">
                     		 				<label class="control-label">Offces Address</label>
                      						<textarea name="address" id="editor1" rows="5" cols="30"></textarea>
						                    <script>
						                          CKEDITOR.replace( 'editor1' );
						                    </script>
                    					</div>
                  					</div>
                  					
                				</div>
                				<div class="tile-footer">
                  					<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                				</div>
              				</form>
            			</div>
          			</div>
        		</div>
        		<div class="clearix"></div>
      		</div>
    	</main>
   	 	<!-- Essential javascripts for application to work-->
   	 	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/popper.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/main.js"></script>
    	<!-- The javascript plugin to display page loading on top-->
    	<script src="js/plugins/pace.min.js"></script>
    	<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    	<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    	<script type="text/javascript">$('#sampleTable').DataTable();</script>
  	</body>
</html>