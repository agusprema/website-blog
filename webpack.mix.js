const mix = require("laravel-mix");
require("dotenv").config();
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/icon.js", "public/js")
    .js("resources/js/vmenu.js", "public/js")
    .js(
        "resources/js/vendor/livewire-editorjs/editorjs.js",
        "public/vendor/livewire-editorjs"
    )
    .sass("resources/css/content.scss", "public/css")
    .postCss("resources/css/icon.css", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        //require("@tailwindcss/jit"),
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ]);

if (mix.inProduction()) {
    mix.version();
}
