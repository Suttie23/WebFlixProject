<?php

session_start();

?>

<?php if ($_SESSION['account_type'] == "1") { 
    include('includes/admin-header.php');
} else {
    header("Location: ../index.php");
} ?>

<div id="layoutSidenav">
    <?php

    include('includes/sidenav.php');

    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Tables</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                        .
                    </div>
                </div>
                <?php
                include('includes/user-table.php');
                ?>
            </div>
        </main>

        <?php

        include('includes/footer.php');

        ?>