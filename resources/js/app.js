import "./bootstrap";

function toggleMenu() {
    var menu = document.getElementById("menu");

    var hamburger = document.getElementById("hamburger");

    var content = document.getElementById("content");

    if (menu.classList.contains("show-menu")) {
        menu.classList.remove("show-menu");
        hamburger.style.transform = "translateX(0)";
        content.style.width = "100%";
        content.style.marginLeft = "0px";
    } else {
        menu.classList.add("show-menu");
        hamburger.style.transform = "translateX(300px)";
        content.style.width = "calc(100% - 300px)";
        content.style.marginLeft = "300px";
    }
}
var navbar = document.getElementById("menu");
var navbar2 = document.getElementById("navbar");
var prevScrollpos = window.pageYOffset;
var scrollThreshold = 105;

window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (currentScrollPos > scrollThreshold) {
        navbar.style.top = "0";
        navbar2.style.top = "0";
    } else {
        navbar.style.top = scrollThreshold - currentScrollPos + "px";
        navbar2.style.top = scrollThreshold - currentScrollPos + "px";
    }
};
