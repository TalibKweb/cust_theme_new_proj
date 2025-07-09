
// >>>>>>>>>>>>>>>>> Document Loaded Event
document.addEventListener('DOMContentLoaded', () => {
    console.log('Additional Script file Connected:');
    let cf7_def_footer_class = document.querySelector('footer .contactForm');
    let txt_area_insd_form = cf7_def_footer_class.querySelector('textarea');
    let search_form_cont = document.querySelector('.search_form_cont');
    let main_search_icon = document.querySelector('.search_icon_header .main_search_icon');
    // console.log('search_form_cont', search_form_cont)
    // console.log('main_search_icon', main_search_icon)


    // >>>>>>>>>>> Remove rows attr from a textarea in contact form
    txt_area_insd_form.removeAttribute('rows')


    // >>>>>>>>>>> Toggles the Search form container and search icon
    main_search_icon.addEventListener('click', (e) => {
        e.preventDefault();
        // console.log('clicked Icon')
        search_form_cont.classList.toggle('show');
        let existing_icon = main_search_icon.querySelector('.fas');

        existing_icon.classList.contains('fa-search')
            ? existing_icon.setAttribute('class', 'fas fa-xmark')
            : existing_icon.setAttribute('class', 'fas fa-search');
    })


    // >>>>>>>>>>> Added a Placeholder in an Input of Search field
    let search_inp = search_form_cont.querySelector('input#s');
    search_inp.placeholder = "Search Item"


    // >>>>>>>>>>> Header Menu and Sub menu Toggle Effect
    let menu_items_for_togg_Node = document.querySelectorAll('.menu-item.menu-item-has-children')
    let menu_items_for_togg = Array.from(menu_items_for_togg_Node);
    let iHtml = `<button class="toggle_me" >+</button>`;
    // console.log('menu_items_for_togg', menu_items_for_togg_Node)

    menu_items_for_togg.forEach((elem) => elem.innerHTML += iHtml)


    let menu_items = Array.from(document.querySelectorAll('.menu-item.menu-item-has-children'));
    // console.log('menu_items_node WITH', menu_items, typeof menu_items)
    menu_items.forEach((elem) => {
        // console.log("Get Vals", Array.from(elem.querySelectorAll('ul.sub-menu')))
        let sub_menu_items = Array.from(elem.querySelectorAll('ul.sub-menu'))
        let toggle_btn = Array.from(elem.querySelectorAll('.toggle_me'))
        // console.log('sub_menu_items', sub_menu_items)
        // console.log('toggle_btn', toggle_btn)
        // console.log('object ENDS!')

        toggle_btn.forEach((btnElem) => {
            btnElem.addEventListener('click', (e) => {
                e.preventDefault();
                // console.log('clicked!')
                // console.log('btn elem', btnElem)
                // console.log('sub menu items', sub_menu_items)
                sub_menu_items.forEach((item) => {
                    // console.log('sub menu', item)
                    if (!item.classList.contains('show_sub_menu')) {
                        item.classList.add('show_sub_menu');
                        // console.log('main FALSE')
                        btnElem.innerHTML = '-';
                    }
                    else {
                        item.classList.remove('show_sub_menu');
                        // console.log('main TRUE')
                        btnElem.innerHTML = '+';
                    }
                })
            })
        })
    })

})
// >>>>>>>>>>> Write everything inside it,
// >>>>>>>>>>>>>>>>> Document Loaded Event







// >>>>>>>>>>>>>>>>>>> Initialize LENIS

console.log('Additional Script JS Connected!')

// Initialize Lenis
const lenis = new Lenis();

// Listen for the scroll event and log the event data
lenis.on('scroll', (e) => {
  console.log(e);
});

// Use requestAnimationFrame to continuously update the scroll
function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

// >>>>>>>>>>>>>>>>>>> ENDS Initialize LENIS

