<section class="home-news" data-aos="fade-up">
    <div class="container">
            <a href="/novosti/" class="red_header">новости</a>
            
            <div class="home-news__list">
            <?php
                    $args = array(
                    'post_type' => 'news',
                    'order'=>'DESC',
                    'order_by'=>'post_date',
                    'posts_per_page'=>4,
                    'meta_query' => array(
                    )
                    );
                    $res = new WP_Query($args);
                    while($res->have_posts()) :  $res->the_post();
                ?>
                <div data-aos="fade-up">
                        <div class="home-news__date">
                            <?=get_the_date('d F Y')?> г.
                        </div>
                        <?
                        $ssylka = get_field('ssylka_na_vneshnij_istochnik');
                        if($ssylka == ''){
                            $ssylka = '/novosti/';
                        }?>
                        
                        <a class="home-news__text" target="_blank" href="<?=$ssylka?>">
                        <?/*<a class="home-news__text" href="<?=get_permalink();?>">*/?>
                            <?the_excerpt()?>
                            <?=get_field('ssylka')?>
                        </a>
                </div>
                <?php endwhile;
                    wp_reset_query();
                 ?>
            </div>
    </div>
</section>
