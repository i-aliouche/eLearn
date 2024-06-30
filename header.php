<!DOCTYPE html>
<html lang="<?php language_attributes() ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-md sticky-top">
        <div class="container">
            <a class="navbar-brand text-light fs-2 fw-bold" href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars fs-3 text-white"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="main-menu">
                <!-- Dynamic menu -->
                <?php
                header_menu();
                ?>
                <!-- Login and Sign up buttons -->
                <a class="btn rounded-pill btn-2 ms-lg-2 me-2" href="#">Login</a>
                <a class="btn rounded-pill btn-1 text-nowrap" href="#">Sign up</a>
            </div>
        </div>
    </nav>