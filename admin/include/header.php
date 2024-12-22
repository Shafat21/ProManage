<?php
// Include necessary files
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/config.php');
require_once('../assets/constants/fetch-my-info.php');

// Fetch admin details securely
$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch website management data
$sql = "SELECT * FROM manage_website WHERE status = 0";
$statement = $conn->prepare($sql);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);

// Use variables directly
$login_logo = $row['login_logo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="assets/uploadImage/Logo/Shafat.svg" type="image/x-icon">
    <!-- Include Bootstrap CSS or any required CSS -->
</head>
<body>
    <!-- Main Wrapper -->
    <div class="dashboard-main-wrapper">
        <!-- Navbar -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">
                    <img class="img-fluid" src="../assets/uploadImage/Logo/<?= htmlspecialchars($login_logo); ?>" 
                         style="width:220px;height:auto;" alt="Theme-Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="profile.php" id="navbarDropdownMenuLink2" 
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/uploadImage/Profile/<?= htmlspecialchars($result['image']); ?>" 
                                     alt="Profile Image" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        <?= htmlspecialchars($result['fname']); ?> <?= htmlspecialchars($result['lname']); ?>
                                    </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-2"></i>Profile</a>
                                <a class="dropdown-item" href="change_pass.php"><i class="fas fa-cog mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>
