<!doctype html>

<html lang="en">
  <head>
    <title>Iro Content <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/css/public.css'); ?>" />
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          <img class="bike-icon" src="<?php echo url_for('/images/diamond.png') ?>" /><br />
          Iro Content
        </a>
      </h1>
    </header>
