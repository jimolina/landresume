<input type="button" value="Upload Resume File" id="upload-button" class="button button-secondary">
<?php if ( isset ( $resumeFile ) ): ?>
    <p><small><a href="<?php echo $resumeFile; ?>" id="resume-file-selected" target="_Blank"><?php echo $resumeFile; ?></a></small></p>
<?php endif; ?>
<input type="hidden" name="resume_file" id="resume-file" value="<?php echo $resumeFile; ?>">