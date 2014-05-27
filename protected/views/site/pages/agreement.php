<?php
$this->pageTitle = Yii::app()->name . ' - Agreement';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Användaravtal'),
);
?>
<div class="container page-min-height">

    <h1 class="page-header"><?php echo Yii::t("t", "Användaravtal");?></h1>

    <div class="row">
    <div class="col-md-6">
         <p id="texts"><?php echo t("CV-Pages är en webbplats avsedd att användas endast till jobbrekryteringar och får inte användas i andra avseenden.
          Detta innebär att det endast är CV:n som får laddas upp av publicerare. Vid missbruk kan ditt konto komma att stängas av.")?>
            </p>

        <p id="texts"><?php echo t("CV-Pages förbehåller sig rätten att undanhålla och ta bort material som finns på ditt konto,utan förhandsbesked,
                om CV-Pages anser att materialet strider mot detta avtal. CV-Pages har inga skyldigheter att förvara, spara eller förse med kopior av material
                som du tillhandahåller när du använder CV-Pages tjänster.")?>
         </p>
    <p id="texts"><?php echo t("CV-Pages ansvarar inte för det material som läggs upp och ansvarar inte heller för något som kan förekomma vid kontakt mellan publicerare och rekryterare.
                                    CV-Pages garanterar inte anställning till publicerare som har nått en överenskommelse med rekryterare.
                                Det finns möjlighet för användare att rapportera om olämpligt material förekommer. Dock får missbruk av denna funktion inte förekomma.
                                Vid missbruk kan ditt konto komma att stängas av.");?>
         </p>
    </div>
        <div class="col-md-4">
            <p>
               <img src="http://http://lorempixel.com/400/200/"> 
            </p>
        </div>
    </div>
    </div>


</div>



