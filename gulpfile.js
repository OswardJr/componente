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

//ejecutar las tareas
gulp.task('default', ['css', 'js'])
