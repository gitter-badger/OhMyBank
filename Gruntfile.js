module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin : {
            bundled:{
                src: 'web/app/css/app.css',
                dest: 'web/app/css/app.css'
            }
        },
        uglify : {
            js: {
                files: {
                    'web/app/js/app.js': ['web/app/js/app.js']
                }
            }
        },
        concat: {
            options: {
                stripBanners: true
            },
            css: {
                src: [
                    'web/app/css/main.css'
                ],
                dest: 'web/app/css/app.css'
            },
            js : {
                src : [
                    'bower_components/angular/angular.js',
                    'bower_components/angular-resource/angular-resource.js',
                    'bower_components/ng-table/ng-table.js',
                    'bower_components/ng-table-export/ng-table-export.js',
                    'bower_components/angular-ui-router/release/angular-ui-router.js',
                    'bower_components/components-underscore/underscore.js',
                    'bower_components/restangular/dist/restangular.js',
                    'client/app.js',
                    'client/account.js'
                ],
                dest: 'web/app/js/app.js'
            }
        },
        less: {
            build: {
                files: {
                    'web/app/css/main.css': 'client/less/main.less'
                }
            },
            compile: {
                files: {
                    'web/app/css/main.css': 'client/less/main.less'
                },
                options: {
                    cleancss: true,
                    compress: true
                }
            }
        },
        copy: {
            fonts: {
                files: [
                    {
                        expand: true,
                        src: ['bower_components/bootstrap/dist/fonts/*'],
                        dest: 'web/app/fonts',
                        flatten: true
                    }
                ]
            }
        },
        symlink: {
            views: {
                dest: 'web/app/views',
                relativeSrc: '../../client/views',
                options: {type: 'dir'}
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-symlink');

    grunt.registerTask('default', ['build', 'compile', 'symlink']);

    grunt.registerTask('build', ['less:build', 'concat', 'cssmin', 'uglify', 'copy']);

    grunt.registerTask('compile', ['less:compile', 'concat']);
};
