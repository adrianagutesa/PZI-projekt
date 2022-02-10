const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar_menu');
const navLogo = document.querySelector('#navbar_logo');


// Display Mobile Menu
const mobileMenu = () => {
    menu.classList.toggle('is-active')
    menuLinks.classList.toggle('active')
};

menu.addEventListener('click', mobileMenu);

// Show active menu when scrolling
const highlightMenu = () => {
    const element = document.querySelector('.highlight');
    const home = document.querySelector('#home-page');
    const writers = document.querySelector('#writers-page');
    const books = document.querySelector('#books-page');

    let scrollPos = window.scrollY;

    // adds 'highlight' to menu items
    if (window.innerWidth > 960 && scrollPos < 600) {
        home.classList.add('highlight');
        writers.classList.remove('highlight');
        return;
    } else if (window.innerWidth > 960 && scrollPos < 1400){
        writers.classList.add('highlight');
        home.classList.remove('highlight');
        books.classList.remove('highlight');
        return;
    } else if (window.innerWidth > 960 && scrollPos < 2345){
        books.classList.add('highlight');
        writers.classList.remove('highlight');
        return;
    }
    
    if ((element && window.innerWidth < 960 && scrollPos < 600) || element) {
        element.classList.remove('highlight');
    }
};

window.addEventListener('scroll', highlightMenu);
window.addEventListener('click', highlightMenu);

// Close mobile Menu 
const hideMobileMenu = () => {
    const menuBars = document.querySelector('.is-active');

    if (window.innerWidth <= 960 && menuBars) {
        menu.classList.toggle('is-active');
        menuLinks.classList.remove('active');
    }
}

menuLinks.addEventListener('click', hideMobileMenu);
navLogo.addEventListener('click', hideMobileMenu);

//Search Box Book
function Booksearch() {
    let input = document.getElementById('search-box-book').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('books_card');
    
    
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="";       
        }
    }
}

//Search Box Writer
function search() {
    let input = document.getElementById('search-box').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('writers_content');
    let y = document.getElementById('container');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            y.style.display="flex";
            y.style.flexDirection="column";
            y.style.justifyContent="center";
            y.style.alignItems="center";
            x[i].style.display=""; 
        }
    }
}

//Slider Writers
(function () {
    var slider = document.querySelectorAll('.writers_content'),
        arrowLeft = document.querySelector('#left-arrow'),
        arrowRight = document.querySelector('#right-arrow'),
        current = 0;

    function initSlider() {
        resetSlider();

        slider[0].style.display = 'block';
    }

    function resetSlider() {
        for (var i = 0; i < slider.length; i++) {
            slider[i].style.display = 'none';
        }
    }

    function toLeft() {
        resetSlider();
        slider[current - 1].style.display = 'block';
        current--;
    }

    function toRight() {
        resetSlider();
        slider[current + 1].style.display = 'block';
        current++;
    }

    arrowLeft.addEventListener('click', function () {
        if (current === 0) {
            current = slider.length;
        }

        toLeft();
    });

    arrowRight.addEventListener('click', function () {
        if (current === slider.length - 1) {
            current = -1;
        }

        toRight();
    });

    initSlider();
})();