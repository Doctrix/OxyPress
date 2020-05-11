<?php
/**
 * Template Name: Page avec banniere
 * Template Post Type: page, post
 */
 ?>

<?php get_header() ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<p><aside class="col-md-4 blog-sidebar">
<?php
	the_widget(BanniereWidget::class, ['banniere' => 'm.gjcdn.net/user-header/1200/4412274-crop37_13_1157_365-uui9xf4b-v4.jpg'], ['after_widget' => '', 'before_widget' => '']);
	?>
    </aside></p>
	<h1><?php the_title() ?></h1>
	<p>
		<img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:100%; height:auto;">
	</p>
	<?php the_content() ?>
<?php endwhile;
endif; ?>

<?php get_footer() ?>