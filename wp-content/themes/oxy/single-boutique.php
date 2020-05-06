<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<center><p>
		<img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:100%; height:300px;">
	</p>
<h1><?php the_title() ?></h1>
    <p class="card-text"><h6 class="card-subtitle"><small class="text-muted"><?= 'Publi&eacute; il y a ' .human_time_diff(get_the_time('U'), current_time('timestamp')); ?></small></h6></p>
    </center>
<br/>
<div class="card">
    <div class="card-body">
        <h2>Description</h2>
        <?php the_content() ?>
    </div>
</div>
<br/>
<div class="card">
    <div class="card-body">
        <h2>Informations</h2>
        <?php if(have_rows('infos')): ?>
        <?php while(have_rows('infos')): the_row() ?>
        <strong>Auteur :</strong> <a href="<?= get_sub_field('url') ?>" target="_blank"><?= get_sub_field('auteur') ?></a>
        <br/>
        <?php endwhile; ?>
        <?php endif ?>
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: 150px; width:150px;']) ?>

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

        <?php endwhile;
        endif; ?>
  	</div>
</div>
<br/>
<div class="card">
    <div class="card-body">

        <h2>Gallerie d'images</h2>

      <?php
        $images = get_field('galerie');
        $divider = 1; // # of items/thumbnails to show before closing the element and opening another

        if( $images ): ?>

        <div id="mini-carousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#mini-carousel" data-slide-to="<?php echo $i;?>" class="<?php if($i == 0) echo 'active';?>">
                  </li>
              </ol>
            <div class="carousel-inner">
                    <div class="carousel-item <?php if($i == 0) echo 'active';?>">

                <?php
                    $total = count( $images );
                    $counter = 0;
                    foreach( $images as $image ):
                        $counter++; ?>

                    <a href="<?php echo $image['sizes']['large']; ?>" class="fancybox img-<?php echo $counter; ?>" rel="mini">
                        <img class="d-block w-100" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['title']; ?>" />
                    </a>

                    <?php $current_position = $images->$image + 1; // current_post starts at 0
                        //if position is equal to the divider and not the last result close the currently open div and start another
                        if (/* $image < $image->$total && */ $counter % $divider == 0) : ?>

                        </div><div class="carousel-item">
                    <?php endif; ?><?php endforeach; ?>
                </div>
            </div>
            <!-- Controls -->
            <a class="carousel-control-prev" href="#mini-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#mini-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php endif; ?>

    </div>
 </div>
<script>
jQuery(document).ready(function($) {
    $('#mini-carousel').carousel({
      interval: 6000
    });
    $('.fancybox').fancybox({
        padding: 0
    });
});
</script>
<?php get_footer() ?>