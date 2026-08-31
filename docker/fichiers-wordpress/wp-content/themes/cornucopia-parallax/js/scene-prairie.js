/**
 * Scène prairie : parallax des couches au défilement
 * et apparition rebondissante des cartes.
 */
(function () {
    const couches = document.querySelectorAll('.couche');
    const carottesBallerines = document.querySelectorAll('.carotte-ballerine');
    function appliquerParallax() {
        const defilement = window.scrollY;
        couches.forEach(function (couche) {
            const vitesse = parseFloat(couche.dataset.vitesse || 0);
            couche.style.transform = 'translateY(' + (defilement * vitesse) + 'px)';
        });
        // Les carottes dansent : penchement courbe qui alterne droite et gauche
        // au fil du defilement, chaque carotte decalee d'un temps sur sa voisine.
        carottesBallerines.forEach(function (carotte, indice) {
            const angle = 14 * Math.sin(defilement / 240 + indice * 0.9);
            carotte.style.transform = 'rotate(' + angle + 'deg) skewX(' + (angle / 2) + 'deg)';
        });
    }
    window.addEventListener('scroll', appliquerParallax, { passive: true });

    const observateur = new IntersectionObserver(function (entrees) {
        entrees.forEach(function (entree) {
            if (entree.isIntersecting) {
                entree.target.classList.add('visible');
                observateur.unobserve(entree.target);
            }
        });
    }, { threshold: 0.15 });
    document.querySelectorAll('.nouvelle, .abonnement').forEach(function (carte) {
        observateur.observe(carte);
    });
})();
