$(document).ready(function(){
    $(".w-item").click(function(){
        //contact modal box
        $("#w_overlay").fadeIn(800);
        $("#w_info").animate({marginTop:200, width:500});
        var title = $(this).data('title');
        var theme = $(this).data('theme');
        var year = $(this).data('year');
        var img = $(this).data('path');
        var genre = $(this).data('genre');
        var description = $(this).data('description');
        console.log(title);
        
        $("p[class='title']").text(title);
        $("p[class='theme']").text(theme);
        $("p[class='year']").text(year);
        $("p[class='genre']").text(genre);
        $("p[class='description']").text(description);
    });
    
    $("#wClose").click(function(){
        $("#w_info").animate({marginTop:-650});
        $("#w_overlay").fadeOut(1000);
    });
});