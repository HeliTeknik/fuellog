var elixir = require('laravel-elixir');

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

    mix.sass('main.scss');

    mix.browserify('app.js');

    mix.phpUnit();

});



/**
 * Normal Gulp Tasks
 */

var gulp = require('gulp');
var cssScss = require('gulp-css-scss');


/**
 * Morph BASSCSS source files into SASS
 */
gulp.task('css-scss', function() {
  return gulp.src('./node_modules/basscss/src/basscss.css')
    .pipe(cssScss())
    .pipe(gulp.dest('./resources/assets/css'));
});