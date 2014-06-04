<?php
$this->pageTitle = Yii::app()->name . ' - Personuppgifter';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Personuppgifter'),
);
?>
<div class="container page-min-height hidden-xs">
    <div class="row">
        <h2><?php echo Yii::t("t", "Personuppgifter");?></h2>
        <div class="col-md-6">
            <p id="texts"><?php echo t("Registrering hos CV-Pages innebär att du samtycker till att CV-Pages behandlar dina personuppgifter
                            enligt personuppgiftslagen (1998:204 PuL).Som personuppgifter räknas all slags information som direkt eller indirekt
                            kan hänföras till dig som fysisk person till exempel personnummer och adress. Du väljer själv om du vill lämna dina
                             uppgifter till oss och har även rätt att vid behov korrigera de uppgifter som har lämnats. Vi kommer inte att lämna ut
                             dina uppgifter till tredje part utan ditt samtycke.")?></p>

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
        <h2><?php echo Yii::t("t", "Personuppgifter");?></h2>
            <div class="col-md-6">
            <p id="texts"><?php echo t("Registrering hos CV-Pages innebär att du samtycker till att CV-Pages behandlar dina personuppgifter
                            enligt personuppgiftslagen (1998:204 PuL).Som personuppgifter räknas all slags information som direkt eller indirekt
                            kan hänföras till dig som fysisk person till exempel personnummer och adress. Du väljer själv om du vill lämna dina
                             uppgifter till oss och har även rätt att vid behov korrigera de uppgifter som har lämnats. Vi kommer inte att lämna ut
                             dina uppgifter till tredje part utan ditt samtycke.")?></p>

        </div>
        <div class="col-md-4">
           <!-- <p>
                <img src="<?php echo Yii::app()->baseUrl?>/img/anvbild.jpg">
            </p>-->
        </div>
    </div>
</div>



