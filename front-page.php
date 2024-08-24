<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Chesnakov
 * @since Chesnakov 1.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/content/what-we-do','',array() );?>
<?php get_template_part( 'template-parts/content/home-projects','',array() );?>
<?php get_template_part( 'template-parts/content/home-news','',array() );?>

<?php
get_footer();
?>