<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<p class="cover"><img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:98.75%; height:280px;"></p>
    <h1 class="titre-boutique"><?php the_title() ?></h1>
    <p class="card-subtitle"><h6 class="txt-date-publier-boutique"><small class="text-muted"><?= _e('Publi&eacute; il y a ' .human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></small></h6></p>
<br/>
<div class="card">
    <div class="card-body">
        <h2><?php _e('Game description'); ?></h2>
        <h3><?php _e('Profile of'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a></h3>             
          <?php the_content() ?>   
          <small class="text-muted"><?php echo getPostViews(get_the_ID());?></small> 
    </div>
</div>
<br/>
<div class="card">
    <div class="card-body">
        <h2><?php _e('Game Information'); ?></h2>
        <h6 class="card-text"><small class="text-muted"><?php the_category(); ?></small></h6>
        <?php _e(the_terms(get_the_ID(), 'genre', '<h5>Genre : <small>', '', '</small></h5>')); ?>
        <?php _e(the_terms(get_the_ID(), 'statut', '<h5>Statut : <small><strong>', '', '</strong></small></h5>')); ?>
        <?php _e(the_terms(get_the_ID(), 'systeme', '<h5>OS : <small>', '', '</small></h5>')); ?>
        <?php _e(the_terms(get_the_ID(), 'pegi', '<h4>PEGI ', '', '</h4>')); ?>
        <?php if (get_field('payant') === true):?>
		<strong>Prix : </strong><?= the_field('euro')?> euro
        <?php _e(the_terms(get_the_ID(), 'prix', 'Prix : <strong>', '', '</strong>')); ?>
	    <?php endif ?>
        <?php if (get_field('payant') === false):?>
        <?php _e(the_terms(get_the_ID(), 'prix', '<h3>', '', '</h3>')); ?> 
        <?php if(have_rows('infos')): ?>
        <?php while(have_rows('infos')): the_row() ?>        
        <strong><?php _e('Author'); ?> :</strong> <a href="<?= get_sub_field('url') ?>" target="_blank"><?= get_sub_field('auteur') ?></a>
        <?php endwhile; ?>
        <?php endif ?>
	    <?php endif ?>
        <?php endwhile;
        endif; ?>
  	</div>
</div>
<br/>
<div class="cover">
<div class="card-body">      
<svg class="bi bi-card-image" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 00-.5.5v9a.5.5 0 00.5.5h13a.5.5 0 00.5-.5v-9a.5.5 0 00-.5-.5zm-13-1A1.5 1.5 0 000 3.5v9A1.5 1.5 0 001.5 14h13a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0014.5 2h-13z" clip-rule="evenodd"/>
<path d="M10.648 7.646a.5.5 0 01.577-.093L15.002 9.5V13h-14v-1l2.646-2.354a.5.5 0 01.63-.062l2.66 1.773 3.71-3.71z"/>
<path fill-rule="evenodd" d="M4.502 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"/>
</svg>

      <?php
        $images = get_field('galerie');
        $divider = 1; // # of items/thumbnails to show before closing the element and opening another

        if( $images ): ?>

        <div id="mini-carousel" class="carousel slide" data-ride="carousel">
              <ul class="carousel-indicators">
                  <li data-target="#mini-carousel" data-slide-to="<?php echo $i;?>" class="<?php if($i == 0) echo 'active';?>"></li>


                </ul>
            <div class="carousel-inner">
                    <div class="carousel-item <?php if($i == 0) echo 'active';?>">

                <?php
                    $total = count( $images );
                    $counter = 1;
                    foreach( $images as $image ):
                        $counter++; ?>

                    <a href="<?php echo $image['sizes']['thumbnail']; ?>" class="fancybox img-<?php echo $counter; ?>" rel="mini">
                        <img class="d-block w-100" src="<?php echo $image['sizes']['post-thumbnail']; ?>" alt="<?php echo $image['title']; ?>" />
                    </a>

                    <?php $current_position = $images->$image + 1; 
                        // current_post starts at 0
                        //if position is equal to the divider and not the last result close the currently open div and start another
                        if ($image > $image->$total &&  $counter % $divider == 0 ) : ?>

                        </div><div class="carousel-item">
                    <?php endif; ?><?php endforeach; ?>
                </div>
            </div>
            <!-- Controls -->
            <a class="carousel-control-prev" href="#mini-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                
            </a>
            <a class="carousel-control-next" href="#mini-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
           
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