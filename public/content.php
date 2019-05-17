<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/to-top.png') ?>" />
      <h2>Our Inventory of Used Bicycles</h2>
      <p>Choose the bike you love.</p>
      <p>We will deliver it to your door and let you try it before you buy it.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Price</th>
        <th>&nbsp;</th>
      </tr>

<?php

$bikes = Content::find_all();

?>
      <?php foreach($bikes as $bike) { ?>
      <tr>
        <td><?php echo h($bike->get_content_brand()); ?></td>
        <td><?php echo h($bike->get_content_model()); ?></td>
        <td><?php echo h($bike->get_content_year()); ?></td>
        <td><?php echo h($bike->get_content_category()); ?></td>
        <td><?php echo h($bike->get_content_gender()); ?></td>
        <td><?php echo h($bike->get_content_color()); ?></td>
        <td><?php echo h(money_format('$%i', $bike->get_content_price())); ?></td>
        <td><a href="detail.php?id=<?php echo $bike->get_content_id(); ?>">View</a></td>
      </tr>
      <?php } ?>

    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
