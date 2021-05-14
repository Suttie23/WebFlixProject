<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Users
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>D.O.B</th>
                        <th>Contact Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>D.O.B</th>
                        <th>Contact Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM users";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['first_name']}"; ?></td>
                                <td><?php echo "{$row['last_name']}"; ?></td>
                                <td><?php echo "{$row['email']}"; ?></td>
                                <td><?php echo "{$row['date_of_birth']}"; ?></td>
                                <td><?php echo "{$row['contact_number']}"; ?></td>
                                <td><?php if ($row['subscribed'] == "1") {
                                        echo "Subscribed";
                                    } else {
                                        echo "Free Account";
                                    } ?></td>
                                <td>
                                    <div class="row">
                                            <a href="#editModal<?php echo "{$row['user_id']}"; ?>" data-toggle="modal" style="text-decorations:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em></a> Edit</button>
                                            <form action="includes/delete.php" method="post">
                                                <input type="hidden" id="userId" name="user_id" value="<?php echo "{$row['user_id']}"; ?>">
                                                <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                            </form>
                                    </div>
                                </td>

                                <div class="modal fade" id="editModal<?php echo "{$row['user_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Change Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="includes/edit.php" method="post">
                                                    <input type="hidden" id="userId" name="user_id" value="<?php echo "{$row['user_id']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="first_name" class="form-control" placeholder="<?php echo "{$row['first_name']}"; ?>" value="<?php if (isset($_POST['first_name'])) {
                                                                                                                                                                                    echo $_POST['first_name'];
                                                                                                                                                                                } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="last_name" class="form-control" placeholder="<?php echo "{$row['last_name']}"; ?>" value="<?php if (isset($_POST['last_name'])) {
                                                                                                                                                                                echo $_POST['last_name'];
                                                                                                                                                                            } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="<?php echo "{$row['email']}"; ?>" value="<?php if (isset($_POST['email'])) {
                                                                                                                                                                        echo $_POST['email'];
                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="date" name="date_of_birth" class="form-control" placeholder="<?php echo "{$row['date_of_birth']}"; ?>" value="<?php if (isset($_POST['date_of_birth'])) {
                                                                                                                                                                                        echo $_POST['date_of_birth'];
                                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="contact_no" class="form-control" placeholder="<?php echo "{$row['contact_number']}"; ?>" value="<?php if (isset($_POST['contact_no'])) {
                                                                                                                                                                                    echo $_POST['contact_no'];
                                                                                                                                                                                } ?>">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-group">
                                                            <input type="submit" name="btnEditUser" class="btn btn-dark btn-block" value="Save Changes" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>

                    <?php
                        }
                    }

                    function deleteUser($link, $user_id)
                    {
                        $g = "DELETE * FROM users WHERE user_id='$user_id'";
                        $n = mysqli_query($link, $g);
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>