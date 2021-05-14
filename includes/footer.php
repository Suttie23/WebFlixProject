<!--Footer-->
<div class="d-none d-lg-block bg-dark sticky-bottom">
    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <img class="logo" style="height: 50px; width: 100px;" src="img/logo_small.png">
                <small class="d-block mb-3 text-muted">&copy; 2021</small>
            </div>
            <div class="col-6 col-md text-white">
                <h5>Navigation</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="index.php">Home</a></li>
                    <li><a class="text-muted" href="tv.php">TV Shows</a></li>
                    <li><a class="text-muted" href="movies.php">Movies</a></li>
                </ul>
            </div>
            <div class="col-6 col-md text-white">
                <h5>Account</h5>
                <ul class="list-unstyled text-small">
                    <?php if (isset($_SESSION['first_name'])) : ?>
                        <li><a class="text-muted" href="myaccount.php">My Account</a></li>
                    <?php else : ?>
                        <li><a class="text-muted" href="" rel="nofollow" data-mdb-toggle="modal" data-mdb-target="#signupModal">My Account</a></li>
                    <?php endif ?>
                </ul>
            </div>
            <div class="col-6 col-md text-white">
                <h5>Contact us</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <p class="text-muted" href="">Call: 1337 6942 0800</p>
                    </li>
                    <li>
                        <p class="text-muted" href="">Email: WebFlix@NotANetflixSpoof.ec</p>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md text-white">
                <h5>Terms & Privacy</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="tos.php">Terms Of Use</a></li>
                    <li><a class="text-muted" href="privacy.php">Privacy</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="js/responsive.js"></script>

    </body>