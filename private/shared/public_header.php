<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iro's Bicycle Warehouse <?php if (isset($page_title)) {
                                    echo '- ' . h($page_title);
                                  } ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo url_for(
                                                      '/favicon/apple-icon-60x60.png'
                                                    ); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo url_for(
                                                      '/favicon/apple-icon-72x72.png'
                                                    ); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo url_for(
                                                      '/favicon/apple-icon-76x76.png'
                                                    ); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo url_for(
                                                        '/favicon/apple-icon-114x114.png'
                                                      ); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo url_for(
                                                        '/favicon/apple-icon-120x120.png'
                                                      ); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo url_for(
                                                        '/favicon/apple-icon-144x144.png'
                                                      ); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo url_for(
                                                        '/favicon/apple-icon-152x152.png'
                                                      ); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo url_for(
                                                        '/favicon/apple-icon-180x180.png'
                                                      ); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo url_for(
                                                            '/favicon/apple-icon-192x192.png'
                                                          ); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url_for(
                                                          '/favicon/favicon-32x32.png'
                                                        ); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo url_for(
                                                          '/favicon/favicon-96x96.png'
                                                        ); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo url_for(
                                                          '/favicon/favicon-16x16.png'
                                                        ); ?>">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo url_for(
                                                  '/favicon/ms-icon-144x144.png'
                                                ); ?> ">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" media="all" href="<?php echo url_for(
                                              '/css/public.css'
                                            ); ?>" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="<?php echo url_for('/index.php'); ?>"><img height="40"
                src="<?php echo url_for(
                                                                                                                  '/images/bicycle-icon.png'
                                                                                                                ); ?>" />
            Iro's Bicycle Warehouse</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-dark" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item ml-5">
                    <a class="nav-link" href="<?php echo url_for(
                                      '/content.php'
                                    ); ?>">View Our Inventory </a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="<?php echo url_for('/about.php'); ?>">About</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="<?php echo url_for('/contacts.php'); ?>">Contacts</a>
                </li>
                <!-- ADMIN MENU BUTTON -->
                <?php if (isset($_SESSION['username'])) : ?>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="<?php echo url_for('/staff/index.php'); ?>">Admin Menu</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="<?php echo url_for('/staff/logout.php'); ?>">Log Out</a>
                </li>
                <!-- USER ACCOUNT BUTTON -->
                <?php elseif (isset($_COOKIE['username'])) : ?>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="<?php echo url_for(
                                          '/staff/users/user_account.php'
                                        ); ?>">User Account</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="<?php echo url_for('/staff/logout.php'); ?>">Log Out</a>
                </li>
                <!-- LOG IN BUTTON -->
                <?php else : ?>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="<?php echo url_for('/staff/login.php'); ?>">Log In</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>