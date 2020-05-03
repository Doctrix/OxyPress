<?php get_header() ?>

<h1><?= esc_html(get_queried_object()->name) ?></h1>

<p>
    <?= esc_html(get_queried_object()->description) ?>
</p>

<?php $genres = get_terms(['taxonomy' => 'genre']); ?>
<?php if (is_array($genre)): ?>
<ul class="nav nav-pills my-4">
    <?php foreach($genres as $genre): ?>
    <li class="nav-item">
        <a href="<?= esc_html(get_term_link($genre)) ?>" class="nav-link <?= esc_html(is_tax('genre', $genre->term_id) ? 'active' : '') ?>"><?= esc_html($genre->name) ?></a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif ?>

<?php if (have_posts()) : ?>
	<div class="row">
    
		<?php while (have_posts()) : the_post(); ?>
    		<div class="col-sm-4">
				<?php get_template_part('parts/card', 'post'); ?>
    		</div>
		<?php endwhile ?>
        
    </div>

    <?php oxy_pagination() ?>

    <?= paginate_links(); ?>

<?php else : ?>
	<h1>Pas d'articles</h1>
<?php endif; ?> 

<?php get_footer() ?>