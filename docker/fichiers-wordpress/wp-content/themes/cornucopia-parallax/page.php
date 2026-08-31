<?php
/**
 * Page seule : même grande carte blanche que les articles, sans la date.
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<article id="article-boite">
    <header id="article-entete">
        <h1 id="article-titre"><?php the_title(); ?></h1>
    </header>
    <div id="article-contenu">
        <?php the_content(); ?>
    </div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>
