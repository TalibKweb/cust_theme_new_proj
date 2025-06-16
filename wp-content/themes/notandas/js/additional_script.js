document.addEventListener('DOMContentLoaded', () => {
    // console.log('Additional Script file Connected:');
    let cf7_def_footer_class = document.querySelector('footer .contactForm');
    let txt_area_insd_form = cf7_def_footer_class.querySelector('textarea');

    // console.log('txt_area_insd_form', txt_area_insd_form);
    txt_area_insd_form.removeAttribute('rows')

})
