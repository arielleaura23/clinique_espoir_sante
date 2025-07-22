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

// Fermer la modale
document.getElementById("closeModal").addEventListener("click", function () {
    document.getElementById("successModal").style.display = "none";
});

// animer le compteur
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".count-number");

    const animateCount = (el, target) => {
        let start = 0;
        const duration = 2000;
        const step = Math.ceil(target / (duration / 20));

        const counter = setInterval(() => {
            start += step;
            if (start >= target) {
                start = target;
                clearInterval(counter);
            }

            if (target >= 1000) {
                el.childNodes[0].nodeValue = Math.floor(start / 1000);
            } else {
                el.childNodes[0].nodeValue = start;
            }
        }, 20);
    };

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.getAttribute("data-target"));
                    animateCount(el, target);
                    obs.unobserve(el);
                }
            });
        },
        {
            threshold: 0.6,
        }
    );

    counters.forEach((counter) => {
        observer.observe(counter);
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // Ouvrir le popup lorsque l'on clique sur le bouton "Appeler la clinique"
    const openCallBtn = document.getElementById("openCallModal");
    const callModal = document.getElementById("callClinicModal");

    if (openCallBtn && callModal) {
        openCallBtn.addEventListener("click", function (e) {
            e.preventDefault();
            console.log("Appeler la clinique");
            callModal.style.display = "flex";
        });
    } else {
        console.log("Bouton ou modal non trouvés");
    }

    // Fermer les popups dynamiques lorsqu'on clique sur une croix
    const closeButtons = document.querySelectorAll(".close-button");
    closeButtons.forEach(function (btn) {
        btn.addEventListener("click", function () {
            const modalId = btn.dataset.close;
            const modalToClose = document.getElementById(modalId);
            if (modalToClose) {
                modalToClose.style.display = "none";
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll("a.nav-link");
    const page = document.querySelector(".page");

    links.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const target = this.href;

            // Lance l'animation de disparition
            page.classList.add("fade-out");

            // Attend que l'animation se termine avant de changer de page
            setTimeout(() => {
                window.location.href = target;
            }, 500); // correspond à transition: 0.5s
        });
    });
});

// script pour afficher le panier
document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("panierToggle");
    const dropdown = document.getElementById("panierDropdown");

    toggle.addEventListener("click", function (e) {
        e.preventDefault();
        dropdown.classList.toggle("active");
    });

    // Fermer si on clique ailleurs
    document.addEventListener("click", function (e) {
        if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove("active");
        }
    });
});

