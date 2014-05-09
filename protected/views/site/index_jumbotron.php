<?php $this->pageTitle = Yii::app()->name; ?>
<div class="jumbotron">
    <div class="container">
        <h1><?php echo Yii::t("t","CV-Pages");?></h1>

        <p><?php echo Yii::t("t", "Vill du synas eller leta efter intressanta kandidater i vår publika CV-databas? Då har du kommit rätt! Här kan du,
        
    söka nya jobb utan att din nuvarande arbetsgivare ser att du gör det
    hitta kandidater inom ett brett spektrum av brancher
    följa dina rekryteringsprocesser


 <br> Prova att söka i vår cv-databas nu ");?> </p>
<br>
        <p><a href="<?php echo Yii::app()->baseUrl;?>/cv" class="btn btn-primary btn-lg"><?php echo Yii::t("t","Sök efter CV");?></a> </p>
         </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Sök nytt jobb anonymt!");?></h2>

        <p><?php echo Yii::t("t"," Som Publicerare kan du själv välja vilken typ av information som du vill ge ut om dig själv. 
        I dina publicera CV:n kan du uppge ditt riktiga namn om du vill,
         men rekryteraren ser endast ditt användarnamn vilket fungerar som en psuedonym. 
         Du kan rikta cv:t till den del av världen som du är intresserad av att arbeta i. Vill du veta mer om hur anonymiteten fungerar läs mer på om oss.
");?> </p>

        <p><a href="<?php echo Yii::app()->baseUrl;?>/site/page/about/" class="btn btn-success btn-btn btn-block"><?php echo Yii::t("t","Om oss");?></a></p>
    </div>
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Rekrytera ");?></h2>

        <p><?php echo Yii::t("t", "Du som söker efter kandidater att anställa kan hitta dem 
        här genom att söka på nyckelord och inleda en enkel rekryteringsprocess och hitta din kandidat! När du är inloggad som rekryterare har du bra överblick och kan ha flera rekryteringsprocesser igång samtidigt.
        På din sida kan du spara intressanta cv.n i en hotlist, och kontakta kandidater via chatt eller mail");?> </p>

        <p><a href="<?php echo Yii::app()->baseUrl;?>/site/register" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Registrera mig ");?></a></p>
    </div>
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Hitta dina toppkandidater ");?></h2>

        <p><?php echo Yii::t("t", "Till dig som behöver kompetent arbetskraft. På CV-pages hittar du enkelt dina kandidater. Vår databas innehåller cv:n från ett brett spektrum av 
        brancher. Du kan lätt söka efter olika folk som söker olika former av anställning. Databasen har en global räckvidd, vilket innebär att du kan hitta kompetens på olika platser i världen. ");?> .</p>

        <p><a href="<?php echo Yii::app()->baseUrl;?>/cv"class="btn btn-primary btn-block" href="#"><?php echo Yii::t("t","Sök i cv-databasen ");?></a></p>
    </div>
</div>
