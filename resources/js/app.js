require('./bootstrap');

import Alpine from 'alpinejs';
import Swal from 'sweetalert2'

var moment = require('moment');

window.Swal = Swal;
window.Alpine = Alpine;

Alpine.start();
