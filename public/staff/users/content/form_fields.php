<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($bicycle)) {
    redirect_to(url_for('/staff/users/content/index.php'));
}
?>

<div class="form-group row">
    <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="bicycle[brand]" id="inputBrand"
            value="<?php echo h($bicycle->get_content_brand()); ?>" />
    </div>
</div>


<div class="form-group row">
    <label for="inputModel" class="col-sm-2 col-form-label">Model</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="bicycle[model]" id="inputModel"
            value="<?php echo h($bicycle->get_content_model()); ?>" />
    </div>
</div>

<div class="form-group row">
    <label for="inputGroupSelectYear" class="col-sm-2 col-form-label">Year</label>
    <div class="col-sm-10">

        <select class="custom-select" id="inputGroupSelectYear" name="bicycle[year]">
            <option value=""></option>
            <?php $this_year = idate('Y') ?>
            <?php for ($year = $this_year - 20; $year <= $this_year; $year++) { ?>
            <option value="<?php echo $year; ?>" <?php if ($bicycle->get_content_year() == $year) {
                                                                echo 'selected';
                                                            } ?>><?php echo $year; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="inputGroupSelectCategory" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
        <select class="custom-select" id="inputGroupSelectGender" name="bicycle[category]">
            <option value=""></option>
            <option value=""></option>
            <?php foreach (Content::CATEGORIES as $category) { ?>
            <option value="<?php echo $category; ?>" <?php if ($bicycle->get_content_category() == $category) {
                                                                    echo 'selected';
                                                                } ?>><?php echo $category; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="inputGroupSelectGender" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
        <select class="custom-select" id="inputGroupSelectGender" name="bicycle[gender]">
            <option value=""></option>
            <?php foreach (Content::GENDERS as $gender) { ?>
            <option value="<?php echo $gender; ?>" <?php if ($bicycle->get_content_gender() == $gender) {
                                                                echo 'selected';
                                                            } ?>><?php echo $gender; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="inputColor" class="col-sm-2 col-form-label">Color</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="bicycle[color]" id="inputColor"
            value="<?php echo h($bicycle->get_content_color()); ?>" />
    </div>
</div>

<div class="form-group row">
    <label for="inputGroupSelectCondition" class="col-sm-2 col-form-label">Condition</label>
    <div class="col-sm-10">
        <select class="custom-select" id="inputGroupSelectCondition" name="bicycle[condition_id]">
            <option value=""></option>
            <?php foreach (Content::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
            <option value="<?php echo $cond_id; ?>" <?php if ($bicycle->get_content_condition_id() == $cond_id) {
                                                                echo 'selected';
                                                            } ?>><?php echo $cond_name; ?></option>
            <?php } ?>
        </select>
    </div>
</div>


<div class="form-group row">
    <label for="inputWeight" class="col-sm-2 col-form-label">Weight (kg)</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="bicycle[weight_kg]" id="inputWeight"
            value="<?php echo h($bicycle->get_content_weight_kg()); ?>" />
    </div>
</div>


<div class="form-group row">
    <label for="inputPrice" class="col-sm-2 col-form-label">Price $</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="bicycle[price]" id="inputPrice"
            value="<?php echo h($bicycle->get_content_price()); ?>" />
    </div>
</div>

<div class="form-group row">
    <?php
    // Set author name
    if ($bicycle->get_content_author() == '') {
        if (isset($cookie))
            $bicycle->set_content_author($cookie->get_username());
    }
    ?>

    <label for="inputAuthor" class="col-sm-2 col-form-label">Author</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" size="18" name="bicycle[author]" id="inputAuthor"
            value="<?php echo h($bicycle->get_content_author()) ?>" readonly />
    </div>
</div>

<div class="form-group row">
    <label for="textareaDesription" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea name="bicycle[description]" class="form-control" rows="3" id="textareaDesription" cols="40"
            placeholder="Describe the bike in a few words."><?php echo h($bicycle->get_content_decription()); ?></textarea>
        </dd>
    </div>
</div>