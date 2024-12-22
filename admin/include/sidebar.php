<?php
// Include required files
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

// Fetch Admin Details
$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch Roles and Permissions
$stmt = $conn->prepare("SELECT * FROM `permission_role` WHERE group_id = ?");
$stmt->execute([$admin['role_id']]);
$roles = $stmt->fetchAll();
$setroles = array();

foreach ($roles as $role) {
    $stmt = $conn->prepare("SELECT * FROM `permissions` WHERE id = ?");
    $stmt->execute([$role['permission_id']]);
    $per = $stmt->fetchAll();
    if (!empty($per)) {
        array_push($setroles, $per[0]['name']);
    }
}
$_SESSION['userroles'] = $setroles;
$userroles = $_SESSION['userroles'];
?>

<!-- Sidebar for Admin Users -->
<?php if ($admin['admin_user'] == '1') { ?>
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">Menu</li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View_user.php"><i class="fa fa-user-plus"></i>Employee Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View_Role.php"><i class="fa fa-credit-card"></i>Role Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_leaves.php"><i class="mdi mdi-calendar"></i>Leaves Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_salary.php"><i class="fa fa-credit-card"></i>Salary Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="backup/restore_backup.php"><i class="fab fa-stack-exchange"></i>Restore Backup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="backup/backups.php"><i class="fab fa-stack-exchange"></i>Backup Database</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fas fa-lock"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php } ?>

<!-- Sidebar for Non-Admin Users -->
<?php if ($admin['admin_user'] == '0') { ?>
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">Menu</li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    <?php if (isset($userroles)) { ?>
                        <?php if (in_array('User', $userroles)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="View_user.php"><i class="fa fa-user-plus"></i>User Management</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array('Role', $userroles)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="View_Role.php"><i class="fa fa-credit-card"></i>Role Management</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array('Backup Database', $userroles)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="backup/restore_backup.php"><i class="fab fa-stack-exchange"></i>Restore Backup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="backup/backups.php"><i class="fab fa-stack-exchange"></i>Backup Database</a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fas fa-lock"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php } ?>
