<div class="card">
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']) ?>
    <div class="card-body">
   		<h5 type="text/css" class="card-title"><?php the_title() ?></h5>
        <h6 class="card-subtitle"><small class="text-muted"><?= 'Publi&eacute; il y a ' .human_time_diff(get_the_time('U'), current_time('timestamp')); ?></small></h6>
   		<p class="card-text">
           <?php the_excerpt() ?>
        </p>
        <h6 class="card-text"><small class="text-muted"><?php the_category(); ?></small></h6>
        <p><?php the_terms(get_the_ID(), 'genre', 'Genre : <small>', '</small> <small>', '</small>'); ?></p>
        <p><?php the_terms(get_the_ID(), 'statut', 'Statut : <small>', '</small> <small>', '</small>'); ?></p>

        <p><?php the_terms(get_the_ID(), 'systeme', 'OS : <small>', '</small> <small>', '</small>'); ?></p>
        <p><?php the_terms(get_the_ID(), 'pegi', '<h4>PEGI ', '</h4> <h4>', '</h4>'); ?></p>
           <?php if (get_field('payant') === true):?>
		<p><strong>Prix : </strong><?= the_field('euro')?> euro</p>
        <p><?php the_terms(get_the_ID(), 'prix', 'Prix : <strong>', '</strong> <strong>', '</strong>'); ?></p>
	       <?php endif ?>

	       <?php if (get_field('payant') === false):?>
<p><strong>Free : </strong><?php the_terms(get_the_ID(), 'prix', '<strong>', '</strong> <strong>', '</strong>'); ?></p>
	       <?php endif ?>
   		<a href="<?php the_permalink() ?>" class="btn btn-primary">Voir plus</a>
  	</div>
</div>