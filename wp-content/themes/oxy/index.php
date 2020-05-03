<?php get_header() ?>

<?php $genres = get_terms(['taxonomy' => 'genre']); ?>
<ul class="nav nav-pills my-4">
    <?php foreach($genres as $genre): ?>
    <li class="nav-item">
        <a href="<?= get_term_link($genre) ?>" class="nav-link <?= is_tax('genre', $genre->term_id) ? 'active' : '' ?>"><?= $genre->name ?></a>
    </li>
    <?php endforeach; ?>
</ul>

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