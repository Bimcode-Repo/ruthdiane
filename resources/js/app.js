import './bootstrap';
import focus from '@alpinejs/focus';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import AOS from 'aos'
import 'aos/dist/aos.css'

AOS.init()

document.addEventListener('livewire:init', () => {
    window.Alpine.plugin(focus);
});

// Initialisation du slider Swiper quand DOM ready
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('#logo-slider', {
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
});

if (import.meta.hot) {
    import.meta.hot.on('vite:beforeUpdate', () => {
        console.clear();
    });
}
