<?php
session_start();
require_once('assets/constants/config.php');
require_once('assets/constants/fetch-my-info.php');
?>

<?php
$sql = "SELECT * FROM manage_website WHERE status='0'";
$statement = $conn->prepare($sql);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
extract($row);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="assets/uploadImage/Logo/Shafat.svg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-image: url('assets/uploadImage/Logo/<?php echo $background_login_image; ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .footer {
            border-top: 1px solid rgba(152, 166, 173, .2);
            padding: 14px 30px 14px;
            z-index: 10;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            font-size: 14px;
            color: #333;
        }

        .footer .footer-links:hover a {
            color: #3649f7;
        }
    </style>
</head>

<body>
    <!-- Login Page -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center">
                <a href="../index.php">
                    <img class="img-fluid" src="assets/uploadImage/Logo/<?php echo $logo; ?>" style="width:300px;height:auto;" alt="Theme-Logo" />
                </a>
            </div>
            <div class="card-body">
                <?php require_once('assets/constants/check-reply.php'); ?>

                <form action="assets/app/auth.php" method="POST" autocomplete="OFF">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="inputField1" type="text" placeholder="Email" name="email" value="Shafat.mahtab@gmail.com">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="inputField2" type="password" placeholder="Password" name="password" value="admin">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox">
                            <span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>

                <!-- Demo Login Info -->
                <div class="mt-4 text-center">
                    <p><strong>Demo Login Info:</strong></p>
                    <p>Email: <strong>Shafat.mahtab@gmail.com</strong></p>
                    <p>Password: <strong>admin</strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-links">
            Copyright © 2024 Project Development by <a href="https://github.com/Shafat21">Shafat</a> and <a href="https://github.com/CodeWizardOve">Ove</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
