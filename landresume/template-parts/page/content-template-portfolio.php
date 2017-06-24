<div id="<?php echo $page->post_name; ?>" class="page portfolio">
    <div class="col-sm-12 content">
        <h1 class="title"><?php echo $page->post_title; ?></h1>
        <h4 class="mt-5">
            <?php echo $page->post_content; ?>            
        </h4>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs portfolio-filters justify-content-center mt-5" role="tablist">
            <?php
                $optPortfolioCat = explode(',',get_option( 'portfolio_categories' ));
                $cats = get_categories(['orderby' => 'name', 'order' => 'DESC']);
                $i = 1;

                foreach ( $cats as $cat ):
                    $catId = $cat->term_id;

                    if ( in_array($catId, $optPortfolioCat) ):
                        $catLayerId = strtolower(str_replace(' ', '_', $cat->name));
            ?>
                        <li class="nav-item mr-2">
                            <a class="nav-link btn <?php echo ( '1' == $i ) ? 'active' : ''; ?>" data-toggle="tab" href="#<?php echo $catLayerId; ?>" role="tab"><?php echo $cat->name; ?></a>
                        </li>
            <?php 
                        $i++;

                    endif;
                endforeach; 
            ?>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content mb-5">
            <?php
                $i = 1;

                foreach ( $cats as $cat ):
                    $catId = $cat->term_id;

                    if ( in_array($catId, $optPortfolioCat) ):
                        $loop = 1;
                        $catLayerId = strtolower(str_replace(' ', '_', $cat->name));
            ?>
                        <div class="tab-pane active fade <?php echo ( '1' == $i ) ? 'show' : ''; ?>" id="<?php echo $catLayerId; ?>" role="tabpanel">
                            <div class="clearfix">
                                <ul class="list-unstyled portfolio-grid row mt-5">
                                    <?php
                                        query_posts( [
                                            'cat' => $catId, 'orderby' => 'order', 'order' => 'ASC'
                                        ] );

                                        $numPosts = $wp_query->found_posts;

                                        while ( have_posts() ) : 
                                            the_post(); 

                                            $postDate = get_post_meta($post->ID, 'date', true);
                                            $postCategories = get_post_meta($post->ID, 'categories', true);
                                            $postDevelopedFor = get_post_meta($post->ID, 'developed_for', true);
                                            $postUrl = get_post_meta($post->ID, 'url', true);
                                            $postImg = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                    ?>   
                                            <li class="<?php echo $catLayerId . '_' . ($loop); ?>">
                                                <img src="<?php echo $postImg; ?>" class="img-fluid" title="<?php echo $post->post_title; ?>">
                                                <div class="shadow" data-title="<?php echo $post->post_title; ?>" data-description="<?php echo $post->post_content; ?>"
                                                    data-date="<?php echo $postDate; ?>" data-url="<?php echo $postUrl; ?>" data-categories="<?php echo $postCategories; ?>" data-for="<?php echo $postDevelopedFor; ?>" data-as="" data-for-url=""  
                                                    data-previous="<?php echo $catLayerId; ?>_<?php echo ($loop > 1) ? ($loop-1) : $numPosts; ?>" 
                                                    data-next="<?php echo $catLayerId; ?>_<?php echo ($loop < $numPosts) ? ($loop+1) : 1;  ?>">
                                                    <p><?php echo $post->post_title; ?></p>
                                                </div>                                               
                                            </li>
                                    <?php
                                            $loop++;

                                        endwhile;
                                        wp_reset_postdata(); 
                                    ?>
                                </ul>
                            </div>
                        </div>

            <?php
                        $i++;
                    endif;
                endforeach; 
            ?>
        </div>

        <?php require get_template_directory() . '/inc/templates/frontend/download-resume.php'; ?>

    </div>
</div>
<?php require get_template_directory() . '/inc/templates/frontend/portfolio-detail.php'; ?>

<!-- Tags -->
<!-- This element is not really used in the Theme. But you are free to activate it just removing the class "hidden-xl-down" below -->
<p class="hidden-xl-down tag"><?php the_tags(); ?></p>