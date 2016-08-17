module.exports = function (grunt) {
  'use strict';

  require('load-grunt-tasks')(grunt);

  grunt.util.linefeed = '\n';

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: {
      dist: [
        '.tmp',
        'dist/fonts',
        'dist/images',
        'dist/less'
      ]
    },
    copy: {
      // Fonts
      'fontawesome-fonts': {
        expand: true,
        cwd: 'App/fonts/font-awesome-4/fonts/',
        dest: 'dist/fonts/',
        src: '*'
      },
    // Images
    'images': {
        expand: true,
        cwd: 'App/images/',
        dest: 'dist/images/',
        src: '**'
      },
    // Sc//app-js': {
    //    expand: true,
    //    cwd: 'App/js/',
    //    dest: 'dist/js/',
    //    src: '**/*'
    //  }
    },
    less: {
      dist: {
        options: {
          strictMath: true
        },
        files: [
          {src: 'less/style.less', dest: '../../web/assets/css/style.css'}
        ]
      }
    },
    connect: {
      server: {
        options: {
          port: 3001,
          base: '.',
          keepalive: true
        }
      }
    }
  });

  grunt.registerTask('build', ['clean', 'copy', 'less']);
  grunt.registerTask('default', ['build']);
  grunt.registerTask('server', ['build', 'connect:server']);

};
