<?php 
  error_reporting(0);
  include('config.php');
  $color = " ";
  $message = " ";

  $id = $_GET['id'];
  $a = "select * from admission_form where id = '".$id."'";
  $result=mysqli_query($conn,$a);
  $row=mysqli_fetch_assoc($result);
  ///print_r($row);die;
  if(isset($_POST['submit'])){
    $admission_date = $_POST['admission_date'];
    $admission_no = $_POST['admission_no'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $aadhar_number  =$_POST['aadhar_number'];
    $community=$_POST['community'];
    $language = $_POST['language'];
    $tongue = $_POST['tongue'];
    $paddress = $_POST['paddress'];
    $raddess = $_POST['raddess'];
    $father_number  =$_POST['father_number'];
    $father_email=$_POST['father_email'];
    $mother_number = $_POST['mother_number'];
    $mother_email = $_POST['mother_email'];
    $fname = $_POST['fname'];
    $fage = $_POST['fage'];
    $fnationality =$_POST['fnationality'];
    $fqualification=$_POST['fqualification'];
    $finstitution = $_POST['finstitution'];
    $foccupation = $_POST['foccupation'];
    $fdesignation = $_POST['fdesignation'];
    $fincome = $_POST['fincome'];
    $faadhar_number =$_POST['faadhar_number'];
    $fmobile=$_POST['fmobile'];
    $faddress = $_POST['faddress'];
    $mname = $_POST['mname'];
    $mage = $_POST['mage'];
    $mnationality = $_POST['mnationality'];
    $mqualification =$_POST['mqualification'];
    $minstitution=$_POST['minstitution'];
    $moccupation=$_POST['moccupation'];
    $mdesignation=$_POST['mdesignation'];
    $mincome=$_POST['mincome'];
    $maadhar_number=$_POST['maadhar_number'];
    $mmobile=$_POST['mmobile'];
    $maddress=$_POST['maddress'];
    $image='';
    if(!empty($_FILES['image']['name'])){
        $path="uploads/";
        $image=time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES["image"]["tmp_name"],$path.$image);
    }
    $query="update admission_form set admission_date='$admission_date',admission_no='$admission_no',f_name='$f_name',m_name='$m_name',l_name='$l_name',gender='$gender',dob='$dob',blood_group='$blood_group',religion='$religion',nationality='$nationality',aadhar_number='$aadhar_number',community='$community',language='$language',tongue='$tongue',paddress='$paddress',raddess='$raddess',father_number='$father_number',father_email='$father_email',mother_number='$mother_number',mother_email='$mother_email',fname='$fname',fage='$fage',fnationality='$fnationality',fqualification='$fqualification',finstitution='$finstitution',foccupation='$foccupation',fdesignation='$fdesignation',fincome='$fincome',faadhar_number='$faadhar_number',fmobile='$fmobile',faddress='$faddress',mname='$mname',mage='$mage',mnationality='$mnationality',mqualification='$mqualification',minstitution='$minstitution',moccupation='$moccupation',mdesignation='$mdesignation',mincome='$mincome',maadhar_number='$maadhar_number',mmobile='$mmobile',maddress='$maddress',image='$image' where id= '" .$id. "'";
    $result = mysqli_query($conn,$query);
    if($result){
        $color="alert alert-success";
        $message="Update Admission Form Successfully";
    }else {
        $color="alert alert-danger";
        $message="Not Update Successfully";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Edit Admission - Admin</title>
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
            <div><h1><i class="fa fa-edit"></i>Edit Admission Form <a href="admission-form-details.php" class="btn btn-primary pull-right">Admission Form Details</a></h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item"><a href="#">Edit Admission Form</a></li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="tile">
                  <h3 class="tile-title">Edit Admission Form</h3>
                  <div class="tile-body">
                      <h4 class="text-center <?php echo $color;?>"><?php echo $message;?></h4>
                      <form action="#" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label">Admission Date</label>
                                  <input class="form-control" type="text" name="admission_date" value="<?php echo $row['admission_date'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Admission No.</label>
                                  <input class="form-control" type="text" name="admission_no" value="<?php echo $row['admission_no'];?>">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Upload Image</label>
                                  <input class="form-control" type="file" placeholder="Enter Goal" name="image" required="">
                              </div>
                            </div>
                            <div class="col-md-12"><h5 class="text-danger">INFORMATION OF THE CHILD</h5></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label">First Name</label>
                                  <input class="form-control" type="text" name="f_name" value="<?php echo $row['f_name'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Middle Name</label>
                                  <input class="form-control" type="text" value="<?php echo $row['m_name'];?>" name="m_name" >
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Last Name</label>
                                  <input class="form-control" type="text" name="l_name" value="<?php echo $row['l_name'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Gender</label>
                                  <input type="radio" name="gender" value="male"> Male
                                  <input type="radio" name="gender" value="female"> Female
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Date Of Birth</label>
                                  <input class="form-control" type="date" name="dob" value="<?php echo $row['dob'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Blood Group</label>
                                  <input class="form-control" type="text" name="blood_group" value="<?php echo $row['blood_group'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Religion</label>
                                  <input class="form-control" type="text" name="religion" value="<?php echo $row['religion'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Nationality</label>
                                  <input class="form-control" type="text" name="nationality" value="<?php echo $row['nationality'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Aadhar Number</label>
                                  <input class="form-control" type="text" name="aadhar_number" value="<?php echo $row['aadhar_number'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Community</label>
                                  <input type="radio" name="community" value="sc/st"> SC \ ST
                                  <input type="radio" name="community" value="obc"> OBC
                                  <input type="radio" name="community" value="gen"> GEN
                                  <input type="radio" name="community" value="others"> OTHERS
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Language Known</label>
                                  <input class="form-control" type="text" name="language" value="<?php echo $row['language'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Mother Tongue</label>
                                  <input class="form-control" type="text" name="tongue" value="<?php echo $row['tongue'];?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">Permanent Address</label>
                                  <textarea name="paddress" id="editor1" rows="5" cols="30"><?php echo $row['paddress'];?></textarea>
                                <script>
                                      CKEDITOR.replace( 'editor1' );
                                </script>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">Residential Address</label>
                                  <textarea name="raddess" id="editor2" rows="5" cols="30"><?php echo $row['raddess'];?></textarea>
                                <script>
                                      CKEDITOR.replace( 'editor2' );
                                </script>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Father No.</label>
                                  <input class="form-control" type="text" name="father_number" value="<?php echo $row['father_number'];?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Father Email ID</label>
                                  <input class="form-control" type="email" name="father_email" value="<?php echo $row['father_email'];?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Mother No.</label>
                                  <input class="form-control" type="text" name="mother_number" value="<?php echo $row['mother_number'];?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Mother Email ID</label>
                                  <input class="form-control" type="email" name="mother_email" value="<?php echo $row['mother_email'];?>">
                              </div>
                            </div>
                            <div class="col-md-12"><h5 class="text-danger">FAMILY INFORMATION</h5><h6 class="text-black">Father / Guardian </h6></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label">Father Name</label>
                                  <input class="form-control" type="text" name="fname" value="<?php echo $row['fname'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Age</label>
                                  <input class="form-control" type="text" name="fage" value="<?php echo $row['fage'];?>">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Nationality</label>
                                  <input class="form-control" type="text" name="fnationality" value="<?php echo $row['fnationality'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Educational Qualification</label>
                                  <input class="form-control" type="Text" name="fqualification" value="<?php echo $row['fqualification'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Institution</label>
                                  <input class="form-control" type="text" name="finstitution" value="<?php echo $row['finstitution'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Occupation</label>
                                  <input class="form-control" type="text" name="foccupation" value="<?php echo $row['foccupation'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Designation</label>
                                  <input class="form-control" type="text" name="fdesignation" value="<?php echo $row['fdesignation'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Annual Income</label>
                                  <input class="form-control" type="text" name="fincome" value="<?php echo $row['fincome'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Aadhar Number</label>
                                  <input class="form-control" type="text" name="faadhar_number" value="<?php echo $row['faadhar_number'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Teh</label>
                                  <input class="form-control" type="text" name="fmobile" value="<?php echo $row['fmobile'];?>">
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                  <label class="control-label">Office Address</label>
                                  <textarea class="form-control" type="text" name="faddress"><?php echo $row['faddress'];?></textarea>
                              </div>
                            </div>
                            <div class="col-md-12"><h6 class="text-black">Mother / Guardian </h6></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label">Name</label>
                                  <input class="form-control" type="text" name="mname" value="<?php echo $row['mname'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Age</label>
                                  <input class="form-control" type="text" value="<?php echo $row['mage'];?>" name="mage" >
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Nationality</label>
                                  <input class="form-control" type="text" name="mnationality" value="<?php echo $row['mnationality'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Educational Qualification</label>
                                  <input class="form-control" type="Text" name="mqualification" value="<?php echo $row['mqualification'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Institution</label>
                                  <input class="form-control" type="text" name="minstitution" value="<?php echo $row['minstitution'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Occupation</label>
                                  <input class="form-control" type="text" name="moccupation" value="<?php echo $row['moccupation'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Designation</label>
                                  <input class="form-control" type="text" name="mdesignation" value="<?php echo $row['mdesignation'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Annual Income</label>
                                  <input class="form-control" type="text" name="mincome" value="<?php echo $row['mincome'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Aadhar Number</label>
                                  <input class="form-control" type="text" name="maadhar_number" value="<?php echo $row['maadhar_number'];?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">Teh</label>
                                  <input class="form-control" type="text" name="mmobile" value="<?php echo $row['mmobile'];?>">
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                  <label class="control-label">Office Address</label>
                                  <textarea class="form-control" type="text" name="maddress"><?php echo $row['mmobile'];?></textarea>
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
      <script src="js/jquery-3.3.1.min.js"></script>
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