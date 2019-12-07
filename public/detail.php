<?php require_once '../private/initialize.php'; ?>

<?php
// Get requested ID

$id = $_GET['id'] ?? false;
$id = (int) test_input($id);
if (!$id) {
    redirect_to('content.php');
}

// Find bicycle using ID

if (!($bike = Content::find_by_id($id))) {
    redirect_to('./not_found.php');
    error_404();
} else {
     ?>

<?php $page_title = 'Detail: ' . $bike->name(); ?>
<?php include SHARED_PATH . '/public_header.php'; ?>

<div id="main">

  <a href="content.php">Back to Inventory</a>

  <div id="page">

    <div class="detail">
      <dl>
        <dt>Brand</dt>
        <dd><?php echo h($bike->get_content_brand()); ?></dd>
      </dl>
      <dl>
        <dt>Model</dt>
        <dd><?php echo h($bike->get_content_model()); ?></dd>
      </dl>
      <dl>
        <dt>Year</dt>
        <dd><?php echo h($bike->get_content_year()); ?></dd>
      </dl>
      <dl>
        <dt>Category</dt>
        <dd><?php echo h($bike->get_content_category()); ?></dd>
      </dl>
      <dl>
        <dt>Gender</dt>
        <dd><?php echo h($bike->get_content_gender()); ?></dd>
      </dl>
      <dl>
        <dt>Color</dt>
        <dd><?php echo h($bike->get_content_color()); ?></dd>
      </dl>
      <dl>
        <dt>Weight</dt>
        <dd><?php echo h($bike->weight_kg()) .
            ' / ' .
            h($bike->weight_lbs()); ?></dd>
      </dl>
      <dl>
        <dt>Condition</dt>
        <dd><?php echo h($bike->condition()); ?></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd><?php echo h(
            money_format('$%i', $bike->get_content_price())
        ); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dt>
          <br />
          <br />
        </dt>
        <dd><?php echo h($bike->get_content_decription()); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php include SHARED_PATH . '/public_footer.php'; ?>
<?php
}
 ?>
