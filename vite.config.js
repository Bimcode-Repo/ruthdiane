import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import fs from "fs";

export default defineConfig({
    base: "/",
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: [
                "resources/views/**",
                "app/Livewire/**",
                "app/View/Components/**",
            ],
        }),
    ],
    server: {
        host: "localhost",
        port: 5173,
        watch: {
            usePolling: true,
        },
        hmr: {
            host: "localhost",
        },
    },
});
