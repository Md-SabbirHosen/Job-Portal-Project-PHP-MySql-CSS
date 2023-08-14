<?php
include "../includes/session.php";

if (isset($_POST['submitJob'])) {
  $id_company = $_SESSION['id_company'];
  $jobtitle = $_POST['jobtitle'];
  $industry = $_POST['industry'];
  $job_type = $_POST['job_type'];
  $experience = $_POST['experience'];
  $edu_qualification = $_POST['edu_qualification'];
  $division_or_state_id = $_POST['division_or_state'];
  $district_or_city_id = $_POST['district_or_city'];
  $minimumsalary = $_POST['minimumsalary'];
  $maximumsalary = $_POST['maximumsalary'];
  $deadline = $_POST['deadline'];
  $skills_ability = $_POST['skills'];
  $description = $_POST['description'];
  $responsibility = $_POST['responsibility'];


  $sql = "INSERT INTO job_post (id_company, jobtitle, industry_id, job_status, description, minimumsalary, maximumsalary, state_id, city_id, experience, skills_ability, edu_qualification, responsibility, deadline) VALUES ('$id_company', '$jobtitle', '$industry', '$job_type', '$description', '$minimumsalary', '$maximumsalary', '$division_or_state_id', '$district_or_city_id', '$experience', '$skills_ability', '$edu_qualification', '$responsibility', '$deadline')";

  if ($conn->query($sql)) {
    echo "Jobs added successfully!";
  }
}

if (isset($_POST['submitJob']) && isset($_GET['id'])) {
  $id_jobpost = $_GET['id'];
  $id_company = $_SESSION['id_company'];
  $jobtitle = $_POST['jobtitle'];
  $industry = $_POST['industry'];
  $job_type = $_POST['job_type'];
  $experience = $_POST['experience'];
  $edu_qualification = $_POST['edu_qualification'];
  $division_or_state_id = $_POST['division_or_state'];
  $district_or_city_id = $_POST['district_or_city'];
  $minimumsalary = $_POST['minimumsalary'];
  $maximumsalary = $_POST['maximumsalary'];
  $deadline = $_POST['deadline'];
  $skills_ability = $_POST['skills'];
  $description = $_POST['description'];
  $responsibility = $_POST['responsibility'];


  $sql = "UPDATE jobpost
        SET
            id_company = '$id_company',
            jobtitle = '$jobtitle',
            industry_id = '$industry',
            job_status = '$job_type',
            experience = '$experience',
            edu_qualification = '$edu_qualification',
            state_id = '$division_or_state_id',
            city_id = '$district_or_city_id',
            minimumsalary = '$minimumsalary',
            maximumsalary = '$maximumsalary',
            deadline = '$deadline',
            skills_ability = '$skills_ability',
            description = '$description',
            responsibility = '$responsibility'
        WHERE
            id_jobpost = '$id_jobpost'";
}

header('Location: ../dashboard/addJob.php');
exit();
