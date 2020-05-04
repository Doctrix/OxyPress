<?php get_header() ?>
    <center>
        <main role="main" class="inner cover">
            <h1 class="cover-heading"><?= __('More than a passion, it\'s a mentality...', 'oxy'); ?></h1>
            <br/>
            <h2 class="lead"><?= __('Gambling is life.', 'oxy'); ?></h2>
            <br/>
            <p class="lead"><a href="<?php echo get_option('extra_liens') ?>" class="btn btn-lg btn-secondary"><?= __('I want to believe', 'oxy'); ?></a></p>
        </main>
    </center>
    <aside class="col-md-20 blog-sidebar">
        <?= get_sidebar('homepage'); ?>
    </aside>

<?php get_footer() ?>