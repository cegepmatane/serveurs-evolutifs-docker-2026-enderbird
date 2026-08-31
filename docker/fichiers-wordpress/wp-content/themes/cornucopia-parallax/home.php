<?php
/**
 * Accueil du blogue : reproduction exacte de la maquette prairie-parallax.
 * Les nouvelles viennent de la base, la section des paniers est en dur.
 */
get_header();
?>

<!-- ===================== NOUVELLES ===================== -->
<section class="section" id="section-nouvelles">
    <div class="section-boite">
        <h2 class="section-titre">Les nouvelles de la ferme</h2>
        <p class="section-sous-titre">Paniers, récoltes et vie des champs : Flora et Hazel vous racontent.</p>
        <?php if ( have_posts() ) : ?>
            <div id="nouvelles">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="nouvelle">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a class="nouvelle-vignette" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        <?php endif; ?>
                        <?php
                        $categorie = get_the_category();
                        if ( ! empty( $categorie ) ) :
                        ?>
                            <a class="nouvelle-etiquette" href="<?php echo esc_url( get_category_link( $categorie[0] ) ); ?>"><?php echo esc_html( $categorie[0]->name ); ?></a>
                        <?php endif; ?>
                        <h3 class="nouvelle-titre"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="nouvelle-texte"><?php the_excerpt(); ?></div>
                        <a class="nouvelle-action" href="<?php the_permalink(); ?>">Lire la suite</a>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
        <?php else : ?>
            <p class="section-sous-titre">Rien à lire pour le moment : Flora et Hazel sont aux champs. Revenez bientôt!</p>
        <?php endif; ?>
    </div>
</section>

<!-- ===================== ABONNEMENTS ===================== -->
<section class="section" id="section-abonnements">
    <div class="section-boite">
        <h2 class="section-titre">Les paniers de la ferme</h2>
        <p class="section-sous-titre">Abonnez-vous, la récolte fait le reste : cueillette du jeudi au kiosque, de 15 h à 19 h.</p>
        <div id="abonnements">
            <article class="abonnement">
                <h3 class="abonnement-nom">Panier solo</h3>
                <p class="abonnement-prix">18 $<small> / semaine</small></p>
                <ul class="abonnement-detail">
                    <li>5 légumes de saison</li>
                    <li>Fines herbes du jardin</li>
                    <li>Recette de la semaine</li>
                </ul>
                <a class="abonnement-action" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Je m'abonne</a>
            </article>
            <article class="abonnement abonnement-vedette">
                <span class="abonnement-medaille">Préféré des familles</span>
                <h3 class="abonnement-nom">Panier famille</h3>
                <p class="abonnement-prix">29 $<small> / semaine</small></p>
                <ul class="abonnement-detail">
                    <li>9 légumes de saison</li>
                    <li>Douzaine d'oeufs fermiers</li>
                    <li>Bouquet de la semaine</li>
                    <li>Recette de la semaine</li>
                </ul>
                <a class="abonnement-action" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Je m'abonne</a>
            </article>
            <article class="abonnement">
                <h3 class="abonnement-nom">Panier festin</h3>
                <p class="abonnement-prix">42 $<small> / semaine</small></p>
                <ul class="abonnement-detail">
                    <li>12 légumes de saison</li>
                    <li>Oeufs et miel de la ferme</li>
                    <li>Surprise de Hazel</li>
                    <li>Visite guidée à l'automne</li>
                </ul>
                <a class="abonnement-action" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Je m'abonne</a>
            </article>
        </div>
    </div>
</section>

<?php get_footer(); ?>
