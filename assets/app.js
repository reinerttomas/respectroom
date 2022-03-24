/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// loads the jquery package from node_modules
import $ from 'jquery';
import 'bootstrap';
import './js/mazer';

// import the function from greet.js (the .js extension is optional)
// ./ (or ../) means to look for a local file
import greet from './js/greet';

// any CSS you import will output into a single css file (app.css in this case)
import './css/bootstrap.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import './css/app.css';

// start the Stimulus application
import './bootstrap';

$(document).ready(function() {
    console.log(greet('jill'));
});
