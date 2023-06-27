<?php
include "../includes/session.php";

if (isset($_POST['myPic'])) {
  $email = $_SESSION['email'];
  $profile_pic = $_FILES['picture']['name'];


  //hash email 
  $hash = md5($email);
  $filename = $hash . $profile_pic;

  if ($profile_pic != '') {
    if (move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/images/' . $filename)) {

      $sql = "UPDATE users SET profile_pic = '$filename' WHERE email = '$email'";
      if ($conn->query($sql)) {
        echo "Profile picture is changed!";
      }
    }
  }
}

if (isset($_POST['companyPic'])) {
  $email = $_SESSION['email'];
  $profile_pic = $_FILES['picture']['name'];


  //hash email 
  $hash = md5($email);
  $filename = $hash . $profile_pic;

  if ($profile_pic != '') {
    if (move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/images/' . $filename)) {

      $sql = "UPDATE company SET profile_pic = '$filename' WHERE email = '$email'";
      if ($conn->query($sql)) {
        echo "Profile picture is changed!";
      }
    }
  }
}

header("location: ../dashboard/editProfile.php");
exit();
