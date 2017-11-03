// Gulp File

// Automation / Build system
var gulp = require('gulp')
// Refreshes browser during development
var browserSync = require('browser-sync').create()
// Minifies php files to make load speeds faster
var {phpMinify} = require('@cedx/gulp-php-minify')
// Connect to the PHP server
var connect = require('gulp-connect-php')

// Code Change Tasks

    // Detects changes in php, minifies them
    gulp.task('php', function() {
        gulp.src('*.php', {read: false})
            .pipe(phpMinify())
            .pipe(gulp.dest('./build'))
    })

    // Reloads browser when detecting a php change
    gulp.task('php-watch', ['php'], function() {
        console.log('Detected changes in PHP files...')
        browserSync.reload()
        console.log('Reloaded browser')
    })

// Default task to launch browserSync and watch all files
gulp.task('default', function() {
    connect.server({}, function() {
        browserSync.init({
            server: {
                baseDir: "build",
                index: "/index.php"
            }
        })
    })

    // watch files for changes and recompile/minify them
    gulp.watch("src/php/*.php", ['php-watch'])
});
