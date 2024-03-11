
// progress
document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("progress-container");
    const content = document.getElementById(".progressBar");

    function updateProgressBar() {
        const winScroll =
            document.body.scrollTop || document.documentElement.scrollTop;
        const height =
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        progressBar.style.width = scrolled + "%";

        // Change color based on scroll position
        const hue = (scrolled / 100) * 360;
        progressBar.style.backgroundColor = `#f33f3f`;
    }

    window.addEventListener("scroll", updateProgressBar);
});

// Navbar start

const sl = document.getElementById("fir-nav-category");
const hiddenSecondDiv = document.getElementById("sec-nav-category");
sl.addEventListener("mouseover", function handleMouseOver() {
    hiddenSecondDiv.style.display = "block";
});
sl.addEventListener("mouseout", function handleMouseOut() {
    hiddenSecondDiv.style.display = "none";
});

const el = document.getElementById("fir-nav-parent");
const hiddenDiv = document.getElementById("sec-nav-parent");
el.addEventListener("mouseover", function handleMouseOver() {
    hiddenDiv.style.display = "block";
});
el.addEventListener("mouseout", function handleMouseOut() {
    hiddenDiv.style.display = "none";
});

// Navbar end
