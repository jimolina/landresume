<div class="btn-group" data-toggle="buttons">
    <label class="btn btn-primary btn-sm <?php echo ( isset ( $footerHome ) && ('' != $footerHome) ) ? ( 'yes' == $footerHome ) ? 'active' : '' : 'active'; ?>">
        <input type="radio" name="footer_home" id="footer-home-1" value="yes" autocomplete="off" <?php echo ( isset ( $footerHome ) ) ? ( 'yes' == $footerHome ) ? 'checked' : '' : 'checked'; ?>> Yes
    </label>
    <label class="btn btn-primary btn-sm <?php echo ( isset ( $footerHome ) && ('' != $footerHome)  ) ? ( 'no' == $footerHome ) ? 'active' : '' : ''; ?>">
        <input type="radio" name="footer_home" id="footer-home-2" value="no" autocomplete="off" <?php echo ( isset ( $footerHome ) ) ? ( 'no' == $footerHome ) ? 'checked' : '' : ''; ?>> No
    </label>
</div>