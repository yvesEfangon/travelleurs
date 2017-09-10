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

gulp.task('icons', function() {
    return gulp.src([config.bowerDir + '/font-awesome/fonts/**.*',config.bowerDir + '/bootstrap/fonts/**.*'])
        .pipe(gulp.dest('./src/AppBundle/Resources/public/assets/vendor/fonts'));
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
        .pipe(gulp.dest('./src/AppBundle/Resources/public/assets/application/images'));
});
//
// gulp.task('css-vendor', function() {
//     return gulp.src(config.bowerDir + '/bootstrap-sass/assets/stylesheets/_bootstrap.scss')
//         .pipe(sass({
//             style: 'compressed',
//             loadPath: [
//                 config.bowerDir + '/bootstrap-sass/stylesheets'
//             ]
//         })
//             .on("error", notify.onError(function (error) {
//                 return "Error: " + error.message;
//             })))
//         .pipe(gulp.dest('./src/AppBundle/Resources/public/assets/vendor/tmp'));
// });

// config.bowerDir + '/font-awesome/less/font-awesome.less'
// gulp.task('css-vendor', function() {
//     return gulp.src([config.bowerDir + '/bootstrap/less/bootstrap.less'])
//         .pipe(less())
//         .pipe(concat('bootstrap.css'))
//         .pipe(gulp.dest('./src/AppBundle/Resources/public/assets/vendor/tmp'));
// });


gulp.task('css-vendor2', function () {

    return gulp.src(config.cssPath+'/*.css')
        .pipe(concat('vendor-1.css'))
        .pipe(gulp.dest('src/AppBundle/Resources/public/assets/vendor/tmp'));
});


gulp.task('css-application', function () {
    return gulp.src('src/AppBundle/Resources/public/application/css/*.css')
        .pipe(concat('application-css.css'))
        .pipe(minify())
        .pipe(gulp.dest('src/AppBundle/Resources/public/assets/application/css'))
});

gulp.task('css-concat', function () {

    return gulp.src(['bower_components/jquery-ui/themes/base/*.css', 'src/AppBundle/Resources/public/assets/vendor/tmp/*.css'])
        .pipe(concat('vendor-css.css'))
        .pipe(minify())
        .pipe(gulp.dest('src/AppBundle/Resources/public/assets/application/css'))
    }
);


gulp.task('vendor-js', function () {
    return gulp.src(
        [
            'src/AppBundle/Resources/public/vendor/js/jquery-2.0.0.min.js',
           'src/AppBundle/Resources/public/vendor/jquery-ui-1.12.1.custom/jquery-ui.js',
            'src/AppBundle/Resources/public/vendor/js/jquery.dropotron.min.js',
            'src/AppBundle/Resources/public/js/std/bootstrap.min.js',
            'src/AppBundle/Resources/public/vendor/js/underscore-min.js',
            'src/AppBundle/Resources/public/vendor/js/backbone-min.js',
            'src/AppBundle/Resources/public/vendor/js/skel.min.js',
            'src/AppBundle/Resources/public/vendor/js/util.js',
            'src/AppBundle/Resources/public/vendor/js/main.js',
            'node_modules/bazinga-translator/public/js/translator.min.js'
        ])
        .pipe(concat('vendor-js.js'))
        .pipe(gulp.dest('src/AppBundle/Resources/public/assets/vendor/js/'))
});

gulp.task('application-js', function () {
    return gulp.src('src/AppBundle/Resources/public/application/js/*.js')
        .pipe(concat('application-js.js'))
        .pipe(gulp.dest('src/AppBundle/Resources/public/assets/vendor/tmp/'))
});

gulp.task('application-min-js', function () {
    return gulp.src('src/AppBundle/Resources/public/assets/vendor/tmp/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('src/AppBundle/Resources/public/assets/application/js/'))
});

gulp.task('clean-tmp', function() {
    return gulp.src('src/AppBundle/Resources/public/assets/vendor/tmp', {read: false})
        .pipe(clean());
});

// Rerun the task when a file changes
gulp.task('watch', function() {
    gulp.watch('src/AppBundle/Resources/public/application/css/*.css', ['css']);
});
// 'icons', 'css-vendor2','css-concat','css-application',
gulp.task('default', gulp.series('bower',  'vendor-js','application-js','application-min-js','clean-tmp', 'images'));