<?php get_header(); ?>

<section class="section">
    <div class="columns">
        <div class="column">
            <style type="text/css">
                .index-slide{
                    background-image: url("https://64.media.tumblr.com/898e2855cde57d49f3e2fbdd26be8558/7f478c443f6dbc97-8c/s1280x1920/ffce7e7a11140435f02b687ed4cfa3fcbb1dbc45.jpg");
                    background-size: cover;
                    width: 100%;
                    height: 500px;
                    border-radius: 10px;
                }
            </style>

            <div class="index-slide"></div>
        </div>

        <div class="column is-3">

            <div class="box">
                <?php if (!is_user_logged_in()) : ?>
                <form action="<?php echo esc_url(wp_login_url()); ?>" method="post">
                    <label for="user_login">Usuário:</label>
                    <input type="text" name="log" id="user_login" required>

                    <label for="user_pass">Senha:</label>
                    <input type="password" name="pwd" id="user_pass" required>

                    <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url()); ?>">
                    <input type="submit" value="Entrar">
                </form>
                <?php else : ?>

                <h1 class="title is-5">Olá, <?php echo esc_html(wp_get_current_user()->display_name); ?></h1>
                <div class="has-text-right">
                    <a class="tag is-dark" href="<?php echo esc_url(wp_logout_url(home_url())); ?>">LOGOFF</a>
                </div>
                <?php endif; ?>
            </div>

            <h1 class="title is-3">About</h1>
        </div>
    </div>
</section>

<?php get_footer(); ?>