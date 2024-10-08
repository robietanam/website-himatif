import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app-frontpage.css','resources/css/app-dashboard.css', 'resources/js/app.js', 'resources/css/frontpage/ckeditor.css' 
           ],
            refresh: true,
        }),
    ],
});
