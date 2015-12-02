var $ = require('gulp-load-plugins')();
var del = require('del');
var gulp = require('gulp');

gulp.task('default', ['runSequence']);

gulp.task('runSequence', function (callback) {
  $.runSequence(
    'clean', ['sass', 'coffee', 'javascripts'], 'watch', callback
  );
});

gulp.task('clean', function () {
  del(['./web/assets']).then(function (paths) {
    console.log("Clean:\n", paths.join("\n"))
  });
});

gulp.task('sass', function () {
  gulp.src('./assets/scss/application.scss')
    .pipe($.sass())
    .pipe($.autoprefixer())
    .pipe($.minifyCss())
    .pipe(gulp.dest('./web/assets/css'));
});

gulp.task('coffee', function () {
  gulp.src('./assets/coffee/**/*.coffee')
    .pipe($.coffee({
      bare: true
    }))
    .pipe($.browserify({
      insertGlobals: true
    }))
    .pipe($.uglify())
    .pipe(gulp.dest('./web/assets/js'));
});

gulp.task('javascripts', function () {
  gulp.src([
    './bower_components/jquery/dist/jquery.min.js',
    './bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.min.js'
  ])
    .pipe(gulp.dest('./web/assets/js'));
});

gulp.task('watch', function () {
  gulp.watch('./assets/scss/**/.scss', ['sass']);
  gulp.watch('./assets/coffee/**/*.coffee', ['coffee']);
});
