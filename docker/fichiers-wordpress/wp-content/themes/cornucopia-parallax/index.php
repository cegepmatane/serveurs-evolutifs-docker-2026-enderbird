<?php
/**
 * Liste des articles en cartes blanches : accueil du blogue, archives, recherche.
 */
get_header();
?>

<section class="section" id="section-nouvelles">
    <div class="section-boite">
        <?php if ( is_archive() ) : ?>
            <h2 class="section-titre"><?php the_archive_title(); ?></h2>
        <?php elseif ( is_search() ) : ?>
            <h2 class="section-titre">Récolte de la recherche</h2>
            <p class="section-sous-titre">Ce que la ferme a trouvé pour « <?php the_search_query(); ?> ».</p>
        <?php else : ?>
            <h2 class="section-titre">Les nouvelles de la ferme</h2>
            <p class="section-sous-titre">Paniers, récoltes et vie des champs : Flora et Hazel vous racontent.</p>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <div id="nouvelles"<?php echo ( (int) $wp_query->post_count === 1 ) ? ' class="nouvelles-solo"' : ''; ?>>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="nouvelle">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a class="nouvelle-vignette" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        <?php else : ?>
                            <a class="nouvelle-vignette" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                <svg viewBox="0 0 400 210" role="img" aria-label="">
                                    <rect width="400" height="210" fill="#DFF3FC"/>
                                    <circle cx="200" cy="105" r="82" fill="#E8F7EC"/>
                                    <path d="M 130 100 L 270 100 L 255 165 Q 253 175 243 175 L 157 175 Q 147 175 145 165 Z" fill="#C68642" stroke="#5C3A18" stroke-width="6"/>
                                    <path d="M 138 125 L 262 125 M 144 150 L 256 150" stroke="#5C3A18" stroke-width="4"/>
                                    <path d="M 165 100 L 162 175 M 200 100 L 200 175 M 235 100 L 238 175" stroke="#5C3A18" stroke-width="4"/>
                                    <rect x="122" y="92" width="156" height="14" rx="7" fill="#A0642C" stroke="#5C3A18" stroke-width="5"/>
                                    <circle cx="160" cy="75" r="22" fill="#58C127" stroke="#2F7A12" stroke-width="5"/>
                                    <polygon points="205,45 217,92 193,92" fill="#FF9500" stroke="#B26400" stroke-width="5"/>
                                    <path d="M205 45 Q198 30 190 26 M205 45 Q213 30 221 26" stroke="#37AE27" stroke-width="6" fill="none" stroke-linecap="round"/>
                                    <circle cx="245" cy="78" r="20" fill="#FF3B30" stroke="#B22B23" stroke-width="5"/>
                                </svg>
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
                        <span class="nouvelle-date"><?php echo esc_html( get_the_date() ); ?></span>
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

<?php get_footer(); ?>
