import './bootstrap';
import focus from '@alpinejs/focus';

// Livewire charge déjà Alpine, on étend juste son instance
document.addEventListener('livewire:init', () => {
    window.Alpine.plugin(focus);
});
