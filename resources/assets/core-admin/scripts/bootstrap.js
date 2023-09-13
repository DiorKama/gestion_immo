try {
    //window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

    // AdminLTE code here.
    require('admin-lte');
} catch (e) {
    console.log(e);
}
