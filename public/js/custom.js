$(document).ready(function () {
    // Ajax csrf token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#flip").click(function () {
        $("#panel").slideToggle("slow");
    });

    // Only number in text
    $("input.onlynumber").keyup(function (e) {
        if (/\D/g.test(this.value)) {
            this.value = this.value.replace(/\D/g, "");
        }
    });

    $('.feedbackmessage').delay(3000).fadeOut();
    $('.feedbackmessage').click(function () {
        $(this).fadeOut();
    });

    $("#flashpop").fadeOut(3000);

    // Function to handle the scroll event
    $(window).scroll(function () {
        // Get the current scroll position
        var scrollTop = $(window).scrollTop();

        // Check if the user has scrolled down
        if (scrollTop > 0) {
            // Remove the class 'py-5' when scrolling down
            $("#mainnavigation").removeClass("py-5");
        } else {
            // Add the class 'py-5' when scrolling to the top
            $("#mainnavigation").addClass("py-5");
        }
    });
});

// // ==============Nav-menu============
// var swiper = new Swiper(".mySwiper", {
//     cssMode: true,
//     loop: true,
//     autoplay: {
//         delay: 2500,
//         disableOnInteraction: false,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     pagination: {
//         el: ".swiper-pagination",
//     },
// });
// // ===============Hero-slider=============

// // =============Course-item==============
// var swiper = new Swiper(".courseItemSwiper", {
//     slidesPerView: 1,
//     spaceBetween: 5,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     // autoplay: {
//     //     delay: 2500,
//     //     disableOnInteraction: false,
//     // },
//     loop: true,
//     breakpoints: {
//         "@0.00": {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },

//         "@0.50": {
//             slidesPerView: 2,
//             spaceBetween: 10,
//         },
//         "@0.75": {
//             slidesPerView: 3,
//             spaceBetween: 20,
//         },
//         "@1.00": {
//             slidesPerView: 3,
//             spaceBetween: 40,
//         },
//         "@1.50": {
//             slidesPerView: 5,
//             spaceBetween: 20,
//         },
//     },
// });
// // ================Course-card===============
// var swiper = new Swiper(".courseSwiper", {
//     slidesPerView: 1,
//     spaceBetween: 5,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 3500,
//         disableOnInteraction: false,
//     },
//     loop: true,
//     breakpoints: {
//         "@0.00": {
//             slidesPerView: 1,
//             spaceBetween: 20,
//         },

//         "@0.50": {
//             slidesPerView: 2,
//             spaceBetween: 15,
//         },
//         "@0.75": {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         "@1.00": {
//             slidesPerView: 3,
//             spaceBetween: 40,
//         },
//         "@1.50": {
//             slidesPerView: 4,
//             spaceBetween: 20,
//         },
//     },
// });
// // ===============Modal===========
// (function ($) {
//     "use strict";
//     $(document).ready(function () {
//         $(".modal-link").on("click", function () {
//             $("body").addClass("modal-open");
//         });
//         $(".close-modal").on("click", function () {
//             $("body").removeClass("modal-open");
//         });
//     });
// })(jQuery);
// // ===============Test-swiper==========
// var swiper = new Swiper(".testSwiper", {
//     slidesPerView: 1,
//     spaceBetween: 5,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 3500,
//         disableOnInteraction: false,
//     },
//     loop: true,
//     breakpoints: {
//         "@0.00": {
//             slidesPerView: 1,
//             spaceBetween: 20,
//         },
//         "@0.25": {
//             slidesPerView: 1,
//             spaceBetween: 15,
//         },
//         "@0.50": {
//             slidesPerView: 1,
//             spaceBetween: 15,
//         },
//         "@0.75": {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         "@1.00": {
//             slidesPerView: 3,
//             spaceBetween: 40,
//         },
//         "@1.50": {
//             slidesPerView: 3,
//             spaceBetween: 20,
//         },
//     },
// });

// // ==================Tamslider=============
// var swiper = new Swiper(".teamSwiper", {
//     slidesPerView: 1,
//     spaceBetween: 5,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     autoplay: {
//         delay: 3500,
//         disableOnInteraction: false,
//     },
//     loop: true,
//     breakpoints: {
//         "@0.00": {
//             slidesPerView: 1,
//             spaceBetween: 20,
//         },

