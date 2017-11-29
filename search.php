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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>welcome - <?php print($userRow['user_name']); ?></title>
</head>
<body>
    <?php include_once 'nav_bar_3.php'; ?>
    <div class="container-fluid">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

    <form action="search.php" method="post" class="form-horizontal">
           
    </form>
  </div>
  </div>


    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>All Trainers</h2>
      </div>
    <div class title=""> 
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for Names.." title="Type in a name">
    </div>
    
    <br>
      <table class="table table-striped table-bordered" id="myTable">
      <tr>

        <th><center>Name</center></th>
        <th><center>Nationality</center></th>
        <th><center>IC/Passport No.</center></th>
        <th><center>Race</center></th>
        
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
          $stmt = $conn->prepare("SELECT * FROM tbl_maklumat_pengajar ORDER BY fld_trainer_register DESC");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>

        <td><?php echo $readrow['fld_trainer_name']; ?></td>
        <td><?php echo $readrow['fld_trainer_nationality']; ?></td>
        <td><?php echo $readrow['fld_trainer_ic']; ?></td>
        <td><?php echo $readrow['fld_trainer_race']; ?></td>

        <td>
          <a href="search_details.php?ic=<?php echo $readrow['fld_trainer_ic']; ?>" class="btn btn-warning btn-xs" role="button">View</a>     
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
                  <li ><a href="search.php?page=4" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <li><a href="search.php?page=1">1</a></li>
<li><a href="search.php?page=2">2</a></li>
<li><a href="search.php?page=3">3</a></li>
<li><a href="search.php?page=4">4</a></li>  
  <li class="disabled"><a href="search.php?page=6" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul>
      </nav>
    </div>
  </div>

</div>

   <!-- Footer -->
<footer class="footer-distributed">

    <div class="footer-center">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>      

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