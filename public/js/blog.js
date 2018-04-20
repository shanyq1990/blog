$(document).ready(function(){

    /*
    * left nav animation
    * */
    $(".left-nav>li>span").each(function(){
        $(this).click(function () {
            $(this).next().slideToggle('fast');
        });
    });



});

