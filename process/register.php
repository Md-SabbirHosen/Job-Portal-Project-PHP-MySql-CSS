<?php
include "../includes/session.php";

if (isset($_POST['registerbtn'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $acctype = $_POST['acctype'];
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_DEFAULT);
  $createdat = date('Y-m-d');


  //getting role id
  if ($acctype === "Applicant") {
    $acctype = 1;
  } else {
    $acctype = 2;
  }

  //checking if email already exists
  if ($acctype == 1) {
    $sql = "SELECT * FROM users WHERE email='$email'";
  } else {
    $sql = "SELECT * FROM company WHERE email='$email'";
  }
  $query = $conn->query($sql);
  if ($query->num_rows > 0) {
    $_SESSION['message'] = 'Email Address Already Exits!! Please Login.!';
    $_SESSION['messagetype'] = 'warning';
    header('location: ../login.php');
    exit();
  } else {
    //if it does not exist... register user
    if (
      $acctype == 1
    ) {
      $sql = "INSERT INTO users (fullname, email, role_id, password, createdat) VALUES ('$fullname', '$email', '$acctype', '$password', '$createdat')";
    } else {
      $sql = "INSERT INTO company (companyname, email, role_id, password, createdat) VALUES ('$fullname', '$email', '$acctype', '$password', '$createdat')";
    }

    if ($conn->query($sql)) {
      header('location: ../login.php');
      exit();
    } else {
      header('location: ../register.php');
      exit();
    }
  }
} else {
  $_SESSION['message'] = 'Fill all information';
  $_SESSION['messagetype'] = 'warning';
  header('location: ../register.php');
  exit();
}
