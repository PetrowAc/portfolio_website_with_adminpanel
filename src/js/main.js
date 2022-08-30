

//========================= HOME JS  =========================
if ($('#home').length > 0) {
    /*==================== MENU SHOW Y HIDDEN ====================*/
    const navMenu = document.getElementById('nav-menu'),
        navToggle = document.getElementById('nav-toggle'),
        navClose = document.getElementById('nav-close');

    /*===== MENU SHOW =====*/
    if(navToggle) {
        navToggle.addEventListener('click', () => {
            navMenu.classList.add('show-menu');
        });
    }

    /*===== MENU HIDDEN =====*/
    if(navClose) {
        navClose.addEventListener('click', () => {
            navMenu.classList.remove('show-menu');
        });
    }


    /*==================== REMOVE MENU MOBILE ====================*/
    const navLink = document.querySelectorAll('.nav__link')

    function linkAction(){
        const navMenu = document.getElementById('nav-menu')
        navMenu.classList.remove('show-menu')
    }
    navLink.forEach(n => n.addEventListener('click', linkAction))

    /*==================== ACCORDION SKILLS ====================*/
    const skillsContent = document.getElementsByClassName('skills__content'),
            skillsHeader = document.querySelectorAll('.skills__header')

    function toggleSkills() {
        let itemClass = this.parentNode.className

        for(var i = 0; i < skillsContent.length; i++) {
            skillsContent[i].className = 'skills__content skills__close';
        }

        if(itemClass === 'skills__content skills__close') {
            this.parentNode.className = 'skills__content skills__open';
        }
    }

    skillsHeader.forEach((el) => {
        el.addEventListener('click', toggleSkills)
    })

    /*==================== COUNT UP ====================*/
    const countUpContent = document.getElementsByClassName('countup')
    for(var i = 0; i < countUpContent.length; i++) {
        const CUp = new countUp.CountUp(countUpContent[i], countUpContent[i].dataset.countup)
        CUp.start()
    }

    /*==================== QUALIFICATION TABS ====================*/
    const tabs = document.querySelectorAll('[data-target]'),
            tabContents = document.querySelectorAll('[data-content]')

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = document.querySelector(tab.dataset.target)

            tabContents.forEach(tabContent => {
                tabContent.classList.remove('qualification__active')
            })
            target.classList.add('qualification__active')

            tabs.forEach(tab => {
                tab.classList.remove('qualification__active')
            })
            tab.classList.add('qualification__active')
        })
    })

    /*==================== SERVICES MODAL ====================*/
    const modalViews = document.querySelectorAll('.services__modal'),
            modalBtns = document.querySelectorAll('.services__button'),
            modalCloses = document.querySelectorAll('.services__modal-close')

    let modal = function (modalClick) {
        modalViews[modalClick].classList.add('active-modal')
    }

    modalBtns.forEach((modalBtn, i) => {
        modalBtn.addEventListener('click', () => {
            modal(i)
        })
    })

    modalCloses.forEach((modalClose) => {
        modalClose.addEventListener('click', () => {
            modalViews.forEach((modalView) => {
                modalView.classList.remove('active-modal')
            })
        })
    })

    /*==================== PORTFOLIO SWIPER  ====================*/
    let swiperPortfolio = new Swiper(".portfolio__container", {
        cssMode: true,
        loop: true,
        navigation: {
        nextEl: ".portfolio__container .swiper-button-next",
        prevEl: ".portfolio__container .swiper-button-prev",
        },
        pagination: {
        el: ".portfolio__container .swiper-pagination",
        clickable: true,
        },
    });

    /*==================== TESTIMONIAL ====================*/
    let swiperTestimonial = new Swiper(".testimonial__container", {
        loop: true,
        grabCursor: true,
        spaceBetween: 48,
        pagination: {
        el: ".testimonial__container .swiper-pagination",
        dynamicBullets: true,
        clickable: true,
        },
        breakpoints: {
            568:{
                slidesPerView: 2,
            }
        }
    });

    /*==================== SCROLL SECTIONS ACTIVE LINK ====================*/
    const sections = document.querySelectorAll('section[id]')

    function scrollActive(){
        const scrollY = window.pageYOffset

        sections.forEach(current =>{
            const sectionHeight = current.offsetHeight
            const sectionTop = current.offsetTop - 50;
            const sectionId = current.getAttribute('id');

            if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
                document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
            }else{
                document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
            }
        })
    }
    window.addEventListener('scroll', scrollActive)

    /*==================== CHANGE BACKGROUND HEADER ====================*/ 
    function scrollHeader(){
        const nav = document.getElementById('header')
        // When the scroll is greater than 200 viewport height, add the scroll-header class to the header tag
        if(this.scrollY >= 80) nav.classList.add('scroll-header'); else nav.classList.remove('scroll-header')
    }
    window.addEventListener('scroll', scrollHeader)

    /*==================== SHOW SCROLL UP ====================*/ 
    function scrollUp(){
        const scrollUp = document.getElementById('scroll-up');
        // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
        if(this.scrollY >= 560) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
    }
    window.addEventListener('scroll', scrollUp)

    /*==================== DARK LIGHT THEME ====================*/ 
    const themeButton = document.getElementById('theme-button')
    const darkTheme = 'dark-theme'
    const iconTheme = 'uil-sun'

    // Previously selected topic (if user selected)
    const selectedTheme = localStorage.getItem('selected-theme')
    const selectedIcon = localStorage.getItem('selected-icon')

    // We obtain the current theme that the interface has by validating the dark-theme class
    const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
    const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'uil-moon' : 'uil-sun'

    // We validate if the user previously chose a topic
    if (selectedTheme) {
    // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
    themeButton.classList[selectedIcon === 'uil-moon' ? 'add' : 'remove'](iconTheme)
    }

    // Activate / deactivate the theme manually with the button
    themeButton.addEventListener('click', () => {
        // Add or remove the dark / icon theme
        document.body.classList.toggle(darkTheme)
        themeButton.classList.toggle(iconTheme)
        // We save the theme and the current icon that the user chose
        localStorage.setItem('selected-theme', getCurrentTheme())
        localStorage.setItem('selected-icon', getCurrentIcon())
    })
}

