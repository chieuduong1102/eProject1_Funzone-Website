<div class="container-fluid">
        <div class="row justify-content-end time-now">
            <div class="col-md-6">
                <div id="clock"></div>
                <a id="sign_in" href="fzManage/index.php"><i class="fas fa-sign-in-alt"></i> Sign in</a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl navbar-light nav-top">
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav-left">
                <li class="nav-item active">
                    <a class="nav-link a-nav" href="index.php">HOME<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-nav" href="aboutus.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link a-nav" href="experience.php">EXPERIENCE</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php 
                                $id_7ww = 'exp1';
                                $ww_arr = get_all_7ww($id_7ww);
                                $count = mysqli_num_rows($ww_arr);
                                for ($i = 0; $i < 7; $i++):
                                    $ww = mysqli_fetch_assoc($ww_arr);
                            ?>
                                <a class="dropdown-item a-drop" href="<?php echo 'wotw.php?id='.str_replace(" ","",$ww['s_id']); ?>" ><?php echo strlen($ww['name_service'])>20 ? substr($ww['name_service'],0,20)."..." : $ww['name_service']?></a>
                                <div class="dropdown-divider"></div>
                            <?php 
                                endfor; 
                                mysqli_free_result($ww_arr);
                            ?>
                            <a class="dropdown-item a-drop" href="experience.php">MORE</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-nav" href="restaurant.php">RESTAURANT</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right nav-right">
                <li class="nav-item">
                    <a class="nav-link a-nav" href="hotel.php">HOTEL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-nav" href="events.php">EVENTS</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link a-nav" href="#">MORE</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php 
                                $more_arr = get_more_category('6');
                                $count_more = mysqli_num_rows($more_arr);
                                for ($i = 0; $i < $count_more; $i++):
                                    $more = mysqli_fetch_assoc($more_arr);
                            ?>
                                <a class="dropdown-item a-drop" href="<?php echo strtolower($more['name_category']).'.php' ?>" ><?php echo strlen($more['name_category'])>25 ? substr($more['name_category'],0,20)."..." : $more['name_category']?></a>
                                <div class="dropdown-divider"></div>
                            <?php 
                                endfor; 
                                mysqli_free_result($more_arr);
                            ?>
                        </div>
                    </div>
                </li>
            </ul>
            <form action="result_search.php" method="post" class="form-inline my-2 my-lg-0">
                <input name="search" class="form-control mr-sm-2 search-top" type="text" placeholder="Search" required>
                <button class="btn btn-outline-primary my-2 my-sm-0 btn-search-top" type="submit"><i
                        class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </nav>
    <div id="logoF">
        <a href="index.php"><img class="img-fluid img-logo" src="img/logoF.png" alt=""></a>
    </div>