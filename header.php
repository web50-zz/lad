<?php
/**
 * The header.
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif]-->
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">





	<?php wp_head(); ?>
</head>
<?php
$topColorWhite = get_field('logo_color');
if($topColorWhite){
	$headerClass = 'header__white';
}
$bannerTop = get_field('banner_top');
$bannerTopEnabled = get_field('banner_top_enabled');
$topScreenHeader = get_field('top_screen_header');
$topScreenText = get_field('top_screen_text');
$decor_top_screen = get_field('dekor_top_skrina');
if($decor_top_screen == 4){
	$decor_image = 'half_circle.svg';
	$decor_image_class = 'half_circle';
}
if($decor_top_screen == 2){
	$decor_image = 'triangle1.svg';
	$decor_image_class = 'triangle1';
}
if($decor_top_screen == 3){
	$decor_image = 'triangle2.svg';
	$decor_image_class = 'triangle2';
}


?>
<body class="body no-transition <?php echo($body_classes)?> ">
	<?php wp_body_open(); ?>
		<header class="header <?=$headerClass?>">
			<div class="container">
				<a href="/" class="logo">
					<svg><use href="#logo"></use></svg>
				</a>
				<div class="buter">
						<svg><use href="#buter"></use></svg>
				</div>
				<div class="top-menu__close2">
				</div>
			</div>
			<div class="top-menu"> 
				<div class="top-menu__wrapper">
					<div class="top-menu__decor"><img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle1.svg"/></div>
					<?wp_nav_menu(array('menu'=>'Primary menu'));?>
				</div>
			</div>
		</header>
		<main <?=(!$bannerTopEnabled)?'class="simple-header"':'';?> >
		<?if($bannerTopEnabled){?>
			<div class="topscreen">
				<div class="topscreen__main">
					<div class="topscreen__image <?=(is_front_page())?'noshadow':''?>">
					<? $video = get_field('video');?>
					<?
						if(strlen($video) > 10){?>
							<video playsinline="" id="video" autoplay="" loop="" muted="" <?/*poster="/themes/assets/dist/images/main/new_cover.jpg"*/?> preload="metadata">
                            <source src="<?=get_field('video');?>" type="video/mp4">
                        	</video>
						<?}else{?>
							<img src="<?=$bannerTop?>"/>
						<?}?>
						<?if($decor_top_screen > 1){?>
						<div class="topscreen__decor <?=$decor_image_class?> animate__animated animate__rotateIn">
							<img src="<?=get_template_directory_uri()?>/assets/images/decors/<?=$decor_image?>"/>
						</div>
						<?}?>
						<div class="topscreen__decor-mob animate__animated animate__rotateIn">
							<img src="<?=get_template_directory_uri()?>/assets/images/decors/triangle_mobile1.svg"/>
						</div>
					</div>
					<div class="container allow-overflow">
						<div class="topscreen__mobile-header">
							<div class="topscreen__header animate__animated animate__fadeInDown">
								<?=$topScreenHeader?>
							</div>
						</div>
						<div class="shifted-title-inner">
							<div class="shifted-title">
								<div class="shifted-title-original">
									<div class="topscreen__header animate__animated animate__fadeIn">
										<?=$topScreenHeader?>
									</div>
								</div>
								<div class="shifted-title-dummy">
									<div class="topscreen__header">
										<?=$topScreenHeader?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="topscreen__bottom">
					<div class="container">
						<div class="topscreen__header" style="color:#FFF;">
							<?=$topScreenHeader?>
						</div>
						<div class="topscreen__text" data-aos="fade-up">
							<?=$topScreenText?>
						</div>
					</div>
				</div>
			</div>
		<?}?>
		