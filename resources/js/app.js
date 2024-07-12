require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Swal from 'sweetalert2';

window.Swal = Swal;

const toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
});

window.alertSuccess = (message) => {
    toast.fire({
        icon: 'success',
        title: message,
    });
};

window.alertError = (message) => {
    toast.fire({
        icon: 'error',
        title: message,
    });
};
