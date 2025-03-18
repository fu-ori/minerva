<?php

get_header();
$post_id = get_the_ID();

$author_id = get_post_field('post_author', $post_id);
$author_name = esc_html(get_the_author_meta('display_name', $author_id));
$author_url  = esc_url(get_author_posts_url($author_id));
$post_date   = esc_html(get_the_date('d/m/Y'));

?>

<section class="hero" id="single">
    <div class="hero-body">
        <div class="container">

            <div class="box">
                <div class="has-text-right">
                    <small class="tag">
                        <?php echo $post_date . " - Publicado por: &nbsp;<a href='" . $author_url . "'>" . $author_name . "</a>"; ?>
                    </small>
                </div>

                <h1 class="subtitle is-2"><?php the_title(); ?></h1>
                <hr>
                <p>
                    <?php the_content(); ?>
                </p>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>