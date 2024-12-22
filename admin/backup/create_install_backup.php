<?php
// Include required files
require_once('../../assets/constants/config.php');
require_once('../../assets/constants/check-login.php');

// Ensure session is active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure database connection is initialized
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch the admin user details
if (!isset($_SESSION['id'])) {
    die("Access denied. You are not logged in.");
}

$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
    die("Access denied. Unable to fetch user details.");
}

// Check if the user has admin permissions
if ($admin['admin_user'] == '1') {
    try {
        // Step 1: Ensure the backups directory exists
        $backupDir = "../../backups/";
        if (!is_dir($backupDir)) {
            if (!mkdir($backupDir, 0777, true)) {
                throw new Exception("Failed to create backup directory: $backupDir");
            }
        }

        // Step 2: Database Backup
        $backupFileName = $backupDir . $dbname . "_backup_" . time() . ".sql";
        $sqlScript = "";

        $tables = $conn->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

        foreach ($tables as $table) {
            // Get table structure
            $createTable = $conn->query("SHOW CREATE TABLE $table")->fetch(PDO::FETCH_ASSOC)['Create Table'];
            $sqlScript .= "\n\n$createTable;\n\n";

            // Get table data
            $rows = $conn->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $columns = implode("`, `", array_keys($row));
                $values = implode("', '", array_map(function ($value) use ($conn) {
                    return $conn->quote($value);
                }, array_values($row)));
                $sqlScript .= "INSERT INTO `$table` (`$columns`) VALUES ($values);\n";
            }
            $sqlScript .= "\n";
        }

        file_put_contents($backupFileName, $sqlScript);

        // Step 3: Backup Application Files
        $zipFileName = $backupDir . $dbname . "_files_backup_" . time() . ".zip";
        $zip = new ZipArchive();
        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
            $rootPath = realpath('../../'); // Adjust based on your project structure
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootPath),
                RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($rootPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();
        } else {
            throw new Exception("Unable to create ZIP file.");
        }

        // Step 4: Combine Files and Serve Backup Package
        $backupPackageName = $backupDir . "install_backup_" . time() . ".zip";
        $zip = new ZipArchive();
        if ($zip->open($backupPackageName, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($backupFileName, basename($backupFileName));
            $zip->addFile($zipFileName, basename($zipFileName));
            $zip->close();
        } else {
            throw new Exception("Unable to create final backup package.");
        }

        // Cleanup temporary files
        unlink($backupFileName);
        unlink($zipFileName);

        // Serve the backup package
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backupPackageName));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backupPackageName));
        readfile($backupPackageName);

        // Delete backup package after download
        unlink($backupPackageName);

    } catch (Exception $e) {
        echo "Error creating backup: " . $e->getMessage();
    }
} else {
    echo "You do not have permission to create backups.";
}
?>
