<?php
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'About',
);
?>
<div class="container page-min-height">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/"><?php echo Yii::t("t", "Hem");?></a></li>
                <li class="active"><a href=""><?php echo Yii::t("t", "Om oss");?></a></li>
            </ol>
        </div>
    </div>
    <h1 class="page-header"><?php echo Yii::t("t", "Om oss");?></h1>

    <p><?php echo Yii::t("t", "Det här är CV-Pages och vi är Grupp 1!");?> <br><br> </p>
</div>



