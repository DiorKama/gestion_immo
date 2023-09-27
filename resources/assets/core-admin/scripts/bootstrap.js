try {
    //window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

    // AdminLTE code here.
    require('admin-lte');

    // jQuery-Autocomplete
    require('devbridge-autocomplete');

    // Custom scripts
    require('./admin-scripts.js');
} catch (e) {
    console.log(e);
}
