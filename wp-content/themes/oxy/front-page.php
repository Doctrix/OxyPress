<?php get_header() ?>
    <main role="main" class="cover">
        <div class="cover">
            <h1 class="titre"><?= __('More than a passion, it\'s a mentality...', 'oxy'); ?></h1>
            <br/>
            <h2 class="lead"><?= __('Gambling is life.', 'oxy'); ?></h2>
            <br/>
            <a href="<?php echo get_option('extra_btn_link') ?>" class="btn btn-lg btn-secondary" target="_blank"><?= __('I want to believe', 'oxy'); ?></a>
        </div>
    </main>
<aside class="col-md-20 blog-sidebar">
    <?= get_sidebar('homepage'); ?>
</aside>

<?php get_footer() ?>