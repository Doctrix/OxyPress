<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<div class="post">
    <h2><?php the_title(); ?></h2>
    <?php the_post_thumbnail("medium")?>
	<p><img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:100%; height:300px;"></p>
    <?php the_content(); ?>
    <div class="clear"></div>
</div>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no projets matched your criteria'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>