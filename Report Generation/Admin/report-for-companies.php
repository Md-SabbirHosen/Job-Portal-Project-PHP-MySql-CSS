<?php
require_once('../../tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Company Report');
$pdf->SetSubject('Company Data');
$pdf->SetKeywords('TCPDF, Company, Report');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Add headline
$pdf->Cell(0, 10, 'All Companies', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 12);

// Fetch data from the database
$conn = mysqli_connect(
  "localhost",
  "root",
  "",
  "jobportal"
);
$sql = "SELECT * FROM company";
$query = $conn->query($sql);

// Initialize counter
$i = 1;

// Define content variable
$content = '';

// Define table headers
$headers = '<tr>
              <th style="width:20px;font-weight:bold;">#</th>
              <th style="font-weight:bold;">Company Name</th>
              <th style="font-weight:bold;">Industry</th>
              <th style="font-weight:bold;">Email</th>
              <th style="font-weight:bold;">Telephone</th>
              <th style="font-weight:bold;">Website</th>
              <th style="font-weight:bold;">Division</th>
              <th style="font-weight:bold;">City</th>
              <th style="font-weight:bold;">Address</th>
            </tr>';

while ($row = $query->fetch_assoc()) {
  // Fetch other details using separate queries
  $industry_result = $conn->query("SELECT name FROM industry WHERE id = '{$row['industry_id']}'");
  $industry = $industry_result->fetch_row()[0];

  $city_result = $conn->query("SELECT name FROM districts_or_cities WHERE id = '{$row['city_id']}'");
  $city_id = $city_result->fetch_row()[0];

  $state_result = $conn->query("SELECT name FROM states WHERE id = '{$row['state_id']}'");
  $state_id = $state_result->fetch_row()[0];

  // Add table row to content
  $content .= '<tr>
                    <td style="padding: 5px;">' . $i . '</td>
                    <td style="padding: 5px;">' . $row['companyname'] . '</td>
                    <td style="padding: 5px;">' . $industry . '</td>
                    <td style="padding: 5px;">' . $row['email'] . '</td>
                    <td style="padding: 5px;">' . $row['contactno'] . '</td>
                    <td style="padding: 5px;">' . $row['website'] . '</td>
                    <td style="padding: 5px;">' . $state_id . '</td>
                    <td style="padding: 5px;">' . $city_id . '</td>
                    <td style="padding: 5px;">' . $row['address'] . '</td>
                </tr>';
  $i++;
}

// Define the table structure
$table = '<table border="1" cellpadding="5">' . $headers . $content . '</table>';

// Print table into PDF using writeHTML method
$pdf->writeHTML($table);

// Close and output PDF document
$pdf->Output('company_report.pdf', 'I');
