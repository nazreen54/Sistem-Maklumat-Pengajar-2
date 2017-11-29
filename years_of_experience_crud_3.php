<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_experience_3(fld_experience_id_3, fld_experience_ic_3, fld_company_3,   fld_experience_position_3, fld_experience_yearfrom_3,   fld_experience_yearto_3) VALUES(:id, :ic, :company, :position, :yearfrom, :yearto)");

    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $stmt->bindParam(':company', $company, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_STR);
    $stmt->bindParam(':yearfrom', $yearfrom, PDO::PARAM_STR);
    $stmt->bindParam(':yearto', $yearto, PDO::PARAM_STR);
       
    $id = $_POST['id'];   
    $ic = $_POST['ic'];
    $company = $_POST['company'];
    $position = $_POST['position'];
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
 
    $stmt = $conn->prepare("UPDATE tbl_experience_3 SET
      fld_experience_id_3 = :id,
       fld_experience_ic_3 = :ic, 
       fld_company_3= :company,
      fld_experience_position_3 = :position, 
      fld_experience_yearfrom_3 = :yearfrom,
      fld_experience_yearto_3 = :yearto WHERE fld_experience_id_3 = :oldid");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $stmt->bindParam(':company', $company, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_STR);
    $stmt->bindParam(':yearfrom', $yearfrom, PDO::PARAM_STR);
    $stmt->bindParam(':yearto', $yearto, PDO::PARAM_STR);
    $stmt->bindParam(':oldid', $oldid, PDO::PARAM_STR);
       
    $id = $_POST['id'];    
    $ic = $_POST['ic'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $yearfrom = $_POST['yearfrom'];
    $yearto = $_POST['yearto'];
    $oldid = $_POST['oldid'];
         
    $stmt->execute();
 
    header("Location: years_of_experience_3.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_experience_3 where fld_experience_id_3 = :id");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
       
    $id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: years_of_experience_3.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_experience_3 where fld_experience_id_3 = :id");
   
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