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
                <!-- <tr onclick="window.document.location ='cv/view/<?php echo $model->cvId;?>';"> -->
                    
                    <tr>
                    <td><?php
                            echo substr($model->date, 0, 10);
                        ?>
                    </td>
                    <td><?php
                            echo $model->reportedBy;
                        ?>
                    </td>
                     <td><?php
                            echo $model->cvId;
                        ?>
                    </td>
                    <td><?php
                            echo $model->reason;
                        ?>
                    </td> 
                    <td style='text-align:center;'>
                            <span id="<?php echo $model->cvId?>" class="glyphicon glyphicon-trash deleteReportedCV"></span>
                    </td>
                    <td style='text-align:center;'>
                        <a href="<?php echo Yii::app()->baseUrl;?>/recruitmentprocess/view/<?php echo $model->id?>">
                            <span class="glyphicon glyphicon-flag"></span> 
                        </a>
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
$.ajax({
	type: "POST",
	dataType:"json",
	data: {id:$(this).attr("id")},
	url: "/cv/delete/"+$(this).attr("id")
}).done(function( data) { //hamtat antalet links
		alert(data);
		});
});
</script>
