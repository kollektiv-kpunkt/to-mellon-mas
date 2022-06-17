<?php
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="tmm-pageheroine relative bg-accent">
        <div class="tmm-pageheroine-content flex justify-center items-center">
            <h1 class="tmm-pageheroine-title text-center pt-28 pb-14 text-white"><?= the_title() ?></h1>
        </div>
        <?php
        get_template_part( "template-parts/elements/spaghetti");
        ?>
    </div>
    <main class="smcont mt-14">
        <?php the_content(); ?>
    </main>

    <?php endwhile;?>

<?php endif; ?>

<?php
echo(do_shortcode( "[tmm-element elem='donate']" ));
get_footer();
?>