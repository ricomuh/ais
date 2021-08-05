$(window).scroll(function(){
    $(".animate").each(function(){
        if ($(this).offset().top < $(window).scrollTop() + 600) {
            $(this).addClass($(this).data("animate"));
        }
    });
});