var syntax        = 'sass'; // Syntax: sass or scss;

var gulp          = require('gulp'),
		gutil         = require('gulp-util' ),
		sass          = require('gulp-sass'),
		browsersync   = require('browser-sync'),
		concat        = require('gulp-concat'),
		uglify        = require('gulp-uglify'),
		cleancss      = require('gulp-clean-css'),
		rename        = require('gulp-rename'),
		autoprefixer  = require('gulp-autoprefixer'),
		notify        = require("gulp-notify"),
		rsync         = require('gulp-rsync'),
		plumber       = require('gulp-plumber'),
		rigger        = require('gulp-rigger');



gulp.task('browser-sync', function() {
	browsersync({
		server: {
			baseDir: 'fix-it/build'
		},
		notify: false,
		// open: false,
		// tunnel: true,
		// tunnel: "freearchers", //Demonstration page: http://freearchers.localtunnel.me
	})
});

gulp.task('htmlBuild', function () {
	gulp.src('fix-it/app/*.html') // выбор всех html файлов по указанному пути
	.pipe(plumber())
	.pipe(rigger()) // импорт вложений
	.pipe(gulp.dest('fix-it/build/')) // выкладывание готовых файлов
	.pipe(browsersync.reload({ stream: true })); // перезагрузка сервера
});

gulp.task('styles', function() {
	return gulp.src('fix-it/app/'+syntax+'/**/*.'+syntax+'')
	.pipe(sass({ outputStyle: 'expand' }).on("error", notify.onError()))
	.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('fix-it/build/css'))
	.pipe(browsersync.reload( {stream: true} ))
});

gulp.task('js', function() {
	return gulp.src([
		'node_modules/jquery/dist/jquery.slim.js',
		'node_modules/popper.js/dist/umd/popper.js',
		'fix-it/app/js/common.js' //, Always at the end
		])
	.pipe(concat('scripts.min.js'))
	.pipe(plumber())
	.pipe(rigger()) // импорт вложений
	.pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('fix-it/build/js'))
	.pipe(browsersync.reload({ stream: true }))
});

gulp.task('rsync', function() {
	return gulp.src('fix-it/app/**')
	.pipe(rsync({
		root: 'fix-it/build/',
		hostname: 'username@yousite.com',
		destination: 'yousite/public_html/',
		// include: ['*.htaccess'], // Includes files to deploy
		exclude: ['**/Thumbs.db', '**/*.DS_Store'], // Excludes files from deploy
		recursive: true,
		archive: true,
		silent: false,
		compress: true
	}))
});

gulp.task('watch', ['htmlBuild', 'styles', 'js', 'browser-sync'], function() {
	gulp.watch('fix-it/app/'+syntax+'/**/*.'+syntax+'', ['styles']);
	gulp.watch('fix-it/app/**/*.html', ['htmlBuild']);
	gulp.watch(['fix-it/app/libs/**/*.js', 'fix-it/app/js/common.js'], ['js']);
	gulp.watch('fix-it/app/*.html', browsersync.reload)
});

gulp.task('default', ['watch']);
