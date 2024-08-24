<?php
 /* 
Template Name: Карьера
*/
get_header(); ?>
<section class="karjera">
    <div data-aos="fade-right" class="karjera__decor-3"><img src="<?=get_template_directory_uri()?>/assets/images/decors/half_circle_grey_blured2.svg"/></div>
    <div class="container">
        <div class="karjera-container">
            
            <div class="black_header">
                <?the_title()?>
            </div>
            <div class="karjera-content">
                <div>
                    <?the_content()?>
                </div>
                <div class="red_header">Открытые вакансии <br class="only-mobile"> в компании LAD</div>
                <?php
                    $args = array(
                    'post_type' => 'vacancy',
                    'order'=>'ASC',
                    'order_by'=>'menu_order',
                    'meta_query' => array(
                    )
                    );
                    $res = new WP_Query($args);
                    $i = 0;
                 ?>
                
                <div class="karjera__list">
                <? while($res->have_posts()) :  $res->the_post();$i++;?>
                    <div class="karjera__list-item">
                        <?if($i ==3){?>
                            <div data-aos="fade-left" class="karjera__decor-1"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle7_blured.png"/></div>
                        <?}?>
                        <?if($i == 1){?>
                            <div data-aos="fade-left" class="karjera__decor-2"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle6_blured.png"/></div>
                        <?}?>
                        <div class="karjera__text">
                            <div>
                                <?the_title()?>
                            </div>
                            <div>
                                <?=get_field('description')?>
                            </div>
                            <a href="#vacancy-form" class="karjera__ask">отправить заявку</a>
                        </div>
                        <div class="karjera__image">
                                <?php the_post_thumbnail() ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_query();
                 ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part( 'template-parts/content/vacancy-form','',array() );?>
<?get_footer();?>