<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav" style="background-color:black;" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <div class="sb-sidenav-menu-heading text-white">Core</div>
                <a class="nav-link text-white" href="admin.php">
                    <div class="sb-nav-link-icon text-white"><em class="fas fa-tachometer-alt"></em></div>
                    Dashboard
                </a>


                <div class="sb-sidenav-menu-heading text-white">Management</div>
                <a class="nav-link text-white" href="users.php">
                    <div class="sb-nav-link-icon text-white"><em class="fas fa-book-open"></em></div>
                    Users
                </a>

                <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><em class="fas fa-book-open"></em></div>
                    Content
                    <div class="sb-sidenav-collapse-arrow"><em class="fas fa-angle-down"></em></div>
                </a>

                <div class="collapse text-white" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion text-white" id="sidenavAccordionPages">

                        <a class="nav-link text-white" href="genres.php">
                            Genres
                        </a>

                        <a class="nav-link text-white" href="movies.php">
                            Movies
                        </a>

                        <a class="nav-link text-white" href="tv.php">
                            TV
                        </a>

                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading text-white">Analytics</div>

                <a class="nav-link text-white" href="subscribers.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-chart-area"></em></div>
                    Subscribers
                </a>

                <a class="nav-link text-white" href="sessions.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-table"></em></div>
                    Sessions
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer bg-dark text-white">
            <div class="small">Logged in as:</div>
            <?php echo "{$_SESSION['first_name']}"; ?>
        </div>
    </nav>
</div>