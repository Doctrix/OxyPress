<?php get_header(); ?>
<div class="cadre-bloc-shadow bloc-large">
<div id="content" class="narrowcolumn">

<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
    <h2><a href="<?php echo $curauth->url; ?>"><?php echo $curauth->nickname; ?></a></h2>
    <?php echo get_avatar(get_the_author_meta('user_email'), '120' ,'',get_the_author_meta('nickname') );?>
    <div class="cadre-bloc-shadow"><h2>Description</h2>
    <dd class="texte"><?php echo $curauth->user_description; ?></dd></div>
<!-- <dt>Profile <?php echo $curauth->display_name; ?></dt> -->
    <h2>Reseau:</h2>    
    <dl>
        <dt>Website : <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dt>
        <dt>Profil <a href=" <?php echo $curauth->mifaconcept; ?>">Mifa Concept</a></dt> 
        <dt>Profil <a href="<?php echo $curauth->facebook; ?>">Facebook</a></dt>      
        <dt>Profil <a href="<?php echo $curauth->instagram; ?>">Instagram</a></dt>
        <dt>Profil <a href="<?php echo $curauth->pinterest; ?>">Pinterest</a></dt>     
    </dl>

    <h2>Posts by <?php echo $curauth->nickname; ?>:</h2>
    <ul>
<!-- The Loop -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            <?php the_title(); ?></a>,
            <?php the_time('d M Y'); ?> in <?php the_category('&');?>
        </li>

    <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>

    <?php endif; ?>

<!-- End Loop -->

    </ul>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>





