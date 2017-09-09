/**
 * Created by Yves Efangon on 20/04/2017.
 */
var gulp = require('gulp');
var pug = require('gulp-pug');
var less = require('gulp-less');
var concat  = require('gulp-concat');
var minify  = require('gulp-minify');
var clean = require('gulp-clean');
var rename  = require('gulp-rename');
var uglify  = require('gulp-uglify');
var merge   = require('merge');
var json_merge  = require('gulp-merge-json');
var runSequence = require('gulp-sequence');
var translator  = require('bazinga-translator')

/*With bower */
var   sass = require('gulp-ruby-sass');
var   notify = require("gulp-notify");
var  bower = require('gulp-bower');

var config = {
    sassPath: 'src/AppBundle/Resources/public/vendor/sass',
    cssPath: 'src/AppBundle/Resources/public/vendor/css',
    bowerDir: './bower_components'
}

gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest(config.bowerDir))
});

gulp.task('icons', function() {
    return gulp.src(config.bowerDir + '/fontawesome/fonts/**.*')
        .pipe(gulp.dest('src/AppBundle/Resources/public/assets/vendor/fonts'));
});
/*gulp.src(config.sassPath + '/**.*')
 .pipe(*/
gulp.task('css', function() {
    return sass(config.sassPath + '/**.*',
                {
            style: 'compressed',
            loadPath: [
                'src/AppBundle/Resources/public/vendor/sass',
                config.bowerDir + '/bootstrap-sass-official/assets/stylesheets',
                config.bowerDir + '/fontawesome/scss',
            ]
        })
            .on("error", notify.onError(function (error) {
                return "Error: " + error.message;
            }))
        .pipe(gulp.dest('src/AppBundle/Resources/public/assets/vendor/css'));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
    gulp.watch(config.sassPath + '/**/*.scss', ['css']);
});

gulp.task('default', ['bower', 'icons', 'css']);