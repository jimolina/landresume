<div id="jmAwesomePluginContainer" class="row">
	<div class="form-group col-12">
		<?php
			$settings = array( 'media_buttons' => false );

			wp_editor( $jm_awesome_stored_meta['jm_awesome_content'][0], 'jm_awesome_content', $settings );
		?>
	</div>
	<div class="form-group col-6">
		<label for="jm-awesome-icon">Icon</label>
		<div class="input-group iconpicker-container">
	        <input type="text" name="jm_awesome_icon" id="jm-awesome-icon" data-placement="bottomRight" class="form-control iconpicker-element iconpicker-input" 
	        	value="<?php echo (!empty($jm_awesome_stored_meta['jm_awesome_icon'][0])) ? esc_attr( $jm_awesome_stored_meta['jm_awesome_icon'][0] ) : 'fa-facebook'; ?>"
	        	requiered="requiered">
	        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
	    </div>
	</div>
	<div class="form-group col-6">
		<label for="jm-awesome-position">Position</label>
		<select class="form-control" name="jm_awesome_position" id="jm-awesome-position" requiered="requiered">
			<?php 
				$pages = get_pages(['sort_column' => 'menu_order']); 

        		foreach ( $pages as $page ):
        	?>
					<option value="<?php echo $page->post_name; ?>"
						<?php echo ( ! empty( $jm_awesome_stored_meta['jm_awesome_position'][0] ) && ( $page->post_name == strtolower($jm_awesome_stored_meta['jm_awesome_position'][0]) ) ) ? ' selected="selected"' : ''; ?>><?php echo $page->post_title; ?></option>
        	<?php
        		endforeach;
        	?>
		</select>
	</div>
	<div class="form-group col-12">
		<label for="jm-awesome-url">Url</label>
		<input type="text" class="form-control" name="jm_awesome_url" id="jm-awesome-url" maxlength="50" 
			value="<?php echo (!empty($jm_awesome_stored_meta['jm_awesome_url'][0])) ? esc_attr( $jm_awesome_stored_meta['jm_awesome_url'][0] ) : ''; ?>">
    </div>
</div>