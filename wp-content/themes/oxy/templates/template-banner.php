<?php
/**
 * Template Name: Template avec banniere
 * Template Post Type: page, post
 */
 ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<p><?php the_widget(BanniereWidget::class, ['banniere' => 'https://oxygames.fr/wp-content/uploads/2020/06/BanniereTwitch.png'], ['after_widget' => '', 'before_widget' => '']); ?></p>
	<p><img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:100%; height:auto;"></p>
	<?php the_content(); ?>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>