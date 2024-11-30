<?php 
// Include required files
include('../assets/constants/config.php');
include('../assets/constants/fetch-my-info.php');

// Fetch Salary Data
$sql = "SELECT * FROM salary WHERE `id` = ?";
$statement = $conn->prepare($sql);
$statement->execute([$_POST['id']]);
$row = $statement->fetch();

// Fetch Employee Data
$sql12 = "SELECT * FROM admin WHERE `id` = ?";
$statement12 = $conn->prepare($sql12);
$statement12->execute([$row['emp']]);
$employee = $statement12->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Slip</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        table {
            border: 1px solid #ddd;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        #table2 th {
            text-align: center;
        }

        .highlight {
            background-color: #e9f7df;
        }

        .net-pay {
            background-color: #fff3cd;
            font-weight: bold;
            color: #856404;
        }

        .signature-table th {
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        #btnDownload {
            margin-top: 20px;
        }

        @media print {
            #btnDownload {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Salary Slip Section -->
    <section class="container" id="content-to-print1">
        <table>
            <tr>
                <td><b>Employee Name:</b></td>
                <td>
                    <?php
                        echo $employee['fname'] . ' ' . $employee['lname'];
                    ?>
                </td>
                <td><b>For the Month of:</b></td>
                <td><?php echo $row['month']; ?></td>
            </tr>
            <tr>
                <td><b>Generated In:</b></td>
                <td><?php echo date('F'); ?></td>
            </tr>
            <tr>
                <td><b>Available Leaves:</b></td>
                <td>
                    <?php
                        $availableLeaves = $employee['leavess'] - $row['leave'];
                        echo $availableLeaves;
                    ?>
                </td>
                <td><b>Year:</b></td>
                <td><?php echo $row['year']; ?></td>
            </tr>
            <tr>
                <td><b>Joining Date:</b></td>
                <td><?php echo $employee['created_date_time']; ?></td>
            </tr>
        </table>

        <table id="table2">
            <tr>
                <th colspan="2">EMOLUMENTS</th>
                <th>AMOUNT (Bdt.)</th>
                <th colspan="2">DEDUCTIONS</th>
                <th>AMOUNT (Bdt.)</th>
            </tr>
            <tr>
                <td colspan="2">Total Salary Per Month</td>
                <td>
                    <?php
                        $monthDays = [
                            "January" => 31, "February" => 28, "March" => 31, "April" => 30,
                            "May" => 31, "June" => 30, "July" => 31, "August" => 31,
                            "September" => 30, "October" => 31, "November" => 30, "December" => 31
                        ];
                        $daysInMonth = $monthDays[$row['month']] ?? 0;
                        $totalSalary = $row['actual'] * $daysInMonth;
                        echo number_format($totalSalary, 2);
                    ?>
                </td>
                <td colspan="2">Leave Without Pay</td>
                <td>
                    <?php
                        $leaveDeduction = $row['leave'] * $row['actual'];
                        echo number_format($leaveDeduction, 2);
                    ?>
                </td>
            </tr>
            <tr class="highlight">
                <td colspan="2">Salary After LWP</td>
                <td><?php echo number_format($totalSalary - $leaveDeduction, 2); ?></td>
            </tr>
            <tr>
                <td colspan="5" class="text-center"><b>Total Deduction</b></td>
                <td><b><?php echo number_format($leaveDeduction, 2); ?></b></td>
            </tr>
            <tr>
                <td colspan="5" class="text-center net-pay">Net Pay</td>
                <td class="net-pay"><?php echo number_format($totalSalary - $leaveDeduction, 2); ?></td>
            </tr>
        </table>

        <table class="signature-table" style="width: 100%;">
            <tr>
                <th>Authorized By</th>
                <th>Received By</th>
            </tr>
        </table>
    </section>

    <!-- Download Button -->
    <div class="text-center">
        <button class="btn btn-primary" id="btnDownload">Download</button>
    </div>

    <!-- External Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>

    <script>
        function download(url, filename) {
            const a = document.createElement("a");
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function saveCapture(element) {
            html2canvas(element).then(function(canvas) {
                const image = canvas.toDataURL("image/png");
                download(image, "Salary_Slip.png");
            });
        }

        document.getElementById('btnDownload').addEventListener('click', function() {
            const element = document.getElementById('content-to-print1');
            saveCapture(element);
        });
    </script>
</body>

</html>
