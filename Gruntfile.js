'use strict';

module.exports = function (grunt) {

    require('load-grunt-tasks')(grunt);

    require('time-grunt')(grunt);

    var appConfig = {
        app: 'client',
        tmp: 'var/build/grunt',
        dist: 'web'
    };

    grunt.initConfig({

        config: appConfig,

        watch: {
            bower: {
                files: ['bower.json'],
                tasks: ['wiredep']
            },
            js: {
                files: ['<%= config.app %>/scripts/{,*/}*.js'],
                options: {
                    livereload: '<%= connect.options.livereload %>'
                }
            },
            styles: {
                files: ['<%= config.app %>/styles/{,*/}*.css'],
                tasks: ['newer:copy:styles']
            },
            gruntfile: {
                files: ['Gruntfile.js']
            },
            less: {
                files: ['<%= config.app %>/styles/{,*/}*.less'],
                tasks: ['less:dist']
            },
            livereload: {
                options: {
                    livereload: '<%= connect.options.livereload %>'
                },
                files: [
                    '<%= config.app %>/views/{,*/}*.html',
                    '<%= config.tmp %>/styles/{,*/}*.css',
                    '<%= config.app %>/images/{,*/}*.{png,jpg,jpeg,gif,webp,svg}'
                ]
            }
        },

        connect: {
            options: {
                port: 9000,
                // Change this to '0.0.0.0' to access the server from outside.
                hostname: '0.0.0.0',
                livereload: 35729
            },
            livereload: {
                options: {
                    open: true,
                    middleware: function (connect) {
                        return [
                            connect.static(appConfig.tmp),
                            connect().use(
                                '/bower_components',
                                connect.static('./bower_components')
                            ),
                            connect.static(appConfig.app)
                        ];
                    }
                }
            },
            dist: {
                options: {
                    open: true,
                    base: '<%= config.dist %>'
                }
            }
        },

        // Empties folders to start fresh
        clean: {
            dist: {
                files: [{
                    dot: true,
                    src: [
                        '<%= config.tmp %>',
                        '<%= config.dist %>/fonts/{,*/}*',
                        '<%= config.dist %>/images/{,*/}*',
                        '<%= config.dist %>/scripts/{,*/}*',
                        '<%= config.dist %>/styles/{,*/}*',
                        '<%= config.dist %>/index.html',
                        '!<%= config.dist %>/.gitkeep'
                    ]
                }]
            },
            server: '<%= config.tmp %>'
        },

        // Automatically inject Bower components into the app
        wiredep: {
            app: {
                src: ['<%= config.app %>/index.html'],
                ignorePath:  /\.\.\//
            },
            less: {
                src: ['<%= config.app %>/styles/{,*/}*.less']
            }
        },

        less: {
            dist: {
                files: {
                    "<%= config.tmp %>/styles/main.css": "<%= config.app %>/styles/main.less"
                }
            }
        },

        // Renames files for browser caching purposes
        filerev: {
            dist: {
                src: [
                    '<%= config.dist %>/scripts/{,*/}*.js',
                    '<%= config.dist %>/styles/{,*/}*.css',
                    '<%= config.dist %>/images/{,*/}*.{png,jpg,jpeg,gif,webp,svg}',
                    '<%= config.dist %>/styles/fonts/*'
                ]
            }
        },

        // Reads HTML for usemin blocks to enable smart builds that automatically
        // concat, minify and revision files. Creates configurations in memory so
        // additional tasks can operate on them
        useminPrepare: {
            html: '<%= config.app %>/index.html',
            options: {
                dest: '<%= config.dist %>',
                staging: '<%= config.tmp %>',
                flow: {
                    html: {
                        steps: {
                            js: ['concat', 'uglifyjs'],
                            css: ['cssmin']
                        },
                        post: {}
                    }
                }
            }
        },

        // Performs rewrites based on filerev and the useminPrepare configuration
        usemin: {
            html: ['<%= config.dist %>/{,*/}*.html', '<%= config.dist %>/views/{,*/}*.html'],
            css: ['<%= config.dist %>/styles/{,*/}*.css'],
            options: {
                assetsDirs: ['<%= config.dist %>','<%= config.dist %>/images']
            }
        },

        // The following *-min tasks will produce minified files in the dist folder
        // By default, your `index.html`'s <!-- Usemin block --> will take care of
        // minification. These next options are pre-configured if you do not wish
        // to use the Usemin blocks.
        cssmin: {
           dist: {
             files: {
               '<%= config.dist %>/styles/main.css': [
                 '<%= config.tmp %>/styles/{,*/}*.css'
               ]
             }
           }
        },
        uglify: {
           dist: {
             files: {
               '<%= config.dist %>/scripts/scripts.js': [
                 '<%= config.dist %>/scripts/scripts.js'
               ]
             }
           }
        },
        concat: {
           dist: {}
        },

        htmlmin: {
            dist: {
                options: {
                    collapseWhitespace: true,
                    conservativeCollapse: true,
                    collapseBooleanAttributes: true,
                    removeCommentsFromCDATA: true,
                    removeOptionalTags: true
                },
                files: [{
                    expand: true,
                    cwd: '<%= config.dist %>',
                    src: ['*.html'],
                    dest: '<%= config.dist %>'
                }]
            }
        },

        // ng-annotate tries to make the code safe for minification automatically
        // by using the Angular long form for dependency injection.
        ngAnnotate: {
            dist: {
                files: [{
                    expand: true,
                    cwd: '<%= config.tmp %>/concat/scripts',
                    src: ['*.js', '!oldieshim.js'],
                    dest: '<%= config.tmp %>/concat/scripts'
                }]
            }
        },

        ngconstant: {
            options: {
                name: 'config',
                dest: '<%= config.tmp %>/scripts/config/config.js',
                constants: {
                    ENV: grunt.file.readJSON('client/config/config.json')
                },
                values: {
                    debug: true
                }
            },
            build: {
            }
        },

        ngtemplates:  {
            app:        {
                cwd:      '<%= config.app %>',
                src:      ['views/**.html','views/**/**.html'],
                dest:     '<%= config.tmp %>/scripts/templates.js',
                options:    {
                    htmlmin:  '<%= htmlmin.dist.options %>'
                }
            }
        },
        // Copies remaining files to places other tasks can use
        copy: {
            dist: {
                files: [{
                    expand: true,
                    dot: true,
                    cwd: '<%= config.app %>',
                    dest: '<%= config.dist %>',
                    src: [
                        '*.{ico,png,txt}',
                        '.htaccess',
                        '*.html',
                        'images/{,*/}*.{webp}',
                        'fonts/{,*/}*'
                    ]
                }, {
                    expand: true,
                    cwd: '<%= config.tmp %>/images',
                    dest: '<%= config.dist %>/images',
                    src: ['generated/*']
                }, {
                    expand: true,
                    cwd: 'bower_components/bootstrap/dist',
                    src: 'fonts/*',
                    dest: '<%= config.dist %>'
                }]
            },
            styles: {
                expand: true,
                cwd: '<%= config.app %>/styles',
                dest: '<%= config.tmp %>/styles/',
                src: '{,*/}*.css'
            },
            server: {
                expand: true,
                cwd: 'bower_components/bootstrap/dist',
                src: 'fonts/*',
                dest: '<%= config.tmp %>'
            }
        },

        // Run some tasks in parallel to speed up the build process
        concurrent: {
            server: [
                'less:dist',
                'copy:server'
            ],
            dist: [
                'copy:styles'
            ]
        },
        karma: {
            unit: {
                configFile: 'karma.conf.js',
                singleRun: true
            }
        }
    });

    grunt.registerTask('serve', 'Compile then start a connect web server', function (target) {
        if (target === 'dist') {
            return grunt.task.run(['build', 'connect:dist:keepalive']);
        }

        grunt.task.run([
            'clean:server',
            'wiredep',
            'ngconstant',
            'concurrent:server',
            'connect:livereload',
            'watch'
        ]);
    });

    grunt.registerTask('build', [
        'clean:dist',
        'wiredep',
        'ngtemplates',
        'ngconstant',
        'useminPrepare',
        'concurrent:dist',
        'concat',
        'ngAnnotate',
        'copy:dist',
        'cssmin',
        'uglify',
        'filerev',
        'usemin',
        'htmlmin'
    ]);

    grunt.registerTask('default', [
        'build'
    ]);
};

