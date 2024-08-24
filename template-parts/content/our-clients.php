<section class="our-clients">
    <div class="container">
        <div class="red_header">
            наши клиенты
        </div>
        <div class="our-clients__list">
         <?
                     $args = array(
                    'post_type' => 'partners',
                    'order'=>'ASC',
                    //'orderby'=>'menu_order',
                    'orderby'=>'title',
                    'posts_per_page'=>100,
                    'meta_query'=>array(
                        []
                    )
                    );
                    $res = new WP_Query($args);
                    while($res->have_posts()) :  $res->the_post();
                ?>

            <a <?if(get_field('ssylka')){?>href="<?=get_field('ssylka')?>"<?}?> target="_blank"><?the_title()?></a>
            <?php endwhile;
                    wp_reset_query();
                 ?>
        </div>
    </div>
</section>

