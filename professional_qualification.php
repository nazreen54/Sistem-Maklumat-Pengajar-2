<?php
  include_once 'professional_qualification_crud.php';
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
        <h2>Professional Qualification 1</h2>
      </div>

    <div class="btn-group">
      <button class="btn btn-primary btn-sm" onclick="window.location.href='professional_qualification.php'">1</button>
      <button class="btn btn-primary btn-sm" onclick="window.location.href='professional_qualification_2.php'">2</button>
      <button class="btn btn-primary btn-sm" onclick="window.location.href='professional_qualification_3.php'">3</button>
      <button class="btn btn-primary btn-sm" onclick="window.location.href='professional_qualification_4.php'">4</button>
    </div>  

    <form action="professional_qualification.php" method="post" class="form-horizontal">
      
      <div class="form-group">
          <label for="id" class="col-sm-3 control-label" hidden>ID</label>
          <div class="col-sm-9">
      <input name="id" type="hidden" placeholder="Automatically Generate, Please Do Not Fill" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_professional_id']; ?>"> <br>
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
        <?php if((isset($_GET['edit'])) && ($editrow['fld_professional_ic']==$staffrow['fld_trainer_ic'])) { ?>
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
          <label for="qualification" class="col-sm-3 control-label">Professional Qualification</label>
          <div class="col-sm-9">
      <input name="qualification" type="text" class="form-control" id="qualification" placeholder="Insert Qualification" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_professional_qualification']; ?>" required>
       </div>
        </div>
     
 <div class="form-group">
          <label for="body" class="col-sm-3 control-label">Certification Body</label>
          <div class="col-sm-9">
      <input name="body" type="text" class="form-control" id="body" placeholder="Insert Name of Certification Body" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_professional_body']; ?>" required>
       </div>
        </div>

    <div class="form-group">
          <label for="yearawarded" class="col-sm-3 control-label">Year Awarded</label>
          <div class="col-sm-9">
      <input name="yearawarded" type="date" class="form-control" id="yearawarded" placeholder="" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_professional_yearawarded']; ?>" required>
       </div>
        </div>

      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <p>
      <input type="hidden" name="oldid" value="<?php echo $editrow['fld_professional_id']; ?>">
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
        <th><center>Professional Qualification</center></th>
        <th><center>Certification Body</center></th>
        <th><center>Year Awarded</center></th>
       
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
          $stmt = $conn->prepare("SELECT * FROM tbl_professional_qualification");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>

        <td><?php echo $readrow['fld_professional_ic']; ?></td>
        <td><?php echo $readrow['fld_professional_qualification']; ?></td>
        <td><?php echo $readrow['fld_professional_body']; ?></td>
        <td><?php echo $readrow['fld_professional_yearawarded']; ?></td>

        <td>
          <center> 
          <a href="professional_qualification.php?edit=<?php echo $readrow['fld_professional_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="professional_qualification.php?delete=<?php echo $readrow['fld_professional_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
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
                  <li ><a href="professional_qualification.php?page=4" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <li><a href="professional_qualification.php?page=1">1</a></li>
<li><a href="professional_qualification.php?page=2">2</a></li>
<li><a href="professional_qualification.php?page=3">3</a></li>
<li><a href="professional_qualification.php?page=4">4</a></li>  
  <li class="disabled"><a href="professional_qualification.php?page=6" aria-label="Next"><span aria-hidden="true">»</span></a></li>
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