'use strict'

const gulp = require('gulp');
const babel = require('gulp-babel');
const bust = require('gulp-cache-bust');
const watch = require('gulp-watch');
const plumber = require('gulp-plumber');
const gulpsass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCss = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const jshint = require('gulp-jshint');
const uglify = require('gulp-uglify');
const imagemin = require('gulp-imagemin');
const livereload = require('gulp-livereload');

let onError = function(err){
  console.log('Se ha producido un error: ', err.message);
  this.emit('end');
}

gulp.task('cache', () => {
	gulp.src('*.php')
    .pipe(bust({
        type: 'timestamp'
    }))
    .pipe(gulp.dest('.'));
});

gulp.task('sass', () => {
  return gulp.src('./scss/style.scss')
    .pipe(plumber({errorHandler: onError}))
    // Iniciamos el trabajo con sourcemaps
    .pipe(sourcemaps.init())
    .pipe(gulpsass())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest('.'))
    .pipe(cleanCss({keepSpecialComments: 1}))
    // Escribir los sourcemaps
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('.'))
    .pipe(livereload())
});

gulp.task('lint', () => {
	return gulp.src('./js/**/*.js')
		.pipe(jshint())
});

gulp.task('globaljs', ['lint'], function() {
	return gulp.src('./js/globales/**.js')
    .pipe(plumber({ errorHandler: onError }))
    .pipe(babel({
      presets: ['@babel/env']
    }))
		.pipe(concat('global.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./js'))
		.pipe(livereload())
});

gulp.task('uniquejs', ['lint'], function() {
	return gulp.src('./js/unicos/**.js')
    .pipe(plumber({ errorHandler: onError }))
    .pipe(babel({
      presets: ['@babel/env']
    }))
		.pipe(uglify())
		.pipe(gulp.dest('./js'))
		.pipe(livereload())
});

gulp.task('imagemin', () => {
	return gulp.src('./img/dev/**.*')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(imagemin({
			progressive: true,
			interlaced: true
		}))
		.pipe(gulp.dest('./img/'))
		.pipe(livereload())
});

gulp.task('watch', function () {
	livereload.listen();
	gulp.watch('./scss/**/**.scss', ['sass', 'cache'])
	gulp.watch('./js/**/**.js', ['globaljs', 'uniquejs', 'cache'])
	gulp.watch('./img/dev/**.*', ['imagemin'])

});

gulp.task('default', ['sass', 'globaljs', 'uniquejs', 'imagemin', 'watch'], function(){

});
