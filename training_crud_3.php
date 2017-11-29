<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_training_3(fld_training_id_3, fld_training_ic_3, fld_training_program_3, fld_training_yearfrom_3, fld_training_yearto_3) VALUES(:id, :ic, :program, :yearfrom, :yearto)");

    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $stmt->bindParam(':program', $program, PDO::PARAM_STR);
    $stmt->bindParam(':yearfrom', $yearfrom, PDO::PARAM_STR);
    $stmt->bindParam(':yearto', $yearto, PDO::PARAM_STR);
       
    $id = $_POST['id'];   
    $ic = $_POST['ic'];
    $program = $_POST['program'];
    $yearfrom =  $_POST['yearfrom'];
    $yearto = $_POST['yearto'];
         
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
 
    $stmt = $conn->prepare("UPDATE tbl_training_3 SET
      fld_training_id_3 = :id,
       fld_training_ic_3 = :ic, 
       fld_training_program_3 = :program, fld_training_yearfrom_3 = :yearfrom,
      fld_training_yearto_3 = :yearto WHERE fld_training_id_3 = :oldid");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $stmt->bindParam(':program', $program, PDO::PARAM_STR);
    $stmt->bindParam(':yearfrom', $yearfrom, PDO::PARAM_STR);
    $stmt->bindParam(':yearto', $yearto, PDO::PARAM_STR);
    $stmt->bindParam(':oldid', $oldid, PDO::PARAM_STR);
       
    $id = $_POST['id'];    
    $ic = $_POST['ic'];
    $program = $_POST['program'];
    $yearfrom = $_POST['yearfrom'];
    $yearto = $_POST['yearto'];
    $oldid = $_POST['oldid'];
         
    $stmt->execute();
 
    header("Location: training_3.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_training_3 where fld_training_id_3 = :id");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
       
    $id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: training_3.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_training_3 where fld_training_id_3 = :id");
   
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