/*
 * grunt-cli
 * http://gruntjs.com/
 *
 * Copyright (c) 2012 Tyler Kellen, contributors
 * Licensed under the MIT license.
 * https://github.com/gruntjs/grunt-init/blob/master/LICENSE-MIT
 */

"use strict";

module.exports = function (grunt) {
    grunt.initConfig({
        concat: {
            admin_css: {
                src: [
                    // "public/admins/vendor/bootstrap-4.1/bootstrap.min.css",
                    // "public/admins/css/datatable.css",
                    // "public/admins/vendor/animsition/animsition.min.css",
                    // "public/admins/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css",
                    // "public/admins/vendor/wow/animate.css",
                    // "public/admins/vendor/perfect-scrollbar/perfect-scrollbar.css",
                    // "public/admins/css/theme.css",
                    // "public/admins/css/customer.css",
                    // "public/admins/js/plugin/filepond/filepond-plugin-image-preview.css",
                    // "public/admins/js/plugin/filepond/filepond-plugin-media-preview.css",
                    // "public/admins/js/plugin/filepond/filepond.css",
                ],
                dest: "public/admins/css/css_minified.css",
            },

            admin_js: {
                src: [
                    // "public/admins/vendor/jquery-3.2.1.min.js",
                    // "public/admins/vendor/bootstrap-4.1/popper.min.js",
                    // "public/admins/vendor/bootstrap-4.1/bootstrap.min.js",
                    // "public/admins/vendor/animsition/animsition.min.js",
                    // "public/admins/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js",
                    // "public/admins/vendor/counter-up/jquery.waypoints.min.js",
                    // "public/admins/vendor/counter-up/jquery.counterup.min.js",
                    // // "public/admins/vendor/circle-progress/circle-progress.min.js",
                    // "public/admins/vendor/perfect-scrollbar/perfect-scrollbar.js",
                    // "public/admins/vendor/select2/select2.min.js",
                    // "public/admins/js/plugin/filepond/filepond.js",
                    // "public/admins/js/plugin/filepond/filepond.jquery.js",
                    // "public/admins/js/plugin/filepond/filepond-plugin-image-preview.js",
                    // "public/admins/js/plugin/filepond/filepond-plugin-media-preview.js",
                    // "public/admins/js/sweetalert2.js",
                    // "public/admins/js/datatable.js",
                    // "public/admins/js/filepond.js",

                ],
                dest: "public/admins/js/script_minified.js",
            },

            css: {
                src: [
                    'assets/css/owl.carousel.min.css',
                    'assets/css/rating.css',
                    'assets/css/timber.scss.css',
                    'assets/css/theme.scss.css',
                    'assets/css/themepunch.revolution.css',
                    'assets/css/digital-world.css',
                ],
                dest: "public/assets/css/css_minified.css",
            },

            js: {
                src: [
                    "public/assets/js/jquery.min.js",
                    "public/assets/js/owl.carousel.min.js",
                    "public/assets/js/jquery.easytabs.min.js",
                    "public/assets/js/jquery.elevateZoom-3.0.8.min.js",
                    "public/assets/js/jquery.fancybox.min.js",
                    "public/assets/js/modernizr.min.js",
                    "public/assets/js/jquery.themepunch.plugins.min.js",
                    "public/assets/js/jquery.themepunch.revolution.min.js",
                    "public/assets/js/tada.js",
                    "public/assets/js/notify.js"
                ],
                dest: "public/assets/js/script_minified.js",
            },
        },
        uglify: {
            js: {
                src: "public/assets/js/script_minified.js",
                dest: "public/assets/js/script_minified.min.js",
            },
            admin_js: {
                src: "public/theme_admin/js/script_minified.js",
                dest: "public/theme_admin/js/script_minified.min.js",
            },
        },
        cssmin: {
            css: {
                src: "public/assets/css/css_minified.css",
                dest: "public/assets/css/css_minified.min.css",
            },
            admin_css: {
                src: "public/theme_admin/css/css_minified.css",
                dest: "public/theme_admin/css/css_minified.min.css",
            },
        },
        watch: {
            css: {
                files: ["public/assets/css/custom.css"],
                tasks: ["concat", "cssmin"],
            },
            scripts: {
                files: ["public/assets/js/custom.js"],
                tasks: ["concat", "uglify"],
            },
        },
    });

    grunt.loadNpmTasks("grunt-contrib-concat");
    grunt.loadNpmTasks("grunt-contrib-cssmin");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.registerTask("build", ["concat", "cssmin", "uglify"]);
    grunt.registerTask("runwatch", ["watch"]);
};
