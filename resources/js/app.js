require('./bootstrap');

import Alpine from 'alpinejs';
import Swal from 'sweetalert2'
import Push from 'push.js'

var moment = require('moment');

window.Swal = Swal;
window.Alpine = Alpine;
window.Push = Push;

Alpine.start();
