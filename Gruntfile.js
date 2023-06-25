/*!
 * Main gruntfile for Butterfly.CMS assets
 * Homepage: https://wdmg.com.ua/
 * Author: Vyshnyvetskyy Alexsander (alex.vyshyvetskyy@gmail.com)
 * Copyright 2019 W.D.M.Group, Ukraine
 * Licensed under MIT
*/

module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            messages: {
                options: {
                    sourceMap: true,
                    sourceMapName: 'assets/js/messages.js.map'
                },
                files: {
                    'assets/js/messages.min.js': ['assets/js/messages.js']
                }
            }
        },
        sass: {
            style: {
                files: {
                    'assets/css/messages.css': ['assets/scss/messages.scss']
                }
            }
        },
        autoprefixer: {
            dist: {
                files: {
                    'assets/css/messages.css': ['assets/css/messages.css']
                }
            }
        },
        cssmin: {
            options: {
                mergeIntoShorthands: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'assets/css/messages.min.css': ['assets/css/messages.css']
                }
            }
        },
        watch: {
            styles: {
                files: ['assets/scss/messages.scss'],
                tasks: ['sass:style', 'cssmin'],
                options: {
                    spawn: false
                }
            },
            scripts: {
                files: ['assets/js/messages.js'],
                tasks: ['uglify:messages'],
                options: {
                    spawn: false
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify-es');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-css');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-autoprefixer');

    grunt.registerTask('default', ['uglify', 'sass', 'autoprefixer', 'cssmin', 'watch']);

};