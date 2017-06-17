<div class="wrap">
    <h1>LandResume Theme: General Info Options</h1>
    <?php settings_errors(); ?>
    <form method="post" action="options.php">
        <?php settings_fields( 'landresume-settings-group' ); ?>
        <?php do_settings_sections( 'landresume_theme_create_page' );?>
        <?php submit_button(); ?>
    </form>
</div>