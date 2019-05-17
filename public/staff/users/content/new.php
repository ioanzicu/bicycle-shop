<?php

require_once('../../../../private/initialize.php');
require_user_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['bicycle'];
  $bicycle = new Content($args);
  $result = $bicycle->save();

  if($result === true) {
    $new_id = $bicycle->get_content_id();
    $session->message('The bicycle was created successfully.');
    redirect_to(url_for('/staff/users/content/show.php?id=' . $new_id));
  } else {
    // show errors

  }

} else {
  // display the form
  $bicycle = new Content;
}

?>

<?php $page_title = 'Create Bicycle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/users/content/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle new">
    <h1>Create Bicycle</h1>

    <?php echo display_errors($bicycle->get_errors()); ?>

    <form action="<?php echo url_for('/staff/users/content/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Bicycle" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
