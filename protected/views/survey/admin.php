<?php
/* @var $this SurveyController */
/* @var $model Survey */

$this->breadcrumbs=array(
	t('Hem') => Yii::app()->getHomeUrl(),
	t('Enkäter'),
	);
	?>
<div class="page-header">
	<h1><?php echo Yii::t('t','Enkäter');?></h1>
	<div align="right">
		<a href="<?php echo Yii::app()->baseUrl;?>/survey/create">
			<span class="glyphicon glyphicon-plus"></span>  <?php echo Yii::t("t","Skapa ny enkät");?>
		</a>
	</div>
</div>

<div class="panel panel-info">
	<!-- Default panel contents -->
	<div class="panel-heading">
		<h3><?php echo Yii::t('t','Mina enkäter');?></h3>
	</div>

	<table class="table table-bordered table-condensed table-hover">
		<tbody>
			<tr>
				<th><?php echo Yii::t('t','Titel');?></th>
				<th><?php echo Yii::t('t','Datum');?></th>
			</tr>
			<?php
			foreach($allModels as $model){
						?>
					<tr class="onClick" id="<?php echo $model->id;?>">
						<td><?php
						echo $model->title;
						?>
						</td>
						<td><?php
						echo $model->date;
						?>
						</td>
                	</tr>
                <?php
            }
        ?>
    </tbody>
</table>

</div>

</div>

<script>
$(".onClick").on("click",function(event){
    event.preventDefault();
    window.document.location ='view/'+$(this).attr("id");
});
</script>

