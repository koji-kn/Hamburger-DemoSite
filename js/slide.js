'use strict';{
    const swiper = new Swiper('.swiper-container', {
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev',
        // },
        loop: true,
        speed: 800,
        // pagination: {
        //     el: '.swiper-pagination',
        //     type: 'bullets',
        //     clickable: true,
        // },
        autoplay: {
            delay: 3000,
            disableOnInteraction: true
        },
    });
}