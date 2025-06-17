
// >>>>>>>>>>>>>>>>> Document Loaded Event
document.addEventListener('DOMContentLoaded', () => {
    // console.log('Additional Script file Connected:');
    let cf7_def_footer_class = document.querySelector('footer .contactForm');
    let txt_area_insd_form = cf7_def_footer_class.querySelector('textarea');
    let search_form_cont = document.querySelector('.search_form_cont');
    let main_search_icon = document.querySelector('.search_icon_header .main_search_icon');

    // console.log('search_form_cont', search_form_cont)
    // console.log('main_search_icon', main_search_icon)

    txt_area_insd_form.removeAttribute('rows')

    main_search_icon.addEventListener('click', (e) => {
        e.preventDefault();
        // console.log('clicked Icon')
        search_form_cont.classList.toggle('show');
        let existing_icon = main_search_icon.querySelector('.fas');

        existing_icon.classList.contains('fa-search')
            ? existing_icon.setAttribute('class', 'fas fa-xmark')
            : existing_icon.setAttribute('class', 'fas fa-search');

    })

    let search_inp = search_form_cont.querySelector('input#s');
    search_inp.placeholder = "Search Item"
    


})
// >>>>>>>>>>> Write everything inside it,
// >>>>>>>>>>>>>>>>> Document Loaded Event
