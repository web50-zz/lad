<section class="home-projects " data-aos="fade-up">
    <div class="container">
        <div class="red_header">
                <a href="/klienty-i-proekty/">наши проекты</a>
        </div>
        <div class="home-projects__list">
        <?$args = array(
                    'post_type' => 'projects',
                    'order'=>'ASC',
                    'meta_key'=>'sort_top',
                    'orderby'=>'sort_top',
                    'posts_per_page' => 7,
                    'meta_query' => array(
                        array(
                         [
                           'key' => 'otobrazhat_v_top_na_glavnoj',
                           'value' => '1',
                           'compare'   => '=',
                         ]
                 
                        )
                     )
                    );
                    $res = new WP_Query($args);
                    $i = 0;
                    while($res->have_posts()) :  $res->the_post();
                    $i++
                ?>
                <div class="home-projects__list-item">
                    <?if($i == 1){?>
                        <div data-aos="fade-left" class="home-projects__decor-1"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle1.svg"/></div>
                    <?}?>
                    <?if($i == 2){?>
                        <div data-aos="fade-up" class="home-projects__decor-3"><img src="<?=get_template_directory_uri()?>/assets/images/decors/half_circle_grey_blured.svg"/></div>
                    <?}?>
                    <?if($i == 5){?>
                        <div data-aos="fade-down" class="home-projects__decor-2"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle-home-projects-red-blurred.png"/></div>
                    <?}?>
                    <a href="<?=get_field('proekta_link')?>"  target="_blank" class="home-projects__list-item-wrap">
                        <div class="home-projects__image">
                            <img src="<?=get_field('izobrazhenie') ?>"/> 
                        </div>
                        <div class="home-projects__title">
                            <?the_title()?>
                        </div>
                        <div class="home-projects__link" target="_blank">
                            <svg><use href="#arrow_right"></use></svg>
                        </div>
                    </a>
                    <?if($i == 7){?>
                        <a class="home-projects__link-all" href="/klienty-i-proekty/">больше проектов <svg><use href="#arrow_right"></use></svg></a>
                    <?}?>
                </div>
                <?php endwhile;
                    wp_reset_query();
             ?>
        </div>
        <a class="home-projects__link-all mob" href="/klienty-i-proekty/">больше проектов <svg><use href="#arrow_right"></use></svg></a>
    </div>
</section>
    