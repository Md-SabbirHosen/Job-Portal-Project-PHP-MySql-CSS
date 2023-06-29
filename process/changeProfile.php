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
  $career = $_POST['career'];
  $skills = $_POST['skills'];



  $sql = "UPDATE users SET fullname='$fullName',email='$email',address='$address',headline='$headline',city_id='$city',state_id='$region',contactno='$phoneNo', career_id='$career', education_id='$education',dob='$dob',aboutme='$aboutme',skills='$skills',gender='$gender' WHERE email = '$email'";

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


header('location: ../dashboard/editProfile.php');
exit();
