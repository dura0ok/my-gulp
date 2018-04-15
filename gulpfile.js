var gulp = require('gulp'),
browserSync = require('browser-sync').create(),
reload = browserSync.reload,
cleanCSS = require('gulp-clean-css'),
rename = require('gulp-rename'),
autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function(){
return gulp.src("app/css/*.css")
.pipe(rename({suffix: '.min', prefix: ''}))
.pipe(autoprefixer({
browsers: ['last 10 versions'],
cascade: false
}))
.pipe(cleanCSS())
.pipe(gulp.dest('app/dist'))
.pipe(browserSync.stream())
.pipe(browserSync.reload({stream: true}));
});

gulp.task('browser-sync', function(){
browserSync.init({
server: {
baseDir: "./app"
}
});
});
///================================
gulp.task('watch', ['browser-sync', 'css'], function(){
gulp.watch("app/css/*.css", ['css']);
gulp.watch("app/js/*.js").on("change", reload);
gulp.watch("app/*.html").on("change", reload);
});
gulp.task('default', ['watch']);
