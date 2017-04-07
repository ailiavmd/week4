$(document).ready(function(){

    //contact modal box
    $("#contact-mod").click(function(){
        $("#overlay").fadeIn(800);
        $("#contact").animate({marginTop:200, width:500});
    });

    $("#modClose").click(function(){
        $("#contact").animate({marginTop:-650});
        $("#overlay").fadeOut(1000);
    });
    
});