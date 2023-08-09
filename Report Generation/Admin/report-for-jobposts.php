<?php
require_once('../../tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Job Post Report');
$pdf->SetSubject('Job Post Data');
$pdf->SetKeywords('TCPDF, Job, Report');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Add headline
$pdf->Cell(0, 10, 'All Job Posts', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 12);

// Fetch data from the database
$conn = mysqli_connect(
  "localhost",
  "root",
  "",
  "jobportal"
);
$sql = "SELECT * FROM job_post";
$query = $conn->query($sql);

// Initialize counter
$i = 1;

// Define content variable
$content = '';

// Define table headers
$headers = '<tr>
              <th style="width: 20px;font-weight:bold">#</th>
              <th style="font-weight:bold;">Job Title</th>
              <th style="font-weight:bold;">Industry</th>
              <th style="font-weight:bold;">Job Type</th>
              <th style="font-weight:bold;">Salary(Tk.)</th>
              <th style="font-weight:bold;">Division</th>
              <th style="font-weight:bold;">City/District</th>
              <th style="font-weight:bold;">Posted By</th>
            </tr>';

while ($row = $query->fetch_assoc()) {
  // Fetch other details using separate queries
  $industry_result = $conn->query("SELECT name FROM industry WHERE id = '{$row['industry_id']}'");
  $industry = $industry_result->fetch_row()[0];

  $job_status_result = $conn->query("SELECT type FROM job_type WHERE id = '{$row['job_status']}'");
  $job_status = $job_status_result->fetch_row()[0];

  $state_result = $conn->query("SELECT name FROM states WHERE id = '{$row['state_id']}'");
  $state_id = $state_result->fetch_row()[0];

  $city_result = $conn->query("SELECT name FROM districts_or_cities WHERE id = '{$row['city_id']}'");
  $city_id = $city_result->fetch_row()[0];

  $company_result = $conn->query("SELECT companyname FROM company WHERE id_company = '{$row['id_company']}'");
  $company = $company_result->fetch_row()[0];

  // Add table row to content
  $content .= '<tr style="background-color: ' . ($i % 2 === 0 ? '#f2f2f2' : '#ffffff') . ';">
                    <td style="padding: 5px;">' . $i . '</td>
                    <td style="padding: 5px;">' . $row['jobtitle'] . '</td>
                    <td style="padding: 5px;">' . $industry . '</td>
                    <td style="padding: 5px;">' . $job_status . '</td>
                    <td style="padding: 5px;">' . $row['minimumsalary'] . ' - ' . $row['maximumsalary'] . '</td>
                    <td style="padding: 5px;">' . $state_id . '</td>
                    <td style="padding: 5px;">' . $city_id . '</td>
                    <td style="padding: 5px;">' . $company . '</td>
                </tr>';
  $i++;
}

// Define the table structure
$table = '<table border="1" cellpadding="5" style="border-collapse: collapse; width: 100%;">' . $headers . $content . '</table>';

// Print table into PDF using writeHTML method
$pdf->writeHTML($table);

// Close and output PDF document
$pdf->Output('job_post_report.pdf', 'I');
