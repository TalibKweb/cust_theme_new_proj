//Homepage ameneties slider
  var swiper = new Swiper(".projectSwiper", {
      slidesPerView: 'auto',
      spaceBetween: 20,
      centeredSlides: true,
      loop: true,
      speed: 2000,
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
      
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        1024: {
          slidesPerView: 2.5, // Adjusts for larger screens
          spaceBetween: 20
        },
        768: {
          slidesPerView: 2, // Adjusts for tablets
          spaceBetween: 20
        },
        640: {
          slidesPerView: 1, // Adjusts for smaller screens
          spaceBetween: 20
        },
        480: {
          slidesPerView: 1, // Full width on mobile
          spaceBetween: 10
        }
      }
    });


//Homepage testimonial slider
  var swiper = new Swiper(".testimonialSwiper", {
    slidesPerView: 'auto',
    spaceBetween: 20,
    loop: true,
    speed: 2000,
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1024: {
        slidesPerView: 2, // Adjusts for larger screens
        spaceBetween: 40
      },
      768: {
        slidesPerView: 1, // Adjusts for tablets
        spaceBetween: 30
      },
      640: {
        slidesPerView: 1, // Adjusts for smaller screens
        spaceBetween: 20
      },
      480: {
        slidesPerView: 1, // Full width on mobile
        spaceBetween: 10
      }
    }
  });


//Homepage blog slider
  var swiper = new Swiper(".blogSwiper", {
    slidesPerView: 'auto',
    spaceBetween: 20,
    loop: true,
    speed: 2000,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1024: {
        slidesPerView: 2, // Adjusts for larger screens
        spaceBetween: 40
      },
      768: {
        slidesPerView: 2, // Adjusts for tablets
        spaceBetween: 30
      },
      640: {
        slidesPerView: 1, // Adjusts for smaller screens
        spaceBetween: 20
      },
      480: {
        slidesPerView: 1, // Full width on mobile
        spaceBetween: 10
      }
    }
  });

//what we stand for slider
  var swiper = new Swiper(".standSwiper", {
    loop: true,
    speed: 3000,
    spaceBetween: 10,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  //excellence slider
  var swiper = new Swiper(".excellenceSwiper", {
    slidesPerView: 'auto',
    spaceBetween: '20',
    centeredSlides: true,
    loop: true,
    speed: 2000,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1024: {
        slidesPerView: 2.5, // Adjusts for larger screens
        spaceBetween: 40
      },
      768: {
        slidesPerView: 2, // Adjusts for tablets
        spaceBetween: 30
      },
      640: {
        slidesPerView: 1, // Adjusts for smaller screens
        spaceBetween: 20
      },
      480: {
        slidesPerView: 1, // Full width on mobile
        spaceBetween: 10
      }
    }
  });

  //timeline
   var swiper = new Swiper('.timelineSwiper', {
    slidesPerView: 1,
    spaceBetween: 20,
    // loop: true,
    // speed: 2000,
    // autoplay: {
    //   delay: 1000,
    //   disableOnInteraction: false,
    // },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 50,
      }
    }
  });

 //header scroller
  window.addEventListener('scroll', function () {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  //header menu
  document.addEventListener("DOMContentLoaded", function () {
    // Make the first .has-submenu open by default
    const firstSubmenu = document.querySelector(".has-submenu");
    if (firstSubmenu) {
      firstSubmenu.classList.add("open");
    }
  
    // Handle toggle click only on the arrow icon
    const toggles = document.querySelectorAll(".has-submenu .toggle");
    toggles.forEach(toggle => {
      toggle.addEventListener("click", function (e) {
        e.preventDefault();
        const parent = this.closest("li.has-submenu");
        parent.classList.toggle("open");
      });
    });
  });


  //aos animation
  AOS.init();


  //timeline active class

const items = document.querySelectorAll('.timeline-item');
const progressLine = document.querySelector('.timeline-progress');
const timeline = document.querySelector('.timeline');

let activeHeight = 0;

function updateProgressLine(index) {
  const item = items[index];
  const dot = item.querySelector('.timeline-dot');
  const timelineTop = timeline.getBoundingClientRect().top + window.scrollY;
  const dotTop = dot.getBoundingClientRect().top + window.scrollY;
  const dotCenter = dot.offsetHeight / 2;

  const newHeight = dotTop - timelineTop + dotCenter;

  if (newHeight !== activeHeight) {
    activeHeight = newHeight;
    progressLine.style.height = `${newHeight}px`;
  }
}

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    const index = [...items].indexOf(entry.target);

    if (entry.isIntersecting) {
      entry.target.classList.add('active');
      updateProgressLine(index);
    } else {
      entry.target.classList.remove('active');

      // If scrolling up and current item is higher than previous
      const visibleItems = [...items].filter(item => item.classList.contains('active'));
      if (visibleItems.length > 0) {
        const lastVisibleIndex = [...items].indexOf(visibleItems[visibleItems.length - 1]);
        updateProgressLine(lastVisibleIndex);
      } else {
        progressLine.style.height = `0px`;
      }
    }
  });
}, {
  threshold: 0.6,
});

items.forEach(item => observer.observe(item));


//want to be slider
  var swiper = new Swiper(".wantToBeSwiper", {
    spaceBetween: '20',
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1024: {
        slidesPerView: 3, // Adjusts for larger screens
        spaceBetween: 30
      },
      768: {
        slidesPerView: 2, // Adjusts for tablets
        spaceBetween: 30
      },
      640: {
        slidesPerView: 1, // Adjusts for smaller screens
        spaceBetween: 20
      },
      480: {
        slidesPerView: 1, // Full width on mobile
        spaceBetween: 10
      }
    }
  });


//testimonialvideo slider
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    speed: 2000,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
    },
  });


//testimonial page slider
  var swiper = new Swiper(".testimonialpageSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1024: {
        slidesPerView: 1, // Adjusts for larger screens
        spaceBetween: 20
      },
      768: {
        slidesPerView: 1, // Adjusts for tablets
        spaceBetween: 20
      },
      640: {
        slidesPerView: 1, // Adjusts for smaller screens
        spaceBetween: 20
      },
      480: {
        slidesPerView: 1, // Full width on mobile
        spaceBetween: 10
      }
    }
  });




 document.addEventListener('DOMContentLoaded', function () {
  const input = document.getElementById('resume');
  const placeholder = document.getElementById('file-placeholder');

  if (input && placeholder) {
    input.addEventListener('change', function () {
      const fileName = this.files[0]?.name || 'Upload Resume';
      placeholder.textContent = fileName;
    });
  }
});


   // Initialize Fancybox
   Fancybox.bind("[data-fancybox]", {});



  
