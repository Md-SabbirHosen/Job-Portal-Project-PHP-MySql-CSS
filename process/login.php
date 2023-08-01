<?php
include '../includes/session.php';

// login button clicked
if (isset($_POST['loginbtn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $acctype = $_POST['acctype'];


  // getting role id
  if ($acctype === "Applicant") {
    $acctype = 1;
  } elseif ($acctype === "Employer") {
    $acctype = 2;
  } else {
    $acctype = 3;
  }

  // if it does not exist... register user
  if ($acctype == 1) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
  } else {
    $sql = "SELECT * FROM company WHERE email = '$email'";
  }

  $query = $conn->query($sql);

  if ($query->num_rows < 1) {
    $_SESSION['message'] = 'Cannot find account with this details - Check if email is exist';
    $_SESSION['messagetype'] = 'warning';
    header('location: ../login.php');
    exit();
  } else {
    $row = $query->fetch_assoc();
    if (password_verify($password, $row['password']) && $row['email'] == $email) {
      $_SESSION['email'] = $row['email'];
      $_SESSION['role_id'] = $row['role_id'];
      $_SESSION['lastActive'] = time();

      // if a job seeker
      if ($row['role_id'] == 1) : {
          $_SESSION['id_user'] = $row['id_user'];
          // if profile details are yet to be updated
          if (
            $row['headline'] == '' || $row['contactno'] == '' || $row['dob'] == '' || $row['gender'] == '' || $row['state_id'] == '' ||
            $row['city_id'] == '' || $row['address'] == '' || $row['career_id'] == '' || $row['education_id'] == ''
          ) {
            header('location: ../index.php');
            exit();
          } else {
            $_SESSION['message'] = 'You have logged in successfully';
            $_SESSION['messagetype'] = 'success';
            header('location :../index.php');
            exit();
          }
        }
      endif;
      if ($row['role_id'] == 2) : {
          $_SESSION['id_company'] = $row['id_company'];
          //if profile details are yet to be updated
          if ($row['aboutme'] == '' || $row['industry_id'] == ''  || $row['contactno'] == ''  || $row['esta_date'] == '' || $row['empno'] == ''  || $row['state_id'] == '' || $row['city_id'] == ''  || $row['address'] == '') {
            $_SESSION['message'] = 'You have logged in successfully. Click on Edit Details to update your profile..';
            $_SESSION['messagetype'] = 'success';
            header('location: ../index.php');
            exit();
          } else {
            $_SESSION['message'] = 'You have logged in successfully';
            $_SESSION['messagetype'] = 'success';
            header('location: ../index.php');
          }
        }
      endif;
      if ($row['role_id'] == 3) :
        $_SESSION['id_admin'] = $row['id_admin'];
        // if profile details are yet to be updated
        if ($row['fullname'] == ''  || $row['gender'] == ''  || $row['dob'] == '' || $row['address'] == '') {
          $_SESSION['message'] = 'You have logged in successfully. Click on Edit Details to update your profile.';
          $_SESSION['messagetype'] = 'success';
          header('location: ../index.php');
          exit();
        } else {
          $_SESSION['message'] = 'You have logged in successfully.';
          $_SESSION['messagetype'] = 'success';
          header('location: ../index.php');
          exit();
        }
      endif;
    } else {
      $_SESSION['message'] = 'Email or Password is Incorrect!';
      $_SESSION['messagetype'] = 'warning';
      header('location: ../login.php');
      exit();
    }
  }
} else {
  $_SESSION['message'] = 'Email or Password is Incorrect!';
  $_SESSION['messagetype'] = 'warning';
  header('location: ../login.php');
  exit();
}
