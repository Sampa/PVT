<?php $this->pageTitle = Yii::app()->name; ?>
<!--mobilens förstasida-->
<div class="container visible-xs visible-sm">
    <center>
        <h2 id="logo-text"><?php echo Yii::t("t","CV-PAGES");?></h2>
        <br>
        <form action="<?php echo Yii::app()->baseUrl;?>/cv/#results" method="post">
            <div class="input-group" style="width: 50%;">
                <input type="text" class="form-control" name="searchbox" placeholder="<?php echo Yii::t("t","Sökord");?>">
                <span class="input-group-btn">
                    <button class="btn btn-info" type="submit"><?php echo Yii::t("t","Sök");?></button>
                </span>
            </div><!-- /input-group -->
        </form>
        <br>
        <?php if(yii::app()->user->isGuest) { ?>
        <a class="btn btn-success" href="<?php echo Yii::app()->baseUrl;?>/site/login"><?php echo t('Logga in')?></a>
        <a class="btn btn-success" href="<?php echo Yii::app()->baseUrl;?>/site/register"><?php echo t('Registrera dig')?></a>
        <?php } ?>
    </center>
</div>

<?php if(yii::app()->user->isGuest) { ?>
<div class="container visible-md visible-lg"> 
   <div class="row">
       <!-- Carousel -->
       <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item">
                <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="First slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                <div class="col-xs-12 text-center">
                    <h2><span><strong><?php echo Yii::t("t","CV-PAGES");?></strong></span></h2>
                    <br>
                    <br>
                    <h3><span><?php echo Yii::t("t","Ladda upp dina cv:n i vår publika CV-databas");?></span></h3>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="">
                        <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/login"><?php echo Yii::t("t", "Logga in");?></a>
                        <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/register"><?php echo Yii::t("t", "Registrera dig");?></a></div>
            
                </div>
                </div><!-- /header-text -->
            </div>
            <div class="item active">
                <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="Second slide">
                    <!-- Static Header -->
                <div class="header-text hidden-xs">
                <div class="col-xs-12 text-center">
                    <h2><span><strong><?php echo Yii::t("t","CV-PAGES");?></strong></span></h2>
                    <br>
                    <h3><span><?php echo Yii::t("t","Sök efter cv:n i databasen.");?></span></h3>
                    <br>
                    <br>
                    <br>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2"></div>
                        <div class="col-xs-6 col-sm-6 col-md-8">
                            <form action="<?php echo Yii::app()->baseUrl;?>/cv/#results" method="post">
                                <div class="input-group">
                                        <input type="text" class="form-control" name="searchbox" placeholder=<?php echo Yii::t("t","Sök efter cv:n i databasen.");?>>
                                            <span class="input-group-btn">
                                                <button class="btn btn-info" type="submit"><?php echo Yii::t("t","Sök");?></button>
                                            </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-2"></div>
                </div>
                        <br>
                <div class="">
                        <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/cv/"><?php echo t('Avancerad sökning')?></a><a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/register"><?php echo t('Registrera dig')?></a></div>
                           </div>
                       </div><!-- /header-text -->
                </div>
                <div class="item">
                        <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="Third slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-xs-12 text-center">
                            <h2><span><strong><?php echo Yii::t("t","CV-PAGES");?></strong></span></h2>
                            <br>
                            <br>
                            <br>
                            <h3><span><?php echo Yii::t("t","Hitta kandidater i vår CV-databas?");?></span></h3>
                            <br>
                            <br>
                            <br>
                            <br>
                                <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/login"><?php echo t('Logga in')?></a><a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/register"><?php echo t('Registrera dig')?></a>
                        </div>
                    </div><!-- /header-text -->
                </div>
            </div>
            <!-- Controls -->
                <a class="left carousel-control"  href="#carousel-example-generic" data-slide="prev">
                    <span style="margin-left:-85px; "class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control"  href="#carousel-example-generic" data-slide="next">
                    <span style="margin-left:35px;width: 50px;" class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php } 
