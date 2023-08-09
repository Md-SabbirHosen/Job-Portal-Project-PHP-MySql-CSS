<?php
require_once('../../tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Admin Report');
$pdf->SetSubject('Admin Data');
$pdf->SetKeywords('TCPDF, Admin, Report');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Add headline
$pdf->Cell(0, 10, 'Admin Report', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 12);

// Fetch data from the database
$conn = mysqli_connect(
  "localhost",
  "root",
  "",
  "jobportal"
);
$sql =  "SELECT * FROM admin";
$query = $conn->query($sql);

// Initialize counter
$i = 1;

// Define content variable
$content = '';

// Define table headers with enhanced styling
$headers = '<tr style="background-color: #f2f2f2;">
              <th style="width: 20px;font-weight:bold;">#</th>
              <th style="font-weight:bold;">Fullname</th>
              <th style="font-weight:bold;">Email</th>
              <th style="font-weight:bold;">Gender</th>
              <th style="font-weight:bold;">Contact</th>
              <th style="font-weight:bold;">DoB</th>
              <th style="font-weight:bold;">Address</th>
            </tr>';

while ($row = $query->fetch_assoc()) {
  // Add table row to content with alternating row colors
  $content .= '<tr style="background-color: ' . ($i % 2 === 0 ? '#f2f2f2' : '#ffffff') . ';">
                    <td style="padding: 5px;">' . $i . '</td>
                    <td style="padding: 5px;">' . $row['fullname'] . '</td>
                    <td style="padding: 5px;">' . $row['email'] . '</td>
                    <td style="padding: 5px;">' . (isset($row['gender']) ? $row['gender'] : 'unknown') . '</td>
                    <td style="padding: 5px;">' .  (isset($row['contactno']) ? $row['contactno'] : 'unknown')  . '</td>
                    <td style="padding: 5px;">' . (isset($row['dob']) ? $row['dob'] : 'unknown') . '</td>
                    <td style="padding: 5px;">' . (isset($row['address']) ? $row['address'] : 'unknown') . '</td>
                </tr>';
  $i++;
}

// Define the table structure with additional styling
$table = '<table border="1" cellpadding="5" style="border-collapse: collapse; width: 100%;">' . $headers . $content . '</table>';

// Print table into PDF using writeHTML method
$pdf->writeHTML($table);

// Close and output PDF document
$pdf->Output('admin_report.pdf', 'I');
