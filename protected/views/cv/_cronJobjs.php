<?php echo "hej";?>
<script>
    (function(window,$,undefined){
        $.ajax({
            type: "POST",
            dataType:"jsonp",
            url: "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=link:http://pvt.dsv.su.se/Group1/cv/"'.$cvID.'
        }).done(function( data ) { //hämtat antalet links
            var numberOfLinks = data.responseData.cursor.resultCount;
            $.ajax({
                type: "POST",
                dataType:"json",
                url: "/cv/SaveInboundLinks",
                data: {
                    linkCount:numberOfLinks,
                    id:cvIdentification
                }
            });
        });
    }(window,jQuery,void(0)));

</script>