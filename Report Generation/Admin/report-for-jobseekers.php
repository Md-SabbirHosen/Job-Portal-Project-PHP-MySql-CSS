<?php
require_once('../../tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Jobseekers Report');
$pdf->SetSubject('Jobseekers Data');
$pdf->SetKeywords('TCPDF, Jobseekers, Report');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Add headline
$pdf->Cell(0, 10, 'Jobseekers Report', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 12);

// Fetch data from the database
$conn = mysqli_connect(
  "localhost",
  "root",
  "",
  "jobportal"
);
$sql =  "SELECT * FROM users ORDER BY id_user DESC";
$query = $conn->query($sql);

// Initialize counter
$i = 1;

// Define content variable
$content = '';

// Define table headers
$headers = '<tr>
              <th style="width: 20px;font-weight:bold;">#</th>
              <th style="font-weight:bold;">Fullname</th>
              <th style="font-weight:bold;">Gender</th>
              <th style="font-weight:bold;">Telephone</th>
              <th style="font-weight:bold;">Education</th>
              <th style="font-weight:bold;">Division</th>
              <th style="font-weight:bold;">City</th>
              <th style="font-weight:bold;">Address</th>
            </tr>';

while ($row = $query->fetch_assoc()) {
  // Fetch other details using separate queries
  $education_result = $conn->query("SELECT name FROM education WHERE id = '{$row['education_id']}'");
  $education = $education_result->fetch_row();
  $education = isset($education[0]) ? $education[0] : 'unknown';

  $city_result = $conn->query("SELECT name FROM districts_or_cities WHERE id = '{$row['city_id']}'");
  $city_id = $city_result->fetch_row();
  $city_id = isset($city_id[0]) ? $city_id[0] : 'unknown';

  $state_result = $conn->query("SELECT name FROM states WHERE id = '{$row['state_id']}'");
  $state_id = $state_result->fetch_row();
  $state_id = isset($state_id[0]) ? $state_id[0] : 'unknown';

  // Add table row to content
  $content .= '<tr>
                    <td style="padding: 5px;">' . $i . '</td>
                    <td style="padding: 5px;">' . $row['fullname'] . '</td>
                    <td style="padding: 5px;">' . (isset($row['gender']) ? $row['gender'] : 'unknown') . '</td>
                    <td style="padding: 5px;">' . (isset($row['contactno']) ? $row['contactno'] : 'unknown') . '</td>
                    <td style="padding: 5px;">' . (isset($education) ? $education : 'unknown') . '</td>
                    <td style="padding: 5px;">' . (isset($state_id) ? $state_id : 'unknown') . '</td>
                    <td style="padding: 5px;">' . (isset($city_id) ? $city_id : 'unknown') . '</td>
                    <td style="padding: 5px;">' . (isset($row['address']) ? $row['address'] : 'unknown') . '</td>
                </tr>';
  $i++;
}

// Define the table structure
$table = '<table border="1" cellpadding="5">' . $headers . $content . '</table>';

// Print table into PDF using writeHTML method
$pdf->writeHTML($table);

// Close and output PDF document
$pdf->Output('jobseekers_report.pdf', 'I');
