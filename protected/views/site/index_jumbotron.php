<?php $this->pageTitle = Yii::app()->name; ?>
<div class="jumbotron">
    <div class="container">
        <h1><?php echo Yii::t("t","Välkommen till CV-Pages");?></h1>

        <p><?php echo Yii::t("t","Vill du synas eller leta efter intressanta kandidater i vår publika CV-databas? Då har du kommit rätt! 

Här på CV-Pages kan du enkelt publicera ett eller flera CV:n. Dina CV:n kan vara riktade till den del av världen som du är intresserad av att arbeta i. 

<br><br>
Du som söker efter kandidater att anställa kan hitta dem här genom att söka på nyckelord och inleda en enkel rekryteringsprocess och hitta din kandidat!");?> </p>
<br>
        <p><a class="btn btn-primary btn-lg"><?php echo Yii::t("t","Sök CV här");?></a> (här lägger vi in en länk till sökfunktionen)</p>
    </div>
</div>
<h1><?php echo Yii::t("t","Välkommen till ");?> <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<p><?php echo Yii::t("t","Här kan vi lägga till text  ");?></p>
<ul>
    <li>Views file: <?php echo __FILE__; ?></li>
    <li>Layout file: <?php echo $this->getLayoutFile('jumbotron'); ?></li>
</ul>
<p>text
<div class="row">
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Rubrik ");?></h2>

        <p><?php echo Yii::t("t","Teeext");?> </p>

        <p><a class="btn btn-primary" href="#"><?php echo Yii::t("t","En knapp ");?></a></p>
    </div>
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Rubrik ");?></h2>

        <p><?php echo Yii::t("t", "Text text text text");?> </p>

        <p><a class="btn btn-primary" href="#"><?php echo Yii::t("t","En knapp ");?></a></p>
    </div>
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Rubrik ");?></h2>

        <p><?php echo Yii::t("t", "Mer text");?> .</p>

        <p><a class="btn btn-primary" href="#"><?php echo Yii::t("t","En knapp ");?></a></p>
    </div>
</div>
