<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Video <?php echo $model->id; ?></h1>

<?php	echo $this->renderPartial('_form', array('model'=>$model));
?> 