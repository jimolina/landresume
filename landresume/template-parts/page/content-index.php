<?php
/**
 * Template part for displaying pages type HOME on front page
 *
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<?php if ( has_post_thumbnail() ) : ?>
    <style type="text/css">
        body::before {
            background: #CCC url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($page->ID)); ?>) no-repeat fixed center top / cover;
            content: "";
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: -1;
            -webkit-filter: opacity(0.6);
            filter: opacity(0.6);
        }
    </style>
<?php endif; ?>
<div id="<?php echo $page->post_name; ?>" class="page home">
	<div id="info" class="info">
		<div class="container">
			<?php echo $page->post_content; ?>
            <div id="icons" class="icons mt-5 mx-auto">
                <ul class="list-unstyled list-inline">
                    <?php 
                        query_posts( [
                            'post_type' => 'jm_awesome', 'meta_key' => 'jm_awesome_position', 'meta_value' => $page->post_name, 'orderby' => 'order', 'order' => 'ASC', 'showposts' => 10
                        ] );

                        while (have_posts()) : 
                            the_post(); 
                            $key++;
                            $postAwesomeIcon = get_post_meta($post->ID, 'jm_awesome_icon', true);
                            $postAwesomeUrl = get_post_meta($post->ID, 'jm_awesome_url', true);
                    ?>
                            <li id="<?php echo ($key-1); ?>" class="list-inline-item" style="animation-delay:<?php echo ($key>0) ? ($key*0.2) : $key; ?>s">
                                <a href="<?php echo $postAwesomeUrl; ?>" target="_blank" class="bg-circle">
                                    <i class="fa <?php echo $postAwesomeIcon; ?> fa-2x fa-inverse"></i>
                                    <i class="fa <?php echo $postAwesomeIcon; ?> fa-2x mt-3"></i>
                                </a>
                            </li>
                    <?php 
                        endwhile; 
                        wp_reset_postdata(); 
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php if ( 'yes' == esc_attr( get_option( 'footer_home' ) ) ): ?>
    	<p class="bubble first">
    		<a class="btn btn-sm white scrollitem" href="#contactme">
      			<i class="fa fa-envelope-o fa-2x pull-left"></i> <small>I'm available for</small><br>FREELANCE
    		</a>
    	</p>
        <?php if ( ( 'yes' == esc_attr( get_option( 'footer_download' ) ) ) && ( '' != esc_attr( get_option( 'resume_file' ) ) ) ): ?>
        	<p class="bubble second">
        		<a class="btn btn-sm white" href="<?php echo esc_attr( get_option( 'resume_file' ) ); ?>" target="_Blank">
          			<i class="fa fa-cloud-download fa-2x pull-left"></i> <small>My Resume</small><br>DOWNLOAD
        		</a>
        	</p>
        <?php endif; ?>
    <?php endif; ?>
</div>