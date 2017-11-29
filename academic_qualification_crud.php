<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_academic_qualification(fld_academic_id, fld_academic_ic, fld_academic_qualification, fld_academic_institute, fld_academic_yearawarded) VALUES(:id, :ic, :qualification, :institute, :yearawarded)");

    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $stmt->bindParam(':qualification', $qualification, PDO::PARAM_STR);
    $stmt->bindParam(':institute', $institute, PDO::PARAM_STR);
    $stmt->bindParam(':yearawarded', $yearawarded, PDO::PARAM_STR);
       
    $id = $_POST['id'];   
    $ic = $_POST['ic'];
    $qualification = $_POST['qualification'];
    $institute = $_POST['institute'];
    $yearawarded =  $_POST['yearawarded'];
         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_academic_qualification SET
      fld_academic_id = :id,
       fld_academic_ic = :ic, 
       fld_academic_qualification = :qualification,
      fld_academic_institute = :institute, 
      fld_academic_yearawarded = :yearawarded
      WHERE fld_academic_id = :oldid");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $stmt->bindParam(':qualification', $qualification, PDO::PARAM_STR);
    $stmt->bindParam(':institute', $institute, PDO::PARAM_STR);
    $stmt->bindParam(':yearawarded', $yearawarded, PDO::PARAM_STR);
    $stmt->bindParam(':oldid', $oldid, PDO::PARAM_STR);
       
    $id = $_POST['id'];    
    $ic = $_POST['ic'];
    $qualification = $_POST['qualification'];
    $institute = $_POST['institute'];
    $yearawarded = $_POST['yearawarded'];

    $oldid = $_POST['oldid'];
         
    $stmt->execute();
 
    header("Location: academic_qualification.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_academic_qualification where fld_academic_id = :id");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
       
    $id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: academic_qualification.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_academic_qualification where fld_academic_id = :id");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
       
    $id = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
 
?>