<?php
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//Create
if (isset($_POST['create'])) {
  
  try {
    
    $stmt = $conn->prepare("INSERT INTO tbl_maklumat_pengajar(fld_trainer_id, fld_trainer_name, fld_trainer_nationality, fld_trainer_ic, fld_trainer_race, fld_trainer_mobile, fld_trainer_office, fld_trainer_email, fld_trainer_fax, fld_trainer_image) VALUES(:id, :name, :nationality, :ic, :race,
      :mobile, :office, :email, :fax, :photo)");

    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);
    $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $stmt->bindParam(':race', $race, PDO::PARAM_STR);
    $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $stmt->bindParam(':office', $office, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':fax', $fax, PDO::PARAM_STR);
    $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
           
    $id = $_POST['id'];   
    $name = $_POST['name'];
    $nationality = $_POST['nationality'];
    $ic = $_POST['ic'];
    $race =  $_POST['race'];
    $mobile = $_POST['mobile'];
    $office = $_POST['office'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];
    $photo = $_POST['photo'];
 
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
 
    $stmt = $conn->prepare("UPDATE tbl_maklumat_pengajar SET
      fld_trainer_id = :id,
       fld_trainer_name = :name, 
       fld_trainer_nationality = :nationality,
      fld_trainer_ic = :ic, 
      fld_trainer_race = :race,
      fld_trainer_mobile = :mobile, 
      fld_trainer_office = :office, 
      fld_trainer_email = :email, 
      fld_trainer_fax = :fax
      WHERE fld_trainer_id = :oldid");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);
    $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
    $stmt->bindParam(':race', $race, PDO::PARAM_STR);
    $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $stmt->bindParam(':office', $office, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':fax', $fax, PDO::PARAM_STR);
    $stmt->bindParam(':oldid', $oldid, PDO::PARAM_STR);
       
    $id = $_POST['id'];    
    $name = $_POST['name'];
    $nationality = $_POST['nationality'];
    $ic = $_POST['ic'];
    $race = $_POST['race'];
    $mobile = $_POST['mobile'];
    $office = $_POST['office'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];
    $oldid = $_POST['oldid'];
         
    $stmt->execute();
 
    header("Location: maklumat.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_maklumat_pengajar where fld_trainer_id = :id");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
       
    $id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: maklumat.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_maklumat_pengajar where fld_trainer_id = :id");
   
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