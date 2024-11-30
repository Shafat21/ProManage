<?php
error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

// Fetch user data
$sql = "SELECT * FROM admin WHERE delete_status = '0' AND id != 1";
$statement = $conn->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

// Fetch group names for each user
foreach ($users as &$user) {
    $stmt = $conn->prepare("SELECT * FROM groups WHERE id = ?");
    $stmt->execute([$user['role_id']]);
    $group = $stmt->fetch(PDO::FETCH_ASSOC);
    $user['role_name'] = $group['name'] ?? 'Unknown';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">

    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>

    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
</head>

<body>
    <?php include('include/head.php'); ?>
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>

    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div id="vueApp">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="Add_User.php">
                                    <button class="btn btn-primary">Add Employee</button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SR No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(user, index) in users" :key="user.id">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ user.fname }} {{ user.lname }}</td>
                                                <td>{{ user.email }}</td>
                                                <td>{{ user.role_name }}</td>
                                                <td>
                                                    <button class="btn btn-danger" @click="deleteUser(user.id)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <button class="btn btn-info" @click="editUser(user.id)">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SR No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('include/footer.php'); ?>
    </div>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    users: <?php echo json_encode($users); ?> // Passing PHP data to Vue
                };
            },
            methods: {
                deleteUser(id) {
                    if (confirm('Do you really want to Delete?')) {
                        const form = document.createElement('form');
                        form.method = "POST";
                        form.action = "Operation/User.php";

                        const input = document.createElement('input');
                        input.type = "hidden";
                        input.name = "del_id";
                        input.value = id;

                        form.appendChild(input);
                        document.body.appendChild(form);
                        form.submit();
                    }
                },
                editUser(id) {
                    const form = document.createElement('form');
                    form.method = "POST";
                    form.action = "Update_User.php";

                    const input = document.createElement('input');
                    input.type = "hidden";
                    input.name = "id";
                    input.value = id;

                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            },
            mounted() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
        }).mount('#vueApp');
    </script>
</body>

</html>
