import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import mkcert from 'vite-plugin-mkcert';

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/views/**',
                'app/Livewire/**',
                'app/View/Components/**',
            ],
        }),
        mkcert() // active le plugin mkcert qui crée un HTTPS local valide
    ],
    server: {
        hmr: {
            host: 'jonathan-ruthdiane.websrc.fr',
            protocol: 'wss',
            port: 4688,
        },
        watch: {
            usePolling: true,
        },
        https: true,
        port: 4688,
    },
});
