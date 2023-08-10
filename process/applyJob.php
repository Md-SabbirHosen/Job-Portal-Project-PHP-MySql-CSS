<?php include "../includes/session.php";

if (isset($_GET['id'])) {
  if (!isset($_SESSION['email'])) {
    header("location: ../login.php");
    exit();
  } else {
    $id_jobpost = $_GET['id'];
    $id_company = $_GET['cid'];
    $id_user = $_SESSION['id_user'];
    $createdat = date("Y-m-d");

    $query = $conn->query("SELECT resume from users where id_user = '$id_user'");
    $resume = $query->fetch_assoc();


    if (!$resume['resume']) {
      $_SESSION['message'] = "Please upload your resume first!";
      echo $_SESSION['message'];
      header("location: ../dashboard/myresume.php");
      exit();
    } else {
      $sql = "insert into applied_jobposts (id_jobpost,id_user,id_company,createdat) values('$id_jobpost','$id_user','$id_company','$createdat')";

      $conn->query($sql);
    }

    // Report Generation:

    require_once('../tcpdf/tcpdf.php');

    // Create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Job Application Report');
    $pdf->SetSubject('Job Application Data');
    $pdf->SetKeywords('TCPDF, Job, Application');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', 'B', 16);

    // Add headline
    $pdf->Cell(0, 10, 'Job Application Report', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 12);

    // Fetch Data from the Database:

    // job details
    $sql = "SELECT * FROM job_post WHERE id_jobpost='$id_jobpost'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();


    // company details
    $sql1 = "SELECT * from company where id_company = '$id_company'";
    $query1 = $conn->query($sql1);
    $row1 = $query1->fetch_assoc();

    // state or division info

    $state_id = $row['state_id'];
    $sql2 =  "SELECT * FROM states WHERE id = '$state_id'";
    $query2 = $conn->query($sql2);
    $row2 = $query2->fetch_assoc();

    // district or  city info
    $city_id = $row['city_id'];
    $sql3 =  "SELECT * FROM districts_or_cities WHERE id = '$city_id'";
    $query3 = $conn->query($sql3);
    $row3 = $query3->fetch_assoc();

    // education info
    $education_id = $row['edu_qualification'];
    $sql4 =  "SELECT * FROM education WHERE id = '$education_id'";
    $query4 = $conn->query($sql4);
    $row4 = $query4->fetch_assoc();

    //job status
    $job_status = $row['job_status'];
    $jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$job_status'");
    $jobtype = $jobtype->fetch_assoc();

    // Fetch user details 
    $sql5 = "SELECT * FROM users WHERE id_user = '$id_user'";
    $query5 = $conn->query($sql5);
    $row5 = $query5->fetch_assoc();

    // Fetch industry details;
    $industry_id = $row['industry_id'];
    $industry = $conn->query("SELECT name from industry where id = '$industry_id'");
    $industry = $industry->fetch_assoc();

    // Generate content
    $content = "


                                                                  Job Details
                                                                      --------



    Job Title : {$row['jobtitle']}
    Job-Category : {$industry['name']}
    Salary(Tk.) : {$row['minimumsalary']} - {$row['maximumsalary']}
    Company Name : {$row1['companyname']}
    State/Division : {$row2['name']}
    District/City : {$row3['name']}
    Educational Requirement : {$row4['name']}
    Job Type : {$jobtype['type']}


    -------------------------------------------------------------------------------------------------------------------------------


                                                            Applicants Details
                                                                  -------------



    Fullname : {$row5['fullname']}
    Email : {$row5['email']}
    Gender : {$row5['gender']}
    Contact : {$row5['contactno']}
    Date-Of-Birth : {$row5['dob']}
    Address : {$row5['address']}
";

    // Add content to PDF
    $pdf->MultiCell(0, 10, $content);

    // Close and output PDF document
    $pdf->Output('job_application_report.pdf', 'I');
  }
  header('location: ../jobDetails.php?key=' . md5($id_jobpost) . '&id=' . $id_jobpost . '');
}
