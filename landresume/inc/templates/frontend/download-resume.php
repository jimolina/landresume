<?php if ( ( 'yes' == esc_attr( get_option( 'footer_download' ) ) ) && ( '' != esc_attr( get_option( 'resume_file' ) ) ) ): ?>
    <div class="btn-download">
        <a href="<?php echo esc_attr( get_option( 'resume_file' ) ); ?>" target="_Blank" class="btn btn-outline-danger"><i class="fa fa-cloud-download fa-lg"></i> Download Resume</a>
    </div>
<?php endif; ?>