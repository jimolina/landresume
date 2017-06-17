<div class="btn-group" data-toggle="buttons">
    <label class="btn btn-primary btn-sm <?php echo ( isset ( $footerDownload ) && ('' != $footerDownload) ) ? ( 'yes' == $footerDownload ) ? 'active' : '' : 'active'; ?>">
        <input type="radio" name="footer_download" id="footer-download-1" value="yes" autocomplete="off" <?php echo ( isset ( $footerDownload ) ) ? ( 'yes' == $footerDownload ) ? 'checked' : '' : 'checked'; ?>> Yes
    </label>
    <label class="btn btn-primary btn-sm <?php echo ( isset ( $footerDownload ) && ('' != $footerDownload)  ) ? ( 'no' == $footerDownload ) ? 'active' : '' : ''; ?>">
        <input type="radio" name="footer_download" id="footer-download-2" value="no" autocomplete="off" <?php echo ( isset ( $footerDownload ) ) ? ( 'no' == $footerDownload ) ? 'checked' : '' : ''; ?>> No
    </label>
</div>