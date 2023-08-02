<?php
// Assuming you have already connected to the database and initialized the $conn variable

require('./fpdf186/fpdf.php');

class PDF extends FPDF
{
  // Page header
  function Header()
  {
    // Add an image or any header content if needed
  }

  // Page footer
  function Footer()
  {
    // Add a footer content if needed
  }
}

// Create a new PDF object
$pdf = new PDF("P", "mm", "A4");
$pdf->AddPage();

// Set font and table header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, '#', 1);
$pdf->Cell(40, 10, 'Job Title', 1);
$pdf->Cell(30, 10, 'Industry', 1);
$pdf->Cell(25, 10, 'Job Type', 1);
$pdf->Cell(35, 10, 'Salary (৳)', 1);
$pdf->Cell(30, 10, 'Location', 1);
$pdf->Cell(30, 10, 'City', 1);
$pdf->Cell(40, 10, 'Posted By', 1);
$pdf->Ln();

$conn = mysqli_connect("localhost", "root", "", "jobportal");

// Fetch data from the database
$sql = "SELECT * FROM job_post";
$query = $conn->query($sql);
$i = 1;

// Loop through the data and populate the table rows
while ($row = $query->fetch_assoc()) {
  //getting other details
  $job_id = $row['id_jobpost'];
  //city
  $city_id = $row['city_id'];
  $city_id = $conn->query("SELECT name FROM districts_or_cities WHERE id = '$city_id'");
  $city_id = $city_id->fetch_row();

  //region
  $state_id = $row['state_id'];
  $state_id = $conn->query("SELECT name FROM states WHERE id = '$state_id'");
  $state_id = $state_id->fetch_row();

  // industry
  $industry = $row['industry_id'];
  $industry = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
  $industry = $industry->fetch_row();

  //job status
  $job_status = $row['job_status'];
  $job_status = $conn->query("SELECT type FROM job_type WHERE id = '$job_status'");
  $job_status = $job_status->fetch_row();

  //company
  $company = $row['id_company'];
  $company = $conn->query("SELECT companyname FROM company WHERE id_company = '$company'");
  $company = $company->fetch_row();

  // Populate the PDF with data
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(10, 10, $i, 0, 1, 'C');
  $pdf->Cell(40, 10, $row['jobtitle'], 0, 1, 'C');
  $pdf->Cell(30, 10, $industry[0], 0, 1, 'C');
  $pdf->Cell(25, 10, $job_status[0], 0, 1, 'C');
  $pdf->Cell(35, 10, $row['minimumsalary'] . " - " . $row['maximumsalary'], 0, 1, 'C');
  $pdf->Cell(30, 10, $state_id[0], 0, 1, 'C');
  $pdf->Cell(30, 10, $city_id[0], 0, 1, 'C');
  $pdf->Cell(40, 10, $company[0], 0, 1, 'C');
  $pdf->Ln();
  $i++;
}

// Output the PDF
$pdf->Output();
