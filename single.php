<?php

get_header();
$post_id = get_the_ID();

?>

<section>
    <h1><?php the_title(); ?></h1>
</section>
<section>
    <?php the_content(); ?>
</section>

<?php get_footer(); ?>
