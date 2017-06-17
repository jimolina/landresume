<?php
/**
 * Template part for displaying pages type Skills Content on front page
 *
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<div id="<?php echo $page->post_name; ?>" class="page skills">
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
    <div class="col-sm-12 col-md-6 content circles">
        <h1 class="title"><?php echo $page->post_title; ?></h1>
        <?php echo $page->post_content; ?>
        <?php
            $optSkillsCat = explode(',',get_option( 'skills_categories' ));
            $cats = get_categories(['orderby' => 'name', 'order' => 'DESC']);
            $catIcon = ['fa-code', 'fa-paint-brush '];
            $i = $loop = 1;

            foreach ( $cats as $cat ):
                $catId = $cat->term_id;

                if ( in_array($catId, $optSkillsCat) ):
        ?>
                    <h5 class="sub_titles mt-5"><span class="icon-round"><i class="fa <?php echo $catIcon[($i-1)]; ?>"></i></span> <?php echo $cat->name; ?></h5>
                    <?php
                        query_posts( [
                            'cat' => $catId, 'orderby' => 'order', 'order' => 'ASC'
                        ] );

                        $numPosts = $wp_query->found_posts;

                        while ( have_posts() ) : 
                            the_post(); 

                            $postOrder = get_post_meta($post->ID, 'order', true);
                            $postPercent = get_post_meta($post->ID, 'percent', true) . '%';
                    ?>       
                            <div class="card">
                                <div class="card-header row">
                                    <div class="c100 p90 small">
                                        <span><?php echo $postPercent; ?></span>
                                        <div class="slice">
                                            <div class="bar"></div>
                                            <div class="fill"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <h4 class="card-title">
                                        <?php echo $post->post_title; ?>
                                        <?php if ( '' != $post->post_content ): ?>
                                            <span>[<?php echo $post->post_content; ?>]</span>
                                        <?php endif; ?>        
                                    </h4>
                                </div>
                            </div>
                            <?php ( $loop < $numPosts ) ? $loop++ : $loop = 1; ?>
                    <?php
                        endwhile;
                        wp_reset_postdata(); 
                    ?>
        <?php
                    $i++;
                endif;
            endforeach;
        ?>

        <?php require get_template_directory() . '/inc/templates/frontend/download-resume.php'; ?>

    </div>
</div>