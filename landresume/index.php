<?php 

/*
	Template Name: Home
*/

get_header(); ?>

	<?php
		$pages = get_pages(['sort_column' => 'menu_order']); 

        foreach ( $pages as $page ) {
            $pageTheme = get_page_template_slug( $page->ID );

            if (file_exists(get_template_directory() . '/template-parts/page/content-'.$pageTheme)) {
               require get_template_directory() . '/template-parts/page/content-' . $pageTheme;

            }
		}
	?>

<?php get_footer(); ?>