// import babelRegister from 'babel-register';

import gulp from 'gulp';
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';
import cleanCSS from 'gulp-clean-css';
import notify from 'gulp-notify'; //error code
import sourcemaps  from 'gulp-sourcemaps'; //+
import autoprefixer from 'gulp-autoprefixer';
import rigger from 'gulp-rigger'; //for HTML imports //==
import browserSync from 'browser-sync';
const sync = browserSync.create();
import del from 'del';
import sass from 'gulp-sass';
sass.compiler = require('node-sass');
import combiner from 'stream-combiner2';
const combine = combiner.obj;
import imagemin from 'gulp-imagemin';

const themeName = 'transfer-vlc';

const paths = {
    styles: {
        src: 'src/css/style.sass',
        watch: 'src/css/*.*',
        dest: themeName + '/'
        // dest: themeName + '/css/'
    },
    scripts: {
        src: 'src/js/*.js',
        dest: themeName + '/js/'
    },
    otherFiles:{
        src: 'src/*.*',
        watch: 'src/*.*',
        dest: themeName
    },
    img:{
        src: 'src/img/**/*.*',
        dest: themeName + '/img/'
    },
    another:{
        src: 'src/other/**/*.*',
        dest: themeName
    }
};

export function anotherCopy(){
    return gulp.src(paths.another.src)
        .pipe(gulp.dest(paths.another.dest));
}

export function otherFiles(){
    return combine(
        gulp.src(paths.otherFiles.src), // выбор всех файлов по указанному пути
        rigger(), // импорт вложений
        gulp.dest(paths.otherFiles.dest),
    ).on('error', notify.onError());
}

export function images (){
    return ( gulp.src(paths.img.src)
            .pipe(imagemin([
                imagemin.gifsicle({interlaced: true}),
                imagemin.jpegtran({progressive: true}),
                imagemin.optipng({optimizationLevel: 5}),
                imagemin.svgo({
                    plugins: [
                        {removeViewBox: true},
                        {cleanupIDs: false}
                    ]
                })
                ],{
                    verbose: true
                }
            ))
            .pipe(gulp.dest(paths.img.dest)));
}

export function imgFastCopy(){
    return gulp.src(paths.img.src)
        .pipe(gulp.dest(paths.img.dest));
}

export function styles() {
    return combine(
        gulp.src(paths.styles.src),
        sourcemaps.init(), //sourcemaps for development mode
        sass({ outputStyle: 'compressed' }), //  for minify
        // sass({ outputStyle: 'expand' }), //  for NON minify

        // cleanCSS(),
        sourcemaps.write(), //sourcemaps for development mode
        // autoprefixer(['last 15 versions']),
        // rename({ suffix: '.min'}),// pass in options to the stream
        gulp.dest(paths.styles.dest)
    ).on('error', notify.onError());
}

export function stylesClean() {
    return combine(
        gulp.src(paths.styles.src),
        sass({ outputStyle: 'compressed' }), // {outputStyle: 'expand'} for nonminify style file
        cleanCSS(),
        autoprefixer(['last 15 versions']),
        // rename({ suffix: '.min'}),// pass in options to the stream
        gulp.dest(paths.styles.dest)
    ).on('error', notify.onError());
}

export function scripts() {
    return combine(
            gulp.src(paths.scripts.src),//(paths.scripts.src, { sourcemaps: true })
            sourcemaps.init(), //sourcemaps for development mode
            rigger(), // импорт вложений
            babel(),
            uglify(),
            sourcemaps.write(), //sourcemaps for development mode
            concat('main.min.js'),
            gulp.dest(paths.scripts.dest)
        ).on('error', notify.onError());
}

export function scriptsClean() {
    return combine(
        gulp.src(paths.scripts.src),//(paths.scripts.src, { sourcemaps: true })
        rigger(), // импорт вложений
        babel(),
        uglify(),
        concat('main.min.js'),
        gulp.dest(paths.scripts.dest)
    ).on('error', notify.onError());
}

export function watchFiles() {
    gulp.watch(paths.scripts.src, scripts);
    gulp.watch(paths.styles.watch, styles);
    gulp.watch(paths.otherFiles.watch, otherFiles);
};


export function server() {
    sync.init(null,{

        proxy: 'http://transfer-vlc.loc/', // 'dev.site.com' in your example
        // port: 5000

        // server: '../../../tiempovegano',
        // open: false,
        // tunnel: true,
        // tunnel: 'tiempo.vegano'
    });
    sync.watch(themeName + '/**/*.*').on('change', sync.reload);
};

export const clean = () => del([themeName + '/**']);

export const build = gulp.series(clean, gulp.parallel(styles, scripts, imgFastCopy, otherFiles, anotherCopy));

export const develop = gulp.series(build, gulp.parallel(watchFiles, server));

export const deploy = gulp.series(clean, gulp.parallel(stylesClean, scriptsClean, otherFiles, anotherCopy, images)); // rsync...

export default develop;