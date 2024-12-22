<?php
// Include necessary files
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

// Fetch website management data securely
$sql = "SELECT * FROM manage_website WHERE status = ?";
$statement = $conn->prepare($sql);
$statement->execute([0]);
$row = $statement->fetch(PDO::FETCH_ASSOC);

// Extract variables for direct usage
$login_logo = $row['login_logo'] ?? 'default_logo.svg'; // Default value if not found
$title = $row['title'] ?? 'Dashboard'; // Default value if not found
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../assets/uploadImage/Logo/Shafat.svg" type="image/x-icon">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Inline CSS for print handling -->
    <style>
        @media print {
            #printbtn {
                display: none;
            }
        }
    </style>

    <title><?= htmlspecialchars($title); ?></title>
</head>
