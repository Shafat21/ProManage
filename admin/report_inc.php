<?php
error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

// Handle POST request and fetch data
$fromDate = $_POST['fromdate'] ?? null;
$toDate = $_POST['todate'] ?? null;

if ($fromDate && $toDate) {
    $sql = "SELECT * FROM admin WHERE delete_status='0' AND role_id <> '0' AND date BETWEEN ? AND ?";
    $statement = $conn->prepare($sql);
    $statement->execute([$fromDate, $toDate]);
} else {
    $sql = "SELECT * FROM admin WHERE delete_status='0' AND role_id <> '0'";
    $statement = $conn->prepare($sql);
    $statement->execute();
}
$data = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Report</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/datatables/css/dataTables.bootstrap4.min.css">

    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
</head>

<body>
    <?php include('include/head.php'); ?>
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>

    <div id="vueApp" class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>New Employee Report</h4>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="searchRecords" class="form-horizontal">
                                <div class="form-row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
                                        <label for="fromDate">From Date</label>
                                        <input type="date" class="form-control" id="fromDate" v-model="fromDate" required>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
                                        <label for="toDate">To Date</label>
                                        <input type="date" class="form-control" id="toDate" v-model="toDate" required>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-primary btn-block" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive mt-4">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Name</th>
                                            <th>Joining Date</th>
                                            <th>Email</th>
                                            <th>Salary (Per Day)</th>
                                            <th>Leaves (Per Month)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(employee, index) in filteredData" :key="employee.id">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ employee.fname }} {{ employee.lname }}</td>
                                            <td>{{ employee.jdate }}</td>
                                            <td>{{ employee.email }}</td>
                                            <td>{{ employee.salary }}</td>
                                            <td>{{ employee.leavess }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <?php include('include/footer.php'); ?>
    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    fromDate: '',
                    toDate: '',
                    employees: <?= json_encode($data); ?>,
                };
            },
            computed: {
                filteredData() {
                    if (!this.fromDate || !this.toDate) return this.employees;
                    return this.employees.filter(employee => {
                        const joinDate = new Date(employee.date);
                        return (
                            new Date(this.fromDate) <= joinDate &&
                            joinDate <= new Date(this.toDate)
                        );
                    });
                }
            },
            methods: {
                searchRecords() {
                    // No additional server call is required because data is preloaded.
                }
            }
        }).mount('#vueApp');
    </script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>