//         "@0.50": {
//             slidesPerView: 2,
//             spaceBetween: 12,
//         },
//         "@0.75": {
//             slidesPerView: 2,
//             spaceBetween: 12,
//         },
//         "@1.00": {
//             slidesPerView: 3,
//             spaceBetween: 40,
//         },
//         "@1.50": {
//             slidesPerView: 4,
//             spaceBetween: 20,
//         },
//     },
// });

// =================loadmore===========
$(function () {
    $(".service_box").slice(0, 8).show();
    $("body").on("click touchstart", ".load-more", function (e) {
        e.preventDefault();
        $(".service_box:hidden").slice(0, 4).slideDown();
        if ($(".service_box:hidden").length == 0) {
            $(".load-more").css("visibility", "hidden");
        }
    });
});

// ====================Gallery tab==============
$(".tabs-nav li:first-child").addClass("active");
$(".tab-content").hide();
$(".tab-content:first").show();

// Click function
$(".tabs-nav li").click(function () {
    $(".tabs-nav li").removeClass("active");
    $(this).addClass("active");
    $(".tab-content").hide();

    var activeTab = $(this).find("a").attr("href");
    $(activeTab).fadeIn();
    return false;
});

// ================Accordion============

/* jQuery
================================================== */
$(function () {
    $(".acc__title").click(function (j) {
        var dropDown = $(this).closest(".acc__card").find(".acc__panel");
        $(this).closest(".acc").find(".acc__panel").not(dropDown).slideUp();

        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
        } else {
            $(this)
                .closest(".acc")
                .find(".acc__title.active")
                .removeClass("active");
            $(this).addClass("active");
        }

        dropDown.stop(false, true).slideToggle();
        j.preventDefault();
    });
});

// =====================

// Client Subscription -----------------------------
$("form#subscriptionForm").submit(function (e) {
    e.preventDefault();
    let subscribed = $("#subscriptionsuccess");
    $.ajax({
        method: "POST",
        url: BASE_URL + "subscribe",
        data: $("form#subscriptionForm").serialize(),
        success: function (response) {
            if (response.status == "success") {
                subscribed.html(response.message);
                $("form#subscriptionForm").trigger("reset");
                setTimeout(function () {
                    subscribed.html("");
                }, 5000);
            } else if (response.status == "error") {
                subscribed.html(response.message);
                setTimeout(function () {
                    subscribed.html("");
                }, 5000);
            }
        },
    });
});
// Client Subscription end -----------------------------

// Notification
function sendMarkRequest(id = null) {
    return $.ajax({
        method: "POST",
        url: BASE_URL + "markNotification",
        data: {
            id,
        },
    });
}

$(function () {
    $(".mark-as-read").click(function (e) {
        e.preventDefault();
        let url = $(this).attr("href");
        console.log(url);
        let request = sendMarkRequest($(this).data("id"));

        request.done(() => {
            $(this).parents("div.alert").remove();
            $(location).attr("href", url);
        });
    });

    $("#mark-all").click(function () {
        let request = sendMarkRequest();

        request.done(() => {
            let html =
                '<div class="py-10 text-center"><p class=" text-dgreen ">No Notification.</p> </div>';
            // $('div.alert').remove();
            $("div.tablinedot").remove();
            $("#notificationdiv").html(html);
            // location.reload(true);
        });
    });
});

// Classic Editor function
function createEditor(elementId) {
    ClassicEditor.create(document.querySelector(elementId), {
        toolbar: {
            items: [
                "heading",
                "|",
                "bold",
                "italic",
                "|",
                "bulletedList",
                "numberedList",
                "|",
                "undo",
                "redo",
                "|",
                "link",
                "blockQuote",
            ],
            shouldNotGroupWhenFull: true,
        },
    }).catch((error) => {
        console.error(error);
    });
}

// Password show hide toggle
function togglePasswordVisibility(passwordFieldSelector, iconSelector) {
    const password = $(passwordFieldSelector);
    const isPasswordVisible = password.attr("type") === "text";

    password.attr("type", isPasswordVisible ? "password" : "text");
    $(iconSelector).attr(
        "data-icon",
        isPasswordVisible ? "bxs:show" : "bxs:hide"
    );
}

function changePassword() {
    togglePasswordVisibility("#password", ".passwordShowHide");
}

function cchangePassword() {
    togglePasswordVisibility("#password_confirmation", ".cpasswordShowHide");
}


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
