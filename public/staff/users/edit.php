<?php

require_once '../../../private/initialize.php';

require_admin_login();

if (!isset($_GET['id'])) {
  redirect_to(url_for('/staff/users/index.php'));
}
$id = $_GET['id'];
$user = User::find_by_id($id);
if ($user == false) {
  redirect_to(url_for('/staff/users/index.php'));
}

if (is_post_request()) {
  // Save record using post parameters
  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();

  if ($result === true) {
    $cookie->message('The user was updated successfully.');
    redirect_to(url_for('/staff/users/show.php?id=' . $id));
  } else {
    // show errors
  }
} else {
  // display the form
}
?>

<?php $page_title = 'Edit User'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for(
                                '/staff/users/index.php'
                              ); ?>">&laquo; Back to List</a>

    <div class="user edit">
        <h1>Edit User</h1>

        <?php echo display_errors($user->get_errors()); ?>

        <form action="<?php echo url_for(
                    '/staff/users/edit.php?id=' . h(u($id))
                  ); ?>" method="post">

            <?php include 'form_fields.php'; ?>

            <div id="operations">
                <input type="submit" value="Edit User" />
            </div>
        </form>

    </div>

</div>

<?php include SHARED_PATH . '/staff_footer.php'; ?>