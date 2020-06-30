<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title() ?></h1>

	<?php if(get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1'): ?>
		<div class="alert alert-info">
			Cet	article est sponsoris&eacute;/parrain&eacute;
		</div>
	<?php endif; ?>

	<p>
		<img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:100%; height:auto;">
	</p>
<div class="card">
    <div class="card-body">
	<?php the_content() ?>
	</div>
</div>
<br />
<div class="card">
	<div class="card-body">
		<?php
	if (comments_open() || get_comments_number()) {
		comments_template();
	}
	?>
	</div>
</div>
<br />

	<h2>Articles relatifs</h2>

	<div class="row">
		<?php
		$genres = array_map(function ($term) {
			return $term->term_id;
		}, get_the_terms(get_post(), 'genre'));
		$query = new WP_Query([
			'post__not_in' => [get_the_ID()],
			'post_type' => 'post',
			'posts_per_page' => 3,
			'orderby' => 'rand',
			'tax_query' => [
				[
					'taxonomy' => 'genre',
					'terms' => $genres
				]
			],
			'meta_query' => [
				[
					'key' => SponsoMetaBox::META_KEY,
					'compare' => 'EXISTS'
				]
			]
		]);
		while($query->have_posts()): $query->the_post();
		?>
			<div class="col-sm-4">
				<?php get_template_part('parts/card','post'); ?>
    		</div>
		<?php endwhile;
		wp_reset_postdata(); ?>
	</div>

<?php endwhile;
endif; ?>


<?php get_footer() ?>