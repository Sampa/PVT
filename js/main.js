//Custom Javascript Here
jQuery(document).ready(function(){
    jQuery('#VAT').hide();
    jQuery('#Companyname').hide();
    jQuery('#other_checkbox').change(function(){ // This is used to fadeIn&FadeOut the text filed in the feedback-form
        if(this.checked){
            $('#VAT').fadeIn('slow');
            $('#Companyname').fadeIn('slow');
        }
        else{
            $('#VAT').fadeOut('slow');
            $('#Companyname').fadeOut('slow');
}
    });
});

//***********************DO NOT CHACKABACKALOLA HERE********************************'//
//JS för survey

function startBootstro(){
    $('.survey-component').removeClass('draggable');
    $('.panel-body').removeClass('dropzone');
    bootstro.start(".bootstro", {
        //Bestämmer att det inte går att klicka i backgrunden för att gå ur guiden.
        stopOnBackdropClick : false,
        nextButtonText : 'Nästa»',
        prevButtonText : '«Tillbaka',
        finishButtonText : 'Avsluta guiden',
        onComplete : function(params)
        {

        },
        onExit : function(params)
        {
            $('.survey-component').addClass("draggable");
            $('.panel-body').addClass('dropzone');
        }
    });
};
$("#formLayoutDropzoneWrapper").on("click",".removeQuestion",function(){
    $(this).closest("li").remove();
});
$(document).on("click",".addAlternative",function(){
    var place = $(this);
    var createRadio = $(this).hasClass("newRadioAlternative");
    var optionsName = place.closest("div").attr("name");
    bootbox.prompt("Ange svarsalternativet", function(alternative) {
        if (alternative === null)
            return; //skit i resten om användaren inte anger en fråga
        var clone,title;
        if(createRadio){
            clone = $("#radioField").children("label").clone();
        }else{
            clone  = $("#checkboxField").children("label").clone();
        }
        //närmaste diven har ett unikt namn vi kan använda
        clone.children("input").attr("name",optionsName);
        title = $("#optionText").clone();
        title.attr("id",$(".optionText").length);
        title.html(alternative);
        clone.prepend(title);
        $(clone).insertBefore(place);
    });
});
