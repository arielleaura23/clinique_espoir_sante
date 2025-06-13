// afficher le menu sur mobile
function toggleMobileMenu() {
    document.getElementById("mobileMenu").classList.toggle("open");
}

$(function () {
    // Ouvre/ferme le dropdown au clic sur le sélecteur
    $(".lang-switcher-selected").on("click", function (e) {
        e.stopPropagation();
        var $dropdown = $(this).next(".lang-switcher-dropdown");
        if ($dropdown.hasClass("show")) {
            $dropdown.removeClass("show");
        } else {
            $("#lang-switcher-dropdown").removeClass("show");
            $dropdown.addClass("show");
        }
    });

    // Ferme le dropdown si on clique ailleurs (body, html, etc.)
    $("body, html").on("click", function () {
        $(".lang-switcher-dropdown").removeClass("show");
    });

    // Empêche la fermeture si on clique à l'intérieur du dropdown
    $(".lang-switcher-dropdown").on("click", function (e) {
        e.stopPropagation();
    });
});


// Simulation : à appeler après soumission réussie du formulaire
document.querySelector('form').addEventListener('submit', function (e) {
  e.preventDefault(); // Empêche l'envoi réel pour test
  document.getElementById('successModal').style.display = 'flex';
});

// Fermer la modale
document.getElementById('closeModal').addEventListener('click', function () {
  document.getElementById('successModal').style.display = 'none';
});
















