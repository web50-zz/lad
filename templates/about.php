<?php
 /* 
Template Name: О нас
*/
get_header(); ?>
<?
    $post_id = get_the_ID();
    $image_url = get_field('kartinka_sleva_ot_czitaty');
    $citata = get_field('czitata');
    $podpis = get_field('podpis_pod_czitatoj');
    $red_header = get_field('zagolovok_krasnym');
    $abzac = get_field('abzacz_pod_zagolovkom');

?>
<section class="o-nas">
    <div class="container">
        <div class="o-nas__quote">
            <div class="o-nas__quote-left">
                <?/*
                    <img src="<?=get_template_directory_uri()?>/assets/images/o-nas/o-nas.png"/>
                */?>
                <?if($image_url){?>
                <img data-aos="fade-up" src="<?=$image_url?>"/>
                <?}?>
            </div>
            <div class="o-nas__quote-right" >
                <?/*
                <img data-aos="fade-up" src="<?=get_template_directory_uri()?>/assets/images/o-nas/quote2.png"/>
                */?>
                <div class="o-nas__quote-std" data-aos="fade-up">
                    <?=$citata?>
                </div>
                <?/*
                <img data-aos="fade-up" class="o-nas__quote-end" src="<?=get_template_directory_uri()?>/assets/images/o-nas/quote2_2.png"/>
                */?>
                <div class="o-nas__quote-signature" data-aos="fade-up">
                        <?=$podpis?>
                </div>
            </div>
        </div>
        <div class="o-nas__text" data-aos="fade-up">
            <?if($red_header){?>
            <div class="red_header">
                <?=$red_header?>
            </div>
            <br><br>
            <?}?>
            <?=$abzac?>
        </div>
    </div>
</section>
<style>
    @media(max-width: 1168px){
    .topscreen__text .no-mobile{
            display: none;
        }
    }
</style>
<?get_footer();?>