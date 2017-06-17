<?php
/**
 * Template part for displaying pages type Resume Content on front page
 *
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<div id="<?php echo $page->post_name; ?>" class="page resume">
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
        <?php
            $optResumeCat = explode(',',get_option( 'education_categories' ));
            $cats = get_categories(['orderby' => 'name', 'order' => 'DESC']);
            $catIcon = ['fa-suitcase', 'fa-book'];
            $i = $loop = 1;

            foreach ( $cats as $cat ):
                $catId = $cat->term_id;

                if ( in_array($catId, $optResumeCat) ):
                    $format = ($i % 2) ? 'calendar' : 'list';
        ?>
                    <h5 class="sub_titles mt-5"><span class="icon-round"><i class="fa <?php echo $catIcon[($i-1)]; ?>"></i></span> <?php echo $cat->name; ?></h5>
                    <?php
                        query_posts( [
                            'cat' => $catId, 'orderby' => 'order', 'order' => 'ASC'
                        ] );

                        $numPosts = $wp_query->found_posts;

                        while ( have_posts() ) : 
                            the_post(); 

                            $superName = get_post_meta($post->ID, 'supervisor_name', true);
                            $superPhone = get_post_meta($post->ID, 'supervisor_phone', true);
                            $superEmail = get_post_meta($post->ID, 'supervisor_email', true);
                    ?>       
                            <?php if ( 'calendar' == $format ){ ?>
                                <div class="card mt-5 mb-1">
                                    <div class="card-block date">
                                        <?php echo get_post_meta($post->ID, 'date', true);?>
                                    </div>
                                </div>
                                <div class="card detail <?php echo ( $loop < $numPosts ) ? 'connect' : '' ; ?>">
                                    <div class="card-block">
                                        <h4 class="card-title"><?php echo $post->post_title; ?></h4>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo get_post_meta($post->ID, 'position', true);?></h6>
                                        <p class="card-text">
                                            <?php echo $post->post_content; ?>
                                            <?php 
                                                if ( 
                                                    ( '' != $superName ) ||
                                                    ( '' != $superPhone ) ||
                                                    ( '' != $superEmail )
                                                ) {
                                            ?>
                                                    <small class="mt-4">
                                                        <i class="fa fa-group"></i> Supervisor: 
                                                        <?php if ( '' != $superName ) : ?><?php echo $superName; ?> | <?php endif; ?>
                                                        <?php if ( '' != $superPhone ) : ?><?php echo $superPhone; ?> | <?php endif; ?>
                                                        <?php if ( '' != $superEmail ) : ?><a href="mailto:<?php echo $superEmail; ?>"><?php echo $superEmail; ?></a> <?php endif; ?>
                                                    </small>
                                            <?php 
                                                }
                                            ?>
                                            <small class=""><i class="fa fa-map-marker"></i> <?php echo get_post_meta($post->ID, 'location', true);?></small>
                                        </p>
                                    </div>
                                </div>
                                <?php ( $loop < $numPosts ) ? $loop++ : $loop = 1; ?>
                            <?php } else { ?>
                                <?php echo ( '1' == $loop ) ? '<ul class="list-group tags bg-education mt-4 mb-4">' : ''; ?>
                                    <li class="list-group-item no-gutters">
                                        <div class="col-4 icon"><?php echo $post->post_content; ?></div>
                                        <div class="col-8 text-right">
                                            <a href="<?php echo get_post_meta($post->ID, 'url', true);?>" class="top" target="_Blank"><?php echo $post->post_title; ?></a>
                                        </div>
                                        <div class="col-4 icon">
                                            <small><?php echo get_post_meta($post->ID, 'date', true);?></small>
                                        </div>
                                        <div class="col-8 text-right">
                                            <small><i class="fa fa-map-marker"></i> <?php echo get_post_meta($post->ID, 'location', true);?></small>
                                        </div>
                                    </li>
                                <?php echo ( $loop == $numPosts ) ? '</ul>' : ''; ?>
                                <?php ( $loop < $numPosts ) ? $loop++ : $loop = 1 ; ?>
                            <?php } ?>
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