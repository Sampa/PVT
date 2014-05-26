<?php
/* @var $this UserController */
/* @var $model User */
?>
<?php
    $this->breadcrumbs=array(
        t('Användare'),
        t('Uppdatera uppgifter'),
        $model->username=>array('view','id'=>$model->id),
    );
?>
<?php $this->renderPartial('_form', array('model'=>$model, 'rmodel' => $rmodel,)); ?>