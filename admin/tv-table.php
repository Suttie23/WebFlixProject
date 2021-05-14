<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Series Table
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="seriesTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Program ID</th>
                        <th>Program Title</th>
                        <th>Genre</th>
                        <th>Episodes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Program ID</th>
                        <th>Program Title</th>
                        <th>Genre</th>
                        <th>Episodes</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM tv";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                            $t = mysqli_query($link, "SELECT COUNT(*) FROM episode WHERE tv_id = '{$row['tv_id']}'");
                            $tot = mysqli_fetch_array($t)
                    ?>
                            <tr>
                                <td><?php echo "{$row['tv_id']}"; ?></td>
                                <td><?php echo "{$row['tv_title']}"; ?></td>
                                <td><?php echo "{$row['genre']}"; ?></td>
                                <td><?php echo $tot[0]; ?></td>
                                <td>
                                    <div class="row">
                                        <a href="#editSeriesModal<?php echo "{$row['tv_id']}"; ?>" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em> Edit</a></button>
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="tvId" name="tv_id" value="<?php echo "{$row['tv_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade" id="editSeriesModal<?php echo "{$row['tv_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
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
                                                    <input type="hidden" id="tvId" name="tv_id" value="<?php echo "{$row['tv_id']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="tv_title" class="form-control" placeholder="<?php echo "{$row['tv_title']}"; ?>" value="<?php if (isset($_POST['tv_title'])) {
                                                                                                                                                                                echo $_POST['tv_title'];
                                                                                                                                                                            } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="tv_desc" class="form-control" placeholder="<?php echo "{$row['tv_desc']}"; ?>" value="<?php if (isset($_POST['tv_desc'])) {
                                                                                                                                                                            echo $_POST['tv_desc'];
                                                                                                                                                                        } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <select name="tv_genre" class="form-control">
                                                            <option value="" selected disabled hidden>Change Genre</option>

                                                            <?php
                                                            $f = "SELECT * FROM genre";
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
                                                        <input type="url" name="tv_img" class="form-control" placeholder="<?php echo "{$row['tv_img']}"; ?>" value="<?php if (isset($_POST['tv_img'])) {
                                                                                                                                                                        echo $_POST['tv_img'];
                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" name="tv_trailer" class="form-control" placeholder="<?php echo "{$row['tv_trailer']}"; ?>" value="<?php if (isset($_POST['tv_trailer'])) {
                                                                                                                                                                                echo $_POST['tv_trailer'];
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
                <a href="#addSeriesModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> Add New Series</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Episode Table
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Episode Number</th>
                        <th>Episode Name</th>
                        <th>Program</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Episode Number</th>
                        <th>Episode Name</th>
                        <th>Program</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM episode";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                            $t = mysqli_query($link, "SELECT tv_title FROM tv WHERE tv_id = '{$row['tv_id']}'");
                            $tot = mysqli_fetch_array($t)
                    ?>
                            <tr>
                                <td><?php echo "{$row['episode_number']}"; ?></td>
                                <td><?php echo "{$row['episode_name']}"; ?></td>
                                <td><?php echo $tot[0]; ?></td>
                                <td>
                                    <div class="row">
                                        <a href="#editEpisodeModal<?php echo "{$row['episode_id']}"; ?>" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em> Edit</a></button>
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="episodeID" name="episode_id" value="<?php echo "{$row['episode_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade" id="editEpisodeModal<?php echo "{$row['episode_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
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
                                                    <input type="hidden" id="tvId" name="episode_id" value="<?php echo "{$row['episode_id']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="episode_number" class="form-control" placeholder="<?php echo "{$row['episode_number']}"; ?>" value="<?php if (isset($_POST['episode_number'])) {
                                                                                                                                                                                            echo $_POST['episode_number'];
                                                                                                                                                                                        } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="episode_name" class="form-control" placeholder="<?php echo "{$row['episode_name']}"; ?>" value="<?php if (isset($_POST['episode_name'])) {
                                                                                                                                                                                        echo $_POST['episode_name'];
                                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <select name="series_id" class="form-control">
                                                            <option value="" selected disabled hidden>Please Select Program</option>

                                                            <?php
                                                            $f = "SELECT * FROM tv";
                                                            $a = mysqli_query($link, $f);
                                                            if (mysqli_num_rows($a) > 0) {
                                                                while ($coc = mysqli_fetch_array($a, MYSQLI_ASSOC)) {

                                                            ?>
                                                                    <option value="<?php echo "{$coc['tv_id']}"; ?>"><?php echo "{$coc['tv_title']}"; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" name="episode_file" class="form-control" placeholder="<?php echo "{$row['episode_file']}"; ?>" value="<?php if (isset($_POST['episode_file'])) {
                                                                                                                                                                                    echo $_POST['episode_file'];
                                                                                                                                                                                } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" name="episode_img" class="form-control" placeholder="<?php echo "{$row['episode_img']}"; ?>" value="<?php if (isset($_POST['episode_img'])) {
                                                                                                                                                                                    echo $_POST['episode_img'];
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
                <a href="#addEpisodeModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> Add New Episode</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addSeriesModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
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
                    <div class="form-group">
                        <input type="text" name="new_tv" class="form-control" placeholder="Series Name" value="<?php if (isset($_POST['new_tv'])) {
                                                                                                                    echo $_POST['new_tv'];
                                                                                                                } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="text" name="tv_desc" class="form-control" placeholder="Series Description" value="<?php if (isset($_POST['tv_desc'])) {
                                                                                                                            echo $_POST['tv_desc'];
                                                                                                                        } ?>" required>

                    </div>
                    <div class="form-group">
                        <select name="tv_genre" class="form-control" required>
                            <option value="" selected disabled hidden>Please Select Genre</option>

                            <?php
                            $f = "SELECT * FROM genre";
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
                        <input type="url" name="tv_img" class="form-control" placeholder="Image URL" value="<?php if (isset($_POST['mov_img'])) {
                                                                                                                echo $_POST['mov_img'];
                                                                                                            } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="url" name="tv_trailer" class="form-control" placeholder="Trailer URL" value="<?php if (isset($_POST['mov_trailer'])) {
                                                                                                                        echo $_POST['mov_trailer'];
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

<div class="modal fade" id="addEpisodeModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
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
                    <div class="form-group">
                        <input type="number" name="new_episode" class="form-control" placeholder="Episode Number" value="<?php if (isset($_POST['new_episode'])) {
                                                                                                                        echo $_POST['new_episode'];
                                                                                                                    } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="text" name="episode_name" class="form-control" placeholder="Episode Name" value="<?php if (isset($_POST['episode_name'])) {
                                                                                                                            echo $_POST['episode_name'];
                                                                                                                        } ?>" required>

                    </div>
                    <div class="form-group">
                        <select name="series_id" class="form-control" required>
                            <option value="" selected disabled hidden>Please Select Program</option>

                            <?php
                            $f = "SELECT * FROM tv";
                            $a = mysqli_query($link, $f);
                            if (mysqli_num_rows($a) > 0) {
                                while ($coc = mysqli_fetch_array($a, MYSQLI_ASSOC)) {

                            ?>
                                    <option value="<?php echo "{$coc['tv_id']}"; ?>"><?php echo "{$coc['tv_title']}"; ?></option>
                            <?php
                                }
                            }
                            ?>

                        </select>

                    </div>
                    <div class="form-group">
                        <input type="url" name="episode_file" class="form-control" placeholder="File URL" value="<?php if (isset($_POST['episode_file'])) {
                                                                                                                    echo $_POST['episode_file'];
                                                                                                                } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="url" name="episode_img" class="form-control" placeholder="Image URL" value="<?php if (isset($_POST['episode_img'])) {
                                                                                                                    echo $_POST['episode_img'];
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