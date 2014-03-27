<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->title,
);
?>
<h1>View Video <?php echo $model->id; ?></h1>

<?php $this->widget('ext.x-editable.EditableDetailView',array(
	'data'=>$model,
	'url' => $this->createUrl('/Video/updateAttribute'), //common submit url for all fields
    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'attributes'=>array(
array(
	   	 'name' => 'id',
		    'editable' => array(
			    'type' => 'text',
			    'inputclass' => 'input-large',			    			    
		    )
	    ),
array(
	   	 'name' => 'url',
		    'editable' => array(
			    'type' => 'text',
			    'inputclass' => 'input-large',			    			    
		    )
	    ),
array(
	   	 'name' => 'title',
		    'editable' => array(
			    'type' => 'text',
			    'inputclass' => 'input-large',			    			    
		    )
	    ),
	),
)); ?>