// Script pour la recherche de médicaments

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("pharmacy-search-input");
    const cards = document.querySelectorAll(".pharmacy-product-card");

    searchInput.addEventListener("input", function () {
        const value = this.value.trim().toLowerCase();
        cards.forEach((card) => {
            const title = card
                .querySelector(".pharmacy-product-title")
                .textContent.toLowerCase();
            if (title.includes(value)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    });
});

// Script pour la recherche d'événements

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("event-search-input");
    // Récupère tous les événements des deux sections
    const eventCards = document.querySelectorAll(".evenements .evenement");

    searchInput.addEventListener("input", function () {
        const value = this.value.trim().toLowerCase();
        eventCards.forEach((card) => {
            // Recherche dans le titre, la date, le lieu, l’horaire et la description
            const titre =
                card.querySelector(".titre")?.textContent.toLowerCase() || "";
            const date =
                card.querySelector(".date")?.textContent.toLowerCase() || "";
            const lieu =
                card.querySelector(".lieu")?.textContent.toLowerCase() || "";
            const horaire =
                card.querySelector(".horaire")?.textContent.toLowerCase() || "";
            const desc =
                card.querySelector(".description")?.textContent.toLowerCase() ||
                "";
            // Affiche si au moins un champ contient la valeur recherchée
            if (
                titre.includes(value) ||
                date.includes(value) ||
                lieu.includes(value) ||
                horaire.includes(value) ||
                desc.includes(value)
            ) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    });
});

// Afficher/masquer les champs carte selon le paiement choisi
document.querySelectorAll('input[name="payment"]').forEach(function (radio) {
    radio.addEventListener("change", function () {
        const cardFields = document.querySelector(".card-fields");
        if (document.getElementById("credit-card").checked) {
            cardFields.style.display = "block";
        } else {
            cardFields.style.display = "none";
        }
    });
});

// Validation des champs avant paiement
document.querySelector(".pay-now-btn").onclick = function (e) {
    e.preventDefault();
    let valid = true;
    let message = "";

    // Vérifie les champs client
    ["nom", "adresse", "phone", "ville", "quartier"].forEach(function (id) {
        const input = document.getElementById(id);
        if (!input.value.trim()) {
            valid = false;
            input.style.borderColor = "red";
            message = "Veuillez remplir tous les champs obligatoires.";
        } else {
            input.style.borderColor = "";
        }
    });

    // Si carte de crédit, vérifie les champs carte
    if (document.getElementById("credit-card").checked) {
        ["card-number", "card-expiry", "card-cvv"].forEach(function (id) {
            const input = document.getElementById(id);
            if (!input.value.trim()) {
                valid = false;
                input.style.borderColor = "red";
                message =
                    "Veuillez remplir les informations de carte bancaire.";
            } else {
                input.style.borderColor = "";
            }
        });
    }

    if (!valid) {
        showCheckoutModal(
            "Erreur",
            message || "Veuillez vérifier le formulaire."
        );
        return false;
    }

    // Si tout est OK, affiche la popup de confirmation
    showCheckoutModal(
        "Paiement réussi",
        "Merci pour votre commande !<br>Vous recevrez une confirmation par SMS."
    );
};

// Popup de confirmation simple
function showCheckoutModal(title, message) {
    let modal = document.getElementById("checkoutModal");
    if (!modal) {
        modal = document.createElement("div");
        modal.id = "checkoutModal";
        modal.style.position = "fixed";
        modal.style.top = 0;
        modal.style.left = 0;
        modal.style.width = "100vw";
        modal.style.height = "100vh";
        modal.style.background = "rgba(0,0,0,0.3)";
        modal.style.display = "flex";
        modal.style.alignItems = "center";
        modal.style.justifyContent = "center";
        modal.style.zIndex = 9999;
        modal.innerHTML = `
            <div style="background:#fff;padding:32px 24px;border-radius:14px;max-width:350px;text-align:center;box-shadow:0 2px 16px rgba(0,0,0,0.08);">
                <h2 id="checkoutModalTitle" style="margin-bottom:12px;font-size:22px;color:#1d77fe;">${title}</h2>
                <div id="checkoutModalBody" style="font-size:16px;color:#444;margin-bottom:18px;">${message}</div>
                <button id="closeCheckoutModal" style="background:#1d77fe;color:#fff;border:none;border-radius:7px;padding:10px 24px;font-size:16px;cursor:pointer;">Fermer</button>
            </div>
                `;
        document.body.appendChild(modal);
        document.getElementById("closeCheckoutModal").onclick = function () {
            modal.style.display = "none";
        };
    } else {
        document.getElementById("checkoutModalTitle").innerHTML = title;
        document.getElementById("checkoutModalBody").innerHTML = message;
        modal.style.display = "flex";
    }

    // Ajouter un médicament au panier
document.addEventListener("DOMContentLoaded", function () {
    const addButtons = document.querySelectorAll(".btn-add-to-cart");
    const cartItems = document.querySelector(".cart-items");
    const cartCount = document.querySelector(".cart-count");
    const cartTotal = document.querySelector(".cart-total strong");

    let total = 0;
    let count = 0;

    addButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();

            const medicineId = this.getAttribute("data-id");

            // AJAX request to fetch medicine info
            fetch(`cart/medicine/${medicineId}`)
                .then((res) => res.json())
                .then((data) => {
                    const item = document.createElement("a");
                    item.classList.add("cart-item");
                    item.setAttribute("href", `/medicine/${data.id}`);

                    item.innerHTML = `
                        <div class="img-medicine">
                            <img src="/storage/${data.image}" alt="${data.name}">
                        </div>
                        <div class="item-info">
                            <span class="item-name">${data.name}</span>
                            <span class="item-price">${data.price} FCFA</span>
                        </div>
                        <div class="item-qty">
                            <span class="item-price">×1</span>
                        </div>
                    `;

                    cartItems.appendChild(item);
                    total += parseInt(data.price);
                    count += 1;

                    cartCount.textContent = count;
                    cartTotal.textContent = `Total: ${total} FCFA`;
                });
        });
    });
});
}
