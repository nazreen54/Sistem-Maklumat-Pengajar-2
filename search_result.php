<?php
  include_once 'database.php';
  $id=$_REQUEST["txtSearch"];
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
  <title>HRDF- Trainer Details</title>
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
 
<?php include_once 'nav_bar_5.php'; ?>
 
<?php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_maklumat_pengajar WHERE fld_trainer_ic LIKE '$id'  ");
      
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
        <tr>
          <td></td>
          <td>
        <center>
          <a href="search_details.php?ic=<?php echo $readrow['fld_trainer_ic']; ?>" class="btn btn-warning btn-sm" role="button"><span class="glyphicon glyphicon-zoom-in"></span>View More</a>
          </center>
          </td>          
        </tr>
      </table>
      </div>
    </div>
  </div>
</div> 
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>