//========================= ADMIN JS  =========================
if ($('#admin').length > 0) {
    /*===== MENU TOGGLE =====*/
    const adminNav = $('#admin-header'),
            adminNavToggle = $('#admin-nav-toggle'),
            mainContent = $('.main');

    adminNavToggle.click(function() {
        adminNav.toggleClass("header--close");
        if (adminNav.hasClass('header--close')) {
            $('.header__close-icon').removeClass('uil-times').addClass('uil-bars');
        } else {
            $('.header__close-icon').removeClass('uil-bars').addClass('uil-times');
        }
        mainContent.toggleClass("main--active");
    });

    if($(window).width() < 768) {
        adminNav.addClass("header--close");
        mainContent.removeClass("main--active");
        $('.header__close-icon').removeClass('uil-times').addClass('uil-bars');
    }

    /*===== HOME FIRST CHART =====*/
    if ($('#pageViewChart' && '#deviceTypeChart').length > 0) {
        $(function() {
            /*===== PAGE VIEW CHART =====*/
            let pageViewChartCanvas = document.getElementById('pageViewChart');
            let pageViewChart = document.getElementById('pageViewChart').getContext('2d');
            
            let date1 = pageViewChartCanvas.dataset.date1
            let date2 = pageViewChartCanvas.dataset.date2
            let date3 = pageViewChartCanvas.dataset.date3
            let date4 = pageViewChartCanvas.dataset.date4
            let date5 = pageViewChartCanvas.dataset.date5
            let date6 = pageViewChartCanvas.dataset.date6

            let dateValue1 = pageViewChartCanvas.dataset.value1
            let dateValue2 = pageViewChartCanvas.dataset.value2
            let dateValue3 = pageViewChartCanvas.dataset.value3
            let dateValue4 = pageViewChartCanvas.dataset.value4
            let dateValue5 = pageViewChartCanvas.dataset.value5
            let dateValue6 = pageViewChartCanvas.dataset.value6
            
            Chart.defaults.font.family = 'Poppins';
            let pageViewChartConf = new Chart(pageViewChart, {
                type:'bar',
                data:{
                    labels:[date6, date5, date4, date3, date2, date1],
                    datasets:[{
                        label:'Views',
                        data:[
                            dateValue6,
                            dateValue5,
                            dateValue4,
                            dateValue3,
                            dateValue2,
                            dateValue1
                        ],
                        backgroundColor: '#7b90f9',
                        borderWidth: 3,
                        borderColor: '#576ee0',
                    }]
                },
                options:{
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });


            /*===== DEVICE TYPE CHART =====*/
            let deviceTypeChartCanvas = document.getElementById('deviceTypeChart')
            let deviceTypeChart = document.getElementById('deviceTypeChart').getContext('2d');

            let desktopDevice = deviceTypeChartCanvas.dataset.desktop
            let mobileDevice = deviceTypeChartCanvas.dataset.mobile

            let deviceTypeChartConf = new Chart(deviceTypeChart, {
                type:'doughnut',
                data:{
                    labels:['Desktop', 'Mobile'],
                    datasets:[{
                        label:'Views',
                        data:[
                            desktopDevice,
                            mobileDevice,
                        ],
                        backgroundColor: [
                            '#576ee0',
                            '#7b90f9'
                        ],
                        /* borderWidth: 3,
                        borderColor: '#576ee0', */
                    }]
                },
                /* options:{
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                } */
            });
        });
    }

    $('.table').basictable({
        breakpoint: 1024,
    });
}