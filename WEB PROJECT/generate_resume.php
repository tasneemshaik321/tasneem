<?php
require("C:/xamppp/htdocs/fpdf186/fpdf.php");

// Get form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$education = $_POST['education'] ?? '';
$skills = $_POST['skills'] ?? '';
$experience = $_POST['experience'] ?? '';
$certifications = $_POST['certifications'] ?? '';
$hobbies = $_POST['hobbies'] ?? '';
$links = $_POST['links'] ?? '';
$template = $_POST['template'] ?? 'classic';

// Handle profile photo upload
$photoPath = '';
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $photoPath = 'uploads/' . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
}

$pdf = new FPDF();
$pdf->AddPage();

// Header
$pdf->Cell(0, 10, "Resume", 0, 1, 'C');

// Add profile picture if uploaded
if (!empty($photoPath) && file_exists($photoPath)) {
    $pdf->Image($photoPath, 160, 10, 30, 30);
    $pdf->Ln(35);
} else {
    $pdf->Ln(10);
}

// Basic info
$pdf->SetFont($font, '', 12);
$pdf->SetTextColor(50, 50, 50);
$pdf->Cell(0, 10, "Name: $name", 0, 1);
$pdf->Cell(0, 10, "Email: $email", 0, 1);

// Function to add sections with horizontal lines
function addSection($title, $content, $pdf, $font) {
    if (!empty(trim($content))) {
        $pdf->Ln(5);
        $pdf->SetFont($font, 'B', 13);
        $pdf->SetTextColor(60, 60, 60);
        $pdf->Cell(0, 10, $title, 0, 1);

        $pdf->SetFont($font, '', 12);
        $pdf->SetTextColor(80, 80, 80);
        $pdf->MultiCell(0, 8, $content);

        // Add horizontal line after each section
        $pdf->Ln(5);
        $pdf->SetDrawColor(200, 200, 200);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        $pdf->Ln(10);
    }
}

// Resume sections
addSection("Education", $education, $pdf, $font);
addSection("Skills", $skills, $pdf, $font);
addSection("Experience", $experience, $pdf, $font);
addSection("Certifications", $certifications, $pdf, $font);
addSection("Hobbies", $hobbies, $pdf, $font);
addSection("Links", $links, $pdf, $font);

$pdf->Output("I", "resume.pdf");
?>
