$(document).ready(function () {
    console.log('theme js loaded');

    [].slice.call($(".form-add-to-cart")).map(e => {
        const $form = $(e)
        const $amount = $(e).find(".amount")

        $(e).find(".minus").click(function () {
            const amount = +$amount.val();
            if (amount >= 1) {
                $amount.val(amount - 1)
            }
        })

        $(e).find(".plus").click(function () {
            const amount = +$amount.val();
            $amount.val(amount + 1)
        })
    })


    var thumbs = new Swiper(".thumbs", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var full = new Swiper(".full", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: thumbs,
        },
    });
})