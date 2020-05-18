<div class="wrap">
    <h1>Slider Setting</h1>
    <?php settings_errors(); ?>
    <form action="options.php" method="POST">
        <?php settings_fields( 'slider-option-group' );
        do_settings_sections( 'slider-setting' );
        submit_button( 'Save' );
        ?>
    </form>
</div>