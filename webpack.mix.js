var cssImport = require('postcss-import');
var cssNext = require('postcss-cssnext');
var glob = require('glob-all');
var mix = require('laravel-mix');
var purgeCss = require('purgecss-webpack-plugin');
var tailwind = require('tailwindcss');

mix.js('resources/assets/js/app.js', 'public/js')
    .postCss('resources/assets/css/main.css', 'public/css/main.css', [
        cssImport(),
        tailwind('tailwind.js'),
        cssNext({ features: { autoprefixer: false }}),
    ])
.version();

if (mix.inProduction()) {
    mix.webpackConfig({
        plugins: [
            new purgeCss({
                paths: glob.sync([
                    path.join(__dirname, 'resources/views/**/*.blade.php'),
                    path.join(__dirname, 'resources/assets/js/**/*.vue'),
                    path.join(__dirname, 'resources/assets/vendor/**/*.vue')
                ]),
                extractors: [
                    {
                        extractor: class {
                            static extract(content) {
                                return content.match(/[A-z0-9-:\/]+/g) || []
                            }
                        },
                        extensions: ['html', 'js', 'php', 'vue']
                    }
                ]
            })
        ]
    })
}