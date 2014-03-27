<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	'Create',
);
?>

<h1>Create Video</h1>
<?php
			echo $this->renderPartial('_form', array('model'=>$model));
?> 
