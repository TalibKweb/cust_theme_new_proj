<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <title>Welcome to Notandas Realty</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animation.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/innerpage.css">
</head>

<body>
    <!-- Header with Hamburger Button -->
    <header>
        <nav class="navbar bg-transparent mx-3 my-2 ">
            <div class="container-fluid">
                <a class="logo" href="<?php echo site_url(); ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/images/notandasLogo.svg" class="img-fluid" />
                </a>
                <button class="navbar-toggler menu-btn ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                </button>
                <div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="menu-panel">
                        <div class="offcanvas-header border-0 position-absolute top-0 end-0 m-lg-3 m-1">
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-lg-0 px-lg-5">
                            <ul class="navbar-nav menu-list">
                                <li class="nav-item has-submenu">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="nav-link" href="#">ABOUT US</a>
                                        <span class="toggle"></span>
                                    </div>
                                    <ul class="submenu list-unstyled">
                                        <li><a href="about.html">Company Profile</a></li>
                                        <li><a href="our-team.html">TEAM</a></li>
                                        <li><a href="awards.html">AWARDS</a></li>
                                        <li><a href="csr.html">CSR</a></li>
                                        <li><a href="testimonial.html">TESTIMONIAL</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item has-submenu">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="nav-link" href="project-listing.html">PROJECTS</a>
                                        <span class="toggle"></span>
                                    </div>
                                    <ul class="submenu list-unstyled">
                                        <li><a href="notan-house.html">Notan House</a></li>
                                        <li><a href="96-Tagore.html">96 Tagore</a></li>
                                        <li><a href="notan-casa.html">Notan Casa</a></li>
                                        <li><a href="notan-tides.html">Notan Tides</a></li>
                                        <li><a href="notan-edge.html">Notan Edge</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="blog.html">BLOGS</a></li>
                                <li class="nav-item"><a class="nav-link" href="press-release.html">PRESS RELEASE</a></li>
                                <li class="nav-item"><a class="nav-link" href="careers.html">CAREERS</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.html">CONTACT US</a></li>
                            </ul>
                        </div>



                        <!-- >>>>>>>>>>>>> For Dynamic Field!  -->
                        <div class="offcanvas-body p-lg-0 px-lg-5">
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'primary',
                                'depth' => 2,
                                'container' => false,
                                'menu_class' => 'navbar-nav menu-list',
                            ]);
                            ?>
                        </div>






                        <div class="flex-grow-1"></div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>