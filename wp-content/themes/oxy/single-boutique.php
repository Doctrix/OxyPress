<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<center><p>
		<img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:100%; height:300px;">
	</p>
<h1><?php the_title() ?></h1>
    <p class="card-text"><h6 class="card-subtitle"><small class="text-muted"><?= 'Publi&eacute; il y a ' .human_time_diff(get_the_time('U'), current_time('timestamp')); ?></small></h6></p>
    </center>
<div class="card">
    <div class="card-body">
<h2>Description</h2>
	<?php the_content() ?>
        	</div>
</div>
<br/>
<div class="card">
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: 150px; width:150px;']) ?>
    <div class="card-body">
        <h6 class="card-text"><small class="text-muted"><?php the_category(); ?></small></h6>
        <p><?php the_terms(get_the_ID(), 'genre', 'Genre : <small>', '</small> <small>', '</small>'); ?></p>
        <p><?php the_terms(get_the_ID(), 'statut', 'Statut : <small>', '</small> <small>', '</small>'); ?></p>

        <p><?php the_terms(get_the_ID(), 'systeme', 'OS : <small>', '</small> <small>', '</small>'); ?></p>
        <p><?php the_terms(get_the_ID(), 'pegi', '<h4>PEGI ', '</h4> <h4>', '</h4>'); ?></p>
           <?php if (get_field('payant') === true):?>
<p><strong>Prix : </strong><?= the_field('euro')?> euro</p>
        <p><?php the_terms(get_the_ID(), 'prix', '<strong>', '</strong> <strong>', '</strong>'); ?></p>
	<?php endif ?>

	<?php if (get_field('payant') === false):?>
<p><strong>Free : </strong><?php the_terms(get_the_ID(), 'prix', '<strong>', '</strong> <strong>', '</strong>'); ?></p>
	<?php endif ?>

<?php endwhile;
endif; ?>
  	</div>
</div>

<?php get_footer() ?>