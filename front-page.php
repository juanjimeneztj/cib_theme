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
                            <p class='label-gsweb'>MOST RECENT</p>
                            <h1>".get_the_title()."</h1>
                            <p class='post-details'>".get_the_author()." | ".get_the_date()."</p>
                            <p class='post-btn'><a class='btn btn-no-rounded' href='".get_permalink()."'>Read Article</a></p>
                        </div>
                    </div>";
                    $actP++;
                }else{
                    $carouselItemsCode.="<li data-target='#carouselExampleIndicators' data-slide-to='$actP'></li>";
                    $carouselArticlesCode.= "<div class='carousel-item'>
                        <img class='d-block w-100' src='".get_the_post_thumbnail_url()."' alt='slide'>
                        <div class='description-Item'>
                            <p class='label-gsweb'>MOST RECENT</p>
                            <h1>".get_the_title()."</h1>
                            <p class='post-details'>".get_the_author()." | ".get_the_date()."</p>
                            <p class='post-btn'><a class='btn btn-no-rounded' href='".get_permalink()."'>Read Article</a></p>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
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
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                <div class="block-home-page" style="background-image: url('http://localhost/FinMC/2020/classifiedintelligencebrief/wordpress/wp-content/uploads/2020/10/bg3.png');">
                    <h1 class="text-uppercase oswald">
                        Get Dr. Moor&#39;s Insights <br class="d-none d-md-block" />
                        <strong>In Your Inbox</strong> <br class="d-none d-md-block" />
                        <span class="oswald">As Soon As They Come Out</span>
                    </h1>
                    <?php if ( is_active_sidebar( 'home-page-widget' ) ) : ?>
                        <div id="home-page-widget" class="primary-sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'home-page-widget' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="recent-posts">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="box">
                                    <div class="row align-items-center" id="ajax-posts">
                                        <?php 
                                            $args = array (
                                                'posts_per_page'         => '6',
                                                'order'                  => 'DESC'
                                            );
                                            
                                            $all_query = new WP_Query( $args );

                                            if ($all_query->have_posts()) :
                                                while ($all_query->have_posts()) : $all_query->the_post();
                                        ?>
                                                    
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
                                                    <article id="post-<?php the_ID();?>" <?php post_class();?>>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                <a href="<?=get_the_permalink()?>">
                                                                    <img src="<?=get_the_post_thumbnail_url()?>" class="img-fluid" alt="Responsive image">
                                                                </a>
                                                            </div>
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                                                <h3 class="oswald text-uppercase"><a class="oswald text-uppercase" href="<?=get_the_permalink()?>"><?php the_title();?></a></h3>
                                                                <p class="post-details"><?=get_the_author()?> &#124; <?=get_the_date()?></p>
                                                                <div class="entry-content">
                                                                    <?php the_excerpt();?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                        <?php 
                                                endwhile;
                                            endif;
                                            wp_reset_postdata();
                                        ?>
                                    </div>  
                                    <div class="row">
                                        <div class="col text-center mb-5">
                                            <button type="button" class="btn btn-no-rounded text-uppercase oswald btn-load-more" id="more_posts">Load More Articles</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="cib-about">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="img-moors">
                                <img src="<?=get_template_directory_uri()?>/images/dr_moors.png" alt="Dr. Moors">   
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <div class="description">
                                <h3>About</h3>

                                <h2 class="text-uppercase oswald">Dr. Kent Moors</h2>
                                
                                <p>Dr. Kent Moors is a major figure in global investment, risk assessment, finance, and public policy analysis. His high-profile visibility and over forty years of advising the largest international energy producers, a wide array of US and foreign companies, 29 world governments, US governors, Canadian premiers, and market makers in 32 countries has resulted in an extensive network of personal contacts, an “early detection” system for maximizing investment profits.</p>

                                <p>Having guided governments, corporations, financial institutions, institutional investors, hedge funds, Wall Street analysts, and capital/asset managers worldwide, over a decade ago Dr. Moors turned his attention to helping average individual investors. What then followed was an amazing record of making profits for his subscribers.   </p>

                                <p>He has combined four successful careers – university professor and scholar; global energy advising; geopolitical and economic risk assessment; and intelligence officer. Often these would run simultaneously, resulting in a unique ability to make people money while negotiating rapidly changing markets and events. </p>

                                <p>Dr. Moors is particularly known among policy makers for providing targeted political, market and risk assessments in crises or rapidly changing environments He is a leading “go-to” consultant for public and private sector entities addressing geopolitical developments impacting policy and security concerns. In addition to a range of energy-related topics, he has most recently advised on US-Chinese trade disagreements, fallout from the Iranian sanctions, the Saudi-Qatari diplomatic impasse, instability in Venezuela, and the South China Sea crisis. </p>

                                <p>Dr. Moors has appeared over 2,600 times as a featured television, radio and media commentator in North America, Europe and Russia—including ABC, BBC, Bloomberg TV, Canadian CBC, CBS, Chinese CGTN, CNBC, CNN, Fox Business Network, NBC and Russian RTV, REN, and STS networks. A prolific writer and lecturer, his over 3,400 professional/market publications and over 800 private/public sector presentations and workshops have appeared in 47 countries. </p>

                                <p>His first degree (at age 16) was a B.S. in theoretical physics. Subsequent A.B., M.A. and Ph.D. degrees were obtained in political science and public policy.”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php get_footer();