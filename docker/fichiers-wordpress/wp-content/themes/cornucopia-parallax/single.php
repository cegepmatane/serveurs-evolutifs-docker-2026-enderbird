<?php
/**
 * Article seul : grande carte blanche qui chevauche la scène.
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<article id="article-boite">
    <header id="article-entete">
        <h1 id="article-titre"><?php the_title(); ?></h1>
        <p id="article-meta">
            Par <?php the_author(); ?> · <?php echo esc_html( get_the_date() ); ?>
            <?php
            $categorie = get_the_category();
            if ( ! empty( $categorie ) ) :
            ?>
                <a class="nouvelle-etiquette" href="<?php echo esc_url( get_category_link( $categorie[0] ) ); ?>"><?php echo esc_html( $categorie[0]->name ); ?></a>
            <?php endif; ?>
        </p>
    </header>
    <div id="article-contenu">
        <?php the_content(); ?>
    </div>
    <p id="article-retour">
        <a id="action-descendre" href="<?php echo esc_url( home_url( '/' ) ); ?>">Retour à la ferme</a>
    </p>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>
