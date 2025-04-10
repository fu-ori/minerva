<?php get_header(); ?>

<section class="section" id="index">
    <div class="columns">

        <div class="column">
            <img src="<?php echo get_template_directory_uri(); ?>/engine/720p.jpg">
        </div>

        <div class="column is-4">

            <div class="box">
                <?php if (!is_user_logged_in()) : ?>
                <form action="<?php echo esc_url(wp_login_url()); ?>" method="post">
                    <small>user</small>
                    <input type="text" class="input" name="log" id="user_login" required>
                    <div class="clear10x"></div>

                    <small>pass</small>
                    <input type="password" class="input" name="pwd" id="user_pass" required>
                    <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url()); ?>">
                    <div class="clear20x"></div>
                    
                    <input type="submit" value="Access" class="button is-dark is-small">
                </form>
                <?php else : ?>

                <h1 class="title is-5">Olá, <?php echo esc_html(wp_get_current_user()->display_name); ?></h1>
                <div class="has-text-right">
                    <a class="tag is-dark" href="<?php echo esc_url(wp_logout_url(home_url())); ?>">LOGOFF</a>
                </div>
                <?php endif; ?>
            </div>

            <h1 class="title is-3 fine">M I N E R V A</h1>
            <p>
                Text here...
            </p>
        </div>
    </div>
</section>

<section class="section">

    <div class="has-text-centered">
        <h1 class="title is-1">Title</h1>
        <h1 class="subtitle is-5">Subtitle</h1>
        <div class="clear30x"></div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="box">1</div>
        </div>

        <div class="column">
            <div class="box">2</div>
        </div>

        <div class="column">
            <div class="box">3</div>
        </div>
    </div>

</section>

<?php get_footer(); ?>