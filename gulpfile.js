const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');
// CSS

var style_css = 'user/modules/scss/**/*.scss';

// compile scss
function scss() {
    return gulp
        .src([style_css])
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ["last 2 versions", "ie >= 9", "Android >= 4", "ios_saf >= 8"],
            cascade: false
        }))
        .pipe(gulp.dest('user/modules/Style'))
        .pipe(browserSync.stream());
}

// browser reload
function browserSyncReload() {
    browserSync.init({
        server: {
            baseDir: ''
        },
    });
    gulp.watch('user/modules/scss/**/*.scss', scss);
}
exports.scss = scss;
exports.browserSync = browserSync;
gulp.task('scss', gulp.series(scss));
gulp.task('default', gulp.series(scss, browserSyncReload));