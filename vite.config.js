import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

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
    ],
    server: {
        https: {
            key: fs.readFileSync('./certs/jonathan-ruthdiane.websrc.fr+3-key.pem'),
            cert: fs.readFileSync('./certs/jonathan-ruthdiane.websrc.fr+3.pem'),
        },
        hmr: {
            host: 'jonathan-ruthdiane.websrc.fr',
            protocol: 'wss',
            port: 4688,
        },
        watch: {
            usePolling: true,
        },
        host: true,
        port: 4688,
    },
});
