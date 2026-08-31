<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ===================== SCENE D'EN-TETE ===================== -->
<header id="scene">
    <!-- Soleil -->
    <div class="couche" id="couche-soleil" data-vitesse="0.15">
        <svg viewBox="0 0 220 220">
            <g id="soleil-rayons">
                <g fill="#FFC94A" opacity="0.9">
                    <polygon points="110,0 122,52 98,52"/>
                    <polygon points="110,220 122,168 98,168"/>
                    <polygon points="0,110 52,98 52,122"/>
                    <polygon points="220,110 168,98 168,122"/>
                    <polygon points="32,32 72,68 55,85"/>
                    <polygon points="188,32 148,68 165,85"/>
                    <polygon points="32,188 72,152 55,135"/>
                    <polygon points="188,188 148,152 165,135"/>
                </g>
            </g>
            <circle cx="110" cy="110" r="52" fill="#FFD23F" stroke="#F5A700" stroke-width="6"/>
            <circle cx="110" cy="110" r="38" fill="#FFE070"/>
        </svg>
    </div>

    <!-- Nuages -->
    <div class="couche" data-vitesse="0.25">
        <svg class="nuage" style="top:9vh; width:150px; animation-duration: 55s;" viewBox="0 0 150 60">
            <ellipse cx="45" cy="40" rx="42" ry="19" fill="#fff"/>
            <ellipse cx="90" cy="32" rx="38" ry="22" fill="#fff"/>
            <ellipse cx="120" cy="44" rx="28" ry="14" fill="#fff"/>
        </svg>
        <svg class="nuage" style="top:20vh; width:110px; animation-duration: 75s; animation-delay: -30s;" viewBox="0 0 150 60">
            <ellipse cx="45" cy="40" rx="42" ry="19" fill="#fff" opacity="0.9"/>
            <ellipse cx="95" cy="33" rx="36" ry="20" fill="#fff" opacity="0.9"/>
        </svg>
        <svg class="nuage" style="top:4vh; width:90px; animation-duration: 90s; animation-delay: -60s;" viewBox="0 0 150 60">
            <ellipse cx="55" cy="38" rx="45" ry="18" fill="#fff" opacity="0.8"/>
        </svg>
    </div>

    <!-- Collines lointaines -->
    <div class="couche" data-vitesse="0.35">
        <svg viewBox="0 0 1440 320" preserveAspectRatio="none" style="height:56%;">
            <path d="M0,200 Q240,80 480,170 T900,150 T1440,180 L1440,320 L0,320 Z" fill="#7ED957"/>
            <path d="M0,240 Q360,140 720,210 T1440,220 L1440,320 L0,320 Z" fill="#69CC3F" opacity="0.85"/>
        </svg>
    </div>

    <!-- Colline principale avec grange -->
    <div class="couche" data-vitesse="0.55">
        <svg viewBox="0 0 1440 360" preserveAspectRatio="none" style="height:48%;">
            <path d="M0,120 Q360,30 720,90 T1440,60 L1440,360 L0,360 Z" fill="var(--prairie)"/>
            <g transform="translate(1020,18) scale(1.15)">
                <rect x="20" y="60" width="150" height="95" fill="#D9534F" stroke="#8B2E2B" stroke-width="5" rx="6"/>
                <polygon points="10,62 95,8 180,62" fill="#B23B37" stroke="#8B2E2B" stroke-width="5"/>
                <rect x="75" y="95" width="42" height="60" fill="#8B5A2B" stroke="#5C3A18" stroke-width="4" rx="4"/>
                <path d="M75 95 L117 155 M117 95 L75 155" stroke="#5C3A18" stroke-width="4"/>
                <circle cx="95" cy="45" r="14" fill="#FFFDF5" stroke="#8B2E2B" stroke-width="4"/>
            </g>
            <g transform="translate(140,60)">
                <rect x="24" y="60" width="14" height="42" fill="#8B5A2B" rx="6"/>
                <circle cx="31" cy="42" r="38" fill="#2F9E1F"/>
                <circle cx="12" cy="56" r="24" fill="#37AE27"/>
                <circle cx="52" cy="56" r="24" fill="#37AE27"/>
                <circle cx="20" cy="34" r="6" fill="#FF3B30"/>
                <circle cx="44" cy="48" r="6" fill="#FF3B30"/>
                <circle cx="34" cy="24" r="6" fill="#FF3B30"/>
            </g>
        </svg>
    </div>

    <!-- Premier plan : clôture et légumes -->
    <div class="couche" data-vitesse="0.8">
        <svg viewBox="0 0 1440 200" preserveAspectRatio="none" style="height:26%;">
            <path d="M0,60 Q480,10 960,50 T1440,40 L1440,200 L0,200 Z" fill="var(--prairie-foncee)"/>
            <g fill="#F2E3BE">
                <rect x="30" y="52" width="16" height="88" rx="6"/>
                <rect x="150" y="46" width="16" height="88" rx="6"/>
                <rect x="270" y="42" width="16" height="88" rx="6"/>
                <rect x="390" y="38" width="16" height="88" rx="6"/>
                <rect x="0" y="66" width="470" height="14" rx="7"/>
                <rect x="0" y="102" width="470" height="14" rx="7"/>
            </g>
            <g transform="translate(1050,70)">
                <g transform="translate(0,0)"><g class="carotte-ballerine"><polygon points="20,10 32,58 8,58" fill="#FF9500" stroke="#B26400" stroke-width="4"/><path d="M20 10 Q12 -8 2 -12 M20 10 Q20 -10 18 -16 M20 10 Q30 -8 38 -12" stroke="#37AE27" stroke-width="6" fill="none" stroke-linecap="round"/></g></g>
                <g transform="translate(90,6)"><g class="carotte-ballerine"><polygon points="20,10 32,58 8,58" fill="#FF9500" stroke="#B26400" stroke-width="4"/><path d="M20 10 Q12 -8 2 -12 M20 10 Q30 -8 38 -12" stroke="#37AE27" stroke-width="6" fill="none" stroke-linecap="round"/></g></g>
                <g transform="translate(180,2)"><g class="carotte-ballerine"><polygon points="20,10 32,58 8,58" fill="#FF9500" stroke="#B26400" stroke-width="4"/><path d="M20 10 Q12 -8 2 -12 M20 10 Q20 -10 18 -16 M20 10 Q30 -8 38 -12" stroke="#37AE27" stroke-width="6" fill="none" stroke-linecap="round"/></g></g>
            </g>
        </svg>
    </div>

    <!-- Titre du site -->
    <div id="titre-scene">
        <?php if ( is_front_page() || is_home() ) : ?>
            <h1 id="titre-principal"><?php bloginfo( 'name' ); ?></h1>
        <?php else : ?>
            <p id="titre-principal"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
        <p id="titre-sous-titre"><?php bloginfo( 'description' ); ?></p>
        <br>
        <a id="action-descendre" href="https://www.google.com/maps/search/?api=1&amp;query=Ferme+citoyenne+de+La+Matanie" target="_blank" rel="noopener">Visiter la ferme</a>
    </div>
