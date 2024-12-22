<?php
session_start();
require_once('assets/constants/config.php');
require_once('assets/constants/fetch-my-info.php');
?>

<?php
$sql = "SELECT * FROM manage_website where status='0'";
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
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .footer {
            border-top: 1px solid rgba(152, 166, 173, .2);
            padding: 14px 30px 14px;
            /*position: absolute; bottom: 0;*/
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


<body style="background-image: url('assets/uploadImage/Logo/<?php echo $background_login_image; ?>');" style="  background-repeat: no-repeat;
  background-size: auto;">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
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
                        <input class="form-control form-control-lg" id="inputField1" type="text" placeholder="Email" autocomplete="off" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="inputField2" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox">
                            <span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-links">
        Copyright © 2024 Project Development by <a href="https://github.com/Shafat21">Shafat</a> and <a href="https://github.com/CodeWizardOve">Ove</a>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script src="admin/https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
