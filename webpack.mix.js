let mix = require("laravel-mix");
let tailwindcss = require("tailwindcss");
let glob = require('glob-all')
let purgeCss = require("laravel-mix-purgecss");
let postcssImport = require('postcss-import');

mix.js('resources/assets/js/app.js', 'public/js')
    .postCss('resources/assets/css/main.css', 'public/css', [
        postcssImport(),
        tailwindcss('tailwind.js')
    ]);

mix.options({
    postCss: [
        require('autoprefixer')({
            grid: true,
            browsers: ['last 2 versions', 'IE 9', 'Safari 9']
        })
    ]
});

if (mix.inProduction()) {
    mix.webpackConfig({
        plugins: [
            new purgeCss({
                paths: glob.sync([
                    path.join(__dirname, 'resources/views/**/*.blade.php'),
                    path.join(__dirname, 'resources/assets/js/**/*.vue')
                ]),
                extractors: [
                    {
                        extractor: class {
                            static extract(content) {
                                return content.match(/[A-z0-9-:\/]+/g)
                            }
                        },
                        extensions: ['html', 'js', 'php', 'vue']
                    }
                ]
            })
        ]
    })
}