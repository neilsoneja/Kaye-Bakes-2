<?php
session_start();

$_SESSION['upload-message']="";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $_SESSION['upload-message']= "File is not an image.";
    $uploadOk = 0;
    echo "<script> location.href='/Kaye-Bakes-2/account/customize-order-new.php'; </script>";
    exit;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $_SESSION['upload-message']= "Sorry, file already exists.";
  $uploadOk = 0;
  echo "<script> location.href='/Kaye-Bakes-2/account/customize-order-new.php'; </script>";
  exit;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  $_SESSION['upload-message']= "Sorry, your file is too large.";
  $uploadOk = 0;
  echo "<script> location.href='/Kaye-Bakes-2/account/customize-order-new.php'; </script>";
  exit;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  $_SESSION['upload-message']= "Sorry, only JPG, JPEG, & PNG files are allowed.";
  $uploadOk = 0;
  echo "<script> location.href='/Kaye-Bakes-2/account/customize-order-new.php'; </script>";
  exit;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {

    //renaming
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);

    if (isset($_SESSION['uploadNumber'])){
      
      $_SESSION['uploadNumber']+=1;
    }
    else {
      $_SESSION['uploadNumber']=1;
    }
    /*$newfilename= random_bytes(20);
    $newfilename = $newfilename . '.' . end($temp);*/
    $newfilename = strval($_SESSION['uploadNumber']) . '.' . end($temp);
  
    //setting name as session var for search  
    $_SESSION['query-filename'] = $newfilename;
  
  
    /*/clearing upload folder
    array_map('unlink', array_filter(
      (array) array_merge(glob("uploads/*"))));*/
  
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/".$newfilename)) {    
      //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded."; 
      echo "<script> location.href='/Kaye-Bakes-2/account/Dhash/search-results-new.php'; </script>";
      exit;  
      }
    else {
      $_SESSION['upload-message']= "Sorry, there was an error uploading your file.<br>Please try again.";}
      echo "<script> location.href='/Kaye-Bakes-2/account/customize-order-new.php'; </script>";
      exit;


  
}

else {
  $_SESSION['upload-message']= "Sorry, an error occured. Your file was not uploaded. <br> Please try again.";
}

?>