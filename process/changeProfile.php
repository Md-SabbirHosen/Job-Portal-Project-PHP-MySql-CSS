<?php include "../includes/session.php";

if (isset($_POST['myProfile'])) {
  $fullName = $_POST['fullname'];
  $email = $_POST['email'];
  $aboutme = $_POST['aboutme'];
  $headline = $_POST['headline'];
  $phoneNo = $_POST['phoneno'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $region = $_POST['region'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $education = $_POST['education'];
  $skills = $_POST['skills'];



  $sql = "UPDATE users SET fullname='$fullName',email='$email',address='$address',headline='$headline',city_id='$city',state_id='$region',contactno='$phoneNo',  education_id='$education',dob='$dob',aboutme='$aboutme',skills='$skills',gender='$gender' WHERE email = '$email'";

  if ($conn->query($sql)) {
    echo "Profile Updated successfully!!";
  }
}

if (isset($_POST['companyProfile'])) {
  $companyname = $_POST['companyname'];
  $email = $_POST['email'];
  $aboutme = $_POST['aboutme'];
  $industry = $_POST['industry'];
  $phoneNo = $_POST['phoneno'];
  $esta_date = $_POST['esta_date'];
  $empno = $_POST['empno'];
  $region = $_POST['region'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $website = $_POST['website'];

  $sql = "UPDATE company SET companyname='$companyname',email='$email',address='$address',industry_id='$industry',city_id='$city',state_id='$region',contactno='$phoneNo', website='$website',esta_date='$esta_date',aboutme='$aboutme',empno='$empno' WHERE email = '$email'";

  if ($conn->query($sql)) {
    echo "Profile Updated successfully!!";
  }
}

if (isset($_POST['aProfile'])) {
  $fullname = $_POST['fullname'];
  $email = $_SESSION['email'];
  $phoneno = $_POST['phoneno'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];


  $sql = "UPDATE admin SET fullname='$fullname',email='$email',address='$address',contactno='$phoneno',dob='$dob',gender='$gender' WHERE email = '$email'";
  if ($conn->query($sql)) {
    $_SESSION['message'] = 'Profile Updated successfully!!';
    $_SESSION['messagetype'] = 'success';
  } else {
    $_SESSION['message'] = $conn->error;
    $_SESSION['messagetype'] = 'warning';
  }
}


header('location: ../dashboard/editProfile.php');
exit();
