<?php
 /* 
Template Name: Референс тур
*/
get_header(); ?>
<section class="reference-tour">
    <div data-aos="fade-left" class="reference-tour__decor-1"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle7_blured.png"/></div>
    <div class="container">
        <div class="black_header">
            НАШИ ОБЪЕКТЫ
        </div>

        <div class="red_header">
            МОСКВА
        </div>
        <div class="reference-tour__list">
        <?php
                    $args = array(
                    'post_type' => 'objects',
                    'order'=>'ASC',
                    'orderby'=>'menu_order',
                    'post_per_page' => 100,
                    'meta_query' => array(
                        [
                        'key'=>'gorod',
                        'value' => 10,
                        'compare'   => '=',
                        ]
                    )
                    );
                    $res = new WP_Query($args);
                    while($res->have_posts()) :  $res->the_post();
                ?>
                <div data-aos="fade-up">
                    <strong><?=the_title()?></strong>
                    <p>
                    <?=get_field('opisanie')?>
                    </p>
                </div>
                <?php endwhile ?>
        </div>
        <div class="red_header">
            САНКТ-ПЕТЕРБУРГ
        </div>
        
        <div class="reference-tour__list">
        
        <?php
                    $args = array(
                    'post_type' => 'objects',
                    'order'=>'ASC',
                    'order_by'=>'menu_order',
                    'posts_per_page' => 100,
                    'meta_query' => array(
                        [
                        'key'=>'gorod',
                        'value' => 20,
                        'compare'   => '=',
                        ]
                    )
                    );
                    $res = new WP_Query($args);
                    while($res->have_posts()) :  $res->the_post();
                ?>
                <div data-aos="fade-up">
                    <strong><?=the_title()?></strong>
                    <p>
                    <?=get_field('opisanie')?>
                    </p>
                </div>
                <?php endwhile;
                    wp_reset_query();
                ?>
        </div>
        <div class="reference-tour__list">
        <?php
                    $args = array(
                    'post_type' => 'objects',
                    'order'=>'ASC',
                    'orderby'=>'menu_order',
                    'post_per_page' => 100,
                    'meta_query' => array(
                        [
                        'key'=>'gorod',
                        'value' => array('20','10'),
                        'compare'   => 'NOT IN',
                        ]
                    )
                    );
                    $res = new WP_Query($args);
                    while($res->have_posts()) :  $res->the_post();
                    $field = get_field_object( 'gorod' );
                    $value = $field['value'];
                    $label = $field['choices'][ $value ];
                ?>
                <div  data-aos="fade-up">
                    <div class="red_header">
                        <?=$label?>
                    </div>
                    <strong><?=the_title()?></strong>
                    <p>
                    <?=get_field('opisanie')?>
                    </p>
                </div>
                <?php endwhile;
                wp_reset_query();
                 ?>

        </div>
    </div>
</section>
<?get_footer();?>