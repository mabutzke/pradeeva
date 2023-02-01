/* HEADER & MENU */
const headerBg = document.querySelector('#header-bg');
const headerClass = 'header-bg-color';
const headerTrigger = 30;
const menu = document.querySelector('#main-menu');
const menuButton = document.querySelector('#menu-button');
const menuHeight = menu.offsetHeight;
const menuUp = `translateY(-${menuHeight}px)`;
const menuDown = `translateY(${menuHeight}px)`;
menu.style.transform = `translateY(-${menuHeight}px)`;;
menu.style.top = `-${menuHeight}px`;

//Toggle header background class
window.onscroll = () => {
    if (window.scrollY >= headerTrigger) {
        headerBg.classList.add(headerClass);
    } else {
        headerBg.classList.remove(headerClass);
    }
};

//Toggle menu up and down
function menuToggle() {
    if (menu.classList.contains('active') === false) {
        menu.classList.add('active');
        menu.style.transform = menuDown;
        menuButton.style.textDecoration = 'underline';
        const closeArea = document.createElement('div');
        closeArea.setAttribute('id', 'menu-close');
        closeArea.onclick = () => menuToggle();
        document.body.appendChild(closeArea);
    } else {
        menu.classList.remove('active');
        menu.style.transform = menuUp;
        menuButton.style.textDecoration = '';
        document.querySelector('#menu-close').remove();
    }
};

menuButton.onclick = e => {
    e.preventDefault();
    menuToggle();
};

//Make buttons with attribute 'data-href' clickable
const links = document.querySelectorAll('button[data-href]');
links.forEach(link => link.onclick = () => location.href = link.getAttribute('data-href'));


/* HOME CAROUSEL */
const carousel = document.querySelectorAll('.carousel');
const carouselCount = carousel.length;
const carouselNext = document.querySelector('#carousel-next');
const carouselPrev = document.querySelector('#carousel-prev');
const carouselContent = document.querySelectorAll('.carousel-content');
const carouselTimer = 7000;

//Only run if there are items in the carousel
if (carousel.length > 0) {

    //Add class 'active' and start carousel
    carousel[0].classList.add('active');
    let timer = setInterval(nextCarousel, carouselTimer);

    //Move the carousel to the next index
    function nextCarousel() {
        let currentIndex = activeIndex(),
            nextIndex = currentIndex + 1 > carouselCount - 1 ? 0 : currentIndex + 1;
        setCarousel(nextIndex);
    };

    //Get the current index
    function activeIndex() {
        let result;
        carousel.forEach( (item, index) => {
            if (item.classList.contains('active')) result = index;
        });
        return result;
    };

    //Refresh the carousel with the next content
    function setCarousel(nextIndex) {
        document.querySelector('.carousel.active').classList.remove('active');
        carousel[nextIndex].classList.add('active');
        restartInterval();
    };

    //Restart the interval counter
    function restartInterval() {
        clearInterval(timer);
        timer = setInterval(nextCarousel, carouselTimer);
    };

    //Add event listeners
    carouselPrev.onclick = () => {
        let currentIndex = activeIndex(),
            previousIndex = currentIndex - 1 < 0 ? carouselCount - 1 : currentIndex - 1;
        setCarousel(previousIndex);
    };
    carouselNext.onclick = () => nextCarousel();
    carouselContent.forEach(item => {
        item.onmouseover = () => clearInterval(timer);
        item.onmouseout = () => restartInterval();
    });
}