<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if (have_posts()) :
    while (have_posts()) : the_post();
        $cat = get_the_category(); 
    endwhile;
endif;

$catName = str_replace(" ","-",$cat[0]->cat_name);
switch ($catName) {
    case 'weekly-spotlight':
        get_template_part( 'template_parts/singles/single', $catName );
        break;
    case 'tech-talk':
        get_template_part( 'template_parts/singles/single', $catName );
        break;
    default:
        get_template_part( 'template_parts/singles/single', 'default' );
        break;
}
