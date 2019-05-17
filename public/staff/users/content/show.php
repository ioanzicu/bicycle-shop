<?php require_once('../../../../private/initialize.php'); ?>
<?php require_user_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$id = (int) test_input($id);
if(!$bicycle = Content::find_by_id($id)){
  redirect_to('./../../../not_found.php');
  error_404();
} else {
?>

<?php $page_title = 'Show Bicycle: ' . h($bicycle->name()); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/users/content/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle show">

    <h1>Bicycle: <?php echo h($bicycle->name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Brand</dt>
        <dd><?php echo h($bicycle->get_content_brand()); ?></dd>
      </dl>
      <dl>
        <dt>Model</dt>
        <dd><?php echo h($bicycle->get_content_model()); ?></dd>
      </dl>
      <dl>
        <dt>Year</dt>
        <dd><?php echo h($bicycle->get_content_year()); ?></dd>
      </dl>
      <dl>
        <dt>Category</dt>
        <dd><?php echo h($bicycle->get_content_category()); ?></dd>
      </dl>
      <dl>
        <dt>Color</dt>
        <dd><?php echo h($bicycle->get_content_color()); ?></dd>
      </dl>
      <dl>
        <dt>Gender</dt>
        <dd><?php echo h($bicycle->get_content_gender()); ?></dd>
      </dl>
      <dl>
        <dt>Weight</dt>
        <dd><?php echo h($bicycle->weight_kg()) . ' / ' . h($bicycle->weight_lbs()); ?></dd>
      </dl>
      <dl>
        <dt>Condition</dt>
        <dd><?php echo h($bicycle->condition()); ?></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd><?php echo h(money_format('$%i', $bicycle->get_content_price())); ?></dd>
      </dl>
      <dl>
        <dt>Author</dt>
        <dd><?php echo h($bicycle->get_content_author()); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($bicycle->get_content_decription()); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php
}
?>
