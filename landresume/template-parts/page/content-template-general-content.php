<?php
/**
 * Template part for displaying pages type General Content on front page
 *
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<div id="<?php echo $page->post_name; ?>" class="page">
    <?php if ( wp_get_attachment_url(get_post_thumbnail_id($page->ID)) ) : ?>
        <style type="text/css">
            #<?php echo $page->post_name; ?> .content-picture {
                    background: transparent url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($page->ID)); ?>) no-repeat local center center / cover;
                }
            }
        </style>
    <?php endif; ?>
    <div class="col-sm-12 col-md-6 content-picture">

    </div>
    <div class="col-sm-12 col-md-6 content">
        <h1 class="title"><?php echo $page->post_title; ?></h1>
        <?php echo $page->post_content; ?>
        <ul class="list-group tags no-gutters mt-4 mb-4">
            <?php 
                query_posts( [
                    'post_type' => 'jm_awesome', 'meta_key' => 'jm_awesome_position', 'meta_value' => $page->post_name, 'orderby' => 'order', 'order' => 'ASC'
                ] );

                while (have_posts()) : 
                    the_post(); 
                    $postAwesomeIcon = get_post_meta($post->ID, 'jm_awesome_icon', true);
                    $postAwesomeContent = get_post_meta($post->ID, 'jm_awesome_content', true);

            ?>
                    <li class="list-group-item no-gutters">
                        <div class="col-4 icon"><i class="fa <?php echo $postAwesomeIcon;?> fa-2x"></i><?php echo $post->post_title; ?></div>
                        <div class="col-8 text-right"><?php echo $postAwesomeContent; ?></div>
                    </li>
            <?php 
                endwhile; 
                wp_reset_postdata(); 
            ?>
        </ul>

        <?php require get_template_directory() . '/inc/templates/frontend/download-resume.php'; ?>

    </div>
</div>
<!-- Comments Avatar, Page Pagination, Comments Pagination -->
<!-- This element is not really used in the Theme. But you are free to activate it just removing the class "hidden-xl-down" below -->
<ol class="hidden-xl-down">
    <?php
        //Gather comments for a specific page/post 
        $comments = get_comments(array(
            'post_id' => $page->ID,
            'status' => 'approve' //Change this to the type of comments to be displayed
        ));

        //Display the list of comments
        wp_list_comments(array(
            'per_page' => 1, //Allow comment pagination
            'reverse_top_level' => false, //Show the oldest comments at the top of the list
            'avatar_size' => 1 //Show the avatar
        ), $comments);
    ?>
    <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
    <?php the_comments_pagination( array( 'mid_size' => 2 ) ); ?>
</ol>