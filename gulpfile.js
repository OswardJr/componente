// inicializamos las variables
// si queremos solamente comprimir sin concatenar
// se quita .pipe(concat(''))

var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    minifycss = require('gulp-minify-css')

//minificar el css y concatenarlos
gulp.task('css', () => {
	gulp
  .src('public/src/css/*.css')
  .pipe(concat('estilos.css'))
  .pipe(minifycss())
  .pipe(gulp.dest('public/dist/css/'))
})

//minificar los js y concatenarlos
gulp.task('js', () => {
  gulp
  .src('public/src/js/*.js')
  .pipe(concat('scripts.js'))
  .pipe(uglify())
  .pipe( gulp.dest('public/dist/js/') )
})

//minificar los js de los plugins
gulp.task('pluginsjs', () => {
  gulp
  .src('public/src/plugins/**/js/*.js')
  .pipe(uglify())
  .pipe( gulp.dest('public/dist/plugins/') )
})
//minificar los css de los plugins
gulp.task('pluginscss', () => {
	gulp
  .src('public/src/plugins/**/css/*.css')
  .pipe(minifycss())
  .pipe(gulp.dest('public/dist/plugins/'))
})

gulp.task('watch', function() {
  gulp.watch('public/src/css/*.css', ['css'])
  gulp.watch('public/src/js/*.js', ['js'])
  gulp.watch('public/src/plugins/**/css/*.css', ['pluginscss'])
  gulp.watch('public/src/plugins/**/js/*.js', ['pluginsjs'])

})

//ejecutar las tareas
gulp.task('default', ['css', 'js','pluginsjs','pluginscss'])
