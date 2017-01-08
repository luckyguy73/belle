const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
       .version([
       'css/app.css',
       'css/exercise.css',
       'css/getweather.css',
       'css/style.css',
       'js/app.js',
       'js/getweather.js'
       ])
       .webpack('app.js');
});
