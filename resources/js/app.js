import './bootstrap';
import focus from '@alpinejs/focus';

document.addEventListener('livewire:init', () => {
    window.Alpine.plugin(focus);
});

if (import.meta.hot) {
    import.meta.hot.on('vite:beforeUpdate', () => {
        console.clear();
    });
}
