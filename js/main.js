
function chatUpdateTime(toid,conversationid){
    $.ajax({
        dataType: "json",
        type: "POST",
        url: "message/inbox/getUnreadMessages",
        data: {
            receiver_id : toid,
            conversation_id: conversationid
        }
    }).done(function(data){
        if(data.status=="ok"){
            $("#chatUl"+conversationid).append(data.html);
//            alert(data.html);
        }else{
        }
        setTimeout(chatUpdateTime(toid,conversationid), 2000);
    });
}
$(".chatHistoryToggle").on('click',function(){
    var id=$(this).attr("href");
    $(id).slideToggle();

    var iconElement = $(this).children("span");
    if(iconElement.hasClass("up")){
        iconElement.removeClass("up");
        iconElement.removeClass("glyphicon-arrow-up");
        iconElement.addClass("glyphicon-arrow-down");
    }else{
        iconElement.removeClass("glyphicon-arrow-up");
        iconElement.addClass("up");
        iconElement.addClass("glyphicon-arrow-down");
    }
});

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
        target.children(":not(:first-child)").remove();
        data.geonames.forEach(function(item){
            var fixedName = item.name.replace("Municipality","");
            fixedName = fixedName.replace("municipality","");
            fixedName = fixedName.replace("Kommun","");
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
//                console.log(next);
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
    $(".clickable").on('click',function(){
        var iconElement = $(this).closest("tr").children("td:last-child").children("a");
        if(iconElement.hasClass("down")){
            iconElement.removeClass("down");
            iconElement.removeClass("glyphicon-arrow-down");
            iconElement.addClass("glyphicon-arrow-up");
        }else{
            iconElement.removeClass("glyphicon-arrow-up");
            iconElement.addClass("down");
            iconElement.addClass("glyphicon-arrow-down");
        }
    });
    /*konversationer vänsterspaltsmenyn*/

    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
    /*skicka nytt chat meddelande*/
    $(".sendChatMessage").on("click", function (event) {
        event.preventDefault();
//        var id = $(this).attr("");
        var conversationId = $(this).attr("data-content");
        id = conversationId;//id.replace("btn-chat", "");
        var message = $("#Message_body" + id).val();
//        if(message.length < 1)
//            return;
        $.ajax({
            "type": "POST",
            "url": $(this).attr("data-url"),
            "dataType": "json",
            "data": {
                "body": $("#Message_body" + id).val(),
                "receiver": $(this).attr("name"),
                "receiver_id": id,
                "conversation_id": conversationId
            }
        }).done(function (data) {
            if (data.success)
                $("#chatUl"+id).append(data.message);
                 $("#Message_body" + id).val("");
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
/**
 *   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables
 *   but will likely encounter performance issues on larger tables.
 *
 *		<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
 *		$(input-element).filterTable()
 *
 *	The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
 */
(function(){
    'use strict';
    var $ = jQuery;
    $.fn.extend({
        filterTable: function(){
            return this.each(function(){
                $(this).on('keyup', function(e){
                    $('.filterTable_no_results').remove();
                    var $this = $(this), search = $this.val().toLowerCase(), target = $this.attr('data-filters'), $target = $(target), $rows = $target.find('tbody tr');
                    if(search == '') {
                        $rows.show();
                    } else {
                        $rows.each(function(){
                            var $this = $(this);
                            $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                        })
                        if($target.find('tbody tr:visible').size() === 0) {
                            var col_count = $target.find('tr').first().find('td').size();
                            var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">Inga resultat hittades</td></tr>')
                            $target.find('tbody').append(no_results);
                        }
                    }
                });
            });
        }
    });
    $('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
    $('[data-action="filter"]').filterTable();

    $('.tableWrapper').on('click', '.panel-heading span.filter', function(e){
        var $this = $(this),
            $panel = $this.parents('.panel');
        $panel.find('.panel-body').slideToggle();
        if($this.css('display') != 'none') {
            $panel.find('.panel-body input').focus();
        }
    });
    $('[data-toggle="tooltip"]').tooltip();
});

    /*
    * När man vill spara ett CV till en hotlist
    */
    $(".listOfProcesses").on("click", function(){
        var processID = $(this).attr("id");
        var cvID = $(this).parent().attr("id");
        $.ajax({  //gör en http POST request till vår actionSaveCV i RecruitmentprocessController och skicka med datan
            type: "POST",
            url: "recruitmentprocess/savecv",
            data: {"processID":processID, "cvID":cvID}
        }).done(function( data ) {
           $('#hotlistModal').modal('show');
           $("#hotlistTarget").html(data);
        });
    });

/*
    * När man vill rapportera ett CV
    */
    jQuery(".report-cv-flag").on("click", function() {
        $("#reasonTextField").val("");
        $("#reportModalTextSuccess").hide();
        $("#reportModalTextFailure").hide();
        $("#reportModalEndFooter").hide();
        var cvID = $(this).attr("id");
        var userID = $(this).attr("data-user");
        $("#submitReportBtn").attr("data-id",cvID);
        $("#submitReportBtn").attr("data-user",userID);
    });

    $("#submitReportBtn").on("click", function() {
        var cvID = $(this).attr("data-id");
        var reason = $("#reasonTextField").val();
        //sätt userid till 0 om personen är gäst(ej inloggad) annars id:t (shortif syntax) för att undvika issue #29
        var userID = $(this).attr("data-user");
        $.ajax ({
            type: "POST",
            url: "reportedCv/create",
            data: {"reason":reason, "cvID":cvID, "userID":userID}
        }).done(function( data ) {
            $("#reportModalInputDiv").hide();
            $("#reportModalStartFooter").hide();
            if(data == 1) {
                $("#reportModalTextSuccess").fadeIn("slow");
            } else {
                $("#reportModalTextFailure").fadeIn("slow");
            }
            $("#reportModalEndFooter").fadeIn("slow");
        })
    });