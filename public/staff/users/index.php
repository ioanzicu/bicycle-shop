<?php require_once '../../../private/initialize.php'; ?>
<?php require_admin_login(); ?>

<?php
$current_page = $_GET['page'] ?? 1;
$current_page = (int) test_input($current_page);
$per_page = 5;
$total_count = User::count_all();
$pagination = new Pagination($current_page, $per_page, $total_count); // Prevent database error
if (!$pagination->total_pages_checker()) {
    redirect_to('./../../not_found.php');
} else {

    $sql = "SELECT * FROM users ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $users = User::find_by_sql($sql);
    ?>

<?php $page_title = 'Users'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<div id="content">
  <div class="user listing">
    <h1>Users</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for(
          '/staff/users/new.php'
      ); ?>">Add User</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Created At</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?php echo h($user->get_user_id()); ?></td>
          <td><?php echo h($user->full_name()); ?></td>
          <td><?php echo h($user->get_user_email()); ?></td>
          <td><?php echo h($user->get_user_username()); ?></td>
          <td><?php echo h($user->get_user_created_at()); ?></td>
          <td><a class="action" href="<?php echo url_for(
              '/staff/users/show.php?id=' . h(u($user->get_user_id()))
          ); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for(
              '/staff/users/edit.php?id=' . h(u($user->get_user_id()))
          ); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for(
              '/staff/users/delete.php?id=' . h(u($user->get_user_id()))
          ); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php
$url = url_for('/staff/users/index.php');
echo $pagination->page_links($url);
?>


  </div>

</div>

<?php include SHARED_PATH . '/staff_footer.php'; ?>
<?php
}
 ?>
