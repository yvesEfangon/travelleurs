/**
 * Created by Yves Efangon on 20/04/2017.
 * 
 * Command: npm run gulp task
 */
var gulp = require('gulp');
var pug = require('gulp-pug');
var less = require('gulp-less');
var concat  = require('gulp-concat');
var minify  = require('gulp-minify');
var clean = require('gulp-clean-old');
var rename  = require('gulp-rename');
var uglify  = require('gulp-uglify');
var merge   = require('merge');
var postcss      = require('gulp-postcss');
var  autoprefixer = require('autoprefixer');
var  mqpacker     = require('css-mqpacker');
var image = require('gulp-image');
var bazinga  = require('bazinga-translator');
var runSequence = require('gulp-sequence');
/*With bower */
var   sass = require('gulp-sass');
var   notify = require("gulp-notify");
var  bower = require('gulp-bower');

var config = {
    sassPath: './src/AppBundle/Resources/public/vendor/sass',
    cssPath: './src/AppBundle/Resources/public/vendor/css',
    bowerDir: './bower_components'
};

gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest(config.bowerDir))
});

gulp.task('images', function() {
    return gulp.src('./src/AppBundle/Resources/public/images/*.*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest('./src/AppBundle/Resources/public/images'));
});


// Rerun the task when a file changes
gulp.task('watch', function() {
    gulp.watch('src/AppBundle/Resources/public/application/css/*.css', ['css']);
});
// 'icons', 'css-vendor2','css-concat','css-application',
gulp.task('default', gulp.series('images'));
gulp.task('images', runSequence(['images']));