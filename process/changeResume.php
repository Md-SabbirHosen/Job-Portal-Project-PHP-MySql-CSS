<?php
include "../includes/session.php";

if (isset($_POST['changeResume'])) {
  $email = $_SESSION['email'];
  $resume = $_FILES['resume']['name'];

  //hash email 
  $hash = md5($email);
  $filename = $hash . $resume;

  if ($resume != '') {
    if (move_uploaded_file($_FILES['resume']['tmp_name'], '../assets/resume/' . $filename)) {
      $sql = "UPDATE users SET resume = '$filename' WHERE email = '$email'";
      if ($conn->query($sql)) {
        $_SESSION['message'] = 'Resume updated successfully';
        $_SESSION['messagetype'] = 'success';
      } else {
        $_SESSION['message'] = $conn->error;
        $_SESSION['messagetype'] = 'warning';
      }
    } else {
      $_SESSION['message'] = "There was an error, file couldn't be uploaded";
      $_SESSION['messagetype'] = 'warning';
    }
  }
}

header('location: ../dashboard/myResume.php');
exit();
