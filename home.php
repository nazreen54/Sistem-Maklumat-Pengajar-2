
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
<title>IKBN HRDF - Homepage</title>
</head>

<body>
     <?php include_once 'nav_bar_3.php'; ?>
<div class="container-fluid text-center">
        <div class="page-header">
        <h2 class="margin"><span class="glyphicon glyphicon-leaf text-success"></span> Get Started</h2>
      </div>
      
  
    <div class="row">
      <div class="col-sm-4">
        <div class="thumbnail">
          <div class="caption">
            <h3>CREATE a new Trainer</h3>
            <th><img src="image/trainer_details.png" width="35%" height="35%" class="img-responsive img-circle margin" style="display:inline">
            </th>
            <p><br><a href="maklumat.php" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Enter</a></p>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail">
          <div class="caption">
            <h3>INSERT Academic Qualification</h3>
            <th>	
    		<img src="image/academic_qualification.png" width="35%" height="35%" class="img-responsive img-circle margin" style="display:inline">
    		</th>
            <p><br><a href="academic_qualification.php" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Enter</a></p>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail">
          <div class="caption">
            <h3>INSERT Professional Qualification</h3>
            <th><img src="image/professional_qualification.png" width="35%" height="35%" class="img-responsive img-circle margin" style="display:inline">
            </th>
            <p><br><a href="professional_qualification.php" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Enter</a></p>
          </div>
        </div>
      </div>
    </div><!-- row -->

    <div class="row">

      <div class="col-sm-4">
        <div class="thumbnail">
          <div class="caption">
            <h3>INSERT Training Experience</h3>
            <th><img src="image/training_experience.png" width="35%" height="35%" class="img-responsive img-circle margin" style="display:inline">
            </th>
            <p><br><a href="training.php" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Enter</a></p>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail">
          <div class="caption">
            <h3>INSERT Years of Career Experience</h3>
            <th><img src="image/years_of_career_experience.png" width="35%" height="35%" class="img-responsive img-circle margin" style="display:inline">
            </th>
            <p><br><a href="years_of_experience.php" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Enter</a></p>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail">
          <div class="caption">
            <h3>UPLOAD Profile Picture</h3>
            <th><img src="image/upload.png" width="35%" height="35%" class="img-responsive img-circle margin" style="display:inline">
            </th>
            <p><br><a href="image_upload.php" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Enter</a></p>
          </div>
        </div>
      </div>
    </div><!-- row -->
</div>



   <!-- Footer -->
<footer class="footer-distributed">

    <div class="footer-center">

        <center><p class="footer-links">
            Copyright &copy; 2017
        </p></center>

        <center><p class="footer-links">
            Cawangan Penyelarasan Dan Kawalan Kualiti, IKBN Bandar Penawar
        </p></center>

    </div>


</footer>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>