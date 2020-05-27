const mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/demos/index.js', 'public/js/demos.js')
    .sourceMaps()
    .sass('resources/sass/app.scss', 'css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')]
    })
    .purgeCss({
        extensions: ['html', 'md', 'js', 'php', 'vue', 'blade'],
        folders: ['source'],
        whitelistPatterns: ['/language/', '/hljs/']
    })
    .version();
