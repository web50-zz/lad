<section class="projects">
    <div class="container">
        <div class="projects-fl">
            <div class="black_header">
                Клиенты<br> и проекты
            </div>
            <div class="projects__filter">
                <div class="active" data-id="all">
                        все
                </div>
                <div data-id="131">
                        дизайн
                </div>
                <div data-id="134">
                        Оснащение
                </div>
                <div data-id="136">
                        сопровождение
                </div>
            </div>
        </div>
        <div class="projects__list">
            <?
            $titles['131'] = 'Дизайн';
            $titles['134'] = 'Оснащение';
            $titles['136'] = 'Сопровождение';
                $args = array(
                    'post_type' => 'projects',
                    'order'=>'ASC',
                    'orderby'=>'menu_order',
                    'posts_per_page' => 100,
                    'meta_query' => array(
                        array(
                         [
                           'key' => 'ne_pokazyvat_na_stranicze_proektov',
                           'value' => '1',
                           'compare'   => '!=',
                         ]
                 
                        )
                     )
                    );
                    $res = new WP_Query($args);
                    while($res->have_posts()) :  
                    $res->the_post();
                    $project_type = get_field('project_type');
                    $attributes = '';
                    $titles_out= array();
                    if(is_array($project_type)){
                        foreach($project_type as $k=>$v){
                                $attributes .= ' data-type-'.$v.'="1"';
                                $titles_out[$v] = $titles[$v];
                        }
                    }
                    if(count($titles_out)>0){
                        asort($titles_out);
                        $title_out_str = '* '.implode(', ',$titles_out);
                    }
                    $style = get_field('stil_v_spiske');
                    if($style){
                        $style_css = 'projects__list-item-style__'.$style;
                    }
                ?>
            <div data-aos="fade-up" class="projects__list-item" <?=$attributes?>>
                <a href="<?=get_field('proekta_link')?>" target="_blank" class="projects__list-item-wrap <?=$style_css?>">
                    <?if($style == 1){?>
                        <div data-aos="fade-right" class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/1_1.png"/>
                        </div>
                        <div data-aos="fade-left" class="<?=$style_css?>_decor-2">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/1_2.png"/>
                        </div>
                    <?}?>
                    <?if($style == 2){?>
                        <div  data-aos="fade-down" class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/2.png"/>
                        </div>
                    <?}?>
                    <?if($style == 3){?>
                        <div data-aos="fade-right"  class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/3.png"/>
                        </div>
                    <?}?>
                    <?if($style == 4){?>
                        <div data-aos="fade-left" class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/4_1.png"/>
                        </div>
                        <div data-aos="fade-down"  class="<?=$style_css?>_decor-2">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/1_2.png"/>
                        </div>
                    <?}?>
                    <?if($style == 5){?>
                        <div data-aos="fade-left" class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/5_1.png"/>
                        </div>
                        <div data-aos="fade-right" class="<?=$style_css?>_decor-2">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/5_2.png"/>
                        </div>
                    <?}?>
                    <?if($style == 6){?>
                        <div data-aos="fade-up" class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/6_1.png"/>
                        </div>
                        <div data-aos="fade-up" class="<?=$style_css?>_decor-2">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/6_2.png"/>
                        </div>
                    <?}?>
                    <?if($style == 7){?>
                        <div data-aos="fade-up-left" class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/7.png"/>
                        </div>
                    <?}?>
                    <?if($style == 8){?>
                        <div data-aos="fade-up" class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/8_1.png"/>
                        </div>
                        <div data-aos="fade-up" class="<?=$style_css?>_decor-2">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/8_2.png"/>
                        </div>
                    <?}?>
                    <?if($style == 9){?>
                        <div data-aos="fade-left" class="<?=$style_css?>_decor-1">
                            <img src="<?=get_template_directory_uri()?>/assets/images/decors/projects/9.png"/>
                        </div>
                    <?}?>
                    
                    <div class="projects__list-item-types"><?=$title_out_str?></div>
                    <div class="projects__image">
                        <?php the_post_thumbnail() ?>
                    </div>
                    <div class="projects__title">
                            <?=the_title()?>
                    </div>
                    <div <?/*href="<?=get_field('proekta_link')?>"*/?> class="projects__link" target="_blank">
                        <svg><use href="#arrow_right"></use></svg>
                    </div>
                </a>
            </div>
            <?php endwhile;
            wp_reset_query();
             ?>
        </div>
    </div>
</section>
    
