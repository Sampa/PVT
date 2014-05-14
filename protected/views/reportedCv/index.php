<?php
/* @var $this ReportedCvController */

$this->breadcrumbs=array(
	Yii::t('t','Hem') =>Yii::app()->getHomeUrl(),
	Yii::t('t','Rapporterade CV:n'),
);
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="panel-heading" style='margin-left:-16px;'>
         		<h3><?php echo Yii::t('t','Rapporterade CV:n');?></h3>
      	   </div>

        <table class="table table-bordered table-condensed table-hover">

            <tbody>
                <tr>

                     <th><?php echo Yii::t('t','Rapporteringsdatum');?></th>
                    <th><?php echo Yii::t('t','Rapporterad av');?></th>
                    <th><?php echo Yii::t('t','CVId');?></th>
                    <th><?php echo Yii::t('t','Anledning');?></th>
                    <th><?php echo Yii::t('t','Radera CV');?></th>
                    <th><?php echo Yii::t('t','Rapportera CV som OK');?></th>
                </tr>
                <?php
                foreach($allModels as $model){
                ?>
                 <tr id="<?php echo $model->cvId;?>"> 
                    
                   
                    <td class="onClick"><?php
                            echo substr($model->date, 0, 10);
                        ?>
                    </td>
                    <td class="onClick"><?php
                            echo $model->reportedBy;
                        ?>
                    </td>
                     <td class="onClick"><?php
                            echo $model->cvId;
                        ?>
                    </td>
                    <td class="onClick"><?php
                            echo $model->reason;
                        ?>
                    </td> 
                    <td style='text-align:center;'>
                            <a href =""; return false;> <span id="<?php echo $model->cvId?>" class="glyphicon glyphicon-trash deleteReportedCV"></span> </a>
                    </td>
                    <td style='text-align:center;'>
                            <a href =""; return false;> <span id="<?php echo $model->cvId?>" class="glyphicon glyphicon-flag OkReportedCv"></span> </a>
                    </td>
                </tr>
                    <?php
                }?>
            </tbody>
			</table>
		</div>
		</div>
	</div>
</div>



<script>
$(".deleteReportedCV").on("click",function(event){
event.preventDefault();	
var idToDelete=$(this).attr("id");
var removeFromDom=true;
bootbox.confirm("<?php echo Yii::t("t","Är du 100% säker på att du verkligen vill ta bort det här CVt?");?>", function(result) {

if(!result){
    return;
} 
$.ajax({
    type: "POST",
    data: {id:idToDelete},
    url: "/cv/delete/"+idToDelete,
    success:function(data){
        $("#"+idToDelete).remove();

    }
});
});

 

});
</script>

<script>
$(".onClick").on("click",function(event){
    event.preventDefault();
    window.document.location ='cv/view/'+$(this).parent().attr("id");
});
</script>

<script>
$(".OkReportedCv").on("click",function(event){
    event.preventDefault();

    var idToOk=$(this).attr("id");
    bootbox.confirm("<?php echo Yii::t("t","Är du 100% säker på att du verkligen vill rapportera det här CVt som OK?");?>", function(result) {

    if(!result){
        return;
    } 
    $.ajax({
    type: "POST",
    dataType:"json",
    data: {id:idToOk},
    url: "/reportedCv/delete/"+idToOk
    }).done(function( data) { //hamtat antalet links

        alert(data);

        });
           window.document.location ='reportedCv';
    });

});
</script>