<?php
/* @var $this ConversationController */
/* @var $model Conversation */
?>

<?php
$this->breadcrumbs=array(
	'Conversations'=>array('index'),
	'Create',
);
?>

<h1>Create Conversation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>