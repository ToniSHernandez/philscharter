// let mix = require("laravel-mix");
// let tailwindcss = require("tailwindcss");
// let glob = require('glob-all');
// let purgeCss = require("laravel-mix-purgecss");
// let postcssImport = require('postcss-import');
//
// mix.js('resources/assets/js/app.js', 'public/js')
//     .postCss('resources/assets/css/main.css', 'public/css', [
//         postcssImport(),
//         tailwindcss('tailwind.js')
//     ]);
//
// mix.options({
//     postCss: [
//         require('autoprefixer')({
//             grid: true,
//             browsers: ['last 2 versions', 'IE 9', 'Safari 8']
//         })
//     ]
// });
//
// if (mix.inProduction()) {
//     mix.webpackConfig({
//         plugins: [
//             new purgeCss({
//                 paths: glob.sync([
//                     path.join(__dirname, 'resources/views/**/*.blade.php'),
//                     path.join(__dirname, 'resources/assets/js/**/*.vue')
//                 ]),
//                 extractors: [
//                     {
//                         extractor: class {
//                             static extract(content) {
//                                 return content.match(/[A-z0-9-:\/]+/g)
//                             }
//                         },
//                         extensions: ['html', 'js', 'php', 'vue']
//                     }
//                 ]
//             })
//         ]
//     })
// }

let cssImport = require('postcss-import')
let cssNext = require('postcss-cssnext')
let glob = require('glob-all')
let mix = require('laravel-mix')
let purgeCss = require('purgecss-webpack-plugin')
let tailwind = require('tailwindcss')

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