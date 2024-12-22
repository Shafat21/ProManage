<?php
// Include required files
require_once('../../assets/constants/config.php');
require_once('../../assets/constants/check-login.php');

// Ensure session is active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize database connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Ensure the user is authorized (admin check)
$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$admin || $admin['admin_user'] != '1') {
    die("You do not have permission to restore backups.");
}

// Process the file upload if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['backup_file']) && $_FILES['backup_file']['error'] == UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES['backup_file']['tmp_name'];

        // Read the contents of the uploaded file
        $sqlContent = file_get_contents($uploadedFile);
        if ($sqlContent === false) {
            die("Failed to read the uploaded backup file.");
        }

        try {
            // Disable foreign key checks for restoration
            $conn->exec("SET FOREIGN_KEY_CHECKS=0");

            // Execute the SQL script line by line
            $queries = explode(";\n", $sqlContent);
            foreach ($queries as $query) {
                $query = trim($query);
                if (!empty($query)) {
                    $conn->exec($query);
                }
            }

            // Re-enable foreign key checks
            $conn->exec("SET FOREIGN_KEY_CHECKS=1");

            $successMessage = "Database restored successfully!";
        } catch (PDOException $e) {
            die("Error restoring the database: " . $e->getMessage());
        }
    } else {
        $errorMessage = "No file uploaded or there was an error uploading the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restore Backup</title>
    <!-- Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Restore Backup</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoreBackupModal">
        Upload and Restore Backup
    </button>

    <!-- Success/Error Messages -->
    <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success mt-3">
            <?php echo $successMessage; ?>
        </div>
    <?php } ?>
    <?php if (isset($errorMessage)) { ?>
        <div class="alert alert-danger mt-3">
            <?php echo $errorMessage; ?>
        </div>
    <?php } ?>

    <!-- Restore Backup Modal -->
    <div class="modal fade" id="restoreBackupModal" tabindex="-1" aria-labelledby="restoreBackupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreBackupModalLabel">Restore Database Backup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="restore_backup.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="backup_file" class="form-label">Select Backup File (.sql)</label>
                            <input type="file" class="form-control" id="backup_file" name="backup_file" accept=".sql" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Restore</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies from CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
