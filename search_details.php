<?php
  include_once 'database.php';
?>

<?php
  include_once 'maklumat_crud.php';
?>

<?php

  require_once("session.php");
  
  require_once("class.user.php");
  $auth_user = new USER();
  
  
  $user_id = $_SESSION['user_session'];
  
  $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");

  $stmt->execute(array(":user_id"=>$user_id));
  
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>IKBN HRDF</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 
<?php include_once 'nav_bar_2.php'; ?>
 
<?php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_maklumat_pengajar, tbl_academic_qualification, tbl_academic_qualification_2, tbl_academic_qualification_3, tbl_academic_qualification_4, tbl_professional_qualification, tbl_professional_qualification_2, tbl_professional_qualification_3, tbl_professional_qualification_4, tbl_experience, tbl_experience_2, tbl_experience_3, tbl_experience_4, tbl_training, tbl_training_2, tbl_training_3, tbl_training_4, tbl_references WHERE 

      tbl_maklumat_pengajar.fld_trainer_ic = :ic

      AND tbl_academic_qualification.fld_academic_ic = :ic 
      AND tbl_academic_qualification_2.fld_academic_ic_2 = :ic 
      AND tbl_academic_qualification_3.fld_academic_ic_3 = :ic 
      AND tbl_academic_qualification_4.fld_academic_ic_4 = :ic 

      AND tbl_professional_qualification.fld_professional_ic = :ic
      AND tbl_professional_qualification_2.fld_professional_ic_2 = :ic
      AND tbl_professional_qualification_3.fld_professional_ic_3 = :ic
      AND tbl_professional_qualification_4.fld_professional_ic_4 = :ic 

      AND tbl_experience.fld_experience_ic = :ic
      AND tbl_experience_2.fld_experience_ic_2 = :ic
      AND tbl_experience_3.fld_experience_ic_3 = :ic
      AND tbl_experience_4.fld_experience_ic_4 = :ic

      AND tbl_training.fld_training_ic = :ic
      AND tbl_training_2.fld_training_ic_2 = :ic
      AND tbl_training_3.fld_training_ic_3 = :ic
      AND tbl_training_4.fld_training_ic_4 = :ic 

      AND tbl_references.fld_references_ic = :ic 

      AND fld_trainer_ic = :ic");



  $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $ic = $_GET['ic'];
  $stmt->execute();
	
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
  
  }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center">
      <?php if ($readrow['fld_trainer_image'] == "" ) {
        echo "No image";
      }
      else { ?>
       <center> 
      <img src="profile_image/<?php echo $readrow['fld_trainer_image'] ?>"  width="55%" height="55%" class="img-responsive">
      </center>
      <?php } ?>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4">
      <div class="panel panel-default">
      <div class="panel-heading"><strong><b>Trainer Details</b></strong></div>

      <table class="table">

        <tr>
          <td><strong>Name</strong></td>
          <td><?php echo $readrow['fld_trainer_name'] ?></td>
        </tr>
        <tr>
          <td><strong>Nationality</strong></td>
          <td><?php echo $readrow['fld_trainer_nationality'] ?></td>
        </tr>
        <tr>
          <td><strong>IC/Passport No.</strong></td>
          <td><?php echo $readrow['fld_trainer_ic'] ?></td>
        </tr>
        <tr>
          <td><strong>Race</strong></td>
          <td><?php echo $readrow['fld_trainer_race'] ?></td>
        </tr>
        <tr>
          <td><strong>Mobile Phone No.</strong></td>
          <td><?php echo $readrow['fld_trainer_mobile'] ?></td>
        </tr>
        <tr>
          <td><strong>Office Phone No.</strong></td>
          <td><?php echo $readrow['fld_trainer_office'] ?></td>
        </tr>
        <tr>
          <td><strong>Email</strong></td>
          <td><?php echo $readrow['fld_trainer_email'] ?></td>
        </tr>
        <tr>
          <td><strong>Fax No.</strong></td>
          <td><?php echo $readrow['fld_trainer_fax'] ?></td>
        </tr>
      </table>

  </div>
</div>

