$(document).ready(function () {
    $("#overlay").fadeIn();

    setTimeout(function () {
        $("#overlay").fadeOut(function () {
            $(".page-wrapper").fadeIn();
        });
    }, 1500);
});

$(document).ready(function () {
    // Đồng ý thanh toán
    $("#confirm-checkout").change(function () {
        if ($(this).is(":checked")) {
            $("#btn-confirm-checkout").removeClass("disabled");
        } else {
            $("#btn-confirm-checkout").addClass("disabled");
        }
    });
});

Fancybox.bind("[data-fancybox]", {});

$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            },
        },
    });
});

let counter = 0;

function increment() {
    counter++;
}

function decrement() {
    counter--;
}

function get() {
    return counter;
}

const inc = document.getElementById("increment");
const input = document.getElementById("input");
const dec = document.getElementById("decrement");

inc.addEventListener("click", () => {
    increment();
    input.value = get();
});

dec.addEventListener("click", () => {
    if (input.value > 0) {
        decrement();
    }
    input.value = get();
});
