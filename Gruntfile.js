module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin : {
            bundled:{
                src: 'web/assets/dist/css/vendor.css',
                dest: 'web/assets/dist/css/vendor.min.css'
            }
        },
        uglify : {
            js: {
                files: {
                    'web/assets/dist/js/app.min.js': ['web/assets/dist/js/app.js']
                }
            }
        },
        concat: {
            options: {
                stripBanners: true
            },
            css: {
                src: [
                    'bower_components/bootstrap/dist/css/bootstrap.css',
                ],
                dest: 'web/assets/dist/css/vendor.css'
            },
            js : {
                src : [
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/bootstrap/dist/js/bootstrap.js',
                    'bower_components/angular/angular.js',
                ],
                dest: 'web/assets/dist/js/app.js'
            }
        },
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['concat', 'cssmin', 'uglify']);
};
