<?php
   $args = array(
    'post_type' => 'project_type',
    'order'=>'ASC',
    'orderby'=>'menu_order',
    'meta_query' => array(
       array(
        [
          'key' => 'pokazyvat_na_glavnoj',
          'value' => 1,
        ]

       )
    )
 );
 $res = new WP_Query($args);
 $i = 0;

?>
<section class="what-we-do">
    <div class="container">
        <div class="red_header">что мы делаем</div>
        <div class="what-we-do__list">
            <? while($res->have_posts()) : 
               $res->the_post(); 
               $i++;
                ?>
            <div data-aos="fade-up">
                <?if($i == 3){?>
                    <div data-aos="fade-left" class="what-we-do__decor-mobile"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle-wwd-mobile.svg"/></div>
                <?}?>
                <div class="what-we-do__image">
                    <?php the_post_thumbnail() ?>
                </div>
                <a  class="what-we-do__title"><?the_title()?></a>
            </div>
            <?php endwhile;
            wp_reset_query();
            ?>
        </div>
    </div>
</section>