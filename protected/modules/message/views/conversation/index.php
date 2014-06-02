<?php
/* @var $this ConversationController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Conversations',
);

$this->menu=array(
	array('label'=>'Create Conversation','url'=>array('create')),
	array('label'=>'Manage Conversation','url'=>array('admin')),
);
?>

<h1>Conversations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>