<?php
include "config.php"; 

$subject = $_POST['subject'];
$topic = $_POST['topic'];
$description = $_POST['description'];

$targetDir = "studyMaterial/";
$filename = basename($_FILES["pdfFile"]["name"]);
$targetFile = $targetDir . time() . "_" . bin2hex(random_bytes(5)) . "_" . $filename; 
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

if ($fileType != "pdf") {
    die("Only PDF files are allowed.");
}

if ($_FILES["pdfFile"]["size"] > 10* 1024 * 1024) { 
    die("File is too large. Maximum allowed size is 5MB.");
}

if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
    $stmt = $con->prepare("INSERT INTO study_material (subject, topic, description, file_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $subject, $topic, $description, $targetFile);
    
    if ($stmt->execute()) {
        echo "<script>alert('uploded successfully!'); window.location.href='PostStudyMaterial.html';</script>";
    } else {
        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error uploading file.";
}

$con->close();
?>
