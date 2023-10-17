import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        /** If you set esmExternals to true, this plugins assumes that 
              all external dependencies are ES modules */

        commonjsOptions: {
            esmExternals: true,
        },
    },
});
