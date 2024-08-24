<?php
 /* 
Template Name: Новости
*/
get_header(); ?>
<section class="news">
    <div data-aos="fade-right" class="news__decor-3"><img src="<?=get_template_directory_uri()?>/assets/images/decors/half_circle_grey_blured2.svg"/></div>
    <div data-aos="fade-left" class="news__decor-1"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle7_blured.png"/></div>
    <div data-aos="fade-left" class="news__decor-2"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle6_blured.png"/></div>
    <div class="container">
        <div class="news-container">
            <div class="black_header">
            <?the_title()?>
            </div>
            <div class="news-content">
                <div class="news__list">
                <?php
                    $args = array(
                    'post_type' => 'news',
                    'order'=>'DESC',
                    'orderby'=>'post_date',
                    'meta_query' => array(
                    )
                    );
                    $res = new WP_Query($args);
                    $i = 0;
                    while($res->have_posts()) :  $res->the_post(); $i++;
                ?>
                 <?  $ssylka = get_field('ssylka_na_vneshnij_istochnik');
                        if($ssylka == ''){
                            $ssylka = '';
                        }
                ?>
                    <a <?if($ssylka){?>href="<?=$ssylka?>"<?}?> class="news__list-item" data-aos="fade-up">
                        <div class="news__image">
                            <?php the_post_thumbnail() ?>
                        </div>
                        <div class="news__text">
                            <div>
                                <?=get_the_date('d F Y')?> г.
                            </div>
                            <div>
                                <?the_excerpt()?>
                            </div>
                        </div>
                    </a>
                <?php endwhile;
                wp_reset_query();
                ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?get_footer();?>