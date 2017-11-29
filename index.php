<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['uname']);
	$upass = strip_tags($_POST['upass']);
		
	if($login->doLogin($uname,$upass))
	{

		$login->redirect('home.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IKBN HRDF: Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>

<?php include_once 'nav_bar_login.php'; ?>
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
        <center><img src="image/logo_ikbn2.png" width="200" height="200" title="IKBN Logo" alt="IKBN HRDF" /></center>
        <center><h2 class="form-signin-heading">IKBN-HRDF</h2></center>
        <center><h3 class="form-signin-heading">Admin Login</h3><hr /></center>
        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="uname" placeholder="Username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="upass" placeholder="Your Password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <center><button type="submit" name="btn-login" class="btn btn-s btn-primary btn-block">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button></center>
        </div>  
      	<br />
            <center><label>If you can not access the system. Please refresh your browser or check CAPS LOCK. It may affect your login.</label></center>
      </form>

    </div>
    
</div>
<br>

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

</body>
</html>