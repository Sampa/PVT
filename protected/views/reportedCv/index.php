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
            <div class="table-responsive">
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
                <a href =""; return false;> <span id="<?php echo $model->cvId?>" value="<?php echo $model->id?>" class="glyphicon glyphicon-trash deleteReportedCV"></span> </a>
            </td>
            <td style='text-align:center;'>
                <a href =""; return false;> <span id="<?php echo $model->id?>" class="glyphicon glyphicon-flag OkReportedCv"></span> </a>
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
</div>



<script>
$(".deleteReportedCV").on("click",function(event){
    event.preventDefault();	
    var cvIdToDelete = $(this).attr("id");
    var idToRemoveFromReported = $(this).attr("value");
    bootbox.confirm("<?php echo Yii::t("t","Är du säker på att du vill ta bort detta CV?");?>", function(result) {
        if(!result){
            return;
        } 
        $.ajax({
            type: "POST",
            data: {id:cvIdToDelete},
            url: "cv/delete/"+cvIdToDelete,
        })
        $.ajax({
            type: "POST",
            dataType:"json",
            data: {id:idToRemoveFromReported},
            url: "reportedCv/delete/"+idToRemoveFromReported,
        })
        window.document.location ='reportedCv';
    });
});
</script>

<script>
$(".onClick").on("click",function(event){
    event.preventDefault();
    window.document.location ='cv/pdf/'+$(this).parent().attr("id");
});
</script>

<script>
$(".OkReportedCv").on("click",function(event){
    event.preventDefault();

    var idToOk=$(this).attr("id");
    bootbox.confirm("<?php echo Yii::t("t","Är du säker på att du vill markera detta CV som OK?");?>", function(result) {
        if(!result){
            return;
        } 
        $.ajax({
            type: "POST",
            dataType:"json",
            data: {id:idToOk},
            url: "reportedCv/delete/"+idToOk
        })
        window.document.location ='reportedCv';
    });

});
</script>