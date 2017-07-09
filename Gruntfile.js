module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // Concatenation
    concat: {
      dist: {
        src: [
          'js/bootstrap.js',
          'js/functions.js',
          'js/theme.js'
        ],
        dest: 'js/scripts.js'
      }
    },
    // Uglify
    uglify: {
      build: {
        src: 'js/scripts.js',
        dest: 'js/scripts.min.js'
      }
    },
    // Optimize images
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'images/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'images/build/'
        }]
      }
    },
    // SASS
    sass: {
      dist: {
        options: {
          trace: true,
          style: 'compressed',
          precision: 8
        },
        files: {
          'style.css': 'sass/style.scss'
        }
      },
      build: {
        options: {
          trace: true,
          style: 'compressed',
          precision: 8
        },
        files: {
          'build/style.css' : 'sass/style.scss'
        }
      }
    },
    // Autoprefixer
    autoprefixer: {
      dist: {
        files: {
          'style.css': 'style.css'
        }
      },
      build: {
        expand: true,
        cwd: 'build',
        src: [ '**/*.css' ],
        dest: 'build'
      }
    },
    // Copy
    copy: {
      build: {
        expand: true,
        src: [ '**',
          '!**/node_modules/**',
          '!**/sass/**',
          '!**/*.scss',
          '!.gitignore',
          '!.jshintignore',
          '!.jscsrc',
          '!_jshintignore',
          '!_jscsrc',
          '!**/_*.php',
          '!.gitignore',
          '!Gruntfile.js',
          '!LICENSE',
          '!package.json',
          '!README.md',
          '!.sass-cache/',
          '!*.map'
        ],
        dest: 'build'
      },
    },
    // Clean
    clean: {
      build: {
        src: [ 'build' ]
      },
      stylesheets: {
        src: [ 'build/**/*.css', '!build/**/style.css' ]
      },
      scripts: {
        src: [ 'build/**/*.js', '!build/**/scripts.js', '!build/**/skip-link-focus-fix.js' ]
      },
    },
    // Watch
    watch: {
      options: {
        livereload: true
      },
      php: {
        files: ['*.php', 'template=parts/*.php', 'inc/*.php', 'page-templates/*.php'],
        options: {
          spawn: false
        }
      },
      scripts: {
        files: ['js/*.js'],
        tasks: ['concat'],
        options: {
          spawn: false
        }
      },
      sass: {
        files: ['sass/*.scss', 'sass/theme/*.scss'],
        tasks: ['sass:dist'],
        options: {
          spawn: false
        }
      },
      css: {
        files: ['style.css'],
        tasks: ['autoprefixer:dist']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Register tasks
  grunt.registerTask('default', 'watch');
  grunt.registerTask(
    'stylesheets',
    'Compiles the stylesheets',
    [ 'sass:build', 'autoprefixer:build', 'clean:stylesheets' ]
  );
  grunt.registerTask(
    'scripts',
    'Compiles the JavaScript files',
    [ 'clean:scripts' ]
  );
  grunt.registerTask(
    'build',
    'Compiles all of the assets and copies the files to the build directory',
    [ 'clean:build', 'copy', 'stylesheets', 'scripts' ]);
};
