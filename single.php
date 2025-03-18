<?php

get_header();
$post_id = get_the_ID();

$author_id = get_post_field('post_author', get_the_ID());
$author_name = get_the_author_meta('display_name', $author_id);

?>

<section class="hero">
    <div class="hero-body">
        <div class="container">

            <div class="box">
                <h1 class="title is-2"><?php the_title(); ?></h1>
                <h1 class="subtitle is-2"><?php the_title(); ?></h1>
                <small class="tag">
                    <?php echo "Autor: " . $author_name; ?>
                </small>

                <hr>
                <p>
                    <?php the_content(); ?>
                </p>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
