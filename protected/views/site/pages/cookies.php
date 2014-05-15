<?php
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Cookies'),
);
?>
<div class="container page-min-height">

    <h1 class="page-header"> <?php echo Yii::t("t", "Cookies");?></h1>
    <div class="row">
        <div class="col-md-6">
            <p id="texts"><?php echo t("Vi vill meddela om att CV-Pages använder sig utav cookies. Syftet med cookies är att få
                                information om exempelvis hur många som besöker webbplatsen, vilken webbläsare,skärmupplösning, samt vilken
                                sökmotor som används för att hitta webbplatsen o.s.v. Detta för att kunna förbättra webbplatsen.")?>
            </p>


        </div>
        <div class="col-md-4">
            <p>
                <img src="http://lorempixel.com/output/sports-h-c-421-652-7.jpg">
            </p>
        </div>
    </div>




