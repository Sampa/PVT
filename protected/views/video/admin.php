<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	'Manage',
);


?>

<h1>Manage Videos</h1>
<?php  
		$this->beginWidget('zii.widgets.CPortlet', array(
			'htmlOptions'=>array(
				'class'=>''
			)
		));
		$this->widget('TbMenu', array(
			'type'=>'pills',
			'items'=>array(
				array('label'=>'Create / Update', 'icon'=>'icon-plus', 'url'=>'#','linkOptions'=>array('class'=>'toggleForm')),
		                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
				array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'toggleSearch')),
			),
			'htmlOptions'=>array('style'=>'margin-top:2em;'),
		));
		$this->endWidget();
?>
<!-- search-form -->
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div>

<!-- form -->
	<div id="admin-Video" class="admin-form" style="display:none;">
	<?php		$this->renderPartial('_form', array('model'=>$model));
	?> 
	</div>
<!-- view file is put here-->
	<div class="view-wrapper" style="display:none;">
		<button class="btn closeViewContent"> <i class="icon-chevron-up"></i> Close</button>
		<div class="view-content"></div>
	</div>

<?php $this->widget('TbGridView',array(
	'id'=>'video-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
					array(
			'class' => 'editable.EditableColumn',
			'name'=>'id',
			'headerHtmlOptions' => array('style' => ''),
			'editable' => array(
				'url' => $this->createUrl("Video/updateAttribute"),
				'placement' => 'right',				
				)
			),
					array(
			'class' => 'editable.EditableColumn',
			'name'=>'url',
			'headerHtmlOptions' => array('style' => ''),
			'editable' => array(
				'url' => $this->createUrl("Video/updateAttribute"),
				'placement' => 'right',				
				)
			),
					array(
			'class' => 'editable.EditableColumn',
			'name'=>'title',
			'headerHtmlOptions' => array('style' => ''),
			'editable' => array(
				'url' => $this->createUrl("Video/updateAttribute"),
				'placement' => 'right',				
				)
			),
				array(
			//'header' => Yii::t('t', 'Edit'),
		    'type'=>'raw',
		    'value'=>
			    'Chtml::link(CHtml::tag("i",array("class"=>"icon-eye-open"),""),"#",  	
			    	array("class"=>"btn btn-success view","onclick"=>"renderView($data->id,\"/video/view?id=$data->id\")")).
	   		     /*Chtml::link(CHtml::tag("i",array("class"=>"icon-pencil"),""),"#",
	   		     	array("class"=>"btn btn-primary view","onclick"=>"renderUpdateForm($data->id,\"Video\")")).
				*/
				Chtml::link(CHtml::tag("i",array("class"=>"icon-trash"),""),"#",
			  	 	array("class"=>"btn btn-danger view","onclick"=>"delete_record($data->id,\"Video\")"))',
			'htmlOptions'=>array('style'=>'width:120px;')  
		     ),

		),
	)); ?>
