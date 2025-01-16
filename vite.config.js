import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/item_view.scss',
                'resources/sass/item_list.scss',
                'resources/sass/login.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
