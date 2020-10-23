<?php
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    get_header();

    if (have_posts()) :
        while (have_posts()) : the_post();
?>
    <div class="block-title" style="background-image: url('<?=get_the_post_thumbnail_url()?>');">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="oswald text-uppercase"><?=the_title();?></h1>
                    <p><small><?=get_the_author()?> | <?=get_the_date()?></small></p>
                </div>
            </div>
        </div>
    </div>
    <main class="archives single">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9">
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

                <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                    <aside class="sidebar">
                        <?php if ( is_active_sidebar( 'sidebar-post-widget' ) ) : ?>
                            <div id="sidebar-post-widget" class="primary-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'sidebar-post-widget' ); ?>
                            </div>
                        <?php endif; ?>
                    </aside>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </main>
<?php
        endwhile;
    endif;
    wp_reset_postdata();

    get_footer();