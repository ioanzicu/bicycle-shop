<!doctype html>

<html lang="en">

<head>
    <title>Iro's Bicycle Warehouse <?php if (isset($page_title)) {
                                    echo '- ' . h($page_title);
                                  } ?></title>
    <meta charset="utf-8">


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
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo url_for(
                                                  '/favicon/ms-icon-144x144.png'
                                                ); ?> ">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" media="all" href="<?php echo url_for(
                                              '/css/public.css'
                                            ); ?>" />
</head>

<body>
    <header>
        <h1>
            <a href="<?php echo url_for('/index.php'); ?>">
                <img class="bike-icon" src="<?php echo url_for(
                                      '/images/bicycle-icon.png'
                                    ); ?>" />
                <br />
                Iro's Bicycle Warehouse
            </a>
        </h1>
    </header>