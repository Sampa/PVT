<?php
$this->pageTitle = Yii::app()->name . ' - Cookies';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Cookies'),
);
?>
<div class="container page-min-height hidden-xs">
    <div class="row">
        <h2><?php echo Yii::t("t", "Cookies");?></h2>
            <div class="col-md-6">
                <p id="texts"><?php echo t("Vi vill meddela om att CV-Pages använder sig utav cookies. Syftet med cookies är att få
                                information om exempelvis hur många som besöker webbplatsen, vilken webbläsare,skärmupplösning, samt vilken
                                sökmotor som används för att hitta webbplatsen o.s.v. Detta för att kunna förbättra webbplatsen.")?>
            </p>


        </div>
        <div class="col-md-4">
            <p>
                <img src="<?php echo Yii::app()->baseUrl?>/img/bron.jpg">
            </p>
        </div>
    </div>
</div>

<div class="container page-min-height visible-xs">
    <div class="row">
        <h2><?php echo Yii::t("t", "Cookies");?></h2>
        <div class="col-md-6">
            <p id="texts"><?php echo t("Vi vill meddela om att CV-Pages använder sig utav cookies. Syftet med cookies är att få
                                information om exempelvis hur många som besöker webbplatsen, vilken webbläsare,skärmupplösning, samt vilken
                                sökmotor som används för att hitta webbplatsen o.s.v. Detta för att kunna förbättra webbplatsen.")?>
            </p>


        </div>
        <div class="col-md-4">
            <!--<p>
                <img src="<?php echo Yii::app()->baseUrl?>/img/anvbild.jpg">
            </p>-->
        </div>
    </div>
</div>


