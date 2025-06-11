// console.log('Additional Script file Connected:');
let cf7_def_class = document.querySelector('form.wpcf7-form.init');
let txt_area_insd_form = cf7_def_class.querySelector('textarea');

// console.log('cf7_def_class', cf7_def_class);
cf7_def_class.classList.add('contactForm');

// console.log('txt_area_insd_form', txt_area_insd_form);
txt_area_insd_form.removeAttribute('rows')
