<?php
/*
Template Name: Template Sitemap
*/
?>
<?php get_header(); ?>
<div id="content">
<h2><?php _e('Pages', 'oxy'); ?></h2>
<ul><?php wp_list_pages("title_li=" ); ?></ul>
<h2><?php _e('Projets', 'oxy'); ?></h2>
<ul><?php $projet = new WP_Query(array('post_type' => 'projet')); while($projet->have_posts()) : $projet->the_post(); ?>
<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
(<?php comments_number('0', '1', '%'); ?>)
</li>
<?php endwhile; ?>
</ul>
<h2><?php _e('RSS Feeds', 'oxy'); ?></h2>
<ul>
<li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e('Main RSS' , 'oxy'); ?></a></li>
<li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comment Feed', 'oxy'); ?></a></li>
</ul>
<h2><?php _e('Categories', 'oxy'); ?></h2>
<ul><?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>
<h2><?php _e('All Blog Posts', 'oxy'); ?></h2>
<ul><?php $archive_query = new WP_Query('showposts=1000'); while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
(<?php comments_number('0', '1', '%'); ?>)
</li>
<?php endwhile; ?>
</ul>
</div>
<?php get_footer(); ?>