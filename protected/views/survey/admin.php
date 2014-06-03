<?php
/* @var $this SurveyController */
/* @var $model Survey */
$this->breadcrumbs=array(
	t('Hem') => Yii::app()->getHomeUrl(),
    	t('Enkäter'),
	);
$this->pageTitle = Yii::app()->name . t(' - Enkäter');
?>
	<div align="right">
		<a href="<?php echo Yii::app()->baseUrl;?>/survey/create">
			<span class="glyphicon glyphicon-plus"></span>  <?php echo Yii::t("t","Skapa ny enkät");?>
		</a>
	</div>

<div class="panel panel-info">
	<!-- Default panel contents -->
	<div class="panel-heading">
		<h3><?php echo Yii::t('t','Mina enkäter');?></h3>
	</div>
	<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover">
		<tbody>
			<tr>
				<th><?php echo Yii::t('t','Titel');?></th>
				<th><?php echo Yii::t('t','Datum');?></th>
				<th><?php echo Yii::t('t','Svarsfrekvens');?></th>
				<th><?php echo Yii::t('t','Ta bort');?></th>
			</tr>
			<?php
			foreach($allModels as $model){
						?>
					<tr id="<?php echo $model->id;?>">
						<td class="onClick"><?php
						echo substr($model->title, 0,30);
						?>
						</td>
						<td class="onClick">
                            <?php echo $model->date;?>
						</td>
						<td class="onClick">
							<?php
                                echo $model->numberOfResponses();
                                echo " ".t("av")." ";
                                echo $model->numberOfCandidates();
                            ?>
						</td>
						<td style='text-align:center;'>
                			<a href =""; return false;> <span id="<?php echo $model->id?>" value="<?php echo $model->id?>" class="glyphicon glyphicon-trash deleteSurvey"></span> </a>
            			</td>
                	</tr>
                <?php
            }
        ?>
    </tbody>
</table>
</div>

</div>

</div>
<script>
$(".onClick").on("click",function(event){
    event.preventDefault();
    window.document.location ='view/'+$(this).parent().attr("id");
});
</script>

<script>
$(".deleteSurvey").on("click",function(event){
    event.preventDefault();

    var deleteSur=$(this).attr("id");
        $.ajax({
            type: "POST",
            dataType:"json",
            data: {id:deleteSur},
            url: "delete/"+deleteSur
        })
        window.document.location ='admin';
    });

</script>

