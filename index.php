
    <?php 
        include 'header.php'; 
        include 'components/analytics.php';

        //--==================== HOME CONTENT ====================--
        $query = $db->query("SELECT home_title, home_subtitle, home_text, home_img, fb_url, insta_url, github_url FROM home");

        while(($row = $query->fetch_assoc()) !== null) {
            $homeTitle = $row['home_title'];
            $homeSubtitle = $row['home_subtitle'];
            $homeText = $row['home_text'];
            $homeImg = $row['home_img'];
            $fbUrl = $row['fb_url'];
            $instaUrl = $row['insta_url'];
            $githubUrl = $row['github_url'];
        }

        //--==================== ABOUT CONTENT ====================--
        $query = $db->query("SELECT about_text, about_img, year_experience, completed_project, companies_worked, cv_url FROM about");

        while(($row = $query->fetch_assoc()) !== null) {
            $aboutText = $row['about_text'];
            $aboutImg = $row['about_img'];
            $yearExperience = $row['year_experience'];
            $completedProject = $row['completed_project'];
            $companiesWorked = $row['companies_worked'];
            $cvUrl = $row['cv_url'];
        }


        
    ?>

    <?php
        /*<!-- <div class="modal">
            <div class="modal__content">
                <div class="modal__content-column">
                    <div class="modal__content-icon">
                        <i class="uil uil-search"></i>
                    </div>
                    <div class="modal__content-text">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <p>Lorem ipsum dolor sit amet consectetur dolor sit amet adipisicing elit.</p>
                        <ul>
                            <li>
                                <i class="uil uil-check-circle"></i> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <i class="uil uil-check-circle"></i> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <i class="uil uil-check-circle"></i> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <i class="uil uil-check-circle"></i> Lorem ipsum dolor sit amet
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal__content-column">
                    <div class="modal__content-icon">
                        <i class="uil uil-search"></i>
                    </div>
                    <div class="modal__content-text">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <p>Lorem ipsum dolor sit amet consectetur dolor sit amet adipisicing elit.</p>
                        <ul>
                            <li>
                                <i class="uil uil-check-circle"></i> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <i class="uil uil-check-circle"></i> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <i class="uil uil-check-circle"></i> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <i class="uil uil-check-circle"></i> Lorem ipsum dolor sit amet
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->*/
    ?>


        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home section" id="home">
                <div class="home__container container grid">
                    <div class="home__content grid">
                        <div class="home__social">
                            <a href="<?php echo $fbUrl;?>" target="_blank" class="home__social-icon">
                                <i class="uil uil-facebook-f home__socia-icon"></i>
                            </a>
                            <a href="<?php echo $instaUrl;?>" target="_blank" class="home__social-icon">
                                <i class="uil uil-linkedin-alt home__socia-icon"></i>
                            </a>
                            <a href="<?php echo $githubUrl;?>" target="_blank" class="home__social-icon">
                                <i class="uil uil-github-alt home__socia-icon"></i>
                            </a>
                        </div>

                        <div class="home__image">
                            <svg class="home__blob" viewBox="0 0 200 187" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0" mask-type="alpha">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 165.547 
                                    130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 129.362C2.45775 
                                    97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 -0.149132 97.9666 
                                    0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 
                                    165.547 130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 
                                    129.362C2.45775 97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 
                                    -0.149132 97.9666 0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                                    <image class="home__blob-img" href="files/<?php echo $homeImg;?>"/>
                                    <!-- x="12" y="18" -->
                                </g>
                            </svg>
                        </div>

                        <div class="home__data">
                            <h1 class="home__title"><?php echo $homeTitle;?></h1>
                            <h3 class="home__subtitle"><?php echo $homeSubtitle;?></h3>
                            <p class="home__description">
                                <?php echo $homeText;?>
                            </p>
                            <a href="#contact" class="button button--flex">
                                Contact Me<i class="uil uil-message button__icon"></i>
                            </a>
                        </div>

                        <div class="home__scroll">
                            <a href="#about" class="home__scroll-button button--flex">
                                <i class="uil uil-mouse-alt home__scroll-mouse"></i>
                                <span class="home__scroll-name">Scroll down</span>
                                <i class="uil uil-arrow-down home__scroll-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <div class="section__title">About Me</div>
                <div class="section__subtitle">My introduction</div>

                <div class="about__container container grid">
                    <img src="files/<?php echo $aboutImg;?>" alt="" class="about__img">

                    <div class="about__data">
                        <p class="about__description">
                            <?php echo $aboutText;?>
                        </p>

                        <div class="about__info">
                            <div>
                                <span class="about__info-title"><span class="countup" data-countup="<?php echo $yearExperience;?>">05</span>+</span>
                                <span class="about__info-name">Years <br> experience</span>
                            </div>

                            <div>
                                <span class="about__info-title"><span class="countup" data-countup="<?php echo $completedProject;?>">2</span>+</span>
                                <span class="about__info-name">Completed <br> project</span>
                            </div>

                            <div>
                                <span class="about__info-title"><span class="countup" data-countup="<?php echo $companiesWorked;?>">01</span>+</span>
                                <span class="about__info-name">Companies <br> worked</span>
                            </div>
                        </div>

                        <div class="about__buttons">
                            <a href="files/<?php echo $cvUrl;?>" target="_blank" class="button button--flex">
                                Download CV<i class="uil uil-download-alt button__icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== SKILLS ====================-->
            <section class="skills section" id="skills">
                <h2 class="section__title">Skills</h2>
                <span class="section__subtitle">My technical level</span>

                <div class="skills__container container grid">
                    <div>
                        <!--==================== SKILLS 1====================-->
                        <div class="skills__content skills__open">
                            <div class="skills__header">
                                <i class="uil uil-brackets-curly skills__icon"></i>

                                <div>
                                    <h1 class="skills__titles">Frontend developer</h1>
                                    <span class="skills__subtitle">More than 5 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">HTML</h3>
                                        <span class="skills__number">90%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__html"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">CSS</h3>
                                        <span class="skills__number">80%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__css"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">jQuery</h3>
                                        <span class="skills__number">75%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__js"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">React</h3>
                                        <span class="skills__number">25%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__react"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <!--==================== SKILLS 2====================-->
                        <div class="skills__content skills__close">
                            <div class="skills__header">
                                <i class="uil uil-server-network skills__icon"></i>

                                <div>
                                    <h1 class="skills__titles">Backend developer</h1>
                                    <span class="skills__subtitle">More than 3 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">PHP</h3>
                                        <span class="skills__number">70%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__php"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Laravel</h3>
                                        <span class="skills__number">30%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__laravel"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Mysql</h3>
                                        <span class="skills__number">60%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__mysql"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <!--==================== SKILLS 3 ====================-->
                        <div class="skills__content skills__close">
                            <div class="skills__header">
                                <i class="uil uil-swatchbook skills__icon"></i>

                                <div>
                                    <h1 class="skills__titles">Designer</h1>
                                    <span class="skills__subtitle">More than 2 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">PhotoShop</h3>
                                        <span class="skills__number">85%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__photoshop"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Figma</h3>
                                        <span class="skills__number">45%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__figma"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <!--==================== SKILLS 4 ====================-->
                        <div class="skills__content skills__close">
                            <div class="skills__header">
                                <i class="uil uil-english-to-chinese skills__icon"></i>

                                <div>
                                    <h1 class="skills__titles">Language</h1>
                                    <span class="skills__subtitle">More than 2</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Hungarian</h3>
                                        <span class="skills__number">100%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__hu"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">English</h3>
                                        <span class="skills__number">50%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__en"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Serbian</h3>
                                        <span class="skills__number">30%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__sr"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!--==================== QUALIFICATION ====================-->
            <section class="qualification section">
                <h2 class="section__title">Qualification</h2>
                <span class="section__subtitle">My personal journey</span>

                <div class="qualification__container container">
                    <div class="qualification__tabs">
                        <div class="qualification__button button--flex qualification__active" data-target="#education">
                            <i class="uil uil-graduation-cap qualification__icon"></i>
                            Education
                        </div>

                        <div class="qualification__button button--flex" data-target="#work">
                            <i class="uil uil-briefcase-alt qualification__icon"></i>
                            Work
                        </div>
                    </div>

                    <div class="qualification__sections">
                        <!--==================== QUALIFICATION CONTENT 1 ====================-->
                        <div class="qualification__content qualification__active" data-content id="education">
                            <!--==================== QUALIFICATION 1 ====================-->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Elementary School</h3>
                                    <span class="qualification__subtitle">Ada - Serbia</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2007-2015
                                    </div>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                            <!--==================== QUALIFICATION 2 ====================-->
                            <div class="qualification__data">
                                <div></div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>

                                <div>
                                    <h3 class="qualification__title">Computer electrical engineering</h3>
                                    <span class="qualification__subtitle">Ada - Serbia</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2015-2019
                                    </div>
                                </div>
                            </div>

                            <!--==================== QUALIFICATION 3 ====================-->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Frontend Developer</h3>
                                    <span class="qualification__subtitle">Subotica - Serbia</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2019-2021
                                    </div>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                            <!--==================== QUALIFICATION 4 ====================-->
                            <div class="qualification__data">
                                <div></div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <!-- <span class="qualification__line"></span> -->
                                </div>

                                <div>
                                    <h3 class="qualification__title">Website tester</h3>
                                    <span class="qualification__subtitle">Subotica - Serbia</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2020-2021
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--==================== QUALIFICATION CONTENT 2 ====================-->
                        <div class="qualification__content" data-content id="work">
                            <!--==================== QUALIFICATION 1 ====================-->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Website developer</h3>
                                    <span class="qualification__subtitle">Freelancer</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2018-2019
                                    </div>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                            <!--==================== QUALIFICATION 2 ====================-->
                            <div class="qualification__data">
                                <div></div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>

                                <div>
                                    <h3 class="qualification__title">Frontend Developer</h3>
                                    <span class="qualification__subtitle">ErdSoft - Subotica</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2019-2021
                                    </div>
                                </div>
                            </div>

                            <!--==================== QUALIFICATION 3 ====================-->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Website tester</h3>
                                    <span class="qualification__subtitle">Erdsoft - Subotica</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2020-2021
                                    </div>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                            <!--==================== QUALIFICATION 4 ====================-->
                            <div class="qualification__data">
                                <div></div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <!-- <span class="qualification__line"></span> -->
                                </div>

                                <div>
                                    <h3 class="qualification__title">Website developer</h3>
                                    <span class="qualification__subtitle">Freelancer</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2021-2022
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== SERVICES ====================-->
            <section class="services section" id="services">
                <h2 class="section__title">Services</h2>
                <span class="section__subtitle">What i offer</span>

                <div class="services__container container grid">
                    <!--==================== SERVICES 1 ====================-->
                    <div class="services__content">
                        <div>
                            <i class="uil uil-web-grid services__icon"></i>
                            <h3 class="services__title">Ui/Ux <br> Design</h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View more 
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Ui/Ux <br> Design</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-services grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Unique website design.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>According to your ideas.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Follows current trends.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--==================== SERVICES 2 ====================-->
                    <div class="services__content">
                        <div>
                            <i class="uil uil-arrow services__icon"></i>
                            <h3 class="services__title">Frontend <br> Development</h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View more 
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Frontend <br> Development</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-services grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I develop the user interface.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Web page development.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>PSD2HTML</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--==================== SERVICES 3 ====================-->
                    <div class="services__content">
                        <div>
                            <i class="uil uil-brackets-curly services__icon"></i>
                            <h3 class="services__title">Website <br> Developer</h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View more 
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Website <br> Developer</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-services grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Personal page</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>E-commerce</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Blog</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>WordPress, WooCommerce</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== PORTFOLIO ====================-->
            <section class="portfolio section" id="portfolio">
                <h2 class="section__title">Portfolio</h2>
                <span class="section__subtitle">Most recent work</span>

                <div class="portfolio__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== PORTFOLIO 1 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="projects/delivery/preview.png" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Delivery</h3>
                                <p class="portfolio__description">
                                    Website adaptable to all devices, 
                                    with ui components and animated interactions.
                                </p>
                                <a href="projects/delivery/index.html" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!--==================== PORTFOLIO 2 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="projects/headphones/preview.png" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Headphones</h3>
                                <p class="portfolio__description">
                                    Website adaptable to all devices, 
                                    with ui components and animated interactions.
                                </p>
                                <a href="projects/headphones/index.html" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!--==================== PORTFOLIO 3 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="projects/plants/preview.png" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Plants</h3>
                                <p class="portfolio__description">
                                    Website adaptable to all devices, 
                                    with ui components and animated interactions.
                                </p>
                                <a href="projects/plants/index.html" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!--==================== PORTFOLIO 4 ====================-->
                        <!-- <div class="portfolio__content grid swiper-slide">
                            <img src="projects/sara/preview.jpg" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Sara</h3>
                                <p class="portfolio__description">
                                    Website adaptable to all devices, 
                                    with ui components and animated interactions.
                                </p>
                                <a href="projects/sara/index.html" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div> -->
                        
                        <!--==================== PORTFOLIO 5 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="projects/tasty/preview.jpg" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Tasty</h3>
                                <p class="portfolio__description">
                                    Website adaptable to all devices, 
                                    with ui components and animated interactions.
                                </p>
                                <a href="projects/tasty/index.html" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!--==================== PORTFOLIO 6 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="projects/travel/preview.png" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Travel</h3>
                                <p class="portfolio__description">
                                    Website adaptable to all devices, 
                                    with ui components and animated interactions.
                                </p>
                                <a href="projects/travel/index.html" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!--==================== PORTFOLIO 7 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="projects/watches/preview.png" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Watches</h3>
                                <p class="portfolio__description">
                                    Website adaptable to all devices, 
                                    with ui components and animated interactions.
                                </p>
                                <a href="projects/watches/index.html" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-button-next">
                        <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <!--==================== PROJECT IN MIND ====================-->
            <!-- <section class="project section">
                <div class="project__bg">
                    <div class="project__container container grid">
                        <div class="project__data">
                            <h2 class="project__title">Website developing at low prices.</h2>
                            <p class="project__description">
                            This month 30% discount because of my birthday.
                            </p>
                            <a href="#contact" class="button button--flex button--white">
                                Contact Me
                                <i class="uil uil-message project__icon button__icon"></i>
                            </a>
                        </div> -->

                        <!-- <img src="images/project.png" alt="" class="project__img"> -->
                    <!--</div>
                </div>
            </section>-->

            <?php 
                /*
                <!--==================== TESTIMONIAL ====================-->
                <!-- <section class="testimonial section">
                    <h2 class="section__title">Testimonial</h2>
                    <span class="section__subtitle">My client saying</span>
                    
                    <div class="testimonial__container container swiper-container">
                        <div class="swiper-wrapper"> -->
                            <!--==================== TESTIMONIAL 1 ====================-->
                            <!-- <div class="testimonial__content swiper-slide">
                                <div class="testimonial__data">
                                    <div class="testimonial__header">
                                        <img src="images/testimonial1.jpg" alt="" class="testimonial__img">
                                        
                                        <div>
                                            <h3 class="testimonial__name">Sara Smith</h3>
                                            <span class="testimonial__client">Client</span>
                                        </div>
                                    </div>

                                    <div>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                    </div>
                                </div>

                                <p class="testimonial__description">
                                    I get a good impression, I carry out 
                                    my project with all the possible quality 
                                    and attention and support 24 hours a day.
                                </p>
                            </div> -->

                            <!--==================== TESTIMONIAL 2 ====================-->
                            <!-- <div class="testimonial__content swiper-slide">
                                <div class="testimonial__data">
                                    <div class="testimonial__header">
                                        <img src="images/testimonial2.jpg" alt="" class="testimonial__img">
                                        
                                        <div>
                                            <h3 class="testimonial__name">Daniel Soltis</h3>
                                            <span class="testimonial__client">Client</span>
                                        </div>
                                    </div>

                                    <div>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                    </div>
                                </div>

                                <p class="testimonial__description">
                                    I get a good impression, I carry out 
                                    my project with all the possible quality 
                                    and attention and support 24 hours a day.
                                </p>
                            </div> -->

                            <!--==================== TESTIMONIAL 3 ====================-->
                            <!-- <div class="testimonial__content swiper-slide">
                                <div class="testimonial__data">
                                    <div class="testimonial__header">
                                        <img src="images/testimonial3.jpg" alt="" class="testimonial__img">
                                        
                                        <div>
                                            <h3 class="testimonial__name">Raul Harris</h3>
                                            <span class="testimonial__client">Client</span>
                                        </div>
                                    </div>

                                    <div>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                        <i class="uil uil-star testimonial__icon-star"></i>
                                    </div>
                                </div>

                                <p class="testimonial__description">
                                    I get a good impression, I carry out 
                                    my project with all the possible quality 
                                    and attention and support 24 hours a day.
                                </p>
                            </div> -->
                        <!-- </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </section> -->
                */
            ?>

            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">
                <h2 class="section__title">Contact Me</h2>
                <span class="section__subtitle">Get in tuch</span>

                <div class="contact__container container grid">
                    <div>
                        <div class="contact__information">
                            <i class="uil uil-whatsapp contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Call Me</h3>
                                <span class="contact__subtitle" id="whatsapp-container">
                                    <button id="whatsapp" class="h-captcha" data-sitekey="335c9843-fc86-45e3-b094-513552803d6d" data-callback="onSubmitWhatsapp">Show number</button>
                                </span>
                                <!-- https://wa.me/qr/OAVKWLNVQ5KQE1 -->
                            </div>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-envelope contact__icon"></i>

                            <div>
                                <h3 class="contact__title">E-mail</h3>
                                <span class="contact__subtitle">info@petrov-adrian.com</span>
                            </div>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-map-marker contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Location</h3>
                                <span class="contact__subtitle">Utrine, Serbia 24437</span>
                            </div>
                        </div>
                    </div>

                    <form action="components/sendmail.php" method="POST" class="contact__form grid" id="contact-form">
                        
                        <?php if(isset($_SESSION['emailAlert'])){
                            if ($_SESSION['emailAlert'] == "success") {
                            ?>
                                <div class="form__alert form__alert--success">
                                    Message has been sent successfully!
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="form__alert form__alert--error">
                                    Something went wrong, please try again later!
                                </div>
                            <?php
                            }

                            unset($_SESSION['emailAlert']);
                        } ?>
                       
                        <div class="contact__inputs grid">
                            <div class="contact__content">
                                <label for="" class="contact__label">Name</label>
                                <input class="contact__input" type="text" name="contactName" id="contactName" required>
                            </div>

                            <div class="contact__content">
                                <label for="" class="contact__label">Email</label>
                                <input class="contact__input" type="email" name="contactEmail" id="contactEmail" required>
                            </div>
                        </div>
                        <div class="contact__content">
                            <label for="" class="contact__label">Subject</label>
                            <input class="contact__input" type="text" name="contactSubject" id="contactSubject" required>
                        </div>
                        <div class="contact__content">
                            <label for="" class="contact__label">Message</label>
                            <textarea name="contactText" id="contactText" cols="0" rows="7" class="contact__input"></textarea>
                        </div>
                        
                        <div>
                            <button class="h-captcha button button--flex" name="contactSubmit" data-sitekey="335c9843-fc86-45e3-b094-513552803d6d" data-callback="onSubmit">
                                Send Message
                                <i class="uil uil-message button__icon"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!--==================== SCROLL TOP ====================-->
            <a href="#" class="scrollup" id="scroll-up">
                <i class="uil uil-arrow-up scrollup__icon"></i>
            </a>
        </main>
    <?php include 'footer.php'; ?>



    <script>

        function onSubmit(token) {
            var error = 1;

            if(!$('#contactName').val()) {
                error = 0;
                $('#contactName').parent().addClass('contact__content--error');
            }
            if(!$('#contactEmail').val()) {
                error = 0;
                $('#contactEmail').parent().addClass('contact__content--error');
            }
            if(!$('#contactSubject').val()) {
                error = 0;
                $('#contactSubject').parent().addClass('contact__content--error');
            }
            if(!$('#contactText').val()) {
                error = 0;
                $('#contactText').parent().addClass('contact__content--error');
            }

            if(error != 0) {
                document.getElementById('contact-form').submit();
            } else {
                console.log('One of them is empty');
            }
        }
        function onSubmitWhatsapp(token) {
            $("#whatsapp").hide();
            $("#whatsapp-container").append("<a href='https://wa.me/message/PINZTN42IQAMF1'>https://wa.me/message/PINZTN42IQAMF1</a>");
        }
    </script>



    <?php //webpImage('','me','') ?>
    <?php //svgIcon('user-2') ?>