<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

get_header();?>

<main class="main-content home-page">

    <?php 
        $actP = 0;
        $carouselCode = '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators">';
        $carouselItemsCode = "";
        $carouselArticlesCode = "";

        $args = array (
            'posts_per_page'         => '5',
            'order'                  => 'DESC',
        );
        
        $query = new WP_Query( $args );

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                if($actP === 0){
                    $carouselItemsCode="<li data-target='#carouselExampleIndicators' data-slide-to='$actP' class='active'></li>";
                    $carouselArticlesCode = "<div class='carousel-item active'>
                        <img class='d-block w-100' src='".get_the_post_thumbnail_url()."' alt='slide'>
                        <div class='description-Item'>
                            <h1>".get_the_title()."</h1>
                            <p>".get_the_excerpt()."</p>
                            <p class='post-details'>".get_the_author()." | ".get_the_date()."</p>
                            <p class='post-btn'><a class='btn' href='".get_permalink()."'>Read Article</a></p>
                        </div>
                    </div>";
                    $actP++;
                }else{
                    $carouselItemsCode.="<li data-target='#carouselExampleIndicators' data-slide-to='$actP'></li>";
                    $carouselArticlesCode.= "<div class='carousel-item'>
                        <img class='d-block w-100' src='".get_the_post_thumbnail_url()."' alt='slide'>
                        <div class='description-Item'>
                            <h1>".get_the_title()."</h1>
                            <p>".get_the_excerpt()."</p>
                            <p class='post-details'>".get_the_author()." | ".get_the_date()."</p>
                            <p class='post-btn'><a class='btn' href='".get_permalink()."'>Read Article</a></p>
                        </div>
                    </div>";
                    $actP++;
                }
            endwhile;
        endif;
        wp_reset_postdata();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-lx-7">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?=$carouselItemsCode?>
                    </ol>
                    <div class="carousel-inner">
                        <?=$carouselArticlesCode?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="recent-posts">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <?php 
                                    $args = array (
                                        'posts_per_page'         => '8',
                                        'order'                  => 'DESC'
                                    );
                                    
                                    $all_query = new WP_Query( $args );

                                    if ($all_query->have_posts()) :
                                        while ($all_query->have_posts()) : $all_query->the_post();
                                ?>
                                            <article id="post-<?php the_ID();?>" <?php post_class();?>>
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lx-4">
                                                        <a href="<?=get_the_permalink()?>">
                                                            <img src="<?=get_the_post_thumbnail_url()?>" class="img-fluid" alt="Responsive image">
                                                        </a>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-lx-8">
                                                        <h3 class="oswald text-uppercase"><a class="oswald text-uppercase" href="<?=get_the_permalink()?>"><?php the_title();?></a></h3>
                                                        <div class="entry-content">
                                                            <?php the_excerpt();?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                <?php 
                                        endwhile;
                                    endif;
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-lx-5">
                <?php if ( is_active_sidebar( 'home-page-widget' ) ) : ?>
                    <div id="home-page-widget" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'home-page-widget' ); ?>
                    </div>
                <?php endif; ?>
                <div class="block-home-page" style="background-image: url('http://localhost/FinMC/2020/classifiedintelligencebrief/wordpress/wp-content/uploads/2020/10/bg3.png');">
                    <h1 class="text-uppercase">Lorem Ipsum</h1>
                    <a href="#" class="btn oswald text-uppercase">Get It Now</a>
                </div>

                <h1 class="ce-headline text-uppercase oswald">Tech Talk</h1>
                <div class="last-tech-talk-posts">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <?php 
                                    $args = array (
                                        'posts_per_page'         => '1',
                                        'order'                  => 'DESC',
                                        'category_name'          => 'tech-talk',
                                    );
                                    
                                    $tech_query = new WP_Query( $args );

                                    if ($tech_query->have_posts()) :
                                        while ($tech_query->have_posts()) : $tech_query->the_post();
                                ?>
                                            <article id="post-<?php the_ID();?>" <?php post_class();?>>
                                                <h3 class="oswald text-uppercase"><a class="oswald text-uppercase" href="<?=get_the_permalink()?>"><?php the_title();?></a></h3>
                                                <p><small><?=get_the_date()?></small></p>
                                                <div class="entry-content">
                                                    <?php the_excerpt();?>
                                                </div>
                                                <a href="<?=get_the_permalink()?>" class="btn-link text-uppercase oswald">Read More</a>
                                            </article>
                                <?php 
                                        endwhile;
                                    endif;
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php get_footer();