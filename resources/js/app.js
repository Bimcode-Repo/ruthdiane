import "./bootstrap";
import focus from "@alpinejs/focus";
import Swiper from "swiper/bundle";
import "swiper/css/bundle";
import AOS from "aos";
import "aos/dist/aos.css";
import Swup from "swup";
import SwupFadeTheme from "@swup/fade-theme";
import SwupScrollPlugin from "@swup/scroll-plugin";

// Initialiser AOS
AOS.init({
    once: false,
    duration: 800,
});

document.addEventListener("livewire:init", () => {
    window.Alpine.plugin(focus);

    // Store global pour le menu mobile
    window.Alpine.store("mobileMenu", {
        open: false,
        toggle() {
            this.open = !this.open;
        },
    });
});

// Initialiser Swup uniquement si le container existe (site public)
let swup = null;
if (document.querySelector("#swup")) {
    swup = new Swup({
        plugins: [
            new SwupScrollPlugin({
                doScrollingRightAway: false,
                animateScroll: false,
            }),
        ],
        animationSelector: '[class*="transition-"]',
        containers: ["#swup"],
        cache: true,
        preload: {
            hover: true,
        },
        animateHistoryBrowsing: true,
    });

    // Réinitialiser AOS après chaque changement de page
    swup.hooks.on("content:replace", () => {
        AOS.refresh();
        initMobileMenu();
    });
}

// Fonction pour initialiser le menu mobile
function initMobileMenu() {
    const menu = document.getElementById("mobile-menu");
    const openBtn = document.getElementById("mobile-menu-button");
    const closeBtn = document.getElementById("mobile-menu-close");
    const menuLinks = document.querySelectorAll(".mobile-menu-link");

    if (openBtn && menu && closeBtn) {
        // Supprimer les anciens listeners en clonant les éléments
        const newOpenBtn = openBtn.cloneNode(true);
        openBtn.parentNode.replaceChild(newOpenBtn, openBtn);

        const newCloseBtn = closeBtn.cloneNode(true);
        closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);

        newOpenBtn.addEventListener("click", function (e) {
            e.preventDefault();
            menu.classList.remove("opacity-0", "pointer-events-none");
            menu.classList.add("opacity-100", "pointer-events-auto");
            newCloseBtn.classList.remove("opacity-0", "pointer-events-none");
            newCloseBtn.classList.add("opacity-100", "pointer-events-auto");
            document.documentElement.style.overflow = "hidden";
            document.body.style.overflow = "hidden";
        });

        newCloseBtn.addEventListener("click", function (e) {
            e.preventDefault();
            menu.classList.add("opacity-0", "pointer-events-none");
            menu.classList.remove("opacity-100", "pointer-events-auto");
            newCloseBtn.classList.add("opacity-0", "pointer-events-none");
            newCloseBtn.classList.remove("opacity-100", "pointer-events-auto");
            document.documentElement.style.overflow = "";
            document.body.style.overflow = "";
        });

        menuLinks.forEach((link) => {
            link.addEventListener("click", function () {
                menu.classList.add("opacity-0", "pointer-events-none");
                menu.classList.remove("opacity-100", "pointer-events-auto");
                newCloseBtn.classList.add("opacity-0", "pointer-events-none");
                newCloseBtn.classList.remove(
                    "opacity-100",
                    "pointer-events-auto",
                );
                document.documentElement.style.overflow = "";
                document.body.style.overflow = "";
            });
        });
    }
}

// Réinitialiser Swiper après changement de page
if (swup) {
    swup.hooks.on("content:replace", () => {
        const logoSlider = document.querySelector("#logo-slider");
        if (logoSlider && !logoSlider.swiper) {
            new Swiper("#logo-slider", {
                slidesPerView: 4,
                spaceBetween: 48,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                    reverseDirection: false,
                },
                grabCursor: true,
            });
        }
    });
}

// Initialisation du slider Swiper quand DOM ready
document.addEventListener("DOMContentLoaded", function () {
    new Swiper("#logo-slider", {
        slidesPerView: 4,
        spaceBetween: 48,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            reverseDirection: false,
        },
        grabCursor: true,
    });

    // Initialiser le menu mobile
    initMobileMenu();
});

if (import.meta.hot) {
    import.meta.hot.on("vite:beforeUpdate", () => {
        console.clear();
    });
}
