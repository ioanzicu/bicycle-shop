<?php if (isset($super_hero_image)) { ?>

<div class="expanding-wrapper">
    <!-- <div> -->
    <?php $image_url = url_for('/images/' . $super_hero_image); ?>
    <img id="super-hero-image" src="<?php echo $image_url; ?>" />
    <footer>
        <?php include SHARED_PATH . '/public_copyright_disclaimer.php'; ?>
    </footer>
</div>

<?php } else { ?>

<footer>
    <?php include SHARED_PATH . '/public_copyright_disclaimer.php'; ?>
</footer>

<?php } ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
</body>

</html>

<?php db_disconnect($database); ?>