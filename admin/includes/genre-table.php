<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Genres
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Genre Name</th>
                        <th>Total Titles</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Genre Name</th>
                        <th>Total Titles</th>
                        <th>Actions</th>

                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM genres";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                            $t = mysqli_query($link, "SELECT COUNT(mov_genre) FROM movie WHERE mov_genre = '{$row['genre_name']}'");
                            $mov = mysqli_fetch_array($t);

                            $t = mysqli_query($link, "SELECT COUNT(genre) FROM tv WHERE genre = '{$row['genre_name']}'");
                            $tv = mysqli_fetch_array($t);

                            $tot = $mov[0] + $tv[0];

                    ?>
                            <tr>
                                <td><?php echo "{$row['genre_name']}"; ?></td>
                                <td><?php echo $tot; ?></td>
                                <td>
                                    <div class="row">
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="genreName" name="genre_name" value="<?php echo "{$row['genre_name']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }

                    ?>
                </tbody>
                <a href="#addGenreModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> Add New Genre</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addGenreModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">New Genre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/edit.php" method="post">
                    <div class="form-group">
                        <input type="text" name="new_genre" class="form-control" placeholder="Genre" value="<?php if (isset($_POST['new_genre'])) {
                                                                                                                echo $_POST['new_genre'];
                                                                                                            } ?>">

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" name="btnEditGenre" class="btn btn-dark btn-block" value="Add Genre" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>