</header>

<!-- ===================== BANDEAU RECOLTE ===================== -->
<div id="bandeau-recolte">
    <div id="bandeau-defilement">
        <span>🥕 Carottes sucrées</span><span>🍅 Tomates du champ</span><span>🥬 Laitue croquante</span><span>🌽 Maïs doux</span><span>🎃 Citrouilles d'automne</span><span>🧺 Paniers du jeudi</span>
        <span>🥕 Carottes sucrées</span><span>🍅 Tomates du champ</span><span>🥬 Laitue croquante</span><span>🌽 Maïs doux</span><span>🎃 Citrouilles d'automne</span><span>🧺 Paniers du jeudi</span>
        <span>🥕 Carottes sucrées</span><span>🍅 Tomates du champ</span><span>🥬 Laitue croquante</span><span>🌽 Maïs doux</span><span>🎃 Citrouilles d'automne</span><span>🧺 Paniers du jeudi</span>
        <span>🥕 Carottes sucrées</span><span>🍅 Tomates du champ</span><span>🥬 Laitue croquante</span><span>🌽 Maïs doux</span><span>🎃 Citrouilles d'automne</span><span>🧺 Paniers du jeudi</span>
        <span>🥕 Carottes sucrées</span><span>🍅 Tomates du champ</span><span>🥬 Laitue croquante</span><span>🌽 Maïs doux</span><span>🎃 Citrouilles d'automne</span><span>🧺 Paniers du jeudi</span>
        <span>🥕 Carottes sucrées</span><span>🍅 Tomates du champ</span><span>🥬 Laitue croquante</span><span>🌽 Maïs doux</span><span>🎃 Citrouilles d'automne</span><span>🧺 Paniers du jeudi</span>
    </div>
</div>
