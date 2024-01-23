$(document).ready(function () {
    // Function to toggle the mobile menu
    function toggleMenu() {
        var $menu = $("#menu");
        var $hamburger = $("#hamburger");
        var $content = $("#content");

        if ($menu.hasClass("show-menu")) {
            $menu.removeClass("show-menu");
            $hamburger.css("transform", "translateX(0)");
            $content.css({
                width: "100%",
                marginLeft: "0px",
            });
        } else {
            $menu.addClass("show-menu");
            $hamburger.css("transform", "translateX(300px)");
            $content.css({
                width: "calc(100% - 300px)",
                marginLeft: "300px",
            });
        }
    }

    // Add a click event listener to the hamburger button
    $("#hamburger").on("click", toggleMenu);

    // Function to handle the scroll effect for the navbar
    function handleScroll() {
        var $navbar = $("#navbar");
        var $menu = $("#menu");
        var scrollThreshold = 105;
        var currentScrollPos = $(window).scrollTop();

        if (currentScrollPos > scrollThreshold) {
            $navbar.css("top", "0");
            $menu.css("top", "0");
        } else {
            $navbar.css("top", scrollThreshold - currentScrollPos + "px");
            $menu.css("top", scrollThreshold - currentScrollPos + "px");
        }
    }

    // Add a scroll event listener to handle the navbar scroll effect
    $(window).on("scroll", handleScroll);

    // Ensure the scroll effect is applied when the page initially loads
    handleScroll();
});
