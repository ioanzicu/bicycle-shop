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




 <?php
  $sort = ""; 
  
  if (isset($_POST["default"]) && $_POST["default"] === "default") {
    $sort = "";
  } elseif(isset($_POST["brand"]) && $_POST["brand"] === "brand") {
    $sort = "brand";
  } elseif (isset($_POST["model"]) && $_POST["model"] === "model") {
    $sort = "model";
  } elseif (isset($_POST["year"]) && $_POST["year"] === "year") {
    $sort = "year";
  } elseif (isset($_POST["color"]) && $_POST["color"] === "color") {
    $sort = "color";
  } elseif (isset($_POST["price"]) && $_POST["price"] === "price") {
    $sort = "price";
  } else {
    $sort = "";
  }
 
  ?>

    <table id="inventory">
      <tr>
      <form method="post" action="content.php">
        
        <input type="submit" name="default" value="default"/>

        <th><input type="submit" name="brand" value="brand"/></th>
        <th><input type="submit" name="model" value="model"/></th>
        <th><input type="submit" name="year" value="year"/></th>
        <th>Category</th>
        <th>Gender</th>
        <th><input type="submit" name="color" value="color"/></th>
        <th><input type="submit" name="price" value="price"/></th>
        <th>&nbsp;</th>
      
      </tr>
      </form> 

<?php

switch($sort) {
  case "brand":
    $bikes = Content::sort_by_brand();
    break;
  case "model":
    $bikes = Content::sort_by_model();
    break;
  case "year":
    $bikes = Content::sort_by_year();
    break;
  case "color":
    $bikes = Content::sort_by_color();
    break;
  case "price":
    $bikes = Content::sort_by_price();
    break;
  default:
    $bikes = Content::find_all();
    break;
}


unset($_POST);
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
