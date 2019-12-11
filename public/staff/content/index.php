<?php require_once '../../../private/initialize.php'; ?>
<?php require_admin_login(); ?>

<?php
$current_page = $_GET['page'] ?? 1;
$current_page = (int) test_input($current_page);
$per_page = 5;
$total_count = Content::count_all();
$pagination = new Pagination($current_page, $per_page, $total_count); // Prevent database error
if (!$pagination->total_pages_checker()) {
    redirect_to('./../../not_found.php');
} else {

    // Limit the query offset
    $sql = "SELECT * FROM bicycles ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $bicycles = Content::find_by_sql($sql);
    ?>

<?php $page_title = 'Bicycles'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<div id="content">
    <div class="bicycles listing">
        <h1>Bicycles</h1>

        <div class="actions">
            <a class="action" href="<?php echo url_for(
                                                '/staff/content/new.php'
                                            ); ?>">Add Bicycle</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Category</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Color</th>
                    <th scope="col">Price</th>
                    <th scope="col">Author</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bicycles as $bicycle) { ?>
                <tr scope="row">
                    <td><?php echo h($bicycle->get_content_id()); ?></td>
                    <td><?php echo h($bicycle->get_content_brand()); ?></td>
                    <td><?php echo h($bicycle->get_content_model()); ?></td>
                    <td><?php echo h($bicycle->get_content_year()); ?></td>
                    <td><?php echo h($bicycle->get_content_category()); ?></td>
                    <td><?php echo h($bicycle->get_content_gender()); ?></td>
                    <td><?php echo h($bicycle->get_content_color()); ?></td>
                    <td><?php echo h($bicycle->get_content_price()); ?></td>
                    <td><?php echo h($bicycle->get_content_author()); ?></td>
                    <td><a class="action" href="<?php echo url_for(
                                                                    '/staff/content/show.php?id=' . h(u($bicycle->get_content_id()))
                                                                ); ?>">View</a></td>
                    <td><a class="action" href="<?php echo url_for(
                                                                    '/staff/content/edit.php?id=' . h(u($bicycle->get_content_id()))
                                                                ); ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo url_for(
                                                                    '/staff/content/delete.php?id=' . h(u($bicycle->get_content_id()))
                                                                ); ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
                $url = url_for('/staff/content/index.php');
                echo $pagination->page_links($url);
                ?>

    </div>

</div>

<?php include SHARED_PATH . '/staff_footer.php'; ?>
<?php
}
?>