else{ ?>
<!-- /carousel -->


<div class="container visible-md visible-lg">
    <center>
        <h2 id="logo-text"><?php echo Yii::t("t","CV-PAGES");?></h2>
        <br>
        <form action="<?php echo Yii::app()->baseUrl;?>/cv/#results" method="post">
            <div class="input-group"  style="width: 50%;">
                <input type="text" class="form-control" name="searchbox" placeholder="<?php echo Yii::t("t","Sök efter CV:n i vår databas");?>">
                <span class="input-group-btn">
                    <button class="btn btn-info" type="submit"><?php echo Yii::t("t","Sök");?></button>
                </span>
            </div><!-- /input-group -->
        </form>
        <br>
        <?php if(yii::app()->user->isGuest) { ?>
        <a class="btn btn-success" href="<?php echo Yii::app()->baseUrl;?>/site/login"><?php echo t('Logga in')?></a>
        <a class="btn btn-success" href="<?php echo Yii::app()->baseUrl;?>/site/register"><?php echo t('Registrera dig')?></a>
        <?php } ?>
    </center>
</div>

                <?php } ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class='col-md-6'>
                <h2><?php echo t('Om Oss')?></h2>
                <p><?php echo Yii::t("t", "Vår affärside går ut på att presentera en publik databas för CV:n oavsett
                 vilken branch du är intresserad av eller proffessionell inom. 
                Vi erbjuder arbetssökande att publicera sitt CV anonymt för att garantera att du bara bedöms på dina meriter. 
                Personliga och känsliga uppgifter som du som publicerare placerar i dina cv-filer skyddas inte av oss utan du 
                är personligt ansvarig för att skydda dessa uppgifter.");?> <br><br> </p>
            </div>
            <div  class='col-md-6' align='right'>
                <h2><?php echo t('Anonymitet')?></h2>
                <p><?php echo Yii::t("t", "Användarnamnet man registrerar är det som visas tillsammans med ditt publicerade CV. 
                Detta innebär att du kan ha ett namn som inte är kopplat till ens person och på så sätt vara anonym. 
                Det är bara CV-Pages som kommer ha ditt riktiga namn och mailadress registrerat. 
                Du får ta eget ansvar för innehållet i CV:et som ska publiceras då vi inte redigerar eller ändrar det i någon form.");?> <br><br> </p>
            </div>
        </div>
        <br>
        <div class="col-md-3" align="center">
            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/helpguide">
                <button type="button" class="btn btn-success btn-circle btn-xl"><i class="glyphicon glyphicon-link"></i></button>
            </a>
            <br>
            <h4 class="footertext"><strong><?php echo yii:: t ("t", "Användarguide");?></strong></h4>
            <p class="footertext"><?php echo Yii:: t ("t", "Läs om vilka funktioner som erbjuds av CV-Pages samt hur du går tillväga för att använda dem.");?>
                <br><a href="<?php echo Yii::app()->baseUrl;?>/site/page/helpguide"><?php echo t('Läs mer')?></a><br>
        </div>
        <div class="col-md-3">
            <center>
                <a href="<?php echo Yii::app()->baseUrl;?>/site/page/agreement">
                    <button type="button" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-book"></i></button>
                </a>
                <br>
                <h4 class="footertext"><strong><?php echo yii:: t ("t", "Användaravtal");?></strong></h4>
                <p class="footertext"><?php echo Yii:: t ("t", "CV-Pages är en webbplats avsedd att användas endast till jobbrekryteringar och får inte användas i andra avseenden.");?>
                    <br><a href="<?php echo Yii::app()->baseUrl;?>/site/page/agreement"><?php echo t('Läs mer')?></a><br>
                </center>
        </div>
        <div class="col-md-3">
            <center>
                <a href="<?php echo Yii::app()->baseUrl;?>/site/page/pul">
                    <button type="button" class="btn btn-warning btn-circle btn-xl"><i class="glyphicon glyphicon-folder-open"></i></button>
                </a>
                <br>
                <h4 class="footertext"><strong><?php echo Yii:: t("t","Personuppgifter");?></strong></h4>
                <p class="footertext"><?php echo Yii:: t("t","Registrering hos CV-Pages innebär att du samtycker till att CV-Pages behandlar dina personuppgifter enligt personuppgiftslagen (1998:204 PuL).");?>
                <br><a href="<?php echo Yii::app()->baseUrl;?>/site/page/pul"><?php echo t('Läs mer')?></a><br>
            </center>
        </div>

        <div class="col-md-3">
            <center>
                <a href="<?php echo Yii::app()->baseUrl;?>/site/page/cookies">
                    <button type="button" class="btn btn-danger btn-circle btn-xl"><i class="glyphicon glyphicon-info-sign"></i></button>
                </a>
                <br>
                <h4 class="footertext"><strong><?php echo YIi:: t("t","Cookies");?></strong></h4>
                <p class="footertext"><?php echo Yii:: t("t","Vi vill meddela er att CV-Pages använder sig utav cookies. Syftet med cookies är att få fakta om exempelvis hur många som besöker webbplatsen.");?>
                <br><a href="<?php echo Yii::app()->baseUrl;?>/site/page/cookies"><?php echo t('Läs mer')?></a><br>
            </center>
        </div>
        <div class="row">
            <p><center><br>
            <a href="#contactForm" id="showContactForm"><?php echo Yii::t("t","Kontakt");?></a><p class="footertext"></p></center></p>
            <!--                        <a href="--><?php //echo Yii::app()->baseUrl;?><!--/site/contact">--><?php //echo Yii::t("t","Kontakt");?><!--</a><p class="footertext"></p></center></p>-->
        </div>
        <!--visar hela kontactformuläret-->
        <div id="contactFormWrapper" style="display: none;">
            <?php
            $cat=Yii::app()->createController('site');//returns array containing controller instance and action index.
            echo $cat[0]->actionContact(true);
            ?>
        </div>
    </div>
</div>

<!--<div id="footer"></div>-->