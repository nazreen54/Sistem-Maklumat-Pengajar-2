<?php
  include_once 'years_of_experience_crud_2.php';
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
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php include_once 'nav_bar_3.php'; ?>
    <div class="container-fluid">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Years of Career Experience 2</h2>
      </div>

    <div class="btn-group">
      <button class="btn btn-primary btn-sm" onclick="window.location.href='years_of_experience.php'">1</button>
      <button class="btn btn-primary btn-sm" onclick="window.location.href='years_of_experience_2.php'">2</button>
      <button class="btn btn-primary btn-sm" onclick="window.location.href='years_of_experience_3.php'">3</button>
      <button class="btn btn-primary btn-sm" onclick="window.location.href='years_of_experience_4.php'">4</button>
    </div> 

    <form action="years_of_experience_2.php" method="post" class="form-horizontal">
      
      <div class="form-group">
          <label for="name" class="col-sm-3 control-label" hidden>ID</label>
          <div class="col-sm-9">
      <input name="id" type="hidden" placeholder="Automatically Generate, Please Do Not Fill" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_experience_id_2']; ?>"> <br>
             </div>
        </div>

      <div class="form-group">
          <label for="ic" class="col-sm-3 control-label">IC/Passport No.</label>
          <div class="col-sm-9">
      <select name="ic" class="form-control" id="ic"  required>
      <option value="">Please select</option>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_maklumat_pengajar");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $staffrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['fld_experience_ic_2']==$staffrow['fld_trainer_ic'])) { ?>
          <option value="<?php echo $staffrow['fld_trainer_ic']; ?>" selected><?php echo $staffrow['fld_trainer_ic'];?></option>
        <?php } else { ?>
          <option value="<?php echo $staffrow['fld_trainer_ic']; ?>"><?php echo $staffrow['fld_trainer_ic'];?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> 
        </div>
        </div>  

       <div class="form-group">
          <label for="company" class="col-sm-3 control-label">Previous Company</label>
          <div class="col-sm-9">
      <input name="company" type="text" class="form-control" id="company" placeholder="Insert Previous Company" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_company_2']; ?>" >
       </div>
        </div> 

        <div class="form-group">
          <label for="position" class="col-sm-3 control-label">Position</label>
          <div class="col-sm-9">
      <input name="position" type="text" class="form-control" id="position" placeholder="Insert Position" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_experience_position_2']; ?>" >
       </div>
        </div>

      <div class="form-group">
          <label for="yearfrom" class="col-sm-3 control-label">Year From</label>
          <div class="col-sm-9">
      <input name="yearfrom" type="date" class="form-control" id="yearfrom" placeholder="" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_experience_yearfrom_2']; ?>" >
       </div>
        </div>

      <div class="form-group">
          <label for="yearto" class="col-sm-3 control-label">Year To</label>
          <div class="col-sm-9">
      <input name="yearto" type="date" class="form-control" id="yearto" placeholder="" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_experience_yearto_2']; ?>" >
       </div>
        </div>  
  
      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <p>
      <input type="hidden" name="oldid" value="<?php echo $editrow['fld_experience_id_2']; ?>">
       <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
      <?php } ?>
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      </div>
      </div>
    </form>
  </div>
  </div>

    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Recently Added</h2>
      </div>

    <div class title=""> 
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for IC No." title="Type in a name">
    </div>
    <br>

      <table class="table table-striped table-bordered" id="myTable">
      <tr>

        <th><center>IC/Passport No.</center></th>
        <th><center>Previous Company</center></th>
        <th><center>Position</center></th>
        <th><center>Year From</center></th>
        <th><center>Year To</center></th>
        
      </tr>
      <?php
      // Read
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_experience_2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>

        <td><?php echo $readrow['fld_experience_ic_2']; ?></td>
        <td><?php echo $readrow['fld_company_2']; ?></td>
        <td><?php echo $readrow['fld_experience_position_2']; ?></td>
        <td><?php echo $readrow['fld_experience_yearfrom_2']; ?></td>
        <td><?php echo $readrow['fld_experience_yearto_2']; ?></td>

        <td>
          <center>     
          <a href="years_of_experience_2.php?edit=<?php echo $readrow['fld_experience_id_2']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="years_of_experience_2.php?delete=<?php echo $readrow['fld_experience_id_2']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
          </center>
          </td>
        </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>

    <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>      

  </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
                  <li ><a href="years_of_experience_2.php?page=4" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <li><a href="years_of_experience_2.php?page=1">1</a></li>
<li><a href="years_of_experience_2.php?page=2">2</a></li>
<li><a href="years_of_experience_2.php?page=3">3</a></li>
<li><a href="years_of_experience_2.php?page=4">4</a></li>  
  <li class="disabled"><a href="years_of_experience_2.php?page=6" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul>
      </nav>
    </div>
  </div>

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