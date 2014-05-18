//getting country/region/city
(function(window,$,undefined){
    var target = $("#geoCity");
    function getPlaces(gid,new_target){
        target = new_target;
        var url = "http://www.geonames.org/childrenJSON";
        $.ajax({
            url :url,
            dataType:"jsonp",
            jsonp:"callback",
            data:{
                geonameId:gid,
                style:"long"
            },
            success: handleResult
        });
    }
    function handleResult(data){
        target.children().remove();
        data.geonames.forEach(function(item){
            var fixedName = item.name.replace("Municipality","Kommun");
            fixedName = fixedName.replace("unicipality","Kommun");
            var foo = new Option(fixedName,fixedName);
            $(foo).attr("id",item.geonameId);
            target.append(foo);
        });
        target.fadeIn();
    }
    $(function(){
        ["countries","geoRegion","geoCity"].forEach(function(item,index,list){

            var next= $("#"+list[index+1]);
             $("#"+item).select2({
                placeholder: next.attr("data-default")
            });
            $("#"+item).change(function(){
                console.log(next);
                if(next){
                    getPlaces($("option[value='"+this.value+"']").attr("id"),next);
                }
            });
        });
    });
    $("#geoRegion").on("change",function(){
        $(".cityWrapper").fadeIn();
    });
}(window,jQuery,void(0)));


//Custom Javascript Here
/* kod som är här kan man ändra på */
jQuery(document).ready(function(){
    $(".sendChatMessage").on("click", function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
        id = id.replace("btn-chat", "");
        console.log(id);
        $.ajax({
            "type": "POST",
            "url": "/message/compose/",
            "dataType": "json",
            "data": {
                "body": $("#Message_body" + id).val(),
                "receiver": $(this).attr("name"),
                "receiver_id": id
            }
        }).done(function (data) {
            if (data.success)
                $("#chatUl"+id).append(data.message);
//					$('html, body').animate({
//						scrollTop: $("#chatLi"+data.messageId).offset().top
//					}, 2000);
        });
    });
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
        clone.children("input").attr("id",title)
        $(clone).insertBefore(place);
    });
});
