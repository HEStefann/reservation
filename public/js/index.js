    document.getElementById("clearLocationButton").addEventListener("click", function() {
        document.getElementById("searchLocation").value = "";
    });

    document.getElementById("clearRestaurantButton").addEventListener("click", function() {
        document.getElementById("searchRestaurant").value = "";
    });
    // Set scroll position on load
    const imageScroll = document.getElementById('image-scroll');
    document.addEventListener('DOMContentLoaded', () => {
        imageScroll.scrollLeft = 0;
    })
    const circle1 = document.getElementById('circle1');
    const circle2 = document.getElementById('circle2');
    const circle3 = document.getElementById('circle3');

    imageScroll.addEventListener('scroll', () => {
        const scrollLeft = imageScroll.scrollLeft;
        const imageWidth = imageScroll.clientWidth;
        const imageIndex = Math.round(scrollLeft / imageWidth);
        const totalImages = Math.ceil(imageScroll.scrollWidth / imageWidth);

        circle1.setAttribute('fill', imageIndex === 0 ? '#005FA4' : '#E2E2E2');
        circle2.setAttribute('fill', imageIndex > 0 && imageIndex < totalImages - 1 ? '#005FA4' : '#E2E2E2');
        circle3.setAttribute('fill', imageIndex === totalImages - 1 ? '#005FA4' : '#E2E2E2');
    });
    const howWorksDiv = document.getElementById("howWorks");
    // const circles = document.querySelectorAll("svg circle .indicator");
    const circles = document.querySelectorAll(".indicator");
    const svg = document.querySelector(".dotIndicator");

    const gradientUrls = [
        "url(#paint0_linear_1107_8696)",
        "url(#paint1_linear_1107_8697)",
        "url(#paint2_linear_1107_8698)"
    ];

    howWorksDiv.addEventListener("scroll", () => {
        const scrollLeft = howWorksDiv.scrollLeft;
        const divWidth = howWorksDiv.offsetWidth;
        const totalDivs = document.querySelectorAll(".div").length;
        const currentDiv = Math.floor((scrollLeft + divWidth / 2) / divWidth);

        circles.forEach((circle, index) => {
            if (index === currentDiv) {
                circle.setAttribute("fill", gradientUrls[index]);
            } else {
                circle.setAttribute("fill", "#E2E2E2");
            }
        });
    });