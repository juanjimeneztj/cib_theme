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
                <?php if ( is_active_sidebar( 'home-page-widget' ) ) : ?>
                    <div id="home-page-widget" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'home-page-widget' ); ?>
                    </div>
                <?php endif; ?>
                <div class="block-home-page" style="background-image: url('http://localhost/FinMC/2020/classifiedintelligencebrief/wordpress/wp-content/uploads/2020/10/bg3.png');">
                    <h1 class="text-uppercase oswald">
                        Get Dr. Moor&#39;s Briefs <br class="d-none d-md-block" />
                        <strong>In Your Inbox</strong> <br class="d-none d-md-block" />
                        <span class="oswald">As Soon As They Come Out</span>
                    </h1>
                    <form id="sf_form_salesforce_w2l_lead_2_sidebar" class="w2llead top-aligned" method="post" action="#sf_form_salesforce_w2l_lead_2_sidebar" name="frmHome">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" name="first_name" id="sf_first_name" required />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope-open"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" name="email" id="sf_email" required />
                        </div>
                        <input type="hidden" id="sf_Campaign_ID" class="w2linput hidden" name="Campaign_ID" value="7016g000000NCDlAAO">		
                        <!--<div class="sf_field sf_field_cb sf_type_checkbox sf_cc_user">
                            <label class="w2llabel checkbox w2llabel-checkbox-label">
                                <input type="checkbox" name="w2lcc" class="w2linput checkbox" value="1"> Send me a copy
                            </label>
                        </div>	-->
                        <input type="text" name="message" class="w2linput" value="" style="display: none;">	
                        <input type="hidden" name="form_id" class="w2linput" value="2">
                        <button type="submit" name="w2lsubmit" class="btn d-block w-100 oswald text-uppercase">Sign Up Today</button>
                    </form>
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
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="img-moors">
                                <img src="<?=get_template_directory_uri()?>/images/dr_moors.png" alt="Dr. Moors">   
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <h3>About</h3>

                            <h2 class="text-uppercase oswald">Dr. Kent Moors</h2>
                            
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nam, in consequatur accusantium officiis doloremque possimus! Molestiae ducimus sed commodi veritatis, culpa omnis totam tempore beatae. Voluptatem maxime quas quod.</p>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa amet nihil sunt incidunt quo, vitae magni maiores porro sapiente corrupti reprehenderit et suscipit quasi voluptas quisquam deleniti eos praesentium natus illum debitis? Voluptates, molestias. Aspernatur sit quia ipsum doloremque eum eos officia optio, non hic placeat iure ullam id rerum, ratione nisi iste nam neque saepe quasi cupiditate. Placeat ad ex numquam assumenda maiores ea vel quos aut esse dignissimos fugiat, reprehenderit eius sequi fuga dolore, unde dolor quis ipsum!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php get_footer();