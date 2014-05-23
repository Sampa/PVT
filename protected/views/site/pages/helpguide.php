<?php
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Användaravtal'),
    );
    ?>
    <div class="container page-min-height">

        <h1 class="page-header"><?php echo Yii::t("t", "Användarmanual");?></h1>

        <div class="row">
            <div class="col-xs-8">
                <h4><strong><?php echo Yii::t("t","Skapa cv")?></strong></h4>
                <p id="texts"><?php echo t("
                    För att kunna skapa och lägga upp CV:n måste du först vara registrerad som publicerare. 
                    För att sedan lägga upp ett CV klickar du på Skapa nytt cv. Här väljer du vilken typ av anställning du är intresserad av. 
                    Du får välja mellan antigen ett konsultuppdrag eller en vanlig anställning, och i vilken del av världen som du vill arbeta på.  
                    Därefter väljer du det CV som du vill ladda upp. Notera att CV:t måste vara en pdf-fil för att kunna laddas upp!
                    Om du vill kan du välja att lägga till ett eller flera nyckelord till ditt CV för att öka sökträffen hos rekryterare. 
                    Detta gör du genom att fylla i nyckelord på den avsedda platsen strax ovanför Publicera-knappen.
                    ")?>
                </p>
                <div>
                    <h4><strong><?php echo Yii::t("t","Sökning av cv")?></strong></h4>
                    <p id="texts"><?php echo t("
                        För att söka efter CV:n kan du gå tillväga på två sätt. 
                        Antingen söker du direkt i sökrutan på startsidan eller så klickar du på Sökning upp som finns i menyn till höger om kontakt-knappen. 
                        Här fyller du i önskad information för sökning av CV:n och klickar sedan på Sök-knappen. 
                        Notera att om du inte fyller i några uppgifter kommer alla CV:n att visas!
                        Du har möjlighet att välja om CV:n ska sorteras på rubrik, datum eller anställningsform. 
                        Detta gör du genom att klicka på önskat sorteringsalternativ som anges strax under Sök-knappen.")?>
                    </p>
                </div>
                <div>
                    <h4><strong><?php echo Yii::t("t","Se mina rekryteringar")?></strong></h4>
                    <p id="texts"><?php echo t("
                        För att kunna ha pågående rekryteringsprocesser måste du vara inloggad som en rekryterare, 
                        klicka på “Rekryteringsprocesser” i menyn högst upp. Då kommer dina pågående rekryteringsprocesser 
                        att synas överst och de avslutade rekryteringsprocesserna kommer att synas nedanför. 
                        Åt höger ovanför de pågående rekryteringsprocesserna finns en knapp som heter “Lägg till ny process” 
                        där du kan skapa en ny process. ");?>
                    </p>
                </div>
                <div>
                    <h4><strong><?php echo Yii::t("t","Registrera ett konto")?></strong></h4>
                    <p id="texts"><?php echo t("För att få tillgång till systemet måste man registrera ett användarkonto. 
                    Vid registrering av användarkonto finns det en ruta att kryssa för om du är en rekryterare. 
                    Om du inte kryssar för rutan så registreras du automatiskt som en publicerare. 
                    Registrera dig-knappen är blå och är synlig längst upp till höger. 
                    För att slutföra en registrering måste man aktivera sitt konto genom ett bekräftelsemail 
                    som man får skickat till den e-postadress som angetts. ");?>
                    </p>
                </div>
                <div>
                    <h4><strong><?php echo Yii::t("t","Chatta och skicka meddelanden")?></strong></h4>
                    <p id="texts"><?php echo t(" För att kommunicera med andra användare på cv-pages kan du skicka meddelanden eller livechatta. Om du är inloggad som en 
                    rekryterare kan du välja att påbörja chattsamtal med intressanta publicerare. Lägg till det intressanta cv:t i den aktuella rekryteringsprocessens hotlist och därifrån kan 
                    du starta en chatt eller skicka ett meddelande. Svaren som du får hamnar i din inbox för meddelanden. Den hittar du högst upp
                    i högra hörnet genom att klicka på din användarprofil.  ");?>
                    </p>
                </div>
                <div>
                    <h4><strong><?php echo Yii::t("t","Skapa  och skicka enkäter till publicerare")?></strong></h4>
                    <p id="texts"><?php echo t("För att skapa en ny enkät klickar du på knappen enkäter i navigeringsbaren, där ser du en överblick
                    på dina enkäter som du har skapat, om du vill skapa en ny, klickar du bara på plus-ikonen i högerkanten");?>
                    </p>
                </div>
                 <div>
                    <h4><strong><?php echo Yii::t("t","Lägg till cv i hotlist")?></strong></h4>
                    <p id="texts"><?php echo t("För att kunna lägga till ett intressant cv i en hotlist måste du vara registrerad som rekryterare ");?>
                    </p>
                </div>
            </div>
            <div class="col-xs-4">
                <p>
                   <img src="http://lorempixel.com/output/fashion-h-c-421-652-5.jpg">
               </p>
           </div>
       </div>
   </div>


</div>


