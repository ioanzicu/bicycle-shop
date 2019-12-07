<?php require_once('../../../../private/initialize.php'); ?>
<?php require_user_login(); ?>

<?php

$current_page = $_GET['page'] ?? 1;
$current_page = (int) test_input($current_page);
$per_page = 5;
$total_count = Content::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

// Prevent database error
if (!$pagination->total_pages_checker()) {
  redirect_to('./../../../not_found.php');
} else {

  // Find all bicycles;
  // use pagination instead
  // $bicycles = Bicycle::find_all();

  $sql = "SELECT * FROM bicycles ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $bicycles = Content::find_by_sql($sql);
  ?>

<?php $page_title = 'Bicycles'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="bicycles listing">
        <h1>Bicycles</h1>

        <div class="actions">
            <a class="action" href="<?php echo url_for('/staff/users/content/new.php'); ?>">Add Bicycle</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Category</th>
                <th>Gender</th>
                <th>Color</th>
                <th>Price</th>
                <th>Author</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($bicycles as $bicycle) { ?>
            <tr>
                <td><?php echo h($bicycle->get_content_id()); ?></td>
                <td><?php echo h($bicycle->get_content_brand()); ?></td>
                <td><?php echo h($bicycle->get_content_model()); ?></td>
                <td><?php echo h($bicycle->get_content_year()); ?></td>
                <td><?php echo h($bicycle->get_content_category()); ?></td>
                <td><?php echo h($bicycle->get_content_gender()); ?></td>
                <td><?php echo h($bicycle->get_content_color()); ?></td>
                <td><?php echo h($bicycle->get_content_price()); ?></td>
                <td><?php echo h($bicycle->get_content_author()); ?></td>
                <td><a class="action"
                        href="<?php echo url_for('/staff/users/content/show.php?id=' . h(u($bicycle->get_content_id()))); ?>">View</a>
                </td>

                <?php
                // Allow to Edit and Delete just own posts
                // if($bicycle->get_content_author() == $session->get_username() ||
                if ($bicycle->get_content_author() == $cookie->get_username()) { ?>

                <td><a class="action"
                        href="<?php echo url_for('/staff/users/content/edit.php?id=' . h(u($bicycle->get_content_id()))); ?>">Edit</a>
                </td>
                <td><a class="action"
                        href="<?php echo url_for('/staff/users/content/delete.php?id=' . h(u($bicycle->get_content_id()))); ?>">Delete</a>
                </td>

                <?php } else { ?>
                <td> ### </td>
                <td> ### </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>

        <?php
        $url = url_for('/staff/users/content/index.php');
        echo $pagination->page_links($url);
        ?>


    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
<?php
}
?>