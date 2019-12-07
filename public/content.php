<?php require_once '../private/initialize.php'; ?>

<?php $page_title = 'Inventory'; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>

<div id="main">

    <div id="page">
        <div class="intro">
            <img class="inset" src="<?php echo url_for('/images/gear.jpg'); ?>" />
            <h2>Our Inventory of Used Bicycles</h2>
            <p>Choose the bike you love.</p>
            <p>We will deliver it to your door and let you try it before you buy it.</p>
        </div>

        <?php
        $sort = ""; // Check if the submited variable exist in the $_POST array and it's value
        if (isset($_POST["default"]) && $_POST["default"] === "default") {
            $sort = "";
        } elseif (isset($_POST["brand"]) && $_POST["brand"] === "brand") {
            $sort = "brand";
        } elseif (isset($_POST["model"]) && $_POST["model"] === "model") {
            $sort = "model";
        } elseif (isset($_POST["year"]) && $_POST["year"] === "year") {
            $sort = "year";
        }
        //  ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX']
        elseif (
            isset($_POST["category"]) && ($_POST["category"] === "Road" ||
                $_POST["category"] === "Mountain" ||
                $_POST["category"] === "Hybrid" ||
                $_POST["category"] === "Cruiser" ||
                $_POST["category"] === "City" ||
                $_POST["category"] === "BMX")
        ) {
            // echo $_POST["category"];
            $sort = "category";
            $category = "";
            // Check cases for Select Menu
            if ($_POST["category"] === "Road") {
                $category = "Road";
            } elseif ($_POST["category"] === "Mountain") {
                $category = "Mountain";
            } elseif ($_POST["category"] === "Hybrid") {
                $category = "Hybrid";
            } elseif ($_POST["category"] === "Cruiser") {
                $category = "Cruiser";
            } elseif ($_POST["category"] === "City") {
                $category = "City";
            } elseif ($_POST["category"] === "BMX") {
                $category = "BMX";
            }
        }
        //  ['Mens', 'Womens', 'Unisex']
        elseif (
            isset($_POST["gender"]) && ($_POST["gender"] === "Mens" ||
                $_POST["gender"] === "Womens" ||
                $_POST["gender"] === "Unisex")
        ) {
            $sort = "gender";
            $gender = "";
            // Check cases for Select Menu
            if ($_POST["gender"] === "Mens") {
                $gender = "Mens";
            } elseif ($_POST["gender"] === "Womens") {
                $gender = "Womens";
            } elseif ($_POST["gender"] === "Unisex") {
                $gender = "Unisex";
            }
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
                    <!-- Default State -->
                    <input class="sort-button" type="submit" name="default" value="default" />

                    <th><input class="sort-button" type="submit" name="brand" value="brand" /></th>
                    <th><input class="sort-button" type="submit" name="model" value="model" /></th>
                    <th><input class="sort-button" type="submit" name="year" value="year" /></th>

                    <th>
                        <!-- ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'] -->
                        <select class="sort-button" name="category" onchange="this.form.submit()">
                            <option selected>Category</option>
                            <option value="Road">Road</option>
                            <option value="Mountain">Mountain</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Cruiser">Cruiser</option>
                            <option value="City">City</option>
                            <option value="BMX">BMX</option>
                        </select>
                        <noscript><input type="submit" value="submit"></noscript>
                    </th>

                    <th>
                        <!-- ['Mens', 'Womens', 'Unisex'] -->
                        <select class="sort-button" name="gender" onchange="this.form.submit()">
                            <option selected>Gender</option>
                            <option value="Mens">Mens</option>
                            <option value="Womens">Womens</option>
                            <option value="Unisex">Unisex</option>
                        </select>
                        <noscript><input type="submit" value="submit"></noscript>
                    </th>
                    <th><input class="sort-button" type="submit" name="color" value="color" /></th>
                    <th><input class="sort-button" type="submit" name="price" value="price" /></th>
                    <th>&nbsp;</th>

            </tr>
            </form>
            <?php // Sort the data in the database and receive it

            switch ($sort) {
                case "brand":
                    $bikes = Content::sort_by_brand();
                    break;
                case "model":
                    $bikes = Content::sort_by_model();
                    break;
                case "year":
                    $bikes = Content::sort_by_year();
                    break;
                case "category":
                    $bikes = Content::sort_by_category($category);
                    break;
                case "gender":
                    $bikes = Content::sort_by_gender($gender);
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
            } // Clear $_POST array after each sort operation
            unset($_POST);
            unset($sort);
            ?>
            <?php if (sizeof($bikes) === 0) : ?>
            <h1> There are not records with such criteria </h1>
            <!-- Fill the table with the data -->
            <?php else : ?>

            <?php foreach ($bikes as $bike) { ?>
            <tr>
                <td><?php echo h($bike->get_content_brand()); ?></td>
                <td><?php echo h($bike->get_content_model()); ?></td>
                <td><?php echo h($bike->get_content_year()); ?></td>
                <td><?php echo h($bike->get_content_category()); ?></td>
                <td><?php echo h($bike->get_content_gender()); ?></td>
                <td class="transform-color-case"><?php echo h(
                                                                            $bike->get_content_color()
                                                                        ); ?></td>
                <td><?php echo h(
                                            money_format('$%i', $bike->get_content_price())
                                        ); ?></td>
                <td><a href="detail.php?id=<?php echo $bike->get_content_id(); ?>">View</a></td>
            </tr>
            <?php } ?>
            <?php endif; ?>
        </table>

    </div>

</div>

<?php include SHARED_PATH . '/public_footer.php'; ?>