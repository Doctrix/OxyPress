<?php global $post; ?>
<article class="bloc-highlighted">
    <h2><?= get_field('titre') ?></h2>
    <div class="row">
    <?php if($jeux = get_field('jeux')): ?>
        <?php foreach($jeux as $post): setup_postdata($post); ?>
            <div class="col-md-4">
               <?= get_template_part('parts/card','post'); ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</article>