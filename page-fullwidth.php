<?php
    /*
    Template Name: Full-width layout
    Template Post Type: post, page
    */
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    get_header();

    if (have_posts()) :
        while (have_posts()) : the_post();
?>
    <div class="block-title" style="background-image: url('<?=get_template_directory_uri()?>/images/bg_page.jpg');">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="oswald text-uppercase"><?=the_title();?></h1>
                </div>
            </div>
        </div>
    </div>
    <main class="archives single">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="recent-posts">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <article id="post-<?=the_ID();?>" <?=post_class();?>>
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lx-12">
                                                <div class="entry-content">
                                                    <?=the_content();?>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </main>
<?php
        endwhile;
    endif;
    wp_reset_postdata();

    get_footer();