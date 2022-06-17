<?php
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="tmm-pageheroine">
        <div class="tmm-pageheroine-content bg-accent">
            <h1 class="tmm-pageheroine-title"><?= the_title() ?></h1>
        </div>
        <?php
        get_template_part( "template-parts/elements/spaghetti");
        ?>
    </div>
    <main class="mdcont mt-8">
        <?php the_content(); ?>
    </main>

    <?php endwhile;?>

<?php endif; ?>


<?php
get_footer();
?>