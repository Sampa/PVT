<?php
/* @var $this CvController */
/* @var $model Cv */


$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
	Yii::t("t","Mina Sidor")=>Yii::app()->getBaseUrl().'/user/'.app()->user->id,
    Yii::t("t",'Mina CV:n'),
    );
?>
<div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3><?php echo Yii::t('t','Mina CV:n');?></h3>
        </div>

        <table class="table table-bordered table-condensed table-hover">
            <tbody>
                <tr>
                    <th><?php echo Yii::t('t','Datum');?></th>
                    <th><?php echo Yii::t('t','Rubrik');?></th>
                    <th><?php echo Yii::t('t','Anställningsform');?></th>
                </tr>
                <?php
                foreach($allModels as $model){
                    if($model->publisherId ==Yii::app()->user->id){
                ?>
                <tr id="<?php echo $model->id;?>">
                    <td class='onClick'><?php
                            echo substr($model->date, 0, 10);
                        ?>
                    </td >
                    <td class='onClick'><?php
                            echo $model->title;
                        ?>
                    </td>
                    <td class='onClick'><?php
                            echo $model->typeOfEmployment;
                        ?>
                    </td>
        			<td style='text-align:center;'>
                		<a href =""; return false;> <span id="<?php echo $model->id?>" value="<?php echo $model->id?>" class="glyphicon glyphicon-trash deleteCV"></span> </a>
           			 </td>
                </tr>
                    <?php
                    }
                }?>
            </tbody>
        </table>

    </div>

<script>
$('.onClick').on('click',function(event){
	event.preventDefault();
	window.document.location ="<?php echo Yii::app()->baseUrl; ?>" + '/cv/pdf/'+$(this).parent().attr('id');
});
</script>

<script>
$('.deleteCV').on('click',function(event){
	event.preventDefault();
	var cvIdToDelete = $(this).attr('id');

	$.ajax({
		type: 'POST',
        dataType:"json",
		data: {id:cvIdToDelete},
		url: "<?php echo Yii::app()->baseUrl; ?>" + '/cv/delete/'+cvIdToDelete,
	})
	window.document.location ='admin';
});
</script>

