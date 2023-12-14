require('./bootstrap');
require('dot2val');

import $ from 'jquery';
window.$ = window.jQuery = $;

import'admin-lte/plugins/datatables/jquery.dataTables.min.js';
import'admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
import'admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js';
import'admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';
import'admin-lte/plugins/select2/js/select2.full.min.js';

$('.select2bs4').select2({
    theme: 'bootstrap4'
})
