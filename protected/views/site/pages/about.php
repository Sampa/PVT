<?php
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Om oss'),
);
?>
<div class="container page-min-height">

    <h1 class="page-header"><?php echo Yii::t("t", "Om oss");?></h1>

    <p><?php echo Yii::t("t", "Det här är CV-Pages och vi är Grupp 1!");?> <br><br> </p>
</div>



