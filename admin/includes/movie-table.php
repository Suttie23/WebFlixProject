<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Movies
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Movie ID</th>
                        <th>Movie Title</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Movie ID</th>
                        <th>Movie Title</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM movie";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['mov_id']}"; ?></td>
                                <td><?php echo "{$row['mov_title']}"; ?></td>
                                <td><?php echo "{$row['mov_genre']}"; ?></td>
                                <td>
                                    <div class="row">
                                        <a href="#editModal<?php echo "{$row['mov_id']}"; ?>" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em> Edit</a></button>
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="movId" name="mov_id" value="<?php echo "{$row['mov_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade" id="editModal<?php echo "{$row['mov_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
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
                                                    <input type="hidden" id="movId" name="mov_id" value="<?php echo "{$row['mov_id']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="mov_title" class="form-control" placeholder="<?php echo "{$row['mov_title']}"; ?>" value="<?php if (isset($_POST['mov_title'])) {
                                                                                                                                                                                echo $_POST['mov_title'];
                                                                                                                                                                            } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="mov_desc" class="form-control" placeholder="<?php echo "{$row['mov_desc']}"; ?>" value="<?php if (isset($_POST['mov_desc'])) {
                                                                                                                                                                                echo $_POST['mov_desc'];
                                                                                                                                                                            } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <select name="mov_genre" class="form-control">
                                                            <option value="" selected disabled hidden>Change Genre</option>

                                                            <?php
                                                            $f = "SELECT * FROM genres";
                                                            $a = mysqli_query($link, $f);
                                                            if (mysqli_num_rows($a) > 0) {
                                                                while ($coc = mysqli_fetch_array($a, MYSQLI_ASSOC)) {

                                                            ?>
                                                                    <option value="<?php echo "{$coc['genre_name']}"; ?>"><?php echo "{$coc['genre_name']}"; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" name="mov_img" class="form-control" placeholder="<?php echo "{$row['mov_img']}"; ?>" value="<?php if (isset($_POST['mov_img'])) {
                                                                                                                                                                            echo $_POST['mov_img'];
                                                                                                                                                                        } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" name="mov_trailer" class="form-control" placeholder="<?php echo "{$row['mov_trailer']}"; ?>" value="<?php if (isset($_POST['mov_trailer'])) {
                                                                                                                                                                                    echo $_POST['mov_trailer'];
                                                                                                                                                                                } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" name="mov_file" class="form-control" placeholder="<?php echo "{$row['mov_file']}"; ?>" value="<?php if (isset($_POST['mov_file'])) {
                                                                                                                                                                            echo $_POST['mov_file'];
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

                    ?>
                </tbody>
                <a href="#addModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> Add New Movie</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">New Movie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/edit.php" method="post">
                    <div class="form-group">
                        <input type="text" name="new_mov" class="form-control" placeholder="Movie Name" value="<?php if (isset($_POST['new_mov'])) {
                                                                                                                    echo $_POST['new_mov'];
                                                                                                                } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="text" name="mov_desc" class="form-control" placeholder="Movie Description" value="<?php if (isset($_POST['mov_desc'])) {
                                                                                                                            echo $_POST['mov_desc'];
                                                                                                                        } ?>" required>

                    </div>
                    <div class="form-group">
                        <select name="mov_genre" class="form-control" required>
                        <option value="" selected disabled hidden>Please Select Genre</option>

                            <?php
                            $f = "SELECT * FROM genres";
                            $a = mysqli_query($link, $f);
                            if (mysqli_num_rows($a) > 0) {
                                while ($coc = mysqli_fetch_array($a, MYSQLI_ASSOC)) {

                            ?>
                                    <option value="<?php echo "{$coc['genre_name']}"; ?>"><?php echo "{$coc['genre_name']}"; ?></option>
                            <?php
                                }
                            }
                            ?>

                        </select>

                    </div>
                    <div class="form-group">
                        <input type="url" name="mov_img" class="form-control" placeholder="Image URL" value="<?php if (isset($_POST['mov_img'])) {
                                                                                                                    echo $_POST['mov_img'];
                                                                                                                } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="url" name="mov_trailer" class="form-control" placeholder="Trailer URL" value="<?php if (isset($_POST['mov_trailer'])) {
                                                                                                                    echo $_POST['mov_trailer'];
                                                                                                                } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="url" name="mov_file" class="form-control" placeholder="Movie URL" value="<?php if (isset($_POST['mov_file'])) {
                                                                                                                    echo $_POST['mov_file'];
                                                                                                                } ?>" required>

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