</div>
</div>

    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Academic Qualification</h2>
      </div>
      <table class="table table-striped table-bordered">

     <tr>
        <th><center></center></th>        
        <th><center>Qualification</center></th>
        <th><center>Name of Academic Institute</center></th>
        <th><center>Year Awarded</center></th>
        
      </tr>

      <tr>
        <td>1.</td>
        <td><?php echo $readrow['fld_academic_qualification']; ?></td>
        <td><?php echo $readrow['fld_academic_institute']; ?></td>
        <td><center><?php echo $readrow['fld_academic_yearawarded']; ?></center></td>

       </tr>

        <tr>
        <td>2.</td>
        <td><?php echo $readrow['fld_academic_qualification_2']; ?></td>
        <td><?php echo $readrow['fld_academic_institute_2']; ?></td>
        <td><center><?php echo $readrow['fld_academic_yearawarded_2']; ?></center></td>

       </tr>

        <tr>
        <td>3.</td>
        <td><?php echo $readrow['fld_academic_qualification_3']; ?></td>
        <td><?php echo $readrow['fld_academic_institute_3']; ?></td>
        <td><center><?php echo $readrow['fld_academic_yearawarded_3']; ?></center></td>

       </tr>

        <tr>
        <td>4.</td>
        <td><?php echo $readrow['fld_academic_qualification_4']; ?></td>
        <td><?php echo $readrow['fld_academic_institute_4']; ?></td>
        <td><center><?php echo $readrow['fld_academic_yearawarded_4']; ?></center></td>

       </tr>


    </table>

  </div>
  </div>

   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Professional Qualification</h2>
      </div>
      <table class="table table-striped table-bordered">

     <tr>
        <th><center></center></th> 
        <th><center>Professional Qualification</center></th>
        <th><center>Certification Body</center></th>
        <th><center>Year Awarded</center></th>
        
      </tr>

        <tr>
        <td>1.</td>
        <td><?php echo $readrow['fld_professional_qualification']; ?></td>
        <td><?php echo $readrow['fld_professional_body']; ?></td>
        <td><center><?php echo $readrow['fld_professional_yearawarded']; ?></center></td>

        </tr>

        <tr>
        <td>2.</td>  
        <td><?php echo $readrow['fld_professional_qualification_2']; ?></td>
        <td><?php echo $readrow['fld_professional_body_2']; ?></td>
        <td><center><?php echo $readrow['fld_professional_yearawarded_2']; ?></center></td>

        </tr>
        
        <tr>
         <td>3.</td>  
        <td><?php echo $readrow['fld_professional_qualification_3']; ?></td>
        <td><?php echo $readrow['fld_professional_body_3']; ?></td>
        <td><center><?php echo $readrow['fld_professional_yearawarded_3']; ?></center></td>

        </tr>

      <tr>
         <td>4.</td>
        <td><?php echo $readrow['fld_professional_qualification_4']; ?></td>
        <td><?php echo $readrow['fld_professional_body_4']; ?></td>
        <td><center><?php echo $readrow['fld_professional_yearawarded_4']; ?></center></td>

        </tr>
    </table>

  </div>
  </div>
 
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Years of Career Experience</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <th><center></center></th> 
        <th><center>Previous Company</center></th>
        <th><center>Position</center></th>
        <th><center>Year From</center></th>
        <th><center>Year To</center></th>
        
      </tr>
     
      <tr>
        <td>1.</td>
        <td><?php echo $readrow['fld_company']; ?></td>
        <td><?php echo $readrow['fld_experience_position']; ?></td>
        <td><center><?php echo $readrow['fld_experience_yearfrom']; ?></center></td>
        <td><center><?php echo $readrow['fld_experience_yearto']; ?></center></td>

        </tr>

            <tr>
        <td>2.</td>
        <td><?php echo $readrow['fld_company_2']; ?></td>
        <td><?php echo $readrow['fld_experience_position_2']; ?></td>
        <td><center><?php echo $readrow['fld_experience_yearfrom_2']; ?></center></td>
        <td><center><?php echo $readrow['fld_experience_yearto_2']; ?></center></td>

        </tr>
        
              <tr>
        <td>3.</td>
        <td><?php echo $readrow['fld_company_3']; ?></td>
        <td><?php echo $readrow['fld_experience_position_3']; ?></td>
        <td><center><?php echo $readrow['fld_experience_yearfrom_3']; ?></center></td>
        <td><center><?php echo $readrow['fld_experience_yearto_3']; ?></center></td>

        </tr>

              <tr>
        <td>4.</td>        
        <td><?php echo $readrow['fld_company_4']; ?></td>
        <td><?php echo $readrow['fld_experience_position_4']; ?></td>
        <td><center><?php echo $readrow['fld_experience_yearfrom_4']; ?></center></td>
        <td><center><?php echo $readrow['fld_experience_yearto_4']; ?></center></td>

        </tr>  
    </table>



  </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Training Experience</h2>
      </div>
      <table class="table table-striped table-bordered">

     <tr>
        <th><center></center></th> 
        <th><center>Training Programme Conducted</center></th>
        <th><center>Year From</center></th>
        <th><center>Year To</center></th>
        
      </tr>
     
      <tr>
        <td>1.</td> 
        <td><?php echo $readrow['fld_training_program']; ?></td>
        <td><center><?php echo $readrow['fld_training_yearfrom']; ?></center></td>
        <td><center><?php echo $readrow['fld_training_yearto']; ?></center></td>
       </tr>
       
      <tr>
        <td>2.</td> 
        <td><?php echo $readrow['fld_training_program_2']; ?></td>
        <td><center><?php echo $readrow['fld_training_yearfrom_2']; ?></center></td>
        <td><center><?php echo $readrow['fld_training_yearto_2']; ?></center></td>
       </tr> 
       
      <tr>
        <td>3.</td> 
        <td><?php echo $readrow['fld_training_program_3']; ?></td>
        <td><center><?php echo $readrow['fld_training_yearfrom_3']; ?></center></td>
        <td><center><?php echo $readrow['fld_training_yearto_3']; ?></center></td>
       </tr> 

      <tr>
        <td>4.</td> 
        <td><?php echo $readrow['fld_training_program_4']; ?></td>
        <td><center><?php echo $readrow['fld_training_yearfrom_4']; ?></center></td>
        <td><center><?php echo $readrow['fld_training_yearto_4']; ?></center></td>
       </tr>   
    </table>

  </div>
  </div>

      <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>References</h2>
      </div>

      <table class="table table-striped table-bordered">

     <tr>
        <th><center></center></th> 
        <th><center>Reference Name</center></th>
        <th><center>Tel No.</center></th>
                
     </tr>
     
      <tr>
        <td>1.</td> 
        <td><?php echo $readrow['fld_references_name']; ?></td>
        <td><center><?php echo $readrow['fld_references_tel']; ?></center></td>
        
      </tr>
       
  </table>    
  </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

<style type="text/css">
@media print {
   @page {
  size: 210.76mm 240.16mm; 
  /* you can also specify margins here: */
  margin: 0.5;
    }
    #printbtn {
        display :  none;
    }
}
</style>
<center><button id ="printbtn" class="btn btn-primary" type="submit" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print this page</button>
</center>

<br>

	</div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>