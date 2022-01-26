$(window).on("scroll", function() {
    if ($(window).scrollTop() > 50) {
        $(".home-navbar").addClass("active2");
        $(".btnBlueTransparent").addClass("btnBlue");
    } else {
        $(".home-navbar").removeClass("active2");
        $(".btnBlueTransparent").removeClass("btnBlue");
    }
});