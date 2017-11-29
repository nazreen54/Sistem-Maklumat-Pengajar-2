<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <a class="btn" href="home.php"><img src="image/logo_ikbn.png" alt="IKBN HRDF" height="40" width="100" ></a>
        </div>
         </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">  
    <a onclick="myFunction_2()"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Help?</a>
  </li>

      <script>
function myFunction_2() {
    window.open("help.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=600");
}
</script>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-th"></span>&nbsp;Menu&nbsp;<span class="caret"></span></a> 
                <ul class="dropdown-menu">  
      <li><a href="maklumat.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Trainer Details</a></li>
      <li><a href="academic_qualification.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Academic Qualification</a></li>
      <li><a href="professional_qualification.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Professional Qualification</a></li>
      <li><a href="years_of_experience.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Years of Career Experience</a></li>
      <li><a href="training.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Training Experience</a></li>
      <li><a href="references.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; References</a></li>
      <li><a href="image_upload.php"><span class="glyphicon glyphicon-upload"></span>&nbsp; Upload Profile Picture</a></li>
    </ul>
  </li>

        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-folder-open"></span>&nbsp; Resume&nbsp;<span class="caret"></span></a> 
                <ul class="dropdown-menu">  
      <li><a class="glyphicon glyphicon-search" href="search_2.php"> Search</a></li>
      <li><a class="glyphicon glyphicon-th-list" href="search.php"> List of Trainers</a></li>

      </ul>
      </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="profile.php"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View Account Detail</a></li>  
              <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>