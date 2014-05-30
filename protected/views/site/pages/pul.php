<?php
$this->pageTitle = Yii::app()->name . ' - Personuppgifter';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'PuL'),
);
?>
<div class="container page-min-height">
    <div class="row">
        <div class="col-md-6">
            <p id="texts"><?php echo t("Registrering hos CV-Pages innebär att du samtycker till att CV-Pages behandlar dina personuppgifter
                            enligt personuppgiftslagen (1998:204 PuL).Som personuppgifter räknas all slags information som direkt eller indirekt
                            kan hänföras till dig som fysisk person till exempel personnummer och adress. Du väljer själv om du vill lämna dina
                             uppgifter till oss och har även rätt att vid behov korrigera de uppgifter som har lämnats. Vi kommer inte att lämna ut
                             dina uppgifter till tredje part utan ditt samtycke.")?>
            </p>


        </div>
        <div class="col-md-4">
            <p>
                <img src="http://lorempixel.com/output/food-h-c-421-652-9.jpg">
            </p>
        </div>
    </div>



