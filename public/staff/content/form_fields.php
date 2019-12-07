<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($bicycle)) {
    redirect_to(url_for('/staff/content/index.php'));
} ?>

<dl>
  <dt>Brand</dt>
  <dd><input type="text" name="bicycle[brand]" value="<?php echo h(
      $bicycle->get_content_brand()
  ); ?>" /></dd>
</dl>

<dl>
  <dt>Model</dt>
  <dd><input type="text" name="bicycle[model]" value="<?php echo h(
      $bicycle->get_content_model()
  ); ?>" /></dd>
</dl>

<dl>
  <dt>Year</dt>
  <dd>
    <select name="bicycle[year]">
      <option value=""></option>
    <?php $this_year = idate('Y'); ?>
    <?php for ($year = $this_year - 20; $year <= $this_year; $year++) { ?>
      <option value="<?php echo $year; ?>" <?php if (
    $bicycle->get_content_year() == $year
) {
    echo 'selected';
} ?>><?php echo $year; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Category</dt>
  <dd>
    <select name="bicycle[category]">
      <option value=""></option>
    <?php foreach (Content::CATEGORIES as $category) { ?>
      <option value="<?php echo $category; ?>" <?php if (
    $bicycle->get_content_category() == $category
) {
    echo 'selected';
} ?>><?php echo $category; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Gender</dt>
  <dd>
    <select name="bicycle[gender]">
      <option value=""></option>
    <?php foreach (Content::GENDERS as $gender) { ?>
      <option value="<?php echo $gender; ?>" <?php if (
    $bicycle->get_content_gender() == $gender
) {
    echo 'selected';
} ?>><?php echo $gender; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Color</dt>
  <dd><input type="text" name="bicycle[color]" value="<?php echo h(
      $bicycle->get_content_color()
  ); ?>" /></dd>
</dl>

<dl>
  <dt>Condition</dt>
  <dd>
    <select name="bicycle[condition_id]">
      <option value=""></option>
    <?php foreach (Content::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
      <option value="<?php echo $cond_id; ?>" <?php if (
    $bicycle->get_content_condition_id() == $cond_id
) {
    echo 'selected';
} ?>><?php echo $cond_name; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Weight (kg)</dt>
  <dd><input type="text" name="bicycle[weight_kg]" value="<?php echo h(
      $bicycle->get_content_weight_kg()
  ); ?>" /></dd>
</dl>

<dl>
  <dt>Price</dt>
  <dd>$ <input type="text" name="bicycle[price]" size="18" value="<?php echo h(
      $bicycle->get_content_price()
  ); ?>" /></dd>
</dl>

<dl>
  <?php // Set author name
  if ($bicycle->get_content_author() == '') {
      if (isset($session)) {
          $bicycle->set_content_author($session->get_username());
      }
  } ?>
  <dt>Author</dt>
  <dd><input type="text" name="bicycle[author]" size="18" value="<?php echo h(
      $bicycle->get_content_author()
  ); ?>" readonly /></dd>
</dl>

<dl>
  <dt>Description</dt>
  <dd><textarea name="bicycle[description]" rows="5" cols="50"><?php echo h(
      $bicycle->get_content_decription()
  ); ?></textarea></dd>
</dl>
