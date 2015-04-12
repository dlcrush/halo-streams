var gulp = require("gulp");
var bower = require("gulp-bower");
var elixir = require('laravel-elixir');

// Add bower task
gulp.task('bower', function() {
    return bower();
});

elixir.config.sourcemaps = false; // I dont' think Sass will compile without this

// vendor paths
var paths = {
    'jquery': 'vendor/jquery/dist',
    'bootstrap': 'vendor/bootstrap-sass/assets',
    'fontawesome': 'vendor/font-awesome',
    'jqueryLazy': 'vendor/jquery-lazy'
};


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

  // Run bower install
  mix.task('bower');

  // Copy fonts over to public
  mix.copy(paths.bootstrap + "/fonts/bootstrap/fonts/**", 'public/fonts');
  mix.copy(paths.fontawesome + "/fonts/**", 'public/fonts');

  // Compile Sass
  mix.rubySass('application.sass', 'resources/css');

  // Combine styles
  mix.styles([
    'css/application.css'
  ], 'public/css/all.css', 'resources/');

  // Combine scripts
  mix.scripts([
    paths.jquery + '/jquery.js',
    paths.bootstrap + '/javascripts/bootstrap.js',
    paths.jqueryLazy + '/jquery.lazy.js',
    'assets/js/application.js'
  ], 'public/js/all.js', 'resources/');

  // Version css and js for cache-busting
  mix.version([
    'public/css/all.css',
    'public/js/all.js'
  ]);

});
