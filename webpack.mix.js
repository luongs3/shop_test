let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
function resolve (dir) {
    return path.join(__dirname, '..', dir)
}

mix.js('resources/assets/js/admin/admin.js', 'public/js/admin.js')
mix.js('resources/assets/js/client/client.js', 'public/js/client.js')
   .sass('resources/assets/sass/admin/admin.scss', 'public/css/admin.css')
   .sass('resources/assets/sass/client/client.scss', 'public/css/client.css')
   .sass('resources/assets/sass/app.scss', 'public/css/app.css')
   .webpackConfig({
      resolve: {
         extensions: ['.js', '.vue', '.json'],
         alias: {
            '@': resolve('resources/assets/js'),
            'admin': resolve('resources/assets/js/admin'),
            'client': resolve('resources/assets/js/client'),
            'components': resolve('resources/assets/js/components')
         }
      }
   });
