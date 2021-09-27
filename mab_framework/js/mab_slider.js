$(document).ready(function () {
    $(".slider_next").on("click", () => {
        const   currentImg  = $(".active");
        const   nextImg     = currentImg.next();

        currentImg.removeClass("active");
        if (nextImg.length)
            nextImg.addClass("active");
        else
            $(".slider_inner > *:first-child").addClass("active");
    });

    $(".slider_prev").on("click", () => {
        const   currentImg  = $(".active");
        const   prevImg     = currentImg.prev();

        currentImg.removeClass("active");
        if (prevImg.length)
            prevImg.addClass("active");
        else
            $(".slider_inner > *:last-child").addClass("active");
    });
});
